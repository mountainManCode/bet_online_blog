<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Bet_Online
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'bet_online' ); ?></a>

	  <!-- NAV SECTION -->
	  <header class="layout-header">
        <div class="layout-top-nav-1">
            <div class="container">
                <div class="row">
                    <div class="col-5">
                        <div class="logo">
                            <a href="<?php echo home_url() ?>">
                                <img src="<?php echo get_template_directory_uri() . '/assets/img/logo-full-ag-white.png' ?>" alt='' />
                            </a>
                        </div>
                    </div>
                    <div class="col-7 ml-auto layout-header-session">
                        <nav class="layout-auth-nav">
                            <a href="./join" class="btn btn-sm layout-auth-nav-join pophover widget-dialoglink">
                                Join Now!
                            </a>
                            <a href="#" class="btn btn-sm layout-auth-nav-login pophover" onclick="alert('Todo: Link to login'); return false">
                                Login
                            </a>
                            <a class="layout-header-session-icon layout-header-session-betslip" href="#" onclick="alert('Todo: Show pending bets'); return false">
                                <img class="svg" src="<?php echo get_template_directory_uri() . '/assets/img/new/logo-betslip-clear.svg' ?>" alt='' />PENDING
                            </a>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="layout-top-nav">
            <div class="container">
                <div class="row">
                    <!-- remove until global search implemented
              <div class="col-4 no-padding">
                <form role="search" action="/search">
                  <div class="search">
                    <button class="icon"><img class="svg" src="<?php echo get_template_directory_uri() . '/assets/img/new/logo-search.svg' ?>" alt=''/></button>
                    <input size='30' type="search" id="siteSearch" name="results"
                    placeholder="What are you after today?"
                    aria-label="Search through site content">
                  </div>
                </form>
              </div> -->
                    <nav class="categories ml-auto col-8">
                        <a href="<?php echo home_url() ?>/sports">
                            <img class="svg" src="<?php echo get_template_directory_uri() . '/assets/img/new/sports.svg' ?>" alt='' />
                            <!-- no-gap
                -->
                            <span>SPORTS</span>
                        </a>
                        <!-- no-gap
                -->
                        <a href="<?php echo home_url() ?>/casino">
                            <img class="svg" src="<?php echo get_template_directory_uri() . '/assets/img/new/casino.svg' ?>" />CASINO
                        </a>
                        <!-- no-gap
                -->
                        <a href="<?php echo home_url() ?>/poker">
                            <img class="svg" src="<?php echo get_template_directory_uri() . '/assets/img/new/poker.svg' ?>" />POKER
                        </a>
                        <!-- no-gap
                -->
                        <a href="<?php echo home_url() ?>/esports">
                            <img class="svg" src="<?php echo get_template_directory_uri() . '/assets/img/new/esports.svg' ?>" />E-SPORTS
                        </a>
                        <!-- no-gap
                -->
                        <a href="<?php echo home_url() ?>/horses">
                            <img class="svg" src="<?php echo get_template_directory_uri() . '/assets/img/new/horses.svg' ?>" />HORSES
                        </a>
                        <!-- no-gap
                -->
                        <a href="<?php echo home_url() ?>/finance">
                            <img class="svg" src="<?php echo get_template_directory_uri() . '/assets/img/new/finance.svg' ?>" />FINANCE
                        </a>
                        <!-- no-gap
                -->
                        <a href="<?php echo home_url() ?>/promotions">
                            <img class="svg" src="<?php echo get_template_directory_uri() . '/assets/img/new/promos.svg' ?>" />PROMOS
                        </a>
                    </nav>
                </div>
            </div>
        </div>
    </header>

    <!-- MOBILE NAV-->
    <header id="layout-mobile-nav">
        <nav class="container-fluid">
            <div class="row no-gutters nav-menu">
                <div class="col">
                    <div data-nav="promo" class="logo-wrapper">    
                    <img class="svg" src="<?php echo get_template_directory_uri() . '/assets/img/new/icon-gift.svg' ?>" />
                    </div>
                </div>
                <div class="col">
                    <div data-nav="account" class="logo-wrapper">
                        <img class="svg" src="<?php echo get_template_directory_uri() . '/assets/img/new/logo-my-account.svg' ?>" />
                    </div>
                </div>
                <div class="col">
                    <div data-nav="home" class="logo-round">
                    <img class="svg" src="<?php echo get_template_directory_uri() . '/assets/img/new/logo-bo.svg' ?>" />
                    </div>
                </div>
                <div class="col">
                    <div data-nav="deposit" class="logo-wrapper">
                        <img class="svg" src="<?php echo get_template_directory_uri() . '/assets/img/new/logo-sportsbook.svg' ?>" />
                    </div>
                </div>
                <div class="col">
                    <div data-nav="betslip" class="logo-wrapper">
                        <img class="svg" src="<?php echo get_template_directory_uri() . '/assets/img/new/logo-betslip.svg' ?>" />
                    </div>
                </div>
                </ul>
        </nav>
        <div class="mobile-nav-content nav--home">
            <div class="container-fluid">
                <!-- remove until global search added
        <div class="row no-gutters">
            <div class="search">
            <input type="text" name="search" placeholder="What are you after today?" autocomplete="true" role="search">
            </div> 
        </div> -->
                <!-- dynamic content-->
                <nav class="row no-gutters nav-body nav-home active-nav-content tile-wrapper">
                    <div class="col-6 mobile-nav-tile">
                        <a href="<?php echo home_url() ?>/sports">
                            <img src="<?php echo get_template_directory_uri() . '/assets/img/new/icon-sports.svg' ?>"> sports
                        </a>
                    </div>
                    <div class="col-6 mobile-nav-tile">
                        <a href="<?php echo home_url() ?>/casino">
                            <img src="<?php echo get_template_directory_uri() . '/assets/img/new/icon-casino.svg' ?>"> casino
                        </a>
                    </div>
                    <div class="col-6 mobile-nav-tile">
                        <a href="<?php echo home_url() ?>/esports">
                            <img src="<?php echo get_template_directory_uri() . '/assets/img/new/icon-esports.svg' ?>"> e-sports
                        </a>
                    </div>
                    <div class="col-6 mobile-nav-tile">
                        <a href="<?php echo home_url() ?>/poker">
                            <img src="<?php echo get_template_directory_uri() . '/assets/img/new/icon-poker.svg' ?>"> poker
                        </a>
                    </div>
                    <div class="col-6 mobile-nav-tile">
                        <a href="<?php echo home_url() ?>/horses">
                            <img src="<?php echo get_template_directory_uri() . '/assets/img/new/icon-horses.svg' ?>"> horses
                        </a>
                    </div>
                    <div class="col-6 mobile-nav-tile">
                        <a href="<?php echo home_url() ?>/finance">
                            <img src="<?php echo get_template_directory_uri() . '/assets/img/new/icon-financials.svg' ?>"> financials
                        </a>
                    </div>
                </nav>
                <!-- <div class="row no-gutters nav-body nav-promo">
                    <h2>PROMO CONTENT COMING SOON</h2>
                </div>
                <div class="row no-gutters nav-body nav-account">
                    <h2>ACCOUNT CONTENT COMING SOON</h2>
                </div>
                <div class="row no-gutters nav-body nav-deposit">
                    <h2>DEPOSIT CONTENT COMING SOON</h2>
                </div>
                <div class="row no-gutters nav-body nav-betslip">
                    <h2>BETSLIP CONTENT COMING SOON</h2>
                </div>
                <div class="row no-gutters nav-body nav-loader">
                    <img class="svg" src="<?php echo get_template_directory_uri() . '/assets/img/new/logo-bo.svg' ?>" alt='' />
                </div> -->
                <!--<div class="row">
                    <div class="col-12 promotions">
                    <span><img src="<?php echo get_template_directory_uri() . '/assets/img/new/icon-gift.svg' ?>" alt='' /> </span> <span>VIEW OUR LATESTS PROMOTIONS</span>
                    </div>
                </div>-->
                <div class="mobile-nav-close">
                    <span>X</span> CLOSE MENU
                </div>
            </div>
        </div>
    </header><!-- #mobile header -->

	<div id="content" class="site-content">

