jQuery(document).ready(function ($) {

    $('#registration-btn').on('click', function () {
        $('#myModal').modal('hide');
        $('#myModal2').modal('show');
        return false;
    });

    $('form[name=loginform]').on('submit', function () {

        var form = $(this);
        var username = form.find('input[name=username]').val();
        var password = form.find('input[name=password]').val();
        var security = form.find('#security').val();
        var method = form.attr('method');

        $.ajax({
            type: method,
            dataType: 'json',
            url: '/wp-admin/admin-ajax.php',
            data: {
                'action': 'ajaxlogin',
                'username': username,
                'password': password,
                'security': security,
                'isRegistration': false
            },
            success: function (data) {
                if (data.loggedin == false) {
                    form.find('.wrong').text(data.message).show();
                } else {
                    window.location.reload();
                }
            }
        });

        return false;
    });

    $('form[name=registrationform]').on('submit', function () {

        var form = $(this);
        var username = form.find('input[name=username]').val();
        var password = form.find('input[name=password]').val();
        var email = form.find('input[name=email]').val();
        var security = form.find('#security').val();
        var method = form.attr('method');

        $.ajax({
            type: method,
            dataType: 'json',
            url: '/wp-admin/admin-ajax.php',
            data: {
                'action': 'ajaxlogin',
                'username': username,
                'password': password,
                'email': email,
                'security': security,
                'isRegistration': true
            },
            success: function (data) {
                if (data.loggedin == false) {
                    var errors = '';
                    for (var item in data.errors.errors) {
                        if (data.errors.errors.hasOwnProperty(item)) {
                            errors += data.errors.errors[item][0] + '<br>';
                        }
                    }
                    form.find('.wrong').html(errors).show();
                } else {
                    window.location.reload();
                }
            }
        });

        return false;
    });

    $('#search_link').on('click', function () {
        $('#search').toggleClass('show-search');
    });

    $("#datetimepicker5").find("input").datepicker().on('change', function () {
        var date = $(this).val();
        insertParam('date', date);
    });
    $('#tag-list').on('change', function(){
        var tag = $(this).val();
        insertParam('tag', tag);
    });

    $('#mycomment').on('submit', function(){
        var text = $.trim($(this).find('input[name=comment]').val());
        if(text == '') {
            $(this).find('.wrong').show();
            return false;
        } else {
            $(this).find('.wrong').hide();
            return true;
        }
    });


    function insertParam(key, value) {
        key = encodeURI(key);
        value = encodeURI(value);

        var kvp = document.location.search.substr(1).split('&');

        var i = kvp.length;
        var x;
        while (i--) {
            x = kvp[i].split('=');

            if (x[0] == key) {
                x[1] = value;
                kvp[i] = x.join('=');
                break;
            }
        }
        if (i < 0) {
            kvp[kvp.length] = [key, value].join('=');
        }
        //this will reload the page, it's likely better to store this until finished
        document.location.search = kvp.join('&');
    }

    var list = $('#list1');
    $('.dropdown').hover(
        function () {
            if ($(window).width() > 991) {
                list.css('border-bottom', '1px solid #ffffff');
            }
    },
        function () {
            list.css('border-bottom','none');
        }
    );

});

