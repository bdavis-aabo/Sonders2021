  <?php if(get_field('evernew_park') != ''): ?>
  <section class="page-section evernew-park-section">
    <div class="evernew-container">
      <div class="evernew-content">
        <img src="<?php bloginfo('template_directory') ?>/assets/images/icons/evernew-icon.svg" class="park-icon" alt="evernew park at sonders" />
        <?php echo get_field('evernew_park') ?>
      </div>
      <?php if(have_rows('park_perks')): ?>
      <div class="evernew-callouts">
        <?php while(have_rows('park_perks')): the_row(); $_icon = get_sub_field('perk_icon'); ?>
        <article class="park-perk">
          <figure>
            <img src="<?php echo $_icon['url'] ?>" class="callout-icon img-fluid" alt="evernew park perks" />
          </figure>
          <?php echo get_sub_field('perk_content'); ?>
        </article>
        <?php endwhile; ?>
      </div>
      <?php endif; ?>
    </div>
  </section>
  <?php endif; ?>
