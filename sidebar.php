<?php
/**
 * @package WordPress
 * @subpackage designosource-WordPress-Theme
 * @since HTML5 Reset 2.0
 */
?>
 <div id="sidebar">

    <?php if (!function_exists('dynamic_sidebar') && !dynamic_sidebar('Sidebar Widgets')) : else : ?>

        <!-- All this stuff in here only shows up if you DON'T have any widgets active in this zone -->

    	<?php get_search_form(); ?>

    	<h2><?php _e('Archives','designosource'); ?></h2>
    	<ul>
    		<?php wp_get_archives('type=monthly'); ?>
    	</ul>

    	<h2><?php _e('Meta','designosource'); ?></h2>
    	<ul>
    		<?php wp_register(); ?>
    		<li><?php wp_loginout(); ?></li>
    		<li><a href="http://wordpress.org/" title="<?php _e('Powered by WordPress, state-of-the-art semantic personal publishing platform.','designosource'); ?>"><?php _e('WordPress','designosource'); ?></a></li>
    		<?php wp_meta(); ?>
    	</ul>

    	<h2><?php _e('Subscribe','designosource'); ?></h2>
    	<ul>
    		<li><a href="<?php bloginfo('rss2_url'); ?>"><?php _e('Entries (RSS)','designosource'); ?></a></li>
    		<li><a href="<?php bloginfo('comments_rss2_url'); ?>"><?php _e('Comments (RSS)','designosource'); ?></a></li>
    	</ul>

	<?php endif; ?>

</div>
