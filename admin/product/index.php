<?php
require_once("../../global.php");
include_once('../header.php');

$getproduct = $dbFunctions->getData("products", "is_enable = 1", '', '', "DESC");

?>
<style>
    .product-card {
        border: 1px solid #e0e0e0;
        border-radius: 10px;
        overflow: hidden;
        transition: all 0.3s ease-in-out;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        padding: 15px;
        background-color: #fff;
    }

    .product-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    }

    .product-card .card-img-top {
        height: 50%;
        width: 50%;
        margin: auto;
        object-fit: cover;
        border-bottom: 1px solid #e0e0e0;
        transition: transform 0.3s ease;
    }

    .product-card:hover .card-img-top {
        transform: scale(1.05);
    }

    .product-card .card-body {
        padding: 15px;
        text-align: left;
    }

    .product-card .card-title {
        font-size: 20px;
        font-weight: bold;
        color: #333;
        margin-bottom: 10px;
    }

    .product-card .card-text {
        font-size: 14px;
        color: #666;
        margin-bottom: 8px;
    }

    .discount-price {
        color: #e74c3c;
        font-size: 20px;
        font-weight: bold;
        margin-right: 10px;
    }

    .original-price {
        font-size: 16px;
        color: #7f8c8d;
        text-decoration: line-through;
    }

    .card-body p.card-text {
        font-size: 14px;
        color: #666;
    }


    .product-card .btn-group .btn {
        margin: 5px;
        border-radius: 5px;
        transition: background-color 0.3s ease;
    }

    .product-card .btn-group .btn:hover {
        background-color: #f1f1f1;
    }

    .product-card .btn-group .btn-outline-secondary {
        color: #333;
        border-color: #e0e0e0;
    }

    .product-card .btn-group .btn-outline-secondary:hover {
        background-color: #e0e0e0;
    }


    .pagination .page-link {
        color: #007bff;
        padding: 10px 15px;
        border-radius: 5px;
    }

    .pagination .page-link:hover {
        color: #0056b3;
        background-color: #e7f1ff;
    }

    .pagination .page-item.active .page-link {
        background-color: #007bff;
        border-color: #007bff;
        color: white;
    }

    .city-country {
        font-size: small;
        color: #00000057;

    }

    .custom-form {
        background-color: #f8f9fa;
        /* Light background color */
        border-radius: 10px;
        /* Rounded corners */
        padding: 20px;
        /* Padding around the form */
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        /* Subtle shadow */
    }

    .custom-form .form-control,
    .custom-form .form-select {
        border: 1px solid #ced4da;
        /* Custom border */
        border-radius: 5px;
        /* Rounded corners for inputs */
        transition: border-color 0.3s;
        /* Smooth transition for border color */
    }

    .custom-form .form-control:focus,
    .custom-form .form-select:focus {
        border-color: #80bdff;
        /* Change border color on focus */
        box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
        /* Shadow on focus */
    }



    /* Responsive adjustments */
    @media (max-width: 576px) {

        .custom-form .col-md-2,
        .custom-form .col-md-3 {
            flex: 0 0 100%;
            /* Full width on smaller screens */
            max-width: 100%;
        }
    }
</style>
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
                                    <!-- Add more countries as needed -->
                                </select>
                            </div>

                            <div class="col-md-2">
                                <select name="city" class="form-select">
                                    <option value="">All Cities</option>
                                    <option value="new_york" <?php if (isset($_GET['city']) && $_GET['city'] == 'new_york') echo 'selected'; ?>>New York</option>
                                    <option value="toronto" <?php if (isset($_GET['city']) && $_GET['city'] == 'toronto') echo 'selected'; ?>>Toronto</option>
                                    <!-- Add more cities as needed -->
                                </select>
                            </div>

                            <!-- Submit Button -->
                            <div class="col-md-2">
                                <button type="submit" class="btn btn-primary custom-button">Filter</button>
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

<!-- Product Detail Modal -->
<div class="modal fade" id="productDetailModal" tabindex="-1" aria-labelledby="productDetailModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="productDetailModalLabel">Product Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="productDetailContent">
                    <!-- Product details will be injected here -->
                </div>
            </div>
        </div>
    </div>
</div>




<?php
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
                                        <a href="#" class="btn btn-sm btn-light view-product" data-id="${product.id}">
                                            <i class="fa fa-eye"></i> View
                                        </a>
                                        <a href="#" class="btn btn-sm btn-danger">
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

            // Add event listener for view product buttons
            $('.view-product').click(function(e) {
                e.preventDefault();
                var productId = $(this).data('id');
                showProductDetails(productId);
            });
        },
        error: function() {
            $('#product-container').html('<p>Error loading products.</p>');
        }
    });
}
function showProductDetails(productId) {
    $.ajax({
        url: '<?php echo $urlval ?>admin/ajax/product/fetchProductDetails.php', // URL to fetch product details
        type: 'GET',
        data: { id: productId },
        dataType: 'json',
        success: function(data) {
            if (data.success) {
                // Populate the modal with product details
                var detailsHTML = `
                    <img src="<?= $urlval?>${data.product.product_image}" alt="${data.product.product_name}" class="img-fluid mb-3">
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