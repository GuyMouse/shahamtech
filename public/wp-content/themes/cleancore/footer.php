<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
if(!is_singular( 'advisor' )){
	get_template_part( 'template-parts/footer' );
}

wp_footer();

?>

</body>
</html>