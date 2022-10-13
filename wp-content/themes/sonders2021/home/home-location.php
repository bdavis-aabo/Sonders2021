<?php if(get_field('location_small_image') != ''): $_smImage = get_field('location_small_image'); endif; ?>

  <section class="homepage-section location-section">
    <div class="location-top">
    <?php if(get_field('location_gallery') != ''): $_gallery = get_field('location_gallery'); ?>
      <div class="location-gallery">
      <?php if(count($_gallery) > 1): ?>
        <div class="location-slider swiper">
          <div class="swiper-wrapper">
          <?php foreach($_gallery as $_image): ?>
            <div class="swiper-slide">
              <img src="<?php echo $_image['url'] ?>" alt="<?php echo $_image['alt'] ?>" class="img-fluid" />
            </div>
          <?php endforeach; ?>
          </div>
          <div class="slider-controls swiper-control-buttons">
            <button class="slide-prev">
              <?php echo file_get_contents(get_template_directory() . '/assets/images/icons/arrow.svg') ?>
            </button>
            <button class="slide-next">
              <?php echo file_get_contents(get_template_directory() . '/assets/images/icons/arrow.svg') ?>
            </button>
          </div>
        </div>
      <?php else: ?>
        <?php foreach($_gallery as $_image): ?>
        <figure class="location-lgImage">
          <img src="<?php echo $_image['url'] ?>" alt="<?php echo $_image['alt'] ?>" class="img-fluid" />
        </figure>
        <?php endforeach; ?>
      <?php endif; ?>
      </div>
    <?php endif; ?>
    </div>

    <div class="location-bottom offwhite-bg">
      <figure class="location-bottom-img">
        <img src="<?php echo $_smImage['url'] ?>" alt="<?php echo $_smImage['alt'] ?>" class="img-fluid" />
      </figure>
    </div>

    <div class="location-content-container">
      <div class="location-contents">
        <?php echo get_field('homepage_location_content') ?>
        <a href="/location" title="<?php bloginfo('name'); ?> - Location" class="link link--arrowed">
          View Location <?php echo file_get_contents(get_template_directory() . '/assets/images/icons/arrow-icon.svg') ?>
        </a>
      </div>
    </div>
  </section>
