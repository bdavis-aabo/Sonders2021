<section class="page-section interactive_map-section">
  <?php while(have_rows('interactive_map')): the_row(); $_mapImage = get_sub_field('map_image'); ?>
  <div class="map-section-container">
    <figure class="map-image">
      <img src="<?php echo $_mapImage['url'] ?>" alt="<?php echo $_mapImage['alt'] ?>" class="img-fluid" />
    </figure>
    <aside class="map-contents">
      <?php echo get_sub_field('map_content') ?>

      <a href="/community/interactive-map" class="link link--arrowed" title="Interactive Map">
        Interactive Map  <?php echo file_get_contents_curl(get_template_directory_uri() . '/assets/images/icons/arrow-icon.svg') ?>
      </a>
    </aside>
  </div>
  <?php endwhile; ?>
</section>
