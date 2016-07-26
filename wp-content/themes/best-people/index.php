<?php get_header(); ?>
<main>
    <div class="row block clearfix visible-sm-block visible-md-block visible-lg-block">
        <?php if ( is_active_sidebar( '1-row' ) ) : ?>
            <?php dynamic_sidebar( '1-row' ); ?>
        <?php endif; ?>
        <div class="col-md-3 clearfix visible-md-block clearfix visible-lg-block">
            <a href="#"><img class="top-right img-responsive" src="<?=get_site_url()?>/wp-content/themes/best-people/images/banner_top_right.jpg"></a>
        </div>
    </div>
    <div class="row people block">
        <?php if ( is_active_sidebar( '2-row' ) ) : ?>
            <?php dynamic_sidebar( '2-row' ); ?>
        <?php endif; ?>
    </div>
    <div class="row exclusive block">
        <?php if ( is_active_sidebar( '3-row' ) ) : ?>
            <?php dynamic_sidebar( '3-row' ); ?>
        <?php endif; ?>
    </div>
    <div class="row block clearfix visible-md-block clearfix visible-lg-block visible-sm-block">
        <?php if ( is_active_sidebar( '4-row' ) ) : ?>
            <?php dynamic_sidebar( '4-row' ); ?>
        <?php endif; ?>
    </div>
    <div class="row block event clearfix visible-md-block clearfix visible-lg-block">
        <?php if ( is_active_sidebar( '5-row' ) ) : ?>
            <?php dynamic_sidebar( '5-row' ); ?>
        <?php endif; ?>
    </div>
    <div class="row block event_sm clearfix visible-sm-block">
        <?php if ( is_active_sidebar( '5-row' ) ) : ?>
            <?php dynamic_sidebar( '5-row' ); ?>
        <?php endif; ?>
    </div>
    <div class="row block video_photo">
        <?php if ( is_active_sidebar( 'video' ) ) : ?>
            <?php dynamic_sidebar( 'video' ); ?>
        <?php endif; ?>
        <?php if ( is_active_sidebar( 'photo' ) ) : ?>
            <?php dynamic_sidebar( 'photo' ); ?>
        <?php endif; ?>
    </div>
    <div class="row block culture">
        <?php if ( is_active_sidebar( '7-row' ) ) : ?>
            <?php dynamic_sidebar( '7-row' ); ?>
        <?php endif; ?>
<!--        <h1>[Culture]</h1>-->
<!--        <div class="col-md-6 col-sm-12">-->
<!--            <a href="#"><img class="img-responsive" src="--><?//=get_site_url()?><!--/wp-content/themes/best-people/images/depp.jpg"></a>-->
<!--            <h3>В интервью Джонни рассказал всю правду</h3>-->
<!--            <p>В интервью Джонни рассказал-->
<!--            всю правду о главном, но мы ему-->
<!--            не поверили. В интервью Джонни-->
<!--            рассказал всю правдуВ интервью-->
<!--            Джонни рассказалвсю правду о-->
<!--            главном, но мы емуне поверили </p>-->
<!--            <a href="#" class="col-md-3 clearfix visible-md-block visible-lg-block"><img src="--><?//=get_site_url()?><!--/wp-content/themes/best-people/images/next1.png"></a>-->
<!--        </div>-->
<!--        <div class="col-md-6 col-sm-12">-->
<!--            <a href="#"><img class="img-responsive" src="--><?//=get_site_url()?><!--/wp-content/themes/best-people/images/music_girl.jpg"></a>-->
<!--            <h3>В интервью Джонни рассказал всю правду</h3>-->
<!--            <p>В интервью Джонни рассказал-->
<!--            всю правду о главном, но мы ему-->
<!--            не поверили. В интервью Джонни-->
<!--            рассказал всю правдуВ интервью-->
<!--            Джонни рассказалвсю правду о-->
<!--            главном, но мы емуне поверили </p>-->
<!--            <a href="#" class="col-md-3 clearfix visible-md-block visible-lg-block"><img src="--><?//=get_site_url()?><!--/wp-content/themes/best-people/images/next1.png"></a>-->
<!--        </div>-->
<!--        <div class="col-md-6 col-sm-12">-->
<!--            <a href="#"><img class="img-responsive" src="--><?//=get_site_url()?><!--/wp-content/themes/best-people/images/delon.jpg"></a>-->
<!--            <h3>В интервью Джонни рассказал всю правду</h3>-->
<!--            <p>В интервью Джонни рассказал-->
<!--            всю правду о главном, но мы ему-->
<!--            не поверили. В интервью Джонни-->
<!--            рассказал всю правдуВ интервью-->
<!--            Джонни рассказалвсю правду о-->
<!--            главном, но мы емуне поверили </p>-->
<!--            <a href="#" class="col-md-3 clearfix visible-md-block visible-lg-block"><img src="--><?//=get_site_url()?><!--/wp-content/themes/best-people/images/next1.png"></a>-->
<!--        </div>-->
<!--        <div class="col-md-6 col-sm-12">-->
<!--            <a href="#"><img class="img-responsive" src="--><?//=get_site_url()?><!--/wp-content/themes/best-people/images/lourens.jpg"></a>-->
<!--            <h3>В интервью Джонни рассказал всю правду</h3>-->
<!--            <p>В интервью Джонни рассказал-->
<!--            всю правду о главном, но мы ему-->
<!--            не поверили. В интервью Джонни-->
<!--            рассказал всю правдуВ интервью-->
<!--            Джонни рассказалвсю правду о-->
<!--            главном, но мы емуне поверили </p>-->
<!--            <a href="#" class="col-md-3 clearfix visible-md-block visible-lg-block"><img src="--><?//=get_site_url()?><!--/wp-content/themes/best-people/images/next1.png"></a>-->
<!--        </div>-->
    </div>
    <div class="row block music clearfix visible-md-block visible-lg-block">
        <?php if ( is_active_sidebar( '8-row' ) ) : ?>
            <?php dynamic_sidebar( '8-row' ); ?>
        <?php endif; ?>
    </div>
    <div class="row block music_sm clearfix visible-sm-block">
        <?php if ( is_active_sidebar( '8-row' ) ) : ?>
            <?php dynamic_sidebar( '8-row' ); ?>
        <?php endif; ?>
    </div>
    <div class="row block lifestyle">
        <?php if ( is_active_sidebar( '9-row' ) ) : ?>
            <?php dynamic_sidebar( '9-row' ); ?>
        <?php endif; ?>
    </div>
</main>
<?php get_footer(); ?>