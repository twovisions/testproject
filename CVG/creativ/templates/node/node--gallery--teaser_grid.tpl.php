<div id="node-<?php print $node->nid; ?>" class="portfolio-hover <?php print $classes; ?> clearfix"<?php print $attributes; ?>>
    <?php print render($title_prefix); ?>
    <?php print render($title_suffix); ?>
    <div class="ImageWrapper content"<?php print $content_attributes; ?>>
        <?php
// We hide the comments and links now so that we can render them later.
        hide($content['comments']);
        hide($content['links']);
        hide($content['field_image']);

        $lightboxrel = 'portfolio_' . $nid;

        $portfolio_images = field_get_items('node', $node, 'field_image');
        $first_image = '';
        if ($portfolio_images) {
            foreach ($portfolio_images as $k => $portfolio_image) {
                $first_image = file_create_url($portfolio_image['uri']);
                break;
            }
        }
        ?>
        <div class="portfolio-images">
            <?php print render($content['field_image']); ?>
        </div>
        <div class="ImageOverlayLi"></div>
        <div class="portfolio-overlay">            
            <div class="porfolio-middle">
                <div class="portfolio-categories clearfix">
                    <?php print render($content['field_portfolio_categories']); ?>
                </div><!-- end categories -->
                <h3 class="portfolio-title"><?php print $title; ?></h3> 
                <div class="portfolio-tools">
                    <a title="<?php print $title; ?>" rel="prettyPhoto[<?php print $lightboxrel; ?>]" href="<?php print $first_image; ?>"><span class="fa fa-search"></span></a>
                </div>
            </div>                  			
        </div>
    </div>
    <?php //print render($content['links']); ?>
    <?php //print render($content['comments']); ?>
</div>
