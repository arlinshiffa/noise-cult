<?php
/**
* Header Top Section
* @package Travel_Company
*/

$welcome_text =  get_theme_mod( 'top_header_welcome_text', __( 'Welcome To Travel Company Official Website', 'travel-company' ) );
$top_header_enable = get_theme_mod( 'travel_company_top_header_enable', '1' );
if($top_header_enable):
  ?>
  <div class="topbar">
  	<div class="container">
  		<div class="row">
  			<div class="col-lg-6 col-md-6 col-12">
  				<!-- Text -->
  				<p><?php echo esc_html($welcome_text);?></p>
  				<!--/ End Text -->
  			</div>
  			<div class="col-lg-6 col-md-6 col-12">
  				<!-- Social -->
          <?php travel_company_social_links();?>
          <!--/ End Social -->
        </div>
      </div>
    </div>
  </div>
  <?php endif;?> 