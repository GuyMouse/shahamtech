<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
?>

<section class="about">
	<div class="container">
        <div class="about-circle"></div>
        <div class="about--wrapper">
            <div class="glassbox">
                <h1>Shaham Tech</h1>
                <h2><?php echo get_the_title();?></h2>
                <div class="about-text">
                    <?php echo apply_filters('the_content',get_the_content());?>
                </div>
            </div>
        </div>
	</div>
</section>