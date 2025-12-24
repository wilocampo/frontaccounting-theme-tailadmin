<?php
/**********************************************************************
    Copyright (C) FrontAccounting, LLC.
	Released under the terms of the GNU General Public License, GPL, 
	as published by the Free Software Foundation, either version 3 
	of the License, or (at your option) any later version.
    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  
    See the License here <http://www.gnu.org/licenses/gpl-3.0.html>.
***********************************************************************/
	class renderer
	{
		function get_icon($category)
		{
			global  $path_to_root, $SysPrefs;

			if ($SysPrefs->show_menu_category_icons)
				$img = $category == '' ? 'right.gif' : $category.'.png';
			else	
				$img = 'right.gif';
			return "<img src='$path_to_root/themes/".user_theme()."/images/$img' style='vertical-align:middle;' border='0'>&nbsp;&nbsp;";
		}
		
		// Get Heroicon SVG for each FrontAccounting application
		// Using Heroicons (https://heroicons.com) - outline style
		function get_app_icon($app_id, $icon_class = '')
		{
			$icons = array(
				// Sales - Shopping Cart (heroicons: shopping-cart)
				'orders' => '<svg class="'.$icon_class.'" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" xmlns="http://www.w3.org/2000/svg">
					<path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
				</svg>',
				
				// Purchases - Clipboard Document List (heroicons: clipboard-document-list)
				'AP' => '<svg class="'.$icon_class.'" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" xmlns="http://www.w3.org/2000/svg">
					<path stroke-linecap="round" stroke-linejoin="round" d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 0 0 2.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 0 0-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 0 0 .75-.75 2.25 2.25 0 0 0-.1-.664m-5.8 0A2.251 2.251 0 0 1 13.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25ZM6.75 12h.008v.008H6.75V12Zm0 3h.008v.008H6.75V15Zm0 3h.008v.008H6.75V18Z" />
				</svg>',
				
				// Items and Inventory - Cube (heroicons: cube)
				'stock' => '<svg class="'.$icon_class.'" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" xmlns="http://www.w3.org/2000/svg">
					<path stroke-linecap="round" stroke-linejoin="round" d="m21 7.5-9-5.25L3 7.5m18 0-9 5.25m9-5.25v9l-9 5.25M3 7.5l9 5.25M3 7.5v9l9 5.25m0-9v9" />
				</svg>',
				
				// Manufacturing - Wrench Screwdriver (heroicons: wrench-screwdriver)
				'manuf' => '<svg class="'.$icon_class.'" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" xmlns="http://www.w3.org/2000/svg">
					<path stroke-linecap="round" stroke-linejoin="round" d="M11.42 15.17 17.25 21A2.652 2.652 0 0 0 21 17.25l-5.877-5.877M11.42 15.17l2.496-3.03c.317-.384.74-.626 1.208-.766M11.42 15.17l-4.655 5.653a2.548 2.548 0 1 1-3.586-3.586l6.837-5.63m5.108-.233c.55-.164 1.163-.188 1.743-.14a4.5 4.5 0 0 0 4.486-6.336l-3.276 3.277a3.004 3.004 0 0 1-2.25-2.25l3.276-3.276a4.5 4.5 0 0 0-6.336 4.486c.091 1.076-.071 2.264-.904 2.95l-.102.085m-1.745 1.437L5.909 7.5H4.5L2.25 3.75l1.5-1.5L7.5 4.5v1.409l4.26 4.26m-1.745 1.437 1.745-1.437m6.615 8.206L15.75 15.75M4.867 19.125h.008v.008h-.008v-.008Z" />
				</svg>',
				
				// Fixed Assets - Building Office (heroicons: building-office)
				'assets' => '<svg class="'.$icon_class.'" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" xmlns="http://www.w3.org/2000/svg">
					<path stroke-linecap="round" stroke-linejoin="round" d="M3.75 21h16.5M4.5 3h15M5.25 3v18m13.5-18v18M9 6.75h1.5m-1.5 3h1.5m-1.5 3h1.5m3-6H15m-1.5 3H15m-1.5 3H15M9 21v-3.375c0-.621.504-1.125 1.125-1.125h3.75c.621 0 1.125.504 1.125 1.125V21" />
				</svg>',
				
				// Dimensions - Square 3 Stack 3D (heroicons: square-3-stack-3d)
				'proj' => '<svg class="'.$icon_class.'" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" xmlns="http://www.w3.org/2000/svg">
					<path stroke-linecap="round" stroke-linejoin="round" d="M6.429 9.75 2.25 12l4.179 2.25m0-4.5 5.571 3 5.571-3m-11.142 0L2.25 7.5 12 2.25l9.75 5.25-4.179 2.25m0 0L21.75 12l-4.179 2.25m0 0 4.179 2.25L12 21.75 2.25 16.5l4.179-2.25m11.142 0-5.571 3-5.571-3" />
				</svg>',
				
				// Banking and General Ledger - Banknotes (heroicons: banknotes)
				'GL' => '<svg class="'.$icon_class.'" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" xmlns="http://www.w3.org/2000/svg">
					<path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18.75a60.07 60.07 0 0 1 15.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 0 1 3 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 0 0-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 0 1-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 0 0 3 15h-.75M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm3 0h.008v.008H18V10.5Zm-12 0h.008v.008H6V10.5Z" />
				</svg>',
				
				// Setup - Cog 6 Tooth (heroicons: cog-6-tooth)
				'system' => '<svg class="'.$icon_class.'" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" xmlns="http://www.w3.org/2000/svg">
					<path stroke-linecap="round" stroke-linejoin="round" d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.325.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 0 1 1.37.49l1.296 2.247a1.125 1.125 0 0 1-.26 1.431l-1.003.827c-.293.241-.438.613-.43.992a7.723 7.723 0 0 1 0 .255c-.008.378.137.75.43.991l1.004.827c.424.35.534.955.26 1.43l-1.298 2.247a1.125 1.125 0 0 1-1.369.491l-1.217-.456c-.355-.133-.75-.072-1.076.124a6.47 6.47 0 0 1-.22.128c-.331.183-.581.495-.644.869l-.213 1.281c-.09.543-.56.94-1.11.94h-2.594c-.55 0-1.019-.398-1.11-.94l-.213-1.281c-.062-.374-.312-.686-.644-.87a6.52 6.52 0 0 1-.22-.127c-.325-.196-.72-.257-1.076-.124l-1.217.456a1.125 1.125 0 0 1-1.369-.49l-1.297-2.247a1.125 1.125 0 0 1 .26-1.431l1.004-.827c.292-.24.437-.613.43-.991a6.932 6.932 0 0 1 0-.255c.007-.38-.138-.751-.43-.992l-1.004-.827a1.125 1.125 0 0 1-.26-1.43l1.297-2.247a1.125 1.125 0 0 1 1.37-.491l1.216.456c.356.133.751.072 1.076-.124.072-.044.146-.086.22-.128.332-.183.582-.495.644-.869l.214-1.28Z" />
					<path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
				</svg>',
				
				// Default - Squares 2x2 (heroicons: squares-2x2)
				'default' => '<svg class="'.$icon_class.'" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" xmlns="http://www.w3.org/2000/svg">
					<path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6A2.25 2.25 0 0 1 6 3.75h2.25A2.25 2.25 0 0 1 10.5 6v2.25a2.25 2.25 0 0 1-2.25 2.25H6a2.25 2.25 0 0 1-2.25-2.25V6ZM3.75 15.75A2.25 2.25 0 0 1 6 13.5h2.25a2.25 2.25 0 0 1 2.25 2.25V18a2.25 2.25 0 0 1-2.25 2.25H6A2.25 2.25 0 0 1 3.75 18v-2.25ZM13.5 6a2.25 2.25 0 0 1 2.25-2.25H18A2.25 2.25 0 0 1 20.25 6v2.25A2.25 2.25 0 0 1 18 10.5h-2.25a2.25 2.25 0 0 1-2.25-2.25V6ZM13.5 15.75a2.25 2.25 0 0 1 2.25-2.25H18a2.25 2.25 0 0 1 2.25 2.25V18A2.25 2.25 0 0 1 18 20.25h-2.25A2.25 2.25 0 0 1 13.5 18v-2.25Z" />
				</svg>'
			);
			
			return isset($icons[$app_id]) ? $icons[$app_id] : $icons['default'];
		}
		
		// Helper function to check if a menu link matches the current page
		function is_menu_link_active($link, $current_script, $current_params) {
			if (empty($link)) return false;
			
			// Parse the link
			$link_parts = explode('?', $link);
			$link_script = basename($link_parts[0]);
			
			// First check: filename must match
			if ($link_script !== $current_script) {
				return false;
			}
			
			// If link has no query params, just match by filename
			if (!isset($link_parts[1]) || empty($link_parts[1])) {
				return true;
			}
			
			// Parse link query params
			parse_str($link_parts[1], $link_params);
			
			// Check if all link params exist in current params with same values
			foreach ($link_params as $key => $value) {
				if (!isset($current_params[$key]) || $current_params[$key] != $value) {
					return false;
				}
			}
			
			return true;
		}

		function wa_header()
		{
			page(_($help_context = "Main Menu"), false, true);
		}

		function wa_footer()
		{
			end_page(false, true);
		}

		function menu_header($title, $no_menu, $is_index)
		{
			global $path_to_root, $SysPrefs, $db_connections;
			
			$theme_path = $path_to_root . "/themes/".user_theme();
			
			// Alpine.js is loaded at the end of body in menu_footer() for proper DOM initialization
			
			// Inject local Tailwind CSS and fonts
			echo "<script src='$theme_path/vendor/tailwindcss/tailwind.min.js'></script>\n";
			echo "<link href='$theme_path/vendor/fonts/outfit.css' rel='stylesheet'>\n";
			echo "<script>
			if (typeof tailwind !== 'undefined') {
				tailwind.config = {
					theme: {
						extend: {
							colors: {
								primary: '#465fff',
								'primary-light': '#818cf8',
								brand: {
									50: '#eef2ff',
									100: '#e0e7ff',
									200: '#c7d2fe',
									300: '#a5b4fc',
									400: '#818cf8',
									500: '#465fff',
									600: '#3641f5',
									700: '#2a31d8'
								},
								'gray-dark': '#1f2937'
							},
							fontFamily: {
								outfit: ['Outfit', 'sans-serif']
							}
						}
					},
					darkMode: 'class'
				}
			}
			</script>\n";
			
			// TailAdmin Page Wrapper with Alpine.js
			// Based on TailAdmin documentation: https://tailadmin.com/docs/layout/app-layout
			echo "<div x-data=\"{
				sidebarToggle: false,
				darkMode: localStorage.getItem('darkMode') === 'true',
				menuToggle: false,
				userDropdownOpen: false,
				loaded: true,
				init() {
					// Apply dark mode on init
					if (this.darkMode) {
						document.documentElement.classList.add('dark');
					}
					// Watch for changes
					this.\$watch('darkMode', (value) => {
						localStorage.setItem('darkMode', value);
						if (value) {
							document.documentElement.classList.add('dark');
						} else {
							document.documentElement.classList.remove('dark');
						}
					});
				}
			}\" class=\"min-h-screen bg-gray-50 dark:bg-[#101828]\">\n";
			
			// Preloader - hidden by default with x-cloak, shown only when loading
			echo "<!-- ===== Preloader Start ===== -->\n";
			echo "<div x-cloak x-show=\"!loaded\" class=\"fixed inset-0 z-99999 flex items-center justify-center bg-white dark:bg-[#101828]\">\n";
			echo "<div class=\"h-16 w-16 animate-spin rounded-full border-4 border-gray-200 border-t-brand-500\"></div>\n";
			echo "</div>\n";
			echo "<!-- ===== Preloader End ===== -->\n";
			
			// Page Wrapper
			echo "<div class=\"flex h-screen overflow-hidden\">\n";
			
			if (!$no_menu)
			{
				// ===== Sidebar Start =====
				// Mobile: hidden by default (-translate-x-full), shown when sidebarToggle=true
				// Desktop (xl+): always visible (xl:translate-x-0), collapsed to icons when sidebarToggle=true
				echo "<aside 
					x-cloak
					:class=\"{
						'translate-x-0': sidebarToggle,
						'-translate-x-full': !sidebarToggle,
						'xl:w-[90px]': sidebarToggle
					}\" 
					class=\"sidebar fixed left-0 top-0 z-9999 flex h-screen w-[290px] flex-col overflow-y-hidden border-r border-gray-200 bg-white px-5 dark:border-[#1d2939] dark:bg-[#1d2939] xl:static xl:translate-x-0 transition-all duration-300 ease-in-out\">\n";
				
				// SIDEBAR HEADER
				echo "<div class=\"flex items-center gap-2 pt-8 sidebar-header pb-7\" :class=\"sidebarToggle ? 'justify-center' : 'justify-between'\">\n";
				echo "<a href=\"$path_to_root/index.php\">\n";
				echo "<span class=\"logo\" :class=\"sidebarToggle ? 'xl:hidden' : ''\">\n";
				echo "<img class=\"dark:hidden\" src=\"$path_to_root/themes/".user_theme()."/images/logo/logo.svg\" alt=\"Logo\" />\n";
				echo "<img class=\"hidden dark:block\" src=\"$path_to_root/themes/".user_theme()."/images/logo/logo-dark.svg\" alt=\"Logo\" />\n";
				echo "</span>\n";
				echo "<img class=\"logo-icon hidden\" :class=\"sidebarToggle ? 'xl:block' : 'hidden'\" src=\"$path_to_root/themes/".user_theme()."/images/logo/logo-icon.svg\" alt=\"Logo\" />\n";
				echo "</a>\n";
				echo "</div>\n";
				echo "<!-- SIDEBAR HEADER -->\n";
				
				// Sidebar Menu
				echo "<div class=\"flex flex-col overflow-y-auto duration-300 ease-linear no-scrollbar\">\n";
				echo "<nav x-data=\"{selected: ''}\">\n";
				
				// Menu Group
				echo "<div>\n";
				echo "<h3 class=\"mb-4 text-xs leading-[20px] text-gray-400 uppercase\">\n";
				echo "<span class=\"menu-group-title\" :class=\"sidebarToggle ? 'xl:hidden' : ''\">\n";
				echo "MENU\n";
				echo "</span>\n";
				echo "<svg :class=\"sidebarToggle ? 'xl:block hidden' : 'hidden'\" class=\"menu-group-icon mx-auto fill-current hidden\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" xmlns=\"http://www.w3.org/2000/svg\">\n";
				echo "<path fill-rule=\"evenodd\" clip-rule=\"evenodd\" d=\"M5.99915 10.2451C6.96564 10.2451 7.74915 11.0286 7.74915 11.9951V12.0051C7.74915 12.9716 6.96564 13.7551 5.99915 13.7551C5.03265 13.7551 4.24915 12.9716 4.24915 12.0051V11.9951C4.24915 11.0286 5.03265 10.2451 5.99915 10.2451ZM17.9991 10.2451C18.9656 10.2451 19.7491 11.0286 19.7491 11.9951V12.0051C19.7491 12.9716 18.9656 13.7551 17.9991 13.7551C17.0326 13.7551 16.2491 12.9716 16.2491 12.0051V11.9951C16.2491 11.0286 17.0326 10.2451 17.9991 10.2451ZM13.7491 11.9951C13.7491 11.0286 12.9656 10.2451 11.9991 10.2451C11.0326 10.2451 10.2491 11.0286 10.2491 11.9951V12.0051C10.2491 12.9716 11.0326 13.7551 11.9991 13.7551C12.9656 13.7551 13.7491 12.9716 13.7491 12.0051V11.9951Z\" fill=\"currentColor\"></path>\n";
				echo "</svg>\n";
				echo "</h3>\n";
				
				// Applications Menu
				$applications = $_SESSION['App']->applications;
				$sel_app = $_SESSION['sel_app'];
				
				// Get current page for active menu detection
				$current_page = $_SERVER['PHP_SELF'];
				$current_query = isset($_SERVER['QUERY_STRING']) ? $_SERVER['QUERY_STRING'] : '';
				// Extract just the filename from current page
				$current_script = basename($current_page);
				// Parse current query string into array for comparison
				parse_str($current_query, $current_params);
				
				// Find which app contains the current page
				$active_app_key = '';
				$active_page_link = '';
				foreach($applications as $app) {
					if (isset($app->modules) && is_array($app->modules)) {
						foreach ($app->modules as $module) {
							if (isset($module->lappfunctions)) {
								foreach ($module->lappfunctions as $appfunction) {
									if ($this->is_menu_link_active($appfunction->link, $current_script, $current_params)) {
										$active_app_key = 'App_' . $app->id;
										$active_page_link = $appfunction->link;
										break 3;
									}
								}
							}
							if (isset($module->rappfunctions)) {
								foreach ($module->rappfunctions as $appfunction) {
									if ($this->is_menu_link_active($appfunction->link, $current_script, $current_params)) {
										$active_app_key = 'App_' . $app->id;
										$active_page_link = $appfunction->link;
										break 3;
									}
								}
							}
						}
					}
				}
				
				echo "<ul class=\"mb-6 flex flex-col gap-1\">\n";
				foreach($applications as $app)
				{
					if ($_SESSION["wa_current_user"]->check_application_access($app))
					{
						// Override display name for GL to shorten it before processing
						$app_name = $app->name;
						if ($app->id == 'GL') {
							// Replace both with and without & prefix
							$app_name = str_replace('&Banking and General Ledger', '&Banking & General Ledger', $app_name);
							$app_name = str_replace('Banking and General Ledger', 'Banking & General Ledger', $app_name);
						}
						$acc = access_string($app_name);
						// Also replace after access_string() in case HTML tags were added
						if ($app->id == 'GL') {
							$acc[0] = str_replace('Banking and General Ledger', 'Banking & General Ledger', $acc[0]);
							// Handle case where B might be wrapped in <u> tags
							$acc[0] = preg_replace('/(<u>)?B(<\/u>)?anking and General Ledger/', '$1B$2anking & General Ledger', $acc[0]);
						}
						$app_key = 'App_' . $app->id;
						$is_active = ($sel_app == $app->id) || ($active_app_key == $app_key);
						$icon_class = $is_active ? 'menu-item-icon-active' : 'menu-item-icon-inactive';
						
						// Check if app has modules to show dropdown
						$has_modules = false;
						if (isset($app->modules) && is_array($app->modules)) {
							foreach ($app->modules as $module) {
								if ($_SESSION["wa_current_user"]->check_module_access($module)) {
									$has_modules = true;
									break;
								}
							}
						}
						
						// Determine initial expanded state
						// Expand if: submenu item is active OR we're on the main page of this module
						$initially_expanded = ($active_app_key == $app_key || $is_active) ? 'true' : 'false';
						
						echo "<!-- Menu Item ".$acc[0]." -->\n";
						// Initialize selected if menu should be expanded
						$init_selected = ($initially_expanded == 'true') ? "selected = '$app_key';" : '';
						echo "<li x-data=\"{ expanded: $initially_expanded }\" x-init=\"$init_selected\">\n";
						
						if ($has_modules) {
							// Expandable menu item with dropdown - split click behavior
							// Container div for the menu item - looks like single item but has split click areas
							// Active when: dropdown is expanded OR current page is this module's main page
							$is_active_str = $is_active ? 'true' : 'false';
							echo "<div class=\"menu-item-split group\" :class=\"(selected === '$app_key' || $is_active_str) ? 'menu-item-active' : 'menu-item-inactive'\">\n";
							
							// Left part: Icon + Text - navigates to module main page
							echo "<a href=\"$path_to_root/index.php?application=".$app->id."\"$acc[1] class=\"menu-item-link\">\n";
							// Icon - use appropriate icon for each app
							echo $this->get_app_icon($app->id, $icon_class);
							echo "<span class=\"menu-item-text\" :class=\"sidebarToggle ? 'xl:hidden' : ''\">\n";
							echo $acc[0]."\n";
							echo "</span>\n";
							echo "</a>\n";
							
							// Right part: Arrow - toggles dropdown (invisible split, same hover as parent)
							echo "<button @click.prevent=\"selected = (selected === '$app_key' ? '':'$app_key')\" class=\"menu-item-toggle\" :class=\"sidebarToggle ? 'xl:hidden' : ''\">\n";
							// Arrow rotates when selected matches app_key (not based on is_active_str to allow proper toggling)
							echo "<svg class=\"menu-item-arrow transition-transform duration-200\" :class=\"selected === '$app_key' ? 'rotate-180' : ''\" width=\"20\" height=\"20\" viewBox=\"0 0 20 20\" fill=\"none\" xmlns=\"http://www.w3.org/2000/svg\">\n";
							echo "<path d=\"M4.79175 7.39584L10.0001 12.6042L15.2084 7.39585\" stroke=\"currentColor\" stroke-width=\"1.5\" stroke-linecap=\"round\" stroke-linejoin=\"round\"></path>\n";
							echo "</svg>\n";
							echo "</button>\n";
							
							echo "</div>\n";
						} else {
							// Simple menu item (no dropdown)
							echo "<a href=\"$path_to_root/index.php?application=".$app->id."\"$acc[1] class=\"menu-item group ".($is_active ? 'menu-item-active' : 'menu-item-inactive')."\">\n";
							
							// Icon - use appropriate icon for each app
							echo $this->get_app_icon($app->id, $icon_class);
							
							echo "<span class=\"menu-item-text\" :class=\"sidebarToggle ? 'xl:hidden' : ''\">\n";
							echo $acc[0]."\n";
							echo "</span>\n";
							
							echo "</a>\n";
						}
						
						// Dropdown Menu for modules and functions
						if ($has_modules) {
							echo "<!-- Dropdown Menu Start -->\n";
							echo "<div class=\"translate transform overflow-hidden\" :class=\"(selected === '$app_key') ? 'block' :'hidden'\">\n";
							echo "<ul :class=\"sidebarToggle ? 'xl:hidden' : 'flex'\" class=\"menu-dropdown mt-2 flex flex-col gap-1 pl-9\">\n";
							
							$module_index = 0;
							foreach ($app->modules as $module)
							{
								if ($_SESSION["wa_current_user"]->check_module_access($module))
								{
									// Show module group header (e.g., "Transactions", "Inquiries and Reports", "Maintenance")
									if (!empty($module->name)) {
										$mt_class = $module_index > 0 ? 'mt-4' : '';
										echo "<li class=\"menu-module-header $mt_class\">\n";
										echo "<span class=\"text-xs font-semibold uppercase tracking-wider text-gray-500 dark:text-gray-400 px-1 py-2 block\">".$module->name."</span>\n";
										echo "</li>\n";
									}
									$module_index++;
									
									// Render left app functions (lappfunctions)
									foreach ($module->lappfunctions as $appfunction)
									{
										if ($appfunction->label == "")
											continue; // Skip empty labels
										elseif ($_SESSION["wa_current_user"]->can_access_page($appfunction->access))
										{
											$acc_func = access_string($appfunction->label);
											// Check if this is the active page using helper function
											$is_active_item = $this->is_menu_link_active($appfunction->link, $current_script, $current_params);
											$item_class = $is_active_item ? 'menu-dropdown-item-active' : 'menu-dropdown-item-inactive';
											echo "<li>\n";
											echo "<a href=\"$path_to_root/".$appfunction->link."\" class=\"menu-dropdown-item group $item_class\">\n";
											echo $acc_func[0]."\n";
											echo "</a>\n";
											echo "</li>\n";
										}
										elseif (!$_SESSION["wa_current_user"]->hide_inaccessible_menu_items())
										{
											echo "<li>\n";
											echo "<span class=\"menu-dropdown-item group inactive\">".access_string($appfunction->label, true)."</span>\n";
											echo "</li>\n";
										}
									}
									
									// Render right app functions (rappfunctions) if they exist
									if (isset($module->rappfunctions) && sizeof($module->rappfunctions) > 0)
									{
										foreach ($module->rappfunctions as $appfunction)
										{
											if ($appfunction->label == "")
												continue; // Skip empty labels
											elseif ($_SESSION["wa_current_user"]->can_access_page($appfunction->access))
											{
												$acc_func = access_string($appfunction->label);
												// Check if this is the active page using helper function
												$is_active_item = $this->is_menu_link_active($appfunction->link, $current_script, $current_params);
												$item_class = $is_active_item ? 'menu-dropdown-item-active' : 'menu-dropdown-item-inactive';
												echo "<li>\n";
												echo "<a href=\"$path_to_root/".$appfunction->link."\" class=\"menu-dropdown-item group $item_class\">\n";
												echo $acc_func[0]."\n";
												echo "</a>\n";
												echo "</li>\n";
											}
											elseif (!$_SESSION["wa_current_user"]->hide_inaccessible_menu_items())
											{
												echo "<li>\n";
												echo "<span class=\"menu-dropdown-item group inactive\">".access_string($appfunction->label, true)."</span>\n";
												echo "</li>\n";
											}
										}
									}
								}
							}
							
							echo "</ul>\n";
							echo "</div>\n";
							echo "<!-- Dropdown Menu End -->\n";
						}
						
						echo "</li>\n";
						echo "<!-- Menu Item ".$acc[0]." -->\n";
					}
				}
				echo "</ul>\n";
				echo "</div>\n";
				echo "</nav>\n";
				echo "</div>\n";
				echo "</aside>\n";
				// ===== Sidebar End =====
				
				// ===== Content Area Start =====
				echo "<div class=\"relative flex flex-col flex-1 overflow-x-hidden overflow-y-auto\">\n";
				
				// Small Device Overlay
				echo "<div x-show=\"sidebarToggle\" @click=\"sidebarToggle = false\" x-transition:enter=\"transition-opacity ease-linear duration-300\" x-transition:enter-start=\"opacity-0\" x-transition:enter-end=\"opacity-100\" x-transition:leave=\"transition-opacity ease-linear duration-300\" x-transition:leave-start=\"opacity-100\" x-transition:leave-end=\"opacity-0\" class=\"fixed inset-0 z-9998 bg-black/50 xl:hidden\"></div>\n";
				
				// ===== Header Start =====
				echo "<header class=\"sticky top-0 z-99999 flex w-full border-gray-200 bg-white xl:border-b dark:border-[#1d2939] dark:bg-[#1d2939]\">\n";
				echo "<div class=\"flex grow flex-col items-center justify-between xl:flex-row xl:px-6\">\n";
				echo "<div class=\"flex w-full items-center justify-between gap-2 border-b border-gray-200 px-3 py-3 sm:gap-4 xl:justify-normal xl:border-b-0 xl:px-0 lg:py-4 dark:border-[#1d2939]\">\n";
				
				// Hamburger Toggle BTN
				echo "<button :class=\"sidebarToggle ? 'xl:bg-transparent dark:xl:bg-transparent bg-gray-100 dark:bg-gray-800' : ''\" class=\"z-99999 flex h-10 w-10 items-center justify-center rounded-lg border-gray-200 text-gray-500 xl:h-11 xl:w-11 xl:border dark:border-gray-700 dark:text-gray-400\" @click.stop=\"sidebarToggle = !sidebarToggle\">\n";
				echo "<svg class=\"hidden fill-current xl:block\" width=\"16\" height=\"12\" viewBox=\"0 0 16 12\" fill=\"none\" xmlns=\"http://www.w3.org/2000/svg\">\n";
				echo "<path fill-rule=\"evenodd\" clip-rule=\"evenodd\" d=\"M0.583252 1C0.583252 0.585788 0.919038 0.25 1.33325 0.25H14.6666C15.0808 0.25 15.4166 0.585786 15.4166 1C15.4166 1.41421 15.0808 1.75 14.6666 1.75L1.33325 1.75C0.919038 1.75 0.583252 1.41422 0.583252 1ZM0.583252 11C0.583252 10.5858 0.919038 10.25 1.33325 10.25L14.6666 10.25C15.0808 10.25 15.4166 10.5858 15.4166 11C15.4166 11.4142 15.0808 11.75 14.6666 11.75L1.33325 11.75C0.919038 11.75 0.583252 11.4142 0.583252 11ZM1.33325 5.25C0.919038 5.25 0.583252 5.58579 0.583252 6C0.583252 6.41421 0.919038 6.75 1.33325 6.75L7.99992 6.75C8.41413 6.75 8.74992 6.41421 8.74992 6C8.74992 5.58579 8.41413 5.25 7.99992 5.25L1.33325 5.25Z\" fill=\"\"></path>\n";
				echo "</svg>\n";
				echo "<svg :class=\"sidebarToggle ? 'hidden' : 'block xl:hidden'\" class=\"fill-current xl:hidden block\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" xmlns=\"http://www.w3.org/2000/svg\">\n";
				echo "<path fill-rule=\"evenodd\" clip-rule=\"evenodd\" d=\"M3.25 6C3.25 5.58579 3.58579 5.25 4 5.25L20 5.25C20.4142 5.25 20.75 5.58579 20.75 6C20.75 6.41421 20.4142 6.75 20 6.75L4 6.75C3.58579 6.75 3.25 6.41422 3.25 6ZM3.25 18C3.25 17.5858 3.58579 17.25 4 17.25L20 17.25C20.4142 17.25 20.75 17.5858 20.75 18C20.75 18.4142 20.4142 18.75 20 18.75L4 18.75C3.58579 18.75 3.25 18.4142 3.25 18ZM4 11.25C3.58579 11.25 3.25 11.5858 3.25 12C3.25 12.4142 3.58579 12.75 4 12.75L12 12.75C12.4142 12.75 12.75 12.4142 12.75 12C12.75 11.5858 12.4142 11.25 12 11.25L4 11.25Z\" fill=\"\"></path>\n";
				echo "</svg>\n";
				echo "<svg :class=\"sidebarToggle ? 'block xl:hidden' : 'hidden'\" class=\"fill-current hidden\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" xmlns=\"http://www.w3.org/2000/svg\">\n";
				echo "<path fill-rule=\"evenodd\" clip-rule=\"evenodd\" d=\"M6.21967 7.28131C5.92678 6.98841 5.92678 6.51354 6.21967 6.22065C6.51256 5.92775 6.98744 5.92775 7.28033 6.22065L11.999 10.9393L16.7176 6.22078C17.0105 5.92789 17.4854 5.92788 17.7782 6.22078C18.0711 6.51367 18.0711 6.98855 17.7782 7.28144L13.0597 12L17.7782 16.7186C18.0711 17.0115 18.0711 17.4863 17.7782 17.7792C17.4854 18.0721 17.0105 18.0721 16.7176 17.7792L11.999 13.0607L7.28033 17.7794C6.98744 18.0722 6.51256 18.0722 6.21967 17.7794C5.92678 17.4865 5.92678 17.0116 6.21967 16.7187L10.9384 12L6.21967 7.28131Z\" fill=\"\"></path>\n";
				echo "</svg>\n";
				echo "</button>\n";
				echo "<!-- Hamburger Toggle BTN -->\n";
				
				// Logo for mobile
				echo "<a href=\"$path_to_root/index.php\" class=\"xl:hidden\">\n";
				echo "<img class=\"dark:hidden\" src=\"$path_to_root/themes/".user_theme()."/images/logo/logo.svg\" alt=\"Logo\">\n";
				echo "<img class=\"hidden dark:block\" src=\"$path_to_root/themes/".user_theme()."/images/logo/logo-dark.svg\" alt=\"Logo\">\n";
				echo "</a>\n";
				
				// Application nav menu button
				echo "<button class=\"z-99999 flex h-10 w-10 items-center justify-center rounded-lg text-gray-700 hover:bg-gray-100 xl:hidden dark:text-gray-400 dark:hover:bg-gray-800\" :class=\"menuToggle ? 'bg-gray-100 dark:bg-gray-800' : ''\" @click.stop=\"menuToggle = !menuToggle\">\n";
				echo "<svg class=\"fill-current\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" xmlns=\"http://www.w3.org/2000/svg\">\n";
				echo "<path fill-rule=\"evenodd\" clip-rule=\"evenodd\" d=\"M5.99902 10.4951C6.82745 10.4951 7.49902 11.1667 7.49902 11.9951V12.0051C7.49902 12.8335 6.82745 13.5051 5.99902 13.5051C5.1706 13.5051 4.49902 12.8335 4.49902 12.0051V11.9951C4.49902 11.1667 5.1706 10.4951 5.99902 10.4951ZM17.999 10.4951C18.8275 10.4951 19.499 11.1667 19.499 11.9951V12.0051C19.499 12.8335 18.8275 13.5051 17.999 13.5051C17.1706 13.5051 16.499 12.8335 16.499 12.0051V11.9951C16.499 11.1667 17.1706 10.4951 17.999 10.4951ZM13.499 11.9951C13.499 11.1667 12.8275 10.4951 11.999 10.4951C11.1706 10.4951 10.499 11.1667 10.499 11.9951V12.0051C10.499 12.8335 11.1706 13.5051 11.999 13.5051C12.8275 13.5051 13.499 12.8335 13.499 12.0051V11.9951Z\" fill=\"\"></path>\n";
				echo "</svg>\n";
				echo "</button>\n";
				echo "<!-- Application nav menu button -->\n";
				echo "</div>\n";
				
				// Header Actions Section
				echo "<div :class=\"menuToggle ? 'flex' : 'hidden'\" class=\"shadow-theme-md w-full items-center justify-between gap-4 px-5 py-4 xl:flex xl:justify-end xl:px-0 xl:shadow-none hidden\">\n";
				echo "<div class=\"2xsm:gap-3 flex items-center gap-2\">\n";
				
				// Dark Mode Toggler
				echo "<button class=\"hover:text-dark-900 relative flex h-11 w-11 items-center justify-center rounded-full border border-gray-200 bg-white text-gray-500 transition-colors hover:bg-gray-100 hover:text-gray-700 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white\" @click.prevent=\"darkMode = !darkMode\">\n";
				echo "<svg class=\"hidden dark:block\" width=\"20\" height=\"20\" viewBox=\"0 0 20 20\" fill=\"none\" xmlns=\"http://www.w3.org/2000/svg\">\n";
				echo "<path fill-rule=\"evenodd\" clip-rule=\"evenodd\" d=\"M9.99998 1.5415C10.4142 1.5415 10.75 1.87729 10.75 2.2915V3.5415C10.75 3.95572 10.4142 4.2915 9.99998 4.2915C9.58577 4.2915 9.24998 3.95572 9.24998 3.5415V2.2915C9.24998 1.87729 9.58577 1.5415 9.99998 1.5415ZM10.0009 6.79327C8.22978 6.79327 6.79402 8.22904 6.79402 10.0001C6.79402 11.7712 8.22978 13.207 10.0009 13.207C11.772 13.207 13.2078 11.7712 13.2078 10.0001C13.2078 8.22904 11.772 6.79327 10.0009 6.79327ZM5.29402 10.0001C5.29402 7.40061 7.40135 5.29327 10.0009 5.29327C12.6004 5.29327 14.7078 7.40061 14.7078 10.0001C14.7078 12.5997 12.6004 14.707 10.0009 14.707C7.40135 14.707 5.29402 12.5997 5.29402 10.0001ZM15.9813 5.08035C16.2742 4.78746 16.2742 4.31258 15.9813 4.01969C15.6884 3.7268 15.2135 3.7268 14.9207 4.01969L14.0368 4.90357C13.7439 5.19647 13.7439 5.67134 14.0368 5.96423C14.3297 6.25713 14.8045 6.25713 15.0974 5.96423L15.9813 5.08035ZM18.4577 10.0001C18.4577 10.4143 18.1219 10.7501 17.7077 10.7501H16.4577C16.0435 10.7501 15.7077 10.4143 15.7077 10.0001C15.7077 9.58592 16.0435 9.25013 16.4577 9.25013H17.7077C18.1219 9.25013 18.4577 9.58592 18.4577 10.0001ZM14.9207 15.9806C15.2135 16.2735 15.6884 16.2735 15.9813 15.9806C16.2742 15.6877 16.2742 15.2128 15.9813 14.9199L15.0974 14.036C14.8045 13.7431 14.3297 13.7431 14.0368 14.036C13.7439 14.3289 13.7439 14.8038 14.0368 15.0967L14.9207 15.9806ZM9.99998 15.7088C10.4142 15.7088 10.75 16.0445 10.75 16.4588V17.7088C10.75 18.123 10.4142 18.4588 9.99998 18.4588C9.58577 18.4588 9.24998 18.123 9.24998 17.7088V16.4588C9.24998 16.0445 9.58577 15.7088 9.99998 15.7088ZM5.96356 15.0972C6.25646 14.8043 6.25646 14.3295 5.96356 14.0366C5.67067 13.7437 5.1958 13.7437 4.9029 14.0366L4.01902 14.9204C3.72613 15.2133 3.72613 15.6882 4.01902 15.9811C4.31191 16.274 4.78679 16.274 5.07968 15.9811L5.96356 15.0972ZM4.29224 10.0001C4.29224 10.4143 3.95645 10.7501 3.54224 10.7501H2.29224C1.87802 10.7501 1.54224 10.4143 1.54224 10.0001C1.54224 9.58592 1.87802 9.25013 2.29224 9.25013H3.54224C3.95645 9.25013 4.29224 9.58592 4.29224 10.0001ZM4.9029 5.9637C5.1958 6.25659 5.67067 6.25659 5.96356 5.9637C6.25646 5.6708 6.25646 5.19593 5.96356 4.90303L5.07968 4.01915C4.78679 3.72626 4.31191 3.72626 4.01902 4.01915C3.72613 4.31204 3.72613 4.78692 4.01902 5.07981L4.9029 5.9637Z\" fill=\"currentColor\"></path>\n";
				echo "</svg>\n";
				echo "<svg class=\"dark:hidden\" width=\"20\" height=\"20\" viewBox=\"0 0 20 20\" fill=\"none\" xmlns=\"http://www.w3.org/2000/svg\">\n";
				echo "<path d=\"M17.4547 11.97L18.1799 12.1611C18.265 11.8383 18.1265 11.4982 17.8401 11.3266C17.5538 11.1551 17.1885 11.1934 16.944 11.4207L17.4547 11.97ZM8.0306 2.5459L8.57989 3.05657C8.80718 2.81209 8.84554 2.44682 8.67398 2.16046C8.50243 1.8741 8.16227 1.73559 7.83948 1.82066L8.0306 2.5459ZM12.9154 13.0035C9.64678 13.0035 6.99707 10.3538 6.99707 7.08524H5.49707C5.49707 11.1823 8.81835 14.5035 12.9154 14.5035V13.0035ZM16.944 11.4207C15.8869 12.4035 14.4721 13.0035 12.9154 13.0035V14.5035C14.8657 14.5035 16.6418 13.7499 17.9654 12.5193L16.944 11.4207ZM16.7295 11.7789C15.9437 14.7607 13.2277 16.9586 10.0003 16.9586V18.4586C13.9257 18.4586 17.2249 15.7853 18.1799 12.1611L16.7295 11.7789ZM10.0003 16.9586C6.15734 16.9586 3.04199 13.8433 3.04199 10.0003H1.54199C1.54199 14.6717 5.32892 18.4586 10.0003 18.4586V16.9586ZM3.04199 10.0003C3.04199 6.77289 5.23988 4.05695 8.22173 3.27114L7.83948 1.82066C4.21532 2.77574 1.54199 6.07486 1.54199 10.0003H3.04199ZM6.99707 7.08524C6.99707 5.52854 7.5971 4.11366 8.57989 3.05657L7.48132 2.03522C6.25073 3.35885 5.49707 5.13487 5.49707 7.08524H6.99707Z\" fill=\"currentColor\"></path>\n";
				echo "</svg>\n";
				echo "</button>\n";
				echo "<!-- Dark Mode Toggler -->\n";
				
				// User Area
				echo "<div class=\"relative\" @click.outside=\"userDropdownOpen = false\">\n";
				echo "<a class=\"flex items-center text-gray-700 dark:text-gray-400\" href=\"#\" @click.prevent=\"userDropdownOpen = !userDropdownOpen\">\n";
				echo "<span class=\"mr-3 h-11 w-11 overflow-hidden rounded-full\">\n";
				// Use user avatar or initials
				$user_initials = strtoupper(substr($_SESSION["wa_current_user"]->name, 0, 1));
				echo "<span class=\"flex h-full w-full items-center justify-center bg-gray-200 dark:bg-gray-700 text-gray-600 dark:text-gray-300 font-medium\">$user_initials</span>\n";
				echo "</span>\n";
				echo "<span class=\"text-theme-sm mr-1 block font-medium\">".$_SESSION["wa_current_user"]->name."</span>\n";
				echo "<svg :class=\"userDropdownOpen && 'rotate-180'\" class=\"stroke-gray-500 dark:stroke-gray-400\" width=\"18\" height=\"20\" viewBox=\"0 0 18 20\" fill=\"none\" xmlns=\"http://www.w3.org/2000/svg\">\n";
				echo "<path d=\"M4.3125 8.65625L9 13.3437L13.6875 8.65625\" stroke=\"\" stroke-width=\"1.5\" stroke-linecap=\"round\" stroke-linejoin=\"round\"></path>\n";
				echo "</svg>\n";
				echo "</a>\n";
				
				// User Dropdown
				echo "<div x-show=\"userDropdownOpen\" x-cloak x-transition:enter=\"transition ease-out duration-100\" x-transition:enter-start=\"opacity-0 scale-95\" x-transition:enter-end=\"opacity-100 scale-100\" x-transition:leave=\"transition ease-in duration-75\" x-transition:leave-start=\"opacity-100 scale-100\" x-transition:leave-end=\"opacity-0 scale-95\" class=\"shadow-lg absolute right-0 mt-[17px] flex w-[260px] flex-col rounded-2xl border border-gray-200 bg-white p-3 dark:border-gray-700 dark:bg-gray-800\" style=\"display: none;\">\n";
				echo "<div>\n";
				echo "<span class=\"text-theme-sm block font-medium text-gray-700 dark:text-gray-400\">".$_SESSION["wa_current_user"]->name."</span>\n";
				echo "<span class=\"text-theme-xs mt-0.5 block text-gray-500 dark:text-gray-400\">".$db_connections[user_company()]["name"]."</span>\n";
				echo "</div>\n";
				echo "<ul class=\"flex flex-col gap-1 border-b border-gray-200 pt-4 pb-3 dark:border-gray-700\">\n";
				echo "<li>\n";
				echo "<a href=\"$path_to_root/admin/dashboard.php?sel_app=$sel_app\" class=\"group text-theme-sm flex items-center gap-3 rounded-lg px-3 py-2 font-medium text-gray-700 hover:bg-gray-100 hover:text-gray-700 dark:text-gray-400 dark:hover:bg-white/5 dark:hover:text-gray-300\">\n";
				echo "<svg class=\"fill-gray-500 group-hover:fill-gray-700 dark:fill-gray-400 dark:group-hover:fill-gray-300\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" xmlns=\"http://www.w3.org/2000/svg\">\n";
				echo "<path fill-rule=\"evenodd\" clip-rule=\"evenodd\" d=\"M12 3.5C7.30558 3.5 3.5 7.30558 3.5 12C3.5 14.1526 4.3002 16.1184 5.61936 17.616C6.17279 15.3096 8.24852 13.5955 10.7246 13.5955H13.2746C15.7509 13.5955 17.8268 15.31 18.38 17.6167C19.6996 16.119 20.5 14.153 20.5 12C20.5 7.30558 16.6944 3.5 12 3.5ZM17.0246 18.8566V18.8455C17.0246 16.7744 15.3457 15.0955 13.2746 15.0955H10.7246C8.65354 15.0955 6.97461 16.7744 6.97461 18.8455V18.856C8.38223 19.8895 10.1198 20.5 12 20.5C13.8798 20.5 15.6171 19.8898 17.0246 18.8566ZM2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12ZM11.9991 7.25C10.8847 7.25 9.98126 8.15342 9.98126 9.26784C9.98126 10.3823 10.8847 11.2857 11.9991 11.2857C13.1135 11.2857 14.0169 10.3823 14.0169 9.26784C14.0169 8.15342 13.1135 7.25 11.9991 7.25ZM8.48126 9.26784C8.48126 7.32499 10.0563 5.75 11.9991 5.75C13.9419 5.75 15.5169 7.32499 15.5169 9.26784C15.5169 11.2107 13.9419 12.7857 11.9991 12.7857C10.0563 12.7857 8.48126 11.2107 8.48126 9.26784Z\" fill=\"\"></path>\n";
				echo "</svg>\n";
				echo _("Dashboard")."\n";
				echo "</a>\n";
				echo "</li>\n";
				echo "<li>\n";
				echo "<a href=\"$path_to_root/admin/display_prefs.php?\" class=\"group text-theme-sm flex items-center gap-3 rounded-lg px-3 py-2 font-medium text-gray-700 hover:bg-gray-100 hover:text-gray-700 dark:text-gray-400 dark:hover:bg-white/5 dark:hover:text-gray-300\">\n";
				echo "<svg class=\"fill-gray-500 group-hover:fill-gray-700 dark:fill-gray-400 dark:group-hover:fill-gray-300\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" xmlns=\"http://www.w3.org/2000/svg\">\n";
				echo "<path fill-rule=\"evenodd\" clip-rule=\"evenodd\" d=\"M10.4858 3.5L13.5182 3.5C13.9233 3.5 14.2518 3.82851 14.2518 4.23377C14.2518 5.9529 16.1129 7.02795 17.602 6.1682C17.9528 5.96567 18.4014 6.08586 18.6039 6.43667L20.1203 9.0631C20.3229 9.41407 20.2027 9.86286 19.8517 10.0655C18.3625 10.9253 18.3625 13.0747 19.8517 13.9345C20.2026 14.1372 20.3229 14.5859 20.1203 14.9369L18.6039 17.5634C18.4013 17.9142 17.9528 18.0344 17.602 17.8318C16.1129 16.9721 14.2518 18.0471 14.2518 19.7663C14.2518 20.1715 13.9233 20.5 13.5182 20.5H10.4858C10.0804 20.5 9.75182 20.1714 9.75182 19.766C9.75182 18.0461 7.88983 16.9717 6.40067 17.8314C6.04945 18.0342 5.60037 17.9139 5.39767 17.5628L3.88167 14.937C3.67903 14.586 3.79928 14.1372 4.15026 13.9346C5.63949 13.0748 5.63946 10.9253 4.15025 10.0655C3.79926 9.86282 3.67901 9.41401 3.88165 9.06303L5.39764 6.43725C5.60034 6.08617 6.04943 5.96581 6.40065 6.16858C7.88982 7.02836 9.75182 5.9539 9.75182 4.23399C9.75182 3.82862 10.0804 3.5 10.4858 3.5ZM13.5182 2L10.4858 2C9.25201 2 8.25182 3.00019 8.25182 4.23399C8.25182 4.79884 7.64013 5.15215 7.15065 4.86955C6.08213 4.25263 4.71559 4.61859 4.0986 5.68725L2.58261 8.31303C1.96575 9.38146 2.33183 10.7477 3.40025 11.3645C3.88948 11.647 3.88947 12.3531 3.40026 12.6355C2.33184 13.2524 1.96578 14.6186 2.58263 15.687L4.09863 18.3128C4.71562 19.3814 6.08215 19.7474 7.15067 19.1305C7.64015 18.8479 8.25182 19.2012 8.25182 19.766C8.25182 20.9998 9.25201 22 10.4858 22H13.5182C14.7519 22 15.7518 20.9998 15.7518 19.7663C15.7518 19.2015 16.3632 18.8487 16.852 19.1309C17.9202 19.7476 19.2862 19.3816 19.9029 18.3134L21.4193 15.6869C22.0361 14.6185 21.6701 13.2523 20.6017 12.6355C20.1125 12.3531 20.1125 11.647 20.6017 11.3645C21.6701 10.7477 22.0362 9.38152 21.4193 8.3131L19.903 5.68667C19.2862 4.61842 17.9202 4.25241 16.852 4.86917C16.3632 5.15138 15.7518 4.79856 15.7518 4.23377C15.7518 3.00024 14.7519 2 13.5182 2ZM9.6659 11.9999C9.6659 10.7103 10.7113 9.66493 12.0009 9.66493C13.2905 9.66493 14.3359 10.7103 14.3359 11.9999C14.3359 13.2895 13.2905 14.3349 12.0009 14.3349C10.7113 14.3349 9.6659 13.2895 9.6659 11.9999ZM12.0009 8.16493C9.88289 8.16493 8.1659 9.88191 8.1659 11.9999C8.1659 14.1179 9.88289 15.8349 12.0009 15.8349C14.1189 15.8349 15.8359 14.1179 15.8359 11.9999C15.8359 9.88191 14.1189 8.16493 12.0009 8.16493Z\" fill=\"\"></path>\n";
				echo "</svg>\n";
				echo _("Preferences")."\n";
				echo "</a>\n";
				echo "</li>\n";
				echo "<li>\n";
				echo "<a href=\"$path_to_root/admin/change_current_user_password.php?selected_id=".$_SESSION["wa_current_user"]->username."\" class=\"group text-theme-sm flex items-center gap-3 rounded-lg px-3 py-2 font-medium text-gray-700 hover:bg-gray-100 hover:text-gray-700 dark:text-gray-400 dark:hover:bg-white/5 dark:hover:text-gray-300\">\n";
				echo "<svg class=\"fill-gray-500 group-hover:fill-gray-700 dark:fill-gray-400 dark:group-hover:fill-gray-300\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" xmlns=\"http://www.w3.org/2000/svg\">\n";
				echo "<path fill-rule=\"evenodd\" clip-rule=\"evenodd\" d=\"M3.5 12C3.5 7.30558 7.30558 3.5 12 3.5C16.6944 3.5 20.5 7.30558 20.5 12C20.5 16.6944 16.6944 20.5 12 20.5C7.30558 20.5 3.5 16.6944 3.5 12ZM12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2ZM11.0991 7.52507C11.0991 8.02213 11.5021 8.42507 11.9991 8.42507H12.0001C12.4972 8.42507 12.9001 8.02213 12.9001 7.52507C12.9001 7.02802 12.4972 6.62507 12.0001 6.62507H11.9991C11.5021 6.62507 11.0991 7.02802 11.0991 7.52507ZM12.0001 17.3714C11.5859 17.3714 11.2501 17.0356 11.2501 16.6214V10.9449C11.2501 10.5307 11.5859 10.1949 12.0001 10.1949C12.4143 10.1949 12.7501 10.5307 12.7501 10.9449V16.6214C12.7501 17.0356 12.4143 17.3714 12.0001 17.3714Z\" fill=\"\"></path>\n";
				echo "</svg>\n";
				echo _("Change password")."\n";
				echo "</a>\n";
				echo "</li>\n";
				if ($SysPrefs->help_base_url != null) {
					echo "<li>\n";
					echo "<a target=\"_blank\" onclick=\"javascript:openWindow(this.href,this.target); return false;\" href=\"".help_url()."\" class=\"group text-theme-sm flex items-center gap-3 rounded-lg px-3 py-2 font-medium text-gray-700 hover:bg-gray-100 hover:text-gray-700 dark:text-gray-400 dark:hover:bg-white/5 dark:hover:text-gray-300\">\n";
					echo "<svg class=\"fill-gray-500 group-hover:fill-gray-700 dark:fill-gray-400 dark:group-hover:fill-gray-300\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" xmlns=\"http://www.w3.org/2000/svg\">\n";
					echo "<path fill-rule=\"evenodd\" clip-rule=\"evenodd\" d=\"M3.5 12C3.5 7.30558 7.30558 3.5 12 3.5C16.6944 3.5 20.5 7.30558 20.5 12C20.5 16.6944 16.6944 20.5 12 20.5C7.30558 20.5 3.5 16.6944 3.5 12ZM12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2ZM11.0991 7.52507C11.0991 8.02213 11.5021 8.42507 11.9991 8.42507H12.0001C12.4972 8.42507 12.9001 8.02213 12.9001 7.52507C12.9001 7.02802 12.4972 6.62507 12.0001 6.62507H11.9991C11.5021 6.62507 11.0991 7.02802 11.0991 7.52507ZM12.0001 17.3714C11.5859 17.3714 11.2501 17.0356 11.2501 16.6214V10.9449C11.2501 10.5307 11.5859 10.1949 12.0001 10.1949C12.4143 10.1949 12.7501 10.5307 12.7501 10.9449V16.6214C12.7501 17.0356 12.4143 17.3714 12.0001 17.3714Z\" fill=\"\"></path>\n";
					echo "</svg>\n";
					echo _("Help")."\n";
					echo "</a>\n";
					echo "</li>\n";
				}
				echo "</ul>\n";
				echo "<a href=\"$path_to_root/access/logout.php?\" class=\"group text-theme-sm mt-3 flex w-full items-center gap-3 rounded-lg px-3 py-2 font-medium text-gray-700 hover:bg-gray-100 hover:text-gray-700 dark:text-gray-400 dark:hover:bg-white/5 dark:hover:text-gray-300\">\n";
				echo "<svg class=\"fill-gray-500 group-hover:fill-gray-700 dark:group-hover:fill-gray-300\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" xmlns=\"http://www.w3.org/2000/svg\">\n";
				echo "<path fill-rule=\"evenodd\" clip-rule=\"evenodd\" d=\"M15.1007 19.247C14.6865 19.247 14.3507 18.9112 14.3507 18.497L14.3507 14.245H12.8507V18.497C12.8507 19.7396 13.8581 20.747 15.1007 20.747H18.5007C19.7434 20.747 20.7507 19.7396 20.7507 18.497L20.7507 5.49609C20.7507 4.25345 19.7433 3.24609 18.5007 3.24609H15.1007C13.8581 3.24609 12.8507 4.25345 12.8507 5.49609V9.74501L14.3507 9.74501V5.49609C14.3507 5.08188 14.6865 4.74609 15.1007 4.74609L18.5007 4.74609C18.9149 4.74609 19.2507 5.08188 19.2507 5.49609L19.2507 18.497C19.2507 18.9112 18.9149 19.247 18.5007 19.247H15.1007ZM3.25073 11.9984C3.25073 12.2144 3.34204 12.4091 3.48817 12.546L8.09483 17.1556C8.38763 17.4485 8.86251 17.4487 9.15549 17.1559C9.44848 16.8631 9.44863 16.3882 9.15583 16.0952L5.81116 12.7484L16.0007 12.7484C16.4149 12.7484 16.7507 12.4127 16.7507 11.9984C16.7507 11.5842 16.4149 11.2484 16.0007 11.2484L5.81528 11.2484L9.15585 7.90554C9.44864 7.61255 9.44847 7.13767 9.15547 6.84488C8.86248 6.55209 8.3876 6.55226 8.09481 6.84525L3.52309 11.4202C3.35673 11.5577 3.25073 11.7657 3.25073 11.9984Z\" fill=\"\"></path>\n";
				echo "</svg>\n";
				echo _("Sign out")."\n";
				echo "</a>\n";
				echo "</div>\n";
				echo "<!-- Dropdown End -->\n";
				echo "</div>\n";
				echo "<!-- User Area -->\n";
				echo "</div>\n";
				echo "</div>\n";
				echo "</header>\n";
				// ===== Header End =====
				
				// ===== Main Content Start =====
				echo "<main>\n";
				echo "<div class=\"p-4 mx-auto max-w-screen-2xl md:p-6\">\n";
				
				if ($title && !$is_index)
				{
					echo "<div class=\"mb-6\">\n";
					echo "<h1 class=\"text-title-sm font-bold text-gray-800 dark:text-white/90\">$title</h1>\n";
					if (user_hints())
						echo "<span id='hints' class=\"text-theme-sm text-gray-500 dark:text-gray-400\"></span>\n";
					echo "</div>\n";
				}
				
				// AJAX Indicator
				echo "<img id='ajaxmark' src='$indicator' align='center' style='visibility:hidden;position:fixed;top:50%;left:50%;z-index:99999;' alt='ajaxmark'>\n";
			}
			else
			{
				// No menu mode (installer, popups)
				echo "<div class=\"relative flex flex-col flex-1 overflow-x-hidden overflow-y-auto\">\n";
				echo "<main>\n";
				echo "<div class=\"p-4 mx-auto max-w-screen-2xl md:p-6\">\n";
				echo "<center><img id='ajaxmark' src='$indicator' align='center' style='visibility:hidden;' alt='ajaxmark'></center>\n";
			}
		}

		function menu_footer($no_menu, $is_index)
		{
			global $version, $path_to_root, $Pagehelp, $Ajax, $SysPrefs;

			include_once($path_to_root . "/includes/date_functions.inc");

			if ($no_menu == false)
			{
				// Bottom status bar (keyboard shortcuts only) - styled as card
				$phelp = implode('; ', $Pagehelp);
				$Ajax->addUpdate(true, 'hotkeyshelp', $phelp);
				
				echo "<div class=\"mt-6 rounded-lg border border-gray-200 bg-white px-6 py-3 shadow-sm dark:border-[#344054] dark:bg-[#1d2939]\">\n";
				echo "<div id='hotkeyshelp' class=\"text-center text-theme-xs text-gray-500 dark:text-gray-400\">".$phelp."</div>\n";
				echo "</div>\n";
			}
			
			echo "</div>\n"; // max-w container
			echo "</main>\n";
			echo "<!-- ===== Main Content End ===== -->\n";
			echo "</div>\n"; // content area
			echo "<!-- ===== Content Area End ===== -->\n";
			echo "</div>\n"; // page wrapper
			echo "<!-- ===== Page Wrapper End ===== -->\n";
			echo "</div>\n"; // Alpine.js wrapper
			
			if ($no_menu == false)
			{
				echo "<footer class=\"border-t border-gray-200 bg-white py-4 dark:border-[#344054] dark:bg-[#1d2939]\">\n";
				echo "<div class=\"mx-auto max-w-screen-2xl px-6 text-center\">\n";
				// Date and time
				echo "<div class=\"text-theme-xs text-gray-500 dark:text-gray-400 mb-2\">".Today()." | ".Now()."</div>\n";
				// FrontAccounting info
				echo "<a target='_blank' href='".$SysPrefs->power_url."' class=\"text-theme-xs text-gray-500 dark:text-gray-400\">";
				echo $SysPrefs->app_title." $version - "._("Theme:")." ".user_theme()." - ".show_users_online();
				echo "</a>\n";
				echo "<br />\n";
				echo "<a target='_blank' href='".$SysPrefs->power_url."' class=\"text-theme-xs text-brand-500\">";
				echo $SysPrefs->power_by;
				echo "</a>\n";
				echo "</div>\n";
				echo "</footer>\n";
			}
			
			// Load Alpine.js at the end of body for proper DOM initialization
			// This ensures all x-data elements are in the DOM before Alpine starts
			$theme_path = $path_to_root . "/themes/".user_theme();
			echo "<script src='$theme_path/vendor/alpinejs/alpine.min.js'></script>\n";
		}

		// Get shortcuts for the current application
		function get_app_shortcuts($app_id) 
		{
			$shortcuts = array(
				'orders' => array(
					array('link' => 'sales/sales_order_entry.php?NewOrder=Yes', 'label' => _('Sales Order')),
					array('link' => 'sales/sales_order_entry.php?NewInvoice=0', 'label' => _('Direct Invoice')),
					array('link' => 'sales/customer_payments.php?', 'label' => _('Payments')),
					array('link' => 'sales/inquiry/sales_orders_view.php?', 'label' => _('Sales Order Inquiry')),
					array('link' => 'sales/inquiry/customer_inquiry.php?', 'label' => _('Transactions')),
					array('link' => 'sales/manage/customers.php?', 'label' => _('Customers')),
					array('link' => 'sales/manage/customer_branches.php?', 'label' => _('Branch')),
					array('link' => 'reporting/reports_main.php?Class=0', 'label' => _('Reports and Analysis')),
				),
				'AP' => array(
					array('link' => 'purchasing/po_entry_items.php?NewOrder=0', 'label' => _('Purchase Order')),
					array('link' => 'purchasing/inquiry/po_search.php?', 'label' => _('Receive')),
					array('link' => 'purchasing/supplier_invoice.php?New=1', 'label' => _('Supplier Invoice')),
					array('link' => 'purchasing/supplier_payment.php?', 'label' => _('Payments')),
					array('link' => 'purchasing/inquiry/supplier_inquiry.php?', 'label' => _('Transactions')),
					array('link' => 'purchasing/manage/suppliers.php?', 'label' => _('Suppliers')),
					array('link' => 'reporting/reports_main.php?Class=1', 'label' => _('Reports and Analysis')),
				),
				'stock' => array(
					array('link' => 'inventory/adjustments.php?NewAdjustment=1', 'label' => _('Inventory Adjustments')),
					array('link' => 'inventory/inquiry/stock_movements.php?', 'label' => _('Inventory Movements')),
					array('link' => 'inventory/manage/items.php?', 'label' => _('Items')),
					array('link' => 'inventory/prices.php?', 'label' => _('Sales Pricing')),
					array('link' => 'reporting/reports_main.php?Class=2', 'label' => _('Reports and Analysis')),
				),
				'manuf' => array(
					array('link' => 'manufacturing/work_order_entry.php?', 'label' => _('Work Order Entry')),
					array('link' => 'manufacturing/search_work_orders.php?outstanding_only=1', 'label' => _('Outstanding Work Orders')),
					array('link' => 'manufacturing/search_work_orders.php?', 'label' => _('Work Order Inquiry')),
					array('link' => 'manufacturing/manage/bom_edit.php?', 'label' => _('Bills Of Material')),
					array('link' => 'reporting/reports_main.php?Class=3', 'label' => _('Reports and Analysis')),
				),
				'assets' => array(
					array('link' => 'purchasing/po_entry_items.php?NewInvoice=Yes&FixedAsset=1', 'label' => _('Fixed Assets Purchase')),
					array('link' => 'fixed_assets/inquiry/stock_inquiry.php?', 'label' => _('Fixed Assets Inquiry')),
					array('link' => 'inventory/manage/items.php?FixedAsset=1', 'label' => _('Fixed Assets')),
					array('link' => 'fixed_assets/process_depreciation.php?', 'label' => _('Depreciations')),
					array('link' => 'reporting/reports_main.php?Class=7', 'label' => _('Reports and Analysis')),
				),
				'proj' => array(
					array('link' => 'dimensions/dimension_entry.php?', 'label' => _('Dimension Entry')),
					array('link' => 'dimensions/inquiry/search_dimensions.php?', 'label' => _('Dimension Inquiry')),
					array('link' => 'reporting/reports_main.php?Class=4', 'label' => _('Reports and Analysis')),
				),
				'GL' => array(
					array('link' => 'gl/gl_bank.php?NewPayment=Yes', 'label' => _('Payments')),
					array('link' => 'gl/gl_bank.php?NewDeposit=Yes', 'label' => _('Deposits')),
					array('link' => 'gl/gl_journal.php?NewJournal=Yes', 'label' => _('Journal Entry')),
					array('link' => 'gl/inquiry/bank_inquiry.php?', 'label' => _('Bank Account Inquiry')),
					array('link' => 'gl/inquiry/gl_trial_balance.php?', 'label' => _('Trial Balance')),
					array('link' => 'gl/manage/exchange_rates.php?', 'label' => _('Exchange Rates')),
					array('link' => 'gl/manage/gl_accounts.php?', 'label' => _('GL Accounts')),
					array('link' => 'reporting/reports_main.php?Class=6', 'label' => _('Reports and Analysis')),
				),
				'system' => array(
					array('link' => 'admin/company_preferences.php?', 'label' => _('Company Setup')),
					array('link' => 'admin/gl_setup.php?', 'label' => _('General GL')),
					array('link' => 'taxes/tax_types.php?', 'label' => _('Taxes')),
					array('link' => 'taxes/tax_groups.php?', 'label' => _('Tax Groups')),
					array('link' => 'admin/forms_setup.php?', 'label' => _('Forms Setup')),
					array('link' => 'admin/backups.php?', 'label' => _('Backup and Restore')),
				),
			);
			
			return isset($shortcuts[$app_id]) ? $shortcuts[$app_id] : array();
		}
		
		function display_applications(&$waapp)
		{
			global $path_to_root;

			$selected_app = $waapp->get_selected_application();
			if (!$_SESSION["wa_current_user"]->check_application_access($selected_app))
				return;

			if (method_exists($selected_app, 'render_index'))
			{
				$selected_app->render_index();
				return;
			}

			// Page title - strip keyboard shortcut marker (&) from name
			$page_title = str_replace('&', '', $selected_app->name);
			// Override display name for GL to shorten it
			if ($selected_app->id == 'GL') {
				$page_title = str_replace('Banking and General Ledger', 'Banking & General Ledger', $page_title);
			}
			echo "<div class=\"mb-6\">\n";
			echo "<h1 class=\"text-2xl font-bold text-gray-800 dark:text-white/90\">".$page_title."</h1>\n";
			echo "<p class=\"mt-1 text-sm text-gray-500 dark:text-gray-400\">"._("Select a function from the menu below or use the quick links")."</p>\n";
			echo "</div>\n";
			
			// Display shortcuts bar
			$shortcuts = $this->get_app_shortcuts($selected_app->id);
			if (!empty($shortcuts)) {
				echo "<div class=\"mb-6 flex flex-wrap gap-2 rounded-lg border border-gray-200 bg-white p-4 shadow-sm dark:border-[#344054] dark:bg-[#1d2939]\">\n";
				foreach ($shortcuts as $shortcut) {
					echo "<a href=\"$path_to_root/".$shortcut['link']."\" class=\"inline-flex items-center rounded-md bg-gray-100 px-3 py-2 text-sm font-medium text-gray-700 transition hover:bg-primary hover:text-white dark:bg-[#344054] dark:text-gray-300 dark:hover:bg-primary dark:hover:text-white\">\n";
					echo $shortcut['label'];
					echo "</a>\n";
				}
				// Add Dashboard link
				$sel_app = $_SESSION['sel_app'];
				echo "<a href=\"$path_to_root/admin/dashboard.php?sel_app=$sel_app\" class=\"inline-flex items-center rounded-md bg-primary/10 px-3 py-2 text-sm font-medium text-primary transition hover:bg-primary hover:text-white dark:bg-primary/20 dark:text-primary-light dark:hover:bg-primary dark:hover:text-white\">\n";
				echo "<svg class=\"mr-1.5 h-4 w-4\" fill=\"none\" stroke=\"currentColor\" viewBox=\"0 0 24 24\" xmlns=\"http://www.w3.org/2000/svg\"><path stroke-linecap=\"round\" stroke-linejoin=\"round\" stroke-width=\"2\" d=\"M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6\"></path></svg>\n";
				echo _('Dashboard');
				echo "</a>\n";
				echo "</div>\n";
			}

			// TailAdmin-style module cards
			echo "<div class=\"grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3\">\n";
			
			foreach ($selected_app->modules as $module)
			{
        		if (!$_SESSION["wa_current_user"]->check_module_access($module))
        			continue;
				
				echo "<div class=\"rounded-lg border border-gray-200 bg-white p-6 shadow-sm dark:border-[#344054] dark:bg-[#1d2939]\">\n";
				echo "<h3 class=\"mb-4 text-lg font-semibold text-gray-800 dark:text-white/90\">".$module->name."</h3>\n";
				echo "<div class=\"space-y-2\">\n";
				
				// Left column items
				foreach ($module->lappfunctions as $appfunction)
				{
					$img = $this->get_icon($appfunction->category);
					if ($appfunction->label == "")
						echo "<div class=\"h-2\"></div>\n";
					elseif ($_SESSION["wa_current_user"]->can_access_page($appfunction->access)) 
					{
						echo "<div class=\"flex items-center gap-2\">\n";
						echo $img.menu_link($appfunction->link, $appfunction->label);
						echo "</div>\n";
					}
					elseif (!$_SESSION["wa_current_user"]->hide_inaccessible_menu_items())
					{
						echo "<div class=\"flex items-center gap-2 text-gray-400 dark:text-gray-600\">\n";
						echo $img.'<span class="inactive">'.access_string($appfunction->label, true)."</span>\n";
						echo "</div>\n";
					}
				}
				
				// Right column items
				if (sizeof($module->rappfunctions) > 0)
				{
					foreach ($module->rappfunctions as $appfunction)
					{
						$img = $this->get_icon($appfunction->category);
						if ($appfunction->label == "")
							echo "<div class=\"h-2\"></div>\n";
						elseif ($_SESSION["wa_current_user"]->can_access_page($appfunction->access)) 
						{
							echo "<div class=\"flex items-center gap-2\">\n";
							echo $img.menu_link($appfunction->link, $appfunction->label);
							echo "</div>\n";
						}
						elseif (!$_SESSION["wa_current_user"]->hide_inaccessible_menu_items())
						{
							echo "<div class=\"flex items-center gap-2 text-gray-400 dark:text-gray-600\">\n";
							echo $img.'<span class="inactive">'.access_string($appfunction->label, true)."</span>\n";
							echo "</div>\n";
						}
					}
				}
				
				echo "</div>\n";
				echo "</div>\n";
			}
			echo "</div>\n";
  		}
	}
