<div class="card_bytovka-item">
              <div class="card_bytovka-main">
                <div class="card_bytovka-img">
                  <div class="card_bytovka-min-rent">Минимальный срок аренды - <span> <?php echo $bytovkaRent ?></span></div>
                  <div class="card_bytovka-for slider-dots"><a data-fancybox="sklad" href="../assets/img/preview1.png" title=""><img src="../assets/img/preview1.png" alt="" title=""></a><a data-fancybox="sklad" href="../assets/img/preview2.png" title=""><img src="../assets/img/preview2.png" alt="" title=""></a><a data-fancybox="sklad" href="../assets/img/preview3.png" title=""><img src="../assets/img/preview3.png" alt="" title=""></a><a data-fancybox="sklad" href="../assets/img/preview4.png" title=""><img src="../assets/img/preview4.png" alt="" title=""></a><a data-fancybox="sklad" href="../assets/img/preview5.png" title=""><img src="../assets/img/preview5.png" alt="" title=""></a><a data-fancybox="sklad" href="../assets/img/preview6.png" title=""><img src="../assets/img/preview6.png" alt="" title=""></a></div>
                  <div class="card_bytovka-nav">
                    <?php 
                      $prev = $database['bytovka-preview'];
                      foreach ($prev as $key => $value) {
                        $preview = $value['preview'];
                        include('./templates/blocks/bytovka-preview.php');
                      }
                    ?>
                  </div>
                </div>
                <div class="card_bytovka-content">
                  <div class="card_bytovka-price">Цена аренды:<span> <?php echo $bytovkaPrice ?> Р/мес</span></div>
                  <div class="card_bytovka-rent">Аренда от трех бытовок:<span> <?php echo $bytovkaPrice2 ?> Р/мес</span></div>
                  <div class="card_bytovka-link"><a class="btn_pink" href="#" data-open="popup_order">Заказать</a></div>
                  <div class="card_bytovka-gabarits">Размеры: <?php echo $bytovkaSize ?></div>
                  <div class="card_bytovka-text"><?php echo $bytovkaText ?></div>
                  <div class="card_bytovka-characteristics">
                    <ul class="characteristic">
                      <?php 
                        $char = $database['characteristic'];
                        foreach ($char as $key => $value) {
                          $char = $value['char'];
                          include('./templates/blocks/char.php');
                        }
                      ?>
                    </ul>
                  </div>
                  <div class="card_bytovka-advantages">
                    <ul class="adv">
                      <li><?php echo $bytovkaAdv1 ?></li>
                      <li><?php echo $bytovkaAdv2 ?></li>
                    </ul>
                  </div><a class="card_bytovka-download" href="#" alt="" title="">Скачать договор аренды бытовки-склада</a>
                </div>
              </div>
              <div class="card_bytovka-info">
                <div class="card_bytovka-video">
                  <div class="video-container">
                    <iframe width="560" height="315" src="<?php echo $bytovkaVideo ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                  </div>
                </div>
                <div class="card_bytovka-calculator">

                  <?php
                      include_once('./templates/blocks/delivery-calc.php')
                  ?>

                </div>
                <div class="preview_bytovka-additional">
                  <div class="preview_bytovka-additional-caption">Может дополнительно комплектоваться:</div>
                  <div class="preview_bytovka-icons"><img src="../assets/img/add-ic1.svg" alt="" title=""><img src="../assets/img/add-ic2.svg" alt="" title=""><img src="../assets/img/add-ic3.svg" alt="" title=""><img src="../assets/img/add-ic4.png" alt="" title=""><img src="../assets/img/add-ic5.svg" alt="" title=""></div>
                </div>
              </div>
            </div>