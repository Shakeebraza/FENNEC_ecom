<?php
require_once 'global.php';
include_once 'header.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $slug = $_GET['slug'] ?? null;
    if (!empty($slug)) {
        $userId = isset($_SESSION['userid']) ? base64_decode($_SESSION['userid']) : NULL;
        $productData = $productFun->getProductDetailsBySlug($slug, $userId);
        if (empty($productData)) {
            header('Location: index.php');
            exit();
        }
    } else {
        header('Location: index.php');
        exit();
    }
} else {
    header('Location: index.php');
    exit();
}
// var_dump($productData['product']);

?>
<div class="container mt-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= $urlval ?>">Home</a></li>

            <li class="breadcrumb-item" aria-current="page">
                <a href="<?= $urlval ?>category.php?slug=<?= urlencode($productData['product']['catslug'] ?? 'Not Found'); ?>">
                    <?php echo htmlspecialchars($productData['product']['category_name'] ?? 'Not Found'); ?>
                </a>
            </li>

            <?php if (!empty($productData['product']['subcategory_name'])): ?>
                <li class="breadcrumb-item" aria-current="page">
                    <?php echo htmlspecialchars($productData['product']['subcategory_name']); ?>

                </li>
            <?php endif; ?>
        </ol>
    </nav>

    <h1 class="mb-2"><?php echo htmlspecialchars($productData['product']['title'] ?? 'Product Title'); ?></h1>
    <p class="text-muted mb-2"><?php echo htmlspecialchars($productData['product']['location'] ?? 'Location'); ?></p>
    <h2 class="mb-4">£<?php echo htmlspecialchars($productData['product']['price'] ?? '0.00'); ?></h2>

    <div class="row">
        <div class="col-md-8">
            <div class="card one mb-4" style="border-radius: 12px; overflow: hidden; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
                <div class="swiper-container2" style="margin-bottom: 20px; border-radius: 12px; overflow: hidden;">
                    <div class="swiper-wrapper">
                        <?php
                        foreach ($productData['gallery_images'] as $row) {
                            echo '
                                <div class="swiper-slide">
                                    <img src="' . $urlval . $row . '" class="card-img-top" alt="Not found Image" style="width: 100%; height: 80%; object-fit: cover;border-radius: 12px;">
                                </div>
                            ';
                        }
                        ?>
                    </div>
                    <div class="swiper-pagination" style="bottom: 10px;"></div>
                </div>
                <div class="card-body">
                    <h5 class="card-title" style="font-size: 1.5em; color: #333;"><?= htmlspecialchars($productData['product']['product_name'] ?? 'Product Name'); ?></h5>
                    <p class="card-text" style="color: #555; line-height: 1.5;"><?php echo htmlspecialchars($productData['product']['product_description'] ?? 'No description available.'); ?></p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="card-title">Seller Information</h5>
                    <p class="card-text">
                        <i class="fas fa-user"></i> <?php
                        $usid=$productData['product']['user_id'];
                            $datauserid = $dbFunctions->getDatanotenc('users',"id='$usid'");
                            echo $datauserid[0]['username'];
                                                    ?><br>
                        <small class="text-muted">Posting for under a month</small>
                    </p>
                    <p class="card-text">
                        <i class="fas fa-check-circle text-success"></i> Email address verified
                    </p>
                    <button class="btn btn-success w-100 mb-2">Email</button>
                    <?php
                    if ($productData['is_favorited'] == 1): ?>
                        <button class="btn buttonss w-100 mb-2" data-productid="<?php echo $productData['product']['product_id']; ?>" id="favorite-button">
                            <i class="<?php echo $productData['is_favorited'] ? 'fas' : 'far'; ?> fa-heart"></i>
                            <?php echo $productData['is_favorited'] ? 'Favorited' : 'Favourite'; ?>
                        </button>
                    <?php else:
                        if (isset($_SESSION['userid'])) {
                            echo '
                        <button class="btn buttonss w-100 mb-2" data-productid="' . $productData['product']['product_id'] . '" id="favorite-button">
                            <i class="far fa-heart"></i> Favourite
                        </button>
                            
                            ';
                        } else {
                            echo '
                                <a class="btn buttonss w-100 mb-2" href="' . $urlval . 'LoginRegister.php">
                                    <i class="far fa-heart"></i> Favourite
                                </a>
                            
                            ';
                        }
                    ?>

                    <?php endif; ?>
                    <button class="btn buttonss w-100">
                        <i class="fas fa-flag"></i> Report
                    </button>
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="card-title">Deliver this with AnyVan</h5>
                    <ul class="list-unstyled">
                        <li><i class="fas fa-check text-success"></i> Unbeatable instant prices</li>
                        <li><i class="fas fa-check text-success"></i> Choose your date & time</li>
                    </ul>
                    <button class="btn ">Get instant price</button>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-5">
        <div class="row align-items-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title mb-4">Deliver this with AnyVan</h2>
                        <ul class="list-unstyled mb-4">
                            <li class="mb-2">
                                <i class="fas fa-check check-icon"></i>
                                Unbeatable instant prices
                            </li>
                            <li class="mb-2">
                                <i class="fas fa-check check-icon"></i>
                                Choose your date & time
                            </li>
                        </ul>
                        <button class="btn btn-get-price text-white w-100 mb-4">
                            Get instant price
                            <i class="fas fa-arrow-right ml-2"></i>
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <img src="https://www.gumtree.com/assets/partnership-ads/anyvan-background-1.ef9693bb727a2143b522a1f8105a9ada.png" alt="AnyVan delivery truck" class="img-fluid">
            </div>
        </div>
    </div>

    <h3 class="mt-4 mb-3"><b>You may also like...</b></h3>
    <div class="swiper-container" style="margin-bottom: 40px; border-radius: 12px; overflow: hidden; box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);">
        <div class="swiper-wrapper">
            <?php
            foreach ($relatedProducts as $relatedProduct) {
                echo '
                <div class="swiper-slide" style="background: #eaeaea; display: flex; flex-direction: column; align-items: center; justify-content: center; padding: 20px;">
                    <img src="' . htmlspecialchars($urlval . $relatedProduct['image']) . '" alt="' . htmlspecialchars($relatedProduct['title']) . '" style="border-radius: 12px; width: 100%; height: auto; transition: transform 0.3s;">
                    <h5 style="margin-top: 10px; font-size: 1.2em; color: #333;">' . htmlspecialchars($relatedProduct['title']) . '</h5>
                    <p style="font-weight: bold; color: #28a745; font-size: 1.1em; margin-top: 5px;">£' . htmlspecialchars($relatedProduct['price']) . '</p>
                </div>
                ';
            }
            ?>
        </div>
        <div class="swiper-pagination" style="bottom: 10px;"></div>
    </div>
</div>

<?php
include_once 'footer.php';
?>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const mainSwiper = new Swiper('.swiper-container2', {
            loop: true,
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            autoplay: {
                delay: 2500,
                disableOnInteraction: false,
            },
        });

        const relatedProductsSwiper = new Swiper('.swiper-container', {
            slidesPerView: 4,
            spaceBetween: 10,
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            breakpoints: {
                1024: {
                    slidesPerView: 3
                },
                600: {
                    slidesPerView: 2
                },
                480: {
                    slidesPerView: 1
                }
            }
        });

        const favoriteButton = document.getElementById('favorite-button');

        favoriteButton.addEventListener('click', function() {
            const productId = this.getAttribute('data-productid');

            fetch('<?= $urlval ?>ajax/favorite.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({
                        id: productId
                    }),
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        favoriteButton.innerHTML = data.isFavorited ?
                            '<i class="fas fa-heart"></i> Favorited' :
                            '<i class="far fa-heart"></i> Favourite';
                    } else {
                        alert('Error: ' + data.message);
                    }
                })
                .catch(error => console.error('Error:', error));
        });
    });
</script>
</body>

</html>