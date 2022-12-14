<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="ISO-8859-1">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo get_bloginfo('title'); ?> - <?php echo get_bloginfo('description') ?></title>
    <?php wp_head();?>
</head>
<body>    
        <div class="container-fluid bg-primary">
            <div class="container-lg">
                <div class="row text-white py-1">
                    <div class="col-md-9 col-sm-12 text-center text-md-start">
                        <span class="hashtag align-middle">#omaior<span class="text-gray">campeão</span>dobrasil</span>
                    </div>
                    <div id="avanti" class="col-md-3 col-sm-12 text-center text-md-end">
                        <a href="https://ingressospalmeiras.com.br/" target="_blank">
                            <strong>Seja</strong>
                            <img src="<?php echo get_template_directory_uri(); ?>/images/avanti.png" class="header-logo" akt="Seja Sócio Avanti"><br>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div id="menus-container" class="container-fluid bg-secondary sticky-top">
            <div class="container-lg">
                <div class="row text-white py-2">
                    <div class="col-12 col-md-2 d-none d-md-block">
                        <div class="text-center">
                            <a href="<?php echo get_bloginfo('url'); ?>">
                                <img src="<?php echo recupera_custom_logo(); ?>" class="site-logo" alt="Sociedade Esportiva Palmeiras">
                            </a>
                        </div>
                    </div>
                    <div class="col-12 col-md-8">
                    <div class="row-fluid text-center">
                            <?php
                                $args = array(
                                    'menu_class' => "menu-header-primary d-none d-lg-block",
                                    'container' => "ul", // (string) Elemento HTML onde o menu será gerado.
                                    'theme_location' => "primary-menu", // (string) Recupera o menu criado no Admin para a posição primary-menu.
                                );
                                wp_nav_menu($args);
                            ?>
                        </div>
                        <div class="row-fluid text-center sticky-sm-top">
                            <nav class="navbar navbar-expand-lg navbar-dark">
                                <div class="container">
                                    <a href="<?php echo get_bloginfo('url'); ?>" class="d-md-none">
                                        <img src="<?php echo recupera_custom_logo(); ?>" class="mob-menu-logo" alt="Sociedade Esportiva Palmeiras">
                                    </a>
                                    <button class="navbar-toggler mx-auto my-2 text-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="navbar-toggler-icon text-white"></span>
                                    </button>
                                    <div class="collapse navbar-collapse col-sm-12" id="navbarSupportedContent">
                                    <?php
                                        wp_nav_menu(
                                            array(
                                                'theme_location' => 'secondary-menu',
                                                'container' => false,
                                                'menu_class' => '',
                                                'fallback_cb' => '__return_false',
                                                'items_wrap' => '<ul id="%1$s" class="navbar-nav mx-auto mb-2 mb-md-0 %2$s">%3$s</ul>',
                                                'depth' => 2,
                                                'walker' => new BootstrapNavMenuWalker()
                                            )
                                        );
                                        ?>
                                        <hr class="d-lg-none bg-white">
                                        <?php
                                        wp_nav_menu(
                                            array(
                                                'theme_location' => 'primary-menu',
                                                'container' => false,
                                                'menu_class' => 'menu-header-primary-mob',
                                                'fallback_cb' => '__return_false',
                                                'items_wrap' => '<ul id="%1$s" class="navbar-nav mx-auto mb-2 mb-md-0 d-lg-none %2$s">%3$s</ul>',
                                                'depth' => 2,
                                                'walker' => new BootstrapNavMenuWalker()
                                            )
                                        );
                                        ?>
                                    <!-- other nav ul lists -->
                                    </div>
                                </div>
                            </nav>
                        </div>
                    </div>
                    <div class="col-12 col-md-2">
                        <div class="card">
                            <div class="card-body p-0 d-sm-flex text-center flex-md-column mx-auto">
                                <img src="<?php echo get_template_directory_uri(); ?>/images/logo-crefisa.png" class="header-logo py-1" alt="Crefisa">
                                <img src="<?php echo get_template_directory_uri(); ?>/images/logo-puma.png" class="header-logo py-1" alt="PUMA">
                                <img src="<?php echo get_template_directory_uri(); ?>/images/logo-fam.png" class="header-logo py-1" alt="FAM">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Recuperando os posts do tipo Partidas através da classe WP_Query -->
        <?php $partidas = new WP_Query(
                                array(
                                    'post_type' => 'partidas',
                                    'posts_per_page' => 3,
                                    'order' => 'ASC',
                                    'orderby'   => 'meta_value',
                                    'meta_query' => array(
                                        array(
                                            'key' => '_data_partida',
                                            'value' => date('Y-m-d'),
                                            'compare' => '>='
                                        )
                                    )
                                )
                            );
        ?>
        <!-- Se houverem partidas exibe a seção -->
        <?php if ($partidas->have_posts()): ?>
        <div class="container-fluid p-0">
            <div id="matches-container" class="container-lg">
                <div class="row py-0">                
                    <div class="col-sm-12 col-md-3 bg-warning text-white text-center p-2" style="display: flex; justify-content: center; align-items: center;">
                        <strong>Próximas Partidas:</strong>
                    </div>
                    <!-- Início do looping de partidas -->
                    <?php while ( $partidas->have_posts() ) : $partidas->the_post(); ?>
                        <div class="col-sm-12 col-md-3 p-2 next-matches align-middle text-center" style="float: left; line-height: 1; dsplay: table;">
                            <a href="#" style="padding-right: 7px">               
                                <img src="<?php echo recupera_custom_logo(); ?>" class="match-logo" alt="Sociedade Esportiva Palmeiras">
                                &nbsp;X&nbsp;
                                <?php echo get_the_post_thumbnail( get_the_ID(), 'thumbnail', array( 'class' => 'match-logo')); ?>
                            </a>
                            <span><?php echo get_post_meta( get_the_ID(), '_campeonato_partida', true ); ?></span> |
                            <span><?php echo formatDateNextMatch(get_post_meta( get_the_ID(), '_data_partida', true )); ?></span> |
                            <span><?php echo formatTimeNextMatch(get_post_meta( get_the_ID(), '_hora_partida', true )); ?></span><br>
                            <span style="font-weight: bold;"><?php echo get_post_meta( get_the_ID(), '_local_partida', true ); ?></span>
                        </div>
                    <?php endwhile; ?>
                    <!-- Fim do looping de partidas -->
                </div>
            </div>
        </div>
        <?php endif; ?>
        <?php wp_reset_postdata(); ?>