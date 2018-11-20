<?php
/**
 * Главная страница (index.php)
 * @package WordPress
 * @subpackage capodimonte
 */
get_header(); ?>




<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-T5KD5P2');</script>
<!-- End Google Tag Manager -->






	<script type="text/javascript">
		$(function () {
			console.log($(".link a").html());
			$(window).load(function () {
				$(".link a").on('click', function(event) {
						if (this.hash !== "") {
							event.preventDefault();
							var hash = this.hash;
							$('html, body').animate({
								scrollTop: $(hash).offset().top
							}, 400, function(){
								window.location.hash = hash;
							});
						}
				});
			});
		});
	</script>
<?php $loop = new WP_Query( array( 'post_type' => 'main_page', 'posts_per_page' => -1 ) ); ?>
<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>


<div class="section_1" style="background-image: url('<?php the_field('banner_cover'); ?>');">>
	<div class="logo reveal_scale"></div>
	<div class="arrow"></div>
</div>









<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-T5KD5P2"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->









<?php wp_reset_postdata(); ?>
<?php endwhile; ?>

<div class="section_2">
	<div class="left">
		<div class="left_wrap">
			<img class="location_img" src="<?php echo get_template_directory_uri(); ?>/images/location.png" alt="location">
			<?php if(qtranxf_getLanguage() == 'ru') { ?>
			<span class="location">Ресторан на Оболони</span>
			<?php } elseif (qtranxf_getLanguage() == 'en') { ?>
			<span class="location">Restaurant in Obolon</span>
			<?php } ?>
			<div class="clear"></div>
			<form class="form" action="form.php" id="obolon">
				<input name="restoran" type="hidden" value="na Oboloni">
				<div class="input_shadow">
					<label class="label" for="date_1">
						<?php if(qtranxf_getLanguage() == 'ru') { ?>
						Дата:
						<?php } elseif (qtranxf_getLanguage() == 'en') { ?>
						Date:
						<?php } ?>
					</label>
					<input name="date" id="date_1" class="date input" type="text" readonly>
					<div class="clear"></div>
				</div>
				<div class="time_select input_shadow">
					<div class="label">
						<?php if(qtranxf_getLanguage() == 'ru') { ?>
						Время:
						<?php } elseif (qtranxf_getLanguage() == 'en') { ?>
						Time:
						<?php } ?>
					</div>
					<div class="select_wrap">
						<div class="select_main">
							<select name="time_from" class="time_from" >
								<option value="10" selected>10:00</option>
								<option value="11">11:00</option>
								<option value="12">12:00</option>
								<option value="13">13:00</option>
								<option value="14">14:00</option>
								<option value="15">15:00</option>
								<option value="16">16:00</option>
								<option value="17">17:00</option>
								<option value="18">18:00</option>
								<option value="19">19:00</option>
								<option value="20">20:00</option>
								<option value="21">21:00</option>
							</select>
						</div>
						<div class="dash">-</div>
						<div class="select_main">
							<select name="time_to" class="time_to">
								<option value="11">11:00</option>
								<option value="12">12:00</option>
								<option value="13">13:00</option>
								<option value="14">14:00</option>
								<option value="15">15:00</option>
								<option value="16">16:00</option>
								<option value="17">17:00</option>
								<option value="18">18:00</option>
								<option value="19">19:00</option>
								<option value="20">20:00</option>
								<option value="21">21:00</option>
								<option value="22" selected>22:00</option>
							</select>
						</div>
					</div>
				</div>
				<div class="clear"></div>
				<span class="previously_submit">
					<?php if(qtranxf_getLanguage() == 'ru') { ?>
					Заказать стол
					<?php } elseif (qtranxf_getLanguage() == 'en') { ?>
					Reserve a table 
					<?php } ?>
				</span>
				<div class="form_part_2">
					<div class="form_part_wrap">
						<div class="form_part_close"></div>
						<div class="input_wrap">
							<img class="location_img" src="<?php echo get_template_directory_uri(); ?>/images/location.png" alt="location">
							<span class="location">
								<?php if(qtranxf_getLanguage() == 'ru') { ?>
								Ресторан на Оболони
								<?php } elseif (qtranxf_getLanguage() == 'en') { ?>
								Restaurant in Obolon
								<?php } ?>
							</span>
							<div class="clear"></div>
							<div class="date_selected"></div>
							<div class="time_selected">
								<span class="time_selected_from"></span>
								<span> - </span>
								<span  class="time_selected_to"></span>
							</div>
							<div class="input_shadow">
								<label class="label" for="guests_1">
								<?php if(qtranxf_getLanguage() == 'ru') { ?>
								Гостей:
								<?php } elseif (qtranxf_getLanguage() == 'en') { ?>
								Guests:
								<?php } ?>
								</label>
								<input name="guests" id="guests_1" class="guests input" type="text">
							</div>
							<div class="input_shadow">
								<label class="label" for="name_1">
								<?php if(qtranxf_getLanguage() == 'ru') { ?>
								Имя:
								<?php } elseif (qtranxf_getLanguage() == 'en') { ?>
								Name:
								<?php } ?>
								</label>
								<input name="name" id="name_1" class="name input" type="text">
							</div>
							<div class="input_shadow">
								<label class="label" for="phone_1">
								<?php if(qtranxf_getLanguage() == 'ru') { ?>
								Тел:
								<?php } elseif (qtranxf_getLanguage() == 'en') { ?>
								Phone:
								<?php } ?>
								</label>
								<input name="phone" id="phone_1" class="phone input" type="text">
							</div>
							<div class="clear"></div>
							<span class="submit correct" onclick="reserved('Obolon', this);">
								<?php if(qtranxf_getLanguage() == 'ru') { ?>
								Заказать стол
								<?php } elseif (qtranxf_getLanguage() == 'en') { ?>
								Reserve a table 
								<?php } ?>
							</span>
						</div>
					</div>
					<div class="form_part_fade"></div>
				</div>
			</form>
		</div>
	</div>
	<div class="right">
		<div class="right_wrap">
			<img class="location_img" src="<?php echo get_template_directory_uri(); ?>/images/location.png" alt="location">
			<span class="location">
			<?php if(qtranxf_getLanguage() == 'ru') { ?>
			Ресторан на Саксаганского
			<?php } elseif (qtranxf_getLanguage() == 'en') { ?>
			Restaurant on Saksaganskogo Str
			<?php } ?>
			</span>
			<div class="clear"></div>
			<form class="form" action="form.php" id="saksaganskogo">
				<input name="restoran" type="hidden" value="na Saksaganskogo">
				<div class="input_shadow">
					<label class="label" for="date_2">
					<?php if(qtranxf_getLanguage() == 'ru') { ?>
					Дата:
					<?php } elseif (qtranxf_getLanguage() == 'en') { ?>
					Date:
					<?php } ?>
					</label>
					<input name="date" id="date_2" class="date input" type="text" readonly>
				</div>
				<div class="time_select input_shadow">
					<div class="label">
					<?php if(qtranxf_getLanguage() == 'ru') { ?>
					Время:
					<?php } elseif (qtranxf_getLanguage() == 'en') { ?>
					Time:
					<?php } ?>				
					</div>
					<div class="select_wrap">
						<div class="select_main">
							<select name="time_from" class="time_from">
								<option value="10" selected>10:00</option>
								<option value="11">11:00</option>
								<option value="12">12:00</option>
								<option value="13">13:00</option>
								<option value="14">14:00</option>
								<option value="15">15:00</option>
								<option value="16">16:00</option>
								<option value="17">17:00</option>
								<option value="18">18:00</option>
								<option value="19">19:00</option>
								<option value="20">20:00</option>
								<option value="21">21:00</option>
							</select>
						</div>
						<div class="dash">-</div>
						<div class="select_main">
							<select name="time_to" class="time_to">
								<option value="11">11:00</option>
								<option value="12">12:00</option>
								<option value="13">13:00</option>
								<option value="14">14:00</option>
								<option value="15">15:00</option>
								<option value="16">16:00</option>
								<option value="17">17:00</option>
								<option value="18">18:00</option>
								<option value="19">19:00</option>
								<option value="20">20:00</option>
								<option value="21">21:00</option>
								<option value="22" selected>22:00</option>
							</select>
						</div>
					</div>
				</div>
				<div class="clear"></div>
				<span class="previously_submit">
					<?php if(qtranxf_getLanguage() == 'ru') { ?>
					Заказать стол
					<?php } elseif (qtranxf_getLanguage() == 'en') { ?>
					Reserve a table 
					<?php } ?>
				</span>
				<div class="form_part_2">
					<div class="form_part_wrap">
						<div class="form_part_close"></div>
						<div class="input_wrap">
							<img class="location_img" src="<?php echo get_template_directory_uri(); ?>/images/location.png" alt="location">
							<span class="location">
							<?php if(qtranxf_getLanguage() == 'ru') { ?>
							Ресторан на Саксаганского
							<?php } elseif (qtranxf_getLanguage() == 'en') { ?>
							Restaurant on Saksaganskogo Str
							<?php } ?>
							</span>
							<div class="clear"></div>
							<div class="date_selected"></div>
							<div class="time_selected">
								<span class="time_selected_from"></span>
								<span> - </span>
								<span  class="time_selected_to"></span>
							</div>
							<div class="input_shadow">
								<label class="label" for="guests_2">
								<?php if(qtranxf_getLanguage() == 'ru') { ?>
								Гостей:
								<?php } elseif (qtranxf_getLanguage() == 'en') { ?>
								Guests:
								<?php } ?>
								</label>
								<input name="guests" id="guests_2" class="guests input" type="text">
							</div>
							<div class="input_shadow">
								<label class="label" for="name_2">
								<?php if(qtranxf_getLanguage() == 'ru') { ?>
								Имя:
								<?php } elseif (qtranxf_getLanguage() == 'en') { ?>
								Name:
								<?php } ?>
								</label>
								<input name="name" id="name_2" class="name input" type="text">
							</div>
							<div class="input_shadow">
								<label class="label" for="phone_2">
								<?php if(qtranxf_getLanguage() == 'ru') { ?>
								Тел:
								<?php } elseif (qtranxf_getLanguage() == 'en') { ?>
								Phone:
								<?php } ?>
								</label>
								<input name="phone" id="phone_2" class="phone input" type="text">
							</div>
							<div class="clear"></div>
							<span class="submit correct" onclick="reserved('Sagadskogo', this)">
							<?php if(qtranxf_getLanguage() == 'ru') { ?>
							Заказать стол
							<?php } elseif (qtranxf_getLanguage() == 'en') { ?>
							Reserve a table 
							<?php } ?>
							</span>
						</div>
					</div>
					<div class="form_part_fade"></div>
				</div>
			</form>
		</div>
	</div>
	<div class="clear"></div>
</div>
<div class="section_3" id="menu">
	<div class="wrap">
		<div class="title_menu">
			<a href="#" open>
				<img src="<?php echo get_template_directory_uri(); ?>/images/cover.png" alt="cover">
			</a>
			<span>
			<?php if(qtranxf_getLanguage() == 'ru') { ?>
			Меню
			<?php } elseif (qtranxf_getLanguage() == 'en') { ?>
			Menu
			<?php } ?>
			</span>
		</div>

		<div class="menu_bg">
			<div class="menu">
				<?php
				$args = array(
					'type'         => 'post',
					'parent'       => '2',
					'orderby'      => 'ID',
					'order'        => 'ASC',
					'hide_empty'   => 0,
					'hierarchical' => 1,
					'exclude'      => '',
					'include'      => '',
					'number'       => 0,
					'taxonomy'     => 'category',
					'pad_counts'   => false,
					// полный список параметров смотрите в описании функции http://wp-kama.ru/function/get_terms
				);
				$categories = get_categories( $args );

				if ($categories)
					foreach ($categories as $category)
					{
						echo '<span class="first" onclick="get_menu_items('.$category->cat_ID.');">'.$category->name.'</span>';
					}
				?>


			</div>
		</div>
		

		<?php $loop = new WP_Query( array( 'post_type' => 'main_page', 'posts_per_page' => -1 ) ); ?>
		<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
		<a href="<?php the_field('menu_pdf'); ?>" target="blank" class='view_all_menu desktop_up_pdf'><img src="<?php echo get_template_directory_uri(); ?>/images/all_menu.png" alt='all menu'><span>
		<?php if(qtranxf_getLanguage() == 'ru') { ?>
		Смотреть все меню
		<?php } elseif (qtranxf_getLanguage() == 'en') { ?>
		Watch full menu
		<?php } ?>
		</span></a>
		<?php wp_reset_postdata(); ?>
		<?php endwhile; ?>
		
		<div class="dishs" id="dishs">
			<?php

			$args = array(
				'numberposts' => -1,
				'category'    => $categories[0]->cat_ID,
				'orderby'     => 'date',
				'order'       => 'DESC',
				'include'     => array(),
				'exclude'     => array(),
				'meta_key'    => '',
				'meta_value'  =>'',
				'post_type'   => 'post',
				'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
			);

			$posts = get_posts ($args);
			
				if($posts)
					foreach ($posts as $post)
					{
						$img = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'post');
						echo '<div class="dish">
  							<img class="dish_img" src="'.$img[0].'" alt="dish">
  							<div class="dish_name">'.$post->post_title.'</div>
  							<div class="dish_text">'.$post->post_content.'</div>
  							<div class="dish_price">'.round(get_field('menu_price', $post->ID));
                        if(qtranxf_getLanguage() == 'ru')
                            echo ' ГРН';
                        else if(qtranxf_getLanguage() == 'en')
                            echo ' UAH';
						echo '</div>
							  </div>';
					}
			?>
		</div>
		<div class="clear"></div>

		<!-- <div class="pagination">
			<span class="border"></span>
			<a class="curent" href="">1</a>
			<span class="border"></span>	
			<a href="">2</a>
			<span class="border"></span>
			<a href="">3</a>
			<span class="border"></span>
			<a href="">...</a>
			<span class="border"></span>
			<a href="">6</a>
			<span class="border"></span>
		</div> -->

	</div>
	<div class="clear"></div>
</div>

<div class="section_4" id="news">
	<div class="bottom_bg"></div>
	<div class="wrap">
		<div class="title_article">
			<img src="<?php echo get_template_directory_uri(); ?>/images/articles.png" alt="articles">
			<span>
			<?php if(qtranxf_getLanguage() == 'ru') { ?>
			О Нас
			<?php } elseif (qtranxf_getLanguage() == 'en') { ?>
			About us
			<?php } ?>
			</span>
		</div>
		
				<div class="article_slider_wrap">
			<ul class="article_slider">
				<?php
					$posts = get_field('news_posts', 7);

				foreach ($posts as $i => $post)
                {
                    echo '<li class="slide">
					<img class="article_img" src="'.$post['pfoto'].'" alt="article">
					<div class="article_name">'.$post['ptitle'].'</div>
					<div class="article_text">'.$post['pcontet'].'</div>
					<span class="article_show" onclick="get_state('.$i.')">';
                 	 if(qtranxf_getLanguage() == 'ru')
                      echo 'смотреть';
                  	else if(qtranxf_getLanguage() == 'en')
                      echo 'read more';
                  	echo '</span></li>';
                }
                ?>
			</ul>
			<div class="clear"></div>

			<div class="article_view">
				<div class="article_view_wrap">	

				</div>

				<div class="article_view_fade"></div>
			</div>
		</div>


		<div class="title_galery" id="gallery">
			<img src="<?php echo get_template_directory_uri(); ?>/images/gallery.png" alt="allery">
			<span><?php if(qtranxf_getLanguage() == 'ru') { ?>
			Галерея
			<?php } elseif (qtranxf_getLanguage() == 'en') { ?>
			Gallery
			<?php } ?></span>
		</div>
		<div class="photos_slider_wrap">
			<?php $loop = new WP_Query( array( 'post_type' => 'foto_gallery', 'posts_per_page' => -1 ) ); ?>
			<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>

			<ul class="photos_slider">
				<?php
					if( have_rows('foto_gallery') ) : while ( have_rows('foto_gallery') ) : the_row();
				?>
				<li class="slide">
					<img class="photo_img" src="<?php the_sub_field('gfoto'); ?>" alt="photo">
				</li>
				<?php endwhile; endif; ?>
			</ul>

			<?php wp_reset_postdata(); ?>
			<?php endwhile; ?>
			<div class="clear"></div>
		</div>
		<a class="link_gallery" href="<?php echo get_page_link('87'); ?>">
		<?php if(qtranxf_getLanguage() == 'ru') { ?>
		Все фотографии
		<?php } elseif (qtranxf_getLanguage() == 'en') { ?>
		Watch all foto
		<?php } ?>
		</a>
		<div class="reviews_block" id="reviews">

		<?php $loop = new WP_Query( array( 'post_type' => 'main_page', 'posts_per_page' => -1 ) ); ?>
		<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
			<div class="reviews">
				<?php
					if( have_rows('reviews') ) : while ( have_rows('reviews') ) : the_row();
				?>
				<div class="review">
					<img class="review_ava" src="<?php the_sub_field('foto'); ?>" alt="avatar">
					<div class="review_content">
						<div class="name"><?php the_sub_field('name'); ?></div>
						<div class="date"><?php the_sub_field('date'); ?></div>
						<div class="clear"></div>
						<div class="stars"></div>
						<div class="clear"></div>
						<div class="text"><?php the_sub_field('comment'); ?></div>
					</div>
					<div class="clear"></div>
					<div class="border"></div>
				</div>
				<?php endwhile; endif; ?>
			</div>
		<?php wp_reset_postdata(); ?>
		<?php endwhile; ?>

			<div class="facebook_group">
				<div class="fb-page" data-href="https://www.facebook.com/capodimonte.ua/" data-tabs="timeline" data-width="300" data-height="700" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
					<blockquote cite="https://www.facebook.com/capodimonte.ua/" class="fb-xfbml-parse-ignore">
						<a href="https://www.facebook.com/capodimonte.ua/">Capo di Monte</a>
					</blockquote>
				</div>
				<a class="facebook_group_link" href="https://www.facebook.com/capodimonte.ua/" target="_blank"></a>
			</div>
			<div class="clear"></div>
		</div>
	</div>
</div>
<div class="section_5" id="contacts">
	<div class="map_title">
		<div class="left">
			<div class="left_wrap active">
				<img class="location_img" src="<?php echo get_template_directory_uri(); ?>/images/location.png" alt="location">
				<span class="location">
				<?php if(qtranxf_getLanguage() == 'ru') { ?>
				Ресторан на Оболони
				<?php } elseif (qtranxf_getLanguage() == 'en') { ?>
				Restaurant in Obolon	
				<?php } ?>
				</span>
				<div class="clear"></div>
				<div class="border_bottom"></div>
				<div class="clear"></div>
			</div>
		</div>
		<div class="right">
			<div class="right_wrap">
				<img class="location_img" src="<?php echo get_template_directory_uri(); ?>/images/location.png" alt="location">
				<span class="location">
				<?php if(qtranxf_getLanguage() == 'ru') { ?>
				Ресторан на Саксаганского
				<?php } elseif (qtranxf_getLanguage() == 'en') { ?>
				Restaurant on Saksaganskogo Str
				<?php } ?>
				</span>
				<div class="clear"></div>
				<div class="border_bottom"></div>
				<div class="clear"></div>
			</div>
		</div>
		<div class="clear"></div>
	</div>
	<div class="wrap_gmap">
		<div class="adress info-left">
			<ul>
				<li>
					<strong>Адрес:</strong>
					<p>пр. Героев Сталинграда, 14Б</p>
				</li>
				<li>
					<strong>Телефон:</strong>
					<p><a href="tel:0442212017">0442212017</a></p>
				</li>
			</ul>
		</div>
		<div class="adress info-right">
			<ul>
				<li>
					<strong>Адрес:</strong>
					<p>ул. Саксаганского,35</p>
				</li>
				<li>
					<strong>Телефон:</strong>
					<p><a href="tel">0672142707</a></p>
				</li>
			</ul>
		</div>
		<div id="map_1"></div>
		<div id="map_2"></div>
		<script type="text/javascript">
			$(function(){
				function initMap() {
					if ($(window).width() > 767) {
						markerIcon_1 = '../wp-content/themes/capodimonte/images/marker.png';
						markerIcon_2 = '../wp-content/themes/capodimonte/images/marker.png';
						scrollwheel = false;
					}
					else {
						markerIcon_1 = '../wp-content/themes/capodimonte/images/marker.png';
						markerIcon_2 = '../wp-content/themes/capodimonte/images/marker.png';
						scrollwheel = false;
					};
					myLatLng_1 = {lat: 50.507758, lng: 30.5130489};
					map_1 = new google.maps.Map(document.getElementById('map_1'), {
						scrollwheel: scrollwheel,
						zoom: 17,
						center: myLatLng_1
					});
					marker = new google.maps.Marker({
						position: myLatLng_1,
						map: map_1,
						icon: markerIcon_1
					});
					myLatLng_2 = {lat: 50.43569, lng: 30.5128051};
					map_2 = new google.maps.Map(document.getElementById('map_2'), {
						scrollwheel: scrollwheel,
						zoom: 17,
						center: myLatLng_2
					});
					marker = new google.maps.Marker({
						position: myLatLng_2,
						map: map_2,
						icon: markerIcon_2
					});
				};
				initMap();
				$(window).resize(function () {
					initMap();
				});
			});
		</script>
	</div>
</div>

<?php get_footer(); ?>