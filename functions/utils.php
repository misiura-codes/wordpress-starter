<?php
	/**
	 * Assets for laravel mix
	 */
	if (!function_exists('get_assets_url')) {
		function get_assets_url($manifest = 'mix-manifest.json')
		{
			global $func_error;
			
			$manifest_path = get_template_directory() . '/' . $manifest;
			
			if (!is_file($manifest_path)) {
				$func_error(sprintf(__('The assets manifest file does not exist..')), 'File not found');
				
				return false;
			}
			
			$assets = json_decode(file_get_contents($manifest_path), true); // @codingStandardsIgnoreLine
			
			return $assets;
		}
	}
