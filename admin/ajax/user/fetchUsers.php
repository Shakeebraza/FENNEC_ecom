<?php
require_once('../../../global.php');

$totalRecords = $dbFunctions->getCount('users', '*', "");

$filteredQuery = $dbFunctions->getDatanotenc('users', "", '', '', 'DESC');

$data = [];

foreach ($filteredQuery as $row) {
    $roleClass = $row['role'] == 1 ? 'admin' : 'user'; 
    $roleText = $row['role'] == 1 ? 'Admin' : 'User'; 
    
    // Determine actions based on user role
    $editButton = $row['role'] != 1 ? '<button class="btn btn-warning btn-sm" data-id="'. $security->encrypt($row['id']). '" >Edit</button>': 'Admin can not delete and edit';
    $deleteButton = $row['role'] != 1 ? '<button class="btn btn-danger btn-sm" data-id="'. $security->encrypt($row['id']). '">Delete</button>' : '';

    $data[] = [
        'checkbox' => '<input type="checkbox">',
        'name' => '<div class="table-data__info">
                      <h6>' .$row['username'] . '</h6>
                      <span><a href="#">' . $row['email'] . '</a></span>
                   </div>',
        'email' => $row['email'],
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
        'actions' => $editButton . ' ' . $deleteButton
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
