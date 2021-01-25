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
    
      <div class="content price-page">
        <?php
        include_once('./templates/blocks/breadcrumbs.php');
        ?>
        <div class="grid-container">
          <?php
          include_once('./templates/blocks/h1.php');
          ?>
        </div>

        <div class="price">
          <div class="grid-container">
            <div class="price_wrapper">
              <?php

              $itemsRent = $database['item'];
                                                
              foreach ($itemsRent as $key => $value) {
              $itemTitle = $value['title'];
              $itemPrice = $value['price'];
                include('./templates/blocks/item-rent.php');
              }

              ?>
              
            </div>
            <div class="grid-x">
              <div class="price_download"><a class="price-download" href="#" target="_blank"><i class="icon-load"></i>Скачать прайс-лист</a></div>
            </div>
          </div>
        </div>
        <div class="calculator">
          <div class="grid-container">
            <?php

            include_once('./templates/blocks/bytovka-calc.php');

            ?>
          </div>
        </div>
        <div class="grid-container">
          <div class="seo_text">
          <?php
            if (!empty($data['text'])){echo $data['text'];}
           ?>
          </div>
        </div>
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