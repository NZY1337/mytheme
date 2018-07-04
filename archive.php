
<!--  BLOG PAGE	-->
<?php 
	/* Template name: template_archives */
?>


<?php get_header(); ?>	

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">

		<?php while ( have_posts() ) : the_post(); ?>
           
			<div class="container pt-5">
						
					<div class="row pt-5">
							
						<div class="col-xl-6">
								
                                <h1 class=""> <?php the_title(); ?></h1>
								<p class="mb-0 pt-4">Published on:	 
									<span class="font-weight-bold"><?php echo get_the_date( 'Y-m-d' ); ?></span>
								</p>
								<p class="mb-0">Posted by:
									<span class="font-weight-bold"><?php the_author(); ?></span> <span class="font-weight-bold">at <?php the_time(); ?></span>
								</p>
						</div>
						<div class="col-xl-6  bg-dark text-white">
							<p class="text-center mr-0"><?php get_sidebar(); ?></p>
							
						</div>
					</div>

					<div class="row ">
						<div class="col-xl-12 pt-5">
							<?php the_content(); ?>
						</div>
					</div>
					
					
					
					<?php /* Displaying posts  category */ ?>
					<div class="row mt-5">
							<?php 
									// the query 
									$criteria = array (
										'type' => 'post',
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
											<a class="" href="<?php 	the_permalink(); ?>"><?php echo get_the_post_thumbnail( $post_id, 'large', array( 'class' => 'alignleft' ) );?></a>
										</div>
                                        <p class="">Category: <hr class="w-25 ml-0 "> <small><?php the_category(); ?></small></p>
                                        <p>Published on: <span class="font-italic text-secondary"><?php echo get_the_date( 'Y-m-d' ); ?></span></p>
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
<div class="container">
	<div class="row">
		<div class="col-xl-12">
				<?php get_sidebar(); ?>
				
		</div>
	</div>
</div>
<?php get_footer(); ?>







