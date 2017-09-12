<?php

/**
 * @file
 * Default theme implementation to provide an HTML container for comments.
 *
 * Available variables:
 * - $content: The array of content-related elements for the node. Use
 *   render($content) to print them all, or
 *   print a subset such as render($content['comment_form']).
 * - $classes: String of classes that can be used to style contextually through
 *   CSS. It can be manipulated through the variable $classes_array from
 *   preprocess functions. The default value has the following:
 *   - comment-wrapper: The current template type, i.e., "theming hook".
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 *
 * The following variables are provided for contextual information.
 * - $node: Node object the comments are attached to.
 * The constants below the variables show the possible values and should be
 * used for comparison.
 * - $display_mode
 *   - COMMENT_MODE_FLAT
 *   - COMMENT_MODE_THREADED
 *
 * Other variables:
 * - $classes_array: Array of html class attribute values. It is flattened
 *   into a string within the variable $classes.
 *
 * @see template_preprocess_comment_wrapper()
 *
 * @ingroup themeable
 */
?>
<div id="comments-wrapper" class="<?php print $classes; ?>"<?php print $attributes; ?>>
 <?php if($node->comment != 0) :?>
    <?php if ($content['comments']): ?>
      <div class="section-title">
        <h3>
          <?php print t(' Comments'); ?> 
        </h3>
        <div class="divider"></div>
        <p><?php print t('Your feedbacks very important for us!');?></p>
      </div>
      <ul class="media-list">
        <?php print render($content['comments']); ?>
      </ul>
    <?php endif; ?>
  
    <?php if ($content['comment_form']): ?>
      <div class="comment-form-wrapper">
        <div class="section-title">
          <h3>
            <?php print t(' Leave a Comment'); ?> 
          </h3>
          <div class="divider"></div>
          <p><?php print t('Your feedbacks very important for us!');?></p>
        </div>
        <?php print render($content['comment_form']); ?>
      </div>  
    <?php endif; ?>
 <?php endif; ?> 
</div>

