<?php

/**
 * Import Google fonts
 */
$link = 'http://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic';
$settings = array(
	'type' => 'external',
	'group' => CSS_THEME,
	'every_page' => TRUE
);
drupal_add_css($link, $settings);

/**
 * Import responsive nav
 */
$link = drupal_get_path('theme', 'ayurdo') .'/js/responsive-nav/responsive-nav.min.js';
$settings = array(
	'scope' => 'footer',
	'group' => JS_LIBRARY,
);
drupal_add_js($link, $settings);

/**
 * Import jQuery qTip
 */
$link = drupal_get_path('theme', 'ayurdo') .'/js/jquery.qtip.custom/jquery.qtip.min.js';
$settings = array(
	'scope' => 'footer',
	'group' => JS_LIBRARY,
);
drupal_add_js($link, $settings);

$link = drupal_get_path('theme', 'ayurdo') .'/js/jquery.qtip.custom/jquery.qtip.min.css';
$settings = array(
	'group' => CSS_THEME,
);
drupal_add_css($link, $settings);

/**
 * Import slick slider
 */
$link = drupal_get_path('theme', 'ayurdo') .'/js/slick/slick.min.js';
$settings = array(
	'scope' => 'footer',
	'group' => JS_LIBRARY,
);
drupal_add_js($link, $settings);

$link = drupal_get_path('theme', 'ayurdo') .'/js/slick/slick.css';
$settings = array(
	'group' => CSS_THEME,
);
drupal_add_css($link, $settings);

/**
 * Import theme js
 */
$link = drupal_get_path('theme', 'ayurdo') .'/js/script.js';
$settings = array(
	'scope' => 'footer',
	'group' => JS_THEME,
);
drupal_add_js($link, $settings);






function ayurdo_css_alter(&$css) {
  // Remove system css files.
  unset($css[drupal_get_path('module', 'system') . '/system.menus.css']);
  unset($css[drupal_get_path('module', 'system') . '/system.theme.css']);
  unset($css[drupal_get_path('module', 'system') . '/system.messages.css']);
  unset($css[drupal_get_path('module', 'search') . '/search.css']);
}

function ayurdo_preprocess_html(&$variables) {
  // Classes for body element. Allows advanced theming based on context
  if (!$variables['is_front']) {
    // Add unique class for each page.
    $path = drupal_get_path_alias($_GET['q']);
    // Add unique class for each website section.
    list($section, ) = explode('/', $path, 2);
    $arg = explode('/', $_GET['q']);
    if ($arg[0] == 'node' && isset($arg[1])) {
      if ($arg[1] == 'add') {
        $section = 'node-add';
      }
      elseif (isset($arg[2]) && is_numeric($arg[1]) && ($arg[2] == 'edit' || $arg[2] == 'delete')) {
        $section = 'node-' . $arg[2];
      }
    }
    $variables['classes_array'][] = drupal_html_class('section-' . $section);
  }
}

function ayurdo_preprocess_page(&$variables) {

  // Page templates per content type
  if (isset($vars['node'])) {
    // If the node type is "blog_madness" the template suggestion will be "page--blog-madness.tpl.php".
    $vars['theme_hook_suggestions'][] = 'page__'. $vars['node']->type;
  }
}

/**
 * Implements template_breadcrumb().
 */
function ayurdo_breadcrumb($variables) {
  $breadcrumb = $variables['breadcrumb'];
  $title = strip_tags(drupal_get_title());

  if (!empty($breadcrumb)) {
    // Provide a navigational heading to give context for breadcrumb links to
    // screen-reader users. Make the heading invisible with .element-invisible.
    $output = '<h2 class="element-invisible">' . t('You are here') . '</h2>';

    // Change this to customise the output
    $output .= '<div class="breadcrumb">' . implode(' &raquo; ', $breadcrumb) . '</div>';
    return $output;
  }
}

/**
 * Clean up the Sitemap module's markup
 */

function ayurdo_site_map_box($variables) {
  $title = $variables['title'];
  $content = $variables['content'];
  $attributes = $variables['attributes'];

  $output = '';
  if (!empty($title) || !empty($content)) {
    if (!empty($content)) {
      $output .= $content ;
    }
  }
  return $output;
}
/*
function ayurdo_site_map_menu_tree($variables) {
  return '<ul>' . $variables['tree'] . '</ul>';
}
*/



/**
 * Returns HTML for status and/or error messages, grouped by type.
 */
function ayurdo_status_messages($variables) {
  $display = $variables['display'];
  $output = '';

  $status_heading = array(
    'status' => t('Status message'),
    'error' => t('Error message'),
    'warning' => t('Warning message'),
    'info' => t('Informative message'),
  );

  $status_class = array(
    'status' => 'status',
    'error' => 'error',
    'warning' => 'warning',
    // Not supported, but in theory a module could send any type of message.
    // @see drupal_set_message()
    // @see theme_status_messages()
    'info' => 'info',
  );

  foreach (drupal_get_messages($display) as $type => $messages) {
    $class = (isset($status_class[$type])) ? $status_class[$type] : '';
    $output .= "<div class=\"alert $class\">\n";
    $output .= "  <a class=\"close\" href=\"#\">&times;</a>\n";

    if (!empty($status_heading[$type])) {
      $output .= '<h4 class="element-invisible">' . $status_heading[$type] . "</h4>\n";
    }

    if (count($messages) > 1) {
      $output .= " <ul>\n";
      foreach ($messages as $message) {
        $output .= '  <li>' . $message . "</li>\n";
      }
      $output .= " </ul>\n";
    }
    else {
      $output .= $messages[0];
    }

    $output .= "</div>\n";
  }
  return $output;
}

/**
 * Implements hook_form_alter()
 */
function ayurdo_form_alter(&$form, &$form_state, $form_id) {
  // add a field that needs to stay empty against spam
  // http://www.ngenworks.com/blog/invisible_captcha_to_prevent_form_spam
  $form['leaveblank'] = array(
    '#type' => 'textfield',
    '#title' => 'Please leave blank',
  );
  // add validation function
  $form['#validate'][] = 'ayurdo_nospam_validate';
}

/**
 * additional validation function for forms
 */
function ayurdo_nospam_validate($form, &$form_state){
  // make sure 'leaveblank' field stays empty
  if( $form_state['values']['leaveblank'] != '' ) {
    form_set_error('leaveblank', t('Leave blank field must stay empty')); 
  }
}

/**
 * impelemts hook_form_ID_alter
 * to change the search block
 */
function ayurdo_form_search_block_form_alter(&$form, &$form_state) {
  $form['search_block_form']['#attributes']['placeholder'] = t('search...');
}


/**
 * Implements hook_preprocess_block()
 * to get more descriptive html-id's for blogs (only manually created ones)
 */
function ayurdo_preprocess_block(&$variables){

	$block_element = $variables['elements']['#block'];
	if($block_element->module === 'block'){
		
		$id = $block_element->delta;
		$block = module_invoke('block', 'block_info', $id);
		
		if( isset($block[$id]['info']) ){
			$variables['block_html_id'] = cssifyString($block[$id]['info']);	
		}
	}
}
// needed for block-id renaming
function cssifyString($string) {
    $string = strtolower($string); //Lower case everything
    $string = preg_replace("/[^a-z0-9_\s-]/", "", $string); //Make alphanumeric (removes all other characters)
    $string = preg_replace("/[\s-]+/", " ", $string); //Clean up multiple dashes or whitespaces
    $string = preg_replace("/[\s_]/", "-", $string); //Convert whitespaces and underscore to dash
    return $string;
}
