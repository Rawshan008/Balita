<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <?php wp_head(); ?>
  </head>
  <body>
    


    <header role="banner">
      <div class="top-bar">
        <div class="container">
          <div class="row">
            <div class="col-9 social">
              <?php 
                if(is_active_sidebar('header-left')){
                  dynamic_sidebar('header-left');
                }
              ?>
            </div>
            <div class="col-3 search-top">
              <!-- <a href="#"><span class="fa fa-search"></span></a> -->
              <?php 
                if(is_active_sidebar('header-right')){
                  dynamic_sidebar('header-right');
                }
              ?>
            </div>
          </div>
        </div>
      </div>

      <div class="container logo-wrap">
        <div class="row pt-5">
          <div class="col-12 text-center">
            <a class="absolute-toggle d-block d-md-none" data-toggle="collapse" href="#navbarMenu" role="button" aria-expanded="false" aria-controls="navbarMenu"><span class="burger-lines"></span></a>
            <h1 class="site-logo"><a href="<?php echo site_url('/')?>"><?php bloginfo('name'); ?></a></h1>
          </div>
        </div>
      </div>
      
      <nav class="navbar navbar-expand-md  navbar-light bg-light">
        <div class="container">
          
          <?php 
            wp_nav_menu(array(
              'theme_location' => 'top-menu',
              'menu_class' => 'navbar-nav mx-auto',
              'container_class' => 'collapse navbar-collapse',
              'container_id' => 'navbarMenu',
              'link_class' => 'nav-link',
              'depth' =>2,
              'fallback_cb' => 'WP_Bootstrap_Navwalker::fallback',
              'walker' => new WP_Bootstrap_Navwalker(),
            ));
          ?>
        </div
        
      </nav>
    </header>
    <!-- END header -->