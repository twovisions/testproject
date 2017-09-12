<div id="node-<?php print $node->nid; ?>" class="portfolio-hover <?php print $classes; ?> clearfix"<?php print $attributes; ?>>
    <?php print render($title_prefix); ?>
    <?php print render($title_suffix); ?>   
    <div class="content"<?php print $content_attributes; ?>>
        <?php
        // We hide the comments and links now so that we can render them later.
        hide($content['comments']);
        hide($content['links']);
        hide($content['field_team_image']);
        ?>
        <div class="portfolio-images">
            <?php print render($content['field_team_image']); ?>
        </div>
        <div class="portfolio-overlay">            
            <div class="ImageOverlayLi"></div>
            <div class="porfolio-middle">
                <div class="social clearfix">
                    <?php print render($content['field_team_social']); ?>
                </div><!-- end social -->
                <h3 class="portfolio-title"><a href="<?php print $node_url; ?>"><?php print $title; ?></a></h3>
                <?php print render($content['field_team_positions']); ?>	                
            </div>                  			
        </div>
    </div>
    <?php //print render($content['links']); ?>
    <?php //print render($content['comments']); ?>
</div>