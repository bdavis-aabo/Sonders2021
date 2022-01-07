<section class="page-section park-section trails-section offwhite-bg">
  <div class="park-container">
    <?php while(have_rows('trails')): the_row(); $_largeImage = get_sub_field('trails_large_image'); $_smImage = get_sub_field('trails_small_image'); ?>
    <div class="top-image">
      <figure class="large_image">
        <img src="<?php echo $_largeImage['url'] ?>" alt="<?php echo $_largeImage['alt'] ?>" class="img-fluid" />
      </figure>
    </div>
    <div class="park-contents">
      <img src="<?php bloginfo('template_directory') ?>/assets/images/icons/trails-icon.svg" class="park-icon" alt="trails at sonders" />
      <?php echo get_sub_field('trails_content'); ?>
    </div>

    <div class="park-secondary-image">
	    <img src="<?php echo $_smImage['url'] ?>" alt="<?php echo $_smImage['alt'] ?>" class="img-fluid" />
    </div>
    <?php endwhile; ?>
  </div>
</section>
