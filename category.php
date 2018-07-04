
<!--  Category Page	-->
<?php get_header(); ?>

<div class="container pt-5">
	<div class="row pt-5">
		<div class="col-xl-12 pt-5">
			<?php	the_archive_title('<h2 class="page-title">', '</h2>'); ?>
			<?php the_archive_description('<div class="taxonomy-description">', '</div>'); ?>
		</div>
		
		<div class="col-xl-12">
			<?php if (have_posts()): 
				 while(have_posts()) : the_post(); ?>
						<?php if (has_post_thumbnail() ): ?>
							
							<!-- display thumbnail -->
							<!-- <div class=""><?php the_post_thumbnail('large'); ?></div> -->
						
						<?php endif; ?>
						<?php the_title('<h2 class="the_title ">', '</h2>'); ?>
						<p class="mb-0 pt-4">Published on: 
							<span class=""><?php echo get_the_date( 'Y-m-d' ); ?></span>
						</p>
						<p class="mb-0">Posted by:
							<span class=""><?php the_author(); ?></span> <span class="font-weight-bold">at <?php the_time(); ?></span>
						</p>
						<?php the_content(); ?>
						<?php the_tags(); ?>
						<small><?php wp_get_post_tags() ?></small>
						
						<hr>

				 <?php endwhile;
			endif; ?>
		</div>
	</div>
</div>

<?php get_footer(); ?>
