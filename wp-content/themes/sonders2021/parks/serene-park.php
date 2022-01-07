<section class="page-section park-section offwhite-bg serene-section">
  <div class="park-container">
    <?php while(have_rows('serene_park')): the_row(); $_largeImage = get_sub_field('serene_large_image'); $_smImage = get_sub_field('serene_small_image'); ?>
    <div class="top-image">
      <figure class="large_image">
        <img src="<?php echo $_largeImage['url'] ?>" alt="<?php echo $_largeImage['alt'] ?>" class="img-fluid" />
      </figure>
    </div>
    <div class="park-contents white-bg">
      <img src="<?php bloginfo('template_directory') ?>/assets/images/icons/serene-icon.svg" class="park-icon" alt="serene park at sonders" />
      <?php echo get_sub_field('serene_content'); ?>
    </div>
    <div class="park-secondary-image">
	    <img src="<?php echo $_smImage['url'] ?>" alt="<?php echo $_smImage['alt'] ?>" class="img-fluid" />
    </div>
    <?php endwhile; ?>
  </div>
</section>
