<?php
class CategoryManager{
    private $pdo;
    private $security;
    private $dbfun;
    private $urlval;

    public function __construct($database, $security, $dbfun, $urlval){
        $this->pdo = $database->getConnection();  
        $this->security = $security;             
        $this->dbfun = $dbfun;                  
        $this->urlval = $urlval;
    }
    public function getAllCategoriesHeaderMenu()
    {
       
       $CatDataReturn = $this->dbfun->getDatanotenc('categories','is_enable = 1 AND is_show = 1','','sort_order','ASC',0,8);
        if ($CatDataReturn) {
            return [
                'status' => 'success',
                'message' => 'Categories retrieved successfully.',
                'data' => $CatDataReturn
            ];
        } 
        else {
            return [
                'status' => 'error',
                'message' => 'No categories found for the header menu.',
                'data' => []
            ];
        }

    }


}


?>