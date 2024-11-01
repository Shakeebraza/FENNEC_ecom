<?php
?>
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo $urlval ?>custom/asset/styles.css" />
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <style>
#dropdownMenuButton {
  border: none;
  margin-top: 8px;
}
.btn.btn-outline-light.me-2 {
  border: none;
}
.nav-main-dwdisnmn {
  position: absolute;
  background: white;
  border: 1px solid #ccc;
  z-index: 1000;
  right: 215px;
  top: 107px;
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
          <a href="<?php
          if(isset($_SESSION['userid'])){
            echo $urlval.'Post.php';
          }else{
            echo $urlval.'Product.php';

          }
          ?>" class="btn custom-btn me-2 mb-lg-0 d-flex flex-column align-items-center">
            <i class="fa-solid fa-dollar-sign mb-1 fa-plus-circle"></i>
            <span class="new-btn">Sell</span>
          </a>
          <?php
          if(isset($_SESSION['userid'])){
            echo '
                      <div class="d-flex">
                    <a class="btn btn-outline-light me-2" href="'.$urlval.'messages.php">
                        <i class="fas fa-envelope"></i> Messages
                    </a>
                    <div class="dropdown">
                        <button class="btn btn-outline-light dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-bars"></i> Menu
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                            <li><a class="dropdown-item" href="'.$urlval.'messages.php#upload-tab">Manage my Ads</a></li>
                            <li><a class="dropdown-item" href="'.$urlval.'messages.php#messages-tab">Messages</a></li>
                            <li><a class="dropdown-item" href="'.$urlval.'messages.php#favourite-tab">Favourites</a></li>
                            <li><a class="dropdown-item" href="'.$urlval.'messages.php#details-tab">My Details</a></li>
                            <li><a class="dropdown-item" href="'.$urlval.'messages.php#view-products-tab">View my Job Ads</a></li>
                            <li><a class="dropdown-item" href="#">Help & Contact</a></li>
                            <li><a class="dropdown-item" href="'.$urlval.'logout.php">Logout</a></li>
                        </ul>
                    </div>
                </div>
            ';
          }else{
           echo '
                     <a href="LoginRegister.php" class="btn custom-btn d-flex flex-column align-items-center">
            <i class="fa-solid fa-user mb-1 "></i>
            <span class="new-btn">Login</span>
          </a>
           ';

          }
          ?>
          


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
                echo '
                <li class="' . htmlspecialchars($category['slug']) . '">
                  <a href="' . $urlval . 'category.php?slug=' . $category['slug'] . '">' . htmlspecialchars($category['category_name']) . '</a>
                  <div class="nav-main-dwdisnmn" style="display:none;">
                    <div class="nav-snm-innnn">
                      <h2>Browse by</h2>
                      <div class="div-nv-sb-menu">
                        <ul>';
                
                // Fetch subcategories for this category
                $duncatdata = $categoryManager->getAllSubCategoriesHeaderMenu($category['id']);
                foreach ($duncatdata['data'] as $val) {
                  echo '<li class="lihpoverset"><a href="' . $urlval . 'category.php?slug=' . $category['slug'] . '&subcategory='.htmlspecialchars($val['id']).'">' . htmlspecialchars($val['subcategory_name']) . '</a></li>';
                }
                
                echo '
                        </ul>
                      </div>
                    </div>
                    <div class="div-img-right-submenu">
                      <img src="https://www.gumtree.com/assets/frontend/cars-guide.84c7d8c8754c04a88117e49a84535413.png" alt="">
                    </div>
                  </div>
                </li>';
              }
            }
            ?>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>




        <div class="respopnsive-menu321">
          <div class="nav-menu-res-3344343">
            <div class="nav-sub-menu-res-inn1">
              <div class="nav-men-sub-res-ct-inn">
                <ul>
                  <?php
                  $findCate = $categoryManager->getAllCategoriesHeaderMenu();
                  if ($findCate['status'] == 'success') {
                    foreach ($findCate['data'] as $category) {
                      echo '
               <li class="car-vhcl-menu-res" data-id="' . htmlspecialchars($category['id']) . '">' . htmlspecialchars($category['category_name']) . '</li>';
                    }
                  }
                  ?>
                </ul>
              </div>
            </div>
          </div>

          <div class="remenu-sub">
            <?php
            if ($findCate['status'] == 'success') {
              foreach ($findCate['data'] as $category) {
                echo '
                  <div class="remenu-main-dw" data-id="' . htmlspecialchars($category['id']) . '" style="display:none;">
                      <div class="remenu-innnn">
                          <div class="div-sub-321">
                              <img class="crs-end" src="' . $urlval . 'custom/asset/delete-button.png" alt="">
                              <h3>' . htmlspecialchars($category['category_name']) . '</h3>
                          </div>
                          <h2>Browse by</h2>
                          <ul>';
                          $duncatdata = $categoryManager->getAllSubCategoriesHeaderMenu($category['id']);
                          foreach ($duncatdata['data'] as $val) {
                            echo '<li><a href="' . htmlspecialchars($val['slug']) . '">' . htmlspecialchars($val['subcategory_name']) . '</a></li>';
                          }
                          echo '
                          </ul>
                      </div>
                  </div>';
              }
            }
            ?>
          </div>
        </div>