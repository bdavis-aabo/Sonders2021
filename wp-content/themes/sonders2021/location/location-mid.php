<section class="page-section location-middle-section">
  <div class="location-section-contents">
  <?php while(have_rows('location_mid_section')): the_row(); $_midImage = get_sub_field('mid_section_image'); ?>
    <div class="location-left">
      <?php echo get_sub_field('mid_section_content') ?>
    </div>
    <div class="location-right">
      <figure class="location-image">
        <img src="<?php echo $_midImage['url'] ?>" alt="<?php echo $_midImage['alt'] ?>" class="img-fluid" />
      </figure>
    </div>
  <?php endwhile; ?>
  </div>
</section>
