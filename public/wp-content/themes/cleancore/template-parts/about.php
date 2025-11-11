<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
?>

<section class="about">
	<div class="container wide">
        <div class="about--wrapper">
            <div class="glassbox">
                <div class="glassbox--wrapper">
                    <div class="glassbox-content">
                        <h1>Shaham Tec</h1>
                        <h2><?php echo get_the_title();?></h2>
                        <div class="about-text">
                            <?php echo apply_filters('the_content',get_the_content());?>
                        </div>
                    </div>
                    <div class="glassbox-videos">
                        <div class="image-wrapper">
                            <img src="<?php echo IMAGES_DIR.'/video-placeholder.png';?>">
                        </div>
                        <div class="image-wrapper">
                            <img src="<?php echo IMAGES_DIR.'/video-placeholder.png';?>">
                        </div>
                        <div class="image-wrapper">
                            <img src="<?php echo IMAGES_DIR.'/video-placeholder.png';?>">
                        </div>
                    </div>
                </div>
            </div>
        </div>
	</div>
</section>

<section class="experties" style="height: 100vh;">
    <div class="container">

    </div>
</section>