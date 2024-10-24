<!DOCTYPE php>
<php lang="en">

  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Fennec</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
      rel="stylesheet" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
    <link rel="stylesheet" href="<?php echo $urlval ?>custom/asset/styles.css" />
    <style>
      .searchResults {
        position: absolute;
          top: 7%;
          left: -252px;
          right: 2px;
          background-color: white;
          border: 1px solid #ddd;
          border-top-width: 1px;
          border-top-style: solid;
          border-top-color: rgb(221, 221, 221);
          border-top: none;
          border-radius: 0 0 4px 4px;
          z-index: 10;
          display: none;
          margin: auto;
            margin-top: auto;
          margin-top: auto;
          width: 26%;
      }

      .suggestion-item {
          padding: 10px;
          cursor: pointer;
          transition: background-color 0.2s;
      }

      .suggestion-item:hover {
          background-color: #f0f2f5;
      }

      .no-results {
          padding: 10px;
          color: #999; 
      } 
    </style>
  </head>

  <body>
    <nav class="navbar navbar-expand-lg navbar-dark ">
      <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="index.php" style="text-decoration: none;">
          <?php
          $logoData = $fun->getBox('box1');
          $logo = $urlval . $logoData[0]['image'];
          $title = $logoData[0]['heading'];
          $phara = $logoData[0]['phara'];
          ?>
          <img
            src="<?php echo $logo ?>"
            alt="Fennec Logo"
            style="max-width: 100%; margin-right: 10px;" />
          <span style="font-size: 1.7rem; font-weight: bold; color: inherit;"><?= $title ?></span>
        </a>
        <button
          id="menuToggle"
          class="navbar-toggler"
          type="button"
          style="display: none">
          <span class="navbar-toggler-icon"></span>
        </button>
        <form id="searchForm" class="d-flex mx-lg-auto my-lg-0 flex-column flex-lg-row w-100 justify-content-center custom-form">
    <div class="input-group w-50 me-lg-1 mb-2 mb-lg-0 custom-form">
        <span class="input-group-text bg-white border-0 rounded-0">
            <i class="fa-solid fa-magnifying-glass"></i>
        </span>
        <input
            id="searchInput"
            class="form-control p-2 rounded-0 search-input"
            type="search"
            placeholder="Search Fennec"
            aria-label="Search" />
    </div>
    <div class="input-group w-25 mb-2 mb-lg-0 custom-form-location">
        <span class="input-group-text rounded-0 bg-light border-0">
            <i class="fa-solid fa-location-dot me-2"></i>
        </span>
        <select class="form-select rounded-0 location-select custom-select">
            <option value="" selected>Select a country</option>
            <?php
            $countries = $dbFunctions->getData('countries');
            foreach ($countries as $cont) {
                echo '<option value="' . $security->decrypt($cont['id']) . '">' . $security->decrypt($cont['name']) . '</option>';
            }
            ?>
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
            <span class="new-btn">Login</span>
          </a>
        </div>
      </div>
    </nav>
    <div id="searchResults" class="searchResults mt-3"></div>
    <!-- mobile ka  h -->
    <div id="mySidebar" class="sidebar">
      <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
      <a href="<?php echo $urlval ?>">Home</a>
      <a href="<?php echo $urlval ?>">Post an Ad</a>
      <a href="<?php echo $urlval ?>">Manage my Ads</a>
      <a href="<?php echo $urlval ?>">Messages</a>
      <a href="<?php echo $urlval ?>">Favourites</a>
      <a href="<?php echo $urlval ?>">My Alerts</a>
      <a href="<?php echo $urlval ?>">My Details</a>
      <a href="<?php echo $urlval ?>">Manage my Job Ads</a>
      <a href="<?php echo $urlval ?>">Help & Contact</a>
      <a href="<?php echo $urlval ?>">Login</a>
    </div>

    <div class="nav-sub-menu-ct">
      <div class="nav-menu-32323">
        <div class="nav-menu-3344343">
          <div class="nav-sub-menu-inn1">
            <div class="nav-men-sub-ct-inn">
              <ul>
                <?php
                $findCate = $categoryManager->getAllCategoriesHeaderMenu();
                if ($findCate['status'] == 'success') {
                  foreach ($findCate['data'] as $category) {

                    echo '<li class="' . htmlspecialchars($category['slug']) . ' "><a href="' . $urlval . $category['slug'] . '">' . htmlspecialchars($category['category_name']) . '</a></li>';
                  }
                }
                ?>
              </ul>
            </div>
          </div>
        </div>


        <?php
        if ($findCate['status'] == 'success') {
          foreach ($findCate['data'] as $category) {


            echo '
              <div id="' . htmlspecialchars($category['slug']) . '" style="display:none;">
              <div class="nav-main-dwdisnmn">
              <div class="nav-snm-innnn">
              <h2>Browse by</h2>
              <div class="div-nv-sb-menu">
              <ul>';

            $duncatdata = $categoryManager->getAllSubCategoriesHeaderMenu($category['id']);
            foreach ($duncatdata['data'] as $val) {
              echo '
                  <li><a class="" href="' . htmlspecialchars($category['slug']) . '">' . $val['subcategory_name'] . '</a></li>';
            }
            echo '
                <ul>
              </div>
              </div>

              <div class="div-img-right-submenu">
                <img src="https://www.gumtree.com/assets/frontend/cars-guide.84c7d8c8754c04a88117e49a84535413.png " alt="">
              </div>
          
          </div>
          </div>
          </div>
            </div>
          
                
                ';
          }
        }

        ?>



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
                  <li><a href="<?php echo $urlval ?>">Business & Office</a></li>
                  <li><a href="<?php echo $urlval ?>">Childcare</a></li>
                  <li><a href="<?php echo $urlval ?>">Clothing</a></li>
                  <li><a href="<?php echo $urlval ?>">Computers & Telecoms</a></li>
                  <li><a href="<?php echo $urlval ?>">Entertainment</a></li>
                  <li><a href="<?php echo $urlval ?>">Finance & Legal</a></li>
                  <li><a href="<?php echo $urlval ?>">Food & Drink</a></li>
                  <li><a href="<?php echo $urlval ?>">Goods Suppliers & Retailers</a></li>
                  <li><a href="<?php echo $urlval ?>">Health & Beauty</a></li>
                  <li><a href="<?php echo $urlval ?>">Motoring</a></li>
                </ul>

                <ul>
                  <li><a href="<?php echo $urlval ?>">Business & Office</a></li>
                  <li><a href="<?php echo $urlval ?>">Childcare</a></li>
                  <li><a href="<?php echo $urlval ?>">Clothing</a></li>
                  <li><a href="<?php echo $urlval ?>">Computers & Telecoms</a></li>
                  <li><a href="<?php echo $urlval ?>">Entertainment</a></li>
                  <li><a href="<?php echo $urlval ?>">Finance & Legal</a></li>
                  <li><a href="<?php echo $urlval ?>">Food & Drink</a></li>
                  <li><a href="<?php echo $urlval ?>">Goods Suppliers & Retailers</a></li>
                  <li><a href="<?php echo $urlval ?>">Health & Beauty</a></li>
                  <li><a href="<?php echo $urlval ?>">Motoring</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>