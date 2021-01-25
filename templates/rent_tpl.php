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
          <div class="seo_text"><img class="content-img" src="/assets/img/rent1.png" alt="" title="">
            <?php
            if (!empty($data['text'])){echo $data['text'];}
            ?>
            <img src="../assets/img/rent2.png">
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