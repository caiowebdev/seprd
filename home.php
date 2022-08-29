<?php
/**
 * Template Name: Homepage
 * Description: Homepage do template SEP RD /blog.
 *
 */

//Incorporando a página header.php
//(conteúdos do cabeçalho da homepage)
get_header();
?>
        <div class="container-fluid p-0">
            <div class="container-lg p-0">
                <!-- Início do slide de notícias -->
                <div id="carouselExampleCaptions" class="carousel slide carousel-fade" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <!-- Recuperando os posts na categoria noticias através da classe WP_Query -->
                        <?php $noticias = new WP_Query(
                            array(
                                'post_type' => 'post',
                                'tax_query' => [
                                    [
                                        'taxonomy' => 'category',
                                        'field' => 'slug',
                                        'terms' => 'noticias',
                                    ],
                                ],
                                'posts_per_page' => 6
                            )
                        );
                        $counter = 0; ?>
                        <!-- Início do looping de notícias (slides) -->
                        <?php while ( $noticias->have_posts() ) : $noticias->the_post(); ?>
                                <div class="carousel-item <?php echo ($counter == 0) ? 'active' : ''; ?>" style="background: linear-gradient(to bottom, transparent, #000), url('<?php echo get_the_post_thumbnail_url(); ?>');">
                                    <a href="<?php the_permalink(); ?>">
                                        <div class="carousel-caption" style="bottom: 55px;">
                                        <h3><?php the_title(); ?></h3>                            
                                        </div>
                                    </a>
                                </div>
                            <?php $counter++; ?>
                        <?php endwhile; ?>
                        <?php wp_reset_postdata(); ?>
                        <!-- Final do looping de noticias -->
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden"></span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden"></span>
                    </button>
                </div>
                <!-- Fim do slide de notícias -->
            </div>
        </div>
        <div class="container-fluid p-0">
            <div id="NextMatchClassification" class="container p-2 card shadow">
                <div class="row">
                    <div class="col-md-6 text-center">
                        <h4 class="text-center">Próximo Confronto</h4>
                        <hr>
                        <!-- Recuperando próximo confronto através da classe WP_Query -->
                        <?php $partidas = new WP_Query(
                                                array(
                                                    'post_type' => 'partidas',
                                                    'posts_per_page' => 1,
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
                        <!-- Recuperando a próxima partida -->
                        <?php while ( $partidas->have_posts() ) : $partidas->the_post(); ?>
                        <div class="col-12 p-1 next-match align-middle text-center">
                            <h5 class="text-warning"><?php echo get_post_meta( get_the_ID(), '_campeonato_partida', true ); ?></h5>
                            <span><?php echo formatDateNextMatch(get_post_meta( get_the_ID(), '_data_partida', true )); ?></span> |
                            <span><?php echo formatTimeNextMatch(get_post_meta( get_the_ID(), '_hora_partida', true )); ?></span><br>
                            <span style="font-weight: bold;"><?php echo get_post_meta( get_the_ID(), '_local_partida', true ); ?></span><br><br>
                                <img src="<?php echo recupera_custom_logo(); ?>" class="next-logo">
                                &nbsp;&nbsp;&nbsp;X&nbsp;
                                <img src="<?php echo get_the_post_thumbnail_url(); ?>" class="next-logo">
                        </div>
                    <?php endwhile; ?>
                    <?php wp_reset_postdata(); ?>             
                    <!-- Fim recuperando a próxima partida -->
                    <button class="btn btn-warning mt-5">
                        INGRESSOS
                    </button>
                    </div>
                    <div class="col-md-6">
                        <h4 class="text-center">Classificação</h4>
                        <hr>
                        <!-- Recuperando classificação do campeonato Brasileiro da classe WP_Query -->
                        <!-- Rotina pode ser alterada através de consumo de API (Ex. https://www.api-futebol.com.br/) -->
                        <?php $times = new WP_Query(
                                                array(
                                                    'post_type' => 'times',
                                                    'posts_per_page' => 5,
                                                    'meta_query' => array(
                                                        'relation' => 'AND',
                                                        'pontuacao_clause' => array(
                                                            'key'     => '_pontuacao',
                                                            'compare' => 'EXISTS',
                                                        ),
                                                        'vitorias_clause' => array(
                                                            'key'     => '_vitorias',
                                                            'compare' => 'EXISTS',
                                                        ),
                                                        'derrotas_clause' => array(
                                                            'key'     => '_derrotas',
                                                            'compare' => 'EXISTS',
                                                        ), 
                                                    ),
                                                    'orderby' => array(
                                                        'pontuacao_clause' => 'DESC',
                                                        'vitorias_clause'  => 'DESC',
                                                        'derrotas_clause'  => 'ASC',
                                                    ),
                                                )
                                            );
                        ?>
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                <th scope="col">#</th>
                                <th scope="col">Equipe</th>
                                <th scope="col">Pts</th>
                                <th scope="col">J</th>
                                <th scope="col">V</th>
                                <th scope="col">E</th>
                                <th scope="col">D</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Listando a classificação -->
                                <?php $counter = 1; ?>
                                <?php while ( $times->have_posts() ) : $times->the_post(); ?>
                                <tr>
                                    <th scope="row"><?php echo $counter; ?></th>
                                    <td>
                                    <img src="<?php echo get_the_post_thumbnail_url(); ?>" style="max-height: 25px;">
                                    <?php the_title(); ?>
                                    </td>
                                    <td><?php echo get_post_meta( get_the_ID(), '_pontuacao', true ); ?></td>
                                    <td><?php echo get_post_meta( get_the_ID(), '_jogos', true ); ?></td>
                                    <td><?php echo get_post_meta( get_the_ID(), '_vitorias', true ); ?></td>
                                    <td><?php echo get_post_meta( get_the_ID(), '_empates', true ); ?></td>
                                    <td><?php echo get_post_meta( get_the_ID(), '_derrotas', true ); ?></td>
                                </tr>
                                <?php $counter++; ?>
                                <?php endwhile; ?>
                                <?php wp_reset_postdata(); ?>
                                <!-- Fim listando a classificação -->
                            </tbody>
                        </table>
                        <a href="#" class="float-right text-warning">Veja Mais</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid p-0">
            <div id="LastestNew" class="container-lg">
                <h3>Últimas Notícias <span class="divider">|</span> <a href="#">Ver Todas</a></h3>
                <div class="row">
                    <!-- Recuperando os posts na categoria noticias através da classe WP_Query -->
                    <?php $noticias = new WP_Query(
                            array(
                                'post_type' => 'post',
                                'tax_query' => [
                                    [
                                        'taxonomy' => 'category',
                                        'field' => 'slug',
                                        'terms' => 'noticias',
                                    ],
                                ],
                                'posts_per_page' => 6
                            )
                        );
                        $counter = 0; ?>
                        <!-- Início do looping de notícias (slides) -->
                        <?php while ( $noticias->have_posts() ) : $noticias->the_post(); ?>
                            <div class="card col-md-<?php echo ($counter > 1) ? '4' : '6'; ?>" style="width: 18rem;">
                                <a href="<?php the_permalink(); ?>">
                                    <img src="<?php echo get_the_post_thumbnail_url(); ?>" class="card-img-top" alt="..." >
                                </a>
                                <div class="card-body">
                                    <span class="card-title"><?php the_title(); ?></span>
                                    <a href="<?php the_permalink(); ?>" class="stretched-link"></a>
                                </div>
                            </div>
                            <?php $counter++; ?>
                        <?php endwhile; ?>
                        <?php wp_reset_postdata(); ?>
                        <!-- Fim do looping de notícias (slides) -->
                </div>
            </div>
        </div>
        <div class="container-fluid p-0">
            <div id="Videos" class="container-lg bg-primary text-white">
            <h3>Vídeos <span class="divider">|</span> <a href="#">Ver Todos</a></h3>
            <!-- Recuperando vídeos do canal do YouTube -->
            <?php $response = wp_remote_get( 'https://www.googleapis.com/youtube/v3/search?key=AIzaSyA2dCOaaWYIL7NUDTNGcKPLhcsZ841Zu8A&part=snippet,id&order=date&maxResults=5&&channelId=UCBKc-rPDivvwFiWdG-81wxw' ); ?>
            <?php $responseBody = wp_remote_retrieve_body( $response ); ?>
            <!-- Convertendo resultado para utilização -->
            <?php $videos = json_decode( $responseBody ); ?>
            <?php $counter = 0; ?>
            <div class="row">
                <!-- Início do looping de vídeos -->
                <?php foreach ($videos->items as $video): ?>
                        <div class="card h-100 col-md-<?php echo ($counter > 1) ? '4' : '6'; ?>" style="float: left;">
                            <a href="<?php the_permalink(); ?>">
                                <img src="<?php echo $video->snippet->thumbnails->high->url; ?>" class="card-img-top" alt="..." >
                            </a>
                            <div class="card-body">
                                <span class="card-date"><?php echo wp_date('d F Y', strtotime($video->snippet->publishTime)); ?></span><br>
                                <span class="card-title"><?php echo $video->snippet->title; ?></span><br>
                                <a href="https://youtube.com/watch/<?php echo $video->id->videoId; ?>" class="stretched-link"></a>
                            </div>
                        </div>
                    <?php $counter++; ?>
                <?php endforeach;?>
            </div>
        </div>
    </div>
    <div class="container-fluid p-0 mt-3">
        <div id="Shop" class="container-lg bg-white">
            <h3>Linha 2022 <span class="divider">|</span> <a href="https://www.palmeirasstore.com/">Visitar Loja</a></h3>
            <div class="row">
                <?php $camisas = new WP_Query(
                                                array(
                                                    'post_type' => 'camisas',
                                                    'posts_per_page' => 3,
                                                    'order' => 'ASC'
                                                )
                                            );
                        ?>
                        <!-- Looping das camisas da temporada atual -->
                        <?php while ( $camisas->have_posts() ) : $camisas->the_post(); ?>
                        <div class="col-4 p-1 shop align-middle text-center">
                            <img src="<?php echo get_the_post_thumbnail_url(); ?>">
                            <h4 class="text-warning p-2"><?php the_title(); ?></h4>
                            <a href="<?php echo get_post_meta( get_the_ID(), '_url', true ); ?>" target="_blank" class="btn btn-primary btn-lg">COMPRAR</a>
                        </div>
                    <?php endwhile; ?>
                    <?php wp_reset_postdata(); ?>    
            </div>
        </div>
    </div>
<?php
//Incorporando a página footer.php
//(conteúdos do rodpé da homepage)
get_footer();
