<div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> clearfix"<?php print $attributes; ?>>
<?php
// We hide the comments and links now so that we can render them later.
hide($content['comments']);
hide($content['links']);
?>
<?php print render($title_prefix); ?>
<?php print render($title_suffix); ?>
<div style="text-align: right">Theme: <?php print render($content['field_item'][0]);?></div>
<table class="table table-bordered">
	<tr>
		<td class="author">
			<?php print $user_picture; ?>
			<div class="name"><?php print $name;?></div>
			<div class="date"><?php print format_date($created,'custom','d M, Y');?></div>
		</td>
		<td><?php print render($content);?></td>
	</tr>
</table>
<?php print render($content['comments']); ?>
</div>