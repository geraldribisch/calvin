<!-- Calvin for Bludit by Gerald Ribisch ================================================== -->
<?php

function console_log($output, $with_script_tags = true) {
    $js_code = 'console.log(' . json_encode($output, JSON_HEX_TAG) . ');';
    if ($with_script_tags) {
        $js_code = '<script>' . $js_code . '</script>';
    }
    echo $js_code;
}

$posts = array();
$stickyPosts = array();

foreach($content as $page) {
    if($page->type()=="sticky")
        array_push($stickyPosts, $page);
    else
        array_push($posts, $page);
}
?>

<!DOCTYPE html>
<html class="no-js" lang="<?php echo Theme::lang() ?>">
<head>

    <!--- basic page needs
    ================================================== -->
    <meta charset="utf-8">
    <?php echo Theme::metaTags('title') ?>
    <?php echo Theme::metaTags('description') ?>
    <meta name="author" content="">
    <meta name="generator" content="Bludit">

    <!-- mobile specific metas
    ================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSS
    ================================================== -->
    <?php echo Theme::css('css/vendor.css') ?>
    <?php echo Theme::css('css/styles.css') ?>

    <!-- script
    ================================================== -->
    <?php echo Theme::js('js/modernizr.js') ?>
    <?php echo Theme::js('js/fontawesome/all.min.js') ?>


    <!-- favicons
    ================================================== -->
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo Theme::src('apple-touch-icon.png') ?>">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo Theme::src('favicon-32x32.png') ?>">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo Theme::src('favicon-16x16.png') ?>">
    <link rel="manifest" href="<?php echo Theme::src('site.webmanifest') ?>">
    
    <!-- Load Bludit Plugins: Site head -->
	<?php Theme::plugins('siteHead') ?>
</head>

<body id="top">
	<!-- Load Bludit Plugins: Site Body Begin -->
	<?php Theme::plugins('siteBodyBegin') ?>

    <!-- preloader
    ================================================== -->
    <div id="preloader"> 
    	<div id="loader"></div>
    </div>


    <!-- header
    ================================================== -->

    <?php if (empty($stickyPosts) or $WHERE_AM_I == 'page' or $WHERE_AM_I == 'category' ): ?>
    <header class="s-header s-header--opaque">
    <?php else: ?>
    <header class="s-header">
    <?php endif; ?>


        <div class="s-header__logo">
            <a class="logo" href="<?php echo Theme::siteUrl() ?>">
                <img src="<?php echo ($site->logo()?$site->logo():Theme::src('images/logo.svg')) ?>" alt="Homepage">
            </a>
        </div>

        <div class="row s-header__navigation">

            <nav class="s-header__nav-wrap">

                <h3 class="s-header__nav-heading h6">Navigate to</h3>

                <ul class="s-header__nav">
                    <?php if($WHERE_AM_I == "home"): ?>
                    <li class="current"><a href="<?php echo Theme::siteUrl() ?>" title="">Home</a></li>
                    <?php else: ?>
                    <li><a href="<?php echo Theme::siteUrl() ?>" title="">Home</a></li>
                    <?php endif ?>
                    
                    <!-- Categories -->
                    <?php if($WHERE_AM_I == "category"): ?>
                    <li class="has-children current">
                    <?php else: ?>
                    <li class="has-children">
                    <?php endif ?>
                        <a href="#0" title="">Categories</a>
                        <ul class="sub-menu">
                        <?php foreach ($categories->db as $categoryKey=>$categoryFields): ?>
                        <li><a href="<?php echo DOMAIN_CATEGORIES.$categoryKey ?>"><?php echo $categoryFields['name'] ?></a></li>
                        <?php endforeach ?>
                        </ul>
                    </li>
                    
                    <!-- Static pages -->
                    <?php foreach ($staticContent as $staticPage): ?>
                        <?php if ($url->slug() == $staticPage->slug()):?>
                    <li class="current"><a href="<?php echo $staticPage->permalink() ?>" title=""><?php echo $staticPage->title() ?></a></li>
                        <?php else: ?>
                    <li><a href="<?php echo $staticPage->permalink() ?>" title=""><?php echo $staticPage->title() ?></a></li>
                        <?php endif ?>
                    <?php endforeach ?>
                </ul> <!-- end s-header__nav -->

                <a href="#0" title="Close Menu" class="s-header__overlay-close close-mobile-menu">Close</a>

            </nav> <!-- end s-header__nav-wrap -->

        </div> <!-- end s-header__navigation -->

        <a class="s-header__toggle-menu" href="#0" title="Menu"><span>Menu</span></a>

        <!-- TODO: Enable Search if PluginActivated // 12.4.2021 @geraldribisch
        =======================================================================

        <div class="s-header__search">

            <div class="s-header__search-inner">
                <div class="row wide">

                    <form role="search" method="get" class="s-header__search-form" action="#">
                        <label>
                            <span class="h-screen-reader-text">Search for:</span>
                            <input type="search" class="s-header__search-field" placeholder="Search for..." value="" name="s" title="Search for:" autocomplete="off">
                        </label>
                        <input type="submit" class="s-header__search-submit" value="Search"> 
                    </form>

                    <a href="#0" title="Close Search" class="s-header__overlay-close">Close</a>

                </div> <!-- end row --
            </div> <!-- s-header__search-inner --

        </div> <!-- end s-header__search wrap --	

        <a class="s-header__search-trigger" href="#">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 17.982 17.983"><path fill="#010101" d="M12.622 13.611l-.209.163A7.607 7.607 0 017.7 15.399C3.454 15.399 0 11.945 0 7.7 0 3.454 3.454 0 7.7 0c4.245 0 7.699 3.454 7.699 7.7a7.613 7.613 0 01-1.626 4.714l-.163.209 4.372 4.371-.989.989-4.371-4.372zM7.7 1.399a6.307 6.307 0 00-6.3 6.3A6.307 6.307 0 007.7 14c3.473 0 6.3-2.827 6.3-6.3a6.308 6.308 0 00-6.3-6.301z"/></svg>
        </a>
        ============================================================================-->

    </header> <!-- end s-header -->

    <!-- site content
    ================================================== -->
    <?php
        if ($WHERE_AM_I == 'page') {
            include(THEME_DIR.'page.php');
        } elseif ($WHERE_AM_I == 'category') {
            include(THEME_DIR.'category.php');
        } else {
            include(THEME_DIR.'home.php');
        }
    ?>

    <!-- footer
    ================================================== -->
    <footer class="s-footer">

        <div class="s-footer__main">

            <div class="row">
                
                <?php if (pluginActivated('pluginAbout')): ?>
                <div class="column large-3 medium-6 tab-12 s-footer__info">

                    <h5>
                    <?php echo html_entity_decode(nl2br( $pluginsInstalled['pluginAbout']->getValue('label') )) ?>
                    </h5>

                    <p>
                    <?php echo html_entity_decode(nl2br( $pluginsInstalled['pluginAbout']->getValue('text') )) ?>
                    </p>

                </div> <!-- end s-footer__info -->
                <?php endif ?>

                
                <div class="column large-2 medium-3 tab-6 s-footer__site-links">

                    <h5>Site Links</h5>

                    <ul>
                        
                        <!-- Static pages -->
                        <?php foreach ($staticContent as $staticPage): ?>
                        <li><a href="<?php echo $staticPage->permalink() ?>"><?php echo $staticPage->title() ?></a></li>
                        <?php endforeach ?>
                        
                    </ul>

                </div> <!-- end s-footer__site-links -->  

                <div class="column large-2 medium-3 tab-6 s-footer__social-links">

                    <h5>Follow Us</h5>

                    <ul>
                        
                        <?php foreach (Theme::socialNetworks() as $key=>$label): ?>
                        <li><a href="<?php echo $site->{$key}() ?>"><?php echo $label ?></a></li>
                        <?php endforeach ?> 
                        
                    </ul>

                </div> <!-- end s-footer__social links --> 

        <!-- TODO: Newsletter Plugin // 12.4.2021 @geraldribisch
        =======================================================================

                <div class="column large-3 medium-6 tab-12 s-footer__subscribe">

                    <h5>Sign Up for Newsletter</h5>

                    <p>Signup to get updates on articles, interviews and events.</p>

                    <div class="subscribe-form">
                
                        <form id="mc-form" class="group" novalidate="true">

                            <input type="email" value="" name="dEmail" class="email" id="mc-email" placeholder="Your Email Address" required=""> 
                
                            <input type="submit" name="subscribe" value="subscribe" >
                
                            <label for="mc-email" class="subscribe-message"></label>
                
                        </form>

                    </div>

                </div> <!-- end s-footer__subscribe --
        =======================================================================-->
                
            </div> <!-- end row -->

        </div> <!-- end s-footer__main -->

        <div class="s-footer__bottom">
            <div class="row">
                <div class="column">
                    <div class="ss-copyright">
                        <span><?php echo $site->footer() ?></span> 
                        <span>Design by <a href="https://www.styleshout.com/">StyleShout</a></span>
                        <span>Powered by <a href="https://www.bludit.com/">Bludit</a></span>
                    </div> <!-- end ss-copyright -->
                </div>
            </div> 

            <div class="ss-go-top">
                <a class="smoothscroll" title="Back to Top" href="#top">
                    <svg viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg" width="15" height="15"><path d="M7.5 1.5l.354-.354L7.5.793l-.354.353.354.354zm-.354.354l4 4 .708-.708-4-4-.708.708zm0-.708l-4 4 .708.708 4-4-.708-.708zM7 1.5V14h1V1.5H7z" fill="currentColor"></path></svg>
                </a>
            </div> <!-- end ss-go-top -->
        </div> <!-- end s-footer__bottom -->

   </footer> <!-- end s-footer -->


    <!-- Java Script
    ================================================== -->
    <?php echo Theme::jquery() ?>
    <?php echo Theme::js('js/plugins.js') ?>
    <?php echo Theme::js('js/main.js') ?>

	<!-- Load Bludit Plugins: Site Body End -->
	<?php Theme::plugins('siteBodyEnd') ?> 

</body>

</html>