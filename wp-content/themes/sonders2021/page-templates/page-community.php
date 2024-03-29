<?php /* Template Name: Page - Community */ ?>

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

  <section class="page-section community-section">
    <div class="section-content-container">
      <h3 class="page-title"><?php the_title(); ?></h3>
      <?php the_content(); ?>

			<a href="/wp-content/uploads/2022/08/Sonders-FAQ-Handout-v2.pdf" class="link link--arrowed" title="Sonders FAQ" target="_blank">
        Download Sonders FAQ  <?php echo file_get_contents(get_template_directory() . '/assets/images/icons/arrow-icon.svg') ?>
      </a>
			&nbsp;&nbsp;|&nbsp;&nbsp;
			<a href="/wp-content/uploads/2022/02/Sonders-Brochure-2.0.pdf" class="link link--arrowed" title="Sonders Brochure" target="_blank">
        Download Sonders Brochure  <?php echo file_get_contents(get_template_directory() . '/assets/images/icons/arrow-icon.svg') ?>
      </a>
    </div>
  </section>

  <?php if(have_rows('interactive_map')): get_template_part('community/community-map'); endif; ?>
  <?php if(have_rows('learning_center')): get_template_part('community/community-learning'); endif; ?>
  <?php if(have_rows('parks_and_trails')): get_template_part('community/community-parks'); endif; ?>
  <?php if(have_rows('the_land')): get_template_part('community/community-land'); endif; ?>

<?php endwhile; endif; ?>
<?php get_footer(); ?>
