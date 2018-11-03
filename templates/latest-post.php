<div class="row mb-5 mt-5">

              <div class="col-md-12">
                <h2 class="mb-4"><?php _e('More Blog Posts','balita'); ?></h2>
              </div>
        
              <div class="col-md-12">
              <?php
              $latest_post = new WP_Query(array(
                  'post_type' => 'post',
                  'posts_per_page' => 5,
                  'order' => 'ASC'
              ));
                while($latest_post->have_posts()) :
                    $latest_post->the_post();
              ?>
                <div class="post-entry-horzontal">
                  <a href="<?php the_permalink();?>">
                    <div class="image element-animate"  data-animate-effect="fadeIn" style="background-image: url(<?php echo get_the_post_thumbnail_url();?>);"></div>
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
                <?php endwhile; wp_reset_postdata(); ?>

              </div>
            </div>