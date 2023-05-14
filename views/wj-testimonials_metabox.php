<?php
    $occupation = get_post_meta( $post->ID, 'wj_testimonials_occupation', true );
    $company = get_post_meta( $post->ID, 'wj_testimonials_company', true );
    $url = get_post_meta( $post->ID, 'wj_testimonials_user_url', true );
?>
<table class="form-table wj-testimonials-metabox">
<input type="hidden" name="mv_slider_nonce" value="<?php echo wp_create_nonce( 'wj_testimonials_nonce' ) ?>">
    <tr>
        <th>
            <label for="wj_testimonials_occupation"><?php esc_html_e( 'User occupation', 'wj-testimonials' ); ?></label>
        </th>
        <td>
            <input 
                type="text" 
                name="wj_testimonials_occupation" 
                id="wj_testimonials_occupation" 
                class="regular-text occupation"
                value="<?php echo ! empty( $occupation ) ? esc_attr( $occupation ) : '' ?>"
            >
        </td>
    </tr>
    <tr>
        <th>
            <label for="wj_testimonials_company"><?php esc_html_e( 'User company', 'wj-testimonials' ); ?></label>
        </th>
        <td>
            <input 
                type="text" 
                name="wj_testimonials_company" 
                id="wj_testimonials_company" 
                class="regular-text company"
                value="<?php echo ! empty( $company ) ? esc_attr( $company ) : '' ?>"
            >
        </td>
    </tr>
    <tr>
        <th>
            <label for="wj_testimonials_user_url"><?php esc_html_e( 'User URL', 'wj-testimonials' ); ?></label>
        </th>
        <td>
            <input 
                type="url" 
                name="wj_testimonials_user_url" 
                id="wj_testimonials_user_url" 
                class="regular-text user-url"
                value="<?php echo ! empty( $url ) ? esc_attr( $url ) : '' ?>"
            >
        </td>
    </tr> 
</table>