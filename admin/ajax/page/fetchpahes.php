<?php
require_once('../../../global.php');

$draw = intval($_POST['draw']);
$start = intval($_POST['start']);
$length = intval($_POST['length']);


$totalRecords = $fun->getTotalPageCount();


$pagesData = $fun->getAllPages($start, $length);


if (empty($pagesData)) {
    echo json_encode(['draw' => $draw, 'recordsTotal' => $totalRecords, 'recordsFiltered' => 0, 'data' => []]);
    exit;
}


$data = [];
foreach ($pagesData as $index => $page) {
    if($page['is_enable'] == 1){
        $stats='process';
        $statsTest='Active';
    }else{
        $stats='denied';
        $statsTest='Denied';

    }
    $data[] = [
        'checkbox' => '<label class="au-checkbox"><input type="checkbox"><span class="au-checkmark"></span></label>',
        'name' => htmlspecialchars($page['name']),
        'date' => htmlspecialchars($page['created_at']),
        'status' => '<span class="status--'.$stats.'">'.$statsTest.'</span>',
        'actions' => '
 <div class="table-data-feature">
        <a href="'.$urlval.'admin/box/edit.php?boxid='.$security->encrypt($page['id']).'" class="item" data-toggle="tooltip" data-placement="top" title="Edit">
            <i class="zmdi zmdi-edit"></i>
        </a>
        <button class="item btn-danger" data-id="' . $security->encrypt($page['id']) . '" data-toggle="tooltip" data-placement="top" title="Delete">
            <i class="zmdi zmdi-delete"></i>
        </button>
    </div>'

    ];
}


$response = [
    'draw' => $draw,
    'recordsTotal' => $totalRecords,
    'recordsFiltered' => $totalRecords,
    'data' => $data
];

header('Content-Type: application/json');
echo json_encode($response);

?>
