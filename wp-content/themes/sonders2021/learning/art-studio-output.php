<section class="page-section learning-section center-section">
  <div class="learning-center-container">
  <?php while(have_rows('art_studio')): the_row(); $_galleryImages = get_sub_field('gallery_images'); $_smallImage = get_sub_field('small_image'); ?>
    <div class="gallery-container">
      <?php foreach($_galleryImages as $_image): ?>
      <figure class="large-image">
        <img src="<?php echo $_image['url'] ?>" alt="<?php echo $_image['alt'] ?>" class="img-fluid" />
      </figure>
      <?php endforeach; ?>
    </div>
    <div class="learning-contents">

      <div class="learning-left">
        <img src="<?php echo $_smallImage['url'] ?>" alt="<?php echo $_smallImage['alt'] ?>" class="img-fluid nomobile" />
      </div>
      <div class="learning-right">
        <div class="learning-right-contents"><?php echo get_sub_field('art_studio_content') ?></div>
      </div>
    </div>
  <?php endwhile; ?>
  </div>
</section>
