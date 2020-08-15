require('./bootstrap');
require('./components/slick');


$(document).ready(function(){
   let embedToggler = $('.embed-toggler');
   let toggleContent = $('.toggle-content');

    embedToggler.on('click', function() {
        let togllger = $(this);
        let target = toggleContent.find(togllger.data('toggle'));

        togllger.addClass('active');
        togllger.siblings().removeClass('active');

        target.addClass('active');
        target.siblings().removeClass('active')
    })
});