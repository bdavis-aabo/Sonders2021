<section class="page-section park-section offwhite-bg flourish-section">
  <div class="park-container">
    <?php while(have_rows('flourish_park')): the_row(); $_largeImage = get_sub_field('flourish_large_image'); $_smImage = get_sub_field('flourish_small_image'); ?>
    <div class="top-image">
      <figure class="large_image">
        <img src="<?php echo $_largeImage['url'] ?>" alt="<?php echo $_largeImage['alt'] ?>" class="img-fluid" />
      </figure>
    </div>
    <div class="park-contents">
      <img src="<?php bloginfo('template_directory') ?>/assets/images/icons/flourish-icon.svg" class="park-icon" alt="flourish park at sonders" />
      <?php echo get_sub_field('flourish_content'); ?>
    </div>
    <div class="park-secondary-image">
	    <img src="<?php echo $_smImage['url'] ?>" alt="<?php echo $_smImage['alt'] ?>" class="img-fluid" />
    </div>
    <?php endwhile; ?>
  </div>
</section>
