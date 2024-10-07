<?php
require_once('../../../global.php');

// Get the total number of records in the 'users' table
$totalRecords = $dbFunctions->getCount('users', '*', "");

// Fetch filtered query with descending order
$filteredQuery = $dbFunctions->getData('users', "", '', '', 'DESC');

$data = [];

foreach ($filteredQuery as $row) {
    $roleClass = $security->decrypt($row['role']) == 1 ? 'admin' : 'user'; 
    $roleText = $security->decrypt($row['role']) == 1 ? 'Admin' : 'User'; 
    
    $data[] = [
        'checkbox' => '<input type="checkbox">',
        'name' => '<div class="table-data__info">
                      <h6>' . $security->decrypt($row['username']) . '</h6>
                      <span><a href="#">' . $security->decrypt($row['email']) . '</a></span>
                   </div>',
        'email' => $security->decrypt($row['email']),
        'role' => '<span class="role ' . $roleClass . '">' . $roleText . '</span>',
        'type' => '<div style="position: relative; display: inline-block; width: 100%; margin: 0 auto;">
                      <select class="js-select2" name="property"
                          style="
                            width: 100%;
                            background-color: #f5f5f5;
                            color: #333;
                            border: 1px solid #ddd;
                            border-radius: 8px;
                            padding: 10px 15px;
                            font-size: 14px;
                            appearance: none;
                            transition: all 0.3s ease;
                            cursor: pointer;
                          " 
                          onmouseover="this.style.backgroundColor=\'#fff\'; this.style.borderColor=\'#007bff\'; this.style.boxShadow=\'0px 4px 6px rgba(0, 0, 0, 0.1)\';" 
                          onmouseout="this.style.backgroundColor=\'#f5f5f5\'; this.style.borderColor=\'#ddd\'; this.style.boxShadow=\'none\';"
                          onfocus="this.style.borderColor=\'#007bff\'; this.style.boxShadow=\'0px 4px 6px rgba(0, 123, 255, 0.3)\';"
                          onblur="this.style.borderColor=\'#ddd\'; this.style.boxShadow=\'none\';"
                        >
                          <option selected="selected">Full Control</option>
                          <option value="Post">Post</option>
                          <option value="Watch">Watch</option>
                      </select>
                      <span style="
                          position: absolute;
                          top: 50%;
                          right: 10px;
                          transform: translateY(-50%);
                          pointer-events: none;
                          color: #007bff;
                          font-size: 12px;
                      ">
                          ▼
                      </span>
                  </div>',
        'actions' => '<button class="btn btn-warning btn-sm" data-id="'. $row['id']. '" >Edit</button>
                      <button class="btn btn-danger btn-sm" data-id="'. $row['id']. '">Delete</button>'
    ];
}

// Prepare response array for DataTables
$response = [
    "draw" => intval($_POST['draw']),
    "recordsTotal" => intval($totalRecords),
    "recordsFiltered" => intval($totalRecords),
    "data" => $data
];

// Return JSON response
echo json_encode($response);
?>
