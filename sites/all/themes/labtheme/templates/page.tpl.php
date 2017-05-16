<?php
/**
 * @file
 * Default theme implementation to display a single Drupal page.
 *
 * The doctype, html, head and body tags are not in this template. Instead they
 * can be found in the html.tpl.php template in this directory.
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
 * - $page['hero']: Items for the hero content region.
 * - $page['content']: The main content of the current page.
 * - $page['left_column']: Items for the first sidebar.
 * - $page['right_column']: Items for the second sidebar.
 * - $page['header']: Items for the header region.
 * - $page['footer']: Items for the footer region.
 *
 * @see bootstrap_preprocess_page()
 * @see template_preprocess()
 * @see template_preprocess_page()
 * @see bootstrap_process_page()
 * @see template_process()
 * @see html.tpl.php
 *
 * @ingroup templates
 */
?>
<?php
  $logo_width = 'col-sm-9';
  if (!empty($page['header_center'])) {
    $logo_width = 'col-sm-6';
  }
?>

<header role="banner" class="">
  <div class="banner-container contain">
    <div class="container">
      <div class="header-logo row">
        <?php if ($logo): ?>
        <div class="col-sm-6">
            <a class="logo" href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>">
              <img class="img-responsive" src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" />
            </a>
          </div>
        <?php endif; ?>
      <?php if (!empty($page['header_center'])): ?>
        <div class="col-sm-3">
          <?php print render($page['header_center']); ?>
        </div>
      <?php endif; ?>
      <?php if (!empty($page['header_right'])): ?>
        <div class="col-lg-4 col-lg-push-2 col-md-5 col-md-push-1 col-sm-6">
          <?php print render($page['header_right']); ?>
        </div>
      <?php endif; ?>
      </div>
    </div>
  </div>
</header>

<div class="navbar-header navbar-color">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
      <span class="sr-only"><?php print t('Toggle navigation'); ?></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
</div>

    <?php if (!empty($primary_nav) || !empty($secondary_nav) || !empty($page['navigation'])): ?>
      <div class="navbar-collapse collapse navbar-color">
        <nav role="navigation" class="container">
          <?php if (!empty($primary_nav)): ?>
            <?php print render($primary_nav); ?>
          <?php endif; ?>
          <?php if (!empty($secondary_nav)): ?>
            <?php print render($secondary_nav); ?>
          <?php endif; ?>
          <?php if (!empty($page['navigation'])): ?>
            <?php print render($page['navigation']); ?>
          <?php endif; ?>
        </nav>
      </div>
    <?php endif; ?>

<div class="content-gradient">
  <?php if ($is_front) : ?>
    <div id="hero-bkgrd-container" class="hero-bkgrd-container absolute visible-lg">
      <div id="hero-bkgrd-left" class="hero-bkgrd-left hero-border"></div>
      <div id="hero-bkgrd-right" class="hero-bkgrd-right absolute hidden border-left hero-bkgrd-right-dims">
        <div class="hero-border hero-bkgrd-right-dims"></div>
      </div>
    </div>
    <div class="hero">
      <div class="hero-container">
        <div class="row">
          <?php if (!empty($page['hero_right'])): ?>
            <div class="col-md-4 col-md-push-8 col-sm-4 col-sm-push-8">
              <div id="right-side" class="hero-right">
                <?php print render($page['hero_right']); ?>
              </div>
            </div>
          <?php endif; ?>
          <?php if (!empty($page['hero_left'])): ?>
            <div class="col-md-8 col-md-pull-4 col-sm-8 col-sm-pull-4">
              <div id="left-side" class="hero-left">
                <?php print render($page['hero_left']); ?>
              </div>
            </div>
          <?php endif; ?>
        </div>
      </div>
    </div>
    <?php if (!empty($page['home_research_theme'])): ?>
      <div class="hero-container">
        <h1 class="research-themes-header">Main research themes</h1>
      </div>
      <div class="container">
        <div class="row">
          <div class="home-research-themes">
            <?php print render($page['home_research_theme']); ?>
          </div>
        </div>
      </div>
    <?php endif; ?>

  <?php endif; ?>

  <div class="main-container content-area-color">
    <div class="container">
      <?php if (!empty($page['title_header'])): ?>
        <div class="title-header">
          <?php print render($page['title_header']); ?>
        </div>
        <?php if (!empty($title) && !$is_front) : ?>
          <h1 class="landing"><?php print $title; ?></h1>
        <?php endif; ?>
      <?php endif; ?>
      <div class="row">
      <div class="main-container-margin">
      <?php if (!empty($page['left_column'])): ?>
        <aside class="col-sm-3 hidden-xs" role="complementary">
          <?php print render($page['left_column']); ?>
        </aside>  <!-- /#sidebar-first -->
      <?php endif; ?>

      <section<?php print $content_column_class; ?>>
        <?php if (!empty($breadcrumb)): print $breadcrumb; endif;?>
        <a id="main-content"></a>
        <div class="main-content-margin">
          <?php print render($title_prefix); ?>
          <?php if (!empty($title) && !$is_front && empty($page['title_header'])) : ?>
            <h1><?php print $title; ?></h1>
          <?php endif; ?>
          <?php print render($title_suffix); ?>
          <?php print $messages; ?>
          <?php if (!empty($tabs)): ?>
            <?php print render($tabs); ?>
          <?php endif; ?>
          <?php if (!empty($page['help'])): ?>
            <?php print render($page['help']); ?>
          <?php endif; ?>
          <?php if (!empty($action_links)): ?>
            <ul class="action-links"><?php print render($action_links); ?></ul>
          <?php endif; ?>
          <div class="page-content">
            <?php print render($page['content']); ?>
          </div>
        </div>
      </section>

      <?php if (!empty($page['right_column'])): ?>
        <aside class="col-sm-3" role="complementary">
          <?php print render($page['right_column']); ?>
        </aside>  <!-- /#sidebar-second -->
      <?php endif; ?>

        </div><!-- /main-container-margin -->
      </div><!-- /row -->
    </div><!-- /container -->
  </div><!-- /main-container -->
</div><!-- /content gradient -->

<footer>
<div class="footer container">
  <?php if (!empty($page['footer_logos']) || !empty($page['footer_legal'])): ?>
    <div class="row">
      <?php if (!empty($page['footer_logos'])): ?>
        <div class="col-md-8 footer-logos">
          <?php print render($page['footer_logos']); ?>
        </div>
      <?php endif; ?>
      <?php if (!empty($page['footer_legal'])): ?>
        <div class="col-md-4 footer-legal">
          <?php print render($page['footer_legal']); ?>
        </div>
      <?php endif; ?>
    </div>
  <?php endif; ?>
  <?php print render($page['footer']); ?>
  </div>
</footer>

  <script>
  var $ = jQuery;
  $(window).load(function() {
    var heroContainer = $("#hero-bkgrd-container");
    var slideHeight = $("#left-side")[0].scrollHeight;
    var heroBkgrdRight = $("#hero-bkgrd-right");
    var video = document.getElementById("right-side")
      var position = getVideoPosition(video);
    heroContainer.height(slideHeight + "px");
    heroBkgrdRight.css("left", position.right + "px").removeClass("hidden");

    $(window).resize(function () {
      var position = getVideoPosition(video);
      heroBkgrdRight.css("left", position.right + "px");
    });

    function getVideoPosition (video) {
      return video.getBoundingClientRect();
    } 
  });
</script>

