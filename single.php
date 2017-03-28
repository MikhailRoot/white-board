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

					// If comments are open or we have at least one comment, load up the comment template
					if (comments_open() || '0' != get_comments_number()) {
						comments_template();
					}
					}?>
			</main>
		</div>
		<?php get_sidebar('right'); ?>
	</div>
</div>

<?php get_footer(); ?> 