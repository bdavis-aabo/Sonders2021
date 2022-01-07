<?php /* Template Name: Page - Gallery */ ?>

<?php get_header('blog'); ?>

  <section class="page-section community-section">
    <div class="section-content-container">
      <h3 class="page-title"><?php the_title(); ?></h3>
      <?php the_content(); ?>
    </div>
  </section>

  <section class="page-section gallery-section">
    <div class="gallery-container">
      <?php echo do_shortcode('[envira-gallery slug="sonders-photo-gallery"]'); ?>
    </div>
  </section>

<?php get_footer(); ?>
