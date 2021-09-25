(function($){
    $(document).ready(function(){

        if(isPC()){
            $('[data-toggle="tooltip"]').tooltip({trigger: 'hover'});
        }else{
            $('.qr-img[data-toggle="tooltip"]').tooltip({trigger: 'hover'});
        }

    });
 
    // Sidebar Menu 折叠展开
    $('.sidebar-menu-inner a').on('click',function(){

        if (!$('.sidebar-nav').hasClass('mini-sidebar')) {
            $(this).parent("li").siblings("li.sidebar-item").children('ul').slideUp(200);
            if ($(this).next().css('display') == "none") {
                $(this).next('ul').slideDown(200);
                $(this).parent('li').addClass('sidebar-show').siblings('li').removeClass('sidebar-show');
            }else{
                $(this).next('ul').slideUp(200);
                $(this).parent('li').removeClass('sidebar-show');
            }
        }
    });

    $(document).on('click', '.tab-menu a', function(event) {
        event.preventDefault();
        console.log('.tab-menu a click');
        var t = $(this);
        var parent = $(this).parents('.tab-menu');
        var parent_id = parent.data('id');
        var id = $(this).data('id');
        var body = '.tab-'+parent_id;
        if( !t.hasClass('active') ) {
            parent.find('a').removeClass('active');
            t.addClass('active');
        }
        $(body).children('.url-block').addClass('d-none');
        $('.nav-term-'+id).removeClass('d-none');
    });

})(jQuery);

function isPC() {
    let u = navigator.userAgent;
    let Agents = ["Android", "iPhone", "webOS", "BlackBerry", "SymbianOS", "Windows Phone", "iPad", "iPod"];
    let flag = true;
    for (let i = 0; i < Agents.length; i++) {
      if (u.indexOf(Agents[i]) > 0) {
        flag = false;
        break;
      }
    }
    return flag;
}


