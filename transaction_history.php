<?php
// Include necessary files
require_once 'global.php';
include_once 'header.php';
?>

<!-- Add Bootstrap CSS link -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Custom Styles -->
<style>
    h2 {
        text-align: center;
        color: #343a40;
        margin-bottom: 20px;
    }

    .filter-form {
        margin-bottom: 20px;
    }

    .filter-form label {
        font-size: 1rem;
        color: #495057;
    }

    .filter-form input {
        border-radius: 5px;
        padding: 8px;
        margin: 5px 0 15px 0;
        border: 1px solid #ccc;
        width: 100%;
    }

    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
    }

    .btn-primary:hover {
        background-color: #0056b3;
        border-color: #004085;
    }

    table {
        width: 100%;
        margin-bottom: 20px;
    }

    table th, table td {
        padding: 12px;
        text-align: left;
        vertical-align: middle;
        border-bottom: 1px solid #dee2e6;
    }

    table th {
        background-color: #f8f9fa;
        color: #495057;
    }

    .view-more-btn {
        display: block;
        margin-top: 20px;
        text-align: center;
    }

    .view-more-btn a {
        padding: 10px 20px;
        background-color: #28a745;
        color: #ffffff;
        border-radius: 5px;
        text-decoration: none;
    }

    .view-more-btn a:hover {
        background-color: #218838;
    }
</style>

<div class="container">
    <h2>Transaction History</h2>

    <!-- Filter Form -->
    <form method="POST" action="" class="filter-form">
        <div class="row">
            <div class="col-md-6">
                <label for="start_date">Start Date:</label>
                <input type="date" name="start_date" id="start_date" required>
            </div>
            <div class="col-md-6">
                <label for="end_date">End Date:</label>
                <input type="date" name="end_date" id="end_date" required>
            </div>
            <div class="col-md-6">
                <label for="product_name">Product Name:</label>
                <input type="text" name="product_name" id="product_name" placeholder="Enter product name">
            </div>
            <div class="col-md-6">
                <label for="min_price">Price Range</label>
                <input type="number" name="priceRange" id="min_price" placeholder="Price Range" step="0.01">
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Filter</button>
    </form>

    <div id="transactionHistory">
    <?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $startDate = $_POST['start_date'];
    $endDate = $_POST['end_date'];
    $productName = isset($_POST['product_name']) ? $_POST['product_name'] : null;
    $priceRange = [
        'min_price' => isset($_POST['min_price']) ? $_POST['min_price'] : null,
        'max_price' => isset($_POST['max_price']) ? $_POST['max_price'] : null,
    ];

    // Call the function to get transactions and products
    $transactions = $fun->getUserTransactionsAndProducts($startDate, $endDate, $productName, $priceRange);

    if ($transactions) {
        echo '<table class="table table-bordered table-striped">';
        echo '<thead><tr><th>Transaction ID</th><th>Date</th><th>Amount</th><th>Description</th><th>Product Name</th><th>Price</th></tr></thead>';
        echo '<tbody>';
        foreach ($transactions as $transaction) {
            echo '<tr>';
            echo '<td>' . $transaction['payment_txn_id'] . '</td>';
            echo '<td>' . $transaction['payment_created_at'] . '</td>';
            echo '<td>' . $transaction['payment_amount'] . '</td>';
            echo '<td>' . $transaction['product_description'] . '</td>';
            echo '<td>' . $transaction['product_name'] . '</td>';
            echo '<td>' . $transaction['product_price'] . '</td>';
            echo '</tr>';
        }
        echo '</tbody>';
        echo '</table>';
    } else {
        echo '<p>No transactions found for the selected filters.</p>';
    }
}
?>

    </div>

</div>

<?php
include_once 'footer.php';
?>


</body>
</html>
