/*
 * navigationActive
 * tabNav
*/

;(function($) {

   'use strict'

        var navigationActive = function() {
            var button = $(".top-button");
            button.on('click',function() {
                $(this).closest('body').children(".vertical-navigation").toggleClass('active').delay(800);
                $(this).closest('body').children('main').toggleClass('active');
                $(this).parent('.curren-menu').children('.logo').toggleClass('active');
                button.toggleClass('active');
                $(this).closest('body').children(".vertical-navigation").toggleClass('show');
            });
            var buttonNav = $('.vertical-navigation.left ul.sidebar-nav > li');
                buttonNav.on('click', function(event) {
                    $(this).closest('body').children(".vertical-navigation").removeClass('active');
                    $(this).closest('body').children('main').removeClass('active');
                    $(this).closest('body').find('.curren-menu').children('.logo').removeClass('active');
                event.preventDefault();
            });
        }; // Navigation Active


        var tabNav = function() {
            var speed = 1000;
            $('.vertical-navigation').each(function() {
                $(this).find('.sidebar-nav').children().first().addClass('active'),
                $(this).closest('body').find('main').children('section').first().show(),
                $(this).find('.sidebar-nav').children('li').on('click', function(e){
                    var liActive = $(this).index();
                    $(this).addClass('active').siblings().removeClass('active');
                    $(this).addClass('active').closest('body').find('main').children('section').eq(liActive).fadeIn(500).show().siblings().hide();
                    e.preventDefault();
                });
            });
        }; // Tab Nav


    $(function() {
        navigationActive();
        tabNav();
    });

    $('#myModal').on('shown.bs.modal', function () {
        $('#myInput').trigger('focus')
    });

    // $('textarea').froalaEditor({
    //       scaytAutoload: true,
    //       scaytCustomerId: '1:long-identifier-received-from-webspellchecker-after-subscribing-to-scayt',
    //       pluginsEnabled: ['spellChecker'],
    //       toolbarButtons: ['bold', 'italic', 'spellChecker', 'underline', '|', 'undo', 'redo'],
    //       toolbarButtonsMD: null,
    //       toolbarButtonsSM: null,
    //       toolbarButtonsXS: null
    // });

    // $("button").click(function(){
    //     $.ajax({url: "index2.html", success: function(result){
    //         $("#porra").fadeIn().html(result);
    //     }});
    // });

    $(function() {
        $('textarea').froalaEditor({
            toolbarButtons: ['bold', 'italic', 'underline', '|', 'formatOL', 'formatUL', '|', 'insertImage', 
            'insertLink', 'insertTable', '|', 'undo', 'redo', '|', 'html']
        })
    });

})(jQuery);

