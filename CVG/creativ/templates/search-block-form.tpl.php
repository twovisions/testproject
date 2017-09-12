<span class="fa fa-search search-toggle"></span>
<div class="search-form-block-wrapper">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 search-form-block-content">
				<div class="container-inline">
                  <?php if (empty($variables['form']['#block']->subject)): ?>
                    <h2 class="element-invisible"><?php print t('Search form'); ?></h2>
                  <?php endif; ?>
                  <?php print $search_form; ?>
                </div>
			</div>
		</div>
	</div>
</div>
