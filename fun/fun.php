<?php
class Fun {
    private $pdo;
    private $security;
    private $dbfun;

    public function __construct($database, $security, $dbfun) {
        $this->pdo = $database->getConnection();
        $this->security = $security;
        $this->dbfun = $dbfun;
    }


    public function getBox($tablename = null) {
        try {
            if ($tablename !== null) {
                $tabledata = $this->dbfun->getData('box', "title = '$tablename'");
                if (empty($tabledata)) {
                    echo "No data found or an issue with the query.";
                    return [];
                } else {
                    echo "Data retrieved successfully: <br>";
                }
    
                foreach ($tabledata as &$row) {
                    foreach ($row as $key => $value) {
                        $row[$key] = $this->security->decrypt($value);
                    }
                }
    
                return $tabledata;
            } else {
                echo "No table name provided.";
                return [];
            }
        } catch (PDOException $e) {
            return 'Error: ' . $e->getMessage();
        }
    }
    public function getAllBox($start,$length) {
        try {
            $tabledata = $this->dbfun->getData('box','', '', 'created_at', 'DESC', $start, $length); 
            if (empty($tabledata)) {
               
                return [];
            } else {
                
            }
            foreach ($tabledata as &$row) {
                foreach ($row as $key => $value) {
                    $row[$key] = $this->security->decrypt($value);
                }
            }

            return $tabledata; 
        } catch (PDOException $e) {
            return 'Error: ' . $e->getMessage();
        }
    }
    public function getTotalBoxCount() {
        $query = "SELECT COUNT(*) AS total FROM box";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['total'];
    }
    public function getBoxPermission($id) {
        $data = $this->dbfun->getData('boxsetting', "boxid = '$id'");
        if ($data) {
            $formattedData = [];
            foreach ($data as $record) {
                $formattedData[] = [
                    'boxid' => $this->security->decrypt($record['boxid']),
                    'phara' => $this->security->decrypt($record['phara']),
                    'image' => $this->security->decrypt($record['image']),
                    'image2' => $this->security->decrypt($record['image2']),
                    'text' => $this->security->decrypt($record['text']),
                    'longtext' => $this->security->decrypt($record['longtext'])
                ];
            }
            return $formattedData;
        } else {

            return [];
        }
    }
    
}
