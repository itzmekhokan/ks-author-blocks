<?php
global $post;

if ( ! isset( $post->post_author ) || ! $post->post_author ) return;

?>
<div class="author-box">
    <div class="author-img"><?php echo get_avatar( get_the_author_meta( 'user_email', $post->post_author ), '100' ); // Display the author gravatar image with the size of 100 ?></div>
    <h3 class="author-name"><?php esc_html( the_author_meta( 'display_name', $post->post_author ) ); // Displays the author name of the posts ?></h3>
    <p class="author-description"><?php esc_textarea(the_author_meta( 'description', $post->post_author ) ); // Displays the author description added in Biographical Info ?></p>
</div>
