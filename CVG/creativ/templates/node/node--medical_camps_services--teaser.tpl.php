<?php
$date = field_get_items('node', $node, 'field_date_from');
$type = field_get_items('node', $node, 'field_medical_type');
$fromDate = strtotime($date[0]["value"]);
$toDate = strtotime($date[0]["value2"]);
//dsm($node);
?>
<div id="node-<?php print $node->nid; ?>" class="portfolio-text <?php print $classes; ?> clearfix"<?php print $attributes; ?>>
    <?php print render($title_prefix); ?>
    <?php print render($title_suffix); ?>
    <div class="custom-service-box">
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12" <?php print $content_attributes; ?>>
            <div class=" ImageWrapper content">
                <div class="portfolio-images">
                    <?php print render($content['field_medical_images']); ?>
                    <div class="portfolio-overlay">
                        <div class="ImageOverlayLi"></div>
                        <div class="portfolio-inner">
                            <div class="portfolio-info">
                                <div class="portfolio-tools">                        
                                    <a class="dexp-social-icon social-gray social-circle" href="<?php print $node_url; ?>"><span><i class="fa fa-link"></i></span> </a>
                                </div>				
                            </div>
                        </div>
                    </div>
                </div>   
            </div>
        </div>
        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
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
            </div><!-- end desc -->
        </div>
    </div>
</div>