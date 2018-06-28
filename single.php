
<!--  Single Post Page & SIMILAR POSTS / postul in sine	-->
<?php get_header(); ?>
<div class="container pt-5">
	<?php while ( have_posts() ) : the_post(); ?>
		
					<div class="row mt-5">
						<h1 class="pt-5 pb-3"> <?php the_title(); ?></h1>
						<div class="col-xl-10">
								<p class="mb-0 pt-4">Published on: 
									<span class="font-weight-bold"><?php echo get_the_date( 'Y-m-d' ); ?></span>
								</p>
								<p class="mb-0">Posted by:
									<span class="font-weight-bold"><?php the_author(); ?></span> <span class="font-weight-bold">at <?php the_time(); ?></span>
								</p>
								
								<div class="py-3 d-none">
									<?php the_post_thumbnail('large');?>
								</div>
						</div>
					</div>

					<div class="row">
						<div class="col-xl-12">
							<?php the_content(); ?>
						</div>
					</div>
				
	<?php endwhile;?>
</div>   <!-- /container	-->


<div class="container">
		<?php 

		// the query
		$related = new WP_Query(
			array(
				'category__in'   => wp_get_post_categories( $post->ID ),
				'posts_per_page' => 5,
				'post__not_in'   => array( $post->ID )
			)
		);
		
		
		?>
		<?php if ( $related->have_posts() ) : ?>
			<!-- the loop -->
			<div class="row">
				<div class="col-xl-12 pb-5">
						<h2 class="pt-5 pb-2 text-secondary border-bottom">Related posts:</h2>
				</div>
			</div>
			<?php while ( $related->have_posts() ) : $related->the_post(); ?>
				<div class="row">
				<div class="col-xl-6">
						<h3 class="pt-5 pb-2 font-italic"><?php the_title();?></h3>
						<p class=""><?php  the_excerpt();?></p>
						<div class="img-effect">
							<a class="" href="<?php the_permalink(); ?>"><?php echo get_the_post_thumbnail( $post_id, 'thumbnail', array( 'class' => 'alignleft' ) );?></a>
						</div>
						
						<p>Published on: <span class="font-italic text-secondary"><?php echo get_the_date( 'Y-m-d' ); ?></span></p>
				</div>
				</div>
			<?php endwhile; ?>
			<!-- end of the loop -->

			<?php wp_reset_postdata(); ?>

		<?php else : ?>
			<!-- <p><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p> -->
		<?php endif; ?>
		</div>
<?php get_footer(); ?>

