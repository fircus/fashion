<div class="col-md-3 clearfix visible-md-block visible-lg-block">
    <a href="#"><img class="img-responsive" src="<?= get_site_url() ?>/wp-content/themes/best-people/images/banner_top_right.jpg"></a>
    <?php if (is_active_sidebar('1-row-sidebar')) : ?>
        <?php dynamic_sidebar('1-row-sidebar'); ?>
    <?php endif; ?>
    <?php if (is_active_sidebar('2-row-sidebar')) : ?>
        <?php dynamic_sidebar('2-row-sidebar'); ?>
    <?php endif; ?>
</div>