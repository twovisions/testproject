<div id="node-<?php print $node->nid; ?>" class="portfolio-text <?php print $classes; ?> clearfix"<?php print $attributes; ?>>
    <?php print render($title_prefix); ?>
    <?php print render($title_suffix); ?>
    <div class="ImageWrapper content"<?php print $content_attributes; ?>>
        <div class="portfolio-images">
            <?php print render($content['field_team_image']); ?>
        </div>
        <div class="portfolio-overlay">
            <div class="ImageOverlayLi"></div>
            <div class="portfolio-inner">
                <div class="portfolio-info">
                    <div class="portfolio-tools">
                        <?php print render($content['field_team_social']); ?>
                    </div>				
                </div>
            </div>
        </div>
    </div>
    <div class="portfolio-description no-bg">
        <h3 class="name"><?php print $title; ?></h3>
        <?php print render($content['field_team_positions']); ?>
    </div>        
    <?php //print render($content['links']); ?>
    <?php //print render($content['comments']); ?>
</div>