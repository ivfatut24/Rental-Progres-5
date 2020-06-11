<?php
	if (!defined('BASEPATH')) exit('No direct script access allowed');

	if (!function_exists('dd')) {
		function dd($var) {
			echo "<pre>";
			print_r ($var);
			echo "</pre>";
			die();
		}
	}

	if (!function_exists('isPost')) {
		function isPost() {
			if ($_SERVER['REQUEST_METHOD'] === 'POST') {
				return TRUE;
			} else {
				return FALSE;
			}
		}
	}

	if (!function_exists('idrFormat')) {
		function idrFormat($var) {
			return "Rp " . number_format((float)$var, 0, ',', '.');
		}
	}

	if (!function_exists('idDateFormat')) {
		function idDateFormat($var, $with_time = false) {
			if ($with_time) {
				return date("d M Y H:i", strtotime($var));
			} else {
				return date("d M Y", strtotime($var));				
			}			
		}
	}
