<?php

/**
 * @file
 * Default theme implementation to display a single Drupal page.
 *
 * Available variables:
 *
 * General utility variables:
 * - $base_path: The base URL path of the Drupal installation. At the very
 *   least, this will always default to /.
 * - $directory: The directory the template is located in, e.g. modules/system
 *   or themes/bartik.
 * - $is_front: TRUE if the current page is the front page.
 * - $logged_in: TRUE if the user is registered and signed in.
 * - $is_admin: TRUE if the user has permission to access administration pages.
 *
 * Site identity:
 * - $front_page: The URL of the front page. Use this instead of $base_path,
 *   when linking to the front page. This includes the language domain or
 *   prefix.
 * - $logo: The path to the logo image, as defined in theme configuration.
 * - $site_name: The name of the site, empty when display has been disabled
 *   in theme settings.
 * - $site_slogan: The slogan of the site, empty when display has been disabled
 *   in theme settings.
 *
 * Navigation:
 * - $main_menu (array): An array containing the Main menu links for the
 *   site, if they have been configured.
 * - $secondary_menu (array): An array containing the Secondary menu links for
 *   the site, if they have been configured.
 * - $breadcrumb: The breadcrumb trail for the current page.
 *
 * Page content (in order of occurrence in the default page.tpl.php):
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title: The page title, for use in the actual HTML content.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 * - $messages: HTML for status and error messages. Should be displayed
 *   prominently.
 * - $tabs (array): Tabs linking to any sub-pages beneath the current page
 *   (e.g., the view and edit tabs when displaying a node).
 * - $action_links (array): Actions local to the page, such as 'Add menu' on the
 *   menu administration interface.
 * - $feed_icons: A string of all feed icons for the current page.
 * - $node: The node object, if there is an automatically-loaded node
 *   associated with the page, and the node ID is the second argument
 *   in the page's path (e.g. node/12345 and node/12345/revisions, but not
 *   comment/reply/12345).
 *
 * Regions:
 * - $page['help']: Dynamic help text, mostly for admin pages.
 * - $page['highlighted']: Items for the highlighted content region.
 * - $page['content']: The main content of the current page.
 * - $page['sidebar_first']: Items for the first sidebar.
 * - $page['sidebar_second']: Items for the second sidebar.
 * - $page['header']: Items for the header region.
 * - $page['footer']: Items for the footer region.
 *
 * @see template_preprocess()
 * @see template_preprocess_page()
 * @see template_process()
 */
 
?>


<?php if ($is_front): ?>
  <!-- Begin: Header -->
  <header class="site-header hero">
    <div class="container-fluid">
      <div class="outer">
    <div class="inner">

<?php /**      <!-- <div class="row-fluid">
        <div class="span12">
          <!-- Place your static HTML here for a header -->
        </div>
      </div> -->
  */
  ?>

      <?php if ($page['header_top']) : ?>
      <div class="row-fluid">
        <div class="span12">
          <?php print render($page['header_top']); ?>
        </div>
      </div>
      <?php endif; ?>

      <div class="row-fluid">
        <div class="span7">
            <?php print render($page['navigation_primary']); ?>
        </div>
        <div class="span5">
            <?php print render($page['navigation_secondary']); ?>
        </div>
      </div>

      <?php if ($page['header_bottom']) : ?>
      <div class="row-fluid">
        <div class="span12">
          <?php print render($page['header_bottom']); ?>
        </div>
      </div>
      <?php endif; ?>

    </div>
  </div>
  </div>
  </header>
  <!-- End: Header -->
<?php endif; ?>

  <!-- Begin: Wrapper -->
  <div class="site-content">
  <div class="container-fluid inner">

    <?php if ($action_links): ?><ul class="action-links"><?php print render($action_links); ?></ul><?php endif; ?>
  
    <?php if ($page['content_above']) : ?>
    <div class="row-fluid">
      <div class="span12">
        <?php print render($page['content_above']); ?>
      </div>
    </div>
    <?php endif; ?>

    <div class="row-fluid">
    
    <?php
    /**
     * How do the sidebar and content area work?
     *
     * If a sidebar exists, then show it (span7/span5). However, if there is no sidebar for a page
     * then make sure we make the content area take up the entire width of the screen (span12).
     *
     */
    ?>
    <?php if ($page['sidebar_last_top'] || $page['sidebar_last'] || $page['sidebar_last_bottom']) : ?>
      <div class="span7">
    <?php else: ?>
      <div class="span12">
    <?php endif; ?>

        <?php if ($messages || $page['help'] || $action_links) : ?>
        <div class="row-fluid">
          <div class="span12 alert">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <?php print $messages; ?>
            <?php print render($page['help']); ?>
            <?php if ($action_links): ?>
              <ul class="action-links">
                <?php print render($action_links); ?>
              </ul>
            <?php endif; ?>
          </div>
        </div>
        <?php endif; ?>

        <?php if ($page['content_top']) : ?>
          <?php print render($page['content_top']); ?>
        <?php endif; ?>

          <?php print render($title_prefix); ?>
          <?php print render($title_suffix); ?>
          <?php if ($tabs && $is_admin): ?>
            <div class="tabs">
              <div class="navbar">
                <div class="navbar-inner">
                  <a class="brand" href="#">Manage "<?php print $title; ?>"</a>
                  <?php print render($tabs); ?>
                </div>
              </div>
   
            </div>
          <?php endif; ?>
          
          <?php print render($page['help']); ?>
          <?php if ($action_links): ?>
            <ul class="action-links">
              <?php print render($action_links); ?>
            </ul>
          <?php endif; ?>
          <?php print render($page['content']); ?>
          <?php print $feed_icons; ?>        
        </div>

        <?php if ($page['content_bottom']) : ?>
          <?php print render($page['content_bottom']); ?>
        <?php endif; ?>

      </div>

      <?php if ($page['sidebar_last_top'] || $page['sidebar_last'] || $page['sidebar_last_bottom']) : ?>
      <div class="span5 sidebar">
          <?php if ($page['sidebar_last_top']) : ?>
            <?php print render($page['sidebar_last_top']); ?>
          <?php endif; ?>

          <?php if ($page['sidebar_last']) : ?>
            <?php print render($page['sidebar_last']); ?>
          <?php endif; ?>

          <?php if ($page['sidebar_last_bottom']) : ?>
            <?php print render($page['sidebar_last_bottom']); ?>
          <?php endif; ?>
      </div>
      <?php endif; ?>
    </div>

    <?php if ($page['content_below']) : ?>
    <div class="row-fluid">
      <div class="span12">
        <?php print render($page['content_below']); ?>
      </div>
    </div>
    <?php endif; ?>

  </div>
  </div>
  <!-- End: Wrapper -->

  <?php if ($page['footer_above']) : ?>
  <div class="container-fluid">
    <div class="row-fluid">
      <div class="span12">
        <?php print render($page['footer_above']); ?>
      </div>
    </div>
  </div>
  <?php endif; ?>

  <!-- Start: Footer -->
  <footer>
    <div class="container-fluid inner">
      <div class="row-fluid">
        <div class="span12">
          <p>
            <strong>Copyright 2013 <?php print $site_name; ?></strong> All rights reserved.<br />
        </div>
      </div>
    </div>
  </footer>
  <!-- End: Footer -->

  <?php if ($page['footer_below']) : ?>
  <div class="container-fluid">
    <div class="row-fluid">
      <div class="span12">
        <?php print render($page['footer_below']); ?>
      </div>
    </div>
  </div>
  <?php endif; ?>

