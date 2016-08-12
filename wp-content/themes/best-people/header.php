<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title><? wp_title()?></title>

    <!-- Bootstrap -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?=get_site_url()?>/wp-content/themes/best-people/css/style.css" rel="stylesheet">
    <link href="<?=get_site_url()?>/wp-content/themes/best-people/css/fonts.css" rel="stylesheet">
    <link href="<?=get_site_url()?>/wp-content/themes/best-people/css/owl.carousel.css" rel="stylesheet">
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">
    <link rel="shortcut icon" type="image/png" href="<?=get_site_url()?>/wp-content/themes/best-people/images/ico.png"/>


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <?php wp_head(); ?>
</head>
<body>
<div id="wptime-plugin-preloader"></div>
<div class="container">
    <header>
        <div class="row">
            <div class="logo col-xs-12 clearfix visible-xs-block">
                <a href="/"><img class="img-responsive" src="<?=get_site_url()?>/wp-content/themes/best-people/images/Best_people_club_logo.png"></a>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-5">
                <ul class="icon-networks">
                    <li class="clearfix visible-md-block visible-lg-block"><a href="#"></a></li>
                    <li class="clearfix visible-md-block visible-lg-block"><a href="#"></a></li>
                    <li class="clearfix visible-md-block visible-lg-block"><a href="#"></a></li>
                    <li class="clearfix visible-md-block visible-lg-block"><a href="#"></a></li>
                    <li class="clearfix visible-xs-block visible-sm-block"><a href="#"></a></li>
                    <li class="clearfix visible-xs-block visible-sm-block"><a href="#"></a></li>
                </ul>
            </div>
            <div class="logo col-sm-4 clearfix visible-sm-block">
                <a href="/"><img class="img-responsive" src="<?=get_site_url()?>/wp-content/themes/best-people/images/Best_people_club_logo.png"></a>
            </div>
            <div class="col-md-4 col-sm-2 col-md-offset-4 clearfix visible-md-block visible-lg-block visible-sm-block">
                <ul class="icon-control">
                    <li class="clearfix visible-md-block visible-lg-block"><a href="/"></a></li>
                    <li class="clearfix visible-md-block visible-lg-block"><a href="#"></a></li>
                    <li class="clearfix visible-md-block visible-lg-block"><a id="search_link" href="#"></a></li>
                    <li class="clearfix visible-md-block visible-lg-block">
                        <? if(is_user_logged_in()) :?>
                            <a type="button" class="btn-lg logout-btn" href="<?=wp_logout_url($_SERVER['REQUEST_URI']);?>" title="Выход">
                                <span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>
                            </a>
                        <? else:?>
                            <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal"></button>
                        <? endif;?>
                    </li>
                    <li class="clearfix visible-xs-block"><a href="#"></a></li>
                    <li class="enter clearfix visible-sm-block visible-xs-block">
                        <? if(is_user_logged_in()) :?>
                            <a type="button" class="btn-lg logout-btn" href="<?=wp_logout_url($_SERVER['REQUEST_URI']);?>" title="Выход">
                                <span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>
                            </a>
                        <? else:?>
                            <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal"></button>
                        <? endif;?>
                    </li>
                </ul>
            </div>
            <nav class="navbar navbar-default col-sm-2 col-xs-2 col-md-12">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <div class="col-md-4">
                        <form class="form-inline form1 clearfix visible-sm-block visible-xs-block" method="get" action="<?= esc_url( home_url( '/' ) ); ?>">
                            <input class="form-control" type="search" name="s" placeholder="Search..." value="<?=get_search_query(); ?>">
                            <button class="btn btn-default" type="submit"><img src="<?=get_site_url()?>/wp-content/themes/best-people/images/searchmenu.png"></button>
                        </form>
                        <ul class="nav navbar-nav navbar-left">
                            <? $categories = get_categories(array('hide_empty' => false)); ?>
                            <? $counter = 0;?>
                            <? $exclude = '';?>
                            <? foreach($categories as $category):?>
                                <? if($category->parent != 0) continue;?>
                                <li class="dropdown">
                                    <a class="clearfix visible-sm-block visible-xs-block" href="<?=get_category_link($category->cat_ID);?>"><?=$category->name?></a>
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"></a>
                                    <a class="clearfix visible-md-block visible-lg-block" href="<?=get_category_link($category->cat_ID);?>"><?=$category->name?></a>
                                    <ul class="dropdown-menu">
                                        <? $children = get_categories(array('parent' => $category->term_id, 'hide_empty' => false)); ?>
                                        <? foreach($children as $child):?>
                                            <li><a href="<?=get_category_link($child->cat_ID);?>"><?=$child->name?></a></li>
                                        <? endforeach;?>
                                    </ul>
                                </li>
                                <? $counter++; ?>
                                <? $exclude .= $category->cat_ID.',';?>
                                <? if($counter == 4) break;?>
                            <? endforeach;?>
                        </ul>
                    </div>
                    <div class="col-md-4 clearfix visible-md-block visible-lg-block"><a class="navbar-brand" href="/">
                            <img class="img-responsive" src="<?=get_site_url()?>/wp-content/themes/best-people/images/Best_people_club_logo.png"></a>
                    </div>
                    <div class="col-md-4">
                        <ul class="nav navbar-nav navbar-right">
                            <? $categories = get_categories(array('hide_empty' => false, 'exclude' => $exclude)); ?>
                            <? $counter = 0;?>
                            <? foreach($categories as $category):?>
                                <? if($category->parent != 0) continue;?>
                                <li class="dropdown">
                                    <a class="clearfix visible-sm-block visible-xs-block" href="<?=get_category_link($category->cat_ID);?>"><?=$category->name?></a>
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"></a>
                                    <a class="clearfix visible-md-block visible-lg-block" href="<?=get_category_link($category->cat_ID);?>"><?=$category->name?></a>
                                    <ul class="dropdown-menu">
                                        <? $children = get_categories(array('parent' => $category->term_id, 'hide_empty' => false)); ?>
                                        <? foreach($children as $child):?>
                                            <li><a href="<?=get_category_link($child->cat_ID);?>"><?=$child->name?></a></li>
                                        <? endforeach;?>
                                    </ul>
                                </li>
                                <? $counter++; ?>
                                <? if($counter == 5) break; ?>
                            <? endforeach;?>
                        </ul>
                    </div>
                </div>
            </nav>
            <div class="col-xs-5 clearfix visible-xs-block">
                <ul class="icon-control">
                    <li class="clearfix visible-xs-block"><a href="#"></a></li>
                    <li class=" enter clearfix visible-xs-block">
                        <? if(is_user_logged_in()) :?>
                            <a type="button" class="btn-lg logout-btn" href="<?=wp_logout_url($_SERVER['REQUEST_URI']);?>" title="Выход">
                                <span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>
                            </a>
                        <? else:?>
                            <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal"></button>
                        <? endif;?>
                    </li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div id="search" class="col-md-offset-4 col-md-4 col-sm-offset-3 col-sm-6 clearfix" >
                <form class="form-inline" role="search" method="get" action="<?= esc_url( home_url( '/' ) ); ?>">
                    <input  class="form-control" type="search" name="s" placeholder="Search..." value="<?=get_search_query(); ?>">
                    <button class="btn btn-default" type="submit"><img src="<?=get_site_url()?>/wp-content/themes/best-people/images/glass.png"></button>
                </form>
            </div>
        </div>
    </header>