
<?php get_header(); ?>
<div class="container pt-5">
	<?php while ( have_posts() ) : the_post(); ?>
					<div class="row mt-5">
						<div class="col-xl-11">
						<h1 class="pt-5"> <?php the_title(); ?></h1>
						<hr class="w-75 bg-danger ml-0 my-0 pb-1">
								<div class="pt-5">
									<?php the_post_thumbnail('large');?>
								</div>
								

								<!-- <?php
										$terms = get_the_terms($post->ID , 'events-categories');
										foreach($terms as $term){
											echo '<a href="'. get_term_link($term) . '">' .  "</a>";
										}
										the_terms( $post->ID , 'events-categories' );
								?> -->
								<?php for($i = 0; $i < count($terms); $i++){ 
									$term = $terms[$i]; 
								?>
									<p>Category: <a href="<?php get_term_link($term)?>">
										<?php echo $term->name?>
									</a></p>
								<?php } 
								?>
								
								
								<div class="text-center py-5">
									<p class="mb-0 ">Published on: 
										<span class="font-weight-bold"><?php  the_date( 'Y-m-d' ); ?></span>
										<span class="font-weight-bold">at <?php the_time(); ?></span>
										<span class="font-weight-bold">at <?php the_category(); ?></span>
									</p>
									<p class="mb-0 pb-3">Posted by:
										<span class="font-weight-bold"><?php the_author(); ?></span>
									</p>
								</div>
						</div>
					</div>

					<div class="row">
						<div class="col-xl-12">
							<?php the_content(); ?>
                            <p><?php the_tags();?></p>
						</div>
					</div>
				
	<?php endwhile;?>
</div>   <!-- /container	-->

<div class="container">
		<?php 
		// echo $post->ID;
		// $categoryId = wp_get_post_categories( $post->ID );
		// print_r ($categoryId);
		// echo $categoryId[0];
		// echo "<pre>";
		// print_r ($post);
		// echo $post->post_author;
		// echo "</pre>";
		// echo $post;

		// the query
		$custom_taxterms = wp_get_object_terms( $post->ID, 'events-categories', array('fields' => 'ids') );
		$args = array(
            'post_type' => 'events',
            'post_status' => 'publish',
            'posts_per_page' => 3, // you may edit this number
            'orderby' => 'rand',
            'post__not_in' => array ( $post->ID ),
            'tax_query' => array(
                array(
                    'taxonomy' => 'events-categories',
                    'field' => 'id',
                    'terms' => $custom_taxterms
                )
				)
			);
        $related_items = new WP_Query( $args );
		
		?>
		<?php if ( $related_items->have_posts() ) : ?>
			<!-- the loop -->
			<div class="row">
				<div class="col-xl-12 pb-5">
						<h2 class="pt-5 pb-2 text-secondary border-bottom">Related posts:</h2>
				</div>
			</div>
			<?php while ( $related_items->have_posts() ) : $related_items->the_post(); ?>
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

