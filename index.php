<?php get_header(); ?>

    <section class="site-section pt-5">
      <div class="container">
        <div class="row">
          <div class="col-md-12">

            <div class="owl-carousel owl-theme home-slider">
          <?php 


            $args = array(
              'post_type' => 'post',
              'posts_per_page' => 3,
              'meta_key' => 'featured_slider',
              'meta_value' => 1,
            );
            $_q = new WP_Query($args);

           

            while($_q->have_posts()) :
              $_q->the_post();
              
          ?>
              <div>
                <a href="<?php the_permalink();?>" class="a-block d-flex align-items-center height-lg" style="background-image: url(<?php echo get_the_post_thumbnail_url(get_the_ID(),'laege')?>); ">
                  <div class="text half-to-full">
                    <div class="post-meta">
                    <?php foreach((get_the_category()) as $category) : ?>
                      <span class="category">
                        <?php 
                         echo $category->cat_name; 
                        ?>
                       </span>
                  <?php  endforeach; ?>
                      <span class="mr-2"><?php echo get_the_date(); ?></span> &bullet;
                      <span class="ml-2"><span class="fa fa-comments"></span> <?php echo get_comments_number(get_the_ID()) ?></span>
                    </div>
                    <h3><?php the_title(); ?></h3>
                    <p><?php the_excerpt(); ?></p>
                  </div>
                </a>
              </div>
            <?php 
            
              endwhile;
              wp_reset_postdata();
            
            ?>
            </div>
            
          </div>
        </div>
        <div class="row">
        <?php 
          $args = array(
            'post_type' => 'post',
            'posts_per_page' => 3,
            'meta_key' => 'bellow_slider',
            'meta_value' => 1,
          );
          $_q = new WP_Query($args);

          while($_q->have_posts()) :
            $_q->the_post();
        ?>
          <div class="col-md-6 col-lg-4">
            <a href="<?php the_permalink();?>" class="a-block d-flex align-items-center height-md" style="background-image: url(<?php echo get_the_post_thumbnail_url();?>); ">
              <div class="text">
                <div class="post-meta">
                <?php foreach((get_the_category()) as $catagory) : ?>
                  <span class="category"><?php echo $catagory->cat_name;?></span>
                <?php endforeach; ?>
                  <span class="mr-2"><?php echo get_the_date();?> </span> &bullet;
                  <span class="ml-2"><span class="fa fa-comments"></span> <?php echo get_comments_number(); ?></span>
                </div>
                <h3><?php the_title();?></h3>
              </div>
            </a>
          </div>
          <?php 
            endwhile;
            wp_reset_postdata();
          ?>
        </div>
      </div>


    </section>
    <!-- END section -->

    <section class="site-section py-sm">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <h2 class="mb-4"><?php _e('Lifestyle Category','balita'); ?></h2>
          </div>
        </div>
        <div class="row blog-entries">
          <div class="col-md-12 col-lg-8 main-content">
            <div class="row">
            <?php 
            $paged = get_query_var( 'paged' )?get_query_var( 'paged' ):1;
            $posts_per_page = 4;
              $args = array(
                'post_type' => 'post',
                'posts_per_page' => $posts_per_page,
                'cat' => '42',
                'paged' => $paged,
              );
              $_qq = new WP_Query($args);
              while($_qq->have_posts()) :
                $_qq->the_post();
            ?>
              <div class="col-md-6">
                <a href="<?php the_permalink();?>" class="blog-entry element-animate" data-animate-effect="fadeIn">
                  <?php the_post_thumbnail('catagory-image'); ?>
                  <div class="blog-content-body">
                    <div class="post-meta">
                      <span class="category">
                        <?php 
                          $tags = get_the_tags();
                          foreach($tags as $tag){
                            echo $tag->name;
                          }
                        ?>
                      </span>
                      <span class="mr-2"><?php echo get_the_date(); ?> </span> &bullet;
                      <span class="ml-2"><span class="fa fa-comments"></span> <?php echo get_comments_number();?></span>
                    </div>
                    <h2><?php the_title();?></h2>
                  </div>
                </a>
              </div>
              <?php 
                endwhile;
                wp_reset_postdata();
              ?>
            </div>

            <div class="row">
              <div class="col-md-12 text-center">
                <nav aria-label="Page navigation" class="text-center">
                <?php 
                    $paginatin = paginate_links(array(
                      'type' => 'list',
                      'total'=> $_qq->max_num_pages,
                      'current' => $paged,
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


            <?php 
              get_template_part("templates/latest-post");
            ?>

            

          </div>

          <!-- END main-content -->

          <?php get_sidebar(); ?>
          <!-- END sidebar -->

        </div>
      </div>
    </section>
  
    <?php get_footer(); ?>