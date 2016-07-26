<?php get_header(); ?>
<div class="main1">
    <? if (have_posts()): ?>
        <? while (have_posts()) : the_post(); ?>
            <div class="col-md-12 articles">
                <div class="col-md-9 col-sm-12 col-xs-12">
                    <div class="col-md-12 article">
                        <p class="p2"><? the_date('d.m.Y') ?><a href="#"><span>[</span>Books<span>]</span></a>
                        </p>
                        <h2><? the_title(); ?></h2>
                        <? the_content(); ?>


                        <p class="author">Текст: Леся Гончарова<br>
                            Фото: Бубу Мгвамба</p>
                        <div class="col-md-4 col-sm-12 clearfix visible-sm-block visible-md-block visible-lg-block"><p
                                class="p3">Поделиться</p></div>
                        <div
                            class="col-md-4 col-sm-6 col-sm-offset-3 col-md-offset-0 clearfix visible-sm-block visible-md-block visible-lg-block">
                            <ul class="icon-footer">
                                <li class="clearfix visible-sm-block visible-md-block visible-lg-block"><a href="#"><img
                                            src="<?= get_site_url() ?>/wp-content/themes/best-people/images/face_f.png"></a>
                                </li>
                                <li class="clearfix visible-sm-block visible-md-block visible-lg-block"><a href="#"><img
                                            src="<?= get_site_url() ?>/wp-content/themes/best-people/images/insta_f.png"></a>
                                </li>
                                <li class="clearfix visible-sm-block visible-md-block visible-lg-block"><a href="#"><img
                                            src="<?= get_site_url() ?>/wp-content/themes/best-people/images/vk_f.png"></a>
                                </li>
                                <li class="clearfix visible-sm-block visible-md-block visible-lg-block"><a href="#"><img
                                            src="<?= get_site_url() ?>/wp-content/themes/best-people/images/youtube_f.png"></a>
                                </li>
                                <li class="clearfix visible-sm-block visible-md-block visible-lg-block"><a href="#"><img
                                            src="<?= get_site_url() ?>/wp-content/themes/best-people/images/twitter_f.png"></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <?php comments_template(); ?>
                </div>
                <? get_sidebar()?>
            </div>
        <? endwhile; ?>
    <? endif; ?>
    <div class="col-md-12 music clearfix visible-md-block visible-lg-block">
        <?php if ( is_active_sidebar( '1-row-post' ) ) : ?>
            <?php dynamic_sidebar( '1-row-post' ); ?>
        <?php endif; ?>
    </div>
    <div class="col-sm-12 block music_sm clearfix visible-sm-block">
        <div class="col-sm-4 bottom clearfix visible-sm-block"></div>
        <div class="col-sm-4 col-md-12"><h1 class="clearfix visible-md-block visible-lg-block visible-sm-block">
                [Music]</h1></div>
        <div class="col-sm-4 bottom clearfix visible-sm-block"></div>
        <div class="col-sm-12">
            <div id="slide6" class="owl-carousel owl-theme">
                <div class="item"><a href="#"><img class="lazyOwl"
                                                   src="<?= get_site_url() ?>/wp-content/themes/best-people/images/music_girl.jpg"
                                                   alt="Lazy Owl Image"></a>
                    <h3>В интервью Джонни рассказал всю правду о главном</h3></div>
                <div class="item"><a href="#"><img class="lazyOwl"
                                                   src="<?= get_site_url() ?>/wp-content/themes/best-people/images/delon.jpg"
                                                   alt="Lazy Owl Image"></a>
                    <h3>В интервью Джонни рассказал всю правду о главном</h3></div>
                <div class="item"><a href="#"><img class="lazyOwl"
                                                   src="<?= get_site_url() ?>/wp-content/themes/best-people/images/lourens.jpg"
                                                   alt="Lazy Owl Image"></a>
                    <h3>В интервью Джонни рассказал всю правду о главном</h3></div>
            </div>
            <div class="customNavigation">
                <a class="btn prev6"><img
                        src="<?= get_site_url() ?>/wp-content/themes/best-people/images/prev.png"></a>
                <a class="btn next6"><img
                        src="<?= get_site_url() ?>/wp-content/themes/best-people/images/next.png"></a>
            </div>
        </div>
    </div>
    <div class="row lifestyle">
        <?php if (is_active_sidebar('2-row-post')) : ?>
            <?php dynamic_sidebar('2-row-post'); ?>
        <?php endif; ?>
    </div>
</div>

<?php get_footer(); ?>
