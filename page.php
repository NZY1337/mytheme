

<?php get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>
            <div class="container">
                     <h1 class="pt-5 pb-3"> <?php the_title(); ?></h1>
            </div>
			
			<div class="container">
					<div class="row">
						<div class="col-xl-10">
								<div class="py-3">
									<?php the_post_thumbnail('large');?>
								</div>
							
								<p class="mb-0 text-center">Posted by:
									<span class="font-weight-bold"><?php the_author(); ?></span> <span class="font-weight-bold">at <?php the_time(); ?></span>
								</p>
						</div>
					</div>
					
					<div class="row pt-5  mt-5">
						<div class="col-xl-12">
							<?php the_content(); ?>
						</div>
					</div>
			</div>
<?php endwhile;?>

	
