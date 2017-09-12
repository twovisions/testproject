<?php
$date = field_get_items('node', $node, 'field_date_from');
$type = field_get_items('node', $node, 'field_medical_type');
$fromDate = strtotime($date[0]["value"]);
$toDate = strtotime($date[0]["value2"]);
//dsm($node);
?>
<div id="node-<?php print $node->nid; ?>" class="portfolio-details custom-service-details <?php print $classes; ?> clearfix"<?php print $attributes; ?>>
    <?php print render($title_prefix); ?>
    <?php print render($title_suffix); ?>
    <?php
    // We hide the comments and links now so that we can render them later.
    hide($content['comments']);
    hide($content['links']);
    hide($content['field_medical_images']);
    ?>
    <div class="content row"<?php print $content_attributes; ?>>
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 portfolio-image">
            <?php print render($content['field_medical_images']) ?>
        </div>
        <div class="col-lg-6 col-md-6 -col-sm-12 col-xs-12 portfolio-content">
            <div class="res-title">
                <h3><?php print $title; ?></h3>
            </div><!-- end title -->

            <div class="meta">
                <span class="service-type <?php
                if ($type[0]["value"] == 0) {
                    print 'bg-green';
                } else {
                    print 'bg-red';
                };
                ?>"><?php print render($content['field_medical_type']); ?></span>
                <span class="service-date"><i class="fa fa-calendar"></i><?php print date('d, M, Y', $fromDate) . ' - ' . date('d, M, Y', $toDate); ?></span>
            </div>
            <div class="desc">
                <?php print render($content['body']); ?>
            </div>
        </div>        
    </div>
    <?php print render($content['links']); ?>
    <?php print render($content['comments']); ?>
</div>