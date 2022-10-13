<footer class="footer map-footer">
  <section class="footer-top">
    <div class="footer-logo-container">
      <?php echo file_get_contents(get_template_directory() . '/assets/images/sonders-headerLogo.svg') ?>
    </div>
    <div class="footer-right">
      <p class="disclaimer">
        Copyright &copy; <?php echo date('Y'); ?> All pricing, product specifications, planned amenities, landscaping and timing is subject to change without prior notice. All renderings are artist representations only and are subject to change.
      </p>
      <img src="<?php bloginfo('template_directory') ?>/assets/images/eho-icon.png" class="" alt="Equal Housing Opportunity" />
    </div>
  </section>
</footer>

<?php get_template_part('contact/contact-form') ?>

<?php wp_footer(); ?>

</html>
</body>
