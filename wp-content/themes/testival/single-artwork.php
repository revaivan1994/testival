<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
  <div class="tabcontent" id="tab-<?php the_ID(); ?>">
    <?php the_content(); ?>
  </div>
<?php endwhile; endif; ?>