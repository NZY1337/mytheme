<div id="primary" class="content-area mt-5">
	<main id="main" class="site-main" role="main">

		<?php while ( have_posts() ) : the_post(); ?>
           
			<div class="container">
					<div class="row">
						<div class="col-xl-12">
						
						</div>
					</div>

					
					<?php /* Displaying posts from the same category */ ?>
					<div class="row">
							<?php 
									// the query 
									$criteria = array (
										'type' => 'post',
										'post_per_page' => 5,
										'category_name' => 'cities',
										'offset' => 1
									);
									$the_query = new WP_Query($criteria);
							?>
									
							<?php if ( $the_query->have_posts() ) : ?>

								<!-- pagination here -->

								<!-- the loop -->
								<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
									<h2 class="text-danger pt-5"><?php the_title();?></h2>
									<p class="p-4 bg-dark text-white mb-5 ml-4 mt-5">Category: <?php single_cat_title(); ?></p>
									<hr class="w-100 border-top">
									<div class="col-xl-12 ">
										<p class=""><?php  the_content();?></p>
									</div>
								<?php endwhile; ?>
								<!-- end of the loop -->

								<!-- pagination here -->
								
								<?php wp_reset_postdata(); ?>

							<?php else : ?>
								<p><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>
							<?php endif; ?>
					</div>

			 </div>   <!-- /container	-->

	<?php endwhile;?>

	</main><!-- .site-main -->

	

</div><!-- .content-area -->