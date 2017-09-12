<?php
  if (strtolower(trim($type)) == 'icon') {
    $place_holder = '<i class="'.$icon.'">&nbsp;</i>';
  } 
  if (strtolower(trim($type)) == 'img') {
    $place_holder = '<img alt="" src="'.$image.'">';
  }
?>

<div class="flip-box services-box-animated <?php if($class){print $class;}?>">
  <div class="inner">
    <div class="front"> <?php print $place_holder;?>
      <h3><?php print $title;?></h3>
    </div>
    <div class="back">
      <?php print $place_holder;?>
      <h3><?php print $title;?></h3>
      <?php if($content!=''):?>
      <p><?php print $content;?></p>
      <?php endif;?>
      <?php if($link!=''):?>      
      <p><a href="<?php print $link;?>" class="dexp-shortcodes-button btn btn-sm btn-default btn-radius" role="button">Read More</a></p>
      <?php endif;?>
    </div> 
  </div> 
</div>
