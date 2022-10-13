<?php
  $_builders = new WP_Query();
  $_args = array(
    'post_type'       => 'home-builders',
    'post_status'     => 'publish',
    'posts_per_page'  => -1,
    'order'           => 'ASC',
    'orderby'         => 'menu_order'
  );
  $_builders->query($_args);

  $_postCount = $_builders->found_posts;
?>


  <?php if($_builders->have_posts()): ?>
  <section class="homepage-section builder-section offwhite-bg">
    <div class="builder-container">
      <div class="builder-title-container">
        <h2 class="aqua-txt">Homes</h2>
        <h1>Main floor living single-family homes and townhomes</h1>
      </div>
      <div class="builder-slide-container swiper slider--visible">
        <ul class="swiper-wrapper">
          <?php while($_builders->have_posts()): $_builders->the_post(); $_builderImage = get_field('homebuilder_image'); ?>
          <li class="swiper-slide">

              <div class="card-img">
                <img src="<?php echo $_builderImage[0]['url'] ?>" alt="<?php the_title() ?>" class="swiper-lazy swiper-lazy-loaded img-fluid" />
              </div>
              <div class="card-content">
                <div class="card-title"><h3><?php the_title() ?></h3></div>
              </div>

          </li>
          <?php endwhile; ?>
        </ul>


        <div class="slider-controls swiper-control-buttons <?php if($_postCount <= 2): ?>noshow<?php endif; ?>">
          <button class="slide-prev">
            <?php echo file_get_contents_curl(get_template_directory_uri() . '/assets/images/icons/arrow.svg') ?>
          </button>
          <button class="slide-next">
            <?php echo file_get_contents_curl(get_template_directory_uri() . '/assets/images/icons/arrow.svg') ?>
          </button>
        </div>
      </div>
    </div>
    <div class="builder-right">
      <a href="/homes" title="<?php bloginfo('name'); ?> - Homes" class="link link--arrowed">
        View the Homes
        <?php echo file_get_contents_curl(get_template_directory_uri() . '/assets/images/icons/arrow-icon.svg') ?>
      </a>
    </div>
  </section>
<?php endif; wp_reset_query(); ?>
