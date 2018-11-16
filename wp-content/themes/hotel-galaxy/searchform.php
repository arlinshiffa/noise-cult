 <form method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>"> 
 	<div class="sb-widget-inner">
 		<div class="form-group input-group">
 			<input type="text"  name="s" id="s" class="form-control form-widget" placeholder="<?php esc_attr_e( "Search ", 'hotel-galaxy' ); ?>" />
 			<span class="input-group-btn">
 				<button class="btn btn-default form-widget button-search" id="basic-addon2" type="submit"><i class="fa fa-search"></i></button>
 			</span>
 		</div>
 	</div>
 </form> 