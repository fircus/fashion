<?php get_header(); ?>
<div class="main1">
    <div class="forms col-md-4 clearfix visible-md-block visible-lg-block">
        <div class="col-md-6">
            <label class="label1" for="selectstyle">Город</label>
            <select name="language" class="form-control1" id="selectstyle">
                <option>Киев...</option>
                <option>Винница...</option>
            </select>
        </div>
        <div class='col-md-6'>
            <label class="label2" for="datetimepicker5">По дате</label>
            <div class="form-group">
                <div class='input-group date' id='datetimepicker5'>
                    <input type='text' class="form-control" />
                    <span class="input-group-addon">
							<span class="glyphicon glyphicon-calendar"></span>
						</span>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-4 col-xs-2 bottom clearfix visible-xs-block  visible-sm-block"></div>
    <div class="col-sm-4 col-xs-8 col-md-12"><h1>[<? single_cat_title(); ?>]</h1></div>
    <div class="col-sm-4 col-xs-2 bottom clearfix  visible-xs-block visible-sm-block"></div>
    <div class="col-md-12">
        <div class="col-md-9 col-sm-12 col-xs-12">
            <? query_posts('category__in='.get_query_var('cat'));?>
            <? while (have_posts()) : the_post(); ?>
                <div class="category col-md-12 col-sm-12">
                <div class="col-md-8 col-xs-12">
                    <a href="<? the_permalink()?>">
                        <?= get_the_post_thumbnail(null, 'full', array('class' => 'img-responsive', 'style' => 'max-width:95%')); ?>
                    </a>
                </div>
                <div class="col-md-4 col-xs-12">
                    <p class="p1"><? the_time('d.m.Y') ?><span class="red"><br class="clearfix visible-md-block visible-lg-block">
				<a class="category1" href="#"><span>[</span>Theatre<span>]</span></a></p>
                    <h3><? the_title(); ?></h3>
                    <p class="clearfix visible-sm-block visible-md-block visible-lg-block">
                        <?= get_the_excerpt()?>
                    </p>
                </div>
            </div>
            <? endwhile;?>
            <div class="col-sm-4 col-sm-offset-4 col-xs-8 col-xs-offset-2">
                <nav class="clearfix visible-sm-block visible-xs-block">
                    <ul class="pagination">
                        <li><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">5</a></li>
                        <li><a href="#">...</a></li>
                        <li>
                            <a href="#" aria-label="Next">
                                <span aria-hidden="true">next</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>

        <? get_sidebar()?>

    </div>
    <div class="col-sm-12 block music_sm clearfix visible-sm-block">
        <?php if (is_active_sidebar('1-row-category')) : ?>
            <?php dynamic_sidebar('1-row-category'); ?>
        <?php endif; ?>
    </div>
    <div class="col-md-12 music clearfix visible-md-block visible-lg-block">
        <?php if (is_active_sidebar('1-row-category')) : ?>
            <?php dynamic_sidebar('1-row-category'); ?>
        <?php endif; ?>
    </div>
    <div class="row block lifestyle">
        <?php if (is_active_sidebar('2-row-category')) : ?>
            <?php dynamic_sidebar('2-row-category'); ?>
        <?php endif; ?>
    </div>
</div>
<?php get_footer(); ?>
