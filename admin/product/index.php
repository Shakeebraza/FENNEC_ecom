<?php
require_once("../../global.php");
include_once('../header.php');

$getproduct = $dbFunctions->getData("products", "is_enable = 1", '', '', "DESC");

include_once('style.php');
?>

<div class="page-container">
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">

                </div>
                <div class="col-md-12">
                    <h3 class="title-5 m-b-35">Products</h3>


                    <form method="GET" action="" class="mb-4 custom-form">
                        <div class="row g-3">
                            <div class="col-md-3">
                                <input type="text" name="product_name" class="form-control" placeholder="Search by Product Name" value="<?php echo isset($_GET['product_name']) ? $_GET['product_name'] : ''; ?>">
                            </div>

                            <div class="col-md-2">
                                <input type="number" name="min_price" class="form-control" placeholder="Min Price" value="<?php echo isset($_GET['min_price']) ? $_GET['min_price'] : ''; ?>">
                            </div>
                            <div class="col-md-2">
                                <input type="number" name="max_price" class="form-control" placeholder="Max Price" value="<?php echo isset($_GET['max_price']) ? $_GET['max_price'] : ''; ?>">
                            </div>

                            <div class="col-md-2">
                                <select name="category" class="form-select">
                                    <option value="">All Categories</option>
                                    <option value="electronics" <?php if (isset($_GET['category']) && $_GET['category'] == 'electronics') echo 'selected'; ?>>Electronics</option>
                                    <option value="fashion" <?php if (isset($_GET['category']) && $_GET['category'] == 'fashion') echo 'selected'; ?>>Fashion</option>
                                    <!-- Add more categories as needed -->
                                </select>
                            </div>

                            <div class="col-md-2">
                                <select name="subcategory" class="form-select">
                                    <option value="">All Subcategories</option>
                                    <option value="mobiles" <?php if (isset($_GET['subcategory']) && $_GET['subcategory'] == 'mobiles') echo 'selected'; ?>>Mobiles</option>
                                    <option value="laptops" <?php if (isset($_GET['subcategory']) && $_GET['subcategory'] == 'laptops') echo 'selected'; ?>>Laptops</option>
                                    <!-- Add more subcategories as needed -->
                                </select>
                            </div>

                            <div class="col-md-2">
                                <select name="product_type" class="form-select">
                                    <option value="">All Product Types</option>
                                    <option value="standard" <?php if (isset($_GET['product_type']) && $_GET['product_type'] == 'standard') echo 'selected'; ?>>Standard</option>
                                    <option value="premium" <?php if (isset($_GET['product_type']) && $_GET['product_type'] == 'premium') echo 'selected'; ?>>Premium</option>
                                    <option value="gold" <?php if (isset($_GET['product_type']) && $_GET['product_type'] == 'gold') echo 'selected'; ?>>Gold</option>
                                </select>
                            </div>

                            <div class="col-md-2">
                                <select name="country" class="form-select">
                                    <option value="">All Countries</option>
                                    <option value="usa" <?php if (isset($_GET['country']) && $_GET['country'] == 'usa') echo 'selected'; ?>>USA</option>
                                    <option value="canada" <?php if (isset($_GET['country']) && $_GET['country'] == 'canada') echo 'selected'; ?>>Canada</option>
                                  
                                </select>
                            </div>

                            <div class="col-md-2">
                                <select name="city" class="form-select">
                                    <option value="">All Cities</option>
                                    <option value="new_york" <?php if (isset($_GET['city']) && $_GET['city'] == 'new_york') echo 'selected'; ?>>New York</option>
                                    <option value="toronto" <?php if (isset($_GET['city']) && $_GET['city'] == 'toronto') echo 'selected'; ?>>Toronto</option>
                                 
                                </select>
                            </div>

                       
                            <div class="col-md-2">
                                <button type="submit" class="btn btn-warning custom-button">Filter</button>
                                <a href="http://localhost/fennec/admin/product/add.php" class="btn btn-success custom-button">Add</a>
                            </div>
                        </div>
                    </form>





                    <div class="row" id="product-container">
                        <?php

                        ?>
                    </div>


                    <nav aria-label="Product Pagination">
                        <ul class="pagination"></ul>
                    </nav>

                </div>
            </div>
        </div>
    </div>
</div>
</div>






<?php
include_once('view.php');
include_once('../footer.php');
?>


<script>
$(document).ready(function() {
    fetchProducts(1);

    $('form').on('submit', function(e) {
        e.preventDefault();
        fetchProducts(1);
    });
});

function fetchProducts(page) {
    var product_name = $('input[name="product_name"]').val();
    var min_price = $('input[name="min_price"]').val();
    var max_price = $('input[name="max_price"]').val();
    var category = $('select[name="category"]').val();

    $.ajax({
        url: '<?php echo $urlval ?>admin/ajax/product/fetchpro.php',
        type: 'GET',
        data: {
            page: page,
            limit: 6,
            product_name: product_name,
            min_price: min_price,
            max_price: max_price,
            category: category
        },
        dataType: 'json',
        success: function(data) {
            $('#product-container').empty();
            if (data.products.length > 0) {
                $.each(data.products, function(index, product) {
                    var productHTML = `
                    <div class="col-md-4">
                        <div class="card product-card mb-4 shadow-sm">
                            <img class="card-img-top" src="${product.image}" alt="Product image">
                            <div class="card-body">
                                <h5 class="card-title">${product.name}</h5>
                                <p class="card-text">
                                    <span class="discount-price">$${product.discount_price}</span>
                                    <span class="original-price text-muted"><del>$${product.price}</del></span>
                                </p>
                                <p class="card-text">${product.description}</p>
                                <div class="additional-info">
                                    <p class="card-text"><strong>Category:</strong> ${product.category}</p>
                                    <p class="card-text"><strong>Sub-Category:</strong> ${product.subcategory}</p>
                                    <p class="card-text"><strong>Product Type:</strong> ${product.product_type}</p>
                                </div>
                                <div class="d-flex justify-content-between align-items-center mt-3">
                                    <div class="city-country">
                                        ${product.country} | ${product.city}
                                    </div>
                                    <div class="btn-group">
                                        <a href="#" class="btn btn-sm btn-warning view-product" data-id="${product.id}">
                                            <i class="fa fa-eye"></i> View
                                        </a>
                                        <a href="#" class="btn btn-sm btn-danger delete-product" data-id="${product.id}">
                                            <i class="fa fa-trash"></i> Delete
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>`;
                    $('#product-container').append(productHTML);
                });

                setupPagination(data.total, page);
            } else {
                $('#product-container').html('<p>No products found.</p>');
            }

            // Add event listeners for view and delete product buttons
            $('.view-product').click(function(e) {
                e.preventDefault();
                var productId = $(this).data('id');
                showProductDetails(productId);
            });

            $('.delete-product').click(function(e) {
                e.preventDefault();
                var productId = $(this).data('id');
                deleteProduct(productId);
            });
        },
        error: function() {
            $('#product-container').html('<p>Error loading products.</p>');
        }
    });
}

function showProductDetails(productId) {
    $.ajax({
        url: '<?php echo $urlval ?>admin/ajax/product/fetchProductDetails.php', 
        type: 'GET',
        data: { id: productId },
        dataType: 'json',
        success: function(data) {
            if (data.success) {
                var galleryImagesArray = data.product.gallery_images ? data.product.gallery_images.split(',') : [];

                var detailsHTML = `
                <div class="profileimagee"><img src="<?= $urlval?>${data.product.product_image}" alt="${data.product.product_name}" class="img-fluid mb-3 profileimg"></div>
                <h3>Gallery images</h3>    
                <div class="product-images multiple-items">
                    
                        
                        ${galleryImagesArray.map(image => `
                            <div><img src="<?= $urlval?>${image}" alt="Additional Image" class=""></div>
                        `).join('')}
                    </div>
                    <h4>${data.product.product_name}</h4>
                    <p><strong>Price:</strong> <span class="discount-price">$${data.product.product_discount_price}</span>
                    <span class="original-price text-muted"><del>$${data.product.product_price}</del></span></p>
                    <p>${data.product.product_description}</p>
                    <p><strong>Category:</strong> ${data.product.category_name}</p>
                    <p><strong>Sub-Category:</strong> ${data.product.subcategory_name}</p>
                    <p><strong>Product Type:</strong> ${data.product.product_type}</p>
                    <p><strong>Available in:</strong> ${data.product.country_name} | ${data.product.city_name}</p>
                `;
                $('#productDetailContent').html(detailsHTML);

                $('.multiple-items').slick({
                    infinite: true,
                    slidesToShow: 2,
                    slidesToScroll: 1,
                    arrows: true,
                    dots: true
                });

                $('#productDetailModal').modal('show');
            } else {
                alert('Product details not found.');
            }
        },
        error: function() {
            alert('Error loading product details.');
        }
    });
}




function deleteProduct(productId) {
    $.ajax({
        url: '<?php echo $urlval ?>admin/ajax/product/deleteProduct.php', 
        type: 'POST',
        data: { id: productId },
        dataType: 'json',
        success: function(data) {
            if (data.success) {
                alert('Product deleted successfully.');
                fetchProducts(1); 
            } else {
                alert('Error deleting product: ' + data.error);
            }
        },
        error: function() {
            alert('Error deleting product.');
        }
    });
}

function setupPagination(totalProducts, currentPage) {
    var totalPages = Math.ceil(totalProducts / 6);
    var paginationHTML = '';

    if (currentPage > 1) {
        paginationHTML += `<li class="page-item"><a class="page-link" href="#" onclick="fetchProducts(${currentPage - 1})">Previous</a></li>`;
    } else {
        paginationHTML += `<li class="page-item disabled"><a class="page-link" href="#">Previous</a></li>`;
    }

    for (var i = 1; i <= totalPages; i++) {
        if (i == currentPage) {
            paginationHTML += `<li class="page-item active"><a class="page-link" href="#">${i}</a></li>`;
        } else {
            paginationHTML += `<li class="page-item"><a class="page-link" href="#" onclick="fetchProducts(${i})">${i}</a></li>`;
        }
    }

    if (currentPage < totalPages) {
        paginationHTML += `<li class="page-item"><a class="page-link" href="#" onclick="fetchProducts(${currentPage + 1})">Next</a></li>`;
    } else {
        paginationHTML += `<li class="page-item disabled"><a class="page-link" href="#">Next</a></li>`;
    }

    $('.pagination').html(paginationHTML);
}

</script>

</body>

</html>