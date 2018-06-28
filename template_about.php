
<?php /* Template name: template_about */ ?>
<?php get_header(); ?>

<?php 

$borned_place 			= get_post_meta(178, 'borned_place', true);
$borned_description 	= get_post_meta(178, 'borned_description', true);
$borned_pic				= get_post_meta(178, 'borned_pic', true);

?>

<div id="primary" class="content-area ">
	<main id="main" class="site-main" role="main">
		
		<?php while ( have_posts() ) : the_post(); ?>
			<div class="container pt-5">
				<div class="row my-5">
					<div class="col-xl-10 pt-5">
					<h2 class="pt-5 pb-3"> <?php the_title(); ?></h2>
							<?php the_post_thumbnail('large');?>
							<p class="mb-0 pt-4">Page was published: 
								<span class="font-weight-bold"><?php echo get_the_date( 'Y-m-d' ); ?></span>
							 </p>
							 <p class="mb-0">Posted by:
							 	<span class="font-weight-bold"><?php the_author(); ?></span>
							 </p>
					</div>
					
					<div class="col-xl-12 p-5 mt-5 text-white bg-dark">
						<h2 class="">I was borned  in  <span><?php echo $borned_place ?></span> </h2>
						<p class="m-0 w-75 pt-2">
								<?php echo get_post_meta(178, 'borned_description', true); ?>
						</p>
					</div>
				</div>
			</div>
            <div class="container">
                     
                     <?php the_content(); ?>
					 <div class="row">
					 	<div class="col-xl-11">
						 		<img src="<?php echo $borned_pic ?>" class="img-fluid" alt="">
						 </div>
					 </div>
            </div>
			
	<?php endwhile;?>

	</main><!-- .site-main -->

	

</div><!-- .content-area -->


<?php get_footer(); ?>
