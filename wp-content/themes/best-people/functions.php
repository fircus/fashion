<?

class WP_usual_article_Widget extends WP_Widget
{
    public function __construct()
    {
        parent::__construct(
            'widget_WP_usual_article',
            'widget 2 usual articles',
            array('description' => __('Самый лучший виджет', 'text_domain'))
        );
    }

    public function update($new_instance, $old_instance)
    {
        $instance = array();
        $instance['title'] = strip_tags($new_instance['title']);
        $instance['cat'] = strip_tags($new_instance['cat']);
        return $instance;
    }

    public function form($instance)
    {
        $categories = get_categories();
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>">Имя виджета</label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>"
                   name="<?php echo $this->get_field_name('title'); ?>" type="text"
                   value="<?php echo $instance['title']; ?>"/>
        </p>
        <p>
            <label for="<?= $this->get_field_id('cat') ?>">Выберите рубрику</label> <br>
            <select name="<?= $this->get_field_name('cat') ?>" id="<?= $this->get_field_id('cat') ?>">
                <?
                foreach ($categories as $link_cat) {
                    echo '<option value="' . intval($link_cat->term_id) . '"'
                        . selected($instance['cat'], $link_cat->term_id, false)
                        . '>' . $link_cat->name . "</option>\n";
                }
                ?>
            </select>
        </p>
        <?
    }

    public function widget($args, $instance)
    {
        $popular = new WP_Query('orderby=date&order=DESC&posts_per_page=2&cat=' . $instance['cat']);
        $counter = 0;
        ?>
        <h1>[<?= $instance['title'] ?>]</h1>
        <?php
        if (have_posts()) : while ($popular->have_posts()) : $popular->the_post();
            ?>
            <div
                class="<?= $counter == 0 ? 'col-md-6 col-sm-12' : 'col-md-6 clearfix visible-md-block clearfix visible-lg-block' ?>">
                <a href="<? the_permalink() ?>">
                    <?= get_the_post_thumbnail(null, 'full', array('class' => 'img-responsive')); ?>
                </a>
                <h2><? the_title(); ?></h2>
                <p class="clearfix visible-sm-block visible-md-block visible-lg-block"><?= get_the_excerpt(); ?></p>
            </div>
            <?php
            $counter++;
        endwhile; endif;
    }
}

class WP_4_small_articles_Widget extends WP_Widget
{
    public function __construct()
    {
        parent::__construct(
            'widget_WP_4_small_articles',
            'widget 4 small articles',
            array('description' => __('4 небольших статьи', 'text_domain'))
        );
    }

    public function update($new_instance, $old_instance)
    {
        $instance = array();
        $instance['title'] = strip_tags($new_instance['title']);
        $instance['cat'] = strip_tags($new_instance['cat']);
        return $instance;
    }

    public function form($instance)
    {
        $categories = get_categories();
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>">Имя виджета</label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>"
                   name="<?php echo $this->get_field_name('title'); ?>" type="text"
                   value="<?php echo $instance['title']; ?>"/>
        </p>
        <p>
            <label for="<?= $this->get_field_id('cat') ?>">Выберите рубрику</label> <br>
            <select name="<?= $this->get_field_name('cat') ?>" id="<?= $this->get_field_id('cat') ?>">
                <?
                foreach ($categories as $link_cat) {
                    echo '<option value="' . intval($link_cat->term_id) . '"'
                        . selected($instance['cat'], $link_cat->term_id, false)
                        . '>' . $link_cat->name . "</option>\n";
                }
                ?>
            </select>
        </p>
        <?
    }

    public function widget($args, $instance)
    {
        $popular = new WP_Query('orderby=date&order=DESC&posts_per_page=4&cat=' . $instance['cat']);
        $counter = 0;
        ?>
        <h1>[<?= $instance['title'] ?>]</h1>
        <?php
        if (have_posts()) : while ($popular->have_posts()) : $popular->the_post();
            ?>
            <div
                class="<?= $counter < 2 ? 'col-md-3 col-sm-6' : 'col-md-3 clearfix visible-md-block clearfix visible-lg-block' ?>">
                <a href="<? the_permalink() ?>">
                    <?= get_the_post_thumbnail(null, 'full', array('class' => 'img-responsive')); ?>
                </a>
                <h3><? the_title(); ?></h3>
                <p class="clearfix visible-sm-block visible-md-block visible-lg-block"><?= get_the_excerpt(); ?></p>
            </div>
            <?php
            $counter++;
        endwhile; endif;
    }
}

class WP_top_carousel_Widget extends WP_Widget
{
    public function __construct()
    {
        parent::__construct(
            'widget_WP_top_carousel',
            'widget top carousel',
            array('description' => __('верхняя карусель', 'text_domain'))
        );
    }

    public function update($new_instance, $old_instance)
    {
        $instance = array();
        $instance['category_list'] = $new_instance['category_list'];
        return $instance;
    }

    public function form($instance)
    {
        $categories = get_categories();
        ?>
        <p>
            Выберите категории
        </p>
        <?
        foreach ($categories as $category):
            ?>
            <label>
                <input type="checkbox" name="<?= $this->get_field_name('category_list'); ?>[]"
                       value="<?= $category->cat_ID ?>" <?= in_array($category->cat_ID, $instance['category_list']) ? 'checked' : '' ?> > <?= $category->name ?>
            </label>
            <br>
            <?
        endforeach;
    }

    public function widget($args, $instance)
    {
        $popular = new WP_Query(array(
            'category__in' => $instance['category_list'],
            'orderBy' => 'date',
            'order' => 'DESC'
        ));
        $counter = 0;
        $used_categories = array();
        ?>
        <div class="col col-md-9 col-sm-12 clearfix visible-sm-block visible-md-block visible-lg-block top-carousel">
            <div class="owl-carousel owl-theme">
                <?php
                if (have_posts()) : while ($popular->have_posts()) : $popular->the_post();
                    $categories = get_the_category();
                    if (in_array($categories[0]->cat_ID, $used_categories)) continue;
                    ?>
                    <div class="item">
                        <a href="<? the_permalink() ?>">
                            <?= get_the_post_thumbnail(null, 'full', array('class' => 'lazyOwl')); ?>
                            <span class="top-carousel-text"><? the_title() ?></span>
                        </a>
                    </div>
                    <?php
                    $counter++;
                    $used_categories[] = $categories[0]->cat_ID;
                endwhile; endif;
                ?>
            </div>
            <div class="customNavigation">
                <a class="btn prev"><img src="<?= get_site_url() ?>/wp-content/themes/best-people/images/prev.png"></a>
                <a class="btn next"><img src="<?= get_site_url() ?>/wp-content/themes/best-people/images/next.png"></a>
            </div>
        </div>
        <?php
    }
}

class WP_big_carousel_Widget extends WP_Widget
{
    public function __construct()
    {
        parent::__construct(
            'widget_WP_big_carousel',
            'widget big carousel',
            array('description' => __('большая карусель', 'text_domain'))
        );
    }

    public function update($new_instance, $old_instance)
    {
        $instance = array();
        $instance['title'] = strip_tags($new_instance['title']);
        $instance['cat'] = strip_tags($new_instance['cat']);
        return $instance;
    }

    public function form($instance)
    {
        $categories = get_categories();
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>">Имя виджета</label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>"
                   name="<?php echo $this->get_field_name('title'); ?>" type="text"
                   value="<?php echo $instance['title']; ?>"/>
        </p>
        <p>
            <label for="<?= $this->get_field_id('cat') ?>">Выберите рубрику</label> <br>
            <select name="<?= $this->get_field_name('cat') ?>" id="<?= $this->get_field_id('cat') ?>">
                <?
                foreach ($categories as $link_cat) {
                    echo '<option value="' . intval($link_cat->term_id) . '"'
                        . selected($instance['cat'], $link_cat->term_id, false)
                        . '>' . $link_cat->name . "</option>\n";
                }
                ?>
            </select>
        </p>
        <?
    }

    public function widget($args, $instance)
    {
        $popular = new WP_Query('orderby=date&order=DESC&posts_per_page=6&cat=' . $instance['cat']);
        $counter = 0;
        ?>
        <div class="col1 col-md-12 big-carousel">
            <div class="owl-carousel owl-theme">
                <?php
                if (have_posts()) : while ($popular->have_posts()) : $popular->the_post();
                    ?>
                    <div class="item">
                        <a href="<? the_permalink() ?>">
                            <?= get_the_post_thumbnail(null, 'full', array('class' => 'lazyOwl')); ?>
                        </a>
                    </div>
                    <?php
                    $counter++;
                endwhile; endif;
                ?>
            </div>
            <div class="customNavigation">
                <a class="btn prev"><img src="<?= get_site_url() ?>/wp-content/themes/best-people/images/prev.png"></a>
                <a class="btn next"><img src="<?= get_site_url() ?>/wp-content/themes/best-people/images/next.png"></a>
            </div>
        </div>
        <?php
    }
}

class WP_small_carousel_Widget extends WP_Widget
{
    public function __construct()
    {
        parent::__construct(
            'widget_WP_small_carousel',
            'widget small carousel',
            array('description' => __('маленькая карусель', 'text_domain'))
        );
    }

    public function update($new_instance, $old_instance)
    {
        $instance = array();
        $instance['title'] = strip_tags($new_instance['title']);
        $instance['cat'] = strip_tags($new_instance['cat']);
        return $instance;
    }

    public function form($instance)
    {
        $categories = get_categories();
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>">Имя виджета</label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>"
                   name="<?php echo $this->get_field_name('title'); ?>" type="text"
                   value="<?php echo $instance['title']; ?>"/>
        </p>
        <p>
            <label for="<?= $this->get_field_id('cat') ?>">Выберите рубрику</label> <br>
            <select name="<?= $this->get_field_name('cat') ?>" id="<?= $this->get_field_id('cat') ?>">
                <?
                foreach ($categories as $link_cat) {
                    echo '<option value="' . intval($link_cat->term_id) . '"'
                        . selected($instance['cat'], $link_cat->term_id, false)
                        . '>' . $link_cat->name . "</option>\n";
                }
                ?>
            </select>
        </p>
        <?
    }

    public function widget($args, $instance)
    {
        $popular = new WP_Query('orderby=date&order=DESC&posts_per_page=6&cat=' . $instance['cat']);
        $counter = 0;
        ?>
        <h1>[<?= $instance['title'] ?>]</h1>
        <div class="col2 col-md-12 small-carousel">
            <div class="owl-carousel owl-theme">
                <?php
                if (have_posts()) : while ($popular->have_posts()) : $popular->the_post();
                    ?>
                    <div class="item">
                        <a href="<? the_permalink() ?>">
                            <?= get_the_post_thumbnail(null, 'full', array('class' => 'lazyOwl')); ?>
                        </a>
                        <h3><? the_title(); ?></h3>
                    </div>
                    <?php
                    $counter++;
                endwhile; endif;
                ?>
            </div>
            <div class="customNavigation">
                <a class="btn prev"><img src="<?= get_site_url() ?>/wp-content/themes/best-people/images/prev.png"></a>
                <a class="btn next"><img src="<?= get_site_url() ?>/wp-content/themes/best-people/images/next.png"></a>
            </div>
        </div>
        <?php
    }
}

class WP_video_Widget extends WP_Widget
{
    public function __construct()
    {
        parent::__construct(
            'widget_WP_video',
            'widget video',
            array('description' => __('видео', 'text_domain'))
        );
    }

    public function update($new_instance, $old_instance)
    {
        $instance = array();
        $instance['title'] = strip_tags($new_instance['title']);
        $instance['url'] = strip_tags($new_instance['url']);
        $instance['label'] = strip_tags($new_instance['label']);
        $instance['description'] = strip_tags($new_instance['description']);
        return $instance;
    }

    public function form($instance)
    {
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>">Имя виджета</label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>"
                   name="<?php echo $this->get_field_name('title'); ?>" type="text"
                   value="<?php echo $instance['title']; ?>"/>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('url'); ?>">Видео url</label>
            <input class="widefat" id="<?php echo $this->get_field_id('url'); ?>"
                   name="<?php echo $this->get_field_name('url'); ?>" type="text"
                   value="<?php echo $instance['url']; ?>"/>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('label'); ?>">Подпись</label>
            <input class="widefat" id="<?php echo $this->get_field_id('label'); ?>"
                   name="<?php echo $this->get_field_name('label'); ?>" type="text"
                   value="<?php echo $instance['label']; ?>"/>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('description'); ?>">Описание</label>
            <input class="widefat" id="<?php echo $this->get_field_id('description'); ?>"
                   name="<?php echo $this->get_field_name('description'); ?>" type="text"
                   value="<?php echo $instance['description']; ?>"/>
        </p>
        <?
    }

    public function widget($args, $instance)
    {
        ?>
            <iframe width="420" height="315" src="<?= $instance['url'] ?>" frameborder="0" allowfullscreen></iframe>
            <h2><?= $instance['label'] ?><span class="clearfix visible-sm-block"><?= $instance['description'] ?></span>
            </h2>
        <?php
    }
}

class WP_photo_Widget extends WP_Widget
{
    public function __construct()
    {
        parent::__construct(
            'widget_WP_photo',
            'widget photo',
            array('description' => __('фото', 'text_domain'))
        );
    }

    public function update($new_instance, $old_instance)
    {
        $instance = array();
        $instance['title'] = strip_tags($new_instance['title']);
        $instance['cat'] = strip_tags($new_instance['cat']);
        $instance['description'] = strip_tags($new_instance['description']);
        return $instance;
    }

    public function form($instance)
    {
        $categories = get_categories();
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>">Имя виджета</label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>"
                   name="<?php echo $this->get_field_name('title'); ?>" type="text"
                   value="<?php echo $instance['title']; ?>"/>
        </p>
        <p>
            <label for="<?= $this->get_field_id('cat') ?>">Выберите рубрику</label> <br>
            <select name="<?= $this->get_field_name('cat') ?>" id="<?= $this->get_field_id('cat') ?>">
                <?
                foreach ($categories as $link_cat) {
                    echo '<option value="' . intval($link_cat->term_id) . '"'
                        . selected($instance['cat'], $link_cat->term_id, false)
                        . '>' . $link_cat->name . "</option>\n";
                }
                ?>
            </select>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('description'); ?>">Описание для маленьких экранов</label>
            <input class="widefat" id="<?php echo $this->get_field_id('description'); ?>"
                   name="<?php echo $this->get_field_name('description'); ?>" type="text"
                   value="<?php echo $instance['description']; ?>"/>
        </p>
        <?
    }

    public function widget($args, $instance)
    {
        $popular = new WP_Query('orderby=date&order=DESC&posts_per_page=6&cat=' . $instance['cat']);
        $counter = 0;
        ?>

            <div class="owl-carousel owl-theme">
                <?php
                if (have_posts()) : while ($popular->have_posts()) : $popular->the_post();
                    ?>
                    <div class="item">
                        <a href="<? the_permalink() ?>">
                            <?= get_the_post_thumbnail(null, 'full', array('class' => 'lazyOwl')); ?>
                        </a>
                        <h2><? the_title(); ?>
                            <span class="clearfix visible-sm-block"><?= $instance['description'] ?></span>
                        </h2>
                    </div>
                    <?php
                    $counter++;
                endwhile; endif;
                ?>
            </div>
            <div class="customNavigation">
                <a class="btn prev"><img src="<?= get_site_url() ?>/wp-content/themes/best-people/images/prev.png"></a>
                <a class="btn next"><img src="<?= get_site_url() ?>/wp-content/themes/best-people/images/next.png"></a>
            </div>

        <?
    }
}

class WP_4_small_articles_table_Widget extends WP_Widget
{
    public function __construct()
    {
        parent::__construct(
            'widget_WP_4_small_articles_table',
            'widget 4 small articles table',
            array('description' => __('4 небольших статьи (табличный вид)', 'text_domain'))
        );
    }

    public function update($new_instance, $old_instance)
    {
        $instance = array();
        $instance['title'] = strip_tags($new_instance['title']);
        $instance['cat'] = strip_tags($new_instance['cat']);
        return $instance;
    }

    public function form($instance)
    {
        $categories = get_categories();
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>">Имя виджета</label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>"
                   name="<?php echo $this->get_field_name('title'); ?>" type="text"
                   value="<?php echo $instance['title']; ?>"/>
        </p>
        <p>
            <label for="<?= $this->get_field_id('cat') ?>">Выберите рубрику</label> <br>
            <select name="<?= $this->get_field_name('cat') ?>" id="<?= $this->get_field_id('cat') ?>">
                <?
                foreach ($categories as $link_cat) {
                    echo '<option value="' . intval($link_cat->term_id) . '"'
                        . selected($instance['cat'], $link_cat->term_id, false)
                        . '>' . $link_cat->name . "</option>\n";
                }
                ?>
            </select>
        </p>
        <?
    }

    public function widget($args, $instance)
    {
        $popular = new WP_Query('orderby=date&order=DESC&posts_per_page=4&cat=' . $instance['cat']);
        $counter = 0;
        ?>
        <h1>[<?= $instance['title'] ?>]</h1>
        <?php
        if (have_posts()) : while ($popular->have_posts()) : $popular->the_post();
            ?>
            <div class="col-md-6 col-sm-12">
                <a href="<? the_permalink() ?>">
                    <?= get_the_post_thumbnail(null, 'medium', array('class' => 'img-responsive')); ?>
                </a>
                <h3><? the_title(); ?></h3>
                <p class="clearfix visible-sm-block  visible-lg-block"><?= get_the_excerpt(); ?></p>
                <!--                <a href="-->
                <?// the_permalink() ?><!--" class="col-md-3 clearfix visible-md-block visible-lg-block">-->
                <!--                    <img src="-->
                <?//= get_site_url() ?><!--/wp-content/themes/best-people/images/next1.png">-->
                <!--                </a>-->
            </div>
            <?php
            $counter++;
        endwhile; endif;
    }
}

class WP_3_vertical_articles_Widget extends WP_Widget
{
    public function __construct()
    {
        parent::__construct(
            'widget_WP_3_vertical_articles',
            'widget 3 vertical articles',
            array('description' => __('3 вертикальных статьи', 'text_domain'))
        );
    }

    public function update($new_instance, $old_instance)
    {
        $instance = array();
        $instance['title'] = strip_tags($new_instance['title']);
        $instance['cat'] = strip_tags($new_instance['cat']);
        return $instance;
    }

    public function form($instance)
    {
        $categories = get_categories();
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>">Имя виджета</label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>"
                   name="<?php echo $this->get_field_name('title'); ?>" type="text"
                   value="<?php echo $instance['title']; ?>"/>
        </p>
        <p>
            <label for="<?= $this->get_field_id('cat') ?>">Выберите рубрику</label> <br>
            <select name="<?= $this->get_field_name('cat') ?>" id="<?= $this->get_field_id('cat') ?>">
                <?
                foreach ($categories as $link_cat) {
                    echo '<option value="' . intval($link_cat->term_id) . '"'
                        . selected($instance['cat'], $link_cat->term_id, false)
                        . '>' . $link_cat->name . "</option>\n";
                }
                ?>
            </select>
        </p>
        <?
    }

    public function widget($args, $instance)
    {
        $popular = new WP_Query('orderby=date&order=DESC&posts_per_page=3&cat=' . $instance['cat']);
        ?>
        <div class="persona">
            <h2>[<?= $instance['title'] ?>]</h2>
            <?php
            while ($popular->have_posts()) : $popular->the_post();
                ?>
                <div class="persona1">
                    <a href="<? the_permalink() ?>">
                        <?= get_the_post_thumbnail(null, 'full', array('class' => 'lazyOwl img-responsive')); ?>
                    </a>
                    <h4><? the_title(); ?></h4>
                    <p class="clearfix visible-sm-block visible-md-block visible-lg-block"><?= get_the_excerpt(); ?></p>
                    <a class="next col-md-3" href="#"></a>
                </div>
                <?php
            endwhile;
            ?>
        </div>
        <?
    }
}

add_action('widgets_init', function () {
    register_widget('WP_usual_article_Widget');
    register_widget('WP_4_small_articles_Widget');
    register_widget('WP_top_carousel_Widget');
    register_widget('WP_big_carousel_Widget');
    register_widget('WP_small_carousel_Widget');
    register_widget('WP_video_Widget');
    register_widget('WP_photo_Widget');
    register_widget('WP_4_small_articles_table_Widget');
    register_widget('WP_3_vertical_articles_Widget');
});
register_sidebar(array(
    'name' => __('1-й ряд', 'twentyten'),
    'id' => '1-row',
    'description' => __('1-й ряд', 'twentyten'),
    'before_widget' => '',
    'after_widget' => '',
    'before_title' => '',
    'after_title' => '',
));
register_sidebar(array(
    'name' => __('2-й ряд', 'twentyten'),
    'id' => '2-row',
    'description' => __('2-й ряд', 'twentyten'),
    'before_widget' => '',
    'after_widget' => '',
    'before_title' => '',
    'after_title' => '',
));
register_sidebar(array(
    'name' => __('3-й ряд', 'twentyten'),
    'id' => '3-row',
    'description' => __('3-й ряд', 'twentyten'),
    'before_widget' => '',
    'after_widget' => '',
    'before_title' => '',
    'after_title' => '',
));
register_sidebar(array(
    'name' => __('4-й ряд', 'twentyten'),
    'id' => '4-row',
    'description' => __('4-й ряд', 'twentyten'),
    'before_widget' => '',
    'after_widget' => '',
    'before_title' => '',
    'after_title' => '',
));
register_sidebar(array(
    'name' => __('5-й ряд', 'twentyten'),
    'id' => '5-row',
    'description' => __('5-й ряд', 'twentyten'),
    'before_widget' => '',
    'after_widget' => '',
    'before_title' => '',
    'after_title' => '',
));
register_sidebar(array(
    'name' => __('видео', 'twentyten'),
    'id' => 'video',
    'description' => __('видео', 'twentyten'),
    'before_widget' => '',
    'after_widget' => '',
    'before_title' => '',
    'after_title' => '',
));
register_sidebar(array(
    'name' => __('фото', 'twentyten'),
    'id' => 'photo',
    'description' => __('фото', 'twentyten'),
    'before_widget' => '',
    'after_widget' => '',
    'before_title' => '',
    'after_title' => '',
));
register_sidebar(array(
    'name' => __('7-й ряд', 'twentyten'),
    'id' => '7-row',
    'description' => __('7-й ряд', 'twentyten'),
    'before_widget' => '',
    'after_widget' => '',
    'before_title' => '',
    'after_title' => '',
));
register_sidebar(array(
    'name' => __('8-й ряд', 'twentyten'),
    'id' => '8-row',
    'description' => __('8-й ряд', 'twentyten'),
    'before_widget' => '',
    'after_widget' => '',
    'before_title' => '',
    'after_title' => '',
));
register_sidebar(array(
    'name' => __('9-й ряд', 'twentyten'),
    'id' => '9-row',
    'before_widget' => '',
    'after_widget' => '',
    'before_title' => '',
    'after_title' => '',
));
register_sidebar(array(
    'name' => __('1-й ряд страница с постом', 'twentyten'),
    'id' => '1-row-post',
    'before_widget' => '',
    'after_widget' => '',
    'before_title' => '',
    'after_title' => '',
));
register_sidebar(array(
    'name' => __('2-й ряд страница с постом', 'twentyten'),
    'id' => '2-row-post',
    'before_widget' => '',
    'after_widget' => '',
    'before_title' => '',
    'after_title' => '',
));
register_sidebar(array(
    'name' => __('1-й ряд страница с категорией', 'twentyten'),
    'id' => '1-row-category',
    'before_widget' => '',
    'after_widget' => '',
    'before_title' => '',
    'after_title' => '',
));
register_sidebar(array(
    'name' => __('2-й ряд страница с категорией', 'twentyten'),
    'id' => '2-row-category',
    'before_widget' => '',
    'after_widget' => '',
    'before_title' => '',
    'after_title' => '',
));
register_sidebar(array(
    'name' => __('1-й ряд сайдбар', 'twentyten'),
    'id' => '1-row-sidebar',
    'before_widget' => '',
    'after_widget' => '',
    'before_title' => '',
    'after_title' => '',
));
register_sidebar(array(
    'name' => __('2-й ряд сайдбар', 'twentyten'),
    'id' => '2-row-sidebar',
    'before_widget' => '',
    'after_widget' => '',
    'before_title' => '',
    'after_title' => '',
));
register_sidebar(array(
    'name' => __('3-й ряд сайдбар', 'twentyten'),
    'id' => '3-row-sidebar',
    'before_widget' => '',
    'after_widget' => '',
    'before_title' => '',
    'after_title' => '',
));
register_sidebar(array(
    'name' => __('1-й ряд баннер', 'twentyten'),
    'id' => '1-row-banner',
    'before_widget' => '',
    'after_widget' => '',
    'before_title' => '',
    'after_title' => '',
));

// стандартный вывод комментариев
function custom_comment($comment, $args, $depth)
{
    $GLOBALS['comment'] = $comment; ?>

    <div class="col-md-12 col-sm-12 col-xs-12 comment" id="comment-<?php comment_ID(); ?>">
        <div class="col-md-12 border">

            <a href="javascript:void(0)">
                <?php echo get_avatar($comment->comment_author_email, 96, '', '', array('class' => 'img-responsive', 'alt' => $comment->comment_author)); ?>
            </a>
            <p><?php comment_text() ?></p>

            <?php
            if (function_exists('like_counter_c')) {
                like_counter_c('text for like');
            }
            ?>

        </div>

    </div>
    <?php
}

function custom_excerpt_length($length)
{
    return 20;
}

function ajax_login_init()
{
    // Enable the user with no privileges to run ajax_login() in AJAX
    add_action('wp_ajax_nopriv_ajaxlogin', 'ajax_login');
}

// Execute the action only if the user isn't logged in
if (!is_user_logged_in()) {
    add_action('init', 'ajax_login_init');
}
function ajax_login()
{
    // First check the nonce, if it fails the function will break
    check_ajax_referer('ajax-login-nonce', 'security');
    // Nonce is checked, get the POST data and sign user on
    $info = array();
    $reg_errors = new WP_Error;
    $info['user_login'] = $_POST['username'];
    $info['user_password'] = $_POST['password'];
    $info['remember'] = true;

    if ($_POST['isRegistration'] == 'true') {
        $info['user_email'] = $_POST['email'];

        if (empty($info['user_login']) || empty($info['user_password']) || empty($info['user_email'])) {
            $reg_errors->add('field', 'Не все поля заполнены!');
        }
        if (4 > strlen($info['user_login'])) {
            $reg_errors->add('username_length', 'Имя пользователя должно содержать минимум 4 символа!');
        }
        if (username_exists($info['user_login'])) {
            $reg_errors->add('user_name', 'Такое имя пользователя уже существует!');
        }
        if (!validate_username($info['user_login'])) {
            $reg_errors->add('username_invalid', 'Имя пользователя не валидное!');
        }
        if (5 > strlen($info['user_password'])) {
            $reg_errors->add('password', 'Пароль должен быть больше 5 символов!');
        }
        if (!is_email($info['user_email'])) {
            $reg_errors->add('email_invalid', 'Email не валидный!');
        }
        if (email_exists($info['user_email'])) {
            $reg_errors->add('email', 'Email уже используется!');
        }

        if (!empty($reg_errors->errors)) {
            echo json_encode(array('loggedin' => false, 'errors' => $reg_errors));
        } else {
            //wp_insert_user($info);
            wp_create_user($info['user_login'], $info['user_password'], $info['user_email']);
            wp_signon($info, false);
            echo json_encode(array('loggedin' => true, 'message' => __('Login successful, redirecting...')));
        }

    } else {
        $user_signon = wp_signon($info, false);
        if (is_wp_error($user_signon)) {
            echo json_encode(array('loggedin' => false, 'message' => __('Неверный логин или пароль!')));
        } else {
            echo json_encode(array('loggedin' => true, 'message' => __('Login successful, redirecting...')));
        }
    }

    die();
}

add_filter('excerpt_length', 'custom_excerpt_length', 999);
add_theme_support('post-thumbnails');
show_admin_bar(false);

?>
