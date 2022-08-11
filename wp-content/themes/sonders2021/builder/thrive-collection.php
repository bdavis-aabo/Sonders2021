<?php //if(have_rows('homebuilder_collection')): ?>
<?php while(have_rows('homebuilder_collection')): the_row(); ?>
<section class="single-builder-section builder-collection">

	<div class="collection-container">
		<div class="collection-left">
			<h2><?php echo get_sub_field('collection_name') ?></h2>
		</div>
		<div class="collection-right">
			<?php echo get_sub_field('collection_description') ?>
		</div>
	</div>
</section>
	<?php if(have_rows('collection_floorplans')): ?>

<section class="single-builder-section builder-floorplans">
	<div class="floorplan-container">
		<div class="floorplan-slide-container swiper slider--visible">
			<ul class="swiper-wrapper">
				<?php  $_i = 1; while(have_rows('collection_floorplans')): the_row(); $_image = get_sub_field('floorplan_image'); ?>
					<li class="swiper-slide" id="<?php echo strtolower(get_sub_field('floorplan_name')) . '-slide' ?>">
						<figure class="floorplan-image">
							<img src="<?php echo $_image['url'] ?>" alt="<?php echo get_sub_field('floorplan_name') ?>" class="img-fluid" />
						</figure>
						<div class="floorplan-details">
							<h4 class="floorplan-name"><?php echo '0' . $_i . '. ' . get_sub_field('floorplan_name') ?></h4>
						 <p class="floorplan-info">
							<?php echo get_sub_field('floorplan_details')  ?>
						 </p>

					<p class="floorplan-video-link">
					<?php if(get_sub_field('floorplan_video') != ''): ?>
					<a class="link link--arrowed floorplan-tour-btn" data-target="#<?php echo str_replace(' ', '-',strtolower(get_sub_field('floorplan_name') . '-video')) ?>">Video Tour <?php echo file_get_contents(get_template_directory_uri() . '/assets/images/icons/arrow-icon.svg') ?></a>
					<?php else: ?>
					&nbsp;
					<?php endif; ?>
					</p>
						</div>
					</li>
					<?php $_i++; endwhile; ?>
			</ul>
			<div class="slider-controls swiper-control-buttons">
				<button class="slide-prev">
					<?php echo file_get_contents(get_template_directory_uri() . '/assets/images/icons/arrow.svg') ?>
				</button>
				<button class="slide-next">
					<?php echo file_get_contents(get_template_directory_uri() . '/assets/images/icons/arrow.svg') ?>
				</button>
			</div>
		</div>
	</div>
</section>
<?php endif; ?>

<?php endwhile; ?>
