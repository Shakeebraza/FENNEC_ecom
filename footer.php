<footer class="text-light pt-5">

    <div class="container">
      <div class="row">
        <div class="col-md-4 mb-4">
          <a class="navbar-brand" href="index.php" style="text-decoration: none;">
            <img
              src="<?php echo $urlval?>custom/asset/Capture-removebg-preview.png"
              alt="Fennec Logo"
              style="max-width: 50%; margin-right: 10px;
              height: 40px; padding-bottom: 10px;" 
            />
            <span style="font-size: 2rem; font-weight: bold; color: white; height: 90px;">Fennec</span>   
          </a>
          <div class="line">
            <p>Lorem ipsum dolor sit amet, consectetur <br>adipiscing elit sed. Lorem ipsum</p>
          </div>
          <div class="d-flex space-x-3 icon-sty">
            <a href="<?php echo $urlval?>" class="text-light hover:text-white"
              ><i class="fab fa-facebook-f"></i
            ></a>
            <a href="<?php echo $urlval?>" class="text-light hover:text-white"
              ><i class="fab fa-instagram"></i
            ></a>
      
            <a href="<?php echo $urlval?>" class="text-light hover:text-white"
              ><i class="fab fa-twitter"></i
            ></a>
     
          </div>
        </div>
        <div class="col-md-4 mb-4">
          <h4 class="text-white font-weight-bold">Quick Links</h4>
          <ul class="list-unstyled line">
            <li><a href="CarsVehicles.php" class="text-light hover:text-white">Cars & Vehicles</a></li>
            <li>
              <a href="forsale.php" class="text-light hover:text-white">For Sale</a>
            </li>
            <li>
              <a href="property.php" class="text-light hover:text-white">Property</a>
            </li>
            <li>
              <a href="job.php" class="text-light hover:text-white">Jobs</a>
            </li>
            <li>
              <a href="Services.php" class="text-light hover:text-white">Services</a>
            </li>
            <li>
              <a href="Community.php" class="text-light hover:text-white">Community</a>
            </li>
            <li>
              <a href="Pets.php" class="text-light hover:text-white">Pets</a>
            </li>
          </ul>
        </div>
        <div class="col-md-4 mb-4">
          <h4 class="text-white font-weight-bold">Customer Services</h4>
          <ul class="list-unstyled line">
            <li>
              <a href="TermsofUse.php" class="text-light hover:text-white">Terms of Use</a>
            </li>
            <li>
              <a href="CookiesPolicy.php" class="text-light hover:text-white">Cookies Policy</a>
            </li>
            <li>
              <a href="<?php echo $urlval?>" class="text-light hover:text-white">Privacy Policy</a>
            </li>
            <li>
              <a href="<?php echo $urlval?>" class="text-light hover:text-white">Privacy Settings</a>
            </li>
            <li>
              <a href="<?php echo $urlval?>" class="text-light hover:text-white"
                >Upcycle Revolution</a
              >
            </li>
          </ul>
        </div>
      </div>
      <hr>

      <div class="mt-4 pb-3 text-center">
        <p>Copyright © 2024 All rights reserved</p>
      </div>
    </div>
  </footer>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
            <script src="<?php echo $urlval?>custom/js/index.js"></script>
            <script src="js/header.js"></script>
            <script src="/js/forsale.js"></script>
  <div class="container">
    <div class="row">
      <div class="col-md-4 mb-4">
        <a class="navbar-brand" href="index.php" style="text-decoration: none;">
          <img
            src="<?php echo $logo ?>"
            alt="Fennec Logo"
            style="max-width: 50%; margin-right: 10px;
              height: 40px; padding-bottom: 10px;" />
          <span style="font-size: 2rem; font-weight: bold; color: white; height: 90px;"><?= $title ?></span>
        </a>
        <div class="line">
          <p><?= $phara ?></p>
        </div>
        <div class="d-flex space-x-3 icon-sty">
          <a href="<?php echo $fun->getSiteSettingValue('facebook_link') ?>" class="text-light hover:text-white"><i class="fab fa-facebook-f"></i></a>
          <a href="<?php echo $fun->getSiteSettingValue('instagram_link') ?>" class="text-light hover:text-white"><i class="fab fa-instagram"></i></a>

          <a href="<?php echo $fun->getSiteSettingValue('twitter_link') ?>" class="text-light hover:text-white"><i class="fab fa-twitter"></i></a>

        </div>
      </div>
      <?php
      $menus = $fun->getMenus();
      ?>
      <?php
      if (isset($menus)) {
        foreach ($menus as $menuData):
      ?>
          <div class="col-md-4 mb-4">
            <h4 class="text-white font-weight-bold"><?php echo htmlspecialchars($menuData['menu']['name']); ?></h4>
            <ul class="list-unstyled line">
              <?php foreach ($menuData['items'] as $item):
                if (!empty($item['link'])) {
                  $link = $item['link'];
                } else {
                  $link = $urlval . 'page.php?slug=' . $item['slug'];
                }
              ?>
                <li>
                  <a href="<?= $link ?>" class="text-light hover:text-white">
                    <?php echo htmlspecialchars($item['name']); ?>
                  </a>
                </li>
              <?php endforeach; ?>
            </ul>
          </div>
      <?php endforeach;
      } ?>
    </div>
    <hr>

    <div class="mt-4 pb-3 text-center">
      <p>Copyright © 2024 All rights reserved</p>
    </div>
  </div>
</footer>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo $urlval?>custom/js/index.js"></script>
<script src="<?php echo $urlval?>custom/js/header.js"></script>
<script src="<?php echo $urlval?>custom/js/forsale.js"></script>
<script src="<?php echo $urlval?>custom/js/script.js"></script>

