
<?php get_header(); ?>

    <section class="site-section">
      <div class="container">
        <div class="row mb-4">
          <div class="col-md-6">
            <h2 class="mb-4"><?php _e('Category:','balita'); ?> <?php single_cat_title(); ?></h2>
          </div>
        </div>
        <div class="row blog-entries">
          <div class="col-md-12 col-lg-8 main-content">
            <div class="row mb-5 mt-5">

              <div class="col-md-12">

              <?php
                while(have_posts()):
                  the_post();
              
              ?>
                <div class="post-entry-horzontal">
                  <a href="<?php the_permalink();?>">
                    <div class="image element-animate" data-animate-effect="fadeIn" style="background-image: url(<?php echo get_the_post_thumbnail_url();?>);"></div>
                    <span class="text">
                      <div class="post-meta">
                        <span class="category">
                          <?php 
                            $catagories = get_the_category();
                            foreach($catagories as $catagory){
                              echo $catagory->cat_name." ";
                            }
                          ?>
                        </span>
                        <span class="mr-2"><?php echo get_the_date(); ?> </span> &bullet;
                        <span class="ml-2"><span class="fa fa-comments"></span> <?php echo get_comments_number(); ?></span>
                      </div>
                      <h2><?php the_title(); ?></h2>
                    </span>
                  </a>
                </div>
                <!-- END post -->
                <?php 
                  endwhile;
                 ?>





              </div>
            </div>

            <div class="row">
              <div class="col-md-12 text-center">
                <nav aria-label="Page navigation" class="text-center">
                  <?php 
                        $paginatin = paginate_links(array(
                          'type' => 'list',
                          'prev_text' => __('Prev','balita'),
                          'next_text' => __('Next','balita'),
                      ));
                      $paginatin = str_replace("<ul class='page-numbers'>","<ul class='pagination'>", $paginatin);
                      $paginatin = str_replace("<li>","<li class='page-item'>", $paginatin);
                      $paginatin = str_replace("page-numbers","page-link", $paginatin);
                      echo $paginatin;
                  ?>
                </nav>
              </div>
            </div>

            

          </div>

          <!-- END main-content -->

          <?php get_sidebar(); ?>
          <!-- END sidebar -->

        </div>
      </div>
    </section>
 <?php get_footer(); ?>