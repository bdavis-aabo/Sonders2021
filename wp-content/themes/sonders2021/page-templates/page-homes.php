<?php /* Template Name: Page - Homes */ ?>

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

    <section class="page-section homes-section">
      <div class="section-content-container">
        <?php the_content(); ?>
      </div>
    </section>

    <?php if(is_page('homes')): get_template_part('homes/homes-builders'); endif; ?>

  <?php endwhile; endif; ?>
<?php get_footer(); ?>
