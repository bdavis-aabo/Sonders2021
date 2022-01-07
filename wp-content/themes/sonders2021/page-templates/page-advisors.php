<?php /* Template Name: Page - Advisors */ ?>

<?php get_header(); ?>

  <?php if(have_posts()): while(have_posts()): the_post(); ?>

    <section class="page-section community-section advisor-section">
      <div class="section-content-container">
        <h3 class="page-title"><?php the_title(); ?></h3>
        <?php the_content(); ?>
      </div>
    </section>

    <?php if(have_rows('sonders_advisors')): ?>
    <section class="page-section advisors-section">
      <div class="advisors-container">
      <?php while(have_rows('sonders_advisors')): the_row(); $_advisorImage = get_sub_field('image'); ?>
        <article class="advisor">
          <figure>
            <img src="<?php echo $_advisorImage['url'] ?>" alt="<?php echo $_advisorImage['alt'] ?>" class="img-fluid" />
          </figure>
          <div class="advisor-info">
            <?php echo get_sub_field('advisor_info') ?>
          </div>
        </article>
      <?php endwhile; ?>
      </div>
    </section>
    <?php endif; ?>
  <?php endwhile; endif; ?>

<?php get_footer(); ?>
