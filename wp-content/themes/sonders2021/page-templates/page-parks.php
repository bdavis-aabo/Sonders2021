<?php /* Template Name: Page - Parks */ ?>

<?php get_header(); ?>

  <?php if(have_posts()): while(have_posts()): the_post(); ?>
  <section class="page-section page-heroimage">
  <?php while(have_rows('page_heroimage')): the_row(); $_lgImage = get_sub_field('large_image'); $_mobImage = get_sub_field('mobile_image'); ?>
    <picture>
      <source media="(max-width: 520px)" srcset="<?php echo $_mobImage['url'] ?>">
      <img src="<?php echo $_lgImage['url'] ?>" alt="<?php echo $_lgImage['alt'] ?>" class="heroimage-img img-fluid" />
    </picture>
  <?php endwhile; ?>
  </section>

  <section class="page-section community-breadcrumb">
    <a href="/community/" title="<?php the_title() ?>" class="link link--arrowed flip--arrowed">
      <?php echo file_get_contents_curl(get_template_directory_uri() . '/assets/images/icons/arrow-icon.svg') ?> Back to Community Page
    </a>
  </section>

  <section class="page-section community-section">
    <div class="section-content-container">
      <h3 class="page-title"><?php the_title(); ?></h3>
      <?php the_content(); ?>
    </div>
  </section>

  <?php echo get_template_part('parks/evernew-park') ?>
  <?php if(have_rows('flourish_park')): get_template_part('parks/flourish-park'); endif; ?>
  <?php if(have_rows('serene_park')): get_template_part('parks/serene-park'); endif; ?>
  <?php if(have_rows('trails')): get_template_part('parks/trails'); endif; ?>

  <?php endwhile; endif; ?>

<?php get_footer(); ?>
