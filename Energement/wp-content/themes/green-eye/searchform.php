<?php

?>


<form method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
		<label for="s" class="assistive-text"></label>
		<input type="text" class="field" name="s" id="s" placeholder="<?php esc_attr_e( 'Search in Energement', 'green-eye' ); ?>" />
		<input type="submit" class="submit" name="submit" id="searchsubmit" value="<?php esc_attr_e( 'Search', 'green-eye' ); ?>" />
	</form>