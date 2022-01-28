<?php
  $_childMaps = new WP_Query();
  $_args = array(
    'post_type'       => 'comm_maps',
    'post_status'     => 'publish',
    'posts_per_page'  => -1,
    'order'           => 'ASC',
    'orderby'         => 'menu_order',
    'post__not_in'    => array(255)
  );
  $_childMaps->query($_args);
?>

<?php while($_childMaps->have_posts()): $_childMaps->the_post();
  $_mapID = $post->post_name;
?>
<div class="mapBlock hyde" id="<?php echo $_mapID ?>">
  <?php echo get_the_post_thumbnail($post->ID, 'full', array('class' => 'img-fluid ' . $post->post_name . '-map')); ?>

  <button class="btn map-back" data-target="<?php echo '#' . $_mapID ?>"><i class="fal fa-chevron-left"></i> Back to community map</button>

  <div class="child-map-sidebar dark-bg">
  	<button class="close-sidebar"><i class="fal fa-times"></i></button>
	<div class="sidebar-contents">
		<?php the_content(); ?>
	</div>
  </div>

  <?php while(have_rows('map_points')): the_row();
    $_pointID     = strtolower(str_replace(' ', '-', get_sub_field('point_name')));
    $_pointID     = str_replace('-&-', '-',$_pointID);
    $_pointTarget = '#' . strtolower(str_replace(' ', '_', get_sub_field('point_name')));
    $_pointTarget = str_replace('_&_', '_',$_pointTarget);
    $_pointTarget = str_replace(',', '',$_pointTarget);
    $_pointTarget = str_replace(':', '',$_pointTarget);
  ?>
  <a class="map-point child-point" data-target="<?php echo $_pointTarget ?>" data-parent="<?php echo '#' . $post->post_name ?>">
    <img src="<?php bloginfo('template_directory') ?>/assets/images/maps/cross-icon.svg" alt="<?php echo get_sub_field('point_name'); ?>" class="img-fluid" />
  </a>
  <?php endwhile; ?>

  <div class="feature-card-overlay hyde">
    <?php while(have_rows('map_points')): the_row(); //main cards...not builders
      $_pointID     = strtolower(str_replace(' ', '_', get_sub_field('point_name')));
      $_pointID     = str_replace(':', '', $_pointID);
      $_pointID     = str_replace(',', '', $_pointID);
      $_pointIcon   = get_sub_field('point_icon');
      $_pointImages = get_sub_field('point_images');
      $_imageCount  = count($_pointImages);
    ?>
    <article class="feature-card hyde" id="<?php echo $_pointID; ?>">
      <button class="close-card"><i class="fal fa-times"></i></button>

      <div class="card-left">
        <?php if($_imageCount >= 2): ?>
        <div class="carousel slide" data-ride="carousel" id="<?php echo $_pointID . '-slide' ?>">
          <ol class="carousel-indicators">
          <?php $_i = 0; foreach($_pointImages as $_image): ?>
            <li <?php if($_i == 0): ?>class="active"<?php endif; ?> data-slide-to="<?php echo $_i ?>" data-target="#<?php echo $_pointID . '-slide' ?>"></li>
          <?php $_i++; endforeach; ?>
          </ol>
          <div class="carousel-inner">
          <?php $_s = 0; foreach($_pointImages as $_image): ?>
            <div class="carousel-item <?php if($_s == 0): echo 'active'; endif; ?>">
              <img src="<?php echo $_image['url'] ?>" alt="<?php echo $_image['alt'] ?>" class="img-fluid" />
            </div>
          <?php $_s++; endforeach; ?>
          </div>
        </div>
        <?php else: ?>
          <img src="<?php echo $_pointImages[0]['url'] ?>" class="img-fluid" alt="<?php echo get_sub_field('point_name') ?>" />
        <?php endif; ?>
      </div> <?php //end card-left ?>
      <div class="card-right">
        <div class="card-contents">
          <h3 class="aqua-txt"><?php the_title(); ?></h3>
          <h2 class="card-title"><?php echo get_sub_field('point_name') ?></h2>
          <?php echo get_sub_field('point_content') ?>
					<a class="continue-btn" data-target="<?php echo '#' . $_pointID ?>" data-parent="#<?php echo $post->post_name ?>">Continue Your Tour <i class="fal fa-chevron-right"></i></a>
        </div>
      </div>
    </article>
    <?php endwhile; ?>

  </div>
</div>

<?php endwhile; ?>
