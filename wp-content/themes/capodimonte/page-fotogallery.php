<?php
/**
	* Шаблон обычной страницы (page.php)
	* @package WordPress
	* @subpackage capodimonte
	Template Name: Фотогалерея
*/

get_header(); ?>

<?php $loop = new WP_Query( array( 'post_type' => 'foto_gallery', 'posts_per_page' => -1 ) ); ?>
<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>

<div class="wrapper">

	<div class="section_gallery">
		<div class="wrap">
			<div class="popup-gallery">

				<?php
					if( have_rows('foto_gallery') ) : while ( have_rows('foto_gallery') ) : the_row();
				?>

				<div class="foto-block">
					<div class="photo_lick" data-name="1">
						<div class="img_wrap">
							<img class="photo_img" src="<?php the_sub_field('gfoto'); ?>">
							<div class="photo_lick_hover">
								<div class="text_hover">Кликните, чтобы увеличить фото</div>
							</div>
						</div>
						<div class="text"><?php the_sub_field('fdescription'); ?></div>
					</div>
				</div>

				<?php endwhile; endif; ?>
				

				<div id="myModal" class="modal">
					<div class="modal-content">
						<?php
							if( have_rows('foto_gallery') ) : while ( have_rows('foto_gallery') ) : the_row();
						?>
						<div class="mySlides">
							<img class="photo_img" src="<?php the_sub_field('gfoto'); ?>" alt="foto">
						</div>
						<?php endwhile; endif; ?>

						<div class="close""></div>

						<a class="prev"></a>
						<a class="next"></a>
						<div class="caption-container">
							<p id="caption"></p>
						</div>
					</div>
				</div><!-- modal -->
			</div><!-- wrap -->
		</div><!-- wrap -->

		<!-- <div class="clear"></div>
		
		<div class="pagination">
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
		</div><!-- pagination --> 


	</div><!-- section_gallery -->
</div><!-- wrapper -->

<?php wp_reset_postdata(); ?>
<?php endwhile; ?>

<?php get_footer(); ?>