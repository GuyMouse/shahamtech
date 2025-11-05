<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

if (have_posts()) : while ( have_posts() ) : the_post();
?>

<section>
	<div class="container">
		<h1><?php the_title(); ?></h1>
		<p><?php the_content(); ?></p>
	</div>
</section>

<?php
endwhile; endif;
?>