  <section class="page-section location-top-section">
    <div class="location-section-contents">
    <?php while(have_rows('location_top_section')): the_row(); $_topImage = get_sub_field('top_section_image'); ?>
      <div class="location-left">
        <?php echo get_sub_field('top_section_content') ?>
      </div>
      <div class="location-right">
        <figure class="location-image">
          <img src="<?php echo $_topImage['url'] ?>" alt="<?php echo $_topImage['alt'] ?>" class="img-fluid" />
        </figure>
      </div>
    <?php endwhile; ?>
    </div>
  </section>
