    <!-- header starts-->
    <?php //hide($page['header']['search_form']); ?>
    <div id="header-wrap">
      <div id="header" class="container_12">
        <!-- navigation -->
        <div id="nav" class="grid_12">
          <?php print theme('links__system_main_menu', array(
            'links' => $main_menu,
            'attributes' => array(
              'id' => 'main-menu-links',
              'class' => array('links', 'clearfix'),
            ),
            'heading' => array(
              'text' => t('Main menu'),
              'level' => 'h2',
              'class' => array('element-invisible'),
            ),
          )); ?>
        </div>
        <div id="header-main" class="grid_12">
          <div class="logo"><img src="<?php print $logo; ?>" alt="<?php print $site_name; ?>"></div>
          <h1 id="logo-text"><a href="<?php print $front_page; ?>"><?php print $site_name; ?></a></h1>
          <p id="slogan"><?php print $site_slogan; ?></p>
        </div>

        <?php //show($page['header']['search_form']); ?>
        <?php print render($page['header']); ?>
      </div>
    </div>
    <!-- header ends here -->
    <!-- content starts -->
    <div id="content-wrapper" class="container_12">



      <!-- main -->
      <div id="main" class="<?php print $page['sidebar'] ? 'grid_8' : 'grid_12' ?>">
          
      

        <?php if ($tabs): ?><div class="tabs"><?php print render($tabs); ?></div><?php endif; ?>
        <?php if (!empty($messages)): print $messages; endif; ?>
        <?php if (!empty($page['help'])): print render($page['help']); endif; ?>
        <?php if ($action_links): ?><ul class="action-links"><?php print render($action_links); ?></ul><?php endif; ?>
        
        <div id="content-output">
          <div id="breadcrumb" class="grid_12"><?php print $breadcrumb; ?></div>
          <?php print render($title_prefix); ?>
          <?php if (!empty($title)): ?><h2 class="title" id="page-title"><?php print $title; ?></h2><?php endif; ?>
          <?php print render($title_suffix); ?>
          <?php print render($page['content']); ?>
        </div><!-- /#content-output -->
      </div>
      <!-- main ends here -->

      <!-- sidebar starts here -->
      <?php if ($page['sidebar']): ?>
      <div id="sidebar" class="grid_4">
        <?php print render($page['sidebar']); ?>
      </div>
      <?php endif; ?>
      <!-- sidebar ends here -->

    </div>
    <!-- content ends here -->

    <!-- footer starts here -->
    <div id="footer-wrapper" class="container_12">

      <!-- footer top starts here -->
      <div id="footer-content">

        <!-- footer left starts here -->
        <div class="grid_6" id="footer-left">
          <?php print render($page['footer_left']); ?>
        </div>
        <!-- footer left ends here -->

        <!-- footer right starts here -->
        <div class="grid_6" id="footer-right">
          <?php print render($page['footer_right']); ?>
        </div>
        <!-- footer right ends here -->

      </div>
      <!-- footer top ends here -->

      <!-- footer bottom starts here -->
      <div id="footer-bottom">
        <div id="footer-meta" class="clear-block"> 
          <?php if ($secondary_menu): ?>
            <div id="secondary-menu" class="navigation">
              <?php print theme('links__system_secondary_menu', array(
                'links' => $secondary_menu,
                'attributes' => array(
                  'id' => 'secondary-menu-links',
                  'class' => array('links', 'inline', 'clearfix'),
                ),
                'heading' => array(
                  'text' => t('Secondary menu'),
                  'level' => 'h2',
                  'class' => array('element-invisible'),
                ),
              )); ?>
              </div> <!-- /#secondary-menu -->
            <?php endif; ?>
        </div>

        <?php if ($page['footer']): ?>
        <div id="footer-bottom-content">
          <?php print render($page['footer']); ?>
        </div>
        <?php endif; ?>
      </div>
      <!-- footer bottom ends here -->

    </div>
    <!-- footer ends here -->
