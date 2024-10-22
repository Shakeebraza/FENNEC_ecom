<?php
require_once 'global.php';
include_once 'header.php';


?>
<!-- index content -->
<div class="custom-slider-container">

  <div class="custom-slide custom-fade">
    <img class="custom-slide-image" src="custom/asset/car1.jpg">
  </div>

  <div class="custom-slide custom-fade">
    <img class="custom-slide-image" src="https://images.unsplash.com/photo-1682687220566-5599dbbebf11?ixlib=rb-4.0.3&ixid=M3wxMjA3fDF8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1075&q=80">

  </div>

  <div class="custom-slide custom-fade">
    <img class="custom-slide-image" src="https://images.unsplash.com/photo-1682685797828-d3b2561deef4?ixlib=rb-4.0.3&ixid=M3wxMjA3fDF8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=870&q=80">
  </div>

</div>

<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="container mt-5">


        <h3 class="mt-5">Featured Categories</h3>
        <div class="container mt-5">

          <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
            <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
              <div class="carousel-inner">
                <?php
                $findCate = $categoryManager->getAllCategoriesHeaderMenu();

                if ($findCate['status'] == 'success') {
                  $active = true;
                  $count = 0;

                  foreach ($findCate['data'] as $index => $category) {
                    if ($count % 4 == 0) {

                      if ($count > 0) {
                        echo '</div></div>';
                      }
                      echo '<div class="carousel-item ' . ($active ? 'active' : '') . '" data-bs-interval="10000">';
                      echo '<div class="row">';
                      $active = false;
                    }
                ?>
                    <div class="col-md-3">
                      <div class="card crt-timg-hm">
                        <img
                          src="<?php echo htmlspecialchars($urlval . $category['category_image']); ?>"
                          class="card-img-top"
                          alt="<?php echo htmlspecialchars($category['category_name']); ?>" />
                        <div class="card-body">
                          <p class="card-text crt-txt-hm"><?php echo htmlspecialchars($category['category_name']); ?></p>
                        </div>
                      </div>
                    </div>
                <?php
                    $count++;
                    if ($count == count($findCate['data'])) {
                      echo '</div></div>';
                    }
                  }
                } else {
                  echo '<p>No categories available</p>';
                }
                ?>
              </div>
            </div>



            <button class="carousel-control-prev" type="button" data-bs-target="<?php echo $urlval ?>carouselExample" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="<?php echo $urlval ?>carouselExample" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
        </div>
      </div>

      <div class="container mt-4">
        <div class="banner">
          <div class="container">
            <div class="row align-items-center p">
              <div class="col-md-3 mb-3 mb-md-0 p-0">
                <img
                  src="https://www.Gumtree.com/assets/frontend/car-half.83dcfd1dda377997b02e49a2215477c0.png"
                  alt="Blue car"
                  class="img-fluid" />
              </div>
              <div class="col-md-6 mb-3 mb-md-0">
                <h3>Looking to sell your car?</h3>
                <p>Reach millions of active car buyers on Fennec</p>
                <div class="d-flex flex-wrap">
                  <div class="me-3 mb-2">
                    <span class="number-badge">1</span>
                    Free
                  </div>
                  <div class="me-3 mb-2">
                    <span class="number-badge">2</span>
                    Quick
                  </div>
                  <div class="mb-2">
                    <span class="number-badge">3</span>
                    Easy
                  </div>
                </div>
              </div>
              <div class="col-md-3">
                <button class="btn btn-warning text-dark w-100 mb-2">
                  <span class="eu-flag d-inline-block me-2"></span>
                  Enter reg
                </button>
                <button class="btn btn-success w-100">Sell now</button>
              </div>
            </div>
          </div>
        </div>
        <div class="row mt-5">
          <div class="col-md-3 mb-4">
            <div class="product-card position-relative">
              <div
                class="badge bg-success position-absolute top-0 start-0 m-2">
                SPOTLIGHT
              </div>
              <img
                src="https://imagedelivery.net/ePR8PyKf84wPHx7_RYmEag/389a5e8d-4fa4-4120-446a-415a63518f00/86"
                alt="Royale Drive 4 Mobility Scooter"
                class="product-image w-100" />
              <i class="fas fa-heart heart-icon"></i>
              <div class="p-3">
                <h5>Garage door</h5>
                <p class="price">£2,300</p>
                <p class="location">
                  <i class="fas fa-map-marker-alt"></i> Location
                </p>
                <p class="date"><i class="far fa-clock"></i> Date</p>
              </div>
            </div>
          </div>
          <div class="col-md-3 mb-4">
            <div class="product-card position-relative">
              <img
                src="https://imagedelivery.net/ePR8PyKf84wPHx7_RYmEag/d4b1e589-c333-4a4d-a1ee-9356ccb7c300/86"
                alt="Garage door"
                class="product-image w-100" />
              <i class="fas fa-heart heart-icon"></i>
              <div class="p-3">
                <h5>Garage door</h5>
                <p class="price">£50</p>
                <p class="location">
                  <i class="fas fa-map-marker-alt"></i> Crookston
                </p>
                <p class="date"><i class="far fa-clock"></i> Date</p>
              </div>
            </div>
          </div>
          <div class="col-md-3 mb-4">
            <div class="product-card position-relative">
              <img
                src="https://imagedelivery.net/ePR8PyKf84wPHx7_RYmEag/e2da4df3-5010-4dbe-c7de-9c825fddf300/86"
                alt="AUDI SQ5 EURO 6"
                class="product-image w-100" />
              <i class="fas fa-heart heart-icon"></i>
              <div class="p-3">
                <h5>Garage door</h5>
                <p class="price">£17,000</p>
                <p class="location">
                  <i class="fas fa-map-marker-alt"></i> Leicester
                </p>
                <p class="date"><i class="far fa-clock"></i> Date</p>
              </div>
            </div>
          </div>
          <div class="col-md-3 mb-4">
            <div class="product-card position-relative">
              <img
                src="https://imagedelivery.net/ePR8PyKf84wPHx7_RYmEag/a5c3a035-21f7-4267-b974-fc05ca04b600/86"
                alt="Bespoke solid oak wine/display cabinet"
                class="product-image w-100" />
              <i class="fas fa-heart heart-icon"></i>
              <div class="p-3">
                <h5>Garage door</h5>
                <p class="price">£200</p>
                <p class="location">
                  <i class="fas fa-map-marker-alt"></i> Location
                </p>
                <p class="date"><i class="far fa-clock"></i> Date</p>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-3 mb-4">
            <div class="product-card position-relative">
              <div
                class="badge bg-success position-absolute top-0 start-0 m-2">
                SPOTLIGHT
              </div>
              <img
                src="https://imagedelivery.net/ePR8PyKf84wPHx7_RYmEag/389a5e8d-4fa4-4120-446a-415a63518f00/86"
                alt="Royale Drive 4 Mobility Scooter"
                class="product-image w-100" />
              <i class="fas fa-heart heart-icon"></i>
              <div class="p-3">
                <h5>Garage door</h5>
                <p class="price">£2,300</p>
                <p class="location">
                  <i class="fas fa-map-marker-alt"></i> Location
                </p>
                <p class="date"><i class="far fa-clock"></i> Date</p>
              </div>
            </div>
          </div>
          <div class="col-md-3 mb-4">
            <div class="product-card position-relative">
              <img
                src="https://imagedelivery.net/ePR8PyKf84wPHx7_RYmEag/d4b1e589-c333-4a4d-a1ee-9356ccb7c300/86"
                alt="Garage door"
                class="product-image w-100" />
              <i class="fas fa-heart heart-icon"></i>
              <div class="p-3">
                <h5>Garage door</h5>
                <p class="price">£50</p>
                <p class="location">
                  <i class="fas fa-map-marker-alt"></i> Crookston
                </p>
                <p class="date"><i class="far fa-clock"></i> Date</p>
              </div>
            </div>
          </div>
          <div class="col-md-3 mb-4">
            <div class="product-card position-relative">
              <img
                src="https://imagedelivery.net/ePR8PyKf84wPHx7_RYmEag/e2da4df3-5010-4dbe-c7de-9c825fddf300/86"
                alt="AUDI SQ5 EURO 6"
                class="product-image w-100" />
              <i class="fas fa-heart heart-icon"></i>
              <div class="p-3">
                <h5>Garage door</h5>
                <p class="price">£17,000</p>
                <p class="location">
                  <i class="fas fa-map-marker-alt"></i> Leicester
                </p>
                <p class="date"><i class="far fa-clock"></i> Date</p>
              </div>
            </div>
          </div>
          <div class="col-md-3 mb-4">
            <div class="product-card position-relative">
              <img
                src="https://imagedelivery.net/ePR8PyKf84wPHx7_RYmEag/a5c3a035-21f7-4267-b974-fc05ca04b600/86"
                alt="Bespoke solid oak wine/display cabinet"
                class="product-image w-100" />
              <i class="fas fa-heart heart-icon"></i>
              <div class="p-3">
                <h5>Garage door</h5>
                <p class="price">£200</p>
                <p class="location">
                  <i class="fas fa-map-marker-alt"></i> Location
                </p>
                <p class="date"><i class="far fa-clock"></i> Date</p>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-3 mb-4">
            <div class="product-card position-relative">
              <div
                class="badge bg-success position-absolute top-0 start-0 m-2">
                SPOTLIGHT
              </div>
              <img
                src="https://imagedelivery.net/ePR8PyKf84wPHx7_RYmEag/389a5e8d-4fa4-4120-446a-415a63518f00/86"
                alt="Royale Drive 4 Mobility Scooter"
                class="product-image w-100" />
              <i class="fas fa-heart heart-icon"></i>
              <div class="p-3">
                <h5>Garage door</h5>
                <p class="price">£2,300</p>
                <p class="location">
                  <i class="fas fa-map-marker-alt"></i> Location
                </p>
                <p class="date"><i class="far fa-clock"></i> Date</p>
              </div>
            </div>
          </div>
          <div class="col-md-3 mb-4">
            <div class="product-card position-relative">
              <img
                src="https://imagedelivery.net/ePR8PyKf84wPHx7_RYmEag/d4b1e589-c333-4a4d-a1ee-9356ccb7c300/86"
                alt="Garage door"
                class="product-image w-100" />
              <i class="fas fa-heart heart-icon"></i>
              <div class="p-3">
                <h5>Garage door</h5>
                <p class="price">£50</p>
                <p class="location">
                  <i class="fas fa-map-marker-alt"></i> Crookston
                </p>
                <p class="date"><i class="far fa-clock"></i> Date</p>
              </div>
            </div>
          </div>
          <div class="col-md-3 mb-4">
            <div class="product-card position-relative">
              <img
                src="https://imagedelivery.net/ePR8PyKf84wPHx7_RYmEag/e2da4df3-5010-4dbe-c7de-9c825fddf300/86"
                alt="AUDI SQ5 EURO 6"
                class="product-image w-100" />
              <i class="fas fa-heart heart-icon"></i>
              <div class="p-3">
                <h5>Garage door</h5>
                <p class="price">£17,000</p>
                <p class="location">
                  <i class="fas fa-map-marker-alt"></i> Leicester
                </p>
                <p class="date"><i class="far fa-clock"></i> Date</p>
              </div>
            </div>
          </div>
          <div class="col-md-3 mb-4">
            <div class="product-card position-relative">
              <img
                src="https://imagedelivery.net/ePR8PyKf84wPHx7_RYmEag/a5c3a035-21f7-4267-b974-fc05ca04b600/86"
                alt="Bespoke solid oak wine/display cabinet"
                class="product-image w-100" />
              <i class="fas fa-heart heart-icon"></i>
              <div class="p-3">
                <h5>Garage door</h5>
                <p class="price">£200</p>
                <p class="location">
                  <i class="fas fa-map-marker-alt"></i> Location
                </p>
                <p class="date"><i class="far fa-clock"></i> Date</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="modal" style="display: none">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Welcome to Fennec</h5>
              <button
                type="button"
                class="btn-close"
                data-bs-dismiss="modal"
                aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <p>Sign in or Register to:</p>
              <ul>
                <li>Send and receive messages</li>
                <li>Post and manage your ads</li>
                <li>Rate other users</li>
                <li>Favourite ads to check them out later</li>
                <li>
                  Set alerts for your searches and never miss a new ad in
                  your area
                </li>
              </ul>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-success">
                Register
              </button>
              <button type="button" class="btn btn-outline-secondary">
                Login
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="container mt-4 mb-5">
  <span class="tp-lctn-mn">
    <h5 class="text-center mb-5 tp-lct-icn"><b>Top Locations</b></h5>
  </span>
  <h6 class="text-center mb-2"><b>Top Cities</b></h6>
  <?php
  $topLocations = $fun->TopLocations();
  if ($topLocations['status'] === 'success') {
    $data = $topLocations['data'];
    $locationsByCountry = [];
    foreach ($data as $location) {
      $countryName = $location['country_name'];
      $cityName = $location['city_name'];
      if (!isset($locationsByCountry[$countryName])) {
        $locationsByCountry[$countryName] = [];
      }
      if (!empty($cityName)) {
        $locationsByCountry[$countryName][] = $cityName;
      }
    }
  ?>

    <h6 class="text-center mb-2"><b>Top Cities</b></h6>

    <?php foreach ($locationsByCountry as $country => $cities): ?>
      <h6 class="text-center"><b><?php echo htmlspecialchars($country); ?></b></h6>
      <div class="row text-center justify-content-center mb-3">
        <div class="col-md-10">
          <p class="location-list">
            <?php
            $cityLinks = array_map(function ($city) use ($urlval) {
              return '<a href="' . htmlspecialchars($urlval) . '">' . htmlspecialchars($city) . '</a>';
            }, $cities);
            echo implode(' | ', $cityLinks);
            ?>
          </p>
        </div>
      </div>
    <?php endforeach; ?>

  <?php } else { ?>
    <div class="alert alert-danger text-center">
      <strong>Error:</strong> <?php echo htmlspecialchars($topLocations['message']); ?>
    </div>
  <?php } ?>
</div>
<?php
include_once 'footer.php';

?>

</body>

</html>