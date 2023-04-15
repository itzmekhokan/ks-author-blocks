<?php
global $post;

if ( ! isset( $post->post_author ) || ! $post->post_author ) return;

?>

<p class="author-description"><?php esc_textarea(the_author_meta( 'description', $post->post_author ) ); // Displays the author description added in Biographical Info ?></p>