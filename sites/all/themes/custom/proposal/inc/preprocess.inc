<?php

/**
 * @file
 * The template.php preprocessors
 */


/**
 * Implements hook_preprocess_html().
 */
function proposal_preprocess_html(&$variables, $hook) {

  if ($node = menu_get_object()) {
    if (isset($node->type)) {
      $variables['theme_hook_suggestions'][] = 'html__' . str_replace('_', '--', $node->type);
    }
  } 
  
  if (aarg(0) != 'content') {
    $variables['body_id'] = aarg(0);
  }

}


/**
 * Implements hook_preprocess_html().
 */
function proposal_preprocess_node(&$variables) {

}


/**
 * Implements hook_preprocess_page().
 */
function proposal_preprocess_page(&$variables, $hook) {

  global $base_url;

  /**
   * Allow for page templates, based on node type
   */
  if (isset($variables['node'])) {
    $variables['theme_hook_suggestions'][] = 'page__node__' . str_replace('_', '--', $variables['node']->type);
  }

  /**
   * Setup a useable variable for the logo
   */
  if (!$logo = theme_get_setting('logo_path')) {
      $logo = theme_get_setting('logo');
  }

  if (!empty($logo)) {
    // [1]
    // Remove the base URL from the result returned by theme_get_setting('logo').
    // If you don't need the relative path, you can remove this code.
    if (strpos($logo, $base_url) === 0) {
      $logo = drupal_substr($logo, drupal_strlen($base_url));
    }
  }

}


/**
 * Implements hook_css_alter().
 */
function proposal_css_alter(&$css) {

  // Remove core block stylesheet(s)
  unset($css[drupal_get_path('module', 'block') . '/block.css']);

  // Remove core date stylesheet(s)
  unset($css[drupal_get_path('module', 'date') . '/date_api/date.css']);

  // Remove core ctools stylesheet(s)
  unset($css[drupal_get_path('module', 'ctools') . '/css/ctools.css']);

  // Remove core fields stylesheet(s)
  unset($css[drupal_get_path('module', 'field') . '/theme/field.css']);

  // Remove core node stylesheet(s)
  unset($css[drupal_get_path('module', 'node') . '/node.css']);

  // Remove core system stylesheet(s)
  unset($css[drupal_get_path('module', 'system') . '/admin.css']);
  unset($css[drupal_get_path('module', 'system') . '/defaults.css']);
  unset($css[drupal_get_path('module', 'system') . '/system.css']);
  unset($css[drupal_get_path('module', 'system') . '/system.base.css']);
  unset($css[drupal_get_path('module', 'system') . '/system.menus.css']);
  unset($css[drupal_get_path('module', 'system') . '/system.messages.css']);
  unset($css[drupal_get_path('module', 'system') . '/system.theme.css']);

  // Remove core user stylesheet(s)
  unset($css[drupal_get_path('module', 'user') . '/user.css']);

  // Remove core views stylesheet(s)
  unset($css[drupal_get_path('module', 'views') . '/css/views.css']);
}