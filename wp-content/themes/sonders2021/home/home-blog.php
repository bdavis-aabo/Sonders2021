<?php
  // get latest posts
  $_firstPost = new WP_Query();
  $_args = array(
    'post_type'       => 'post',
    'post_status'     => 'publish',
    'posts_per_page'  => 1,
    'order'           => 'DESC',
    'orderby'         => 'date'
  );
  $_firstPost->query($_args);

  $_nextPosts = new WP_Query();
  $_args = array(
    'post_type'       =>  'post',
    'post_status'     =>  'publish',
    'posts_per_page'  =>  2,
    'order'           => 'DESC',
    'orderby'         =>  'date',
    'offset'          =>  1
  );
  $_nextPosts->query($_args);
?>

  <section class="homepage-section latestnews-section white-bg">
    <div class="news-content-container">
      <div class="news-titlebar">
        <h2 class="aqua-txt">Blog</h2>
        <h1>News relevant to you.</h1>
      </div>
      <div class="news-article-container">
        <div class="news-left">
        <?php while($_firstPost->have_posts()): $_firstPost->the_post(); ?>
          <article class="news-article" id="post-<?php echo $post->ID ?>">
            <figure class="featured-image">
              <?php echo get_the_post_thumbnail($post->ID, 'full', array('class' => 'img-fluid')); ?>
            </figure>
            <div class="article-titlebox">
              <p class="postmeta"><?php echo get_the_date('F Y'); ?> | <?php echo get_post_categories(); ?></p>
							<h3 class="article-title"><?php the_title(); ?></h3>
							<?php the_content(); ?>
            </div>
          </article>
        <?php endwhile; wp_reset_query(); ?>
        </div> <?php // end news-left ?>
        <div class="news-right">
          <?php while($_nextPosts->have_posts()): $_nextPosts->the_post(); ?>
            <article class="news-article" id="post-<?php echo $post->ID ?>">
              <figure class="featured-image">
                <?php echo get_the_post_thumbnail($post->ID, 'full', array('class' => 'img-fluid')); ?>
              </figure>
              <div class="article-titlebox">
                <p class="postmeta"><?php echo get_the_date('F Y'); ?> | <?php echo get_post_categories(); ?></p>
                <a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" class="link link--arrowed">
                  <h3 class="article-title"><?php the_title(); ?></h3>
                  <?php echo file_get_contents(get_template_directory_uri() . '/assets/images/icons/arrow-icon.svg') ?>
                </a>
              </div>
            </article>
          <?php endwhile; wp_reset_query(); ?>
        </div>
        </div>
      </div>
    </div>
  </section>
