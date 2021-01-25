<!DOCTYPE html>
<html lang="ru">
  <?php 

  include_once('./templates/blocks/head.php');

  ?>
  <body>
    <?php

    include_once('./templates/blocks/header.php');

    ?>
    <main>
      <div class="content">
        <?php
        include_once('./templates/blocks/breadcrumbs.php');
        ?>
        <div class="grid-container">
          <?php
          include_once('./templates/blocks/h1.php');
          ?>
        </div>
        <div class="grid-container">
          <div class="seo_text"><img class="content-img" src="/assets/img/delivery.png" alt="" title="">
          <?php
            if (!empty($data['text'])){echo $data['text'];}
           ?>
          </div>
        </div>
        <?php

        include_once('./templates/blocks/delivery-calc.php');

        ?>

        <div class="main_photogallery">
          <div class="grid-container">
            <div class="main_photogallery-heading heading">Фотогалерея</div>
            <div class="main_photogallery-slider slider-arrows slider-dots">
              <?php
              
              $gallery = $database['gallery'];
                                      
              foreach ($gallery as $key => $value) {
                $galleryUrl = $value['address'];
                $galleryName = $value['name'];
                include('./templates/blocks/gallery.php');
              }

              ?>
            </div>
          </div>
        </div>

        <?php

        include_once('./templates/blocks/order-form.php');

        ?>

        <?php 

        include_once('./templates/blocks/articles.php');

        ?>
      </div>
    </main>
    <?php

    include_once('./templates/blocks/footer.php');

    ?>

    <?php

    include_once('./templates/blocks/scripts.php');

    ?>

    <?php

    include_once('./templates/blocks/popup.php');

    ?>
  </body>
</html>