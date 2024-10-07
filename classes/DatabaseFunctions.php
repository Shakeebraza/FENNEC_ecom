<?php
class DatabaseFunctions {
    private $pdo;
    private $security;

    public function __construct($database, $security) {
        $this->pdo = $database->getConnection();
        $this->security = $security;
    }

    public function getData($tableName, $where = '', $groupBy = '', $orderBy = '', $orderDirection = 'ASC', $start = 0, $length = 10) {

        $query = "SELECT * FROM `$tableName`";
    
        if ($where) {
            $query .= " WHERE $where";
        }
    
        if ($groupBy) {
            $query .= " GROUP BY $groupBy";
        }
    
        if ($orderBy) {
            $orderDirection = strtoupper($orderDirection) === 'DESC' ? 'DESC' : 'ASC';
            $query .= " ORDER BY $orderBy $orderDirection";
        }
    
        if ($length > 0) {
            $query .= " LIMIT :start, :length";
        }
    
        $stmt = $this->pdo->prepare($query);
    
        $stmt->bindValue(':start', (int)$start, PDO::PARAM_INT);
        $stmt->bindValue(':length', (int)$length, PDO::PARAM_INT);
    
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
    public function getCount($tableName, $field = '*', $where = '') {
        $tableName = preg_replace('/[^a-zA-Z0-9_]/', '', $tableName);
    
        if ($field !== '*') {
            $field = preg_replace('/[^a-zA-Z0-9_]/', '', $field);
        }
    
        $query = "SELECT COUNT($field) AS count FROM `$tableName`";
        if ($where) {
            $query .= " WHERE $where";
        }
    
        try {
            $stmt = $this->pdo->prepare($query);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result['count'] ?? 0;
        } catch (PDOException $e) {
            return ['Error' => true, 'message' => 'Database error: ' . $e->getMessage()];
        }
    }
    

    public function setData($tableName, $data, $where = null) {
        $tableName = preg_replace('/[^a-zA-Z0-9_]/', '', $tableName);
    
        $sanitizedData = [];
    
        foreach ($data as $key => $value) {
            $value = strip_tags($value);
    
            $value = htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
            
            $sanitizedData[$key] = $value;
        }
    
        try {
            if ($where) {
                $set = '';
                $params = [];
                foreach ($sanitizedData as $key => $value) {
                    $set .= "`$key` = :$key, ";
                    $params[":$key"] = $value;
                }
                $set = rtrim($set, ', ');
                $whereClause = '';
                foreach ($where as $col => $val) {
                    $whereClause .= "`$col` = :$col AND ";
                    $params[":$col"] = $val;
                }
                $whereClause = rtrim($whereClause, ' AND ');
    
                $stmt = $this->pdo->prepare("UPDATE `$tableName` SET $set WHERE $whereClause");
    
            } else {
                $columns = implode('`, `', array_keys($sanitizedData));
                $placeholders = ':' . implode(', :', array_keys($sanitizedData));
                $stmt = $this->pdo->prepare("INSERT INTO `$tableName` (`$columns`) VALUES ($placeholders)");
                foreach ($sanitizedData as $key => $value) {
                    $params[":$key"] = $value;
                }
            }
            $stmt->execute($params);
            return ['success' => true, 'message' => 'Data saved successfully.'];
    
        } catch (PDOException $e) {
            if ($e->getCode() == 23000) {
                return ['success' => false, 'message' => 'Duplicate entry error: The email or field you are trying to use already exists.'];
            }
            return ['success' => false, 'message' => 'Database error: ' . $e->getMessage()];
        }
    }
    
    function delData($tableName, $whereCondition) {
    
        try {
            // Prepare the SQL delete statement
            $sql = "DELETE FROM " . $tableName . " WHERE " . $whereCondition;
            $stmt = $this->pdo->prepare($sql);
            
            // Execute the delete query
            if ($stmt->execute()) {
                return ['success' => true, 'message' => 'Record deleted successfully.'];
            } else {
                return ['success' => false, 'message' => 'Error deleting record.'];
            }
        } catch (PDOException $e) {
            return ['success' => false, 'message' => 'Database error: ' . $e->getMessage()];
        }
    }
}
?>
