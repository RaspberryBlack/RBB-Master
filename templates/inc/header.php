<?php //don't remove id; helpful for jump to top links ?>
  <div class="header-wrapper">
  <header role="banner" class="row" id="top">

    <div class="branding medium-4 small-12 columns"> 
        <a href="<?php print $front_page; ?>" title="Return to homepage" rel="home">
          <!-- <img alt="<?php print t('Home'); ?>" class="site-logo" src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" />-->
          <?php if ($site_name || $site_slogan): ?>
            <?php if($site_name): ?>
              <h1><?php print $site_name; ?></h1> 
            <?php endif; ?>
            
            <?php if ($site_slogan): ?>
              <h2><?php print $site_slogan; ?></h2>
            <?php endif; ?>
          <?php endif; ?>
        </a>
    </div>

<!--<div class="global-search-container six columns">
        <?php print render($page['global_search']); ?>
    </div> -->

	<?php if($page['navigation']): ?>
		<nav id="main-menu" role="navigation" tabindex="-1" class="medium-8 small-12 columns">
			<?php print render($page['navigation']); ?>
		</nav>
	<?php endif; ?>

    <?php if($page['header']): ?>
      <div class="header-region large-12 columns">
        <?php print render($page['header']); ?>
      </div>
    <?php endif; ?>

  </header>
  </div>