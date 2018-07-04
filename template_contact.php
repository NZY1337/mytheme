
<?php /* Template Name: contact-page */ ?>
<?php get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>
           
			<div class="container pt-5">
					<div class="row pt-5">
                            <div class="pt-5">
                                <?php the_post_thumbnail('large');?>
                                <h1 class="pt-5    "> <?php the_title(); ?></h1>
                                <?php the_content(); ?>
                            </div>
					</div>

                    <div class="row">
                        <div class="col-xl-6 formNew">
                            <!--  echo do_shortcode its a function for all  shortcodes  -->
                            <h4>Please complete the form: </h4>
                            <?php  echo do_shortcode('[contact-form-7 id="493" title="Contact form 1"]'); ?>
                        </div>

                        <div class="col-xl-6">
                            <h4>Find Us Here:</h4>
                            <div id="map" style="width:100%;height:400px;"></div>
                        </div>
                    </div>
			</div>
<?php endwhile;?>
<?php get_footer(); ?>
