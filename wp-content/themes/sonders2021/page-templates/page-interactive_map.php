<?php /* Template Name: Page - Interactive Map */ ?>

<?php // pull main map
  $_mainMap = new WP_Query();
  $_args = array(
    'post_type'       => 'comm_maps',
    'post_status'     => 'publish',
    'posts_per_page'  => 1,
    'order'           => 'ASC',
    'orderby'         => 'menu_order',
    'name'            => 'sonders-community-map'
  );
  $_mainMap->query($_args);
?>

<?php get_header('map'); ?>

  <section class="map-message">
    <div class="mobile-message">
      <h2>Welcome to the Sonders Interactive Map</h2>
      <p>It looks like you're on a mobile device, and this map is only viewable on a tablet (in landscape orientation) or computer. Sorry about that. For now, you can download the community map to get your bearings.</p>
      <a href="<?php bloginfo('template_directory') ?>/assets/images/pdfs/Sonders_Community Map_v03.pdf" class="link link--arrowed" target="_blank">
        Download PDF Map <?php echo file_get_contents_curl(get_template_directory_uri() . '/assets/images/icons/arrow-icon.svg') ?>
      </a>
    </div>
  </section>


  <section class="mapblock-container nomobile">
    <?php if($_mainMap->have_posts()): ?>
    <div class="mapBlock" id="main-map">
      <?php while($_mainMap->have_posts()): $_mainMap->the_post();
        $_mapID = $post->post_name;
        $_mapTarget = '#' . str_replace('-', '_',$_mapID);
      ?>
      <div class="<?php echo $_mapID ?>" id="<?php echo $_mapID ?>">
        <?php echo get_the_post_thumbnail($post->ID, 'full', array('class' => 'img-fluid landing_map')); ?>
        <?php get_template_part('map/map-points-main'); ?>
      </div>
      <?php endwhile; ?>
    </div>
    <?php endif; ?>

    <?php get_template_part('map/map-childmap') ?>
  </section>

<?php get_footer('map'); ?>
