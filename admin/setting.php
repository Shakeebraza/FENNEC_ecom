<?php
require_once("../global.php");
include_once('header.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $settingsArray = [];

    foreach ($_POST as $key => $value) {
        $settingsArray[$key] = htmlspecialchars($value);
    }

    if($settingsArray){
        $updateData=$fun->updateDatasiteseeting('site_settings',$settingsArray);
        var_dump($updateData);

    }

}

?>
<div class="page-container">
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid d-flex justify-content-center" style="min-height: 100vh;">
                <div class="row" style="width:100%;">
                    <h3>Site Setting</h3>
                <?php
                echo $fun->generateSettingsForm();
                
                ?>
                </div>
            </div>
        </div>
    </div>
</div>



<?php
include_once('footer.php');
?>