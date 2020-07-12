<?php
	/**
	 * Register blocks here
	 */
	
	function register_acf_block_types()
	{
		acf_register_block_type([
			'name' => 'block_name',
			'title' => __('Block title', 'theme_text_domain'),
			'description' => __('Block description'),
			'render_template' => 'template-parts/blocks/block.php',
			'category' => 'common',
			'icon' => 'admin-comments',
			'keywords' => ['item'],
			'supports' => [
				'align' => false,
			],
		]);
	}
	
	/**
	 * Check if function exists and hook into setup.
	 */
	if (function_exists('acf_register_block_type')) {
//		add_action('acf/init', 'register_acf_block_types');
	}
