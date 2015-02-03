<div class="login-form">
	<h1 id="main-content" class="title">
		<?php if ($logo): ?>
			<img src="<?php print $logo; ?>" alt="<?php print t('Login to your website'); ?>" />
		<?php else: print 'Login to' . $site_name;
		endif; ?>
	</h1>
	<?php if ($messages): print $messages; endif; ?>
	<?php if (!empty($page['help'])): print render($page['help']); endif; ?>    
	<?php if (!empty($tabs)): ?>
	<?php print render($tabs); ?>
	<?php if (!empty($tabs2)): print render($tabs2); endif; ?>
	<?php endif; ?>
	<?php if ($action_links): ?>
	<ul class="action-links">
	<?php print render($action_links); ?>
	</ul>
	<?php endif; ?>
	<?php print render($page['content']); ?>
</div>	
<div class="login-footer">
	<p class="captovate-link">
		<a href="http://www.captovate.com.au" title="Website design and development by Captovate">
			<img src="/sites/all/themes/captovate77/images/captovate/captovate-logo-footer.png" alt="Captovate logo"/>
		</a>
	</p>
</div>