<?php
$_homes = new WP_Query();
$_args = array(
  'post_type' 			=> 'page',
  'post_status' 		=> 'publish',
  'posts_per_page' 	=> 1,
	'pagename'				=> 'homes'
);
$_homes->query($_args);
?>

<?php if($_homes->have_posts()): while($_homes->have_posts()): $_homes->the_post(); ?>
<?php if(get_field('custom_homes_content') != ''): $_lotImage = get_field('custom_homes_lots'); ?>
<section class="page-section custom-homes-contact">
	<div class="custom-contact-container">
		<article class="home-lots-content">
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
				<p style="text-align: center; flex-basis: 100%;">
					<img src="<?php bloginfo('template_directory') ?>/assets/images/realtor-logo.jpg" class="img-fluid aligncenter" alt="Realtor Logo" />
				</p>
			</div>
			<?php endif; ?>
		</article>
	</div>
</section>
<?php endif; ?>
<?php endwhile; endif; wp_reset_query(); ?>
