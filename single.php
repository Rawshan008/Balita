<?php get_header(); the_post(); ?>

    <section class="site-section py-lg">
      <div class="container">
        
        <div class="row blog-entries">
          <div class="col-md-12 col-lg-8 main-content">
            <h1 class="mb-4"><?php the_title(); ?></h1>
            <div class="post-meta">
                <span class="category">
                  <?php 
                    $catagories = get_the_category();
                    foreach($catagories as $catagory){
                      echo $catagory->cat_name." ";
                    }
                  ?>
                </span>
                <span class="mr-2"><?php echo get_the_date(); ?></span> &bullet;
                <span class="ml-2"><span class="fa fa-comments"></span> <?php echo get_comments_number(); ?></span>
              </div>
              <img src="<?php echo get_the_post_thumbnail_url();?>" alt="" class="img-responsive">
            <div class="post-content-body">
              
              <?php the_content(); ?>
            </div>

            
            <div class="pt-5">
              <p><?php _e('Categories:','balita'); ?>  <?php the_category(' '); ?>  <?php _e('Tags:','balita') ?> <?php the_tags(' ');?></p>
            </div>


            <?php 
              if ( comments_open() || get_comments_number() ){
                  comments_template();
              }
            ?>

          </div>

          <!-- END main-content -->

          <?php get_sidebar(); ?>
          <!-- END sidebar -->

        </div>
      </div>
    </section>

    <section class="py-5">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h2 class="mb-3 "><?php _e('Related Post','balita');?></h2>
          </div>
        </div>
        <div class="row">
        <?php 
            global $post;
            $catagories = get_the_category();
            $catlist = '';
            foreach($catagories as $catagory){
              $catlist .= $catagory->cat_ID." ";
            }

            $related_post = new WP_Query(array(
              'post_type' => 'post',
              'posts_per_page' => 3,
              'post__not_in' => array($post->ID),
              'orderby' => 'rand',
              'cat' => $catlist,
            ));

            while($related_post->have_posts()) :
              $related_post->the_post();
        ?>
          <div class="col-md-6 col-lg-4">
            <a href="<?php the_permalink();?>" class="a-block d-flex align-items-center height-md" style="background-image: url(<?php echo get_the_post_thumbnail_url();?>); ">
              <div class="text">
                <div class="post-meta">
                  <span class="category"><?echo $catagory->cat_name;?></span>
                  <span class="mr-2"><?php echo get_the_date();?> </span> &bullet;
                  <span class="ml-2"><span class="fa fa-comments"></span> <?php echo get_comments_number();?></span>
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
<?php get_footer(); ?>