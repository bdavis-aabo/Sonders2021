<?php
  // Sonders Main Map Points
  $_p = 1;
  while(have_rows('map_points')): the_row();
    $_pointID = strtolower(str_replace(' ', '-', get_sub_field('point_name')));
    $_pointTarget = '#' . strtolower(str_replace(' ', '-', get_sub_field('point_name')));
    $_pointTarget = str_replace(':', '', $_pointTarget);
    $_pointIcon = get_sub_field('point_icon');
?>
  <a class="<?php if($_p <= 3): echo 'map-child-link'; else: echo 'map-point'; endif; ?>" data-target="<?php echo $_pointTarget ?>" data-parent="#<?php echo $post->post_name ?>">
    <img src="<?php echo $_pointIcon['url'] ?>" alt="<?php echo get_sub_field('point_name') ?>" class="img-fluid" />
  </a>
<?php $_p++; endwhile; ?>

<?php
  // Builder Map Points
  while(have_rows('map_builders')): the_row();
		//if(get_sub_field('builder_name') == 'Bridgewater Homes'){
			$_builderID     = strtolower(str_replace(' ', '-', get_sub_field('builder_name')));
	    $_builderTarget = '#' . strtolower(str_replace(' ', '_', get_sub_field('builder_name')));
		// } else {
		// 	$_builderID = 'thrive-homes';
		// 	$_builderTarget = '#thrive_homes';
		// }
?>
  <a class="map-point" data-target="<?php echo $_builderTarget ?>" data-parent="#<?php echo $post->post_name ?>">
    <img src="<?php bloginfo('stylesheet_directory') ?>/assets/images/maps/builder-icon.svg" alt="<?php echo get_sub_field('builder_name') ?>" class="img-fluid" />
  </a>
<?php endwhile; ?>


  <div class="feature-card-overlay hyde">
    <?php $_items = 1; while(have_rows('map_points')): the_row(); //main cards...not builders
      $_pointID     = strtolower(str_replace(' ', '-', get_sub_field('point_name')));
      $_pointID = str_replace(':', '', $_pointID);
      $_pointIcon   = get_sub_field('point_icon');
      $_pointImages = get_sub_field('point_images');
      $_imageCount  = count((array)$_pointImages);

      if($_items > 3):
    ?>
    <article class="feature-card hyde" id="<?php echo $_pointID; ?>">
      <button class="close-card" data-target="<?php echo '#' . $_pointID ?>" data-parent="#<?php echo $post->post_name ?>"><i class="fal fa-times"></i></button>

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
					<?php if(get_sub_field('point_name') == 'Fort Collins Country Club'): ?>
						<img src="<?php bloginfo('template_directory') ?>/assets/images/maps/FCCC-Logo.jpg" alt="<?php echo get_sub_field('point_name') . ' Logo' ?>" class="img-fluid fccc-logo" />
					<?php endif; ?>
          <h3 class="blue-txt"><?php bloginfo('name') ?></h3>
          <h2 class="card-title"><?php echo get_sub_field('point_name') ?></h2>
          <?php echo get_sub_field('point_content') ?>

					<a class="continue-btn" data-target="<?php echo '#' . $_pointID ?>" data-parent="#<?php echo $post->post_name ?>">Continue Your Tour <i class="fal fa-chevron-right"></i></a>
        </div>
      </div>
    </article>

  <?php endif; $_items++; endwhile; ?>

    <?php if(have_rows('map_builders')): get_template_part('map/map-builders'); endif; ?>
  </div>
