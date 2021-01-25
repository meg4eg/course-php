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
        <div class="photogallery">
          <div class="grid-container">
            <div class="photogallery-for slider-dots">  
              <?php
              $photo = $database['photogallery'];
                                                
              foreach ($photo as $key => $value) {
                $photoUrl = $value['address'];
                $photoName = $value['name'];
                include('./templates/blocks/photo.php');
              }
              ?>
            </div>
            <div class="photogallery-nav">
              <?php
              $photo = $database['photogallery'];
                                                
              foreach ($photo as $key => $value) {
                $photoUrl = $value['address'];
                $photoName = $value['name'];
                include('./templates/blocks/photo-nav.php');
              }
              ?>
            </div>
          </div>
        </div>
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