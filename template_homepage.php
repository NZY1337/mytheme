
<?php
 /*Template Name: template_homepage */
get_header(); ?>
<?php include 'parts/hero.php';?>
-+

<div class="container pt-5">
    <div class="row">
        <div class="col-xl-10">
            <p> Lorem, ipsum dolor sit amet consectetur adipisicing elit. Aperiam totam expedita, doloremque quaerat 
            illum at quasi ratione. Totam ullam fuga iusto nesciunt, incidunt eius tempore assumenda accusantium velit, distinctio odio? </p>
            <p> Lorem, ipsum dolor sit amet consectetur adipisicing elit. Aperiam totam expedita, doloremque quaerat 
            illum at quasi ratione. Totam ullam fuga iusto nesciunt, incidunt eius tempore assumenda accusantium velit, distinctio odio? </p>   
        </div>
    </div>
    <div class="row ">
        <!-- TEXT -->
        <div class="col-xl-12 pt-4">
                <h3>Custom Field - type [text]</h3>
                <div class="text-danger">
                    <?php 
                        the_field('short_description');
                        // $short =  get_field('short_description');
                        // echo $short;
                    ?>
                </div>
                 <hr style="height:1px" class"bg-dark w-100">
        </div>

         <!-- AREA -->
         <div class="col-xl-12 pt-4">
                <h3>Custom Field - type [area]</h3>
                <?php 
                   the_field('your_name');
                ?>
                 <hr style="height:1px" class"bg-dark w-100">
        </div>

         <!-- NUMBER -->
        <div class="col-xl-12 pt-4">
                <h3>Custom Field - type [number]</h3>
                <?php 
                   the_field('quantity_label');
                ?>
                 <hr style="height:1px" class"bg-dark w-100">
        </div>

         <!-- EMAIL -->
        <div class="col-xl-12 pt-4">
                <h3>Custom Field - type [email]</h3>
                <?php 
                   the_field('email_label');
                ?>
                 <hr style="height:1px" class"bg-dark w-100">
        </div>
       
        <!-- URL -->
        <div class="col-xl-12 pt-4">
                <h3>Custom Field - type [url]</h3>
                <?php 
                   the_field('url_label');
                ?>

                
                 
                 <hr style="height:1px" class"bg-dark w-100">
        </div>

          <!-- PASSWORD -->
          <div class="col-xl-12 pt-4">
                <h3>Custom Field - type [password]</h3>
                <?php 
                   the_field('password_label');
                ?>
                 <hr style="height:1px" class"bg-dark w-100">
        </div>

         <!-- EDITOR -->
         <div class="col-xl-12 pt-4">
                <h3>Custom Field - type [editor]</h3>
                <?php 
                   the_field('editor_label');
                ?>
                 <hr style="height:1px" class"bg-dark w-100">
        </div>

        <!-- EMDEDED -->
        <div class="col-xl-12 pt-4">
                <h3>Custom Field - type [embeded]</h3>
                <?php 
                   the_field('embeded_label');
                ?>
                 <hr style="height:1px" class"bg-dark w-100">
        </div>

        <!-- IMAGE -->
        <div class="col-xl-12 pt-4">
                <h3>Custom Field - type [image]</h3>
                <?php 
                   $image = get_field('image_label');
                   $size = 'medium'; // (thumbnail, medium, large, full or custom size)
                   if( $image ) {
                       echo wp_get_attachment_image( $image, $size );
                   }
                ?>
                 <hr style="height:1px" class"bg-dark w-100">
        </div>
                    
        <!-- FILE -->
        <div class="col-xl-12 pt-4">
                <h3>Custom Field - type [file]</h3>
                <?php 
                    $file = get_field('file_label');
                        if( $file ): ?>
                            <p>Download file:</p>
	                        <a href="<?php echo $file['url']; ?>"><?php echo $file['filename']; ?></a>
                            <?php endif; ?>
                 <hr style="height:1px" class"bg-dark w-100">
        </div>
        
        <!-- GALLERY -->
        <div class="col-xl-12 pt-4">
                <h3>Custom Field - type [gallery]</h3>
                <?php 
                    $images = get_field('gallery_label');
                    $size = 'medium'; // (thumbnail, medium, large, full or custom size)
                    
                    if( $images ): ?>
                        <ul class="d-flex list-unstyled pt-4">
                            <?php foreach( $images as $image ): ?>
                                <li class="px-2">
                                    <?php echo wp_get_attachment_image( $image['ID'], $size ); 
                                        echo $image['ID'];
                                    ?>
                                    
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>
                 <hr style="height:1px" class"bg-dark w-100">
        </div>

        <!-- SELECT -->
        <div class="col-xl-12 pt-4">
                <h3>Custom Field - type [select]</h3>
                <?php 
                    the_field('select_label');
                ?>
                 <hr style="height:1px" class"bg-dark w-100">
        </div>

        <!-- CHECKBOX -->
        <div class="col-xl-12 pt-4">
                <h3>Custom Field - type [checkbox]</h3>
                <?php 
                    the_field('checkbox_label');
                ?>
                 <hr style="height:1px" class"bg-dark w-100">
        </div>

        <!-- SELECT -->
        <div class="col-xl-12 pt-4">
                <h3>Custom Field - type [checkbox]</h3>
                <?php 
                    the_field('checkbox_label');
                ?>
                 <hr style="height:1px" class"bg-dark w-100">
        </div>

        
    </div>
</div>
        

<?php get_footer(); ?>


