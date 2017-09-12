<?php
/**
* @file
* Default theme implementation to display a node.
*
* Available variables:
* - $title: the (sanitized) title of the node.
* - $content: An array of node items. Use render($content) to print them all,
* or print a subset such as render($content['field_example']). Use
* hide($content['field_example']) to temporarily suppress the printing of a
* given element.
* - $user_picture: The node author's picture from user-picture.tpl.php.
* - $date: Formatted creation date. Preprocess functions can reformat it by
* calling format_date() with the desired parameters on the $created variable.
* - $name: Themed username of node author output from theme_username().
* - $node_url: Direct URL of the current node.
* - $display_submitted: Whether submission information should be displayed.
* - $submitted: Submission information created from $name and $date during
* template_preprocess_node().
* - $classes: String of classes that can be used to style contextually through
* CSS. It can be manipulated through the variable $classes_array from
* preprocess functions. The default values can be one or more of the
* following:
* - node: The current template type; for example, "theming hook".
* - node-[type]: The current node type. For example, if the node is a
* "Blog entry" it would result in "node-blog". Note that the machine
* name will often be in a short form of the human readable label.
* - node-teaser: Nodes in teaser form.
* - node-preview: Nodes in preview mode.
* The following are controlled through the node publishing options.
* - node-promoted: Nodes promoted to the front page.
* - node-sticky: Nodes ordered above other non-sticky nodes in teaser
* listings.
* - node-unpublished: Unpublished nodes visible only to administrators.
* - $title_prefix (array): An array containing additional output populated by
* modules, intended to be displayed in front of the main title tag that
* appears in the template.
* - $title_suffix (array): An array containing additional output populated by
* modules, intended to be displayed after the main title tag that appears in
* the template.
*
* Other variables:
* - $node: Full node object. Contains data that may not be safe.
* - $type: Node type; for example, story, page, blog, etc.
* - $comment_count: Number of comments attached to the node.
* - $uid: User ID of the node author.
* - $created: Time the node was published formatted in Unix timestamp.
* - $classes_array: Array of html class attribute values. It is flattened
* into a string within the variable $classes.
* - $zebra: Outputs either "even" or "odd". Useful for zebra striping in
* teaser listings.
* - $id: Position of the node. Increments each time it's output.
*
* Node status variables:
* - $view_mode: View mode; for example, "full", "teaser".
* - $teaser: Flag for the teaser state (shortcut for $view_mode == 'teaser').
* - $page: Flag for the full page state.
* - $promote: Flag for front page promotion state.
* - $sticky: Flags for sticky post setting.
* - $status: Flag for published status.
* - $comment: State of comment settings for the node.
* - $readmore: Flags true if the teaser content of the node cannot hold the
* main body content.
* - $is_front: Flags true when presented in the front page.
* - $logged_in: Flags true when the current user is a logged-in member.
* - $is_admin: Flags true when the current user is an administrator.
*
* Field variables: for each field instance attached to the node a corresponding
* variable is defined; for example, $node->body becomes $body. When needing to
* access a field's raw values, developers/themers are strongly encouraged to
* use these variables. Otherwise they will have to explicitly specify the
* desired field language; for example, $node->body['en'], thus overriding any
* language negotiation rule that was previously applied.
*
* @see template_preprocess()
* @see template_preprocess_node()
* @see template_process()
*
* @ingroup themeable
*/
?>

<div id="node-<?php print $node->nid; ?>" class="shop-single <?php print $classes; ?> clearfix"<?php print $attributes; ?>>
    <div class='row'>
        <div class="shop-left col-lg-5 col-md-5 col-sm-6 col-xs-12">
            <?php print render($content['product:field_product_images']);?>
        </div>
        
        <div class="shop-right col-lg-7 col-md-7 col-sm-6 col-xs-12">
           <h3 class="shop-product-name">
             <?php print ($node->title);?>
             - <span><?php print render($content['product:commerce_price']);?></span>
           </h3>
           <div class="rating">
            <?php print render($content['field_rating']);?>
          </div> 
          <div class="short-desc">
            <?php print substr(strip_tags(render($content['body'])), 0, 200);?>
          </div>
          
          <?php if (!empty($content['field_product_categories'])) :?>
            <div class='pro-cat'>
              <?php print t('Categories: ');?><?php print render($content['field_product_categories']);?>
            </div>
          <?php endif;?>
          <?php if (!empty($content['field_brand'])) :?>
            <div class='pro-cat'>
              <?php print t('Brand: ');?><?php print render($content['field_brand']);?>
            </div>
          <?php endif;?>
          
          <div class="btn-products">
            <?php print render($content['field_product_variations']);?>
            <div class="add-to-wishlist">
              <?php 
              if (isset($node->field_product_variations[$node->language])) {
                $product = $node->field_product_variations[$node->language][0]['product_id'];
              } else {
                $product = $node->field_product_variations['und'][0]['product_id'];
              }
              print flag_create_link('wishlist', $product);
              ?>
            </div>
          </div>
       </div>
    </div>
  
    <div class="product-details-wrap dexp_tab_wrapper horizontal">
      <ul class="nav nav-tabs" id="shop-detail-tab">
        <li class="active">
          <a data-toggle="tab" href="#Description"><?php print t("Description"); ?></a>
        </li>
        <li class="">
          <a data-toggle="tab" href="#Reviews">Reviews (<?php print $comment_count;?>)</a>
        </li>
      </ul>

      <div class="tab-content" id="myTabContent">
        <div id="Description" class="tab-pane fade active in">
        <?php print render($content['body']);?>                                
        </div><!-- col-tab pane -->

        <div id="Reviews" class="tab-pane fade">
          <?php print render ($content['comments']); ?>
          <div class="clearfix"></div>
        </div><!-- end tab pane review -->
      </div><!-- end  tab content -->
    </div>
</div>
