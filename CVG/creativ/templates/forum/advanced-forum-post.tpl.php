<?php

/**
 * @file
 *
 * Theme implementation: Template for each forum post whether node or comment.
 *
 * All variables available in node.tpl.php and comment.tpl.php for your theme
 * are available here. In addition, Advanced Forum makes available the following
 * variables:
 *
 * - $top_post: TRUE if we are formatting the main post (ie, not a comment)
 * - $reply_link: Text link / button to reply to topic.
 * - $total_posts: Number of posts in topic (not counting first post).
 * - $new_posts: Number of new posts in topic, and link to first new.
 * - $links_array: Unformatted array of links.
 * - $account: User object of the post author.
 * - $name: User name of post author.
 * - $author_pane: Entire contents of the Author Pane template.
 */

?>

<?php if ($top_post): ?>
  <?php print $topic_header ?>
<?php endif; ?>

<div id="<?php print $post_id; ?>" <?php print $attributes; ?> class="forum-post-details">
  <div class="forum-post-info clearfix">
    <div class="forum-posted-on">
      <?php print $date ?>

      <?php
      // This whole section is for printing the "new" marker. With core comment
      // we just need to check a variable. With Node Comment, we need to do
      // extra work to keep the views caching used for Node Comment from
      //caching the new markers.
      ?>
      <?php if (!$top_post): ?>
        <?php if (!empty($new)): ?>
          <a id="new"><span class="new">(<?php print $new ?>)</span></a>
        <?php endif; ?>

        <?php if (!empty($first_new)): ?>
          <?php print $first_new; ?>
        <?php endif; ?>

        <?php if (!empty($new_output)): ?>
          <?php print $new_output; ?>
        <?php endif; ?>
      <?php endif; ?>
    </div>  <?php // End of posted on div ?>

    <?php if (!empty($in_reply_to)): ?>
   	 <span class="forum-in-reply-to"><?php print $in_reply_to; ?></span>
    <?php endif; ?>

    <?php // Add a note when a post is unpublished so it doesn't rely on theming. ?>
    <?php if (!$node->status): ?>
      <span class="unpublished-post-note"><?php print t("Unpublished post") ?></span>
    <?php endif; ?>

    <span class="forum-post-number"><?php print $permalink; ?></span>
  </div> <?php // End of post info div ?>

  <div class="dexp-forum-post-wrapper">
  	<table class="table table-bordered">
  		<tr>
  			<td class="author">
  				<?php if (!empty($author_pane)): ?>
        		<?php print $author_pane; ?>
      			<?php endif; ?>
  			</td>
  			<td>
  			<?php if (!empty($title)): ?>
        <div class="forum-post-title">
          <?php print $title ?>
        </div>
      <?php endif; ?>
  				<?php
          // We hide the comments and links now so that we can render them later.
          hide($content['taxonomy_forums']);
          hide($content['comments']);
          hide($content['links']);
          if (!$top_post)
            hide($content['body']);
          print render($content);
  				?>
      <?php if (!empty($signature)): ?>
        <div class="author-signature">
          <?php print $signature ?>
        </div>
      <?php endif; ?>
  			</td>
  		</tr>
  		<tr>
  		<td colspan="2">
  		<div class="forum-jump-links">
      <a href="#forum-topic-top" title="<?php print t('Jump to top of page'); ?>" class="af-button-small"><span><?php print t("Top"); ?></span></a>
    </div>

    <div class="forum-post-links">
      <?php print render($content['links']); ?>
    </div>
  		</td>
  		</tr>
  	</table>
  </div> <?php // End of post wrapper div ?>
</div> <?php // End of main wrapping div ?>

<?php print render($content['comments']); ?>