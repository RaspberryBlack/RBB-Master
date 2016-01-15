<div class="login-form">
	<h1 id="main-content" class="title">
		<?php if ($logo): ?>
			<img style="margin:.25em 0 .5em" alt="Login" class="site-logo" src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" />
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
	<p class="bb-link">
		<a href="http://www.bigbosswebsites.com.au" title="Website design and development by Big Boss Websites">
			<img alt="Big Boss Websites" class="footer-logo" src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" />
		</a>
	</p>
</div>