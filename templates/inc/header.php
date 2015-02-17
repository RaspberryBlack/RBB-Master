<?php //don't remove id; helpful for jump to top links ?>
  <div class="header-wrapper">
  <header role="banner" class="row" id="top">

    <div class="branding medium-4 columns"> 
        <a href="<?php print $front_page; ?>" title="Return to homepage" rel="home">
          <img alt="<?php print t('Home'); ?>" class="site-logo" src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" />
          <?php if($site_name): ?>
          	<h1><?php print $site_name; ?></h1> 
          <?php endif; ?>
        </a>
    </div>
		
		<div class="navigation medium-8 columns">
			<?php if($page['navigation']): ?>
				<nav id="main-menu" role="navigation" tabindex="-1" class="medium-8 small-12 columns">
					<?php print render($page['navigation']); ?>
				</nav>
			<?php endif; ?>
		</div>


    <?php if($page['header']): ?>
      <div class="header-region columns">
        <?php print render($page['header']); ?>
      </div>
    <?php endif; ?>

  </header>
  </div>