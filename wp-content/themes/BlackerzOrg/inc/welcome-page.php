<style>
	/* Import demo section */
	.import-demo-wrap{background:#fff; max-width:800px; margin:60px auto; padding:80px; text-align:center;  border-radius:4px;  box-shadow:0 1px 3px rgba(0,0,0,.13);}
	.import-demo-wrap h1{font-size: 50px; font-weight:normal; color:#585858; line-height:1.6; margin:0 0 10px;}
	.import-demo-wrap .mnky_import_button{position:relative; display:inline-block; min-width: 300px; background-color:#2ecc71; color: #fff; font-weight:600; text-align: center; line-height: 60px; font-size: 16px; border-radius: 3px; text-decoration:none; overflow: hidden; opacity: 0.2;}
	.import-demo-wrap span.import_note{font-size: 14px; font-weight:normal; color:#B0ADAD; line-height:1.6; margin:0 0 60px; display:block;}
	.import-demo-wrap span.import_note.import_warning{font-size:12px; margin: 0px;}
	.import-demo-wrap .info{font-size: 15px; font-weight: 600; padding-bottom:25px}
	.more-wrap {margin-top:60px;}
	.more-wrap .more_column {float:left; width:32.3%; margin-right:1.5%;}
	.more-wrap .more_column.last {margin-right:0}
	.more-wrap .more_column .column_title {font-size:18px; font-weight:600; margin-bottom:20px;}
	.more-wrap .mnky_small_button {position:relative; display:inline-block; margin-top:20px; min-width: 170px; background-color:#2ecc71; color: #fff; font-weight:600; text-align: center; line-height: 40px; font-size: 13px; border-radius: 3px; text-decoration:none; overflow: hidden;}
	.more-wrap .mnky_small_button:hover {background-color:#27ae60;}
	.clearfix:before, .clearfix:after { content: "\0020"; display: block; height: 0; visibility: hidden;} 
	.clearfix:after { clear: both; }
	.clearfix { zoom: 1; }
	
	@media only screen and (max-width: 979px) {
	.more-wrap .more_column {width:100%; margin:0 0 40px 0; float:none;}
	.more-wrap .more_column span {display:block;}
	.import-demo-wrap {padding:20px;}
	}
</style>

	<div class="import-demo-wrap">
	<h1><?php esc_html_e('Welcome to', 'bitz')?> <?php echo esc_html(wp_get_theme()); ?>!
	</h1>
	<span class="import_note"><?php	esc_html_e( 'Replicate live preview website by importing demo data. You can change and edit everything later.', 'bitz' ) ?></span>

	<div class="info-wrapper">
		<div class="info">
		<?php esc_html_e( 'To import theme demo data please install and activate plugin','bitz' )?> <a href="<?php echo esc_url('themes.php?page=tgmpa-install-plugins') ?>"><?php esc_html_e( 'Bitz | Theme Core Extend', 'bitz') ?></a>		
		</div> 
		<div class="mnky_import_button" ><span><?php esc_html_e('Import demo data', 'bitz')?></span></div>
	</div> 
	
	<hr style="margin-top:60px;">
	<span class="import_note import_warning"><?php esc_html_e('NOTICE: Images and graphics used in live demo that are licensed for preview purposes only are replaced with placeholder images.', 'bitz')?></span>
	<hr>
	
	<div class="more-wrap clearfix">
	<div class="more_column" >
	<div class="column_title"><?php esc_html_e('Documentation', 'bitz')?></div>
	<div><?php esc_html_e('Read online documentation to learn everything about the theme.', 'bitz')?></div>
	<a class="mnky_small_button" href="<?php echo esc_url('http://www.mnkystudio.com/bitz-documentation/') ?>" target="_blank"><span><?php esc_html_e('Read documentation', 'bitz')?></span></a>
	</div>
	<div class="more_column" >
	<div class="column_title"><?php esc_html_e('Theme options', 'bitz')?></div>
	<div><?php esc_html_e('Go to theme options panel to adjust theme settings.', 'bitz')?></div>
	<a class="mnky_small_button" href="<?php echo esc_url('themes.php?page=ot-theme-options') ?>"><span><?php esc_html_e('Customize theme', 'bitz')?></span></a>
	</div>
	<div class="more_column last" >
	<div class="column_title"><?php esc_html_e('Help desk', 'bitz')?></div>
	<div><?php esc_html_e('Visit our support forums to ask questions and get the answers.', 'bitz')?></div>
	<a class="mnky_small_button" href="<?php echo esc_url('http://support.mnkystudio.com/categories/bitz') ?>" target="_blank"><span><?php esc_html_e('Receive support', 'bitz')?></span></a>
	</div>
	</div>
</div>