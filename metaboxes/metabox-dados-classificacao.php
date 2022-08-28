<?php
//Registrando Meta Box para dados de classificação
add_action( 'add_meta_boxes', function() {
    add_meta_box( 'wpdocs-id', 'Dados de Classificação', 'standings_fields', 'times', 'normal' );
} );
 
//Função de callback da metabox
function standings_fields( $post ) {
    $jogos = get_post_meta( $post->ID, '_jogos', true );
    $vitorias = get_post_meta( $post->ID, '_vitorias', true );
    $empates = get_post_meta( $post->ID, '_empates', true );
    $derrotas = get_post_meta( $post->ID, '_derrotas', true );
    $pontuacao = get_post_meta( $post->ID, '_pontuacao', true );
    ?>
    <table>
        <tr>
            <td>Jogos</td>
            <td><input type="number" name="_jogos" value="<?php echo esc_attr( $jogos ) ?>"></td>
        </tr>
        <tr>
            <td>Vitórias</td>
            <td><input type="number" name="_vitorias" value="<?php echo esc_attr( $vitorias ) ?>"></td>
        </tr>
        <tr>
            <td>Empates</td>
            <td><input type="number" name="_empates" value="<?php echo esc_attr( $empates ) ?>"></td>
        </tr>
        <tr>
            <td>Derrotas</td>
            <td><input type="number" name="_derrotas" value="<?php echo esc_attr( $derrotas ) ?>"></td>
        </tr>
        <tr>
            <td>Pontuação</td>
            <td><?php echo esc_attr( $pontuacao ) ?></td>
        </tr>
    </table>
    <?php
}
 
//Hook para salvamento dos campos ao salvar o post
add_action( 'save_post', function( $post_id ) {
    if ( isset( $_POST['_jogos'] ) )
        update_post_meta( $post_id, '_jogos', $_POST['_jogos'] );
    if ( isset( $_POST['_vitorias'] ) )
        update_post_meta( $post_id, '_vitorias', $_POST['_vitorias'] );
    if ( isset( $_POST['_empates'] ) )
        update_post_meta( $post_id, '_empates', $_POST['_empates'] );
    if ( isset( $_POST['_derrotas'] ) )
        update_post_meta( $post_id, '_derrotas', $_POST['_derrotas'] );
    
    //Atualiza a quantidade de pontos de acordo com o resultado de partidas
    $pontuacao = ($_POST['_vitorias']*3) + $_POST['_empates'];
    update_post_meta( $post_id, '_pontuacao', $pontuacao );
} );