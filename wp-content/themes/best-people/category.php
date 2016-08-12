<?php get_header(); ?>
<? $filterDate = isset($_GET['date']) ? $_GET['date'] : '';?>
<? $filterTag = isset($_GET['tag']) ? $_GET['tag'] : '';?>
<? $tag_list = get_tags(); ?>



<div class="main1">

    <div class="forms col-md-4 clearfix visible-md-block visible-lg-block">
        <div class="col-md-6">
            <label class="label1" for="selectstyle">Тэг</label>
            <select name="language" class="form-control1" id="tag-list">
                <? foreach ($tag_list as $tag):?>
                    <option <?=$filterTag == $tag->name ? 'selected' : ''?> value="<?=$tag->name?>"><?=$tag->name?>...</option>
                <? endforeach;?>
            </select>
        </div>
        <div class='col-md-6'>
            <label class="label2" for="datetimepicker5">По дате</label>
            <div class="form-group">
                <div class='input-group date' id='datetimepicker5'>
                    <input type='text' class="form-control" value="<?=$filterDate?>" />
                    <span class="input-group-addon">
							<span class="glyphicon glyphicon-calendar"></span>
						</span>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-4 col-xs-2 bottom clearfix visible-xs-block  visible-sm-block"></div>
    <div class="col-sm-4 col-xs-8 col-md-12"><h1>[<?=substr(get_category_parents( get_query_var('cat') , false , '/' ), 0, -1);?>]</h1></div>
    <div class="col-sm-4 col-xs-2 bottom clearfix  visible-xs-block visible-sm-block"></div>
    <div class="col-md-12">
        <div class="col-md-9 col-sm-12 col-xs-12">
            <?
                if($filterDate != '') {
                    $arr = explode('/', $filterDate);
                    $month = $arr[0];
                    $day = $arr[1];
                    $year = $arr[2];
                    $dateQuery = '&monthnum='.$month.'&day='.$day.'&year='.$year;
                } else {
                    $dateQuery = '';
                }

                if($filterTag != '') {
                    $tagQuery = '&tag='.$filterTag;
                } else {
                    $tagQuery = '';
                }
                query_posts('category__in='.get_query_var('cat').$dateQuery.$tagQuery.'&posts_per_page=10&paged='.( get_query_var('paged') ? get_query_var('paged') : 1 ));
            ?>
            <? while (have_posts()) : the_post(); ?>
                <? $categories = get_the_category();?>
                <div class="category col-md-12 col-sm-12">
                <div class="col-md-8 col-xs-12">
                    <a href="<? the_permalink()?>">
                        <?= get_the_post_thumbnail(null, 'full', array('class' => 'img-responsive', 'style' => 'max-width:95%')); ?>
                    </a>
                </div>
                <div class="col-md-4 col-xs-12">
                    <p class="p1"><? the_time('d.m.Y') ?><span class="red"><br class="clearfix visible-md-block visible-lg-block">
				    <a class="category1" href="<?=get_category_link($categories[0]->cat_ID);?>"><span>[</span><?=$categories[0]->name?><span>]</span></a></p>
                    <h3><? the_title(); ?></h3>
                    <p class="clearfix visible-sm-block visible-md-block visible-lg-block">
                        <?= get_the_excerpt()?>
                    </p>
                </div>
            </div>
            <? endwhile;?>
            <div class="col-sm-4 col-sm-offset-4 col-xs-8 col-xs-offset-2">
                <nav class="pagination-nav clearfix">
                    <ul class="pagination">
                        <?=paginate_links(); ?>
                    </ul>
                </nav>
            </div>
        </div>

        <? get_sidebar()?>

    </div>
    <div class="row">
        <div class="col-sm-12 block music_sm clearfix visible-sm-block">
            <?php if (is_active_sidebar('1-row-category')) : ?>
                <?php dynamic_sidebar('1-row-category'); ?>
            <?php endif; ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 music clearfix visible-md-block visible-lg-block">
            <?php if (is_active_sidebar('1-row-category')) : ?>
                <?php dynamic_sidebar('1-row-category'); ?>
            <?php endif; ?>
        </div>
    </div>
    <div class="row block lifestyle clearfix">
        <div class="col-md-12">
            <?php if (is_active_sidebar('2-row-category')) : ?>
                <?php dynamic_sidebar('2-row-category'); ?>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php get_footer(); ?>
