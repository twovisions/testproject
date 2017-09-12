    <?php
    // We hide the comments and links now so that we can render them later.
    hide($content['comments']);
    hide($content['links']);
    hide($content['body']);
    //$original_image = file_create_url($node->field_portfolio_images['und'][0]['uri']);
    $lightboxrel = 'portfolio_' . $nid;
    $portfolio_images = field_get_items('node', $node, 'field_image');
    $first_image = '';
    if ($portfolio_images) {
      foreach ($portfolio_images as $k => $portfolio_image) {
        if ($k == 0) {
          $first_image = file_create_url($portfolio_image['uri']);
        } else {
          $image_path = file_create_url($portfolio_image['uri']);
          print '<a href="' . $image_path . '" rel="prettyPhoto[' . $lightboxrel . ']" style="display:none">&nbsp;</a>';
        }
      }
    }
    ?>
<div id="node-<?php print $node->nid; ?>" class="portfolio-text <?php print $classes; ?> clearfix"<?php print $attributes; ?>>
    <?php print render($title_prefix); ?>
    <?php print render($title_suffix); ?>
    <div class="ImageWrapper content"<?php print $content_attributes; ?>>
        <div class="portfolio-images">
            <?php print render($content['field_image']); ?>
        </div>
        <div class="ImageOverlayLi"></div>
        <div class="portfolio-overlay">            
            <div class="portfolio-inner">
                <div class="portfolio-info">
                    <div class="portfolio-tools">
                       <a href="<?php print $node_url;?>" data-toggle="tooltip" data-original-title="<?php print t('View Details');?>" data-placement="bottom" class="view-details dtooltip"><span class="fa fa-link"></span></a>
                       <a href="<?php print $first_image;?>" rel="prettyPhoto[<?php print $lightboxrel;?>]" data-toggle="tooltip" data-original-title="<?php print t('View Image');?>" data-placement="bottom" class="zoom dtooltip"><span class="fa fa-expand"></span></a>
                    </div>				
                </div>
            </div>
        </div>
    </div>
    <div class="portfolio-description">
        <h3 class="name"><?php print $title; ?></h3>
        <?php print render($content['field_portfolio_categories']); ?>
    </div>        
    <?php //print render($content['links']); ?>
    <?php //print render($content['comments']); ?>
</div>