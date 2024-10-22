<?php
require_once 'global.php';
include_once 'header.php';

$proData = $fun->getaperproduct();
$locationData = $fun->TopLocations();
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
                  <div class="carousel-inner">
                      <div>
                    <div class="carousel-item active " data-bs-interval="10000">
                      <div class="row">
                          <div class="col-md-3">
                            <div class="card crt-timg-hm">
                              <img
                                src="<?php echo $urlval?>upload/6712f1c1b7532_image1.png"
                                class="card-img-top"
                                alt="Circular Economy"
                              />
                              <div class="card-body">
                                <p class="card-text  crt-txt-hm">Our Circular Economy R...</p>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-3">
                            <div class="card crt-timg-hm">
                              <img
                                src="https://www.Gumtree.com/assets/frontend/latest_jobs_2.b05155d69e733cab888d04e884bbe94d.png"
                                class="card-img-top"
                                alt="Upcycle"
                              />
                              <div class="card-body">
                                <p class="card-text  crt-txt-hm">12 Ways to Upcycle You...</p>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-3">
                            <div class="card crt-timg-hm">
                              <img
                                src="https://www.Gumtree.com/assets/frontend/cosy_living.49e97ecfd0c72454fb20cad5ec63788c.png"
                                class="card-img-top"
                                alt="Not Local"
                              />
                              <div class="card-body">
                                <p class="card-text  crt-txt-hm">Not Local? No Problem...</p>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-3">
                            <div class="card crt-timg-hm">
                              <img
                                src="https://www.Gumtree.com/assets/frontend/affordable_runarounds.adfdb0369a985d884565bb10ce40800e.png"
                                class="card-img-top"
                                alt="Sell unwanted"
                              />
                              <div class="card-body">
                                <p class="card-text  crt-txt-hm">Sell unwanted electrical...</p>
                              </div>
                            </div>
                          </div>
                        </div>
                    </div>
                    <div class="carousel-item " data-bs-interval="20000">
                      <div class="row">
                          <div class="col-md-3">
                            <div class="card crt-timg-hm">
                              <img
                                src="https://www.Gumtree.com/assets/frontend/gaming.9ce2c4f1fce1d7945df76e93395cc8ee.png"
                                class="card-img-top"
                                alt="Circular Economy"
                              />
                              <div class="card-body">
                                <p class="card-text  crt-txt-hm">Our Circular Economy R...</p>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-3">
                            <div class="card crt-timg-hm">
                              <img
                                src="https://www.Gumtree.com/assets/frontend/latest_jobs_2.b05155d69e733cab888d04e884bbe94d.png"
                                class="card-img-top"
                                alt="Upcycle"
                              />
                              <div class="card-body">
                                <p class="card-text  crt-txt-hm">12 Ways to Upcycle You...</p>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-3">
                            <div class="card crt-timg-hm">
                              <img
                                src="https://www.Gumtree.com/assets/frontend/cosy_living.49e97ecfd0c72454fb20cad5ec63788c.png"
                                class="card-img-top"
                                alt="Not Local"
                              />
                              <div class="card-body">
                                <p class="card-text  crt-txt-hm">Not Local? No Problem...</p>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-3">
                            <div class="card crt-timg-hm">
                              <img
                                src="https://www.Gumtree.com/assets/frontend/affordable_runarounds.adfdb0369a985d884565bb10ce40800e.png"
                                class="card-img-top"
                                alt="Sell unwanted"
                              />
                              <div class="card-body">
                                <p class="card-text  crt-txt-hm">Sell unwanted electrical...</p>
                              </div>
                            </div>
                          </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                      <div class="row">
                          <div class="col-md-3">
                            <div class="card crt-timg-hm">
                              <img
                                src="https://www.Gumtree.com/assets/frontend/gaming.9ce2c4f1fce1d7945df76e93395cc8ee.png"
                                class="card-img-top"
                                alt="Circular Economy"
                              />
                              <div class="card-body">
                                <p class="card-text  crt-txt-hm">Our Circular Economy R...</p>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-3">
                            <div class="card crt-timg-hm">
                              <img
                                src="https://www.Gumtree.com/assets/frontend/latest_jobs_2.b05155d69e733cab888d04e884bbe94d.png"
                                class="card-img-top"
                                alt="Upcycle"
                              />
                              <div class="card-body">
                                <p class="card-text  crt-txt-hm">12 Ways to Upcycle You...</p>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-3">
                            <div class="card crt-timg-hm">
                              <img
                                src="https://www.Gumtree.com/assets/frontend/cosy_living.49e97ecfd0c72454fb20cad5ec63788c.png"
                                class="card-img-top"
                                alt="Not Local"
                              />
                              <div class="card-body">
                                <p class="card-text  crt-txt-hm">Not Local? No Problem...</p>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-3">
                            <div class="card crt-timg-hm">
                              <img
                                src="https://www.Gumtree.com/assets/frontend/affordable_runarounds.adfdb0369a985d884565bb10ce40800e.png"
                                class="card-img-top"
                                alt="Sell unwanted"
                              />
                              <div class="card-body">
                                <p class="card-text  crt-txt-hm">Sell unwanted electrical...</p>
                              </div>
                            </div>
                          </div>
                        </div>
                    </div>
                  </div>  
                  </div>
      
                  <button class="carousel-control-prev" type="button" data-bs-target="<?php echo $urlval?>carouselExample" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                  </button>
                  <button class="carousel-control-next" type="button" data-bs-target="<?php echo $urlval?>carouselExample" data-bs-slide="next">
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
                      class="img-fluid"
                    />
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
    <?php foreach ($proData as $product): ?>
      <?php $country =$dbFunctions->getDatanotenc('countries',"id = '$product[country_id]'")?>
        <div class="col-md-3 mb-4">
            <div class="product-card position-relative">
                <?php if ($product['spotlight']): ?>
                <div class="badge bg-success position-absolute top-0 start-0 m-2">
                    SPOTLIGHT
                </div>
                <?php endif; ?>
                
                <img
                    src="<?php echo $urlval.$product['image']; ?>"
                    alt="<?php echo $product['name']; ?>"
                    class="product-image w-100" 
                />
                
                <i class="fas fa-heart heart-icon"></i>
                
                <div class="p-3">
                    <h5><?php echo $product['name']; ?></h5>
                    <p class="price">£<?php echo $product['price']; ?></p>
                    <p class="location">
                        <i class="fas fa-map-marker-alt"></i> <?php echo $country[0]['name']; ?>
                    </p>
                    <p class="date"><i class="far fa-clock"></i> <?php echo $product['date']; ?></p>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
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
                    aria-label="Close"
                  ></button>
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
      <h5 class="text-center mb-5 tp-lct-icn"><b>Top Locations</b></h5></span>
      <?php
$topLocations = $fun->TopLocations();
// var_dump($topLocations);
// exit();
if ($topLocations['status'] === 'success') {
    $data = $topLocations['data'];

    // Grouping cities by their respective countries
    $locationsByCountry = [];
    foreach ($data as $location) {
        $countryName = $location['country_name']; // This should reference the country name correctly
        $cityName = $location['city_name']; // Assuming this also returns city name, you should alias the column in the SQL query

        // To handle potential naming conflict, use an alias in the SQL query
        // Example: SELECT countries.name AS country_name, cities.name AS city_name

        // Initialize the country if not already set
        if (!isset($locationsByCountry[$countryName])) {
            $locationsByCountry[$countryName] = [];
        }

        // Only add city if it exists and is not empty
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
                    // Create links for each city
                    $cityLinks = array_map(function($city) use ($urlval) {
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



</div>

<?php
include_once 'footer.php';
?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="index.js"></script>
    <script src="js/header.js"></script>
</body>
</html>