(function($) {
    $(document).ready(function() {
        $.slidebars();
        $('img.lazy').lazyload({
            threshold: 50,
            effect: "fadeIn",
            effect_speed: 1000
        });
    });

    $('.fb-link').click(function(){
        if( $.cookie('fb-link') == 'app' ) {
            window.open($(this).attr('fb-link'),"_self");
        } else if( $.cookie('fb-link') == 'browser' ) {
            window.open($(this).attr('href'));
        } else if(window.confirm('"Facebook"アプリで開きますか？')==true){
            $.cookie('fb-link', 'app');
            window.open($(this).attr('fb-link'),"_self");
        } else {
            $.cookie('fb-link', 'browser');
            window.open($(this).attr('href'));
        }
        return false;
    });

    if( $('.btn_more').length && $(window).height() > $('.row').height() ) {
        loadMore();
    }

    $('.btn_more').click(function(){
        loadMore();
        return false;
    });

    function loadMore() {

        var max_tag_id = ($('.more > form > input[name="max_tag_id"]').val() !== undefined) ? $('.more > form > input[name="max_tag_id"]').val() : false;

        $('.btn_more').hide();

        $('.btn_more').after("<div class='loading'></div>");

        $.ajax({
            type: 'GET',
            url: '/instagram/tagsmediarecent',
            data: {
                'count':20,
                'max_tag_id': max_tag_id
            },
            success: function(response){
                $('.btn_more').show();
                $('.loading').remove();
                data = $.parseJSON(response);
                $('.more > form > input[name="max_tag_id"]').val(data.pagination.next_max_id);
                var timestamp = Math.floor( new Date().getTime() / 1000 ) ;
                for( var i in data['data'] ){
                    $('.row').append('<div class="item col-xs-4 col-sm-3 col-md-2 col-lg-1"><div class="item-head"></div><div class="item-img"><img src="/img/dummy.png" class="lazy-' + timestamp + '" data-original="' + data['data'][i].images.low_resolution.url + '" alt="' + data['data'][i].caption.text + '" /></div></div>');
                }
                $('img.lazy-' + timestamp).lazyload({
                    threshold: 50,
                    effect: "fadeIn",
                    effect_speed: 1000
                });

                var autoLoad = $(window).height() > $('.row').height();
                if(autoLoad) {
                    loadMore();
                }
            },
            error: function(){
                console.log(data);
            }
        });

    }
})(jQuery);