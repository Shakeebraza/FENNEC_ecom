<?php
require_once 'global.php';
include_once 'header.php';


?>
<!-- index content -->
<div class="custom-slider-container">
   
    <div class="custom-slide custom-fade">
      <img class="custom-slide-image" src="custom/asset/car1.jpg">

      <!-- <div class="custom-slide-number-container">
        <p class="custom-slider-number">01</p><span>/</span>
        <hr>
        <p class="custom-slider-number">03</p>
      </div> -->
    </div>
  
    <div class="custom-slide custom-fade">
      <img class="custom-slide-image" src="https://images.unsplash.com/photo-1682687220566-5599dbbebf11?ixlib=rb-4.0.3&ixid=M3wxMjA3fDF8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1075&q=80">
      <!-- <div class="custom-slide-number-container">
        <p class="custom-slider-number">02 </p><span>/</span>
        <hr>
        <p class="custom-slider-number">03</p>
      </div> -->
    </div>
  
    <div class="custom-slide custom-fade">
      <img class="custom-slide-image" src="https://images.unsplash.com/photo-1682685797828-d3b2561deef4?ixlib=rb-4.0.3&ixid=M3wxMjA3fDF8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=870&q=80">
      <!-- <div class="custom-slide-number-container">
        <p class="custom-slider-number">03</p><span>/</span>
        <hr>
        <p class="custom-slider-number">03</p>
      </div> -->
    </div>
  
    <!-- Next and previous buttons -->
    <!-- <div class="custom-slider-nav">
      <a class="custom-slider-nav-btn" onclick="plusSlides(-1)">
        <ion-icon name="caret-back-outline"></ion-icon>
      </a>
      <a class="custom-slider-nav-btn" onclick="plusSlides(1)">
        <ion-icon name="caret-forward-outline"></ion-icon>
      </a>
    </div> -->
  
    <!-- The dots/circles -->
    <!-- <div class="custom-dot-container">
      <span class="custom-dot" onclick="currentSlide(1)"></span>
      <span class="custom-dot" onclick="currentSlide(2)"></span>
      <span class="custom-dot" onclick="currentSlide(3)"></span>
    </div> -->
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
              <div class="col-md-3 mb-4">
                <div class="product-card position-relative">
                  <div
                    class="badge bg-success position-absolute top-0 start-0 m-2"
                  >
                    SPOTLIGHT
                  </div>
                  <img
                    src="https://imagedelivery.net/ePR8PyKf84wPHx7_RYmEag/389a5e8d-4fa4-4120-446a-415a63518f00/86"
                    alt="Royale Drive 4 Mobility Scooter"
                    class="product-image w-100" 
                  />
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
                    class="product-image w-100"
                  />
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
                    class="product-image w-100"
                  />
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
                    class="product-image w-100"
                  />
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
                    class="badge bg-success position-absolute top-0 start-0 m-2"
                  >
                    SPOTLIGHT
                  </div>
                  <img
                    src="https://imagedelivery.net/ePR8PyKf84wPHx7_RYmEag/389a5e8d-4fa4-4120-446a-415a63518f00/86"
                    alt="Royale Drive 4 Mobility Scooter"
                    class="product-image w-100"
                  />
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
                    class="product-image w-100"
                  />
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
                    class="product-image w-100"
                  />
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
                    class="product-image w-100"
                  />
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
                    class="badge bg-success position-absolute top-0 start-0 m-2"
                  >
                    SPOTLIGHT
                  </div>
                  <img
                    src="https://imagedelivery.net/ePR8PyKf84wPHx7_RYmEag/389a5e8d-4fa4-4120-446a-415a63518f00/86"
                    alt="Royale Drive 4 Mobility Scooter"
                    class="product-image w-100"
                  />
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
                    class="product-image w-100"
                  />
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
                    class="product-image w-100"
                  />
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
                    class="product-image w-100"
                  />
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
      <h6 class="text-center mb-2"><b>Top Cities</b></h6>
      <h6 class="text-center"><b>England</b></h6>
      <div class="row text-center justify-content-center mb-3">
        <div class="col-md-10">
          <p class="location-list">
            <a href="<?php echo $urlval?>">Bedfordshire</a> | <a href="<?php echo $urlval?>">Berkshire</a> | <a href="<?php echo $urlval?>">Bristol</a> | <a href="<?php echo $urlval?>">Buckinghamshire</a> | <a href="<?php echo $urlval?>">Cambridgeshire</a> | 
            <a href="<?php echo $urlval?>">Cheshire</a> | <a href="<?php echo $urlval?>">Cornwall</a> | <a href="<?php echo $urlval?>">County Durham</a> | <a href="<?php echo $urlval?>">Cumbria</a> | <a href="<?php echo $urlval?>">Derbyshire</a> | 
            <a href="<?php echo $urlval?>">Devon</a> | <a href="<?php echo $urlval?>">Dorset</a> | <a href="<?php echo $urlval?>">East Sussex</a> | <a href="<?php echo $urlval?>">East Yorkshire</a> | <a href="<?php echo $urlval?>">Essex</a> | 
            <a href="<?php echo $urlval?>">Gloucestershire</a> | <a href="<?php echo $urlval?>">Hampshire</a> | <a href="<?php echo $urlval?>">Herefordshire</a> | <a href="<?php echo $urlval?>">Hertfordshire</a> | 
            <a href="<?php echo $urlval?>">Isle of Wight</a> | <a href="<?php echo $urlval?>">Kent</a> | <a href="<?php echo $urlval?>">Lancashire</a> | <a href="<?php echo $urlval?>">Leicestershire</a> | <a href="<?php echo $urlval?>">Lincolnshire</a> | 
            <a href="<?php echo $urlval?>">London</a> | <a href="<?php echo $urlval?>">Manchester</a> | <a href="<?php echo $urlval?>">Merseyside</a> | <a href="<?php echo $urlval?>">Norfolk</a> | <a href="<?php echo $urlval?>">North Yorkshire</a> | 
            <a href="<?php echo $urlval?>">Northamptonshire</a> | <a href="<?php echo $urlval?>">Northumberland</a> | <a href="<?php echo $urlval?>">Nottinghamshire</a> | <a href="<?php echo $urlval?>">Oxfordshire</a> | 
            <a href="<?php echo $urlval?>">Rutland</a> | <a href="<?php echo $urlval?>">Shropshire</a> | <a href="<?php echo $urlval?>">Somerset</a> | <a href="<?php echo $urlval?>">South Yorkshire</a> | <a href="<?php echo $urlval?>">Staffordshire</a> | 
            <a href="<?php echo $urlval?>">Suffolk</a> | <a href="<?php echo $urlval?>">Surrey</a> | <a href="<?php echo $urlval?>">Tyne and Wear</a> | <a href="<?php echo $urlval?>">Warwickshire</a> | <a href="<?php echo $urlval?>">West Midlands</a> | 
            <a href="<?php echo $urlval?>">West Sussex</a> | <a href="<?php echo $urlval?>">West Yorkshire</a> | <a href="<?php echo $urlval?>">Wiltshire</a> | <a href="<?php echo $urlval?>">Worcestershire</a>
          </p>
        </div>
        
      </div>
      <h6 class="text-center"><b>Wales</b></h6>
      <div class="row text-center justify-content-center mb-3">
        <div class="col-md-8">
          <p class="location-list">
            <a href="<?php echo $urlval?>">Blaenau Gwent</a> | <a href="<?php echo $urlval?>">Bridgend</a> | <a href="<?php echo $urlval?>">Caerphilly</a> | <a href="<?php echo $urlval?>">Cardiff</a> | 
            <a href="<?php echo $urlval?>">Carmarthenshire</a> | <a href="<?php echo $urlval?>">Ceredigion</a> | <a href="<?php echo $urlval?>">Conwy</a> | <a href="<?php echo $urlval?>">Denbighshire</a> | 
            <a href="<?php echo $urlval?>">Flintshire</a> | <a href="<?php echo $urlval?>">Gwynedd</a> | <a href="<?php echo $urlval?>">Isle of Anglesey</a> | <a href="<?php echo $urlval?>">Merthyr Tydfil</a> | 
            <a href="<?php echo $urlval?>">Monmouthshire</a> | <a href="<?php echo $urlval?>">Neath Port Talbot</a> | <a href="<?php echo $urlval?>">Newport</a> | <a href="<?php echo $urlval?>">Pembrokeshire</a> | 
            <a href="<?php echo $urlval?>">Powys</a> | <a href="<?php echo $urlval?>">Rhondda Cynon Taf</a> | <a href="<?php echo $urlval?>">Swansea</a> | <a href="<?php echo $urlval?>">Torfaen</a> | 
            <a href="<?php echo $urlval?>">Vale of Glamorgan</a> | <a href="<?php echo $urlval?>">Wrexham</a>
          </p>
        </div>
      </div>
      
      <h6 class="text-center"><b>Scotland</b></h6>
      <div class="row text-center justify-content-center mb-3">
        <div class="col-md-8">
          <p class="location-list">
            <a href="<?php echo $urlval?>">Aberdeen</a> | <a href="<?php echo $urlval?>">Aberdeenshire</a> | <a href="<?php echo $urlval?>">Angus</a> | <a href="<?php echo $urlval?>">Argyll and Bute</a> | 
            <a href="<?php echo $urlval?>">Clackmannanshire</a> | <a href="<?php echo $urlval?>">Dumfries and Galloway</a> | <a href="<?php echo $urlval?>">Dundee</a> | 
            <a href="<?php echo $urlval?>">East Ayrshire</a> | <a href="<?php echo $urlval?>">East Dunbartonshire</a> | <a href="<?php echo $urlval?>">East Lothian</a> | 
            <a href="<?php echo $urlval?>">East Renfrewshire</a> | <a href="<?php echo $urlval?>">Edinburgh</a> | <a href="<?php echo $urlval?>">Falkirk</a> | <a href="<?php echo $urlval?>">Fife</a> | 
            <a href="<?php echo $urlval?>">Glasgow</a> | <a href="<?php echo $urlval?>">Highland</a> | <a href="<?php echo $urlval?>">Inverclyde</a> | <a href="<?php echo $urlval?>">Midlothian</a> | 
            <a href="<?php echo $urlval?>">Moray</a> | <a href="<?php echo $urlval?>">Na H-Eileanan an Iar</a> | <a href="<?php echo $urlval?>">North Ayrshire</a> | 
            <a href="<?php echo $urlval?>">North Lanarkshire</a> | <a href="<?php echo $urlval?>">Orkney Islands</a> | <a href="<?php echo $urlval?>">Perth and Kinross</a> | 
            <a href="<?php echo $urlval?>">Renfrewshire</a> | <a href="<?php echo $urlval?>">Scottish Borders</a> | <a href="<?php echo $urlval?>">Shetland Islands</a> | 
            <a href="<?php echo $urlval?>">South Ayrshire</a> | <a href="<?php echo $urlval?>">South Lanarkshire</a> | <a href="<?php echo $urlval?>">Stirling</a> | 
            <a href="<?php echo $urlval?>">West Dunbartonshire</a> | <a href="<?php echo $urlval?>">West Lothian</a>
          </p>
        </div>
      </div>
      
      <h6 class="text-center"><b>Northern Ireland</b></h6>
      <div class="row text-center justify-content-center mb-3">
        <div class="col-md-6">
          <p class="location-list">
            <a href="<?php echo $urlval?>">Belfast</a> | <a href="<?php echo $urlval?>">County Antrim</a> | <a href="<?php echo $urlval?>">County Armagh</a> | 
            <a href="<?php echo $urlval?>">County Down</a> | <a href="<?php echo $urlval?>">County Fermanagh</a> | <a href="<?php echo $urlval?>">County Londonderry</a> | 
            <a href="<?php echo $urlval?>">County Tyrone</a>
          </p>
        </div>
        
      </div>
      <h6 class="text-center"><b>Other Cities</b></h6>
      <div class="row text-center justify-content-center mb-3">
        <div class="col-md-8">
          <p class="location-list">
            <a href="<?php echo $urlval?>">London</a> | <a href="<?php echo $urlval?>">Birmingham</a> | <a href="<?php echo $urlval?>">Leeds</a> | <a href="<?php echo $urlval?>">Glasgow</a> | 
            <a href="<?php echo $urlval?>">Sheffield</a> | <a href="<?php echo $urlval?>">Bradford</a> | <a href="<?php echo $urlval?>">Edinburgh</a> | <a href="<?php echo $urlval?>">Liverpool</a> | 
            <a href="<?php echo $urlval?>">Manchester</a> | <a href="<?php echo $urlval?>">Bristol</a> | <a href="<?php echo $urlval?>">Cardiff</a> | <a href="<?php echo $urlval?>">Coventry</a> | 
            <a href="<?php echo $urlval?>">Nottingham</a> | <a href="<?php echo $urlval?>">Leicester</a> | <a href="<?php echo $urlval?>">Sunderland</a> | <a href="<?php echo $urlval?>">Belfast</a> | 
            <a href="<?php echo $urlval?>">Aberdeen</a> | <a href="<?php echo $urlval?>">Bath</a> | <a href="<?php echo $urlval?>">Bournemouth</a> | <a href="<?php echo $urlval?>">Brighton</a> | 
            <a href="<?php echo $urlval?>">Cambridge</a> | <a href="<?php echo $urlval?>">Derby</a> | <a href="<?php echo $urlval?>">Dundee</a> | <a href="<?php echo $urlval?>">Exeter</a> | 
            <a href="<?php echo $urlval?>">Gloucester</a> | <a href="<?php echo $urlval?>">Guildford</a> | <a href="<?php echo $urlval?>">Hull</a> | <a href="<?php echo $urlval?>">Inverness</a> | 
            <a href="<?php echo $urlval?>">Ipswich</a> | <a href="<?php echo $urlval?>">Luton</a> | <a href="<?php echo $urlval?>">Middlesbrough</a> | <a href="<?php echo $urlval?>">Milton Keynes</a> | 
            <a href="<?php echo $urlval?>">Newcastle</a> | <a href="<?php echo $urlval?>">Norwich</a> | <a href="<?php echo $urlval?>">Oxford</a> | <a href="<?php echo $urlval?>">Plymouth</a> | 
            <a href="<?php echo $urlval?>">Portsmouth</a> | <a href="<?php echo $urlval?>">Reading</a> | <a href="<?php echo $urlval?>">Southampton</a> | 
            <a href="<?php echo $urlval?>">Stoke-on-Trent</a> | <a href="<?php echo $urlval?>">Swansea</a> | <a href="<?php echo $urlval?>">Swindon</a> | <a href="<?php echo $urlval?>">York</a>
          </p>
        </div>
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