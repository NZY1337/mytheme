
<!-- EVENTS PAGE	-->

<?php 
	/* Template name: conferences_archives */
?>

<?php get_header(); ?>
			<div class="container pt-5">
					<div class="row pt-5">
						<div class="col-xl-6">
								<h1 class="text-capitalize">
							
								
								
									 <?php 
											$post_type = get_post_type( get_the_ID() );
											echo $post_type;
											 
   									?>
 								</h1> 
								 
								<p class="mb-0 pt-4">Published on: 
									<span class="font-weight-bold"><?php echo get_the_date( 'Y-m-d' ); ?></span>
								</p>

								<p class="mb-0">Posted by:
									<span class="font-weight-bold"><?php the_author(); ?></span> <span class="font-weight-bold">at <?php the_time(); ?></span>
								</p>
						</div>
						<div class="col-xl-6 p-5 bg-dark text-white">
							<h1>Categories</h1>
						<?php
							$args = array(
										'taxonomy' => 'conferences-categories',
										'orderby' => 'name',
										'order'   => 'ASC'
									);

							$cats = get_categories($args);
										
								foreach($cats as $cat) {
							?>
								<ul class="m-0">
									<li>
										<a href="<?php echo get_category_link( $cat->term_id ) ?>">
											<?php echo $cat->cat_name; ?>
											<?php  echo number_postpercat ($cat->term_id); ?>	
										</a>
									</li>
								</ul>
						<?php
						}
						?>
						</div>
					</div>

						<div class="row ">
						<div class="col-xl-12 pt-5">
							<?php  
								$post_id = 433;
								$post_content = get_post($post_id);
								$content = $post_content->post_content;
								echo apply_filters('the_content',$content);
								echo get_the_post_thumbnail( $post_id, 'large', array( 'class' => 'alignleft' ) );
							?>
						</div>
					</div>
					
					
					
					
					<?php /* Displaying posts  category */ ?>
					<div class="row mt-5">
							<?php 
									// the query 
									$criteria = array (
										'post_type' => 'conferences',
										'post_per_page' => 7,
										// 'category_name' => 'cities'
									);
									$the_query = new WP_Query($criteria);
							?>

							<?php if ( $the_query->have_posts() ) : ?>

								<!-- pagination here -->

								<!-- the loop -->
								<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
									<h2 class="text-danger pt-5"><?php the_title();?></h2>
									
									<hr class="w-100 border-top">
									<div class="col-xl-12 ">
										<p class=""><?php  the_excerpt();?></p>
										<div class="img-effect">
											<a class="" href="<?php the_permalink(); ?>"><?php echo get_the_post_thumbnail( $post_, 'large', array( 'class' => 'alignleft' ) );?></a>
										</div>
                                        <p class="">Category:
												
										<?php
												$terms = get_the_terms($post->ID , 'conferences-categories');
												foreach($terms as $term){
													echo '<a class="events_category" href="'. get_term_link($term) . '">' .  "</a>";
												}
												the_terms( $post->ID , 'conferences-categories' );
										?>
										 <hr class="w-25 ml-0 "> <small><?php the_category(); ?></small></p>
                                        <p>Published on: <span class="font-italic text-secondary"><?php echo get_the_date( 'Y-m-d', $post->ID); ?></span></p>
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


<?php get_footer(); ?>








