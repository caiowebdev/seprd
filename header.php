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
                    <div class="col-md-10 col-sm-12">
                        <span class="hashtag align-middle">#omaior<span class="text-gray">campeão</span>dobrasil</span>

                    </div>
                    <div class="col-md-2 col-sm-12">
                        <button class="btn btn-sm btn-warning w-100">
                            <i class="fa fa-sign-in" aria-hidden="true"></i>
                            Meu Palmeiras
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div id="menus-container" class="container-fluid bg-secondary sticky-top">
            <div class="container-lg">
                <div class="row text-white py-2">
                    <div class="col-2 text-left">
                        <div class="align-middle">
                            <a href="<?php echo get_bloginfo('url'); ?>">
                                <img src="<?php echo recupera_custom_logo(); ?>" class="site-logo">
                            </a>
                        </div>
                    </div>
                    <div class="col-8">
                    <div class="row-fluid text-center">
                            <?php
                                $args = array(
                                    'menu_class' => "menu-header-primary",
                                    'container' => "ul", // (string) Elemento HTML onde o menu será gerado.
                                    'theme_location' => "primary-menu", // (string) Recupera o menu criado no Admin para a posição primary-menu.
                                );
                                wp_nav_menu($args);
                            ?>
                        </div>
                        <div class="row-fluid text-center">
                            <nav class="navbar navbar-expand-lg navbar-light">
                                <div class="container">
                                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="navbar-toggler-icon"></span>
                                    </button>
                                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
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
                                    <!-- other nav ul lists -->
                                    </div>
                                </div>
                            </nav>
                        </div>
                    </div>
                    <div class="col-2 text-right">
                        <div class="card h-100">
                            <div class="card-body text-center p-0">
                                <img src="<?php echo get_template_directory_uri(); ?>/images/logo-crefisa.png" class="header-logo py-1"><br>
                                <img src="<?php echo get_template_directory_uri(); ?>/images/logo-puma.png" class="header-logo py-1"><br>
                                <img src="<?php echo get_template_directory_uri(); ?>/images/logo-fam.png" class="header-logo py-1">
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
                    <div class="col-3 bg-warning text-white text-center" style="display: flex; justify-content: center; align-items: center;">
                        <span class="align-middle">Próximas Partidas:</span>
                    </div>
                    <!-- Início do looping de partidas -->
                    <?php while ( $partidas->have_posts() ) : $partidas->the_post(); ?>
                        <div class="col-3 p-1 next-matches align-middle" style="float: left; line-height: 1;">
                            <a href="#" style="float: left; padding-right: 7px">               
                                <img src="<?php echo recupera_custom_logo(); ?>" class="match-logo">
                                &nbsp;X&nbsp;
                                <img src="<?php echo get_the_post_thumbnail_url(); ?>" class="match-logo">
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