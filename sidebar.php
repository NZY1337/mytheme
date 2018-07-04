<div class="container">
    <div class="row">
        <div class="col-xl-12">
        <div id="ttr_sidebar" class="col-xl-12">
            <h2 ><?php _e('Categories'); ?></h2>
            <ul > 
            <?php
							$args = array(
										'post' => 'posts',
										'orderby' => 'name',
										'order'   => 'ASC'
									);

							$cats = get_categories($args);
										
								foreach($cats as $cat) {
							?>
								<ul class="w-100">
									<li class="w-100">
										<a href="<?php echo get_category_link( $cat->term_id ) ?>">
											<?php echo $cat->cat_name; ?>	
											<?php  echo number_postpercat ($cat->term_id); ?>
										</a>
									</li>
								</ul>
						<?php
						}
						?>
             </ul>
            <h2 ><?php _e('Archives'); ?></h2>
            <ul > <?php wp_get_archives(); ?> </ul>
            
        </div>
        </div>
    </div>
</div>

