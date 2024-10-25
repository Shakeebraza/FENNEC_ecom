<?php
require_once 'global.php';
include_once 'header.php';
?>
    <div class="container mt-4 mb-5">
        <div class="row">
            <div class="col-12 d-flex justify-content-between mb-4">
                <div>
                    <h1 class="jobhead">43,212 ads Job ads</h1>
                    <button class="btn btn-sell-car mt-2">Save search alert</button>
                </div>
                <div class="d-flex align-items-end">
                    <select class="form-select" style="width: auto;">
                        <option>Most recent first</option>
                        <option>Price: Low to high</option>
                        <option>Price: High to low</option>
                        <option>Price: Nearest first</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-9">
              <div class="d-flex justify-content-between align-items-center ">
                <div class="d-flex align-items-center mb-4">
                  <span class="me-2">VIEW AS</span>
                  <div
                    class="view-option icon-list"
                    data-cols="1"
                    title="List view"
                  >
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                  </div>
                  <div
                    class="view-option icon-grid-2"
                    data-cols="2"
                    title="Two column grid"
                  >
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                  </div>
                  <div
                    class="view-option icon-grid-3 active"
                    data-cols="3"
                    title="Three column grid"
                  >
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                  </div>
                </div>
              </div>
    
              <div class="container ">
                <div
                  id="product-grid"
                  class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4"
                >
                <?php
                
$productFind = $productFun->getProductsWithDetails(1, 16, []);
$products = $productFind['products'];
foreach($products as $proval){
    echo '
    <a href="'.$urlval.'detail.php?slug='.$proval['slug'].'">
        <div class="col">
            <div class="product-card">
                <img
                    src="'.$proval['image'].'"
                    class="card-img-top"
                    alt="'.$proval['name'].'"
                />
                <div class="heart-icon">
                    <i class="fas fa-heart"></i>
                </div>
                <div class="card-body">
                    <div class="p-3">
                        <h5 class="card-title">'.$proval['name'].'</h5>
                        <p class="card-text">
                            '.$proval['description'].'</p>
                        <p class="text-muted">'.$proval['country'].' | '.$proval['city'].'</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="product-price">$'.$proval['price'].'</span>
                            <span class="product-time text-muted small" style="font-size: 12px;">'.$proval['date'].'</span>
                        </div>
                    </div>
                    <button class="btn quick-add-btn">Quick Add</button>
                </div>
            </div>
        </div>
    </a>
    ';
}
?>
                  <!-- Product Card 1 -->
                  
                  <!-- Product Card 2 -->
                   <a href="<?php echo $urlval?>detail.php">
                  <div class="col">
                    <div class="product-card">
                      <img
                        src="https://imagedelivery.net/ePR8PyKf84wPHx7_RYmEag/4b9160a8-9109-4cdc-860d-0f1ddbca6700/86"
                        class="card-img-top"
                        alt="Classic Maroon Kameez Shalwar"
                      />
                      <div class="discount-badge">-25%</div>
                      <div class="card-body">
                        <div class="p-3">
                            <h5 class="card-title">Cleaner | Full-Time & Part-Time Cleaning Jobs | Immediate Start</h5>
                            <p class="card-text">
                              Romford, London <br />Self Employed | Recruitment Housekeep</p>
                            <p class="text-muted">Manchester</p>
                            <span class="product-price">£330</span>
                            <span class="product-time">Just now</span>
                        </div>
                        <button class="btn quick-add-btn">Quick Add</button>
                      </div>
                    </div>
                  </div>
                </a>
                  <!-- Product Card 3 -->
                   <a href="<?php echo $urlval?>detail.php">
                  <div class="col">
                    <div class="product-card">
                      <img
                        src="https://imagedelivery.net/ePR8PyKf84wPHx7_RYmEag/4b9160a8-9109-4cdc-860d-0f1ddbca6700/86"
                        class="card-img-top"
                        alt="Classic Maroon Kameez Shalwar"
                      />
                      <div class="discount-badge">-25%</div>
                      <div class="card-body">
                        <div class="p-3">
                          <h5 class="card-title">Cleaner | Full-Time & Part-Time Cleaning Jobs | Immediate Start</h5>
                          <p class="card-text">
                            Romford, London <br />Self Employed | Recruitment Housekeep</p>
                            <p class="text-muted">Manchester</p>
                            <span class="product-price">£330</span>
                            <span class="product-time">Just now</span>
                        </div>
                        <button class="btn quick-add-btn">Quick Add</button>
                      </div>
                    </div>
                  </div>
                </a>
                  <!-- Product Card 4 -->
                   <a href="<?php echo $urlval?>detail.php">
                  <div class="col">
                    <div class="product-card">
                      <img
                        src="https://imagedelivery.net/ePR8PyKf84wPHx7_RYmEag/4b9160a8-9109-4cdc-860d-0f1ddbca6700/86"
                        class="card-img-top"
                        alt="Classic Maroon Kameez Shalwar"
                      />
                      <div class="discount-badge">-25%</div>
                      <div class="card-body">
                        <div class="p-3">
                          <h5 class="card-title">Cleaner | Full-Time & Part-Time Cleaning Jobs | Immediate Start</h5>
                          <p class="card-text">
                            Romford, London <br />Self Employed | Recruitment Housekeep</p>
                            <p class="text-muted">Manchester</p>
                            <span class="product-price">£330</span>
                            <span class="product-time">Just now</span>
                        </div>
                        <button class="btn quick-add-btn">Quick Add</button>
                      </div>
                    </div>
                  </div>
                </a>
                  <!-- Product Card 5 -->
                   <a href="<?php echo $urlval?>detail.php">
                  <div class="col">
                    <div class="product-card">
                      <img
                        src="https://imagedelivery.net/ePR8PyKf84wPHx7_RYmEag/4b9160a8-9109-4cdc-860d-0f1ddbca6700/86"
                        class="card-img-top"
                        alt="Classic Maroon Kameez Shalwar"
                      />
                      <div class="discount-badge">-25%</div>
                      <div class="card-body">
                        <div class="p-3">
                          <h5 class="card-title">Cleaner | Full-Time & Part-Time Cleaning Jobs | Immediate Start</h5>
                          <p class="card-text">
                            Romford, London <br />Self Employed | Recruitment Housekeep</p>
                            <p class="text-muted">Manchester</p>
                            <span class="product-price">£330</span>
                            <span class="product-time">Just now</span>
                        </div>
                        <button class="btn quick-add-btn">Quick Add</button>
                      </div>
                    </div>
                  </div>
                </a>
                </div>
              </div>
            </div>
            <div class="col-md-3 left-side">
              <div class="bg-light p-4 rounded">
              <div class="mb-4">
                  <h5>Location</h5>
                  <div class="input-group mb-3">
                      <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
                      <input type="text" class="form-control" placeholder="United Kingdom">
                  </div>
                  <div class="d-flex justify-content-between align-items-center mb-3">
                      <select name="Miles" id="Miles" class="form-select w-75 custom-select">
                          <option value="select">Miles</option>
                          <option value="5">5 miles</option>
                          <option value="10">10 miles</option>
                      </select>
                      <button class="btn btn-sell-car ms-3 w-50 custom-button">Update</button>
                  </div>
              </div>
              <div class="">
                  <h5>Category</h5>
                  <div class="ms-3">
                      <div class="custom-category">
                          <p>All Categories</p>
                      </div>
                      <div class="custom-category">
                          <p>Jobs</p>
                      </div>
                      <div class="custom-category">
                          <p>Teaching & Education <span class="text-muted">(5637)</span></p>
                      </div>
                      <div class="custom-category">
                          <p>Transport & Logistics <span class="text-muted">(4516)</span></p>
                      </div>
                      <div class="custom-category">
                          <p>Manufacturing & Industrial <span class="text-muted">(4270)</span></p>
                      </div>
                      <div class="custom-category">
                          <p>Retail & FMCG <span class="text-muted">(3147)</span></p>
                      </div>
                      <div class="custom-category">
                          <p>Engineering <span class="text-muted">(3070)</span></p>
                      </div>
                  </div>
                  <div class="more-categories" id="moreCategories" style="display: none;">
                      <div class="ms-3 mt-2">
                          <div class="custom-category">
                              <p>Sales <span class="text-muted">(2911)</span></p>
                          </div>
                          <div class="custom-category">
                              <p>Agriculture & Farming <span class="text-muted">(2371)</span></p>
                          </div>
                          <div class="custom-category">
                              <p>Financial Services <span class="text-muted">(2365)</span></p>
                          </div>
                          <div class="custom-category">
                              <p>Customer Service & Call Centre <span class="text-muted">(2231)</span></p>
                          </div>
                          <div class="custom-category">
                              <p>Healthcare & Medical <span class="text-muted">(1772)</span></p>
                          </div>
                          <div class="custom-category">
                              <p>Accountancy <span class="text-muted">(1562)</span></p>
                          </div>
                          <div class="custom-category">
                              <p>Construction & Property <span class="text-muted">(1454)</span></p>
                          </div>
                          <div class="custom-category">
                              <p>Housekeeping & Cleaning <span class="text-muted">(1309)</span></p>
                          </div>
                          <div class="custom-category">
                              <p>Admin, Secretarial & PA <span class="text-muted">(1181)</span></p>
                          </div>
                          <div class="custom-category">
                              <p>Recruitment <span class="text-muted">(805)</span></p>
                          </div>
                          <div class="custom-category">
                              <p>HR <span class="text-muted">(743)</span></p>
                          </div>
                          <div class="custom-category">
                              <p>Security <span class="text-muted">(720)</span></p>
                          </div>
                          <div class="custom-category">
                              <p>Hospitality & Catering <span class="text-muted">(656)</span></p>
                          </div>
                          <div class="custom-category">
                              <p>Social & Care Work <span class="text-muted">(595)</span></p>
                          </div>
                          <div class="custom-category">
                              <p>Legal <span class="text-muted">(491)</span></p>
                          </div>
                          <div class="custom-category">
                              <p>Marketing, Advertising & PR <span class="text-muted">(468)</span></p>
                          </div>
                          <div class="custom-category">
                              <p>Driving & Automotive <span class="text-muted">(450)</span></p>
                          </div>
                          <div class="custom-category">
                              <p>Media, Digital & Creative <span class="text-muted">(196)</span></p>
                          </div>
                          <div class="custom-category">
                              <p>Childcare <span class="text-muted">(173)</span></p>
                          </div>
                          <div class="custom-category">
                              <p>Health & Beauty <span class="text-muted">(162)</span></p>
                          </div>
                          <div class="custom-category">
                              <p>Leisure & Tourism <span class="text-muted">(133)</span></p>
                          </div>
                          <div class="custom-category">
                              <p>Computing & IT <span class="text-muted">(83)</span></p>
                          </div>
                          <div class="custom-category">
                              <p>Gardening <span class="text-muted">(53)</span></p>
                          </div>
                          <div class="custom-category">
                              <p>Charity <span class="text-muted">(29)</span></p>
                          </div>
                          <div class="custom-category">
                              <p>Performing Arts <span class="text-muted">(24)</span></p>
                          </div>
                          <div class="custom-category">
                              <p>Animals <span class="text-muted">(14)</span></p>
                          </div>
                          <div class="custom-category">
                              <p>Arts & Heritage <span class="text-muted">(13)</span></p>
                          </div>
                          <div class="custom-category">
                              <p>Purchasing & Procurement <span class="text-muted">(7)</span></p>
                          </div>
                          <div class="custom-category">
                              <p>Scientific & Research <span class="text-muted">(6)</span></p>
                          </div>
                          <div class="custom-category">
                              <p>Sport, Fitness & Leisure <span class="text-muted">(5)</span></p>
                          </div>
                      </div>
                  </div>
                  <a href="<?php echo $urlval?>" class="show pt-1" id="toggleCategories">Show 30 more</a>
                  <hr>
                  <div class="mb-4">
                      <h5>Contract type</h5>
                      <div class="ms-3">
                          <div class="custom-category">
                              <label>
                                  <input type="radio" name="contractType" value="any">
                                  Any <span class="text-muted">(23,762)</span>
                              </label>
                          </div>
                          <div class="custom-category">
                              <label>
                                  <input type="radio" name="contractType" value="cashInHand">
                                  Cash in Hand <span class="text-muted">(2,055)</span>
                              </label>
                          </div>
                          <div class="custom-category">
                              <label>
                                  <input type="radio" name="contractType" value="contract">
                                  Contract <span class="text-muted">(2,396)</span>
                              </label>
                          </div>
                          <div class="more-contract-types" id="moreContractTypes" style="display: none;">
                              <div class="custom-category">
                                  <label>
                                      <input type="radio" name="contractType" value="freelance">
                                      Freelance <span class="text-muted">(1,032)</span>
                                  </label>
                              </div>
                              <div class="custom-category">
                                  <label>
                                      <input type="radio" name="contractType" value="temporary">
                                      Temporary <span class="text-muted">(678)</span>
                                  </label>
                              </div>
                          </div>
                      </div>
                      <a href="<?php echo $urlval?>" class="show pt-1" id="toggleContractTypes">Show 2 more</a>
                  </div>
                  <hr>
                  <div class="mb-4">
                      <h5>Recruiter Type</h5>
                      <div class="ms-3">
                          <div class="custom-category">
                              <label>
                                  <input type="radio" name="recruiterType" value="any">
                                  Any <span class="text-muted">(40,542)</span>
                              </label>
                          </div>
                          <div class="custom-category">
                              <label>
                                  <input type="radio" name="recruiterType" value="directEmployer">
                                  Direct Employer <span class="text-muted">(38,450)</span>
                              </label>
                          </div>
                          <div class="custom-category">
                              <label>
                                  <input type="radio" name="recruiterType" value="recruiter">
                                  Recruiter <span class="text-muted">(2,092)</span>
                              </label>
                          </div>
                          <div class="more-recruiter-types" id="moreRecruiterTypes" style="display: none;">
                              <div class="custom-category">
                                  <label>
                                      <input type="radio" name="recruiterType" value="directEmployer">
                                      Direct Employer <span class="text-muted">(38,450)</span>
                                  </label>
                              </div>
                              <div class="custom-category">
                                  <label>
                                      <input type="radio" name="recruiterType" value="directEmployer">
                                      Direct Employer <span class="text-muted">(38,450)</span>
                                  </label>
                              </div>
                          </div>
                      </div>
                      <a href="<?php echo $urlval?>" class="show pt-1" id="toggleRecruiterTypes">Show more</a>
                  </div>
                  <hr>
                  <div class="mb-4">
                      <h5>Job Type</h5>
                      <div class="ms-3">
                          <div class="custom-category">
                              <div class="custom-category">
                                  <label>
                                      <input type="radio" name="jobType" value="any">
                                      Any <span class="text-muted">(42,000)</span>
                                  </label>
                              </div>
                              <div class="custom-category">
                                  <label>
                                      <input type="radio" name="jobType" value="fullTime">
                                      Full Time <span class="text-muted">(37,451)</span>
                                  </label>
                              </div>
                              <div class="custom-category">
                                  <label>
                                      <input type="radio" name="jobType" value="evening">
                                      Evening <span class="text-muted">(9)</span>
                                  </label>
                              </div>
                              <div class="custom-category">
                                  <label>
                                      <input type="radio" name="jobType" value="morning">
                                      Morning <span class="text-muted">(12)</span>
                                  </label>
                              </div>
                              <div class="custom-category">
                                  <label>
                                      <input type="radio" name="jobType" value="nights">
                                      Nights <span class="text-muted">(7)</span>
                                  </label>
                              </div>
                              <label>
                                  <input type="radio" name="jobType" value="partTime">
                                  Part Time <span class="text-muted">(4,468)</span>
                              </label>
                          </div>
                          <div class="more-job-types" id="moreJobTypes" style="display: none;">

                              <div class="custom-category">
                                  <label>
                                      <input type="radio" name="jobType" value="saturdayJob">
                                      Saturday job <span class="text-muted">(3)</span>
                                  </label>
                              </div>
                              <div class="custom-category">
                                  <label>
                                      <input type="radio" name="jobType" value="sundayJob">
                                      Sunday job <span class="text-muted">(2)</span>
                                  </label>
                              </div>
                              <div class="custom-category">
                                  <label>
                                      <input type="radio" name="jobType" value="termTime">
                                      Term Time <span class="text-muted">(6)</span>
                                  </label>
                              </div>
                              <div class="custom-category">
                                  <label>
                                      <input type="radio" name="jobType" value="weekends">
                                      Weekends <span class="text-muted">(42)</span>
                                  </label>
                              </div>
                          </div>
                      </div>
                      <a href="<?php echo $urlval?>" class="show pt-1" id="toggleJobTypes">Show more</a>
                  </div>
                  <hr>
                  <div class="mb-4">
                      <h5>Job Level</h5>
                      <div class="ms-3">
                          <div class="custom-category">
                              <label>
                                  <input type="radio" name="jobLevel" value="any">
                                  Any <span class="text-muted">(2,766)</span>
                              </label>
                          </div>
                          <div class="custom-category">
                              <label>
                                  <input type="radio" name="jobLevel" value="apprenticeship">
                                  Apprenticeship <span class="text-muted">(46)</span>
                              </label>
                          </div>
                          <div class="custom-category">
                              <label>
                                  <input type="radio" name="jobLevel" value="experienced">
                                  Experienced <span class="text-muted">(2,506)</span>
                              </label>
                          </div>
                          <div class="custom-category">
                              <label>
                                  <input type="radio" name="jobLevel" value="graduate">
                                  Graduate <span class="text-muted">(179)</span>
                              </label>
                          </div>
                          <div class="custom-category">
                              <label>
                                  <input type="radio" name="jobLevel" value="internship">
                                  Internship <span class="text-muted">(7)</span>
                              </label>
                          </div>
                          <div class="custom-category">
                              <label>
                                  <input type="radio" name="jobLevel" value="management">
                                  Management <span class="text-muted">(28)</span>
                              </label>
                          </div>
                      </div>
                  </div>
                  <hr>
                  <div class="mb-4">
                      <h5>Language</h5>
                      <div class="ms-3">
                          <div class="custom-category">
                              <label>
                                  <input type="radio" name="language" value="any">
                                  Any <span class="text-muted">(4,483)</span>
                              </label>
                          </div>
                          <div class="custom-category">
                              <label>
                                  <input type="radio" name="language" value="arabic">
                                  Arabic <span class="text-muted">(5)</span>
                              </label>
                          </div>
                          <div class="custom-category">
                              <label>
                                  <input type="radio" name="language" value="filipino">
                                  Filipino <span class="text-muted">(3)</span>
                              </label>
                          </div>
                          <div class="custom-category">
                              <label>
                                  <input type="radio" name="language" value="english">
                                  English <span class="text-muted">(4,405)</span>
                              </label>
                          </div>
                          <div class="custom-category">
                              <label>
                                  <input type="radio" name="language" value="french">
                                  French <span class="text-muted">(14)</span>
                              </label>
                          </div>
                          <div class="custom-category">
                              <label>
                                  <input type="radio" name="language" value="german">
                                  German <span class="text-muted">(1)</span>
                              </label>
                          </div>
                          <div class="more-languages" id="moreLanguages" style="display: none;">
                              <div class="custom-category">
                                  <label>
                                      <input type="radio" name="language" value="greek">
                                      Greek <span class="text-muted">(3)</span>
                                  </label>
                              </div>
                              <div class="custom-category">
                                  <label>
                                      <input type="radio" name="language" value="hindi">
                                      Hindi <span class="text-muted">(3)</span>
                                  </label>
                              </div>
                              <div class="custom-category">
                                  <label>
                                      <input type="radio" name="language" value="italian">
                                      Italian <span class="text-muted">(3)</span>
                                  </label>
                              </div>
                              <div class="custom-category">
                                  <label>
                                      <input type="radio" name="language" value="mandarin">
                                      Mandarin <span class="text-muted">(2)</span>
                                  </label>
                              </div>
                              <div class="custom-category">
                                  <label>
                                      <input type="radio" name="language" value="polish">
                                      Polish <span class="text-muted">(9)</span>
                                  </label>
                              </div>
                              <div class="custom-category">
                                  <label>
                                      <input type="radio" name="language" value="portuguese">
                                      Portuguese <span class="text-muted">(1)</span>
                                  </label>
                              </div>
                              <div class="custom-category">
                                  <label>
                                      <input type="radio" name="language" value="punjabi">
                                      Punjabi <span class="text-muted">(2)</span>
                                  </label>
                              </div>
                              <div class="custom-category">
                                  <label>
                                      <input type="radio" name="language" value="romanian">
                                      Romanian <span class="text-muted">(1)</span>
                                  </label>
                              </div>
                              <div class="custom-category">
                                  <label>
                                      <input type="radio" name="language" value="russian">
                                      Russian <span class="text-muted">(4)</span>
                                  </label>
                              </div>
                              <div class="custom-category">
                                  <label>
                                      <input type="radio" name="language" value="spanish">
                                      Spanish <span class="text-muted">(14)</span>
                                  </label>
                              </div>
                              <div class="custom-category">
                                  <label>
                                      <input type="radio" name="language" value="thai">
                                      Thai <span class="text-muted">(3)</span>
                                  </label>
                              </div>
                              <div class="custom-category">
                                  <label>
                                      <input type="radio" name="language" value="turkish">
                                      Turkish <span class="text-muted">(1)</span>
                                  </label>
                              </div>
                              <div class="custom-category">
                                  <label>
                                      <input type="radio" name="language" value="urdu">
                                      Urdu <span class="text-muted">(9)</span>
                                  </label>
                              </div>
                          </div>
                          <a href="<?php echo $urlval?>" class="show pt-1 " id="toggleLanguages">Show more</a>
                      </div>
                  </div>
                  <hr>
                  <div class=" mt-5">
                      <div class="card" style="max-width: 300px;">
                          <div class="card-body">
                              <h5 class="card-title mb-3">Salary</h5>
                              <div class="mb-3">
                                  <select class="form-select">
                                      <option selected>No min</option>
                                      <option value="30000">$30,000</option>
                                      <option value="50000">$50,000</option>
                                      <option value="70000">$70,000</option>
                                      <option value="100000">$100,000</option>
                                  </select>
                              </div>
                              <div class="mb-3">
                                  <select class="form-select">
                                      <option selected>No max</option>
                                      <option value="50000">$50,000</option>
                                      <option value="70000">$70,000</option>
                                      <option value="100000">$100,000</option>
                                      <option value="150000">$150,000</option>
                                  </select>
                              </div>
                              <button class="btn btn-sell-car w-100">Update</button>
                          </div>
                      </div>
                  </div>
              </div>
              </div>            
          </div>
        </div>
    </div>
    <?php
    include_once 'footer.php';
    ?>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
            <script src="js/index.js"></script>
            <script src="js/header.js"></script>
            <script src="/js/forsale.js"></script>
    </body>
    </html>