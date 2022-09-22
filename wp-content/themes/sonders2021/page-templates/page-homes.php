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

    <?php if(is_page('homes')):
			get_template_part('homes/homes-builders');
		endif; ?>

		<?php if(get_field('custom_homes_content') != ''): $_lotImage = get_field('custom_homes_lots'); ?>
		<section class="page-section custom-homes-section tan-bg">
			<div class="custom-homes-container">
				<figure class="home-lots">
					<img src="<?php echo $_lotImage['url'] ?>" alt="Sonders Custom Homes Lots" class="img-fluid" />
				</figure>
				<article class="home-lots-content">
					<div class="lot-content-container">
						<?php echo get_field('custom_homes_content') ?>
					</div>
					<?php if(have_rows('custom_homes_realtors')): ?>
					<div class="custom-realtors">
						<?php while(have_rows('custom_homes_realtors')): the_row(); $_logo = get_sub_field('logo'); ?>
							<article class="realtor">
								<figure class="logo">
									<img src="<?php echo $_logo['url'] ?>" alt="Realtor Logo" class="img-fluid" />
								</figure>
								<div class="realtor-contact">
									<?php echo get_sub_field('contact_info') ?>
								</div>
							</article>
						<?php endwhile; ?>
					</div>
					<?php endif; ?>
				</article>
			</div>
		</section>
		<?php endif; ?>

  <?php endwhile; endif; ?>
<?php get_footer(); ?>
