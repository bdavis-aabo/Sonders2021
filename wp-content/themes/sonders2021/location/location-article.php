<?php
  // get latest posts
  $_latestPosts = new WP_Query();
  $_args = array(
    'post_type'       => 'post',
    'post_status'     => 'publish',
    'posts_per_page'  => 1,
    'order'           => 'DESC',
    'orderby'         => 'date'
  );
  $_latestPosts->query($_args);
?>

  <?php if($_latestPosts->have_posts()): ?>
  <section class="page-section latestnews-section white-bg">
    <div class="news-content-container">
      <div class="news-titlebar">
        <h2 class="aqua-txt">Lastest Article</h2>
      </div>
      <div class="news-article-container">
        <?php while($_latestPosts->have_posts()): $_latestPosts->the_post(); ?>
        <article class="news-article" id="post-<?php echo $post->ID ?>">
          <figure class="featured-image">
            <?php echo get_the_post_thumbnail($post->ID, 'full', array('class' => 'img-fluid')); ?>
          </figure>
          <div class="article-titlebox">
            <p class="postmeta"><?php echo get_the_date('F Y'); ?> | <?php echo get_post_categories(); ?></p>
            <a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" class="link link--arrowed">
              <h3 class="article-title"><?php the_title(); ?></h3>
              Read More <?php echo file_get_contents(get_template_directory_uri() . '/assets/images/icons/arrow-icon.svg') ?>
            </a>
          </div>
        </article>
        <?php endwhile; ?>
      </div>
    </div>
  </section>
  <?php endif; ?>
