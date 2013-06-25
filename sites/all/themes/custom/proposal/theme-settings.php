<?php

/**
 *
 * @file
 * The custom settings for the core theme.
 */

/**
 * Implements hook_form_system_theme_settings_alter().
 *
 * @param $saved_settings
 *   array An array of saved settings for this theme.
 * @return
 *   array A form array.
 *
 * @see
 *   hook_form_system_theme_settings_alter
 */
function proposal_form_system_theme_settings_alter(&$form, $form_state) {

    $form['theme_settings'] = array(
      '#type' => 'hidden'
    );

    $form['about_title'] = array(
      '#type' => 'textfield',
      '#title' => t('Title'),
      '#default_value' => theme_get_setting('about_title', 'proposal'),
    );
    $form['about_description'] = array(
      '#type' => 'textarea',
      '#title' => t('Description'),
      '#default_value' => theme_get_setting('about_description', 'proposal'),
    );
    $form['about_address'] = array(
      '#type' => 'textarea',
      '#title' => t('Address'),
      '#default_value' => theme_get_setting('about_address', 'proposal'),
    );
    $form['about_phone'] = array(
      '#type' => 'textfield',
      '#title' => t('Phone'),
      '#default_value' => theme_get_setting('about_phone', 'proposal'),
    );
    $form['about_fax'] = array(
      '#type' => 'textfield',
      '#title' => t('Fax'),
      '#default_value' => theme_get_setting('about_fax', 'proposal'),
    );
    $form['about_email'] = array(
      '#type' => 'textfield',
      '#title' => t('Email'),
      '#default_value' => theme_get_setting('about_email', 'proposal'),
    );

}
