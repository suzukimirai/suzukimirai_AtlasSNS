
$(function(){
    $('.js-modal-open').on('click',function(){
        $('.js-modal').fadeIn();
        let post = $(this).attr('post');
        let post_id = $(this).attr('post_id');

        $('.modal_post').text(post);
        $('.modal_id').val(post_id);
        return false;
    });

    $('.js-modal-close').on('click',function(){
        $('.js-modal').fadeOut();
        return false;
    });
});

$(function(){
    $('.slide_button').click(function () {
        $('.menu').toggle();
        $('.slide_button').toggleClass('is_active');
        return false;

    });
});

