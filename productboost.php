<?php
require_once 'global.php';
include_once 'header.php';

if (!isset($_GET['productid'])) {
    die('Product ID not provided.');
}

// Decrypt the product ID
$productId = $security->decrypt($_GET['productid']);
?>

<style>
    /* General Styling for the page */
    body {
        font-family: 'Arial', sans-serif;
        background-color: #f4f7fc;
        margin: 0;
        padding: 0;
    }

    /* Container for both plans, to be displayed in a row */
    .plans-row {
        display: flex;
        justify-content: space-between;
        gap: 20px; /* Space between plans */
        flex-wrap: wrap; /* Allow plans to wrap on smaller screens */
        padding: 20px;
    }

    /* Each individual plan container */
    .boost-container {
        background-color: #fff;
        border-radius: 15px;
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        padding: 40px;
        width: 48%; /* Ensure plans take up half of the available space */
        text-align: center;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    /* Hover effect for the plan containers */
    .boost-container:hover {
        transform: translateY(-10px);
        box-shadow: 0 15px 25px rgba(0, 0, 0, 0.2);
    }

    /* Heading Styles */
    h2 {
        font-size: 28px;
        color: #3a3a3a;
        margin-bottom: 20px;
        font-weight: bold;
    }

    /* Image Styles */
    .boost-image img {
        width: 100%;
        height: 200px;
        object-fit: cover;
        border-radius: 10px;
    }

    /* List Style for Benefits */
    .boost-benefits {
        list-style-type: none;
        padding: 0;
        margin-top: 20px;
    }

    .boost-benefits li {
        margin: 12px 0;
        padding-left: 20px;
        position: relative;
        font-size: 16px;
        color: #555;
    }

    .boost-benefits li::before {
        content: "✔";
        color: #28a745;
        position: absolute;
        left: 0;
        font-size: 18px;
        top: 50%;
        transform: translateY(-50%);
    }

    /* Button Styling */
    .btn2 {
        background-color: #d4af37;
        color: white;
        border: none;
        padding: 15px 25px;
        font-size: 18px;
        border-radius: 8px;
        cursor: pointer;
        width: 100%;
        margin-top: 20px;
        transition: background-color 0.3s, transform 0.3s;
    }

    .btn:hover {
        background-color: #b38e1a;
        transform: translateY(-3px);
    }

    /* Plan Details Styling */
    .gold-plan {
        border-left: 5px solid #d4af37;
    }

    .premium-plan {
        border-left: 5px solid #007bff;
    }

    /* Small Text Styling */
    p {
        font-size: 16px;
        color: #777;
        margin: 20px 0;
    }

    /* Form Styling */
    form {
        display: inline-block;
        width: 100%;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .boost-container {
            width: 100%; /* Make each plan take full width on smaller screens */
        }
    }
</style>

<!-- Plans Row Container -->
<div class="plans-row">
    <!-- Gold Plan Container -->
    <div class="boost-container gold-plan">
        <h2>Gold Boost Plan</h2>
        <div class="boost-image">
            <img src="gold.jpg" alt="Gold Plan">
        </div>
        <p>Unlock higher visibility for your product for 7 days.</p>
        <ul class="boost-benefits">
            <li>Priority listing for 7 days</li>
            <li>Increased visibility to attract more buyers</li>
            <li>Featured in Gold section</li>
            <li>Improved engagement and sales</li>
        </ul>
        <form method="POST" action="purchase.php">
            <input type="hidden" name="boost_type" value="gold">
            <button type="submit" class="btn2">Activate Gold Plan</button>
        </form>
    </div>

    <!-- Premium Plan Container -->
    <div class="boost-container premium-plan">
        <h2>Premium Boost Plan</h2>
        <div class="boost-image">
            <img src="premium.jpg" alt="Premium Plan">
        </div>
        <p>Get top placement for your product for 14 days.</p>
        <ul class="boost-benefits">
            <li>Top listing for 14 days</li>
            <li>Maximum visibility to potential buyers</li>
            <li>Exclusive placement in Premium section</li>
            <li>Boost your sales and reputation</li>
        </ul>
        <form method="POST" action="purchase.php">
            <input type="hidden" name="boost_type" value="premium">
            <button type="submit" class="btn2">Activate Premium Plan</button>
        </form>
    </div>
</div>

<?php
include_once 'footer.php';
?>

<script>
// Additional JS functionality (if needed) can be added here.
</script>

</body>
</html>
