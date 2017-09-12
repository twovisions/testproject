<!--DRUPAL NO CACHE-->
<div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> clearfix"<?php print $attributes; ?>>
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
                if ($k == 0) {
                    $first_image = file_create_url($portfolio_image['uri']);
                } else {
                    $image_path = file_create_url($portfolio_image['uri']);
                    print '<a href="' . $image_path . '" rel="prettyPhoto[' . $lightboxrel . ']" style="display:none">&nbsp;</a>';
                }
            }
        }
        ?>
        <div class="portfolio-masonry-image" style="background-image: url('<?php print $first_image; ?>');">
            <div class="ImageOverlayLi"></div>
            <div class="portfolio-overlay">
            <div class="porfolio-middle">
                <h3 class="portfolio-title br-bottom"><?php print $title;?></h3>
                <?php print render($content['field_portfolio_categories']); ?>
                <div class="portfolio-tools">
                    <a title="<?php print $title; ?>" rel="prettyPhoto[<?php print $lightboxrel; ?>]" href="<?php print $first_image; ?>"><span class="fa fa-search"></span></a>
                </div>
            </div>
            <?php print render($content);?>
        </div>
        </div>
    </div>
</div>