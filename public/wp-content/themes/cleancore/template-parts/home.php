<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
?>

<section>
	<div class="container">
		<?php
		get_template_part( TEMPLATE_COMPONENTS, 'site-general-component', array(
			'message' => 'Hello!',
		));
		?>
	</div>
</section>