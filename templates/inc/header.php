<?php //don't remove id; helpful for jump to top links ?>
<header role="banner" class="row" id="top">

  <div class="branding"> 
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

	<div class="navigation" id="nav">
		<?php if($page['navigation']): ?>
			<a href="#nav" class="menu-open"><span>≡</span> Menu</a>
			<nav id="main-menu" role="navigation" tabindex="-1">
				<?php print render($page['navigation']); ?>
			</nav>
			<a href="#top" class="menu-close"><span>x</span> close</a>
		<?php endif; ?>
	</div>


  <?php if($page['header']): ?>
    <div class="header-region">
      <?php print render($page['header']); ?>
    </div>
  <?php endif; ?>

</header>