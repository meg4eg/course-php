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
          <h1>Аренда бытовки</h1>
        </div>
        <div class="preview_bytovka-wrapper">
          <div class="grid-container">
            <?php
            $bytovkaList = $database['bytovka-list'];
                                   
            foreach ($bytovkaList as $key => $value) {
              $bytovkaTitle = $value['title'];
              $bytovkaPrice = $value['price'];
              $bytovkaSize = $value['size'];
              include('./templates/blocks/bytovka-list.php');
            }
            ?>
          </div>
        </div>
        <div class="calculator">
          <div class="grid-container">  
            <?php
            include_once('./templates/blocks/bytovka-calc.php');
            ?>
        </div>
      </div>
        <?php
        include_once('./templates/blocks/main-photogallery.php');
        ?>

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