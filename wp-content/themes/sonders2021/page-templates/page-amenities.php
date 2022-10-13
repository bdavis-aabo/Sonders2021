<?php /* Template Name: Page - Amenities */ ?>

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
        <?php echo file_get_contents(get_template_directory() . '/assets/images/icons/arrow-icon.svg') ?> Back to Community Page
      </a>
    </section>

    <section class="page-section community-section">
      <div class="section-content-container">
        <h3 class="page-title"><?php the_title(); ?></h3>
        <?php the_content(); ?>
      </div>
    </section>

    <?php if(have_rows('art_studio')): get_template_part('learning/art-studio'); endif; ?>
    <?php if(have_rows('body_studio')): get_template_part('learning/body-studio'); endif; ?>
    <?php if(have_rows('idea_studio')): get_template_part('learning/idea-studio'); endif; ?>
    <?php if(have_rows('amenities')): get_template_part('learning/amenities'); endif; ?>

  <?php endwhile; endif; ?>
<?php get_footer(); ?>
