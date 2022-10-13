<section class="page-section learning-section">
  <div class="learning-center-container">
  <?php while(have_rows('learning_center')): the_row(); $_logo = get_sub_field('center_logo'); $_gallery = get_sub_field('center_images'); ?>
    <div class="gallery-container">
      <?php foreach($_gallery as $_image): ?>
      <figure class="gallery-image">
        <img src="<?php echo $_image['url'] ?>" alt="<?php echo $_image['alt'] ?>" class="img-fluid" />
      </figure>
      <?php endforeach; ?>
    </div>
    <div class="learning-contents">
      <div class="learning-left">
        <figure class="gallery-image">
          <img src="<?php echo $_logo['url'] ?>" alt="Learning Center Logo" class="img-fluid" />
        </figure>
      </div>
      <div class="learning-right">
        <?php echo get_sub_field('center_content') ?>
        <a href="/community/sonders-learning-center" class="link link--arrowed" title="Sonders Learning Center">
          Sonders Learning Center  <?php echo file_get_contents_curl(get_template_directory_uri() . '/assets/images/icons/arrow-icon.svg') ?>
        </a>
      </div>
    </div>
  <?php endwhile; ?>
  </div>
</section>
