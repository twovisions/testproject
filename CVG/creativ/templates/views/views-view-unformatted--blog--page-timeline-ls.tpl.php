<ul class ="timeline">
  <li><div class="tldate border-radius"><?php print $title;?></div></li>
  <?php
  $count = 0;
  foreach ($rows as $id => $row):?>
    <li class="timeline-inverted">
      <div class="tl-circ"></div>
      <div class="timeline-panel">
        <?php print views_embed_view('blog', 'block_post_timeline_style', intval(strip_tags($row))); ?>
      </div>  
    </li>
  <?php $count++;endforeach;?>
</ul>
