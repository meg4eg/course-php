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
        <div class="card_bytovka-wrapper">
          <div class="grid-container">
            <?php 
              $bytovka = $database['bytovka'];
              foreach ($bytovka as $key => $value) {
                $bytovkaRent = $value['rent'];
                $bytovkaImage = $value['image'];
                $bytovkaPrice = $value['price'];
                $bytovkaPrice2 = $value['price2'];
                $bytovkaSize = $value['size'];
                $bytovkaText = $value['text'];
                $bytovkaAdv1 = $value['adv1'];
                $bytovkaAdv2 = $value['adv2'];
                $bytovkaVideo = $value['video'];
                include('./templates/blocks/bytovka.php');
              }
            ?>
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