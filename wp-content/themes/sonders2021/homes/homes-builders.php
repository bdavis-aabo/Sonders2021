<?php
  $_builders = new WP_Query();
  $_args = array(
    'post_type'       => 'home-builders',
    'post_status'     => 'publish',
    'posts_per_page'  => -1,
    'order'           => 'ASC',
    'orderby'         => 'menu_order'
  );
  $_builders->query($_args);
?>

  <?php if($_builders->have_posts()): ?>
	<section class="page-section homebuilders-segments blue-bg">
		<div class="segment-container">
			<?php while($_builders->have_posts()): $_builders->the_post(); $_reverseLogo = get_field('homebuilder_reverse_logo'); ?>
			<article class="homebuilder-segment">
				<div class="segment-left">
					<h2 class="white-txt segment-title"><?php echo get_field('homebuilder_segment') ?></h2>
					<a href="<?php the_permalink() ?>" title="<?php the_title() ?>" class="link link--arrowed white-text">
            Learn More <?php echo file_get_contents(get_template_directory() . '/assets/images/icons/arrow-icon.svg') ?>
          </a>
				</div>
				<div class="segment-right">
					<img src="<?php echo $_reverseLogo['url'] ?>" class="img-fluid builder-logo" alt="<?php the_title() ?> - logo" />
				</div>
			</article>
			<?php endwhile; ?>
		</div>
	</section>


  <section class="page-section homebuilders-section">
    <div class="homebuilder-container">
    <?php while($_builders->have_posts()): $_builders->the_post(); $_builderImages = get_field('homebuilder_image'); $_logo = get_field('homebuilder_logo'); ?>
      <article class="builder" id="builder-<?php echo $post->post_name ?>">
        <?php if(count($_builderImages) >= 2): ?>
        <div class="builder-slide-container swiper slider--visible">
          <ul class="swiper-wrapper">
            <?php foreach($_builderImages as $_image): ?>
            <li class="swiper-slide">
              <img src="<?php echo $_image['url'] ?>" alt="<?php the_title() ?>" class="swiper-lazy swiper-lazy-loaded img-fluid" />
              <p style="color: #fff;">&nbsp;</p>
            </li>
            <?php endforeach; ?>
          </ul>
          <div class="slider-controls swiper-control-buttons <?php if($_postCount < 2): ?>noshow<?php endif; ?>">
            <button class="slide-prev">
              <?php echo file_get_contents(get_template_directory() . '/assets/images/icons/arrow.svg') ?>
            </button>
            <button class="slide-next">
              <?php echo file_get_contents(get_template_directory() . '/assets/images/icons/arrow.svg') ?>
            </button>
          </div>
        </div>
        <?php else: ?>
        <figure class="builder-image">
          <img src="<?php echo $_builderImages[0]['url'] ?>" alt="<?php echo $_builderImages[0]['alt'] ?>" class="img-fluid" />
        </figure>
        <?php endif; ?>
        <div class="builder-details">
          <img src="<?php echo $_logo['url'] ?>" alt="<?php the_title() ?>" class="img-fluid" />
          <h2 class="builder-name"><?php the_title() ?></h2>
          <p class="builder-product">
						<?php echo get_field('homebuilder_type') ?>
					</p>

					<p class="builder-info">
						<?php if(get_field('homebuilder_pricing') != ''): ?>
							<?php echo get_field('homebuilder_pricing') ?><br/>
						<?php endif; ?>
						<?php if(have_rows('homebuilder_model_details')): while(have_rows('homebuilder_model_details')): the_row(); ?>
							<?php if(get_sub_field('square_footage') != ''):
								echo 'Approx. ' . get_sub_field('square_footage') . ' sq ft | ' . get_sub_field('beds') . ' beds | ' . get_sub_field('baths') . ' baths';
							endif; ?>
						<?php endwhile; endif; ?>

          </p>

          <?php echo get_field('homebuilder_introduction'); ?>

          <a href="<?php the_permalink() ?>" title="<?php the_title() ?>" class="link link--arrowed">
            View the homes <?php echo file_get_contents(get_template_directory() . '/assets/images/icons/arrow-icon.svg') ?>
          </a>
        </div>
      </article>
    <?php endwhile; ?>
    </div>
  </section>
  <?php endif; wp_reset_query(); ?>
