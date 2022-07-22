  <footer class="footer">
    <section class="footer-top ltblue-bg">
      <div class="footer-logo-container">
        <?php echo file_get_contents(get_template_directory() . '/assets/images/sonders-headerLogo.svg') ?>
      </div>
    </section>
    <section class="footer-bottom aqua-bg">
      <div class="footer-bottom-container boxes">
        <div class="footer-box">Follow us.</div>
        <div class="footer-box"><a href="https://www.facebook.com/Sonders-Fort-Collins-109194651036734" target="_blank" title="<?php bloginfo('name') ?> on Facebook"><i class="fab fa-facebook-f"></i></a></div>
        <div class="footer-box"><a href="https://www.instagram.com/sondersfortcollins/" target="_blank" title="<?php bloginfo('name') ?> on Facebook"><i class="fab fa-instagram"></i></a></div>
        <div class="footer-box hastag">#sondersfortcollins</div>
      </div>
    </section>



      <p class="disclaimer">
        Copyright &copy; <?php echo date('Y'); ?> Waters' Edge Developments Inc.<br/>All pricing, product specifications, planned amenities, landscaping and timing is subject to change without prior notice. All renderings are artist representations only and are subject to change.<br/>
        <img src="<?php bloginfo('template_directory') ?>/assets/images/eho-icon.png" class="aligncenter" alt="Equal Housing Opportunity" />
      </p>
  </footer>

  <button class="top-btn link link--arrowed">
	  <?php echo file_get_contents(get_template_directory_uri() . '/assets/images/icons/arrow-icon.svg') ?><br/>
	  Back to Top
  </button>

  <?php get_template_part('contact/contact-form') ?>

	<?php if(is_front_page()): ?>
		<?php if(have_rows('forum_callout')): ?>
		<div class="forum-button-container">
			<?php echo file_get_contents(get_template_directory_uri() . '/assets/images/sonders_outline.svg') ?>
			<?php while(have_rows('forum_callout')): the_row(); ?>
				<button class="forum-btn" onclick="location.href='/forum'">
			  	<div class="forum-contents">
			    	<div class="blue-bg">
			    		<h3><?php echo get_sub_field('callout_title') ?></h3>
			    	</div>
			    	<div class="white-xbg">
			    		<p><?php echo get_sub_field('callout_content') ?></p>
							<div class="start">
								<p>Start the Survey </p><?php echo file_get_contents(get_template_directory_uri() . '/assets/images/icons/arrow.svg') ?>
							</div>
			    	</div>
			  	</div>
				</button>
			<?php endwhile; ?>
		</div>

		<?php endif; ?>
	<?php endif; ?>

<?php wp_footer(); ?>

</html>
</body>
