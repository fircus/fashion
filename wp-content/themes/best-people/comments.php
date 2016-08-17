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
        'comment_field' => '
                                <div class="col-md-12 col-sm-12 col-xs-12 comment-form">
                                   
                                    <div class="row">
                                        <div class="col-md-offset-2 col-md-8">
                                            <span class="wrong" style="display: none">Введите комментарий !</span>
                                            <input type="text" name="comment" class="form-control" placeholder="Текст...">
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-offset-3">
                                            <button class="btn btn-default" role="button" type="submit">Отправить</button>
                                         </div>
                                    </div>
                                     
                                   
                                </div>
                                ',
        'must_log_in' => '<div class="col-md-12 col-sm-12 col-xs-12 comment-form">
                                    <div class="col-md-8 col-sm-12">
                                        <p>
                                            Зарегистрируйтесь, и комментируйте статьи, получайте
                                            приглашения
                                            на клубные вечеринки, участвуйте в акциях от партнеров сайта.
                                        </p>
                                    </div>
                                    <div class="col-md-4 col-sm-12">
                                        <button class="btn btn-default" role="button" type="submit" data-toggle="modal" data-target="#myModal" style="margin-top: 20px" >
                                            Авторизироватся
                                        </button>
                                    </div>
                                </div>',
        'fields' => array(
            'author' => '',
            'email' => '',
            'url' => ''
        )

    );
    ?>
    <? comment_form($args)?>

    <? wp_list_comments('type=comment&callback=custom_comment'); ?>


    <div class="col-sm-4 col-sm-offset-4 col-xs-8 col-xs-offset-2">
        <nav>
            <ul class="pagination">
                <? paginate_comments_links(array('prev_text' => 'prev', 'next_text' => 'next')); ?>
            </ul>
        </nav>
    </div>
</div>