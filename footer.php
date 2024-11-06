<footer class="text-light pt-5">
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
        <div class="d-flex space-x-3 icon-sty d-flex-new">
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



<script src="<?php echo $urlval?>admin/asset/vendor/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo $urlval?>custom/js/index.js"></script>
<script src="<?php echo $urlval?>custom/js/forsale.js"></script>
<script src="<?php echo $urlval?>custom/js/script.js"></script>

<script>
$(document).ready(function() {
    $('#searchInput').on('input', function() {
        let query = $(this).val();
        if (query.length > 0) {
            $.ajax({
                url: '<?= $urlval?>ajax/search.php',
                type: 'GET',
                data: { q: query },
                success: function(data) {
                    $('#searchResults').html(data).show(); 
                }
            });
        } else {
            $('#searchResults').hide();
        }
    });

    $(document).on('click', function(event) {
        if (!$(event.target).closest('#searchForm').length) {
            $('#searchResults').hide();
        }
    });
});
$(document).ready(function() {
  $('.nav-men-sub-ct-inn ul li').hover(
    function() {
      $(this).find('.nav-main-dwdisnmn').stop(true, true).slideDown(200);
    }, 
    function() {
      $(this).find('.nav-main-dwdisnmn').stop(true, true).slideUp(200);
    }
  );
});



</script>