<section class="page-section parks-section">
  <div class="parks-container">
    <?php while(have_rows('parks_and_trails')): the_row(); $_parksImage = get_sub_field('parks_image'); ?>
    <figure class="parks-image">
      <img src="<?php echo $_parksImage['url'] ?>" alt="<?php echo $_parksImage['alt'] ?>" class="img-fluid" />
    </figure>

    <div class="parks-right">
      <?php echo get_sub_field('parks_content') ?>

      <a href="/community/parks-and-trails" class="link link--arrowed" title="Sonders Parks and Trails">
        Explore all Parks and Trails  <?php echo file_get_contents(get_template_directory_uri() . '/assets/images/icons/arrow-icon.svg') ?>
      </a>
    </div>
    <?php endwhile; ?>
  </div>
</section>
