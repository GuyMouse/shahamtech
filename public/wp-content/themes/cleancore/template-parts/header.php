<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
$menu_text = get_locale() == 'he_IL' ? 'תפריט' : 'Menu';
$button_text = get_locale() == 'he_IL' ? 'בואו נדבר' : 'Let\'s Talk';
?>

<header id="site-header" class="site-header">
	<div class="container">
		<div class="site-header--wrapper">
            <div class="site-menu">
                <div class="site-menu--wrapper">
                    <a href="#">
                        <?php echo file_get_contents(ICONS_PATH.'/hamburger.svg');?>
                        <span><?php echo $menu_text;?></span>
                    </a>
                    <div class="polylang-lang-switcher">
                        <?php
                            echo wp_nav_menu(array(
                                'menu' => 'language-switcher'
                            ))
                        ?>
                    </div>
                    <div class="button-wrapper">
                        <a href="#" class="button">
                            <?php echo $button_text;?>
                        </a>
                    </div>
                </div>    
            </div>    
        </div>
	</div>
</header>

<main id="main" role="main">