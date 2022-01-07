<?php /* Template Name: Page - Homepage */ ?>

<?php get_header(); ?>


<?php if(have_posts()): while(have_posts()): the_post(); ?>
<section class="homepage-section homepage-heroimage">
  <div class="video-container">
    <div class="video-hero-wrapper">
      <div class="video-wrapper">
        <video playsinline muted loop autoplay src="<?php bloginfo('template_directory') ?>/assets/video/Web_Intro_v3.mp4" data-object-fit="cover" data-object-position="center" preload="auto" autoplay="true"></video>
      </div>
    </div>
  </div>

  <div class="heroimage-caption-container">
    <div class="heroimage-caption">
      <h2 class="message message-one">Live as good as healthy feels.</h2>
      <h2 class="message message-two">Be better tomorrow than today.</h2>
      <h2 class="message message-three">You, hands down, belong here.</h2>

      <a href="/community/interactive-map" class="btn outline-btn link--arrowed message-btn" title="Interactive Map">
        Take a Tour
        <svg class="arrow-icon" width="23px" height="14px" viewBox="0 0 23 14" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
          <g id="arrow" transform="translate(0.000000, 0.930000)" stroke="#FFFFFF" fill="none" stroke-width="1.5">
            <path d="M16.14,0 L22.21,6.07 L16.14,12.14 M0,6.07 L22.21,6.07" id="Shape"></path>
          </g>
        </svg>
      </a>
    </div>
  </div>
</section>

<?php if(get_field('homepage_community_content') != ''): ?>
<section class="homepage-section community-section">
  <div class="community-section-container">
    <?php echo get_field('homepage_community_content') ?>
    <a href="/community" title="<?php bloginfo('name'); ?> - Community" class="link link--arrowed">
      Explore the Community <?php echo file_get_contents(get_template_directory_uri() . '/assets/images/icons/arrow-icon.svg') ?>
    </a>
  </div>
</section>
<?php endif; ?>

<?php get_template_part('home/home-homes'); ?>

<?php if(get_field('homepage_location_content') != ''): get_template_part('home/home-location'); endif; ?>

<?php endwhile; endif; //end page loop ?>

<?php get_template_part('home/home-blog'); ?>


<?php get_footer(); ?>
