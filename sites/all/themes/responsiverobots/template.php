<?php
/**
 * Implmentation of hook_theme().
 */
function responsiverobots_theme() {
  return array(
    // Add our own function to override the default node form for story.
    'article_node_form' => array(
      'render element' => 'form',
    ),
  );
}

/**
 * Implements hook_form_FORM_ID_alter().
 */
function responsiverobots_form_article_node_form_alter(&$form, &$form_state) {
  // Move the status element outside of the options fieldset so that it doesn't
  // get taken over by the vertical tabs #pre_render operation. If the status
  // element is not moved here you'll end up with duplicates when trying to
  // render the status element on it's own below.
  $form['status'] = $form['options']['status'];
  unset($form['options']['status']);
}

/**
 * Custom function to pull the Published check box out and make it obvious.
 */
function responsiverobots_article_node_form($variables) {
  $form = $variables['form'];
  $published = drupal_render($form['status']);
  $buttons = drupal_render($form['actions']);
  // Make sure we also render the rest of the form, not just our custom stuff.
  $everything_else = drupal_render_children($form);
  return $everything_else . $published . $buttons;
}

/**
 * Add custom PHPTemplate variables into the node template.
 */
function responsiverobots_preprocess_node(&$vars) {
  // Grab the node object.
  $node = $vars['node'];
  // Make individual variables for the parts of the date.
  $vars['date_day'] = format_date($node->created, 'custom', 'j');
  $vars['date_month'] = format_date($node->created, 'custom', 'M');
  $vars['date_year'] = format_date($node->created, 'custom', 'Y');

  // Add the .post class to all nodes.
  $vars['classes_array'][] = 'post';

  // Change the theme function used for rendering the list of tags.
  $vars['content']['field_tags']['#theme'] = 'links';
}


/**
 * Override the breadcrumb to allow for a theme delimiter setting.
 */
function responsiverobots_breadcrumb($variables) {
  $breadcrumb = $variables['breadcrumb'];
  $delimiter = theme_get_setting('breadcrumb_delimiter');

  if (!empty($breadcrumb)) {
    $output = '<h2 class="element-invisible">' . t('You are here') . '</h2>';

    $output .= '<div class="breadcrumb">' . implode($delimiter, $breadcrumb) . '</div>';
    return $output;
  }
}

/**
 * Preprocess function for theme_username().
 *
 * Override the username display to automatically swap out username for a 
 * field called real_name, if it exists.
 */
function responsiverobots_preprocess_username(&$variables) {
  // Ensure that the full user object is loaded.
  $account = user_load($variables['account']->uid);

  // See if it has a real_name field and add that as the name instead.
  if (isset($account->field_real_name[LANGUAGE_NONE][0]['safe_value'])) {
    $variables['name'] = $account->field_real_name[LANGUAGE_NONE][0]['safe_value'];
  }
}

/**
 * Implements hook_form_FORM_ID_alter().
 *
 * Override the search box to add our pretty graphic instead of the button.
 */
function responsiverobots_form_search_block_form_alter(&$form, &$form_state) {
  $form['actions']['submit']['#type'] = 'image_button';
  $form['actions']['submit']['#src'] = drupal_get_path('theme', 'responsiverobots') . '/images/search.png';
  $form['actions']['submit']['#attributes']['class'][] = 'btn';
}
