<?php /* Template Name: Page - Forum */ ?>

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

    <section class="page-section community-section">
      <div class="section-content-container">
        <h3 class="page-title"><?php the_title(); ?></h3>
        <?php the_content(); ?>
      </div>

      <div class="section-contact-form">
        <div class="forum-form">
				<?php
				if(is_page('sonders-forum')):
        	echo do_shortcode('[contact-form-7 id="318" title="Forum Submission"]');
				elseif(is_page('sonders-forum-survey-5')): ?>
				<div class="forum-survey">
					<script>
						(function(t,e,s,n){var o,a,c;t.SMCX=t.SMCX||[],e.getElementById(n)||(o=e.getElementsByTagName(s),a=o[o.length-1],c=e.createElement(s),c.type="text/javascript",c.async=!0,c.id=n,c.src="https://widget.surveymonkey.com/collect/website/js/tRaiETqnLgj758hTBazgdxUBLG_2Bzm7As7ultFwnYXRHz7IUtWNm6b7jxZoshlm5Q.js",a.parentNode.insertBefore(c,a))})(window,document,"script","smcx-sdk");
						</script>
				</div>
				<?php elseif(is_page('sonders-forum-survey-6')): ?>
				<div class="forum-survey">
					<script>
						(function(t,e,s,n){var o,a,c;t.SMCX=t.SMCX||[],e.getElementById(n)||(o=e.getElementsByTagName(s),a=o[o.length-1],c=e.createElement(s),c.type="text/javascript",c.async=!0,c.id=n,c.src="https://widget.surveymonkey.com/collect/website/js/tRaiETqnLgj758hTBazgd_2F1P_2B59EX_2FxfFwX4gkVO_2F8rmvWdsxQecRelBh7e7YwFX.js",a.parentNode.insertBefore(c,a))})(window,document,"script","smcx-sdk");
					</script>
				</div>
				<?php endif; ?>
        </div>
      </div>
    </section>
  <?php endwhile; endif; ?>

<?php get_footer(); ?>
