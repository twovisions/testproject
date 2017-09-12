<div id="node-<?php print $node->nid; ?>" class="portfolio-details <?php print $classes; ?> clearfix"<?php print $attributes; ?>>
    <?php print render($title_prefix); ?>
    <?php print render($title_suffix); ?>
    <?php
    // We hide the comments and links now so that we can render them later.
    hide($content['comments']);
    hide($content['links']);
    hide($content['field_image']);
    ?>
    <div class="content row"<?php print $content_attributes; ?>>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 portfolio-image">
            <?php print render($content['field_image']) ?>
        </div>
        <div class="col-lg-12 col-md-12 -col-sm-12 col-xs-12 portfolio-content">
            <?php
            print render($content['body'])
            ?>
        </div>
        <div class="col-lg-12 col-md-12 -col-sm-12 col-xs-12 portfolio-more">
            <label>Client</label>
            <div>
                <?php
                print render($content['field_portfolio_client'])
                ?>
            </div>
            <label>Author</label>
            <div>
                <?php
                print render($content['field_portfolio_author'])
                ?>
            </div>
            <label>Website</label>
            <div>
                <?php
                print render($content['field_portfolio_website'])
                ?>
            </div>
        </div>
    </div>
    <?php print render($content['links']); ?>
    <?php print render($content['comments']); ?>
</div>