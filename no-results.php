<?php
/**
 * The template part for displaying message that posts cannot be found.
 */
if ( ! defined( 'ABSPATH' ) ){ exit; }

?>
<section class="no-results not-found">
	<header class="page-header">
		<h1 class="page-title"><?php _e('Nothing Found', 'white-board'); ?></h1>
	</header><!-- .page-header -->

	<div class="page-content row-with-vspace">
		<?php if (is_home() && current_user_can('publish_posts')) { ?> 
			<p><?php printf('Ready to publish your first post? <a href="%1$s">Get started here</a>.', esc_url(admin_url('post-new.php'))); ?></p>
		<?php } elseif (is_search()) { ?> 
			<p>Sorry, but nothing matched your search terms. Please try again with some different keywords.</p>
			<?php echo white_full_width_search_form(); ?>
		<?php } else { ?> 
			<p>It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.</p>
			<?php echo white_full_width_search_form(); ?>
		<?php } //endif; ?> 
	</div><!-- .page-content -->
</section><!-- .no-results -->