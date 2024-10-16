<?php
class Fun {
    private $pdo;
    private $security;
    private $dbfun;

    private $urlval;

    public function __construct($database, $security, $dbfun,$urlval) {
        $this->pdo = $database->getConnection();
        $this->security = $security;
        $this->dbfun = $dbfun;
        $this->urlval = $urlval;
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
    public function uploadImage($file) {
        $uploadDir = __DIR__ . '/../upload/';
        $uploadnewDir = 'upload/';
        $fileName = basename($file['name']);
        $uniqueFileName = uniqid() . '_' . $fileName;
        $targetFilePath = $uploadDir . $uniqueFileName;

        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        $check = getimagesize($file['tmp_name']);
        if ($check === false) {
            return null;
        }

        if (move_uploaded_file($file['tmp_name'], $targetFilePath)) {
            return $uploadnewDir . $uniqueFileName;
        } else {
            return null;
        }
    }
    public function deleteData($id) {
        if (isset($id)) {

            $checkBoxSetting = $this->dbfun->getData('boxsetting', "boxid = '$id'");

            if ($checkBoxSetting) {

                $result = $this->dbfun->delData('boxsetting', "boxid = '$id'");

                if ($result['success'] == true) {
                    echo "Attempting to delete from box with id = $id";

                    $result = $this->dbfun->delData('box', "id = '$id'");

                    if ($result['success'] == true) {
                        return ['success' => true, 'message' => 'Record deleted successfully from both tables.'];
                    } else {

                        return ['success' => false, 'message' => 'Failed to delete record from box table. Error: ' . $result['message']];
                    }
                } else {
                    return ['success' => false, 'message' => 'Failed to delete record from boxsetting table.'];
                }
            } else {
                return ['success' => false, 'message' => 'Record not found in boxsetting.'];
            }
        }
    }


    public function getTotalMenuCount() {
        $query = "SELECT COUNT(*) AS total FROM menus";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['total'];
    }
    public function getAllMenu($start,$length) {
        try {
            $tabledata = $this->dbfun->getData('menus','', '', 'updated_at', 'DESC', $start, $length);
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

    public function getTotalPageCount() {
        $query = "SELECT COUNT(*) AS total FROM pages";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['total'];
    }

    public function getAllPages($start,$length) {
        try {
            $tabledata = $this->dbfun->getData('pages','', '', 'created_at', 'DESC', $start, $length);
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
    

    public function getTotalCatCount() {
        $query = "SELECT COUNT(*) AS total FROM categories";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['total'];
    }

    public function getAllcat($start,$length) {
        try {
            $tabledata = $this->dbfun->getData('categories','', '', 'created_at', 'DESC', $start, $length);
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

    public function findAllsubcat($categoryId) {
        try {
            $subcatData = $this->dbfun->getData('subcategories',"category_id='$categoryId' ", '', 'created_at', 'DESC');
    
            if (empty($subcatData)) {
                return [];
            }
    
           
            foreach ($subcatData as &$row) {
                foreach ($row as $key => $value) {
                    $row[$key] = $this->security->decrypt($value);
                }
            }
    
            return $subcatData; 
        } catch (PDOException $e) {
            return 'Error: ' . $e->getMessage();
        }
    }
    public function ordercat($order, $parent_id) {
   
        $stmt = $this->pdo->prepare("UPDATE subcategories SET sort_order = ? , category_id = ? WHERE id = ? ");
        
        foreach ($order as $position => $id) {
            $stmt->execute([$position,  $parent_id,$id]);
        }
        
        echo json_encode(['success' => true, 'message' => 'Order updated successfully.']);
    }

    public function getTotalSubCatCount() {
        $query = "SELECT COUNT(*) AS total FROM subcategories";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['total'];
    }

    public function getAllSubcat($start,$length) {
        try {
            $tabledata = $this->dbfun->getData('subcategories','', '', 'created_at', 'DESC', $start, $length);
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

    public function findAllPerentcat($categoryId) {
        try {
            $subcatData = $this->dbfun->getData('categories',"id='$categoryId' ");
    
            if (empty($subcatData)) {
                return [];
            }
    
           
            foreach ($subcatData as &$row) {
                foreach ($row as $key => $value) {
                    $row[$key] = $this->security->decrypt($value);
                }
            }
    
            return $subcatData; 
        } catch (PDOException $e) {
            return 'Error: ' . $e->getMessage();
        }
    }
    public function sessionSet($email = NULL) {
        if (isset($email) && !empty($email)) {
            $userData = $this->dbfun->getData('users', "email = '$email'");
            
            if ($userData) {
                if (session_status() == PHP_SESSION_NONE) {
                    session_start();
                }
                
                $_SESSION['userid'] = base64_encode($this->security->decrypt($userData[0]['id']));
                $_SESSION['username'] = $this->security->decrypt($userData[0]['username']);
                $_SESSION['email'] = $this->security->decrypt($userData[0]['email']);
                $_SESSION['email_verified_at'] = $this->security->decrypt($userData[0]['email_verified_at']);
                $_SESSION['role'] = $this->security->decrypt($userData[0]['role']);
                $_SESSION['profile'] = $userData[0]['profile'] == NULL 
                    ? $this->urlval . 'images/profile.jpg' 
                    : $this->security->decrypt($userData[0]['profile']);
                
        
                return true;
            }
        }
        
        
        return false;
    }
    
    public function rememberTokenCheckByCookie($remember_token = NULL) {
        if (isset($remember_token) && !empty($remember_token)) {
            $userData = $this->dbfun->getData('users', "remember_token = '$remember_token'");
            if ($userData) {
          
                if (isset($userData[0]['email_verified_at'])) {
                    session_start();
                    $_SESSION['username'] = $this->security->decrypt($userData[0]['username']);
                    $_SESSION['userid'] = base64_encode($this->security->decrypt($userData[0]['id']));
                    $_SESSION['email'] = $this->security->decrypt($userData[0]['email']);
                    $_SESSION['email_verified_at'] = $this->security->decrypt($userData[0]['email_verified_at']);
                    $_SESSION['role'] = $this->security->decrypt($userData[0]['role']);
                    $_SESSION['profile'] = $userData[0]['profile'] == NULL 
                        ? $this->urlval . 'images/profile.jpg' 
                        : $this->security->decrypt($userData[0]['profile']);
                    return true; 
                } else {
                    $this->dbfun->updateData('users', ['remember_token' => ''], $this->security->decrypt($userData[0]['id']));
                    $this->destroyRememberMe();
                    return false; 
                }
            }
        }
    
  
        $this->destroyRememberMe();
        return false;
    }
    

    private function destroyRememberMe() {
      
        if (isset($_COOKIE['remember_token'])) {
            setcookie('remember_token', '', time() - 3600, '/'); 
        }
    

        session_start();
        session_unset();
        session_destroy();
    }
    public function isSessionSet() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    
        if (isset($_SESSION['userid'], $_SESSION['username'], $_SESSION['email']) &&
            !empty($_SESSION['userid']) &&
            !empty($_SESSION['username']) &&
            !empty($_SESSION['email'])) {
            return true; 
        }
    
        return false; 
    }
    
    
    
}
