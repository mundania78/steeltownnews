<?php

/**
 * @file
 * The template.php hook specific overrides
 */


/**
 * Implementats hook_html_head_alter().
 */
function proposal_html_head_alter(&$head_elements) {

  // Update the charset to use HTML5 format
  $head_elements['system_meta_content_type'] = array(
    '#type' => 'html_tag',
    '#tag' => 'meta',
    '#attributes' => array(
      'charset' => 'UTF-8'
    ),
    '#weight' => -1000
  );

  // Adding "maximum-scale=1" fixes the Mobile Safari
  // auto-zoom bug: http://filamentgroup.com/examples/iosScaleBug/
  $head_elements['system_meta_viewport'] = array(
    '#type' => 'html_tag',
    '#tag' => 'meta',
    '#attributes' => array(
      'name' => 'viewport',
      'content' => 'user-scalable=no, width=device-width, initial-scale=1.0, maximum-scale=1.0'
    ),
    '#weight' => -1000
  );
  $head_elements['system_meta_apple_mobile_web_app_capable'] = array(
    '#type' => 'html_tag',
    '#tag' => 'meta',
    '#attributes' => array(
      'name' => 'apple-mobile-web-app-capable',
      'content' => 'yes'
    ),
    '#weight' => -1000
  );
  $head_elements['system_meta_apple_mobile_web_app_status_bar_style'] = array(
    '#type' => 'html_tag',
    '#tag' => 'meta',
    '#attributes' => array(
      'name' => 'apple-mobile-web-app-status-bar-style',
      'content' => 'black'
    ),
    '#weight' => -1000
  );

  $head_elements['google_site_verification'] = array(
    '#type' => 'html_tag',
    '#tag' => 'meta',
    '#attributes' => array(
      'name' => 'google-site-verification',
      'content' => 'esJOvXKWYAR8LDxxrN80CUUusIyaG8j8a1Wx-wDzjds'
    ),
    '#weight' => -1000
  );

  // Remove unnecessary <head> information
  unset($head_elements['system_meta_generator']);
}


