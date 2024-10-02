<?php
class DatabaseFunctions {
    private $pdo;
    private $security;

    public function __construct($database, $security) {
        $this->pdo = $database->getConnection();
        $this->security = $security;
    }

    public function getData($tableName, $where = '', $groupBy = '', $orderBy = '') {
        $query = "SELECT * FROM `$tableName`";
        
        if ($where) {
            $query .= " WHERE $where";
        }
        if ($groupBy) {
            $query .= " GROUP BY $groupBy";
        }
        if ($orderBy) {
            $query .= " ORDER BY $orderBy";
        }

        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($results as &$record) {
            foreach ($record as $key => $value) {
                $record[$key] = $this->security->encrypt($value); 
            }
        }

        return $results;
    }

    public function getDataById($tableName, $id) {
        $tableName = preg_replace('/[^a-zA-Z0-9_]/', '', $tableName);

        $stmt = $this->pdo->prepare("SELECT * FROM `$tableName` WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $record = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($record) {
            foreach ($record as $key => $value) {
                $record[$key] = $this->security->encrypt($value);
            }
        }

        return $record;
    }

    public function setData($tableName, $data, $where = null) {
        // Sanitize table name (allow only letters, numbers, and underscores)
        $tableName = preg_replace('/[^a-zA-Z0-9_]/', '', $tableName);
    
        // Initialize array to hold sanitized data
        $sanitizedData = [];
    
        // Loop through each data entry
        foreach ($data as $key => $value) {
            // Strip out any HTML or script tags to prevent XSS
            $value = strip_tags($value);
    
            // Escape special characters for use in HTML entities
            $value = htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
            
            // Add sanitized value to the array
            $sanitizedData[$key] = $value;
        }
    
        try {
            // If updating data (i.e., $where is provided)
            if ($where) {
                // Build SQL query for updating
                $set = '';
                $params = [];
    
                // Construct SET part of SQL query with placeholders
                foreach ($sanitizedData as $key => $value) {
                    $set .= "`$key` = :$key, ";
                    $params[":$key"] = $value;
                }
                $set = rtrim($set, ', '); // Remove trailing comma
    
                // Add where clause for specific update
                $whereClause = '';
                foreach ($where as $col => $val) {
                    $whereClause .= "`$col` = :$col AND ";
                    $params[":$col"] = $val;
                }
                $whereClause = rtrim($whereClause, ' AND '); // Remove trailing AND
    
                // Prepare and execute the update query
                $stmt = $this->pdo->prepare("UPDATE `$tableName` SET $set WHERE $whereClause");
    
            } else {
                // If no $where clause, this is an insert operation
                $columns = implode('`, `', array_keys($sanitizedData)); // Get column names
                $placeholders = ':' . implode(', :', array_keys($sanitizedData)); // Create placeholders
    
                // Prepare and execute the insert query
                $stmt = $this->pdo->prepare("INSERT INTO `$tableName` (`$columns`) VALUES ($placeholders)");
    
                // Bind sanitized values to placeholders
                foreach ($sanitizedData as $key => $value) {
                    $params[":$key"] = $value;
                }
            }
    
            // Execute the query
            $stmt->execute($params);
            return ['success' => true, 'message' => 'Data saved successfully.'];
    
        } catch (PDOException $e) {
            // Check if the error is a duplicate entry error
            if ($e->getCode() == 23000) {
                return ['success' => false, 'message' => 'Duplicate entry error: The email or field you are trying to use already exists.'];
            }
    
            // Return a generic error if it's another type of PDOException
            return ['success' => false, 'message' => 'Database error: ' . $e->getMessage()];
        }
    }
    
    
}
?>
