<?php
	/**
	 * Register menu positions here
	 * Preffered naming - position_menu-name
	 */
	add_action('after_setup_theme', function () {
		register_nav_menus([
			'header_menu-main' => __('Main menu', 'theme_text_domain'),
			'header_menu-mobile' => __('Mobile menu', 'theme_text_domain'),
		]);
	});
