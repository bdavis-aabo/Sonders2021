<?php get_header(); ?>

  <?php if(have_posts()): while(have_posts()): the_post();
    $_galleryImages = get_field('homebuilder_gallery');

  ?>
    <section class="single-builder-section page-heroimage">
      <picture>
        <source media="(max-width: 520px)" srcset="<?php bloginfo('template_directory') ?>/assets/images/builder-mobile.jpg">
        <img src="<?php bloginfo('template_directory') ?>/assets/images/builder-hero.jpg" alt="<?php echo $_lgImage['alt'] ?>" class="heroimage-img img-fluid" />
      </picture>
      <div class="page-hero-caption">
        <h3 class="white-txt">Homes</h3>
        <h2 class="builder-name"><?php the_title() ?></h2>
        <?php the_content(); ?>
      </div>
    </section>

    <section class="single-builder-section detail-section">
      <div class="detail-container">
        <ul class="detail-list">
          <li class="home-type"><?php echo get_field('homebuilder_type') ?></li>
          <?php if(have_rows('homebuilder_model_details')): while(have_rows('homebuilder_model_details')): the_row(); ?>
            <?php if(get_sub_field('square_footage') != ''): ?>
            <li><?php echo get_sub_field('square_footage') . ' sq ft' ?></li>
            <li class="home-bed"><?php echo get_sub_field('beds') . ' bedrooms' ?></li>
            <li class="home-bath"><?php echo get_sub_field('baths') . ' bathrooms' ?></li>
            <li><?php echo get_sub_field('garage') . ' car garage' ?></li>
            <?php endif; ?>
          <?php endwhile; endif; ?>
        </ul>
      </div>
    </section>

    <?php if($_galleryImages): get_template_part('homes/single-gallery'); endif; ?>

    <?php if(have_rows('homebuilder_collection')): ?>
    <section class="single-builder-section builder-collection">
      <?php while(have_rows('homebuilder_collection')): the_row(); ?>
      <div class="collection-container">
        <div class="collection-left">
          <h2><?php echo get_sub_field('collection_name') ?></h2>
        </div>
        <div class="collection-right">
          <?php echo get_sub_field('collection_description') ?>
        </div>
      </div>
      <?php endwhile; ?>
    </section>
    <?php endif; ?>

    <?php if(have_rows('homebuilder_floorplans')): ?>
    <section class="single-builder-section builder-floorplans">
      <div class="floorplan-container">
        <div class="floorplan-slide-container swiper slider--visible">
          <ul class="swiper-wrapper">
            <?php $_i = 1; while(have_rows('homebuilder_floorplans')): the_row(); $_floorplanImage = get_sub_field('floorplan_image'); ?>
            <li class="swiper-slide" id="<?php echo strtolower(get_sub_field('floorplan_name')) . '-slide' ?>">
              <figure class="floorplan-image">
                <img src="<?php echo $_floorplanImage['url'] ?>" alt="<?php echo get_sub_field('floorplan_name') ?>" class="img-fluid" />
              </figure>
              <div class="floorplan-details">
                <h4 class="floorplan-name"><?php echo '0' . $_i . '. ' . get_sub_field('floorplan_name') ?></h4>
                <p class="floorplan-info">
                  <?php echo get_sub_field('floorplan_details')  ?>
                </p>
              </div>
            </li>
            <?php $_i++; endwhile; ?>
          </ul>
          <div class="slider-controls swiper-control-buttons">
            <button class="slide-prev">
              <?php echo file_get_contents(get_template_directory_uri() . '/assets/images/icons/arrow.svg') ?>
            </button>
            <button class="slide-next">
              <?php echo file_get_contents(get_template_directory_uri() . '/assets/images/icons/arrow.svg') ?>
            </button>
          </div>
        </div>
      </div>
    </section>
    <?php endif; ?>

    <?php //space for video for builder - not available yet  ?>

    <section class="single-builder-section builder-office-section">
      <div class="builder-office-container">
        <h2 class="builder-name"><?php the_title() ?></h2>
        <div class="office-left">
          <span class="caps">Model home and sales office</span>
          <p><?php echo get_field('homebuilder_address') . '<br />' . get_field('homebuilder_phone')?></p>
        </div>
        <div class="office-right">
          <span class="caps">sales office is open daily</span>
          <p><?php echo get_field('homebuilder_hours') ?></p>
        </div>
        <div class="office-bottom">
          <a title="<?php bloginfo('name'); ?> - Homes" class="link link--arrowed builderContact-btn" data-builder="<?php the_title() ?>">
            Request Information
            <?php echo file_get_contents(get_template_directory_uri() . '/assets/images/icons/arrow-icon.svg') ?>
          </a>
        </div>
      </div>
    </section>

  <?php endwhile; endif; ?>



<?php get_footer(); ?>
