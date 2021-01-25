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
      <div class="main_slider-wrapper">
        <div class="grid-container">
          <div class="grid-x">
            <div class="main_slider">
              <?php
              
              $mainSlider = $database['main-slider'];
                                      
              foreach ($mainSlider as $key => $value) {
                $mainSliderUrl = $value['url'];
                $mainSliderDescription = $value['description'];
                include('./templates/blocks/slider-main.php');
              }

              ?>
            </div>
          </div>
        </div>
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

      <div class="main_map">
        <div class="grid-container">
          <div class="main_map-heading heading">Мы работаем по Москве и Московской области</div>
          <div class="main_map-wrapper">
            <div class="main_map-body" id="map"></div>
            <script>
              var mapsPoints = [
                                          {
                                              coords: [55.5572, 37.7086],
                                              locationUrl: '/arenda-bytovok-v-vidnom/',
                                          },
                                          {
                                              coords: [55.4255, 38.2641],
                                              locationUrl: '/arenda-bytovok-v-bronnicah/',
                                          },
                                          {
                                              coords: [56.3439, 37.5203],
                                              locationUrl: '/arenda-bytovok-v-dmitrove/',
                                          },
                                          {
                                              coords: [55.5673, 38.2258],
                                              locationUrl: '/arenda-bytovok-v-ramenskom/',
                                          },
                                          {
                                              coords: [55.1499, 37.4670],
                                              locationUrl: '/arenda-bytovok-v-chekhove/',
                                          },
                                          {
                                              coords: [56.3153, 38.1360],
                                              locationUrl: '/arenda-bytovok-v-sergiev-posade/',
                                          },
                                          {
                                              coords: [56.3317, 36.7287],
                                              locationUrl: '/arenda-bytovok-v-klinu/',
                                          },
                                          {
                                              coords: [55.9143, 36.8603],
                                              locationUrl: '/arenda-bytovok-v-istre/',
                                          },
                                          {
                                              coords: [55.4312, 37.5447],
                                              locationUrl: '/arenda-bytovok-v-podolske/',
                                          },
                                          {
                                              coords: [55.4312, 37.5447],
                                              locationUrl: '/arenda-bytovok-v-vidnom/',
                                          },
                                          {
                                              coords: [56.0357, 35.9585],
                                              locationUrl: '/arenda-bytovok-v-volokolamske/',
                                          },
                                          {
                                              coords: [56.0104, 37.8472],
                                              locationUrl: '/arenda-bytovok-v-pushkino/',
                                          },
                                          {
                                              coords: [55.9919, 37.2144],
                                              locationUrl: '/arenda-bytovok-v-zelenograde/',
                                          },
                                          {
                                              coords: [55.7963, 37.9382],
                                              locationUrl: '/arenda-bytovok-v-balashihe/',
                                          },
                                          {
                                              coords: [55.9202, 37.9915],
                                              locationUrl: '/arenda-bytovok-v-shchelkovo/',
                                          },
                                          {
                                              coords: [55.8545, 38.4418],
                                              locationUrl: '/arenda-bytovok-v-noginske/',
                                          },
              
                                      ];
            </script>
            <div class="main_map-links">
              <div class="main_map-links-title">Аренда бытовок в: </div><a href="/arenda-bytovok-v-vidnom/">Видном</a><a href="/arenda-bytovok-v-bronnicah/">Бронницах</a><a href="/arenda-bytovok-v-dmitrove/">Дмитрове</a><a href="/arenda-bytovok-v-ramenskom/">Раменском</a><a href="/arenda-bytovok-v-chekhove/">Чехове</a><a href="/arenda-bytovok-v-sergiev-posade/">Сергиев Посаде</a><a href="/arenda-bytovok-v-klinu/">Клину</a><a href="/arenda-bytovok-v-istre/">Истре</a><a href="/arenda-bytovok-v-podolske/">Подольске</a><a href="/arenda-bytovok-v-vidnom/">Солнечногорске</a><a href="/arenda-bytovok-v-volokolamske/">Волоколамске</a><a href="/arenda-bytovok-v-pushkino/">Пушкино</a><a href="/arenda-bytovok-v-zelenograde/">Зеленограде</a><a href="/arenda-bytovok-v-balashihe/">Балашихе</a><a href="/arenda-bytovok-v-shchelkovo/">Щелково</a><a href="/arenda-bytovok-v-noginske/">Ногинске</a>
            </div>
          </div>
        </div>
      </div>
      <div class="rent_block">
        <div class="grid-container">
          <div class="rent_info">
            <div class="rent_heading">Условия аренды блок-контейнеров с доставкой</div>
            <div class="rent_text">Сдача блок-контейнера в аренду производится после первоначального платежа: доставка + вывоз + 3 месяц аренды. Минимальный срок - 1 месяц.</div>
          </div>
          <div class="grid-x">
            <div class="rent_item entity">
              <div class="rent_item-heading">Для юридических лиц:</div>
              <ul class="characteristic">
                <li>Заявка на электронную почту с указанием типа бытовка; </li>
                <li>Карточка организации; </li>
                <li>Доверенность от организации на получение товарно-материальных ценностей; </li>
                <li>Оплата по безналичному расчету; </li>
                <li>Залог не требуется!</li>
              </ul>
              <div class="rent_icon"></div>
            </div>
            <div class="rent_item individual">
              <div class="rent_item-heading">Для физических лиц:</div>
              <ul class="characteristic">
                <li>Аренда блок - контейнеров без залога;</li>
                <li>Копия паспорта с пропиской Москва или область; </li>
                <li>Оплата по безналичному расчету или наличными.</li>
              </ul>
              <div class="rent_icon"></div>
            </div>
          </div>
        </div>
      </div>
      <div class="tech-characteristics">
        <div class="grid-container">
          <div class="tech-characteristics-heading heading">Технические характеристики бытовок</div>
          <div class="tech-characteristics-wrapper">

            <?php 
              $tech = $database['tech'];
                                      
              foreach ($tech as $key => $value) {
                $techName = $value['name'];
                $techNameA = $value['name-a'];
                $techType = $value['type'];
                $techSize = $value['size'];
                $techMaterial = $value['material'];
                $techWindow = $value['window'];
                $techInner = $value['inner'];
                $techOuter = $value['outer'];
                $techFloor = $value['floor'];
                $techDoor = $value['door'];
                $techInnerDoor = $value['inner-door'];
                $techHot = $value['hot'];
                $techElectro = $value['electro'];
                $techWindowDef = $value['window-def'];
                $techImage = $value['image'];
                
                include('./templates/blocks/tech.php');
              }
            ?>
            
          </div>
          <div class="grid-x">
            <div class="tech-characteristics-link"><span class="btn_blue">Показать еще</span></div>
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
      <div class="advantages">
        <div class="grid-container">
          <div class="advantages_heading heading">Наши преимущества</div>
          <div class="advantages_slider slider-dots">
            <div class="advantages_item">
              <div class="advantages_item-img"><img src="../assets/img/ad1.png" alt="" title=""></div>
              <div class="advantages_item-content">Наша фирма занимается арендой бытовок с 2008 года, поэтому мы знаем что нужно нашему клиенту!</div>
            </div>
            <div class="advantages_item">
              <div class="advantages_item-img"><img src="../assets/img/ad2.png" alt="" title=""></div>
              <div class="advantages_item-content">
                Оплату за аренду
                и доставку бытовки
                можно производить
                по безналичному
                и наличному расчету.
              </div>
            </div>
            <div class="advantages_item">
              <div class="advantages_item-img"><img src="../assets/img/ad3.png" alt="" title=""></div>
              <div class="advantages_item-content">Для постоянных клиентов у нас действует гибкая система скидок как по аренде бытовки так и по доставке и вывоза её на склад.</div>
            </div>
          </div>
        </div>
      </div>
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
      <div class="price">
        <div class="grid-container">
          <div class="price_heading">
            <div class="heading">Цены на аренду блок-контейнеров</div>
            <div class="link-more"><a href="/price.php">Перейти в раздел</a></div>
          </div>
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
            <div class="price_link"><span class="btn_blue">Показать еще</span></div>
          </div>
        </div>
      </div>
      <div class="grid-container content">
        <div class="seo_text">
          <?php
          include_once('./templates/blocks/h1.php');
          ?>
          <?php
            if (!empty($data['text'])){echo $data['text'];}
           ?>
        </div>
      </div>

      <?php

      include_once('./templates/blocks/delivery-calc.php');

      ?>

      <div class="often-question">
        <div class="grid-container">
          <div class="often-question heading">Часто задаваемые вопросы</div>
          <div class="often-question-wrapper">
            <div class="often-question-item">
              <div class="often-question-ask">Сколько времени занимает доставка?</div>
              <div class="often-question-answer">Бытовку Вы получаете в день составления договора и оплаты заказа</div>
            </div>
            <div class="often-question-item">
              <div class="often-question-ask">Возможно ли доукомплектовывать бытовку?</div>
              <div class="often-question-answer">Да, мы предоставляем разнообразный выбор комплектации на Ваш выбор. Вся возможная комплектация доступна на сайте или Вы можете получить консультацию у нашего менеджера.</div>
            </div>
            <div class="often-question-item">
              <div class="often-question-ask">Возможна ли аренда бу бытовки без залога?</div>
              <div class="often-question-answer">Да, вариант аренды без залога возможен при условии аванса за 3 месяца. </div>
            </div>
            <div class="often-question-item">
              <div class="often-question-ask">Как мне вернуть бытовку по истечении срока аренды?</div>
              <div class="often-question-answer">При приблежении окончания срока аренды, наши менеджеры сами свяжутся с Вами, для обсуждения процесса возврата удобным для Вас способом.</div>
            </div>
            <div class="often-question-item">
              <div class="often-question-ask">Есть ли у Вас бытовки для проживания зимой?</div>
              <div class="often-question-answer">Да, наша компания предлагает бытовки, которые утеплены 100мм слоем утеплителя, на полу настелен линолеум, в них будет комфортно до -15 градусов. Так же возможна комплектация дополнительным электрооборудованием.</div>
            </div>
            <div class="often-question-item">
              <div class="often-question-ask">Какие дополнительные расходы могут возникнуть при аренде вагончика?</div>
              <div class="often-question-answer">Кроме оплаты аренды Вам необходимо оплатить доставку, если у вас нет собственного транспорта.</div>
            </div>
            <div class="often-question-item">
              <div class="often-question-ask">Нужен ли фундамент для установки или можно ставить на грунт?</div>
              <div class="often-question-answer">Мы рекомендуем устанавливать бытовку на фундаменте или на бетонных блоках. Однако, можно установить на ровную заасфальтированную площадку. </div>
            </div>
            <div class="often-question-item">
              <div class="often-question-ask">Можно ли выкупить арендованную бытовку? </div>
              <div class="often-question-answer">Вопрос покупки обговаривается индивидуально.</div>
            </div>
          </div>
        </div>
      </div>

      <?php

      include_once('./templates/blocks/order-form.php');

      ?>

      <?php 

      include_once('./templates/blocks/articles.php');

      ?>

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