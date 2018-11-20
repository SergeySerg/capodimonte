<?php
/**
 * Шаблон обычной страницы (page.php)
 * @package WordPress
 * @subpackage capodimonte
Template Name: delivery
 */
?>
<body>
    <!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-T5KD5P2"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
    <div class="wrapper">
    <?php get_header(); ?>
    <div class="section_delivery">
      <div class="delivery_menu">
        <?php
        $args = array(
            'type'         => 'post',
            'parent'       => '9',
            'orderby'      => 'ID',
            'order'        => 'ASC',
            'hide_empty'   => 0,
            'hierarchical' => 1,
            'exclude'      => '',
            'include'      => '',
            'number'       => 0,
            'taxonomy'     => 'category',
            'pad_counts'   => false,
        );
        $categories = get_categories( $args );

        if ($categories)
          foreach ($categories as $i => $category)
          {
            $alt = get_field('cat_image', $category->cat_ID);
            $alt = $alt['alt'];
            $active = '';
            if ($i == 0)
              $active = 'active';
            echo '<div class="menu '.$category->slug.' '.$active.'">
            <div class="img_wrap">
              <img class="img" src="'.get_field('cat_image', 'category_'. $category->term_id .'').'" alt="Пицца">
              <img class="img_active" src="'.get_field('cat_image', 'category_'. $category->term_id .'').'" alt="'.$alt.'">
            </div>
            <span class="menu_title">'.$category->name.'</span>
          </div>';
          }
        ?>

      </div>
      <div class="clear"></div>
      <div class="dish_block">
        <div class="dish_menu pizza active">
          <div class="second_delivery_menu">
            <?php
            $cat_id = get_category_by_slug( 'pizza' );

            $cat_pizza = $cat_id->cat_ID;

            $args = array(
                'type'         => 'post',
                'parent'       => $cat_id->cat_ID,
                'orderby'      => 'ID',
                'order'        => 'ASC',
                'hide_empty'   => 0,
                'hierarchical' => 1,
                'exclude'      => '',
                'include'      => '',
                'number'       => 0,
                'taxonomy'     => 'category',
                'pad_counts'   => false,
            );
            $sub_categories = get_categories( $args );

            if ($sub_categories)
            {
              $cat_pizza = $sub_categories[0]->cat_ID;

              foreach ($sub_categories as $sub_category)
              {
                echo '<div class="menu" onclick="get_subcat('.$sub_category->cat_ID.', this, \''.$cat_id->slug.'\')">'.$sub_category->name.'</div>';
              }
            }

            ?>
          </div>
          <div class="dish_wrap">
            <?php

            $args = array(
                'numberposts' => -1,
                'category'    => $cat_pizza,
                'orderby'     => 'date',
                'order'       => 'DESC',
                'include'     => array(),
                'exclude'     => array(),
                'meta_key'    => '',
                'meta_value'  =>'',
                'post_type'   => 'post',
                'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
            );

            $posts = get_posts( $args );

            if($posts)
            foreach ($posts as $post) {
              $sizes = get_field('size', $post->ID);
              if (count ($sizes) == 2)
              {
                $price = round(get_field('menu_price', $post->ID));
                $price40 = round(get_field('menu_price_40', $post->ID));
                $weight = get_field('weight', $post->ID);
                $weight40 = get_field('weight_40', $post->ID);
              }
              else if (count($sizes) == 1 && $sizes[0]== 40) {
                $price = round(get_field('menu_price_40', $post->ID));
                $weight = get_field('weight_40', $post->ID);
              }
              else {
                $price = round(get_field('menu_price', $post->ID));
                $weight = get_field('weight', $post->ID);
              }

              $img = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'post');
              echo '<div class="dish">
              <div class="dish_img_wrap">
                <img src="' . $img[0] . '" alt="блюдо">
              </div>
              <div class="dish_content_wrap">
                <div class="dish_name">' . $post->post_title . '</div>
                <div class="dish_composition">' . $post->post_content . '</div>
                <div class="dish_weight">
                  <span class="dish_weight_number">' . $weight . '</span>
                  <span class="dish_weight_measure">';
                if(qtranxf_getLanguage() == 'ru')
                    echo 'г.';
                else if(qtranxf_getLanguage() == 'en')
                    echo 'g.';
                 echo '</span>
                </div>
                <div class="dish_price">
                  <span class="dish_price_number">' . $price . '</span>
                  <span class="dish_price_currency">';
                if(qtranxf_getLanguage() == 'ru')
                    echo 'грн.';
                else if(qtranxf_getLanguage() == 'en')
                    echo 'uah.';
                echo '</span>
                </div>
                <div class="dish_size">
                ';
              foreach (get_field('size', $post->ID) as $i => $size) {
                $active = '';
                if ($i == 0)
                  $active = 'active';
                if ($i == 1) {
                  $price = $price40;
                  $weight = $weight40;
                }
                echo '<div class="dish_size_choose ' . $active . '" onclick="$(this).parent().parent().find(\'.dish_price_number\').html('.$price.');$(this).parent().parent().find(\'.dish_weight_number\').html('.$weight.');">
                    <span class="dish_size_number">' . $size . '</span>
                    <span class="dish_measure_measure">';
                  if(qtranxf_getLanguage() == 'ru')
                      echo 'см';
                  else if(qtranxf_getLanguage() == 'en')
                      echo 'cm';
                  echo '</span>
                  </div>';
              }

              echo '</div>
                <div class="add_to_cart" onclick="add_to_cart(' . $post->ID . ', this)">';
                if(qtranxf_getLanguage() == 'ru')
                    echo 'в коробку';
                else if(qtranxf_getLanguage() == 'en')
                    echo 'in box';
                echo '</div>
              </div>
              </div>';
            }

            ?>
           </div>
        </div>
        <?php
        $args = array(
            'type'         => 'post',
            'parent'       => '9',
            'orderby'      => 'ID',
            'order'        => 'ASC',
            'hide_empty'   => 0,
            'hierarchical' => 1,
            'exclude'      => '10,16',
            'include'      => '',
            'number'       => 0,
            'taxonomy'     => 'category',
            'pad_counts'   => false,
        );
        $categories = get_categories( $args );
        foreach ($categories as $category)
        {
          echo '<div class="dish_menu '.$category->slug.'">
          <div class="second_delivery_menu">';

          $cat_id = get_category_by_slug( $category->slug );

          $args = array(
              'type'         => 'post',
              'parent'       => $cat_id->cat_ID,
              'orderby'      => 'ID',
              'order'        => 'ASC',
              'hide_empty'   => 0,
              'hierarchical' => 1,
              'exclude'      => '',
              'include'      => '',
              'number'       => 0,
              'taxonomy'     => 'category',
              'pad_counts'   => false,
          );
          $sub_categories = get_categories( $args );

          if ($sub_categories)
          {
            foreach ($sub_categories as $sub_category)
            {
              echo '<div class="menu" onclick="get_subcat('.$sub_category->cat_ID.', this, \''.$cat_id->slug.'\')">'.$sub_category->name.'</div>';
            }
          }

        echo '</div>
          <div class="dish_wrap">';
          if ($sub_categories)
          $args = array(
              'numberposts' => -1,
              'category'    => $sub_categories[0]->cat_ID,
              'orderby'     => 'date',
              'order'       => 'DESC',
              'include'     => array(),
              'exclude'     => array(),
              'meta_key'    => '',
              'meta_value'  =>'',
              'post_type'   => 'post',
              'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
          );
          else
              $args = array(
                  'numberposts' => -1,
                  'category'    => $category->cat_ID,
                  'orderby'     => 'date',
                  'order'       => 'DESC',
                  'include'     => array(),
                  'exclude'     => array(),
                  'meta_key'    => '',
                  'meta_value'  =>'',
                  'post_type'   => 'post',
                  'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
              );

            $posts = get_posts( $args );

            if($posts)
              foreach ($posts as $post) {
                $img = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'post');
                echo '<div class="dish">
              <div class="dish_img_wrap">
                <img src="'.$img[0].'" alt="блюдо">
              </div>
              <div class="dish_content_wrap">
                <div class="dish_name">'.$post->post_title.'</div>
                <div class="dish_composition">'.$post->post_content.'</div>
                <div class="dish_weight">
                  <span class="dish_weight_number">'.get_field('weight', $post->ID).'</span>
                  <span class="dish_weight_measure">';
                  if(qtranxf_getLanguage() == 'ru')
                      echo 'г.';
                  else if(qtranxf_getLanguage() == 'en')
                      echo 'g.';
                    echo '</span>
                </div>
                <div class="dish_price">
                  <span class="dish_price_number">'.round(get_field('menu_price', $post->ID)).'</span>
                  <span class="dish_price_currency">';
                  if(qtranxf_getLanguage() == 'ru')
                      echo 'грн';
                  else if(qtranxf_getLanguage() == 'en')
                      echo 'uah';
                    echo '</span>
                </div>
               
                <div class="add_to_cart" onclick="add_to_cart('.$post->ID.', this)">';
                  if(qtranxf_getLanguage() == 'ru')
                      echo 'В коробку';
                  else if(qtranxf_getLanguage() == 'en')
                      echo 'in box';
                  echo '</div>
              </div>
              </div>';
              }


      echo '</div>
    </div>';

        }
            ?>

        <div class="dish_menu lunch">
          <div class="second_delivery_menu">
            <?php
            $cat_id = get_category_by_slug( 'lunch' );

//            $args = array(
//                'type'         => 'post',
//                'parent'       => $cat_id->cat_ID,
//                'orderby'      => 'ID',
//                'order'        => 'ASC',
//                'hide_empty'   => 0,
//                'hierarchical' => 1,
//                'exclude'      => '',
//                'include'      => '',
//                'number'       => 0,
//                'taxonomy'     => 'category',
//                'pad_counts'   => false,
//            );
//            $sub_categories = get_categories( $args );
//            $days = array( 'Понедельник' => 'Monday',
//                'Вторник' => 'Tuesday',
//                'Среда' => 'Wednesday',
//                'Четверг' => 'Thursday',
//                'Пятница' => 'Friday',
//                );
//            $current = '';
//            if ($sub_categories)
//            {
//              foreach ($sub_categories as $j => $sub_category)
//              {
//                $active = '';
//                foreach ($days as $i => $day)
//                {
//                  if($day == strftime("%A", time()) && $i == $sub_category->name) {
//                    $active = 'active';
//                    $current = $j;
//
//                  }
//                }
//
//                echo '<div class="menu '.$active.'" onclick="get_subcat('.$sub_category->cat_ID.', this, \''.$cat_id->slug.'\')">'.$sub_category->name.'</div>';
//              }
//            }

            ?>
          </div>
          <div class="dish_wrap">
            <?php
              $args = array(
                  'numberposts' => -1,
                  'category' => $cat_id->cat_ID,
                  'orderby' => 'date',
                  'order' => 'DESC',
                  'include' => array(),
                  'exclude' => array(),
                  'meta_key' => '',
                  'meta_value' => '',
                  'post_type' => 'post',
                  'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
              );

              $posts = get_posts($args);
            
              foreach ($posts as $post) {
                $img = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'post');

                echo '<form class="form dish" action="form.php" >
              <div class="european_lunch">
                <div class="lunch_title">' . $post->post_title . '</div>
                <img class="lunch_img" src="' . $img[0] . '" alt="Ланч">
                <div class="lunch_content">';

                foreach (get_field('lunch', $post->ID) as $item) {
                  echo ' <div class="selection_dish">
                    <div class="dish_title">' . $item['name_dish'] . '</div>';
                  foreach ($item['type'] as $i => $type) {
                    echo '<label for="type_'.$i.'">
                      <input type="checkbox" name="soup" id="type_'.$i.'" value="type_'.$i.'" >
                      <span></span>
                      ' . $type['varible_type'] . '
                    </label>';
                  }
                  echo '</div>';
                }

                echo '<div class="clear"></div>
                  <div class="submit_block">
                    <span class="sum_number">' . round(get_field('menu_price', $post->ID)) . '</span>
                    <span class="sum_currency">';
                  if(qtranxf_getLanguage() == 'ru')
                      echo 'грн';
                  else if(qtranxf_getLanguage() == 'en')
                      echo 'uah';
                  echo '</span>
                    <div class="add_to_cart" onclick="add_to_cart('.$post->ID.', this)">';
                  if(qtranxf_getLanguage() == 'ru')
                      echo 'Заказать';
                  else if(qtranxf_getLanguage() == 'en')
                      echo 'To order';
                  echo '</div>
                    <div class="clear"></div>
                  </div>
                </div>
              </div>
            </form>';
              }

            ?>
          </div>
        </div>
      </div>
      <div class="clear"></div>
    </div>
    <div class="delivery_bottom" <?php if($_SESSION['cart']) echo 'style="position: absolute; bottom: 230px; display: block;"'; ?>>
      <div class="make_call clearfix">
        <div class="make_call_wrap clearfix">
          <img class="phone_img" src="<?php echo get_template_directory_uri(); ?>/images/phone_call.png" alt="Звонок">
          <div class="phone_number_block clearfix">
            <div class="phone_number">044-599-01-01</div>
            <div class="clear"></div>
            <div class="call_text">
                <?php
                if(qtranxf_getLanguage() == 'ru')
                    echo 'Доставка с 10 до 22';
                else if(qtranxf_getLanguage() == 'en')
                    echo 'Delivery from 10 to 22';
                ?>
            </div>
          </div>
          <div class="clear_mob"></div>
          <a class="call_button" href="tel:0445990101">
              <?php
              if(qtranxf_getLanguage() == 'ru')
                  echo 'Позвонить';
              else if(qtranxf_getLanguage() == 'en')
                  echo 'Call us';
              ?>
          </a>
        </div>
      </div>
      <?php
      $total = 0;
      $count = 0;
      foreach ($_SESSION['cart'] as $item)
      {
        $count += $item['count'];
        if ($item['size'] == '40 см')
          $price = round(get_field('menu_price_40', $item['post_id']));
        else
          $price = round(get_field('menu_price', $item['post_id']));
        $total += $price*$item['count'];
      }
      ?>
      <div class="cart clearfix">
        <div class="cart_wrap clearfix">
          <img class="cart_img" src="<?php echo get_template_directory_uri(); ?>/images/cart.png" alt="Корзина">
          <div class="cart_block">
            <span class="item_number"><?php echo $count; ?></span>
            <span class="item_number_text">
                <?php
                if(qtranxf_getLanguage() == 'ru')
                    echo 'товара в коробке';
                else if(qtranxf_getLanguage() == 'en')
                    echo 'items in the box';
                ?>
            </span>
            <div class="clear"></div>
            <div class="item_sum">
              <span class="item_sum_text">
                  <?php
                  if(qtranxf_getLanguage() == 'ru')
                      echo 'на сумму';
                  else if(qtranxf_getLanguage() == 'en')
                      echo 'total';
                  ?>
              </span>
              <span class="item_sum_number">
                <?php

                echo $total;
                ?>
              </span>
              <span class="item_sum_currency">
                  <?php
                  if(qtranxf_getLanguage() == 'ru')
                      echo 'грн';
                  else if(qtranxf_getLanguage() == 'en')
                      echo 'uah';
                  ?>
              </span>
            </div>
          </div>
          <div class="clear_mob"></div>
          <div class="cart_button">
              <?php
              if(qtranxf_getLanguage() == 'ru')
                  echo 'Оформить';
              else if(qtranxf_getLanguage() == 'en')
                  echo 'Checkout';
              ?>
          </div>
        </div>
      </div>
    </div>
    <?php get_footer(); ?>
    <div class="pop_up cart_pop_up">
      <div class="cart_pop_up_wrap">
        <div class="close"></div>
        <div class="cart_pop_up_title">
            <?php
            if(qtranxf_getLanguage() == 'ru')
                echo 'Ваша коробка';
            else if(qtranxf_getLanguage() == 'en')
                echo 'Your box';
            ?>
        </div>
        <div class="cart_pop_up_border"></div>
        <div class="cart_pop_up_wrap_dish">
          <?php
            if ($_SESSION['cart'])
            {
              foreach ($_SESSION['cart'] as $item)
              {
                $post = get_post($item['post_id']);
                $img = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'post');
                if ($item['size'] == '40 см')
                  $price = round(get_field('menu_price_40', $post->ID));
                else
                  $price = round(get_field('menu_price', $post->ID));

                echo '<div class="cart_pop_up_dish">
            <img class="cart_dish_img" src="'.$img[0].'" alt="блюдо">
            <span class="cart_dish_name">'.$post->post_title.' '.($item['size'] ? '('.$item['size'].')' : '' ).'</span>
            <span class="cart_dish_price">'.$price.'</span>
            <span id="dish_size_number" style="display: none;">'.$item['size'].'</span>
            <span class="cart_dish_currency">';
              if(qtranxf_getLanguage() == 'ru')
                  echo 'грн.';
              else if(qtranxf_getLanguage() == 'en')
                  echo 'uah.';
            echo '</span>
            <span class="cart_dish_count"><input id="cnt_items" type="number" onchange="plus_minus_add_to_cart(this ,'.$post->ID.')" min="1" max="99" value="'.$item['count'].'" style="width: 100%"></span>
            <span class="cart_dish_unit">';
              if(qtranxf_getLanguage() == 'ru')
                  echo 'шт.';
              else if(qtranxf_getLanguage() == 'en')
                  echo 'pcs.';
            echo '</span>
            <span class="cart_dish_total_price">'.$price*$item['count'].'</span>
            <span class="cart_dish_currency">';
                  if(qtranxf_getLanguage() == 'ru')
                      echo 'грн.';
                  else if(qtranxf_getLanguage() == 'en')
                      echo 'uah.';
            echo '</span>
            <span class="cart_dish_cancel" onclick="del_from_cart('.$post->ID.', this)"></span>
          </div>';
              }
            }
          ?>


        </div>
        <div class="cart_pop_up_border"></div>
        <div class="show_form">
            <?php
            if(qtranxf_getLanguage() == 'ru')
                echo 'Сделать заказ';
            else if(qtranxf_getLanguage() == 'en')
                echo 'To order';
            ?>
        </div>
        <form action="" class="form">
          <div class="form_section">
            <input name="name" id="name" class="name input" type="text" placeholder="<?php
            if(qtranxf_getLanguage() == 'ru')
                echo 'Имя';
            else if(qtranxf_getLanguage() == 'en')
                echo 'Name';
            ?>">
            <input name="phone" id="phone" class="phone input" type="text" placeholder="<?php
            if(qtranxf_getLanguage() == 'ru')
                echo 'Номер телефона';
            else if(qtranxf_getLanguage() == 'en')
                echo 'Phone';
            ?>">
            <input name="email" id="email" class="email input" type="text" placeholder="E-mail">
          </div>
          <div class="form_section">
            <input name="address" id="address" class="address input" type="text" placeholder="<?php
            if(qtranxf_getLanguage() == 'ru')
                echo 'Адресс доставки';
            else if(qtranxf_getLanguage() == 'en')
                echo 'Delivery address';
            ?>">
            <textarea name="textarea" id="textarea" class="textarea" placeholder="<?php
            if(qtranxf_getLanguage() == 'ru')
                echo 'Комментарий';
            else if(qtranxf_getLanguage() == 'en')
                echo 'Comment';
            ?>"></textarea>
          </div>
          <div class="form_section">
            <span class="total_sum_text">
                 <?php
                 if(qtranxf_getLanguage() == 'ru')
                     echo 'Сумма заказа';
                 else if(qtranxf_getLanguage() == 'en')
                     echo 'Order price';
                 ?>
                :</span>
            <span class="total_sum_number"><?php echo $total; ?></span>
            <span class="total_sum_currency"><?php
                if(qtranxf_getLanguage() == 'ru')
                    echo 'грн.';
                else if(qtranxf_getLanguage() == 'en')
                    echo 'uah.';
                ?></span>
            <div class="submit correct" onclick="if($(this).hasClass('correct')) send_order(); return false;">
                <?php
                if(qtranxf_getLanguage() == 'ru')
                    echo 'Сделать заказ';
                else if(qtranxf_getLanguage() == 'en')
                    echo 'To order';
                ?>
            </div>
            <div class="close_button">
                <?php
                if(qtranxf_getLanguage() == 'ru')
                    echo 'Вернутся в меню';
                else if(qtranxf_getLanguage() == 'en')
                    echo 'Return to the menu';
                ?>
            </div>
          </div>
          <div class="clear"></div>
        </form>
      </div>
    </div>
    <div class="pop_up order_sent_pop_up">
      <div class="order_sent_pop_up_wrap">
        <div class="close"></div>
        <div class="order_sent_pop_up_title">
          <img src="<?php echo get_template_directory_uri(); ?>/images/order_sent_pop_up_title.png" alt="title">
          <span>Ваш заказ отправлен оператору!</span>
        </div>
        <div class="order_sent_pop_up_text">
          Мы обязательно вам перезвоним в ближайшие 10 минут, проверьте пожалуйста чтобы ваш телефон был включён.
          <br>
          Если мы не перезвонили — значит не получили ваш заказ, и не сможем его отправить:
          <br>
          пожалуйста свяжитесь с оператором по тел. 044-599-01-01 для уточнения.
        </div>
        <div class="close_button">Вернуться в меню</div>
      </div>
    </div>
  </div>
</body>
</html>
