<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>People</title>

    <!-- Bootstrap -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?=get_site_url()?>/wp-content/themes/best-people/css/bootstrap.vertical-tabs.min.css" rel="stylesheet">
    <link href="<?=get_site_url()?>/wp-content/themes/best-people/css/style.css" rel="stylesheet">
    <link href="<?=get_site_url()?>/wp-content/themes/best-people/css/fonts.css" rel="stylesheet">
    <link href="<?=get_site_url()?>/wp-content/themes/best-people/css/owl.carousel.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

<div class="container">
    <header>
        <div class="row">
            <div class="logo col-xs-12 clearfix visible-xs-block"><img class="img-responsive" src="<?=get_site_url()?>/wp-content/themes/best-people/images/logo.png"></div>
            <div class="col-md-4 col-sm-4 col-xs-5">
                <ul class="icon-networks">
                    <li class="clearfix visible-md-block visible-lg-block"><a href="#"><img src="<?=get_site_url()?>/wp-content/themes/best-people/images/face.png"></a></li>
                    <li class="clearfix visible-md-block visible-lg-block"><a href="#"><img src="<?=get_site_url()?>/wp-content/themes/best-people/images/insta.png"></a></li>
                    <li class="clearfix visible-md-block visible-lg-block"><a href="#"><img src="<?=get_site_url()?>/wp-content/themes/best-people/images/vk.png"></a></li>
                    <li class="clearfix visible-md-block visible-lg-block"><a href="#"><img src="<?=get_site_url()?>/wp-content/themes/best-people/images/youtube.png"></a></li>
                    <li class="clearfix visible-xs-block visible-sm-block"><a href="#"><img class="img-responsive" src="<?=get_site_url()?>/wp-content/themes/best-people/images/face1.png"></a></li>
                    <li class="clearfix visible-xs-block visible-sm-block"><a href="#"><img class="img-responsive" src="<?=get_site_url()?>/wp-content/themes/best-people/images/insta1.png"></a></li>
                </ul>
            </div>
            <div class="logo col-sm-4 clearfix visible-sm-block"><img class="img-responsive" src="<?=get_site_url()?>/wp-content/themes/best-people/images/logo.png"></div>
            <div class="col-md-4 col-sm-2 col-md-offset-4 clearfix visible-md-block visible-lg-block visible-sm-block">
                <ul class="icon-control">
                    <li class="clearfix visible-md-block visible-lg-block"><a href="#"><img src="<?=get_site_url()?>/wp-content/themes/best-people/images/home.png"></a></li>
                    <li class="clearfix visible-md-block visible-lg-block"><a href="#"><img src="<?=get_site_url()?>/wp-content/themes/best-people/images/letter.png"></a></li>
                    <li class="clearfix visible-md-block visible-lg-block"><a href="#"><img src="<?=get_site_url()?>/wp-content/themes/best-people/images/glass.png"></a></li>
                    <li class="clearfix visible-md-block visible-lg-block"><a href="#"><img src="<?=get_site_url()?>/wp-content/themes/best-people/images/enter.png"></a></li>
                    <li class="letter clearfix visible-xs-block"><a href="#"><img class="img-responsive" src="<?=get_site_url()?>/wp-content/themes/best-people/images/letter_1.png"></a></li>
                    <li class="enter clearfix visible-sm-block visible-xs-block"><a href="#"><img src="<?=get_site_url()?>/wp-content/themes/best-people/images/enter1.png"></a></li>
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
                        <form class="form-inline form1 clearfix visible-sm-block visible-xs-block">
                            <input class="form-control" type="search" name="q" placeholder="Search...">
                            <button class="btn btn-default" type="submit"><img src="<?=get_site_url()?>/wp-content/themes/best-people/images/searchmenu.png"></button>
                        </form>
                        <?
                            $categories = get_categories(array(
                                'orderby' => 'id',
                                'hide_empty'=> 0
                            ));
                            array_shift($categories);

//                            echo "<pre>";
//                            print_r($categories);
//                            echo "/<pre>";
                        ?>
                        <ul class="nav navbar-nav navbar-left">
                            <? foreach($categories as $key => $category):?>
                                <li class="dropdown">
                                    <a class="clearfix visible-sm-block visible-xs-block" href="#"><?=$category->name?></a><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"></a>
                                    <a class="clearfix visible-md-block visible-lg-block dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?=$category->name?> </a>
                                    <ul class="dropdown-menu">
                                        <li><a href="#">Cinema</a></li>
                                        <li><a href="#">Theatre</a></li>
                                        <li><a href="#">Art</a></li>
                                        <li><a href="#">Books</a></li>
                                    </ul>
                                </li>
                                <? if($key == 3) break;?>
                            <? endforeach;?>
                        </ul>
                    </div>
                    <div class="col-md-4 clearfix visible-md-block visible-lg-block"><a class="navbar-brand" href="#"><img class="img-responsive" src="<?=get_site_url()?>/wp-content/themes/best-people/images/logo.png"></a></div>
                    <div class="col-md-4">
                        <ul class="nav navbar-nav navbar-right">
                            <? foreach($categories as $key => $category):?>
                                <? if($key < 4) continue;?>
                                <li class="dropdown">
                                    <a class="clearfix visible-sm-block visible-xs-block" href="#"><?=$category->name?></a><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"></a>
                                    <a class="clearfix visible-md-block visible-lg-block dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?=$category->name?></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="#">Cinema</a></li>
                                        <li><a href="#">Theatre</a></li>
                                        <li><a href="#">Art</a></li>
                                        <li><a href="#">Backstage</a></li>
                                    </ul>
                                </li>
                            <? endforeach;?>
                        </ul>
                    </div>
                </div><!-- /.navbar-collapse -->
                <!-- /.container-fluid -->
            </nav>
            <div class="col-xs-5 clearfix visible-xs-block">
                <ul class="icon-control">
                    <li class="letter clearfix visible-xs-block"><a href="#"><img class="img-responsive" src="<?=get_site_url()?>/wp-content/themes/best-people/images/letter_1.png"></a></li>
                    <li class=" enter clearfix visible-xs-block"><a href="#"><img src="<?=get_site_url()?>/wp-content/themes/best-people/images/enter1.png"></a></li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-md-offset-4 col-md-4 col-sm-offset-3 col-sm-6 clearfix visible-sm-block visible-md-block visible-lg-block">
                <form class="form-inline">
                    <input class="form-control" type="search" name="q" placeholder="Search...">
                    <button class="btn btn-default" type="submit"><img src="<?=get_site_url()?>/wp-content/themes/best-people/images/glass.png"></button>
                </form>
            </div>
        </div>
    </header>