<?php
//Registrando Meta Box para dados da partida
add_action( 'add_meta_boxes', function() {
    add_meta_box( 'partidas-id', 'Dados da Partida', 'matches_fields', 'partidas', 'normal' );
} );
 
//Função de callback da metabox
function matches_fields( $post ) {
    $data_partida = get_post_meta( $post->ID, '_data_partida', true );
    $hora_partida = get_post_meta( $post->ID, '_hora_partida', true );
    $local_partida = get_post_meta( $post->ID, '_local_partida', true );
    $campeonato_partida = get_post_meta( $post->ID, '_campeonato_partida', true );
    $fase_campeonato_partida = get_post_meta( $post->ID, '_fase_campeonato_partida', true );
    ?>
    <table>
        <tr>
            <td>Data da Partida</td>
            <td><input type="date" name="_data_partida" value="<?php echo esc_attr( $data_partida ) ?>"></td>
        </tr>
        <tr>
            <td>Hora da Partida</td>
            <td><input type="time" name="_hora_partida" value="<?php echo esc_attr( $hora_partida ) ?>"></td>
        </tr>
        <tr>
            <td>Local da Partida</td>
            <td><input type="text" name="_local_partida" value="<?php echo esc_attr( $local_partida ) ?>"></td>
        </tr>
        <tr>
            <td>Campeonato</td>
            <td><input type="text" name="_campeonato_partida" value="<?php echo esc_attr( $campeonato_partida ) ?>"></td>
        </tr>
        <tr>
            <td>Fase do Campeonato</td>
            <td><input type="text" name="_fase_campeonato_partida" value="<?php echo esc_attr( $fase_campeonato_partida ) ?>"></td>
        </tr>
    </table>
    <?php
}
 
//Hook para salvamento dos campos ao salvar o post
add_action( 'save_post', function( $post_id ) {
    if ( isset( $_POST['_data_partida'] ) )
        update_post_meta( $post_id, '_data_partida', $_POST['_data_partida'] );
    if ( isset( $_POST['_hora_partida'] ) )
        update_post_meta( $post_id, '_hora_partida', $_POST['_hora_partida'] );
    if ( isset( $_POST['_local_partida'] ) )
        update_post_meta( $post_id, '_local_partida', $_POST['_local_partida'] );
    if ( isset( $_POST['_fase_campeonato_partida'] ) )
        update_post_meta( $post_id, '_fase_campeonato_partida', $_POST['_fase_campeonato_partida'] );
    if ( isset( $_POST['_campeonato_partida'] ) )
        update_post_meta( $post_id, '_campeonato_partida', $_POST['_campeonato_partida'] );
} );