<?php get_header(); ?>
<div class="main1">
    <? if (have_posts()): ?>
        <? while (have_posts()) : the_post(); ?>
            <? $categories = get_the_category();?>
            <div class="col-md-12 articles">
                <div class="col-md-9 col-sm-12 col-xs-12">
                    <div class="col-md-12 article">
                        <h1><? the_title(); ?></h1>
                        <? the_content(); ?>
                    </div>
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
    <div class="row lifestyle">
        <?php if (is_active_sidebar('2-row-post')) : ?>
            <?php dynamic_sidebar('2-row-post'); ?>
        <?php endif; ?>
    </div>
</div>

<?php get_footer(); ?>
