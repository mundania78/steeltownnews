<?php

/**
 * @file
 * The template.php overrides for theme, hooks, preprocessors, and other utilities.
 */

/**
 * Automated Cache Clearing
 *
 * For development purpose only, this cannot be enabled on a live
 * website or else it will make everyone that uses the site sad.
 */

/* Clear all Drupal core caches */
//drupal_flush_all_caches();

/* Clear all Views caches (for file-based views */
//views_invalidate_cache();


/**
 * Instead of having an enormous template.php, we break funcitons
 * out by group into files, and include them here.
 */
require_once 'inc/preprocess.inc';
require_once 'inc/hooks.inc';
require_once 'inc/theme.inc';
require_once 'inc/utility.inc';