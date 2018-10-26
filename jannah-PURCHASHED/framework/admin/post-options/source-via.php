<?php

	jannah_theme_option(
		array(
			'title' => esc_html__( 'Source', 'jannah' ),
			'type'  => 'header',
		));
	?>

	<div class="option-item source-via-options">

		<p><?php esc_html_e( 'These links will appear at the end of the article in the Source section.', 'jannah' ) ?></p>

		<input id="source_name" type="text" size="56" name="source_name" placeholder="<?php esc_html_e( 'Source', 'jannah' ) ?>" value="" />
		<input id="source_link" type="text" size="56" name="source_link" placeholder="<?php esc_html_e( 'Link', 'jannah' ) ?>" value="" />
		<input id="add_source_button"  class="button" type="button" value="<?php esc_html_e( 'Add', 'jannah' ) ?>" />

		<?php
			jannah_theme_option(
				array(
					'text' => esc_html__( 'Source name is required.', 'jannah' ),
					'id'   => 'add-source-error',
					'type' => 'error',
				));
		?>

		<div class="clear"></div>
		<ul id="sources-list">
			<?php

				$sources = jannah_get_postdata( 'tie_source' );
				$sources_count = 0;

				if( ! empty( $sources ) && is_array( $sources )){

					foreach ( $sources as $single_source ){

						$sources_count++; ?>

						<li class="parent-item">
							<div class="tie-block-head">

								<?php
									if( ! empty( $single_source['url'] ) ){ ?>
										<a href="<?php echo esc_url( $single_source['url'] ) ?>" target="_blank"><?php echo esc_html( $single_source['text'] ) ?></a>
										<input name="tie_source[<?php echo esc_attr( $sources_count ) ?>][url]"  type="hidden" value="<?php echo esc_attr( $single_source['url']  ) ?>" />
										<?php
									}
									else{
										echo esc_html( $single_source['text'] );
									}
								?>

								<input name="tie_source[<?php echo esc_attr( $sources_count ) ?>][text]" type="hidden" value="<?php echo esc_attr( $single_source['text'] ) ?>" />
								<a class="del-item dashicons dashicons-trash"></a>
							</div>
						</li>
						<?php
					}
				}
			?>
		</ul>

		<script>
			var source_next = <?php echo esc_js( $sources_count+1 ); ?>;

			jQuery(function(){
				jQuery( '#sources-list' ).sortable({placeholder: 'tie-state-highlight'});
			});
		</script>

	</div>



<?php

	jannah_theme_option(
		array(
			'title' => esc_html__( 'Via', 'jannah' ),
			'type'  => 'header',
		));
	?>

	<div class="option-item source-via-options">

		<p><?php esc_html_e( 'These links will appear at the end of the article in the Via section.', 'jannah' ) ?></p>

		<input id="via_name" type="text" size="56" name="via_name" placeholder="<?php esc_html_e( 'Via', 'jannah' ) ?>" value="" />
		<input id="via_link" type="text" size="56" name="via_link" placeholder="<?php esc_html_e( 'Link', 'jannah' ) ?>" value="" />
		<input id="add_via_button"  class="button" type="button" value="<?php esc_html_e( 'Add', 'jannah' ) ?>" />

		<?php
			jannah_theme_option(
				array(
					'text' => esc_html__( 'Via name is required.', 'jannah' ),
					'id'   => 'add-via-error',
					'type' => 'error',
				));
		?>

		<div class="clear"></div>
		<ul id="via-list">
			<?php

				$via = jannah_get_postdata( 'tie_via' );
				$via_count = 0;

				if( ! empty( $via ) && is_array( $via )){
					foreach ( $via as $single_via ){
						$via_count++; ?>

						<li class="parent-item">
							<div class="tie-block-head">

								<?php
									if( ! empty( $single_via['url'] ) ){ ?>
										<a href="<?php echo esc_url( $single_via['url'] ) ?>" target="_blank"><?php echo esc_html( $single_via['text'] ) ?></a>
										<input name="tie_via[<?php echo esc_attr( $via_count ) ?>][url]"  type="hidden" value="<?php echo esc_attr( $single_via['url']  ) ?>" />
										<?php
									}
									else{
										echo esc_html( $single_via['text'] );
									}
								?>

								<input name="tie_via[<?php echo esc_attr( $via_count ) ?>][text]" type="hidden" value="<?php echo esc_attr( $single_via['text'] ) ?>" />
								<a class="del-item dashicons dashicons-trash"></a>
							</div>
						</li>
						<?php
					}
				}
			?>
		</ul>

		<script>
			var via_next = <?php echo esc_js( $via_count+1 ); ?>;

			jQuery(function(){
				jQuery( '#via-list' ).sortable({placeholder: 'tie-state-highlight'});
			});
		</script>

	</div>
