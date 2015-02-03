<div class="main row">
  
  <main role="main" id="main-content" class="columns"> <?php //don't remove main-content id; necessary for skip-link ?>
    <?php print render($title_prefix); ?>
    <?php if ($title): ?>
     <h1><?php print $title; ?></h1>
    <?php endif; ?>
    <?php print render($title_suffix); ?>
    
    <!-- <?php print $breadcrumb; ?> -->
    
    <?php if ($action_links): ?>
      <ul class="action-links"><?php print render($action_links); ?></ul>
    <?php endif; ?>
    
    <?php if (isset($tabs['#primary'][0]) || isset($tabs['#secondary'][0])): ?>
      <div class="tabs"><?php print render($tabs); ?></div>
    <?php endif; ?>
    
    <?php if($messages){ ?>
      <?php print $messages; ?>
    <?php } ?>
    
    <?php print render($page['content']); ?>
  </main>

  <?php if($page['sidebar_first']): ?>
    <aside class="columns sidebar first">
    <?php print render($page['sidebar_first']); ?>
    </aside>
  <?php endif; ?>

  <?php if($page['sidebar_second']): ?>
    <aside class="columns sidebar second">
      <?php print render($page['sidebar_second']); ?>
    </aside>
  <?php endif; ?>
</div>