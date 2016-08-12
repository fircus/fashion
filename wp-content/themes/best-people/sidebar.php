<div class="col-md-3 clearfix visible-md-block visible-lg-block top-right-banner">
    <?php if ( is_active_sidebar( '1-row-banner' ) ) : ?>
        <?php dynamic_sidebar( '1-row-banner' ); ?>
    <?php endif; ?>
    <?php if (is_active_sidebar('1-row-sidebar')) : ?>
        <?php dynamic_sidebar('1-row-sidebar'); ?>
    <?php endif; ?>
    <?php if (is_active_sidebar('2-row-sidebar')) : ?>
        <?php dynamic_sidebar('2-row-sidebar'); ?>
    <?php endif; ?>
</div>