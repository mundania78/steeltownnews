<?php

/**
 * @file
 * Theme specific utility functions/methods
 */


/**
 * Convert a string (e.g., News &amp; Events) to a usable CSS selector (e.g., id="news-events", class="news-events").
 *
 * @param $text
 * @param $module
 * @return $text
 */
function check_selector($text, $module = '') {

  if ($text == "" && $module == "") {
    return $text;
  }
  elseif ($text == "" && $module != "") {
    $text = $module;
  }

  // Step 1: remove all uppercase
  $text = strtolower($text);
  
  // Step 2: make sure we are not dealing with encoded HTML Special Characters, if so we cannot remove them properly in the next command
  $text = htmlspecialchars_decode($text);

  // Step 3: replace all non-alphanumeric characters with spaces
  $text = preg_replace("/[^a-zA-Z0-9\s]/", ' ', $text);

  // Step 4: remove all HTML characters
  $text = htmlspecialchars($text, ENT_QUOTES, 'UTF-8');
  
  // Step 5: replace all spaces with hyphens
  $text = str_replace(' ' , '-', $text);
  
  // Step 6: replace multiple-sequential hypens with a single hypen
  $text = preg_replace('{\-+}', '-', $text);
  
  // Step 7: return cleaned up text as selector
  return $text;
}


/**
 * Retrieve an ID for the next/previous magazine issue
 *
 * @param $sort
 */
function af_magazine_issue($current_issue_nid, $sort = 'next') {

  $node_id = check_plain($current_issue_nid);
  $node = node_load($node_id);
  
  //drupal_set_message('<code><pre>' . print_r($node, TRUE) . '</pre></code>');
  
  $issue_number = $node->field_magazine_issue_number['und'][0]['value'];

  if ($sort == 'previous') {
    $issue_number = ($issue_number-1);
  }
  elseif ($sort == 'next') {
    $issue_number = ($issue_number+1);
  }
  
  return $issue_number;
}


function aarg($index = NULL, $path = NULL) {
  if (!isset($path)) {
    $path = drupal_get_path_alias($_GET['q']);
  }
  if (!isset($arguments[$path])) {
    $arguments[$path] = explode('/', $path);
  }
  if (!isset($index)) {
    return $arguments[$path];
  }
  if (isset($arguments[$path][$index])) {
    return $arguments[$path][$index];
  }
}



/**
 * Determines what the current "Featured Week" is on the
 * front page of the website;
 *
 * @param null
 *
 * @return featured week term id (int)
 */
function _proposal_featured_week() {

  $front_page = variable_get('site_frontpage', 'node/2173');
  $node_id = str_replace('node/', '', check_plain($front_page));

  return db_query("SELECT field_featured_week_tid 
                   FROM {field_data_field_featured_week}
                   WHERE entity_id = :nid AND
                         entity_type = 'node' AND
                         bundle = 'front_page'", 
                   array(
                     ':nid' => $node_id
                   )
                  )->FetchField();
}


/**
 * Determines what the current "Featured Week" is on the
 * front page of the website;
 *
 * @param null
 *
 * @return featured series term id (int)
 */
function _proposal_featured_series() {

  $front_page = variable_get('site_frontpage', 'node/2173');
  $node_id = str_replace('node/', '', check_plain($front_page));

  return db_query("SELECT field_featured_series_tid 
                   FROM field_data_field_featured_series
                   WHERE entity_id = :nid AND
                         entity_type = 'node' AND
                         bundle = 'front_page'", 
                   array(
                     ':nid' => $node_id
                   )
                  )->FetchField();
}



