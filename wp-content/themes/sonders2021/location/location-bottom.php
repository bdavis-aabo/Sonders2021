<section class="page-section location-top-section">
  <div class="location-section-contents">
  <?php while(have_rows('location_bottom_section')): the_row(); $_bottomImage = get_sub_field('bottom_section_image'); ?>
    <div class="location-left">
      <?php echo get_sub_field('bottom_section_content') ?>
    </div>
    <div class="location-right">
      <figure class="location-image">
        <img src="<?php echo $_bottomImage['url'] ?>" alt="<?php echo $_bottomImage['alt'] ?>" class="img-fluid" />
      </figure>
    </div>
  <?php endwhile; ?>
  </div>
</section>
