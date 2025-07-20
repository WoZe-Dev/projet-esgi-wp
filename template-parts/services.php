<div class="services-container template-part">
  <?php if (!is_page('services')): ?>
    <div class="container">
      <h2>
        Our Services
      </h2>
    </div>
  <?php endif; ?>
  <div class="services">
    <div class="service-item">
      <img src="<?php echo get_template_directory_uri(); ?>/img/12.png" />
    </div>
    <div class="service-item">
      <img src="<?php echo get_template_directory_uri(); ?>/img/11.png" />
    </div>
    <div class="service-item" id="private-parties">
      <h4>Private Parties</h4>
      <span id="gradient-line"></span>
    </div>
    <div class="service-item">
      <img src="<?php echo get_template_directory_uri(); ?>/img/10.png" />
    </div>
  </div>
</div>