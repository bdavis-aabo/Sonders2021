<section class="page-section land-section">
  <div class="land-container">
    <?php while(have_rows('the_land')): the_row(); $_landImage = get_sub_field('land_image'); ?>
    <figure class="parks-image">
      <img src="<?php echo $_landImage['url'] ?>" alt="<?php echo $_landImage['alt'] ?>" class="img-fluid" />
    </figure>

    <div class="parks-right">
      <?php echo get_sub_field('land_content') ?>
      <a href="/advisors" class="link link--arrowed" title="Sonders Advisors & Partnerships">
        View Advisors <?php echo file_get_contents(get_template_directory() . '/assets/images/icons/arrow-icon.svg') ?>
      </a>
			<?php echo get_field('vision_secondary') ?>
    </div>
    <?php endwhile; ?>
  </div>
</section>
