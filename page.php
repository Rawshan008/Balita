<?php get_header(); the_post(); ?>

    
    <!-- END section -->

    <section class="site-section py-sm">
      <div class="container">
        <div class="row blog-entries">
          <div class="col-md-12 col-lg-8 main-content">
          <div class="row">
              <div class="col-md-12">
                <div style="height:50px;"></span></div>
                <h2 class="mb-4"><?php the_title(); ?></h2>
                <?php if(has_post_thumbnail()) : ?>
                  <p class="mb-5"><img src="<?php echo get_the_post_thumbnail_url();?>" alt="Image placeholder" class="img-fluid"></p>
                <?php endif; ?>
                <?php the_content(); ?>
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