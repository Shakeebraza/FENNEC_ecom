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

        border-radius: 10px;

        padding: 20px;

        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);

    }

    .custom-form .form-control,
    .custom-form .form-select {
        border: 1px solid #ced4da;

        border-radius: 5px;

        transition: border-color 0.3s;

    }

    .custom-form .form-control:focus,
    .custom-form .form-select:focus {
        border-color: #80bdff;
      
        box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
 
    }




    @media (max-width: 576px) {

        .custom-form .col-md-2,
        .custom-form .col-md-3 {
            flex: 0 0 100%;
     
            max-width: 100%;
        }
    }
/* Modal Dialog */
.modal-dialog.modal-lg {
    max-width: 90%;
    margin: 1.75rem auto;
}

/* Modal Content */
.modal-content {
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 5px 20px rgba(0, 0, 0, 0.2);
}

/* Modal Header */
.modal-header {
    background-color: #28a745; /* Green background for the header */
    color: white;
    border-bottom: none;
}

/* Modal Title */
.modal-header .modal-title {
    font-size: 1.75rem;
    font-weight: bold;
}

/* Modal Body */
.modal-body {
    padding: 20px;
    background-color: #fff; /* White background for the body */
    color: #333;
}

/* Product Image Styling */
.profileimagee img {
    border-radius: 10px; /* Rounded corners for the main image */
}

/* Slider Customization */
.product-images .slick-slide img {
    border-radius: 10px; /* Rounded corners for slider images */
}

/* Slick Dots */
.slick-dots li button {
    background-color: #28a745; /* Green color for dots */
}

.slick-dots li.slick-active button {
    background-color: #dc3545; /* Red color for active dot */
}

/* Product Details Styling */
h4 {
    font-size: 1.75rem;
    font-weight: bold;
    color: #28a745; /* Green color for product name */
}

.discount-price {
    color: #dc3545; /* Red color for discount price */
    font-size: 1.25rem; /* Larger font for discount price */
    font-weight: bold;
}

.original-price {
    font-size: 1rem;
    color: #7f8c8d; /* Muted color for original price */
    text-decoration: line-through;
}

/* Additional Spacing */
.mb-3 {
    margin-bottom: 1rem; /* Margin for spacing */
}

.profileimagee {
  display: flex;
  justify-content: center;
 align-items: center;
}
.profileimg{
    border: 1px solid black;
  border-radius: 50%;
}


</style>