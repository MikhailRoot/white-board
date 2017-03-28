<?php
if ( ! defined( 'ABSPATH' ) ){ exit; }
get_header();
?>
<div class="container">
	<div class="row">
		<div class="col-md-9 content-area" id="main-column">
			<main id="main" class="site-main" role="main">
				<?php if (have_posts()) { ?>
					<?php

					while (have_posts()) {
						the_post();
						get_template_part('content', get_post_format());
					}
					bootstrapBasicPagination();
					?>
				<?php } else { ?>
					<?php get_template_part('no-results', 'index'); ?>
				<?php } // endif; ?>
			</main>
		</div>
		<?php get_sidebar('right'); ?>
	</div>
</div>

<?php get_footer(); ?> 