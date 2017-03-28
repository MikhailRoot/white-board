<?php if ( ! defined( 'ABSPATH' ) ){ exit; } ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<h1 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>

		<?php if ('post' == get_post_type()) { ?> 
		<div class="entry-meta">
			<?php white_post_created_time(); ?>
			by <span class="author_name"><?php  echo get_the_author(); ?></span>
		</div><!-- .entry-meta -->
		<?php } //endif; ?> 
	</header><!-- .entry-header -->

	
	<?php if ( is_search() || is_archive() || is_home() ) { ?>
	<div class="entry-summary">
		<?php the_excerpt(); ?> 
		<div class="clearfix"></div>
	</div><!-- .entry-summary -->
	<?php } else { ?> 
	<div class="entry-content">
		<?php the_content(); ?>
		<div class="clearfix"></div>
	</div><!-- .entry-content -->
	<?php } //endif; ?> 

	
	<footer class="entry-meta">
		<?php if ('post' == get_post_type()) { // Hide category and tag text for pages on Search ?> 
		<div class="entry-meta-category-tag">
			<?php
				$categories_list = get_the_category_list(', ');
				if (!empty($categories_list)) {
			?> 
			<span class="cat-links">
				<?php echo $categories_list; ?>
			</span>
			<?php } // End if categories

				$tags_list = get_the_tag_list('', ', ');
				if ($tags_list) {
			?> 
			<span class="tags-links">
				<?php echo $tags_list; ?>
			</span>
			<?php } // End if $tags_list ?> 
		</div><!--.entry-meta-category-tag-->
		<?php } // End if 'post' == get_post_type() ?> 

		<div class="entry-meta-comment-tools">
			<?php if (! post_password_required() && (comments_open() || '0' != get_comments_number())) { ?>
			<span class="comments-link"><?php white_comments_popup_link(); ?></span>
			<?php } //endif; ?>

			<?php white_edit_post_link(); ?>
		</div><!--.entry-meta-comment-tools-->
	</footer><!-- .entry-meta -->
</article><!-- #post-## -->