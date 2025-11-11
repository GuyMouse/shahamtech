<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
$menu_text = get_locale() == 'he_IL' ? 'תפריט' : 'Menu';
$button_text = get_locale() == 'he_IL' ? 'בואו נדבר' : 'Let\'s Talk';
?>

<header id="site-header" class="site-header">
    <div class="site-header--wrapper">
        <div class="site-menu">
            <div class="site-menu--logo">
                <a href="<?php echo home_url();?>">
                    <div class="image-wrapper">
                        <?php echo file_get_contents(ICONS_PATH.'/logo.svg');?>
                    </div>
                    <span>Shaham Tec</span>
                </a>
            </div>
            <div class="site-menu--wrapper">
                <div class="button-wrapper">
                    <a href="#" class="button">
                        <?php echo $button_text;?>
                    </a>
                </div>
                <div class="polylang-lang-switcher">
                    <?php
                        echo wp_nav_menu(array('menu' => 'language-switcher'));
                    ?>
                </div>
                <a href="#">
                    <!-- <span></?php echo $menu_text;?></span> -->
                    <?php echo file_get_contents(ICONS_PATH.'/hamburger.svg');?>
                </a>
            </div>    
        </div>    
    </div>
</header>

<main id="main" role="main">