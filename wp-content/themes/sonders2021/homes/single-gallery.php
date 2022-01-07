<?php
  $_galleryImages = get_field('homebuilder_gallery');
  $_i = 0;
?>

<section class="single-builder-section builder-gallery-section">
  <div class="builder-gallery">
    <?php foreach($_galleryImages as $_image): ?>
      <?php if(++$_i == 1): ?>
        <div class="container-left">
          <figure class="gallery-image">
            <img src="<?php echo $_image['url'] ?>" alt="<?php echo $_image['alt'] ?>" class="img-fluid" />
          </figure>
        </div>
      <?php endif; ?>
    <?php endforeach; ?>
      <div class="container-right">
    <?php foreach(array_slice($_galleryImages, 1) as $_image): ?>
      <figure class="gallery-image">
        <img src="<?php echo $_image['url'] ?>" alt="<?php echo $_image['alt'] ?>" class="img-fluid" />
      </figure>
    <?php endforeach; ?>
    </div>
  </div>
</section>
