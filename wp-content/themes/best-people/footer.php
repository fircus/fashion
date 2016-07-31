<footer>
    <div class="row">
        <ul class="clearfix col-xs-6 visible-xs-block icon-footer">
            <li class="clearfix visible-xs-block"><a href="#"><img src="<?=get_site_url()?>/wp-content/themes/best-people/images/insta1.png"></a></li>
            <li class="clearfix visible-xs-block"><a href="#"><img src="<?=get_site_url()?>/wp-content/themes/best-people/images/face1.png"></a></li>
        </ul>
        <ul class="icon-control1 col-xs-6 clearfix visible-xs-block">
            <li class="letter clearfix visible-xs-block"><a href="#"><img class="img-responsive" src="<?=get_site_url()?>/wp-content/themes/best-people/images/letter_1.png"></a></li>
            <li class="enter clearfix visible-xs-block"><a href="#"><img src="<?=get_site_url()?>/wp-content/themes/best-people/images/enter1.png"></a></li>
        </ul>
        <nav class="col-xs-12 navbar navbar-default" id="navigation1">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
                <ul class="nav navbar-nav" id="list1">
                    <? $categories = get_categories(array('hide_empty' => false)); ?>
                    <? $counter = 0;?>
                    <? foreach($categories as $category):?>
                    <? if($category->parent != 0) continue;?>
                    <? $children = get_categories(array('parent' => $category->term_id, 'hide_empty' => false)); ?>
                    <? if(sizeof($children) != 0):?>
                    <li class="dropdown">
                        <a class="clearfix visible-sm-block visible-xs-block" href="<?=get_category_link($category->cat_ID);?>"><?=$category->name?></a>
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"></a>
                        <a href="<?=get_category_link($category->cat_ID);?>" class="clearfix visible-md-block visible-lg-block dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?=$category->name?></a>
                        <ul class="dropdown-menu">
                            <? foreach($children as $child):?>
                                <li><a href="<?=get_category_link($child->cat_ID);?>"><?=$child->name?></a></li>
                            <? endforeach;?>
                        </ul>
                    </li>
                    <? else: ?>
                        <li><a href="<?=get_category_link($category->cat_ID);?>"><?=$category->name?></a></li>
                    <? endif;?>
                    <? $counter++; ?>
                    <? if($counter == 8) break; ?>
                    <? endforeach;?>
                </ul>
            </div>
        </nav>
        <div class="footer-a col-md-12 clearfix visible-sm-block visible-md-block visible-lg-block">
            <a href="#">Условия использования контента сайта</a>
        </div>
        <div class="col-md-12 clearfix visible-sm-block visible-md-block visible-lg-block">
            <ul class="list-footer">
                <li><a href="#">Рекламодателям</a></li>
                <li><a href="#">Партнерам</a></li>
                <li><a href="#">Вакансии</a></li>
                <li><a href="#">Обратная связь</a></li>
                <li><a href="#">Подписаться на рассылку</a></li>
            </ul>
        </div>
        <div class="clearfix visible-sm-block visible-md-block visible-lg-block col-md-4 col-sm-6 col-sm-offset-3 col-md-offset-4">
            <ul class="icon-footer">
                <li class="clearfix visible-sm-block visible-md-block visible-lg-block"><a href="#"><img src="<?=get_site_url()?>/wp-content/themes/best-people/images/face_f.png"></a></li>
                <li class="clearfix visible-sm-block visible-md-block visible-lg-block"><a href="#"><img src="<?=get_site_url()?>/wp-content/themes/best-people/images/insta_f.png"></a></li>
                <li class="clearfix visible-sm-block visible-md-block visible-lg-block"><a href="#"><img src="<?=get_site_url()?>/wp-content/themes/best-people/images/vk_f.png"></a></li>
                <li class="clearfix visible-sm-block visible-md-block visible-lg-block"><a href="#"><img src="<?=get_site_url()?>/wp-content/themes/best-people/images/youtube_f.png"></a></li>
                <li class="clearfix visible-sm-block visible-md-block visible-lg-block"><a href="#"><img src="<?=get_site_url()?>/wp-content/themes/best-people/images/twitter_f.png"></a></li>
            </ul>
        </div>
        <div class="col-md-12 col-sm-12 col-xs-12">
            <p>Best people club &copy 2016</p>
        </div>
    </div>
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><img src="<?=get_site_url()?>/wp-content/themes/best-people/images/close1.png"></button>
            </div>
            <div class="modal-content">
                <div class="modal-body">
                    <div class="form-horizontal">
                        <form name="loginform" method="post">
                            <div class="login">
                                <div class="form-group">
                                    <div>
                                        <input name="username" type="text" class="form-control" id="inputEmail3" placeholder="Логин">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div>
                                        <input name="password" type="password" class="form-control" id="inputPassword3" placeholder="Пароль">
                                    </div>
                                    <p class="wrong" style="display: none">Неверный логин или пароль!</p>
                                </div>
                                <? wp_nonce_field( 'ajax-login-nonce', 'security' ); ?>
                            </div>
                            <div class="buttons">
                                <div class="form-group">
                                    <div>
                                        <button name="wp-submit" type="submit" class="btn btn-default">Войти</button>
                                    </div>
                                </div>
                                <div class="login">

                                    <a class="forgot-pass" href="<?php echo wp_lostpassword_url( $redirect ); ?>">Забыли пароль?</a>
                                    <div>
                                        <button id="registration-btn" class="btn1 btn-default" data-toggle="modal" data-target="#myModal2" data-dismiss="#myModal">Регистрация</button>
                                    </div>
                                </div>
                            </div>
                        </form>

                        <p>Авторизоваться через социальные сети</p>
                        <ul class="icon-footer">
                            <?=get_ulogin_panel(0, false, true);?>
<!--                            <li><a href="#"><img src="--><?//=get_site_url()?><!--/wp-content/themes/best-people/images/facebook.png"></a></li>-->
<!--                            <li><a href="#"><img src="--><?//=get_site_url()?><!--/wp-content/themes/best-people/images/insta2.png"></a></li>-->
<!--                            <li><a href="#"><img src="--><?//=get_site_url()?><!--/wp-content/themes/best-people/images/vk2.png"></a></li>-->
<!--                            <li><a href="#"><img src="--><?//=get_site_url()?><!--/wp-content/themes/best-people/images/youtube1.png"></a></li>-->
<!--                            <li><a href="#"><img src="--><?//=get_site_url()?><!--/wp-content/themes/best-people/images/twitter2.png"></a></li>-->
                        </ul>


                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><img src="<?=get_site_url()?>/wp-content/themes/best-people/images/close1.png"></button>
            </div>
            <div class="modal-content">
                <div class="modal-body">
                    <div class="form-horizontal">
                        <form name="registrationform" method="post">
                            <div class="additional-data">
                                <div class="form-group">
                                    <div>
                                        <input name="username" type="text" class="form-control" id="inputEmail3" placeholder="Логин">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div>
                                        <input name="password" type="password" class="form-control" id="inputPassword3" placeholder="Пароль">
                                    </div>
                                </div>
<!--                                <div class="form-group">-->
<!--                                    <div>-->
<!--                                        <input type="password" class="form-control" id="inputEmail3" placeholder="Повторите пароль">-->
<!--                                    </div>-->
<!--                                </div>-->
                                <div class="form-group">
                                    <div>
                                        <input name="email" type="email" class="form-control" id="inputPassword3" placeholder="Email">
                                    </div>
                                    <p class="wrong" style="display: none"></p>
                                </div>
                                <? wp_nonce_field( 'ajax-login-nonce', 'security' ); ?>
                                <!--                            <img src="--><?//=get_site_url()?><!--/wp-content/themes/best-people/images/code.png">-->
                            </div>
                            <div class="buttons">
                                <!--                            <div class="additional-data">-->
                                <!--                                <div>-->
                                <!--                                    <button id="code" class="btn1 btn-default" type="submit">Код подтверждения</button>-->
                                <!--                                </div>-->
                                <!--                                <a class="forgot-pass" href="#">Получить новый код</a>-->
                                <!--                            </div>-->
                                <div class="form-group">
                                    <div>
                                        <button type="submit" class="btn btn-default">Зарегистрироватся</button>
                                    </div>
                                </div>

                            </div>
                        </form>
                        <p>Авторизоваться через социальные сети</p>
                        <ul class="icon-footer">
                            <?=get_ulogin_panel(0, false, true);?>
<!--                            <li><a href="#"><img src="--><?//=get_site_url()?><!--/wp-content/themes/best-people/images/facebook.png"></a></li>-->
<!--                            <li><a href="#"><img src="--><?//=get_site_url()?><!--/wp-content/themes/best-people/images/insta2.png"></a></li>-->
<!--                            <li><a href="#"><img src="--><?//=get_site_url()?><!--/wp-content/themes/best-people/images/vk2.png"></a></li>-->
<!--                            <li><a href="#"><img src="--><?//=get_site_url()?><!--/wp-content/themes/best-people/images/youtube1.png"></a></li>-->
<!--                            <li><a href="#"><img src="--><?//=get_site_url()?><!--/wp-content/themes/best-people/images/twitter2.png"></a></li>-->
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="<?=get_site_url()?>/wp-content/themes/best-people/js/bootstrap.min.js"></script>
<script src="<?=get_site_url()?>/wp-content/themes/best-people/js/owl.carousel.min.js"></script>
<script src="<?=get_site_url()?>/wp-content/themes/best-people/js/moment-with-locales.min.js"></script>
<script src="<?=get_site_url()?>/wp-content/themes/best-people/ajax-login-script.js"></script>
<script>
    $(document).ready(function() {
        var owl = $(".top-carousel .owl-carousel");
        owl.owlCarousel({
            items : 1,
            loop: true
            //lazyLoad: true,
            //nav : true
        });
        // Custom Navigation Events
        $(".top-carousel .next").click(function(){
            owl.trigger('next.owl.carousel', [1000]);
            //owl.next();
        })
        $(".top-carousel .prev").click(function(){
            owl.trigger('prev.owl.carousel', [1000]);
        })

    });
</script>
<script>
    $(document).ready(function() {
        var owl = $(".big-carousel .owl-carousel");
        owl.owlCarousel({
            items : 1,
            loop: true,
            //lazyLoad: true,
            //nav : true
        });
        // Custom Navigation Events
        $(".big-carousel .next").click(function(){
            owl.trigger('next.owl.carousel', [1000]);
            //owl.next();
        })
        $(".big-carousel .prev").click(function(){
            owl.trigger('prev.owl.carousel', [1000]);
        })

    });
</script>
<script>
    $(document).ready(function() {
        var owl = $(".small-carousel .owl-carousel");
        owl.owlCarousel({
            items : 3,
            loop: true,
            //lazyLoad: true,
            //nav : true
        });
        // Custom Navigation Events
        $(".small-carousel .next").click(function(){
            owl.trigger('next.owl.carousel', [1000]);
            //owl.next();
        })
        $(".small-carousel .prev").click(function(){
            owl.trigger('prev.owl.carousel', [1000]);
        })

    });
</script>
<script>
    $(document).ready(function() {
        var owl = $("#slide5");
        owl.owlCarousel({
            items : 2,
            loop: true,
            //lazyLoad: true,
            //nav : true
        });
        // Custom Navigation Events
        $(".next5").click(function(){
            owl.trigger('next.owl.carousel', [1000]);
            //owl.next();
        })
        $(".prev5").click(function(){
            owl.trigger('prev.owl.carousel', [1000]);
        })

    });
</script>
<script>
    $(document).ready(function() {
        var owl = $("#slide6");
        owl.owlCarousel({
            items : 2,
            loop: true,
            //lazyLoad: true,
            //nav : true
        });
        // Custom Navigation Events
        $(".next6").click(function(){
            owl.trigger('next.owl.carousel', [1000]);
            //owl.next();
        })
        $(".prev6").click(function(){
            owl.trigger('prev.owl.carousel', [1000]);
        });


        $('.dropdown').hover(
            function () {
                if ($(window).width() > 991) {
                    $('.dropdown-menu').hide();
                    $(this).children('ul').show();
                    //$('.dropdown-menu').show();
                }
            }
            ,
            function () {
                if ($(window).width() > 991) {
                    $('.dropdown-menu').hide();
                    $('.dropdown-menu').each(function (i, val) {
                        //console.log( val );
                        if ($(this).data('active') == true) {
                            $(this).show();
                        }
                    });
                }
            }
        );
    });
</script>
<?php wp_footer(); ?>
</body>
</html>