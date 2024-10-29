<?php
require_once 'global.php';
session_start();

if(!isset($_SESSION['userid'])){
    header('Location: index.php');
    exit();
}
$countries = $dbFunctions->getData('countries');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post Your Ad</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="<?= $urlval ?>custom/css/poststyle.css">
</head>
<style>
.custom-file-upload {
        display: inline-block;
        padding: 20px;
        cursor: pointer;
        color: black;
        border-radius: 5px;
        text-align: center;
        transition: background-color 0.3s;
        
        width: 100%;
    }

    .form-container .form-group:hover {
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

    .form-container h1 {
        text-align: center;
        font-size: 28px;
        margin-bottom: 30px;
        color: #333;
    }


    .form-group {
        display: flex;
        flex-direction: column;
        margin-bottom: 20px;
    }

    .form-group.full-width {
        display: block;
        margin-right: 0;
    }

    #image,
    #gallery {
        width: 100%;
    }


    .form-container .form-group {
        display: flex;
        justify-content: space-between;
        border: 1px solid black;
        border-radius: 5px;
    }


    input:hover,
    select:hover,
    textarea:hover,
    input:focus,
    select:focus,
    textarea:focus {
 
        border-color: #f39c12;
        box-shadow: 0px 0px 5px rgba(243, 156, 18, 0.5);
        outline: none;
    }
</style>
<body>

    <nav class="navbar navbar-light">
        <div class="container">
            <a class="navbar-brand" href="#"><?php echo $fun->getSiteSettingValue('website_name') ?></a>
            <button class="btn btn-outline-secondary" type="button">Back</button>
        </div>
    </nav>

    <div class="container my-5">
        <h1 class="text-center mb-4">POST YOUR AD</h1>
        
        <div id="step1">
            <h2 class="text-center mb-4">Choose a Category</h2>
            <div class="row g-4 justify-content-center">
                <?php
                $findCate = $categoryManager->getAllCategoriesHeaderMenu();
                if ($findCate['status'] == 'success') {
                    foreach ($findCate['data'] as $category) {
                        echo '
                        <div class="col-md-3">
                            <button class="btn category-btn w-100" onclick="selectCategory(`' . $category['category_name'] . '`, `' . $category['id'] . '`)">
                                <i class="fas ' . $category['icon'] . '"></i><br> ' . $category['category_name'] . '
                            </button>
                        </div>
                    ';
                    }
                }
                ?>
            </div>
        </div>

        <div id="step2" class="hidden">
            <h2 class="text-center mb-4">Choose a Subcategory for <span id="selectedCategory"></span></h2>
            <div class="row g-4 justify-content-center" id="subcategoryOptions"></div>
            <button class="btn btn-secondary" onclick="goBackToCategory()">Back</button>
        </div>

        <div id="step3" class="hidden">
            <h2 class="text-center mb-4">Post Your Ad Details</h2>
            <form id="productForm" enctype="multipart/form-data">
                <div class="mb-3">
                    <label class="form-label">Category</label>
                    <input type="text" class="form-control" id="finalCategory" name="finalCategory" readonly>
                    <input type="hidden" id="finalCategoryId" name="category"> 
                </div>
                <div class="mb-3">
                    <label class="form-label">Subcategory</label>
                    <input type="text" class="form-control" id="finalSubcategory" name="finalSubcategory" readonly>
                    <input type="hidden" id="finalSubcategoryId" name="subcategory">
                </div>
                <div class="mb-3">
                    <label for="imageUpload" class="form-label">Upload Image<span style="color: red;">*</span></label>
                    <input type="file" class="form-control" id="imageUpload" name="image" required>
                </div>
                <div class="form-group mb-3" style="padding: 20px;border: 2px solid #28a745;border-radius: 10px;box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);background-color: #f9f9f9;">
                    <label for="gallery" class="custom-file-upload">Upload Gallery Images</label>
                    <input type="file" id="gallery" name="gallery[]" accept="image/*" multiple>
                    <div id="imagePreview" class="image-preview"></div>
                    <div class="text-danger" id="galleryError"></div> 
                </div>
                <div class="mb-3">
                    <label for="brand" class="form-label">Brand<span style="color: red;">*</span></label>
                    <input type="text" class="form-control" id="brand" name="brand" required>
                </div>
                <div class="col-md-12 mb-3">
                                    <label for="condition" class="form-label">Condition <span style="color: red;">*</span></label>
                                    <select id="condition" name="condition" class="form-select" required>
                                        <option value="" disabled selected>Select condition</option>
                                        <option value="new">New</option>
                                        <option value="used">Used</option>
                                    </select>
                                    <div class="text-danger" id="conditionError"></div> <!-- Error message -->
                                </div>
                <div class="mb-3">
                    <label for="adTitle" class="form-label">Ad Title<span style="color: red;">*</span></label>
                    <input type="text" class="form-control" id="adTitle" name="productName" required>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description<span style="color: red;">*</span></label>
                    <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                </div>
                <div class="mb-3">
                    <label for="country" class="form-label">Country<span style="color: red;">*</span></label>
                    <select class="form-select" id="country" name="country" required>
                        <option value="" disabled>Select Country</option>
                        <?php foreach($countries as $val): ?>
                            <option value="<?= $security->decrypt($val['id']) ?>"><?= $security->decrypt($val['name']) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="city" class="form-label">City</label>
                    <select class="form-select" id="city" name="city" required>
                        <option value="" disabled>Select City</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label">Price<span style="color: red;">*</span></label>
                    <input type="number" class="form-control" id="price" name="price" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="<?= $_SESSION['email']?>" required>
                </div>
                <div class="btn-main-div" style="display: flex;justify-content: space-between;">
                    <button type="submit" class="btn btn-primary">Post Ad</button>
                    <button type="button" class="btn btn-secondary" onclick="goBackToSubcategory()">Back</button>
                </div>
            </form>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo $urlval ?>admin/asset/vendor/jquery-3.2.1.min.js"></script>
    <script>
    function selectCategory(categoryName, categoryId) {
        document.getElementById('step1').classList.add('hidden');
        document.getElementById('step2').classList.remove('hidden');
        document.getElementById('selectedCategory').innerText = categoryName;
        document.getElementById('finalCategory').value = categoryName;
        document.getElementById('finalCategoryId').value = categoryId;

        const subcategoryOptions = document.getElementById('subcategoryOptions');
        subcategoryOptions.innerHTML = '';

        if (categoryId) {
            fetch('<?php echo $urlval ?>admin/ajax/product/get_catjson.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: 'catId=' + encodeURIComponent(categoryId)
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.text();
            })
            .then(data => {
                try {
                    const parsedData = JSON.parse(data);
                    if (parsedData.status === 'success') {
                        parsedData.data.forEach(subcategory => {
                            const colDiv = document.createElement('div');
                            colDiv.className = 'col-md-3';
                            colDiv.innerHTML = `<button class="btn btn-outline-primary w-100" onclick="selectSubcategory('${subcategory.name}', '${subcategory.id}')">${subcategory.name}</button>`;
                            subcategoryOptions.appendChild(colDiv);
                        });
                    } else {
                        alert(parsedData.message);
                    }
                } catch (error) {
                    alert('Error parsing JSON: ' + error.message);
                }
            })
            .catch(error => {
                alert('Error fetching subcategories: ' + error.message);
            });
        } else {
            subcategoryOptions.innerHTML = '<p class="text-danger">No subcategories available.</p>';
        }
    }

    function selectSubcategory(subcategoryName, subcategoryId) {
        document.getElementById('step2').classList.add('hidden');
        document.getElementById('step3').classList.remove('hidden');
        document.getElementById('finalSubcategory').value = subcategoryName;
        document.getElementById('finalSubcategoryId').value = subcategoryId; // Store the subcategory ID
    }

    function goBackToCategory() {
        document.getElementById('step2').classList.add('hidden');
        document.getElementById('step1').classList.remove('hidden');
    }

    function goBackToSubcategory() {
        document.getElementById('step3').classList.add('hidden');
        document.getElementById('step2').classList.remove('hidden');
    }
    
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

    $(document).ready(function() {
    // Fetch cities based on country selection
    $('#country').on('change', function() {
        var countryId = $(this).val();
        if (countryId) {
            $.ajax({
                url: '<?php echo $urlval ?>admin/ajax/product/get_cities.php',
                type: 'POST',
                data: { country_id: countryId },
                success: function(data) {
                    $('#city').html(data);
                },
                error: function() {
                    alert('Error fetching cities. Please try again.');
                }
            });
        } else {
            $('#city').html('<option value="" disabled>Select City</option>');
        }
    });

    // Handle form submission
    $('#productForm').on('submit', function(e) {
        e.preventDefault(); 
        let formData = new FormData(this);

        $.ajax({
            url: '<?= $urlval ?>ajax/addproduct.php',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                if (response.success) {
                    showSuccessAlert();
                } else if (response.errors) {
                    handleErrors(response.errors);
                }
            },
            error: function() {
                showErrorAlert();
            }
        });
    });

    function showSuccessAlert() {
        alert('Ad posted successfully!');
    }

    function showErrorAlert() {
        alert('There was an error posting your ad. Please try again.');
    }

    function handleErrors(errors) {
        for (let key in errors) {
            $(`#${key}Error`).text(errors[key]);
        }
    }
});
    </script>

</body>

</html>
