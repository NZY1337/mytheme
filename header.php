<html>
<head>
<title>Tutorial theme</title>

<link rel="stylesheet" href="<?php echo get_template_directory_uri().'/css/bootstrap.css'; ?>">
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">
<link rel="stylesheet" href="<?php echo get_template_directory_uri()?>/css/mytheme.css" type="text/css">

</head>
<body>

<?php wp_head(); ?>
<nav class="navbar navbar-expand-lg navbar-light bg-secondary w-100 position-fixed">
  
  <a class="navbar-brand" href="<?php  echo site_url(); ?>"><?php bloginfo( 'show' )?></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  
  
  <?php 
    wp_nav_menu(
        array(
            'theme_location'    => '',
            'container_class'   => 'collapse navbar-collapse',
            'container_id'      => 'navbarSupportedContent',
            'menu_class'        => 'navbar-nav ml-auto',
        )
    )
  ?> 
 
            
 <!-- <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Packages</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Contact</a>
        </li>
    </ul>
</div>    -->

</nav>



