<?php get_header(); ?>
<div class="main1">
    <? if (have_posts()): ?>
        <? while (have_posts()) : the_post(); ?>
            <? $categories = get_the_category();?>
            <div class="col-md-12 articles">
                <div class="col-md-9 col-sm-12 col-xs-12">
                    <div class="col-md-12 article">
                        <p class="p2"><? the_date('d.m.Y') ?><a href="<?=get_category_link($categories[0]->cat_ID);?>"><span>[</span><?=$categories[0]->name?><span>]</span></a>
                        </p>
                        <h2><? the_title(); ?></h2>
                        <? the_content(); ?>

                        <div class="col-md-4 col-sm-12 clearfix visible-sm-block visible-md-block visible-lg-block"><p
                                class="p3">Поделиться</p></div>
                        <div
                            class="col-md-4 col-sm-6 col-sm-offset-3 col-md-offset-0 clearfix visible-sm-block visible-md-block visible-lg-block">
                            <ul class="icon-footer">
                                <li class="clearfix visible-sm-block visible-md-block visible-lg-block">
                                    <a href="http://www.facebook.com/sharer.php?u=<?='http://'.$_SERVER["HTTP_HOST"].$_SERVER['REQUEST_URI']?>" target="_blank">

                                    </a>
                                </li>
                                <li class="clearfix visible-sm-block visible-md-block visible-lg-block">
                                    <a href="https://plus.google.com/share?url=<?='http://'.$_SERVER["HTTP_HOST"].$_SERVER['REQUEST_URI']?>" target="_blank">

                                    </a>
                                </li>
                                <li class="clearfix visible-sm-block visible-md-block visible-lg-block">
                                    <a href="http://vkontakte.ru/share.php?url=<?='http://'.$_SERVER["HTTP_HOST"].$_SERVER['REQUEST_URI']?>" target="_blank">

                                    </a>
                                </li>
                                <li class="clearfix visible-sm-block visible-md-block visible-lg-block">
                                    <a href="http://twitter.com/share?url=<?='http://'.$_SERVER["HTTP_HOST"].$_SERVER['REQUEST_URI']?>&text=<? the_title(); ?>" target="_blank">

                                    </a>
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
