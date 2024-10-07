<?php
require_once("../../global.php");
include_once('../header.php');


if (!isset($_GET['boxid'])) {
    echo "<script>
            alert('Invalid box ID.');
            window.location.href = '".$urlval."admin/index.php'; 
          </script>";
    exit;
}

$boxId = $security->decrypt($_GET['boxid']);
$box = $dbFunctions->getDataById('box', $boxId); 

if (!$box) {
    echo "<script>
            alert('Box not found.');
            window.location.href = '".$urlval."admin/index.php'; 
          </script>";
    exit;
}else{
    $permission=$fun->getBoxPermission($boxId);
   
}


?>
<style>

        svg {
            display: none;
        }

</style>



<div class="page-container">
        <div class="main-content">
            <div class="section__content section__content--p30">
                <div class="container-fluid">
                    <div class="row">
                        <div class="container form-container">
                            <h1>Edit Box</h1>

                            <?php if (isset($error)): ?>
                                <div class="error"><?= $security->decrypt($error) ?></div>
                            <?php endif; ?>

                            <form method="POST" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input type="text" id="title" name="title" class="form-control"
                                        value="<?= htmlspecialchars($security->decrypt($box['title'])) ?>" required>
                                </div>
                                
                                <div class="form-group">
                                    <label for="heading">Heading</label>
                                    <input type="text" id="heading" name="heading" class="form-control"
                                        value="<?= htmlspecialchars($security->decrypt($box['heading'])) ?>" required>
                                </div>

                                <?php if ($permission[0]['phara'] == 1): ?>
                                    <div class="form-group">
                                        <label for="description">Description</label>
                                        <textarea name="description" id="description" class="form-control" cols="30" rows="5"><?= htmlspecialchars($security->decrypt($box['phara'])) ?></textarea>
                                    </div>
                                <?php endif; ?>

                                <?php if ($permission[0]['image'] == 1): ?>
                                    <div class="form-group">
                                        <label for="image1">Image 1</label>
                                        <input type="file" id="image1" name="image1" class="form-control" accept="image/*" onchange="previewImage(event, 'preview1')">
                                        <img id="preview1" src="#" alt="Image Preview" style="display:none; margin-top:10px; max-width: 100%;"/>
                                    </div>
                                <?php endif; ?>

                                <?php if ($permission[0]['image2'] == 1): ?>
                                    <div class="form-group">
                                        <label for="image2">Image 2</label>
                                        <input type="file" id="image2" name="image2" class="form-control" accept="image/*" onchange="previewImage(event, 'preview2')">
                                        <img id="preview2" src="#" alt="Image Preview" style="display:none; margin-top:10px; max-width: 100%;"/>
                                    </div>
                                <?php endif; ?>

                                <?php if ($permission[0]['text'] == 1): ?>
                                    <div class="form-group">
                                        <label for="text_field">Text Field</label>
                                        <input type="text" id="text_field" name="text_field" class="form-control" 
                                            value="<?= htmlspecialchars($security->decrypt($box['text'])) ?>">
                                    </div>
                                <?php endif; ?>

                                <?php if ($permission[0]['longtext'] == 1): ?>
                                    <div class="form-group">
                                        <label for="textaera">Additional Notes</label>
                                        <textarea name="textaera" id="default" class="form-control" cols="30" rows="10"><?= htmlspecialchars($security->decrypt($box['textaera'] ?? '')) ?></textarea>
                                    </div>
                                <?php endif; ?>

                                <!-- New Selector Field -->
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select id="status" name="status" class="form-control">
                                        <option disabled value="">Select Status</option>
                                        <option value="1" <?= isset($box['status']) && $box['status'] == 1 ? 'selected' : '' ?>>Activate</option>
                                        <option value="0" <?= isset($box['status']) && $box['status'] == 0 ? 'selected' : '' ?>>Decline</option>
                                    </select>
                                </div>

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-success btn-sm">
                                        <i class="fa fa-dot-circle-o"></i> Submit
                                    </button>
                                    <button type="reset" class="btn btn-danger btn-sm">
                                        <i class="fa fa-ban"></i> Reset
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<?php
include_once('../footer.php');
?>
<script src="<?php echo $urlval?>admin/asset/js/textaera.js"></script>
<script>
 function previewImage(event, previewId) {
        const input = event.target;
        const preview = document.getElementById(previewId);
        const file = input.files[0];

        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.style.display = 'block';
            }
            reader.readAsDataURL(file);
        } else {
            preview.src = '#';
            preview.style.display = 'none';
        }
    }
</script>

</body>

</html>