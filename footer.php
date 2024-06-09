<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Nathalie_Mota
 */

?>

<footer id="colophon" class="site-footer">
	<div class="site-info">
		<?php
		wp_nav_menu(
			array(
				'theme_location' => 'menu-footer',
				'menu_id'        => 'footer-menu',
			)
		);
		?>

	</div><!-- .site-info -->

	<?php get_template_part('templates-parts/modal'); ?>

</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>
<script src="assets/js/lightbox.js"></script>
</body>

</html>