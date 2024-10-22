<?php
require_once("../../global.php");
include_once('../header.php');
$category =$dbFunctions->getData('categories','is_enable = 1');
$subcategories =$dbFunctions->getData('subcategories','is_enable = 1');
$cities =$dbFunctions->getData('cities');
$countries =$dbFunctions->getData('countries');
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

    .form-group input,
    .form-group select,
    .form-group textarea {
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
    .custom-file-upload {
    display: inline-block;
    padding: 20px;
    cursor: pointer;
    background-color: transparent; 
    color: black; 
    border-radius: 5px; 
    text-align: center;
    transition: background-color 0.3s; 
    border: 1px solid black;
    width: 100%; 
}

.custom-file-upload:hover {
    background-color: #2624243b; 
}

.custom-file-upload input[type="file"] {
    display: none;
}

.image-preview {
    display: flex;
    flex-wrap: wrap;
    margin-top: 10px; 
}

.image-preview img {
    width: 100px; 
    height: 100px; 
    object-fit: cover; 
    margin-right: 10px;
    margin-bottom: 10px; 
    border: 1px solid #ccc; 
    border-radius: 5px; 
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
                                    <?php
                                        foreach($category as $cat){
                                            echo '<option value="'.$security->decrypt($cat['id']).'">'.$security->decrypt($cat['category_name']).'</option>';
                                        }
                                    ?>
                                    
                                

                                </select>
                            </div>
                            <div class="form-group">
                                <label for="category">Sub Category <span style="color: red;">*</span></label>
                                <select id="category" name="category" required>
                                    <option value="" disabled selected>Select a sub category</option>
                                    <?php
                                        foreach($subcategories as $subcat){
                                            echo '<option value="'.$security->decrypt($subcat['id']).'">'.$security->decrypt($subcat['subcategory_name']).'</option>';
                                        }
                                    ?>
                                    
                                

                                </select>
                            </div>

                            <div class="form-group">
                                <label for="gallery" class="custom-file-upload">
                                    <input type="file" id="gallery" name="gallery[]" accept="image/*" multiple>
                                    Upload Gallery Images
                                </label>
                                <div id="imagePreview" class="image-preview"></div>
                            </div>
                            <div class="form-group">
                                <label for="country">Country <span style="color: red;">*</span></label>
                                <select id="category" name="category" required>
                                    <option value="" disabled selected>Select a country</option>
                                    <?php
                                         foreach($countries as $cont){
                                            echo '<option value="'.$security->decrypt($cont['id']).'">'.$security->decrypt($cont['name']).'</option>';
                                        }
                                    ?>
                                    
                                

                                </select>
                            </div>

                            <div class="form-group">
                                <label for="city">City <span style="color: red;">*</span></label>
                                <select id="category" name="category" required>
                                    <option value="" disabled selected>Select a City</option>
                                    <?php
                                         foreach($cities as $city){
                                            echo '<option value="'.$security->decrypt($city['id']).'">'.$security->decrypt($city['name']).'</option>';
                                        }
                                    ?>
                                    
                                

                                </select>
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

document.getElementById('gallery').addEventListener('change', function(event) {
    const imagePreview = document.getElementById('imagePreview');
    imagePreview.innerHTML = ''; 

    const files = event.target.files;
    for (let i = 0; i < files.length; i++) {
        const file = files[i];
        const reader = new FileReader();

        reader.onload = function(e) {
            const imgContainer = document.createElement('div'); 
            imgContainer.style.position = 'relative';
            const img = document.createElement('img');
            img.src = e.target.result; 
            imgContainer.appendChild(img);
  
            const removeButton = document.createElement('button');
            removeButton.innerText = 'X';
            removeButton.style.position = 'absolute'; 
            removeButton.style.top = '0px'; 
            removeButton.style.right = '10px'; 
            removeButton.style.background = 'red';
            removeButton.style.color = 'white'; 
            removeButton.style.border = 'none'; 
            removeButton.style.borderRadius = '5px';
            removeButton.style.padding = '3px';
            removeButton.style.cursor = 'pointer'; 
            removeButton.onclick = function() {
                imgContainer.remove(); 
            }

            imgContainer.appendChild(removeButton); 
            imagePreview.appendChild(imgContainer); 
        }

        reader.readAsDataURL(file); 
    }
});


</script>

</body>

</html>