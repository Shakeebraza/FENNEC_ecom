<?php
              $logoData =$fun->getBox('box1');
              $logo=$urlval.$logoData[0]['image'];
?>

<!DOCTYPE php>
<php lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Fennec</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
    />
    <link rel="stylesheet" href="<?php echo $urlval?>custom/asset/styles.css" />
    <style>
      .custom-slider-container {
  width: 100%;
  position: relative;
}

.custom-slide {
  width: 100%;
  display: none;
}

.custom-slide-image {
  width: 100%;
  height: 70vh;
  object-fit: cover;
  filter: brightness(0.6);
}

.custom-slide-content {
  position: absolute;
  top: 0;
  left: 0;
  z-index: 5;
  width: 100%;
  height: 100%;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  gap: 1rem;
  text-align: center;
  padding: 1rem;
}

.custom-slide-title {
  width: 100%;
  max-width: 50rem;
  color: white;
  font-size: 2rem;
  font-weight: 500;
  text-transform: capitalize;
}

.custom-slide-desc {
  width: 100%;
  max-width: 50rem;
  color: lightgray;
  font-size: 1rem;
  font-weight: 300;
}

.custom-slide-btn {
  color: black;
  background-color: white;
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 0.5rem;
  font-size: 1.2rem;
  font-weight: 500;
  margin-top: 1rem;
  border-radius: 0.5rem;
  padding: 0.5rem 1rem;
  text-transform: capitalize;
  transition: ease 0.3s;
}

.custom-slide-number-container {
  position: absolute;
  bottom: 1rem;
  left: 1rem;
  z-index: 5;
  font-size: 1.5rem;
  display: flex;
  gap: 0.5rem;
  align-items: center;
  color: rgba(211, 211, 211, 0.788);
  letter-spacing: 0.2rem;
}

.custom-slider-nav {
  position: absolute;
  bottom: 1rem;
  right: 1rem;
  z-index: 5;
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 1rem;
}

.custom-slider-nav-btn {
  cursor: pointer;
  background-color: rgba(211, 211, 211, 0.226);
  color: white;
  font-size: 1.5rem;
  padding: 0.5rem;
  border-radius: 0.5rem;
  display: flex;
  align-items: center;
  justify-content: center;
  transition: ease 0.3s;
}

.custom-dot-container {
  position: absolute;
  bottom: 1rem;
  left: 0;
  z-index: 4;
  width: 100%;
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 0.5rem;
}

.custom-dot {
  cursor: pointer;
  height: 1rem;
  width: 1rem;
  background-color: rgba(211, 211, 211, 0.226);
  border-radius: 50%;
  display: inline-block;
  transition: ease 0.3s;
}

.custom-active,
.custom-dot:hover {
  background-color: white;
}

.custom-fade {
  animation-name: custom-fade;
  animation-duration: 1s;
}

@keyframes custom-fade {
  from {
    opacity: 0.8;
  }
  to {
    opacity: 1;
  }
}

    </style>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark ">
      <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="index.php" style="text-decoration: none;">
            <img
              src="<?php echo $logo ?>"
              alt="Fennec Logo"
              style="max-width: 100%; margin-right: 10px;"
            />
            <span style="font-size: 1.7rem; font-weight: bold; color: inherit;">Fennec</span>
          </a>
        <button
          id="menuToggle"
          class="navbar-toggler"
          type="button"
          style="display: none"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <form class="d-flex mx-lg-auto my-lg-0 flex-column flex-lg-row w-100 justify-content-center custom-form ">
            <div class="input-group w-50 me-lg-1 mb-2 mb-lg-0 custom-form ">
              <span class=" input-group-text bg-white border-0 rounded-0">
                <i class="fa-solid fa-magnifying-glass"></i>
              </span>
              <input
                class="form-control p-2 rounded-0 search-input"
                type="search"
                placeholder="Search Fennec"
                aria-label="Search"
              />
            </div>
            <div class="input-group w-25 mb-2 mb-lg-0 custom-form-location ">
                <span class="input-group-text rounded-0 bg-light border-0">
                  <i class="fa-solid fa-location-dot me-2"></i>
                </span>
                <select class="form-select rounded-0 location-select custom-select">
                  <option selected>United Kingdom</option>
                  <option>United States</option>
                  <option>Canada</option>
                  <option>Germany</option>
                </select>
              </div>
            <button class="btn btn-success rounded-0" type="submit">
              <i class="fa-solid fa-magnifying-glass fa-magnifying-glass2"></i>
            </button>
          </form> 
          
          <div class="d-flex custom-loginRegister">
            <a href="LoginRegister.php" class="btn custom-btn me-2 mb-lg-0 d-flex flex-column align-items-center">
              <i class="fa-solid fa-dollar-sign mb-1"></i>
              <span class="new-btn">Sell</span>
            </a>
            <a href="LoginRegister.php" class="btn custom-btn d-flex flex-column align-items-center">
              <i class="fa-solid fa-user mb-1 "></i>
              <span class="new-btn">Login/Register</span>
            </a>
          </div>
      </div>
    </nav>
    <!-- mobile ka  h -->
    <div id="mySidebar" class="sidebar">
      <a href="javascript:void(0)" class="closebtn" onclick="closeNav()"
        >&times;</a
      >
      <a href="<?php echo $urlval?>">Home</a>
      <a href="<?php echo $urlval?>">Post an Ad</a>
      <a href="<?php echo $urlval?>">Manage my Ads</a>
      <a href="<?php echo $urlval?>">Messages</a>
      <a href="<?php echo $urlval?>">Favourites</a>
      <a href="<?php echo $urlval?>">My Alerts</a>
      <a href="<?php echo $urlval?>">My Details</a>
      <a href="<?php echo $urlval?>">Manage my Job Ads</a>
      <a href="<?php echo $urlval?>">Help & Contact</a>
      <a href="<?php echo $urlval?>">Login</a>
    </div>
    
  <div class="nav-sub-menu-ct">
    <div class="nav-menu-32323">
      <div class="nav-menu-3344343">
    <div class="nav-sub-menu-inn1">
    <div class="nav-men-sub-ct-inn">
      <ul>
    <li class="car-vhcl-menu"><a href="<?php echo $urlval?>CarsVehicles.php">Cars & Vehicles</a></li>
    <li class="for-sale-menu"><a href="<?php echo $urlval?>forsale.php">For Sale</a></li>
    <li class="property21"><a href="<?php echo $urlval?>property.php">Property</a></li>
    <li class="jobs21"><a href="<?php echo $urlval?>job.php">Jobs  </a></li>
    <li class="Services21"><a href="<?php echo $urlval?>Services.php">Services  </a></li>
    <li class="Community21"><a href="<?php echo $urlval?>Community.php">Community</a></li>
    <li class="Pets21"><a href="<?php echo $urlval?>Pets.php">Pets</a></li>
  </ul>
    </div>
  </div>
  </div>
  
  
  
  
  <!-- ................................................... nav bar sub menu 1........................................................................... -->
    <div class="nav-snmn">
      <div class="nav-main-dwdisnmn">
      <div class="nav-snm-innnn">
        <h2>Browse by</h2>
        <div class="div-nv-sb-menu">
        <ul>
          <li><a class="" href="forsale.php">Cars</a></li>
          <li>
            <a class="" href="<?php echo $urlval?>">Motorbikes & Scooters</a>
          </li>
          <li><a class="" href="<?php echo $urlval?>">Vans</a></li>
          <li>
            <a class="" href="<?php echo $urlval?>">Campervans & Motorhomes</a>
          </li>
          <li><a class="" href="<?php echo $urlval?>">Caravans</a></li>
          <li><a class="" href="<?php echo $urlval?>">Trucks</a></li>
          </ul>
          <ul>
          <li><a class="" href="<?php echo $urlval?>">Plant & Tractors</a></li>
          <li><a class="" href="<?php echo $urlval?>">Other Vehicles</a></li>
          <li><a class="" href="<?php echo $urlval?>">Accessories</a></li>
          <li><a class="" href="<?php echo $urlval?>">Parts</a></li>
          <li><a class="" href="<?php echo $urlval?>">Wanted</a></li>
        <ul>
      </div>
      </div>
      <div class="div-main-sec2-sub">
        <div class="div-main-sec2-sub-inner">
        <div class="div-main-sec2-sub-inner5413541">
        <h2>Discover more in our guides</h2>
        <div class="div-main-sec2-submenu-2">
      <ul>
        <li><a href="<?php echo $urlval?>">Car Guides</a></li>
        <li><a href="<?php echo $urlval?>">
          Car Reviews</a></li>
        <li><a href="<?php echo $urlval?>">Best Cars</a></li>
        <li><a href="<?php echo $urlval?>">Car Advice  </a></li>
        </ul>
  </div>
  </div>
      <div class="div-img-right-submenu">
        <img src="https://www.gumtree.com/assets/frontend/cars-guide.84c7d8c8754c04a88117e49a84535413.png " alt="">
      </div>
   
  </div>
  </div>
  </div>
    </div>
  
  <!-- ................................................... nav bar sub menu 2........................................................................... -->
  <div class="nav-snmn2">
    <div class="nav-main-dwdisnmn">
    <div class="nav-snm-innnn2">
      <h2>Browse by</h2>
      <div class="div-nv-sb-menu">
      <ul>
        <li><a class="" href="<?php echo $urlval?>">Appliances</a></li>
        <li>
          <a class="" href="<?php echo $urlval?>">Audio & Stereo </a>
        </li>
        <li><a class="" href="<?php echo $urlval?>">Baby & Kids Stuff</a></li>
        <li>
          <a class="" href="<?php echo $urlval?>">
            Cameras, Camcorders & Studio Equipment</a>
        </li>
        <li><a class="" href="<?php echo $urlval?>">Christmas Decorations</a></li>
        <li><a class="" href="<?php echo $urlval?>">Clothes, Footwear & Accessories</a></li>
  
        </ul>
      <ul>
        <li><a class="" href="<?php echo $urlval?>">Computers & Software</a></li>
        <li>
          <a class="" href="<?php echo $urlval?>">DIY Tools & Materials </a>
        </li>
        <li><a class="" href="<?php echo $urlval?>">Health & Beauty</a></li>
        <li>
          <a class="" href="<?php echo $urlval?>">
            Home & Garden</a>
        </li>
        <li><a class="" href="<?php echo $urlval?>">House Clearance</a></li>
        <li><a class="" href="<?php echo $urlval?>">Music, Films, Books & Games</a></li>
  
        </ul>
      <ul>
        <li><a class="" href="<?php echo $urlval?>">
          Musical Instruments & DJ Equipment</a></li>
        <li>
          <a class="" href="<?php echo $urlval?>">Office Furniture & Equipment </a>
        </li>
        <li><a class="" href="<?php echo $urlval?>">
          Phones, Mobile Phones & Telecoms</a></li>
        <li>
          <a class="" href="<?php echo $urlval?>">
            Sports, Leisure & Travel</a>
        </li>
        <li><a class="" href="<?php echo $urlval?>">Tickets</a></li>
        <li><a class="" href="<?php echo $urlval?>">
          TV, DVD, Blu-Ray & Videos</a></li>
        </ul>
      <ul>
        <li><a class="" href="<?php echo $urlval?>">Video Games & Consoles</a></li>
        <li>
          <a class="" href="<?php echo $urlval?>">Freebies </a>
        </li>
        <li><a class="" href="<?php echo $urlval?>">Other Goods</a></li>
        <li>
          <a class="" href="<?php echo $urlval?>">
            Stuff Wanted</a>
        </li>
        <li><a class="" href="<?php echo $urlval?>"> Swap Shop</a></li>
        </ul>
    </div>
    </div>
    
  </div>
  </div>
  
  
  
  <!-- ................................................... nav bar sub menu 3........................................................................... -->
  <div class="nav-snmn3">
    <div class="nav-main-dwdisnmn">
    <div class="nav-snm-innnn2">
      <h2>Browse by</h2>
      <div class="div-nv-sb-menu">
      <ul>
        <li><a class="" href="forsale.php">For Sale</a></li>
        <li>
          <a class="" href="<?php echo $urlval?>">To Rent</a>
        </li>
        <li><a class="" href="<?php echo $urlval?>">To Share</a></li>
        </ul>
      <ul>
        <li><a class="" href="<?php echo $urlval?>">To Swap</a></li>
        <li>
          <a class="" href="<?php echo $urlval?>">Commercial</a>
        </li>
        <li><a class="" href="<?php echo $urlval?>">Parking & Garage</a></li>
        </ul>
      <ul>
        <li><a class="" href="<?php echo $urlval?>">
          International</a></li>
        <li>
          <a class="" href="<?php echo $urlval?>">Holiday Rentals </a>
        </li>
        <li><a class="" href="<?php echo $urlval?>">Property Wanted</a></li>
        </ul>
      </div>
    </div> 
  </div>
  </div>
  <!-- ................................................... nav bar sub menu 4........................................................................... -->
  <div class="nav-snmn4">
    <div class="nav-main-dwdisnmn">
    <div class="nav-snm-innnn2">
      <h2>Browse by</h2>
      <div class="div-nv-sb-menu">
      <ul>
        <li><a class="" href="<?php echo $urlval?>">Accountancy</a></li>
        <li>
          <a class="" href="<?php echo $urlval?>">Admin, Secretarial & PA</a>
        </li>
        <li><a class="" href="<?php echo $urlval?>">Agriculture & Farming</a></li>
        <li><a class="" href="<?php echo $urlval?>">Childcare</a></li>
        <li><a class="" href="<?php echo $urlval?>">Computing & IT</a></li>
       
  
        </ul>
      <ul>
        <li><a class="" href="<?php echo $urlval?>">Animals</a></li>
        <li>
          <a class="" href="<?php echo $urlval?>">Arts & Heritage</a>
        </li>
        <li><a class="" href="<?php echo $urlval?>">Charity</a></li>
        <li><a class="" href="<?php echo $urlval?>">Construction & Property</a></li>
        <li><a class="" href="<?php echo $urlval?>">Customer Service & Call Centre</a></li>
      </ul>
      <ul>
        <li><a class="" href="<?php echo $urlval?>">
          Financial Services</a></li>
        <li>
          <a class="" href="<?php echo $urlval?>">Gardening </a>
        </li>
        <li><a class="" href="<?php echo $urlval?>">Health & Beauty</a></li>
        <li><a class="" href="<?php echo $urlval?>">
          Driving & Automotive</a></li>
        <li><a class="" href="<?php echo $urlval?>">Engineering</a></li>
        </ul>
      <ul>
        <li><a class="" href="<?php echo $urlval?>">
          Legal</a></li>
        <li>
          <a class="" href="<?php echo $urlval?>">Leisure & Tourism </a>
        </li>
        <li><a class="" href="<?php echo $urlval?>">Manufacturing & Industrial</a></li>
        <li><a class="" href="<?php echo $urlval?>">
          Marketing, Advertising & PR</a></li>
        <li><a class="" href="<?php echo $urlval?>">
          Media, Digital & Creative</a></li>
        </ul>
    </div>
    </div> 
  </div>
  </div>
  <!-- ................................................... nav bar sub menu 5........................................................................... -->
  <div class="nav-snmn5">
    <div class="nav-main-dwdisnmn">
    <div class="nav-snm-innnn2">
      <h2>Browse by</h2>
      <div class="div-nv-sb-menu">
      <ul>
        <li><a class="" href="<?php echo $urlval?>">Accountancy</a></li>
        <li>
          <a class="" href="<?php echo $urlval?>">Admin, Secretarial & PA</a>
        </li>
        <li><a class="" href="<?php echo $urlval?>">Agriculture & Farming</a></li>
        <li><a class="" href="<?php echo $urlval?>">Childcare</a></li>
        <li><a class="" href="<?php echo $urlval?>">Computing & IT</a></li>
        </ul>
      <ul>
        <li><a class="" href="<?php echo $urlval?>">Animals</a></li>
        <li>
          <a class="" href="<?php echo $urlval?>">Arts & Heritage</a>
        </li>
        <li><a class="" href="<?php echo $urlval?>">Charity</a></li>
        <li><a class="" href="<?php echo $urlval?>">Construction & Property</a></li>
        <li><a class="" href="<?php echo $urlval?>">Customer Service & Call Centre</a></li>
      </ul>
      <ul>
        <li><a class="" href="<?php echo $urlval?>">
          Financial Services</a></li>
        <li>
          <a class="" href="<?php echo $urlval?>">Gardening </a>
        </li>
        <li><a class="" href="<?php echo $urlval?>">Health & Beauty</a></li>
        <li><a class="" href="<?php echo $urlval?>">
          Driving & Automotive</a></li>
        <li><a class="" href="<?php echo $urlval?>">Engineering</a></li>
  </ul>
      <ul>
        <li><a class="" href="<?php echo $urlval?>">
          Legal</a></li>
        <li>
          <a class="" href="<?php echo $urlval?>">Leisure & Tourism </a>
        </li>
        <li><a class="" href="<?php echo $urlval?>">Manufacturing & Industrial</a></li>
        <li><a class="" href="<?php echo $urlval?>">
          Marketing, Advertising & PR</a></li>
        <li><a class="" href="<?php echo $urlval?>">
          Media, Digital & Creative</a></li>
        </ul>
  </div>
    </div> 
  </div>
  </div>
  <!-- ................................................... nav bar sub menu 6........................................................................... -->
  <div class="nav-snmn6">
    <div class="nav-main-dwdisnmn">
    <div class="nav-snm-innnn2">
      <h2>Browse by</h2>
      <div class="div-nv-sb-menu">
      <ul>
        <li><a class="" href="<?php echo $urlval?>">Business & Office</a></li>
        <li>
          <a class="" href="<?php echo $urlval?>">Childcare</a>
        </li>
        <li><a class="" href="<?php echo $urlval?>">Clothing</a></li>
        <li><a class="" href="<?php echo $urlval?>">Computers & Telecoms</a></li>
      </ul>
      <ul>
        <li><a class="" href="<?php echo $urlval?>">Entertainment</a></li>
        <li>
          <a class="" href="<?php echo $urlval?>">Finance & Legal</a>
        </li>
        <li><a class="" href="<?php echo $urlval?>">
          Food & Drink</a></li>
        <li><a class="" href="<?php echo $urlval?>">Goods Suppliers & Retailers</a></li>
        </ul>
      <ul>
        <li><a class="" href="<?php echo $urlval?>">Health & Beauty</a></li>
        <li>
          <a class="" href="<?php echo $urlval?>">Motoring</a>
        </li>
        <li><a class="" href="Pets.php">Pets</a></li>
        <li><a class="" href="<?php echo $urlval?>">Driving & Automotive</a></li>
        </ul>
      <ul>
        <li><a class="" href="<?php echo $urlval?>">Property & Maintenance</a></li>
        <li>
          <a class="" href="<?php echo $urlval?>"> Tradesmen & Construction </a>
        </li>
        <li><a class="" href="<?php echo $urlval?>">Transport</a></li>
        <li><a class="" href="<?php echo $urlval?>">Travel & Tourism</a></li> 
  
        </ul>
    </div>
    </div>
  </div>
  </div>
  <!-- ................................................... nav bar sub menu 7........................................................................... -->
  <div class="nav-snmn7">
    <div class="nav-main-dwdisnmn">
    <div class="nav-snm-innnn2">
      <h2>Browse by</h2>
      <div class="div-nv-sb-menu">
      <ul>
        <li><a class="" href="<?php echo $urlval?>">Business & Office</a></li>
        <li>
          <a class="" href="<?php echo $urlval?>">Childcare</a>
        </li>
        <li><a class="" href="<?php echo $urlval?>">Clothing</a></li>
        <li><a class="" href="<?php echo $urlval?>">Computers & Telecoms</a></li>
        </ul>
      <ul>
        <li><a class="" href="<?php echo $urlval?>">Entertainment</a></li>
        <li>
          <a class="" href="<?php echo $urlval?>">Finance & Legal</a>
        </li>
        <li><a class="" href="<?php echo $urlval?>">
          Food & Drink</a></li>
        <li><a class="" href="<?php echo $urlval?>">Goods Suppliers & Retailers</a></li>
        </ul>
      <ul>
        <li><a class="" href="<?php echo $urlval?>">
       
  Health & Beauty</a></li>
        <li>
          <a class="" href="<?php echo $urlval?>">Motoring</a>
        </li>
        <li><a class="" href="<?php echo $urlval?>">Pets</a></li>
        <li><a class="" href="<?php echo $urlval?>">Driving & Automotive</a></li>
        </ul>
      <ul>
        <li><a class="" href="<?php echo $urlval?>">Property & Maintenance</a></li>
        <li>
          <a class="" href="<?php echo $urlval?>"> Tradesmen & Construction </a>
        </li>
        <li><a class="" href="<?php echo $urlval?>">Transport</a></li>
        <li><a class="" href="<?php echo $urlval?>">Travel & Tourism</a></li> 
        </ul>
    </div>
    </div>
    </div>
  </div>
  </div>
  </div>
  
  <!-- ----------------------------------------responsive menu ------------------------------ -->
   <div class="respopnsive-menu321">
  <div class="nav-menu-res-3344343">
    <div class="nav-sub-menu-res-inn1">
    <div class="nav-men-sub-res-ct-inn">
      <ul>
        <li class="car-vhcl-menu-res">Cars & Vehicles</li>
        <li class="for-sale-menu-res">For Sale</li>
        <li class="property21-res">Property</li>
        <li class="jobs21-res">Jobs</li>
        <li class="Services21-res">Services</li>
        <li class="Community21-res">Community</li>
        <li class="Pets21-res">Pets</li>
        </ul>
    </div>
  </div>
  </div>
  
  <div class="remenu-sub">
    <div class="remenu-main-dw" style="z-index: 99999999;">
      <div class="remenu-innnn" style="z-index: 99999999;">
        <div class="div-sub-321">
          <img class="crs-end" src="./asset/delete-button.png" alt="">
         <h3> Cars & Vehicles</h3>
        </div>
        <h2>Browse by</h2>
        <ul>
          <li><a href="<?php echo $urlval?>">Business & Office</a></li>
          <li><a href="<?php echo $urlval?>">Childcare</a></li>
          <li><a href="<?php echo $urlval?>">Clothing</a></li>
          <li><a href="<?php echo $urlval?>">Computers & Telecoms</a></li>
          <li><a href="<?php echo $urlval?>">Entertainment</a></li>
          <li><a href="<?php echo $urlval?>">Finance & Legal</a></li>
          <li><a href="<?php echo $urlval?>">Food & Drink</a></li>
          <li><a href="<?php echo $urlval?>">Goods Suppliers & Retailers</a></li>
          <li><a href="<?php echo $urlval?>">Health & Beauty</a></li>
          <li><a href="<?php echo $urlval?>">Motoring</a></li>
          </ul>
         
        <ul>
          <li><a href="<?php echo $urlval?>">Business & Office</a></li>
          <li><a href="<?php echo $urlval?>">Childcare</a></li>
          <li><a href="<?php echo $urlval?>">Clothing</a></li>
          <li><a href="<?php echo $urlval?>">Computers & Telecoms</a></li>
          <li><a href="<?php echo $urlval?>">Entertainment</a></li>
          <li><a href="<?php echo $urlval?>">Finance & Legal</a></li>
          <li><a href="<?php echo $urlval?>">Food & Drink</a></li>
          <li><a href="<?php echo $urlval?>">Goods Suppliers & Retailers</a></li>
          <li><a href="<?php echo $urlval?>">Health & Beauty</a></li>
          <li><a href="<?php echo $urlval?>">Motoring</a></li>
          </ul>
  </div>
  </div>
  </div>
  </div>
 
  