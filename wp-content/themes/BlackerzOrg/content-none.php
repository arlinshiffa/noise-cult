<?php
/**
 * The template for displaying a "No posts found" message
 *
 */
?>

	<header class="post-entry-header">
		<h2 class="entry-title"><?php esc_html_e( 'Nothing Found', 'bitz' ); ?></h2>
	</header>

	<div class="entry-content">
	<div class="row-inner">
		<?php if ( is_search() ) : ?>
		
		<p><?php 
		printf( esc_html_x( 'Sorry, but nothing matched your search terms. Please try again with some different keywords. %1$s Type some text and hit enter.', '%1$s inserts line break', 'bitz' ), '<br/>' );
		?></p>
		<?php get_search_form(); ?>

		<?php else : ?>

		<p class="no-posts"><?php
		printf( esc_html_x( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help. %1$s Type some text and hit enter.', '%1$s inserts line break', 'bitz' ), '<br/>' );
		?></p>
		<?php get_search_form(); ?>

		<?php endif; ?>
	</div>	
	</div>
