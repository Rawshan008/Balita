<div class="pt-5">
  <h3 class="mb-5">
    <?php 
      if(get_comments_number() >1){
         echo get_comments_number().__(' Comments','balita');
      }else{
        echo get_comments_number().__(' Comment','balita');
      }
    ?>
  </h3>
  <ul class="comment-list">
    <?php 
      wp_list_comments();
    ?>
  </ul>
  <!-- END comment-list -->
  
  <div class="comment-form-wrap pt-5">
    <?php 
      comment_form();
    ?>
  </div>
</div>