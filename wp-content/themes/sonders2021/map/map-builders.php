
  <?php while(have_rows('map_builders')): the_row();
		$_builder = get_sub_field('builder_name');
    $_builderID     = strtolower(str_replace(' ', '_', $_builder));
    $_builderImages = get_sub_field('builder_images');
    $_imageCount = count((array)$_builderImages);
  ?>
  <article class="feature-card hyde" id="<?php echo $_builderID ?>">
    <button class="close-card"><i class="fal fa-times"></i></button>

    <div class="card-left">
      <?php if($_imageCount >= 2): ?>
      <div class="carousel slide" data-ride="carousel" id="<?php echo $_pointID . '-slide' ?>">
        <ol class="carousel-indicators">
        <?php $_i = 0; foreach($_builderImages as $_image): ?>
          <li <?php if($_i == 0): ?>class="active"<?php endif; ?> data-slide-to="<?php echo $_i ?>" data-target="#<?php echo $_pointID . '-slide' ?>"></li>
        <?php $_i++; endforeach; ?>
        </ol>
        <div class="carousel-inner">
        <?php $_s = 0; foreach($_builderImages as $_image): ?>
          <div class="carousel-item <?php if($_s == 0): echo 'active'; endif; ?>">
            <img src="<?php echo $_image['url'] ?>" alt="<?php echo $_image['alt'] ?>" class="img-fluid" />
          </div>
        <?php $_s++; endforeach; ?>
        </div>
      </div>
      <?php else: ?>
        <img src="<?php echo $_builderImages[0]['url'] ?>" class="img-fluid" alt="<?php echo get_sub_field('builder_name') ?>" />
      <?php endif; ?>
    </div> <?php // end card-left ?>
    <div class="card-right">
      <div class="card-contents">
        <h3 class="blue-txt"><?php bloginfo('name') ?></h3>
        <h2 class="card-title"><?php echo get_sub_field('builder_name') ?></h2>
        <?php echo get_sub_field('builder_content'); ?>
				<?php if($_builder != 'Bridgewater Homes'): ?>
					<a class="contactBtn builderContact-btn btn ltblue-btn" data-target="contactBox" data-builder="Thrive Home Builders">sign up <i class="fal fa-chevron-right"></i></a>
				<?php endif; ?>

				<p style="margin-top: 8px;">
					<a class="continue-btn" data-target="<?php echo '#' . $_pointID ?>" data-parent="#<?php echo $post->post_name ?>">Continue Your Tour <i class="fal fa-chevron-right"></i></a>
				</p>
      </div>
    </div>
  </article>
  <?php endwhile; ?>
