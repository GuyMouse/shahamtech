<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
?>

<section>
	<div class="container">
		<?php
		if( have_posts() ){
			while( have_posts() ){
				the_post();
				echo '<h3>'.get_the_title().'</h3>'
			}
		}
		?>
	</div>
</section>