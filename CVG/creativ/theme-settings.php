<?php
/**
 * Implements hook_form_system_theme_settings_alter()
 */
function creativ_form_system_theme_settings_alter(&$form, &$form_state, $form_id = NULL) {
    $theme_key = arg(3);
    $form['drupalexp_settings'] = array(
        '#type' => 'vertical_tabs',
    );
    $form['creativ_settings'] = array(
        '#type' => 'fieldset',
        '#title' => t('Creativ'),
        '#group' => 'drupalexp_settings',
    );
    $form['creativ_settings']['preload'] = array(
        '#type' => 'select',
        '#title' => t('Enable Preloader'),
        '#options' => array(0=>'No', 1=>'Yes'),
        '#default_value' => theme_get_setting('preload','creativ'),
    );
}
