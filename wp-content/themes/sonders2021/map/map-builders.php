
  <?php while(have_rows('map_builders')): the_row();
    $_builderID     = strtolower(str_replace(' ', '_', get_sub_field('builder_name')));
    $_builderImages = get_sub_field('builder_images');
    $_imageCount = count($_builderImages);
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
        <?php echo get_sub_field('builder_content') ?>
      </div>
    </div>
  </article>
  <?php endwhile; ?>
