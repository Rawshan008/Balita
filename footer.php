<footer class="site-footer">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md-4">
            <?php 
              if(is_active_sidebar('footer-top-left')){
                dynamic_sidebar('footer-top-left');
              }
            ?>
          </div>
          <div class="col-md-6 ml-auto">
            <div class="row">
              <div class="col-md-7">
                <?php 
                    if(is_active_sidebar('footer-top-middle')){
                      dynamic_sidebar('footer-top-middle');
                    }
                ?>
              </div>
              <div class="col-md-1"></div>
              
              <div class="col-md-4">

                <div class="mb-5">
                  <?php 
                    if(is_active_sidebar('footer-top-right')){
                      dynamic_sidebar('footer-top-right');
                    }
                  ?>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                <?php 
                  if(is_active_sidebar('footer')){
                    dynamic_sidebar('footer');
                  }
                ?>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
          </div>
        </div>
      </div>
    </footer>
    <!-- END footer -->
    
    <!-- loader -->
    <div id="loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#f4b214"/></svg></div>

    <?php wp_footer() ?>
  </body>
</html>