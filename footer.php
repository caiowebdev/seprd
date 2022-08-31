
    <?php wp_footer(); ?>
    <div class="container-fluid mt-5 mx-0 px-0">
  <footer class="text-center text-lg-start text-white">
    <section class="d-flex justify-content-between p-4 text-white bg-primary">
      <div class="me-5">
        <span class="align-middle">Siga o Palmeiras nas redes sociais:</span>
      </div>
      <div id="SocialLinks">
        <a href="" class="text-white mx-4">
          <i class="fa fa-facebook-f"></i>
        </a>
        <a href="" class="text-white mx-4">
          <i class="fa fa-twitter"></i>
        </a>
        <a href="" class="text-white mx-4">
          <i class="fa fa-instagram"></i>
        </a>
        <a href="" class="text-white mx-4">
          <i class="fa fa-youtube"></i>
        </a>
      </div>
    </section>
    <section id="footer-section-2" class="">
      <div class="container text-center text-md-start pt-5 text-white">
        <div class="row mt-3">
          <div class="col-md-3 col-lg-3 col-xl-3 mb-4 text-left">
            <h6 class="text-uppercase fw-bold text-warning"><?php echo getMenuName('footer-menu-1'); ?></h6>
            <?php
                $args = array(
                    'menu_class' => "menu-footer",
                    'container' => "ul", // (string) Elemento HTML onde o menu será gerado.
                    'theme_location' => "footer-menu-1", // (string) Recupera o menu criado no Admin para a posição primary-menu.
                );
                wp_nav_menu($args);
            ?>
          </div>
          <div class="col-md-3 col-lg-3 col-xl-3 mb-4 text-left">
          <h6 class="text-uppercase fw-bold text-warning"><?php echo getMenuName('footer-menu-2'); ?></h6>
            <?php
                $args = array(
                    'menu_class' => "menu-footer",
                    'container' => "ul", // (string) Elemento HTML onde o menu será gerado.
                    'theme_location' => "footer-menu-2", // (string) Recupera o menu criado no Admin para a posição primary-menu.
                );
                wp_nav_menu($args);
            ?>
          </div>
          <div class="col-md-3 col-lg-3 col-xl-3 mb-4 text-left">
          <h6 class="text-uppercase fw-bold text-warning"><?php echo getMenuName('footer-menu-3'); ?></h6>
            <?php
                $args = array(
                    'menu_class' => "menu-footer",
                    'container' => "ul", // (string) Elemento HTML onde o menu será gerado.
                    'theme_location' => "footer-menu-3", // (string) Recupera o menu criado no Admin para a posição primary-menu.
                );
                wp_nav_menu($args);
            ?>
          </div>
          <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
          <h6 class="text-uppercase fw-bold text-warning">Localização</h6>
            <img src="<?php echo get_template_directory_uri(); ?>/images/logo-allianz.png" class="img-fluid py-4">
            <p>Av. Francisco Matarazzo, 1705</p>
            <p>Bairro Água Branca</p>
            <p>São Paulo - SP</p>
          </div>
        </div>
      </div>
      <div class="col-md-12 mx-auto mb-0 text-center">
        <img src="<?php echo get_template_directory_uri(); ?>/images/footer-tacas-maior-campeao-2020.png" class="img-fluid py-4">
      </div>
    </section>
    <div class="text-center p-3 bg-warning text-white">
    Copyright <?php echo wp_date('Y', strtotime(date("Y-m-d"))); ?> <?php echo get_bloginfo('name'); ?>. Todos os direitos Reservados.
    </div>
  </footer>
</div>
</body>
</html>