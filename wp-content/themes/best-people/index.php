<?php get_header(); ?>
<main>
    <div class="row block clearfix visible-sm-block visible-md-block visible-lg-block">
        <?php if ( is_active_sidebar( '1-row' ) ) : ?>
            <?php dynamic_sidebar( '1-row' ); ?>
        <?php endif; ?>
        <div class="col-md-3 clearfix visible-md-block clearfix visible-lg-block top-right-banner">
            <?php if ( is_active_sidebar( '1-row-banner' ) ) : ?>
                <?php dynamic_sidebar( '1-row-banner' ); ?>
            <?php endif; ?>
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
        <div class="col1 col-md-12 big-carousel">
            <?php if ( is_active_sidebar( '4-row' ) ) : ?>
                <?php dynamic_sidebar( '4-row' ); ?>
            <?php endif; ?>
        </div>
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
        <div class="col-md-6 single-carousel video-carousel">
            <h1>[VIDEO]</h1>
            <?php if ( is_active_sidebar( 'video' ) ) : ?>
                <?php dynamic_sidebar( 'video' ); ?>
            <?php endif; ?>
        </div>
        <div class="col-md-6 single-carousel photo-carousel">
            <h1>[PHOTO]</h1>
            <?php if ( is_active_sidebar( 'photo' ) ) : ?>
                <?php dynamic_sidebar( 'photo' ); ?>
            <?php endif; ?>
        </div>
    </div>
    <div class="row block culture">
        <?php if ( is_active_sidebar( '7-row' ) ) : ?>
            <?php dynamic_sidebar( '7-row' ); ?>
        <?php endif; ?>
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