<?php get_header('blog'); ?>

  <?php if(have_posts()): ?>
  <section class="blog-section blog-index-section">
    <div class="news-article-titlebox">
      <h1 class="page-title">Community Blog</h1>
    </div>
    <div class="news-article-container">
      <?php while(have_posts()): the_post(); ?>
      <article class="news-article" id="post-<?php echo $post->ID ?>">
        <figure class="featured-image">
          <?php echo get_the_post_thumbnail($post->ID, 'full', array('class' => 'img-fluid')); ?>
        </figure>
        <div class="article-titlebox">
          <p class="postmeta"><?php echo get_the_date('F Y'); ?> | <?php echo get_post_categories(); ?></p>

            <h3 class="article-title">
              <a href="<?php the_permalink() ?>" title="<?php the_title(); ?>">
                <?php the_title(); ?>
              </a>
            </h3>
          <div class="content-container">
						<?php the_content(); ?>
						<a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" class="link link--arrowed">
							Read More <?php echo file_get_contents(get_template_directory() . '/assets/images/icons/arrow-icon.svg') ?>
						</a>
					</div>
        </div>
      </article>
      <?php endwhile; ?>
    </div>
  </section>
  <?php endif; ?>

<?php get_footer(); ?>
