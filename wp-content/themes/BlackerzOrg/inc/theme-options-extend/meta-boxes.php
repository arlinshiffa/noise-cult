<?php
/*	
*	---------------------------------------------------------------------
*	MNKY Custom meta boxes
*	--------------------------------------------------------------------- 
*/


add_action( 'admin_init', 'mnky_custom_meta_boxes' );

function mnky_custom_meta_boxes() {
	
	$mnky_meta_page = array(
		'id'          => 'mnky_page_options',
		'title'       => esc_html__( 'Page Options', 'bitz' ),
		'desc'        => '',
		'pages'       => array( 'page'),
		'context'     => 'normal',
		'priority'    => 'high',
		'fields'      => array(
			 array(
				'id'          => 'custom_header',
				'label'       => esc_html__( 'Custom header', 'bitz' ),
				'desc'        => esc_html__( 'Leave blank for default header.', 'bitz' ),
				'std'         => '',
				'type'        => 'custom-post-type-select',
				'post_type'   => 'custom_headers',
			),
			array(
				'label'       => esc_html__( 'Custom theme accent color', 'bitz' ),
				'id'          => 'custom_accent_color',
				'desc'        => esc_html__( 'Set different accent color for this page. Leave blank for default color.', 'bitz' ),
				'std'         => '',
				'type'        => 'colorpicker',
			),
			array(
				'id'          => 'custom_layout_style',
				'label'       => esc_html__( 'Layout style', 'bitz' ),
				'desc'        => sprintf (esc_html_x( '1. Default layout %1$s 2. Full width layout %1$s 3. Boxed layout', '%1$s stands for line break' ,'bitz' ), '<br/>'),
				'std'         => '',
				'type'        => 'radio-image',
				'section'     => 'general',
			),
			array(
				'id'          => 'body_background',
				'label'       => esc_html__( 'Body background', 'bitz' ),
				'desc'        => esc_html__( 'Choose body background for boxed layout.', 'bitz' ),
				'std'         => '',
				'type'        => 'background',
				'section'     => 'general',
				'condition'   => 'custom_layout_style:is(boxed)',
			),			 
			array(
				'id'          => 'content_width',
				'label'       => esc_html__( 'Content width', 'bitz' ),
				'desc'        => esc_html__( 'This setting will apply selected layout width to your website.', 'bitz' ),
				'std'         => '',
				'type'        => 'radio',
				'section'     => 'general',
				'choices'     => array( 
				  array(
					'value'       => '',
					'label'       => esc_html__( 'Default', 'bitz' ),
					'src'         => ''
				  ),				  
				  array(
					'value'       => '980',
					'label'       => '980px',
					'src'         => ''
				  ),
				  array(
					'value'       => '1100',
					'label'       => '1100px',
					'src'         => ''
				  ),
				  array(
					'value'       => '1200',
					'label'       => '1200px',
					'src'         => ''
				  ),
				  array(
					'value'       => '1400',
					'label'       => '1400px',
					'src'         => ''
				  )
				)
			),				 
			array(
				'label'       => esc_html__( 'Page title', 'bitz' ),
				'id'          => 'page_title',
				'type'        => 'on-off',
				'desc'        => esc_html__( 'Display or hide page title.', 'bitz' ),
				'std'         => 'on'
			),      
			array(
				'label'       => esc_html__( 'Pre-content area', 'bitz' ),
				'id'          => 'pre_content_activation',
				'type'        => 'on-off',
				'desc'        => esc_html__( 'Activates additional area before page title and main content.', 'bitz' ),
				'std'         => 'off'
			 ),
			array(
				'label'       => esc_html__( 'Height (optional)', 'bitz' ),
				'id'          => 'pre_content_height',
				'type'        => 'text',
				'desc'        => sprintf (esc_html_x( 'Pre-content area height. Example: %s', '%s stands for example value. Do not delete it.' ,'bitz' ), '<code>250px</code>'),
				'condition'   => 'pre_content_activation:is(on)',
				'class'       => 'child-options child-first'
			),
			array(
				'label'       => esc_html__( 'Responsive height (optional)', 'bitz' ),
				'id'          => 'pre_content_responsive_height',
				'type'        => 'on-off',
				'desc'        => esc_html__( 'Enables auto height in responsive mode.', 'bitz' ),
				'condition'   => 'pre_content_activation:is(on)',
				'std'         => 'off',
				'class'       => 'child-options'
			),
			array(
				'label'       => esc_html__( 'Max width (optional)', 'bitz' ),
				'id'          => 'pre_content_width',
				'type'        => 'text',
				'desc'        => sprintf (esc_html_x( 'Pre-content area max width. Example: %s', '%s stands for example value. Do not delete it.' ,'bitz' ), '<code>1200px</code>'),
				'condition'   => 'pre_content_activation:is(on)',
				'class'       => 'child-options'
			),
			array(
				'id'          => 'pre_content_bg',
				'label'       => esc_html__( 'Background', 'bitz' ),
				'desc'        => esc_html__( 'Set custom background color or image.', 'bitz' ),
				'type'        => 'background',
				'rows'        => '',
				'condition'   => 'pre_content_activation:is(on)',
				'class'       => 'child-options'
			),
			array(
				'label'       => esc_html__( 'Custom HTML', 'bitz' ),
				'id'          => 'pre_content_html',
				'type'        => 'textarea',
				'rows'        => '4',
				'desc'        => esc_html__( 'Insert any custom code you wish. Shortcodes are allowed.', 'bitz' ),
				'condition'   => 'pre_content_activation:is(on)',
				'class'       => 'child-options child-last'
			)
		)
	);
	
	$mnky_meta_post = array(
		'id'          => 'mnky_post_options',
		'title'       => esc_html__( 'Post Options', 'bitz' ),
		'desc'        => '',
		'pages'       => array( 'post' ),
		'context'     => 'normal',
		'priority'    => 'core',
		'fields'      => array(
			array(
				'id'          => 'post_lead_text',
				'label'       => esc_html__( 'Lead paragraph', 'bitz' ),
				'desc'        => esc_html__( 'Optional opening text displayed below the title', 'bitz' ),
				'std'         => '',
				'type'        => 'textarea',
				'rows'        => '4'
			),
		    array(
				'id'          => 'custom_header',
				'label'       => esc_html__( 'Custom header', 'bitz' ),
				'desc'        => esc_html__( 'Leave blank for default header.', 'bitz' ),
				'std'         => '',
				'type'        => 'custom-post-type-select',
				'post_type'   => 'custom_headers',
			),
			array(
				'id'          => 'top_post_advertisement',
				'label'       => esc_html__( 'Advertisement before content', 'bitz' ),
				'desc'        => esc_html__( 'Leave blank for no advertisement.', 'bitz' ),
				'std'         => '',
				'type'        => 'custom-post-type-select',
				'post_type'   => 'ads',
			),
			array(
				'id'          => 'bottom_post_advertisement',
				'label'       => esc_html__( 'Advertisement after content', 'bitz' ),
				'desc'        => esc_html__( 'Leave blank for no advertisement.', 'bitz' ),
				'std'         => '',
				'type'        => 'custom-post-type-select',
				'post_type'   => 'ads',
			),
			array(
				'label'       => esc_html__( 'Custom theme accent color', 'bitz' ),
				'id'          => 'custom_accent_color',
				'desc'        => esc_html__( 'Set different accent color for this page. Leave blank for default color.', 'bitz' ),
				'std'         => '',
				'type'        => 'colorpicker',
			),
			array(
				'id'          => 'custom_layout_style',
				'label'       => esc_html__( 'Layout style', 'bitz' ),
				'desc'        => sprintf (esc_html_x( '1. Default layout %1$s 2. Full width layout %1$s3. Boxed layout', '%1$s stands for line break' ,'bitz' ), '<br/>'),
				'std'         => '',
				'type'        => 'radio-image',
				'section'     => 'general',
			),
			array(
				'id'          => 'body_background',
				'label'       => esc_html__( 'Body background', 'bitz' ),
				'desc'        => esc_html__( 'Choose body background for boxed layout.', 'bitz' ), 
				'std'         => '',
				'type'        => 'background',
				'section'     => 'general',
				'condition'   => 'custom_layout_style:is(boxed)',
			),			 
			array(
				'id'          => 'content_width',
				'label'       => esc_html__( 'Content width', 'bitz' ),
				'desc'        => esc_html__( 'This setting will apply selected layout width to your website.', 'bitz' ), 
				'std'         => '',
				'type'        => 'radio',
				'section'     => 'general',
				'choices'     => array( 
				  array(
					'value'       => '',
					'label'       => esc_html__( 'Default', 'bitz' ),
					'src'         => ''
				  ),				  
				  array(
					'value'       => '980',
					'label'       => '980px',
					'src'         => ''
				  ),
				  array(
					'value'       => '1100',
					'label'       => '1100px',
					'src'         => ''
				  ),
				  array(
					'value'       => '1200',
					'label'       => '1200px',
					'src'         => ''
				  ),
				  array(
					'value'       => '1400',
					'label'       => '1400px',
					'src'         => ''
				  )
				)
			),			 
			array(
				'label'       => esc_html__( 'Post header/title', 'bitz' ),
				'id'          => 'single_post_header',
				'type'        => 'on-off',
				'desc'        => esc_html__( 'Enable default header/title area for this post.', 'bitz' ),
				'std'         => 'on'
			), 
			array(
				'label'       => esc_html__( 'Featured image after title', 'bitz' ),
				'id'          => 'content_featured_img',
				'type'        => 'on-off',
				'desc'        => esc_html__( 'Do you want to display featured image after title in content?', 'bitz' ),
				'std'         => 'on'
			), 
			array(
				'id'          => 'post_template',
				'label'       => esc_html__( 'Template', 'bitz' ),
				'desc'        => '',
				'std'         => '',
				'type'        => 'radio-image',
				'desc'        => sprintf (esc_html_x( '1. Default template %1$s Selected in Appearance / Theme Options / Single Post %1$s%1$s 2. Full width %1$s 3. Right sidebar %1$s 4. Left sidebar', '%1$s stands for line break' ,'bitz' ), '<br/>')
			),
			array(
				'id'          => 'post_header_style',
				'label'       => esc_html__( 'Header style', 'bitz' ),
				'desc'        => sprintf (esc_html_x( '1. Default template %1$s Selected in Appearance / Theme Options / Single Post %1$s%1$s 2. Default style %1$s 3. Default style + featured image in pre-content area by default %1$s 4. Content and sidebar slide up + featured image in pre-content area by default %1$s 5. Content slide up (sidebar remains static) + featured image in pre-content area by default %1$s%1$s TO CUSTOMIZE ACTIVATE PRE-CONTENT AREA', '%1$s stands for line break' ,'bitz' ), '<br/>'),
				'std'         => 'opt_default',
				'type'        => 'radio-image'
			),			
			array(
				'label'       => esc_html__( 'Pre-content area', 'bitz' ),
				'id'          => 'pre_content_activation',
				'type'        => 'on-off',
				'desc'        => esc_html__( 'Activates additional area before page title and main content.', 'bitz' ),
				'std'         => 'off'
			),
			array(
				'label'       => esc_html__( 'Height (optional)', 'bitz' ),
				'id'          => 'pre_content_height',
				'type'        => 'text',
				'desc'        => sprintf (esc_html_x( 'Pre-content area height. Example: %s', '%s stands for example value. Do not delete it.' ,'bitz' ), '<code>250px</code>'),
				'condition'   => 'pre_content_activation:is(on)',
				'class'       => 'child-options child-first'
			),
			array(
				'label'       => esc_html__( 'Responsive height (optional)', 'bitz' ),
				'id'          => 'pre_content_responsive_height',
				'type'        => 'on-off',
				'desc'        => esc_html__( 'Enables auto height in responsive mode.', 'bitz' ),
				'condition'   => 'pre_content_activation:is(on)',
				'std'         => 'off',
				'class'       => 'child-options'
			),
			array(
				'label'       => esc_html__( 'Max width (optional)', 'bitz' ),
				'id'          => 'pre_content_width',
				'type'        => 'text',
				'desc'        => sprintf (esc_html_x( 'Pre-content area max width. Example: %s', '%s stands for example value. Do not delete it.' ,'bitz' ), '<code>1200px</code>'),
				'condition'   => 'pre_content_activation:is(on)',
				'class'       => 'child-options'
			),
			array(
				'id'          => 'pre_content_bg',
				'label'       => esc_html__( 'Background', 'bitz' ),
				'desc'        => esc_html__( 'Set custom background color or image.', 'bitz' ),
				'type'        => 'background',
				'rows'        => '',
				'condition'   => 'pre_content_activation:is(on)',
				'class'       => 'child-options'
			),
			array(
				'label'       => esc_html__( 'Custom HTML', 'bitz' ),
				'id'          => 'pre_content_html',
				'type'        => 'textarea',
				'rows'        => '4',
				'desc'        => esc_html__( 'Insert any custom code you wish. Shortcodes are allowed.', 'bitz' ),
				'condition'   => 'pre_content_activation:is(on)',
				'class'       => 'child-options child-last'
			),			
			array(
				'label'       => esc_html__( 'Set different width for paragraphs', 'bitz' ),
				'id'          => 'post_width',
				'type'        => 'text',
				'std'         => '',
				'desc'        => esc_html__( 'Specify maximum width for text paragraphs without affecting other content , e.g., images.', 'bitz' ),
			),
			array(
				'label'       => esc_html__( 'Post labels', 'bitz' ),
				'id'          => 'post_labels',
				'type'        => 'list_item',
				'std'         => '',
				'desc'        => esc_html__( 'Add some labels to the post, e.g., "Sponsored Content"', 'bitz' ),
				'settings'    => array( 
				array(
					'id'          => 'post_label_text',
					'label'       => esc_html__( 'Label text', 'bitz' ),
					'desc'        => '',
					'std'         => '',
					'type'        => 'text',
					'operator'    => 'and'
				  ),
				array(
					'id'          => 'post_label_color',
					'label'       => esc_html__( 'Choose label color', 'bitz' ),
					'desc'        => '',
					'std'         => '',
					'type'        => 'colorpicker',
					'operator'    => 'and'
				  )
				)

			)
		)
	
	);
	
	$mnky_meta_post_views = array(
		'id'          => 'mnky_post_views',
		'title'       => esc_html__( 'Edit Post Views', 'bitz' ),
		'desc'        => '',
		'pages'       => array( 'post' ),
		'context'     => 'side',
		'priority'    => 'core',
		'fields'      => array(			
			array(
				'label'       => '',
				'id'          => 'mnky_post_views_count',
				'type'        => 'text',
				'std'         => '',
				'desc'        => '',
			)
		)
	);
	
	$mnky_meta_featured_image_caption = array(
		'id'          => 'mnky_featured_image_caption',
		'title'       => esc_html__( 'Featured image caption', 'bitz' ),
		'desc'        => '',
		'pages'       => array( 'post' ),
		'context'     => 'side',
		'priority'    => 'core',
		'fields'      => array(			
			array(
				'label'       => '',
				'id'          => 'mnky_featured_image_caption_text',
				'type'        => 'text',
				'std'         => '',
				'desc'        => 'Optional caption text for the featured image. Simple HTML allowed.',
			)
		)
	);
	
	$mnky_meta_post_reviews = array(
		'id'          => 'mnky_post_reviews',
		'title'       => esc_html__( 'Product Review', 'bitz' ),
		'desc'        => '',
		'pages'       => array( 'post' ),
		'context'     => 'normal',
		'priority'    => 'core',
		'fields'      => array(		
			array(
			'label'       => esc_html__( 'Enable Reviews', 'bitz' ),
			'id'          => 'enable_review',
			'type'        => 'on-off',
			'desc'        => esc_html__( 'Add review functionality to this post.', 'bitz' ),
			'std'         => 'off'	
			),
			array(
				'label'       => esc_html__( 'Review position', 'bitz'),
				'id'          => 'review_position',
				'type'        => 'select',
				'choices'     => array( 
					array(
						'value'       => 'top',
						'label'       => esc_html__( 'Top of the post', 'bitz' ),
						'src'         => ''
					),
					array(
						'value'       => 'bottom',
						'label'       => esc_html__( 'Bottom of the post', 'bitz' ),
						'src'         => ''
					)
				),	
				'std'         => '',
				'condition'   => 'enable_review:is(on)',
				'desc'        => esc_html__( 'Choose where review will appear', 'bitz' )
			),
			array(
				'label'       => esc_html__( 'Review title', 'bitz'),
				'id'          => 'review_title',
				'type'        => 'text',
				'std'         => '',
				'condition'   => 'enable_review:is(on)',
				'desc'        => esc_html__( 'Name this review', 'bitz' )
			),
			array(
				'label'       => esc_html__( 'Overall rating', 'bitz'),
				'id'          => 'review_overall_rating',
				'type'        => 'numeric-slider',
				'std'         => '5',
				'min_max_step'=> '0,10,0.1',
				'condition'   => 'enable_review:is(on)',
				'desc'        => esc_html__( 'Give overall rating from 0 to 10 to this product.', 'bitz' )
			),
			array(
				'label'       => esc_html__( 'Use review breakdown', 'bitz' ),
				'id'          => 'review_breakdown',
				'type'        => 'on-off',
				'condition'   => 'enable_review:is(on)',
				'desc'        => esc_html__( 'If this option is active, overall review rating will be calculated from the ratings in the list.', 'bitz' ),
				'std'         => 'off'
			), 	
			array(
				'label'       => esc_html__( 'Review ratings breakdown', 'bitz' ),
				'id'          => 'review_ratings',
				'type'        => 'list_item',
				'std'         => '',
				'desc'        => esc_html__( 'Rate product from various aspects, e.g., "Design, Features, Performance"', 'bitz' ),
				'condition'   => 'enable_review:is(on),review_breakdown:is(on)',
				'class'       => 'child-options child-first child-last',	
				'settings'    => array( 
				array(
					'id'          => 'review_aspect_name',
					'label'       => esc_html__( 'Name', 'bitz' ),
					'std'         => '',
					'type'        => 'text',
					'desc'        => esc_html__( 'Name this review aspect,  e.g., "Design"', 'bitz' ),
					'operator'    => 'and'
				  ),
				array(
					'id'          => 'review_aspect_rating',
					'label'       => esc_html__( 'Rating', 'bitz' ),
					'desc'        => '',
					'type'        => 'numeric-slider',
					'std'         => '5',
					'min_max_step'=> '0,10,0.1',
					'operator'    => 'and'
				  )
				)
			),
			array(
				'label'       => esc_html__( 'Good things', 'bitz' ),
				'id'          => 'review_good_title',
				'type'        => 'text',
				'std'         => '',
				'condition'   => 'enable_review:is(on)',
				'desc'        => esc_html__( 'Add title for describing good things in this product, e.g, "The Good"', 'bitz' )
			),
			array(
				'label'       => '',
				'id'          => 'review_good',
				'type'        => 'textarea',
				'std'         => '',
				'condition'   => 'enable_review:is(on)',
				'desc'        => esc_html__( 'Describe what was good in this product', 'bitz' )
			),
			array(
				'label'       => esc_html__( 'Bad things', 'bitz' ),
				'id'          => 'review_bad_title',
				'type'        => 'text',
				'std'         => '',
				'condition'   => 'enable_review:is(on)',
				'desc'        => esc_html__( 'Add title for describing bad things in this product, e.g, "The Bad"', 'bitz' )
			),
			array(
				'label'       => '',
				'id'          => 'review_bad',
				'type'        => 'textarea',
				'std'         => '',
				'condition'   => 'enable_review:is(on)',
				'desc'        => esc_html__( 'Describe what was bad in this product', 'bitz' )
			),
			array(
				'label'       => esc_html__( 'Bottom line', 'bitz' ),
				'id'          => 'review_bottomline_title',
				'type'        => 'text',
				'std'         => '',
				'condition'   => 'enable_review:is(on)',
				'desc'        => esc_html__( 'Add title for describing the bottom line of this product, e.g, "The Bottom Line"', 'bitz' )
			),
			array(
				'label'       => '',
				'id'          => 'review_bottomline',
				'type'        => 'textarea',
				'std'         => '',
				'condition'   => 'enable_review:is(on)',
				'desc'        => esc_html__( 'So what is the bottom line for this product?', 'bitz' )
			),
			array(
				'label'       => esc_html__( 'Custom content', 'bitz' ),
				'id'          => 'review_custom_field',
				'type'        => 'textarea',
				'std'         => '',
				'condition'   => 'enable_review:is(on)',
				'desc'        => esc_html__( 'Add any custom content here, shortcodes are allowed', 'bitz' )
			)
		)
	);
	
	$mnky_meta_ads = array(
		'id'          => 'mnky_ads_options',
		'title'       => esc_html__( 'Ad Options', 'bitz' ),
		'desc'        => '',
		'pages'       => array( 'ads' ),
		'context'     => 'normal',
		'priority'    => 'high',
		'fields'      => array(			
			array(
				'label'       => esc_html__( 'URL', 'bitz' ),
				'id'          => 'ad_url',
				'type'        => 'text',
				'desc'        => sprintf (esc_html_x( 'Include %1$s %2$s or %3$s', '%1$s, %2$s, %3$s stand for protocol types.' ,'bitz' ), '<code>http://</code>', '<code>https://</code>', '<code>//</code>')
			),
			array(
				'id'          => 'ad_url_target',
				'label'       => esc_html__( 'Target', 'bitz' ),
				'desc'        => '',
				'std'         => '',
				'type'        => 'select',
				'desc'        => esc_html__( 'The target attribute specifies how to open the link.', 'bitz' ),
				'choices'     => array( 
					array(
						'value'       => '_blank',
						'label'       => esc_html__( '_blank (opens in new window or tab)', 'bitz' ),
						'src'         => ''
					),
					array(
						'value'       => '_self',
						'label'       => esc_html__( '_self (opens in the same frame as it was clicked)', 'bitz' ),
						'src'         => ''
					)
				),	
				'operator'    => 'and',
				'condition'   => 'ad_url:not()'
			),			
			array(
				'id'          => 'ad_url_rel',
				'label'       => esc_html__( 'Use rel="nofollow"', 'bitz' ),
				'desc'        => '',
				'std'         => '',
				'type'        => 'select',
				'desc'        => sprintf( wp_kses_post( _x( 'Specifies the relationship between the current document and the linked document. %1$s <a href="%2$s">Should I use it?</a>', '%1$s stands for line break, %2$s stands for linked page.','bitz' ) ), '<br/>', esc_url( 'https://support.google.com/webmasters/answer/96569?hl=en' ) ),
				'choices'     => array( 
					array(
						'value'       => '',
						'label'       => esc_html__( 'No', 'bitz' ),
						'src'         => ''
					),
					array(
						'value'       => 'rel=nofollow',
						'label'       => esc_html__( 'Yes', 'bitz' ),
						'src'         => ''
					)
				),	
				'operator'    => 'and',
				'condition'   => 'ad_url:not()'
			),
			array(
				'label'       => esc_html__( 'Alternative text', 'bitz' ),
				'id'          => 'ad_alt_text',
				'type'        => 'text',
				'desc'        => esc_html__( 'Add text for alt attribute.', 'bitz' )
			),	
			array(
				'label'       => esc_html__( 'Advertisement block width', 'bitz' ),
				'id'          => 'ad_width',
				'type'        => 'text',
				'desc'        => sprintf (esc_html_x( 'Specify maximum ad block width, e.g. %s', '%s stands for example value, do not delete it.' ,'bitz' ), '<code>140px</code>')
			),			
			array(
				'label'       => esc_html__( 'Advertisement block height (optional)', 'bitz' ),
				'id'          => 'ad_height',
				'type'        => 'text',
				'desc'        => sprintf (esc_html_x( 'Specify maximum ad block height, e.g. %1$s %2$s Will cut off ad block, if value smaller than actual ad size used.', '%1$s stands for example value, %2$s stands for line break.' ,'bitz' ), '<code>440px</code>', '<br/>')
			),
			array(
				'label'       => esc_html__( 'Advertisement block position (optional)', 'bitz' ),
				'id'          => 'ad_position',
				'type'        => 'text',
				'desc'        => sprintf (esc_html_x( 'Specify ad block position using css margin: property. %1$s For example %2$s will center the ad inside.', '%1$s stands for line break, %2$s stands for example value.' ,'bitz' ), '<br/>', '<code>0 auto</code>')
			),
			array(
				'label'       => esc_html__( 'Advertisement block float (optional)', 'bitz' ),
				'id'          => 'ad_float',
				'type'        => 'text',
				'desc'        => sprintf (esc_html_x( 'Specify ad block float using css float: property. %1$s For example %2$s will float ad to the left side.', '%1$s stands for line break, %2$s stands for example value.' ,'bitz' ), '<br/>', '<code>left</code>')
			),
			array(
				'id'          => 'ad_image',
				'label'       => esc_html__( 'Advertisement Image', 'bitz' ),
				'desc'        => esc_html__( 'Choose advertisement image.', 'bitz' ),
				'std'         => '',
				'type'        => 'upload'
			),
			array(
				'label'       => esc_html__( 'Advertisement image width', 'bitz' ),
				'id'          => 'ad_image_width',
				'type'        => 'text',
				'desc'        => sprintf (esc_html_x( 'Specify width of ad image for the "width" html attribute, e.g. %s', '%s stands for example value, do not delete it.' ,'bitz' ), '<code>140</code>')
			),			
			array(
				'label'       => esc_html__( 'Advertisement image height', 'bitz' ),
				'id'          => 'ad_image_height',
				'type'        => 'text',
				'desc'        => sprintf (esc_html_x( 'Specify height of ad image for the "height" html attribute, e.g. %1$s %2$s It will not affect actual image display height.', '%1$s stands for example value, %2$s stands for line break.', 'bitz' ), '<code>400</code>', '<br/>')
			),
			array(
				'label'       => esc_html__( 'Responsive advertisement image', 'bitz' ),
				'id'          => 'responsive_ad',
				'type'        => 'on-off',
				'desc'        => esc_html__('Use different image for smaller screens', 'bitz' ),
				'std'         => 'off'
			), 
			array(
				'id'          => 'responsive_ad_image',
				'label'       => esc_html__( 'Advertisement Image', 'bitz' ),
				'desc'        => esc_html__( 'Choose advertisement image for screens below 979px (Tablet portrait) and below 1024px (Tablet landscape), if placed in header widget area.', 'bitz' ),
				'std'         => '',
				'type'        => 'upload',
				'condition'   => 'responsive_ad:is(on)',
				'class'       => 'child-options child-first'				
			),
			array(
				'label'       => esc_html__( 'Responsive advertisement image width', 'bitz' ),
				'id'          => 'responsive_ad_image_width',
				'type'        => 'text',
				'desc'        => sprintf (esc_html_x( 'Specify width of ad image for the "width" html attribute, e.g. %s', '%s stands for example value. Do not delete it.', 'bitz' ), '<code>140</code>'),
				'condition'   => 'responsive_ad:is(on)',
				'class'       => 'child-options'				
			),			
			array(
				'label'       => esc_html__( 'Responsive advertisement image height', 'bitz' ),
				'id'          => 'responsive_ad_image_height',
				'type'        => 'text',
				'desc'        => sprintf (esc_html_x( 'Specify height of ad image for the "height" html attribute, e.g. %1$s %2$s It will not affect actual image display height.', '%1$s stands for example value, %2$s stands for line break.', 'bitz' ), '<code>400</code>', '<br/>'),
				'condition'   => 'responsive_ad:is(on)',
				'class'       => 'child-options child-last'				
			),
			array(
				'label'       => esc_html__( 'Hide ad on mobiles', 'bitz' ),
				'id'          => 'hide_responsive_ad',
				'type'        => 'on-off',
				'desc'        =>  esc_html__( 'Hide advertisement on screens smaller than 767px (Mobile phones).', 'bitz' ),
				'std'         => 'off'
			), 
			array(
				'label'       => esc_html__( 'Label', 'bitz' ),
				'id'          => 'ad_note',
				'type'        => 'text',
				'desc'        => esc_html__( 'Optional label under advertisement, e.g. "Sponsored" or "Advertisement".', 'bitz' )
			),	
			array(
				'label'       => '',
				'id'          => 'ads_textblock',
				'type'        => 'textblock',
				'desc'        => '<div class="section-title">'. esc_html__( 'If you use Custom HTML, you can leave fields above empty.', 'bitz' ) .'</div>'
			),			
			array(
				'label'       => esc_html__( 'Custom HTML', 'bitz' ),
				'id'          => 'ad_html',
				'type'        => 'textarea',
				'rows'        => '14',
				'desc'        => esc_html__( 'Insert any custom code.', 'bitz' )
			)
		)
	);
	
	$mnky_meta_product = array(
		'id'          => 'mnky_product_options',
		'title'       => esc_html__( 'Page Options', 'bitz' ),
		'desc'        => '',
		'pages'       => 'product',
		'context'     => 'normal',
		'priority'    => 'high',
		'fields'      => array(
			array(
				'label'       => esc_html__( 'Custom theme accent color', 'bitz' ),
				'id'          => 'custom_accent_color',
				'desc'        => esc_html__( 'Set different accent color for this page. Leave blank for default color', 'bitz' ),
				'std'         => '',
				'type'        => 'colorpicker',
			 ),
			array(
				'label'       => esc_html__( 'Pre-content area', 'bitz' ),
				'id'          => 'pre_content_activation',
				'type'        => 'on-off',
				'desc'        => esc_html__( 'Activates additional area before page title and main content', 'bitz' ),
				'std'         => 'off'
			 ),
			array(
				'label'       => '',
				'id'          => 'bct_textblock',
				'type'        => 'textblock',
				'desc'        => '<div class="section-title">'. esc_html__( 'Pre-content area options', 'bitz' ) .'</div>',
				'condition'   => 'pre_content_activation:is(on)'
			),
			array(
				'label'       => esc_html__( 'Height (optional)', 'bitz' ),
				'id'          => 'pre_content_height',
				'type'        => 'text',
				'desc'        => sprintf (esc_html_x( 'Pre-content area height. Example: %s', '%s stands for example value. Do not delete it.' ,'bitz' ), '<code>250px</code>'),
				'condition'   => 'pre_content_activation:is(on)',
				'class'       => 'child-options child-first'
			),
			array(
				'label'       => esc_html__( 'Responsive height (optional)', 'bitz' ),
				'id'          => 'pre_content_responsive_height',
				'type'        => 'on-off',
				'desc'        => esc_html__( 'Enables auto height in responsive mode.', 'bitz' ),
				'condition'   => 'pre_content_activation:is(on)',
				'std'         => 'off',
				'class'       => 'child-options'
			),
			array(
				'label'       => esc_html__( 'Max width (optional)', 'bitz' ),
				'id'          => 'pre_content_width',
				'type'        => 'text',
				'desc'        => sprintf (esc_html_x( 'Pre-content area max width. Example: %s', '%s stands for example value. Do not delete it.' ,'bitz' ), '<code>1200px</code>'),
				'condition'   => 'pre_content_activation:is(on)',
				'class'       => 'child-options'
			),
			array(
				'id'          => 'pre_content_bg',
				'label'       => esc_html__( 'Background', 'bitz' ),
				'desc'        => 'Set custom background color or image',
				'type'        => 'background',
				'rows'        => '',
				'condition'   => 'pre_content_activation:is(on)',
				'class'       => 'child-options'
			),
			array(
				'label'       => esc_html__( 'Custom HTML', 'bitz' ),
				'id'          => 'pre_content_html',
				'type'        => 'textarea',
				'rows'        => '4',
				'desc'        => esc_html__( 'Insert any custom code you wish. Shortcodes are allowed', 'bitz' ),
				'condition'   => 'pre_content_activation:is(on)',
				'class'       => 'child-options child-last'
			)
		)
	);	
	
	
	$mnky_meta_headers = array(
		'id'          => 'mnky_headers_options',
		'title'       => esc_html__( 'Header Options', 'bitz' ),
		'desc'        => '',
		'pages'       => 'custom_headers',
		'context'     => 'normal',
		'priority'    => 'high',
		'fields'      => array(
			array(
				'id'          => 'default_header_tab',
				'label'       => esc_html__( 'General', 'bitz' ),
				'desc'        => '',
				'std'         => '',
				'type'        => 'tab',
				'condition'   => '',
				'operator'    => 'and'
			  ),
			array(
				'id'          => 'sticky_header',
				'label'       => esc_html__( 'Sticky header', 'bitz' ),
				'desc'        => esc_html__( 'Do you want a header to stick to top while you scroll?', 'bitz' ),
				'std'         => 'sticky_header_smart',
				'type'        => 'radio',
				'condition'   => '',
				'choices'     => array( 
				array(
					'value'       => 'sticky_header_smart',
					'label'       => esc_html__( 'Smart header (sticky only when scrolling up)', 'bitz' ),
					'src'         => ''
				  ),
				array(
					'value'       => 'sticky_header',
					'label'       => esc_html__( 'Always sticky header', 'bitz' ),
					'src'         => ''
				  ),
				array(
					'value'       => 'no_sticky',
					'label'       => esc_html__( 'Disable sticky header', 'bitz' ),
					'src'         => ''
				  )
				)
			  ),
			array(
				'id'          => 'header_style',
				'label'       => esc_html__( 'Header layout', 'bitz' ),
				'desc'        => sprintf (esc_html_x( 'Header layouts have following structure: %1$s%1$s %2$sDefault%3$s - Top bar/logo and header widget area/menu bar with widget area. %1$s%1$s %2$sMenu bar%3$s - Top bar/menu bar with logo and widget area. %1$s%1$s %2$sInverse default%3$s - Top bar/menu bar with widget area/logo and header widget area. %1$s%1$s %2$sCentred header%3$s - Top bar/centred logo and header widget area/menu bar with widget area. %1$s%1$s %2$sCentred header and menu%3$s - Top bar/centred logo and header widget area/centered menu bar with. %1$s%1$s %2$sFull width menu bar%3$s - Full width top bar/full width menu bar with logo and widget area. %1$s%1$s', '%1$s stands for line break. %2$s and %3$s stand for <strong> opening and closing tags' ,'bitz' ), '<br/>', '<strong>', '</strong>'),
				'std'         => '',
				'type'        => 'select',
				'condition'   => '',
				'choices'     => array( 
				  array(
					'value'       => '1',
					'label'       => esc_html__( 'Default', 'bitz' ),
					'src'         => ''
				  ),
				  array(
					'value'       => '2',
					'label'       => esc_html__( 'Menu bar', 'bitz' ),
					'src'         => ''
				  ),
				  array(
					'value'       => '3',
					'label'       => esc_html__( 'Inverse default', 'bitz' ),
					'src'         => ''
				  ),
				  array(
					'value'       => '4',
					'label'       => esc_html__( 'Centred header', 'bitz' ),
					'src'         => '4'
				  ),
				  array(
					'value'       => '5',
					'label'       => esc_html__( 'Centred header and menu', 'bitz' ),
					'src'         => ''
				  ),
				  array(
					'value'       => '6',
					'label'       => esc_html__( 'Full width menu bar', 'bitz' ),
					'src'         => ''
				  )
				)
			  ),
			array(
				'id'          => 'header_bg',
				'label'       => esc_html__( 'Header background color', 'bitz' ),
				'desc'        => esc_html__( 'Choose your site header color.', 'bitz' ),
				'std'         => '',
				'type'        => 'colorpicker',
				'condition'   => 'header_style:not(2),header_style:not(6)',
				'operator'    => 'and'
			  ),
			array(
				'id'          => 'header_padding_top',
				'label'       => esc_html__( 'Header padding top', 'bitz' ),
				'desc'        => sprintf (esc_html_x( 'Set top padding for your header. Please add size units, e.g., %s', '%s stands for example value. Do not delete it.' ,'bitz' ), '<code>20px</code>'),
				'std'         => '',
				'type'        => 'text',
				'condition'   => 'header_style:not(2),header_style:not(6)',
				'operator'    => 'and'
			  ),
			array(
				'id'          => 'header_padding_bottom',
				'label'       => esc_html__( 'Header padding bottom', 'bitz' ),
				'desc'        => sprintf (esc_html_x( 'Set bottom padding for your header. Please add size units, e.g., %s', '%s stands for example value. Do not delete it.' ,'bitz' ), '<code>20px</code>'),
				'std'         => '',
				'type'        => 'text',
				'condition'   => 'header_style:not(2),header_style:not(6)',
				'operator'    => 'and'
			  ),
			 array(
				'id'          => 'header_custom_css',
				'label'       => esc_html__( 'Custom CSS', 'bitz' ),
				'desc'        => esc_html__( 'Add custom CSS for this header.', 'bitz' ),
				'std'         => '',
				'type'        => 'textarea_simple',
				'condition'   => '',
				'operator'    => 'and'
			  ),
			array(
				'id'          => 'menu_tab',
				'label'       => esc_html__( 'Menu', 'bitz' ),
				'desc'        => '',
				'std'         => '',
				'type'        => 'tab',
				'condition'   => '',
				'operator'    => 'and'
			  ),
			array(
				'id'          => 'menu_height',
				'label'       => esc_html__( 'Menu height', 'bitz' ),
				'desc'        => sprintf (esc_html_x( 'Set menu bar height. Example: %s', '%s stands for example value. Do not delete it.' ,'bitz' ), '<code>60px</code>'),
				'std'         => '',
				'type'        => 'text',
				'condition'   => '',
				'operator'    => 'and'
			  ),
			array(
				'id'          => 'menu_color',
				'label'       => esc_html__( 'Menu background color', 'bitz' ),
				'desc'        => esc_html__( 'Background color for the menu bar. Leave blank to use theme accent color.', 'bitz' ),
				'std'         => '',
				'type'        => 'colorpicker',
				'condition'   => '',
				'operator'    => 'and'
			),
			array(
				'id'          => 'search_button',
				'label'       => esc_html__( 'Search button in menu', 'bitz' ),
				'desc'        => esc_html__( 'Enables or disables search from menu.', 'bitz' ),
				'std'         => 'on',
				'type'        => 'on-off',
				'condition'   => '',
				'operator'    => 'and'
			  ),
			array(
				'id'          => 'cart_button',
				'label'       => esc_html__( 'WooCommerce cart button in menu', 'bitz' ),
				'desc'        => esc_html__( 'Do you want a smart WooCommerce cart icon in main menu?', 'bitz' ),
				'std'         => 'on',
				'type'        => 'on-off',
				'condition'   => '',
				'operator'    => 'and'
			  ),
			array(
				'id'          => 'default_menu_link',
				'label'       => esc_html__( 'Menu link color', 'bitz' ),
				'desc'        => esc_html__( 'Click input field for color picker or enter your custom value.', 'bitz' ),
				'std'         => '',
				'type'        => 'colorpicker',
				'condition'   => '',
				'operator'    => 'and'
			  ),
			array(
				'id'          => 'default_menu_link_h',
				'label'       => esc_html__( 'Menu link hover color', 'bitz' ),
				'desc'        => esc_html__( 'Leave empty to use "Theme accent color".', 'bitz' ),
				'std'         => '',
				'type'        => 'colorpicker',
				'condition'   => '',
				'operator'    => 'and'
			  ),
			array(
				'id'          => 'show_submenu_styles',
				'label'       => esc_html__( 'Show submenu options?', 'bitz' ),
				'desc'        => esc_html__( 'Enable submenu styling.', 'bitz' ),
				'std'         => 'off',
				'type'        => 'on-off',
				'condition'   => '',
				'operator'    => 'and'
			  ),
			array(
				'id'          => 'submenu_section_info',
				'label'       => esc_html__( 'Submenu section info', 'bitz' ),
				'desc'        => '<div class="section-title">'. esc_html__( 'Submenu options', 'bitz' ) .'</div>',
				'std'         => '',
				'type'        => 'textblock',
				'condition'   => 'show_submenu_styles:is(on)',
				'operator'    => 'and'
			  ),
			array(
				'id'          => 'submenu_background',
				'label'       => esc_html__( 'Submenu background color', 'bitz' ),
				'desc'        => sprintf (esc_html_x( 'Background color for the submenu section. %1$s Leave empty for default color.', '%1$s stands for line break' ,'bitz' ), '<br/>'),
				'std'         => '',
				'type'        => 'colorpicker',
				'condition'   => 'show_submenu_styles:is(on)',
				'operator'    => 'and'
			  ),
			array(
				'id'          => 'submenu_link_color',
				'label'       => esc_html__( 'Submenu link color', 'bitz' ),
				'desc'        => esc_html__( 'Color for links in submenu.', 'bitz' ),
				'std'         => '',
				'type'        => 'colorpicker',
				'condition'   => 'show_submenu_styles:is(on)',
				'operator'    => 'and'
			  ),
			array(
				'id'          => 'submenu_hover_bg',
				'label'       => esc_html__( 'Submenu item background hover color', 'bitz' ),
				'desc'        => sprintf (esc_html_x( 'Background color for hovered menu item. %1$s Leave empty for default color.', '%1$s stands for line break' ,'bitz' ), '<br/>'),
				'std'         => '',
				'type'        => 'colorpicker',
				'condition'   => 'show_submenu_styles:is(on)',
				'operator'    => 'and'
			  ),
			array(
				'id'          => 'megamenu_section_info',
				'label'       => esc_html__( 'Megamenu section info', 'bitz' ),
				'desc'        => '<div class="section-title">'. esc_html__( 'Mega-menu options', 'bitz' ) .'</div>',
				'std'         => '',
				'type'        => 'textblock',
				'condition'   => 'show_submenu_styles:is(on)',
				'operator'    => 'and'
			  ),
			array(
				'id'          => 'megamenu_title_color',
				'label'       => esc_html__( 'Megamenu title color', 'bitz' ),
				'desc'        => esc_html__( 'Color for column title inside megamenu.', 'bitz' ),
				'std'         => '',
				'type'        => 'colorpicker',
				'condition'   => 'show_submenu_styles:is(on)',
				'operator'    => 'and'
			  ),
			array(
				'id'          => 'megamenu_active_item_color',
				'label'       => esc_html__( 'Megamenu hover &amp; active item color', 'bitz' ),
				'desc'        => esc_html__( 'Leave empty to use "Theme accent color".', 'bitz' ),
				'std'         => '',
				'type'        => 'colorpicker',
				'condition'   => 'show_submenu_styles:is(on)',
				'operator'    => 'and'
			  ),
			array(
				'id'          => 'megamenu_separator_color',
				'label'       => esc_html__( 'Megamenu column separator color', 'bitz' ),
				'desc'        => esc_html__( 'Leave empty for default color.', 'bitz' ),
				'std'         => '',
				'type'        => 'colorpicker',
				'condition'   => 'show_submenu_styles:is(on)',
				'operator'    => 'and'
			  ),
			array(
				'id'          => 'logo_tab',
				'label'       => esc_html__( 'Logo', 'bitz' ),
				'desc'        => '',
				'std'         => '',
				'type'        => 'tab',
				'condition'   => '',
				'operator'    => 'and'
			  ),
			array(
				'id'          => 'logo',
				'label'       => esc_html__( 'Logo', 'bitz' ),
				'desc'        => esc_html__( 'Please choose an image file for your logo.', 'bitz' ),
				'std'         => '',
				'type'        => 'upload',
				'condition'   => '',
				'operator'    => 'and'
			  ),
			array(
				'id'          => 'logo_retina',
				'label'       => esc_html__( 'Logo (Retina version @2x)', 'bitz' ),
				'desc'        => sprintf (esc_html_x( 'Retina logo should be %s the size of default logo keeping the aspect ratio!', '%s stands for the value. Do not delete it.' ,'bitz' ), '<code>2x</code>'),
				'std'         => '',
				'type'        => 'upload',
				'condition'   => '',
				'operator'    => 'and'
			  ),
			array(
				'id'          => 'retina_logo_width',
				'label'       => esc_html__( 'Standard logo width (for retina logo)', 'bitz' ),
				'desc'        => sprintf (esc_html_x( 'Please enter the STANDARD (1x) logo width. %1$s Remember to add %2$s value in the end. Example: %3$s', '%1$s stands for line break, %2$s and %3$s stand for example value.' ,'bitz' ), '<br/>', '<code>px</code>', '<code>100px</code>'),
				'std'         => '',
				'type'        => 'text',
				'condition'   => '',
				'operator'    => 'and'
			  ),
			array(
				'id'          => 'retina_logo_height',
				'label'       => esc_html__( 'Standard logo height (for retina logo)', 'bitz' ),
				'desc'        => sprintf (esc_html_x( 'Please enter the STANDARD (1x) logo height. %1$s Remember to add %2$s value in the end. Example: %3$s', '%1$s stands for line break, %2$s and %3$s stand for example value.' ,'bitz' ), '<br/>', '<code>px</code>', '<code>100px</code>'),
				'std'         => '',
				'type'        => 'text',
				'condition'   => '',
				'operator'    => 'and'
			  ),
			array(
				'id'          => 'logo_top',
				'label'       => esc_html__( 'Margin top', 'bitz' ),
				'desc'        => sprintf (esc_html_x( 'Move your logo vertically with this option. Remember to add %1$s value after the number. For example: %2$s', '%1$s and %2$s stand for example value. Do not delete it.' ,'bitz' ), '<code>px</code>', '<code>25px</code>'),
				'std'         => '',
				'type'        => 'text',
				'condition'   => '',
				'operator'    => 'and'
			  ),
			array(
				'id'          => 'logo_left',
				'label'       => esc_html__( 'Margin left', 'bitz' ),
				'desc'        => sprintf (esc_html_x( 'Move your logo horizontally with this option. Remember to add %1$s value after the number. For example: %2$s', '%1$s and %2$s stand for example value. Do not delete it.' ,'bitz' ), '<code>px</code>', '<code>25px</code>'),
				'std'         => '',
				'type'        => 'text',
				'condition'   => '',
				'operator'    => 'and'
			  ),
			array(
				'id'          => 'top_bar_tab',
				'label'       => esc_html__( 'Top bar', 'bitz' ),
				'desc'        => '',
				'std'         => '',
				'type'        => 'tab',
				'condition'   => '',
				'operator'    => 'and'
			  ),
			array(
				'label'       => esc_html__( 'Top bar', 'bitz' ),
				'id'          => 'top_bar',
				'type'        => 'on-off',
				'desc'        => 'Enable or disable top bar above the header.',
				'std'         => 'off'
			),   			  
			array(
				'id'          => 'top_bar_bg',
				'label'       => esc_html__( 'Background color', 'bitz' ),
				'desc'        => esc_html__( 'Click input field for color picker or enter your custom value.', 'bitz' ),
				'std'         => '',
				'type'        => 'colorpicker',
				'condition'   => 'top_bar:is(on)'
			  ),
			array(
				'id'          => 'top_bar_text_color',
				'label'       => esc_html__( 'Text and link color', 'bitz' ),
				'desc'        => esc_html__( 'Click input field for color picker or enter your custom value.', 'bitz' ),
				'std'         => '',
				'type'        => 'colorpicker',
				'condition'   => 'top_bar:is(on)'
			  ),
			array(
				'id'          => 'top_bar_link_hover',
				'label'       => esc_html__( 'Link hover color', 'bitz' ),
				'desc'        => esc_html__( 'Click input field for color picker or enter your custom value.', 'bitz' ),
				'std'         => '',
				'type'        => 'colorpicker',
				'condition'   => 'top_bar:is(on)'
			  ),
		)
	);

  
	if ( function_exists( 'ot_register_meta_box' ) ) {
		ot_register_meta_box( $mnky_meta_page );
		ot_register_meta_box( $mnky_meta_post );
		ot_register_meta_box( $mnky_meta_product );
		ot_register_meta_box( $mnky_meta_headers );
		ot_register_meta_box( $mnky_meta_ads );
		ot_register_meta_box( $mnky_meta_post_views );
		ot_register_meta_box( $mnky_meta_featured_image_caption );
		ot_register_meta_box( $mnky_meta_post_reviews );
	}
}