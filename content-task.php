<?php if ( ! defined( 'ABSPATH' ) ){ exit; } ?>
<?php $post=get_post(); ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<h1 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
			<div class="row">
				<div class="col-sm-6">
					<div class="created">
							<div class="form-group">
								<label>Created by <span class="author_name"><?php  echo get_the_author(); ?></span></label>
								<input type="text" class="form-control" readonly value="<?php echo get_the_date('m/d/Y H:i'); ?>">
							</div>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="executor_data">
						<?php
						if(class_exists('Assignments')){
							$executor=Assignments::getTaskExecutorUser($post->ID);
							$dateTill=new DateTime(Assignments::getTaskDateTill($post->ID));
							?>
							<div class="form-group">
								<label for="dateTill"><b>Executor:</b> <span class="name"> <?php echo $executor->display_name; ?></span> <span class="email"><?php echo $executor->user_email; ?></span> - complete till:</label>
								<input  id="dateTill" type="text" class="form-control" value="<?php echo $dateTill->format('m/d/Y H:i'); ?>" readonly>
							</div>
						<?php	}	?>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12 timeState">
					<?php
					if(class_exists('Assignments')){
						$dateTill=new DateTime(Assignments::getTaskDateTill($post->ID));
						$taskStateTerm=Assignments::getCurrentTaskState($post->ID);
						if(time()>$dateTill->getTimestamp()){
							$class="dateTill passed";
						}else{
							$class="dateTill future";
						}
						if($taskStateTerm instanceof WP_Term){
							$class.=" ".$taskStateTerm->slug;
						}
						echo '<div class="'.$class.'  text-center" > ';
						echo '<div class="currentState">'.$taskStateTerm->name.'</div>';
						echo '<div class="human">'.human_time_diff(time(),$dateTill->getTimestamp()).'</div>';
						echo '</div> ';
					}
					?>
				</div>
			</div>
	</header><!-- .entry-header -->

	

	<div class="entry-content">
		<?php
		// lets echo all history of task
		if(class_exists('Assignments')){

			$task_data=[];
			if(is_single()){
				$task_data=Assignments::getTaskStatesData($post->ID);
			}elseif(is_archive()){
				$task_data[]=Assignments::getTaskDataForCurrentState($post->ID);
			}
			// output it.
			foreach($task_data as $task){
				?>
				<section class="<?php  echo esc_attr($task['state']->slug);?>">
					<h3><?php echo esc_attr($task['state']->name); ?></h3>
					<div class="stateddateTime">
						<?php  echo esc_html($task['time']); ?>
					</div>
					<div class="description">
						<?php  echo wp_kses_post($task['description']); ?>
					</div>
				</section>

				<?php
			}

		}
		?>
		<div class="clearfix"></div>
	</div><!-- .entry-content -->

	
	<footer class="entry-meta">

		<div class="entry-meta-category-tag">

		</div><!--.entry-meta-category-tag-->


		<div class="entry-meta-comment-tools">
			<?php white_edit_post_link(); ?>
		</div><!--.entry-meta-comment-tools-->
	</footer><!-- .entry-meta -->
</article><!-- #post-## -->