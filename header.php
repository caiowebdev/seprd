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
    <main>
        <div class="container-fluid">
            <div class="row bg-primary text-white py-1">
                <div class="col-10">
                    <span class="hashtag align-middle">#omaior<span class="text-gray">campeão</span>dobrasil</span>
                    
                </div>
                <div class="col-2">
                    <button class="btn btn-sm btn-warning w-100">
                    <i class="fa-solid fa-user"></i>
                        Meu Palmeiras
                    </button>
                </div>
            </div>
            <div class="row bg-secondary text-white py-2">
                <div class="col-2 text-left">
                    <div class="align-middle">
                        <img src="<?php echo recupera_custom_logo(); ?>" class="site-logo">
                    </div>
                </div>
                <div class="col-8 text-center">
                    
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