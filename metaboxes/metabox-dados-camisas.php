<?php
//Registrando Meta Box para dados das camisas
add_action( 'add_meta_boxes', function() {
    add_meta_box( 'camisas-id', 'Dados da Camisa', 'shirts_fields', 'camisas', 'normal' );
} );
 
//Função de callback da metabox
function shirts_fields( $post ) {
    $url = get_post_meta( $post->ID, '_url', true );
    ?>
    <table>
        <tr>
            <td>Link da Loja</td>
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