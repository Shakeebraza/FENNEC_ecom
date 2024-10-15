<?php
require_once("../../global.php");
include_once('../header.php');
?>

<style>
    .error {
        color: red;
    }

    .form-container {
        background-color: #f9f9f9;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .form-group {
        margin-bottom: 15px;
    }

    .form-group label {
        display: block;
        margin-bottom: 5px;
    }

    .form-group input, .form-group select, .form-group textarea {
        width: 100%;
        padding: 10px;
        border-radius: 4px;
        border: 1px solid #ccc;
    }

    .form-group input[type="file"] {
        border: none;
    }

    .btn {
        background-color: #28a745;
        color: white;
        padding: 10px 15px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    .btn:hover {
        background-color: #218838;
    }
</style>

<div class="page-container">
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="container form-container">
                        <h1>Add New Product</h1>

                        <?php if (isset($error)): ?>
                            <div class="error"><?= $security->decrypt($error) ?></div>
                        <?php endif; ?>

                        <form method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <label for="productName">Product Name <span style="color: red;">*</span></label>
        <input type="text" id="productName" name="productName" required>
    </div>
    <div class="form-group">
        <label for="slug">Slug <span style="color: red;">*</span></label>
        <input type="text" id="slug" name="slug" required>
    </div>
    <div class="form-group">
        <label for="image">Product Image <span style="color: red;">*</span></label>
        <input type="file" id="image" name="image" accept="image/*" required>
    </div>
    <div class="form-group">
        <label for="description">Description <span style="color: red;">*</span></label>
        <textarea id="description" name="description" rows="4" required></textarea>
    </div>
    <div class="form-group">
        <label for="category">Category <span style="color: red;">*</span></label>
        <select id="category" name="category" required>
            <option value="" disabled selected>Select a category</option>
            <option value="Electronics">Electronics</option>
            <option value="Fashion">Fashion</option>
            <option value="Home">Home</option>
            <!-- Add more categories as needed -->
        </select>
    </div>
    <div class="form-group">
        <label for="subcategory">Sub-Category <span style="color: red;">*</span></label>
        <input type="text" id="subcategory" name="subcategory" required>
    </div>
    <div class="form-group">
        <label for="gallery">Gallery Images</label>
        <input type="file" id="gallery" name="gallery[]" accept="image/*" multiple>
    </div>
    <div class="form-group">
        <label for="city">City <span style="color: red;">*</span></label>
        <input type="text" id="city" name="city" required>
    </div>
    <div class="form-group">
        <label for="country">Country <span style="color: red;">*</span></label>
        <input type="text" id="country" name="country" required>
    </div>
    <div class="form-group">
        <label for="price">Price <span style="color: red;">*</span></label>
        <input type="number" id="price" name="price" step="0.01" required>
    </div>
    <div class="form-group">
        <label for="discountPrice">Discount Price <span style="color: red;">*</span></label>
        <input type="number" id="discountPrice" name="discountPrice" step="0.01" required>
    </div>
    <button type="submit" class="btn">Add Product</button>
</form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include_once('../footer.php');
?>

<script src="<?php echo $urlval ?>admin/asset/js/textaera.js"></script>
<script>
    document.getElementById('productName').addEventListener('input', function() {
        const slugField = document.getElementById('slug');
        const slug = this.value
            .toLowerCase()
            .replace(/[^a-z0-9]+/g, '-')
            .replace(/^-|-$/g, '');
        slugField.value = slug;
    });
</script>

</body>
</html>
