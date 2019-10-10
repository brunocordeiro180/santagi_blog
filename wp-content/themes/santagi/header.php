<!doctype html>
<html>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link href="https://fonts.googleapis.com/css?family=Josefin+Sans:300, 400,700|Inconsolata:400,700" rel="stylesheet">
	<?php wp_head(); ?>
</head>
<body>
<div class="wrap">
      <header role="banner">
        <div class="top-bar">
          <div class="container">
            <div class="row">
              <div class="col-9 social">
                <a href="#"><span class="fa fa-twitter"></span></a>
                <a href="#"><span class="fa fa-facebook"></span></a>
                <a href="#"><span class="fa fa-instagram"></span></a>
                <a href="#"><span class="fa fa-youtube-play"></span></a>
              </div>
            
            </div>
          </div>
        </div>

        <div class="container logo-wrap">
          <div class="row pt-5">
            <div class="col-12 text-center">
              <a class="absolute-toggle d-block d-md-none" data-toggle="collapse" href="#navbarMenu" role="button" aria-expanded="false" aria-controls="navbarMenu"><span class="burger-lines"></span></a>
              <h1 class="site-logo"><a href="<?php echo home_url(); ?>"><img width="50%;" src="<?php bloginfo('template_url'); ?>/images/sg-logo-main-black.jpg" alt=""></a></h1>
            </div>
          </div>
        </div>
        
        <nav class="navbar navbar-expand-md  navbar-light bg-light">
          <div class="container">
            
           
            <div class="collapse navbar-collapse" id="navbarMenu">
              <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                  <a class="nav-link active" href="index.html">Home</a>
                </li>
				
				<?php 
					$categories = get_categories( array(
                      'orderby' => 'name',
                      'order'   => 'ASC'
				  	));  
				?>

                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="category.html" id="dropdown05" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Categorias</a>
                  <div class="dropdown-menu" aria-labelledby="dropdown05">
					<?php foreach ($categories as $category) { ?>
						<a class="dropdown-item" href="<?php echo get_category_link( $category ); ?>"><?php echo $category->name; ?></a>
					<?php } ?>
           
                  </div>

                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#footer-sobre-loja">Sobre a loja</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="<?php get_permalink( get_page_by_path( 'contato' ) ); ?>">Contato</a>
                </li>
              </ul>
              
            </div>
          </div>
        </nav>
      </header>
      <!-- END header -->

      


