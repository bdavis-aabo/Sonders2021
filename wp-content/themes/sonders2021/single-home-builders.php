<?php get_header(); ?>

  <?php if(have_posts()): while(have_posts()): the_post();
    $_galleryImages = get_field('homebuilder_gallery');

  ?>
    <section class="single-builder-section page-heroimage">
      <picture>
        <source media="(max-width: 520px)" srcset="<?php bloginfo('template_directory') ?>/assets/images/builder-mobile.jpg">
        <img src="<?php bloginfo('template_directory') ?>/assets/images/builder-hero.jpg" alt="<?php echo $_lgImage['alt'] ?>" class="heroimage-img img-fluid" />
      </picture>
      <div class="page-hero-caption">
        <h3 class="white-txt">Homes</h3>
        <h2 class="builder-name"><?php the_title() ?></h2>
        <?php the_content(); ?>
      </div>
    </section>

    <section class="single-builder-section detail-section">
      <div class="detail-container">
        <ul class="detail-list">
          <li class="home-type"><?php echo get_field('homebuilder_type') ?></li>
          <?php if(have_rows('homebuilder_model_details')): while(have_rows('homebuilder_model_details')): the_row(); ?>
            <?php if(get_sub_field('square_footage') != ''): ?>
            <li><?php echo get_sub_field('square_footage') . ' sq ft' ?></li>
            <li class="home-bed"><?php echo get_sub_field('beds') . ' bedrooms' ?></li>
            <li class="home-bath"><?php echo get_sub_field('baths') . ' bathrooms' ?></li>
            <li><?php echo get_sub_field('garage') . ' car garage' ?></li>
            <?php endif; ?>
          <?php endwhile; endif; ?>
					<?php if(get_field('homebuilder_link') != ''): ?>
					<li class="home-type floorplan-link">
						<a href="<?php echo get_field('homebuilder_link') ?>" target="_blank" class="link link--arrowed" title="<?php the_title() ?>">
							View the floorplans <?php echo file_get_contents(get_template_directory_uri() . '/assets/images/icons/arrow-icon.svg') ?>
	          </a>
					</li>
					<?php endif; ?>
        </ul>
      </div>
    </section>

    <?php if($_galleryImages): get_template_part('homes/single-gallery'); endif; ?>

		<?php
			if(!is_single('thrive-home-builders')):
				get_template_part('builder/builder-collection');
			else:
				get_template_part('builder/thrive-collection');
			endif;
		?>

  <?php if(have_rows('homebuilder_video')): while(have_rows('homebuilder_video')): the_row();
			$_image = get_sub_field('video_image'); $_mobImage = get_sub_field('video_mobile'); $_video = get_sub_field('video_url');
	?>
		<?php if($_video != ''): ?>
		<section class="single-builder-section builder-video-image">
			<div class="builder-image-container">
				<picture>
	        <source media="(max-width: 520px)" srcset="<?php echo $_mobImage['url'] ?>">
	        <img src="<?php echo $_image['url'] ?>" alt="<?php echo $_image['alt'] ?>" class="video-img img-fluid" />
	      </picture>
				<div class="builder-image-caption">
					<h2>About <?php the_title(); ?></h2>
					<button class="play-btn white-btn play-video"><i class="fal fa-play-circle"></i> Play Video</button>
				</div>
			</div>
		</section>

		<section class="video-overlay dark-bg" id="builder-video">
			<a class="closeVideo-btn"><i class="fal fa-times"></i></a>
			<article class="builder-video embed-container">
				<iframe src="<?php echo $_video ?>?h=dff63df3a7&badge=0&autopause=0&player_id=0&app_id=58479&byline=0&" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen title="Bridgewater Homes at Sonders Fort Collins"></iframe>
			</article>
		</section>
		<?php endif; ?>

	<?php endwhile; endif; ?>


    <section class="single-builder-section builder-office-section">
      <div class="builder-office-container">
        <h2 class="builder-name"><?php the_title() ?></h2>
        <div class="office-left">
          <?php if(!is_single('thrive-home-builders')): ?>
						<span class="caps">Model home and sales office</span>
					<?php else: ?>
						<span class="caps">sales office</span>
					<?php endif; ?>
          <p><?php echo get_field('homebuilder_address') . '<br />' . get_field('homebuilder_phone')?></p>
        </div>
        <div class="office-right">
          <span class="caps">sales office</span>
          <p><?php echo get_field('homebuilder_hours') ?></p>
        </div>
        <div class="office-bottom">
          <a title="<?php bloginfo('name'); ?> - Homes" class="link link--arrowed builderContact-btn" data-builder="<?php the_title() ?>">
            Request Information
            <?php echo file_get_contents(get_template_directory_uri() . '/assets/images/icons/arrow-icon.svg') ?>
          </a>
		<?php if(get_field('homebuilder_link') != ''): ?>
		<a href="<?php echo get_field('homebuilder_link') ?>" class="link link--arrowed builderContact-btn" title="<?php the_title() ?>" target="_blank">
	          Visit <?php the_title() ?>
	          <?php echo file_get_contents(get_template_directory_uri() . '/assets/images/icons/arrow-icon.svg') ?>
	     </a>
		<?php endif; ?>
        </div>
      </div>
    </section>

  <?php endwhile; endif; ?>



<?php get_footer(); ?>
