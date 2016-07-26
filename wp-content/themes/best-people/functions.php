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
        $popular = new WP_Query('order_by=comment_count&posts_per_page=2&cat=' . $instance['cat']);
        $counter = 0;
        ?>
        <h1>[<?= $instance['title'] ?>]</h1>
        <?php
        if (have_posts()) : while ($popular->have_posts()) : $popular->the_post();
            ?>
            <div class="<?= $counter == 0 ? 'col-md-6 col-sm-12' : 'col-md-6 clearfix visible-md-block clearfix visible-lg-block' ?>">
                <a href="<? the_permalink() ?>">
                    <?= get_the_post_thumbnail(null, 'full', array('class' => 'img-responsive')); ?>
                </a>
                <h2><? the_title(); ?></h2>
                <p><? the_excerpt(); ?></p>
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
        $popular = new WP_Query('order_by=comment_count&posts_per_page=4&cat=' . $instance['cat']);
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
                <p><? the_excerpt(); ?></p>
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
        $popular = new WP_Query('order_by=comment_count&posts_per_page=2&cat=' . $instance['cat']);
        $counter = 0;
        ?>
        <div class="col col-md-9 col-sm-12 clearfix visible-sm-block visible-md-block visible-lg-block top-carousel">
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
        $popular = new WP_Query('order_by=comment_count&posts_per_page=4&cat=' . $instance['cat']);
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
        $popular = new WP_Query('order_by=comment_count&posts_per_page=4&cat=' . $instance['cat']);
        $counter = 0;
        ?>
        <h1><?= $instance['title'] ?></h1>
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
        <div class="col-md-6">
            <h1>[<?= $instance['title'] ?>]</h1>
            <video width="100%" height="100%" controls>
                <source src="<?= $instance['url'] ?>" type="video/mp4">
            </video>
            <h2><?= $instance['label'] ?><span class="clearfix visible-sm-block"><?= $instance['description'] ?></span>
            </h2>
        </div>
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
        $popular = new WP_Query('order_by=comment_count&posts_per_page=1&cat=' . $instance['cat']);
        $counter = 0;
        ?>
        <?php
        if (have_posts()) : while ($popular->have_posts()) : $popular->the_post();
            ?>
            <div class="col-md-6">
                <h1>[<?= $instance['title'] ?>]</h1>
                <a href="<? the_permalink() ?>">
                    <?= get_the_post_thumbnail(null, 'full', array('class' => 'img-responsive')); ?>
                </a>
                <h2><? the_title(); ?><span class="clearfix visible-sm-block"><?= $instance['description'] ?></span>
                </h2>
            </div>
            <?php
            $counter++;
        endwhile; endif;
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
        $popular = new WP_Query('order_by=comment_count&posts_per_page=4&cat=' . $instance['cat']);
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
                <? the_excerpt(); ?>
                <a href="<? the_permalink() ?>" class="col-md-3 clearfix visible-md-block visible-lg-block">
                    <img src="<?= get_site_url() ?>/wp-content/themes/best-people/images/next1.png">
                </a>
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
        $popular = new WP_Query('order_by=comment_count&posts_per_page=3&cat=' . $instance['cat']);
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
                <p><? the_excerpt(); ?></p>
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

// стандартный вывод комментариев
function custom_comment($comment, $args, $depth) {
    $GLOBALS['comment'] = $comment; ?>

    <div class="col-md-12 col-sm-12 col-xs-12 comment" id="comment-<?php comment_ID(); ?>">
        <div class="col-md-12 border">

            <a href="">
                <img class="img-responsive" src="<?= get_site_url() ?>/wp-content/themes/best-people/images/comments.jpg">
            </a>
            <p><?php comment_text() ?></p>
<!--            <a href="#">Подробнее...</a>-->
            <a class="like" href="#">
                <img src="<?= get_site_url() ?>/wp-content/themes/best-people/images/like.png">271
            </a>

        </div>

    </div>
    <?php
}
function custom_excerpt_length( $length ) {
    return 20;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

add_theme_support('post-thumbnails');

?>
