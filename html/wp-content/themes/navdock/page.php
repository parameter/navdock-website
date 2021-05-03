<?php
/**
 * The template for displaying all pages
 *
 */

$background_image = get_field('page-background-image');
$landingpage_intro = get_field('landingpage-intro');

get_header(); ?>

	<div style="background-image:url(<?php echo $background_image['sizes']['page-background-image']; ?>);" class="navdock-page__page-wrapper">
		<div class="navdock-page__page-wrapper-inner">
			
			<div class="navdock-page__page-intro">
				
			</div>

			<div class="navdock-page__page-intro">
				<?php echo $landingpage_intro; ?>
				<div class="navdock-page__register-bar"><p>Registrera dig</p></div>
			</div>

		</div>
	</div>

	<div class="landing-page__content">
        <?php echo apply_filters( 'the_content', $post->post_content ) ?>
    </div>

<?php get_footer(); ?>
