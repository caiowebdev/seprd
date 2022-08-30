<?php
//Registrando Meta Box para dados das parceiros
add_action( 'add_meta_boxes', function() {
    add_meta_box( 'parceiros-id', 'Dados do Parceiro', 'partners_fields', 'parceiros', 'normal' );
} );
 
//Função de callback da metabox
function partners_fields( $post ) {
    $url = get_post_meta( $post->ID, '_url', true );
    ?>
    <table>
        <tr>
            <td>Site do Parceiro</td>
            <td><input type="text" name="_url" value="<?php echo esc_attr( $url ) ?>"></td>
        </tr>
    </table>
    <?php
}
 
//Hook para salvamento dos campos ao salvar o post
add_action( 'save_post', function( $post_id ) {
    if ( isset( $_POST['_url'] ) )
        update_post_meta( $post_id, '_url', $_POST['_url'] );
} );