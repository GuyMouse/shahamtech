<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
$about_fields = get_field('about');
$about_hero = $about_fields['hero'];
$about_management = $about_fields['management'];
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
                            <?php echo apply_filters('the_content', $about_hero['content']);?>
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
<?php if (!$about_management['management_tiles']) : ?>
    <section class="management">
        <div class="container wide">
            <div class="management--wrapper">
                <h2><?php echo $about_management['title'];?></h2>
                <div class="management-tiles">
                    <div class="management-tiles--wrapper">
                        <?php foreach ($about_management['management_tiles'] as $field) {
                            echo '
                                <div class="management-tile">
                                    <div class="management-tile--wrapper">
                                        <div class="image-wrapper">'.wp_get_attachment_image($field['image'], 'full').'</div>
                                        <div class="management-tile--content">
                                            <h3>'.$field['name'].'</h3>
                                            <span>'.$field['position'].'</span>
                                        </div>
                                    </div>   
                                </div>';  
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endif;?>