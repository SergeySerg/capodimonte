<?php
/**
 * Шаблон страницы шапки (footer.php)
 * @package WordPress
 * @subpackage capodimonte
 * Template Name: footer
 */
?>

<?php $loop = new WP_Query( array( 'post_type' => 'main_page', 'posts_per_page' => -1 ) ); ?>
<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>

<footer class="footer">
	<img class="footer_logo reveal_scale" src="<?php echo get_template_directory_uri(); ?>/images/logo.png" alt="logo">
	<div class="clear"></div>
	<div class="social">
		<a href="<?php the_field('link_facebook'); ?>" target="_blank">
			<img src="<?php echo get_template_directory_uri(); ?>/images/social/facebook.png" alt="facebook">
		</a>
		<a href="<?php the_field('link_tripadvisor'); ?>" target="_blank">
			<img src="<?php echo get_template_directory_uri(); ?>/images/social/tripadvisor.png" alt="tripadvisor">
		</a>
		<a href="<?php the_field('link_instagram'); ?>" target="_blank">
			<img src="<?php echo get_template_directory_uri(); ?>/images/social/instagram.png" alt="instagram">
		</a>
		<div class="border"></div>
		<a href="<?php the_field('link_appstore'); ?>" target="_blank">
			<img src="<?php echo get_template_directory_uri(); ?>/images/social/mac.png" alt="Загрузить для Apple iPhone">
		</a>
		<a href="<?php the_field('link_android'); ?>" target="_blank">
			<img src="<?php echo get_template_directory_uri(); ?>/images/social/android.png" alt="Загрузить для Android">
		</a>
		<a href="<?php the_field('link_microsoft'); ?>" target="_blank">
			<img src="<?php echo get_template_directory_uri(); ?>/images/social/windows.png" alt="Загрузить для Windows Phone">
		</a>
	</div>
	<a class="clickable_link" href="http://clickable.design/" target="_blank">сделано в clickable.design</a>
</footer>

<?php wp_reset_postdata(); ?>
<?php endwhile; ?>

<div class="pop_up tnx_pop_up">
	<div class="tnx_pop_up_wrap">
		<div class="close"></div>
		<div class="tnx_title">Спасибо!</div>
		<div class="tnx_text">В ближайшее время<br>наш менеджер с вам свяжется</div>
		<div class="pop_text">Окно закроется через <span id="secout"></span> секунд</div>
	</div>
	<div class="fade_pop_up"></div>
</div>

<div class="all_menu_pop_up">
	<div class="all_menu_pop_up_wrap">
		<div class="close_black"></div>
		<div class="all_menu_title">Всё меню</div>
		<?php $loop = new WP_Query( array( 'post_type' => 'main_page', 'posts_per_page' => -1 ) ); ?>
		<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
		<object class="pdf" data="<?php the_field('menu_pdf'); ?>" type="application/pdf">
			<embed class="pdf" src="<?php the_field('menu_pdf'); ?>">
		</object>
		<?php wp_reset_postdata(); ?>
		<?php endwhile; ?>
	</div>
	<div class="fade_pop_up"></div>
</div>

<?php wp_footer(); ?>
</body>
</html>