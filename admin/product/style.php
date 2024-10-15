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
    
</style>