<div class="col-md-12 col-sm-12 comments">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="col-md-4 col-sm-4 col-xs-2 bottom"></div>
        <div class="col-md-4 col-sm-4 col-xs-8"><h2>Комментарии</h2></div>
        <div class="col-md-4 col-sm-4 col-xs-2 bottom"></div>
    </div>

    <?
    $args = array(
        'class_form' => 'myform',
        'id_form' => 'mycomment',
        'title_reply' => '',
        'logged_in_as' => '',
        'class_submit' => 'hidden',
        'comment_notes_before' => '',
        'comment_notes_after' => '',
        'comment_field' => '    <div class="col-md-12 col-sm-12 col-xs-12 comment-form">
                                    <div class="col-md-8 col-sm-12">
                                        <p>
                                            Зарегистрируйтесь, и комментируйте статьи, получайте
                                            приглашения
                                            на клубные вечеринки, участвуйте в акциях от партнеров сайта.
                                            Введите текст в текстовое поле и нажмите кнопку "Регистрация"
                                        </p>
                                    </div>
                                    <input type="text" name="comment" class="form-control" placeholder="Текст...">
                                    <div class="col-md-offset-3">
                                        <button class="btn btn-default" role="button" type="submit">Отправить</button>
                                    </div>
                                </div>'

    );
    ?>
    <? comment_form($args)?>

    <? wp_list_comments('type=comment&callback=custom_comment'); ?>


    <div class="col-sm-4 col-sm-offset-4 col-xs-8 col-xs-offset-2">
        <nav>
            <ul class="pagination">
                <? paginate_comments_links(array('prev_text' => 'prev', 'next_text' => 'next')); ?>
<!--                <li><a href="#">1</a></li>-->
<!--                <li><a href="#">2</a></li>-->
<!--                <li><a href="#">3</a></li>-->
<!--                <li><a href="#">4</a></li>-->
<!--                <li><a href="#">5</a></li>-->
<!--                <li><a href="#">...</a></li>-->
<!--                <li>-->
<!--                    <a href="#" aria-label="Next">-->
<!--                        <span aria-hidden="true">next</span>-->
<!--                    </a>-->
<!--                </li>-->
            </ul>
        </nav>
    </div>
</div>