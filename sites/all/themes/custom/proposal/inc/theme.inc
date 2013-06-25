<?php

/**
 * @file
 * The template.php theme specific overrides
 */

/**
 * Implements hook_form_alter().
 */
function proposal_form_alter(&$form, &$form_state, $form_id) {

  //drupal_set_message('<code><pre>' . print_r($form, TRUE). '</pre></code>');

  switch ($form_id) {
    
    /* Search Block that appears in the header */
    case 'search_block_form':
      $form['search_block_form']['#title'] = t('');
      $form['search_block_form']['#attributes'] = array('placeholder' => t('Search'));
      
      $form['actions']['submit']['#value'] = t('Go');
      break;

    case 'apachesolr_search_custom_page_search_form':
      break;
    
  }

}


/**
 * Implements theme_menu_local_tasks().
 */
function proposal_menu_local_tasks(&$variables) {

  $output = '';
  
  if (!empty($variables['primary'])) {
    $variables['primary']['#prefix'] = '<ul class="nav tabs primary">';
    $variables['primary']['#suffix'] = '</ul>';
    $output .= drupal_render($variables['primary']);
  }
  if (!empty($variables['secondary']) && isset($variables['secondary']['#prefix']) && isset($variables['secondary']['#suffix'])) {
    $variables['secondary']['#prefix'] = '<ul class="nav tabs secondary">';
    $variables['secondary']['#suffix'] = '</ul>';
    $output .= drupal_render($variables['secondary']);
  }

  return $output;
}