(function ($) {
    "use-strict"

    jQuery(document).ready(function () {

        //active aos plugin
        AOS.init({
            offset:0,
            delay: 100,
        });

        //box collapse hide
        $(document).on('click', '.collapse-me .fa-angle-down', function () {
            $(this).closest('.box').children('.box-body, .box-footer').slideUp(300);
            $(this).removeClass('fa-angle-down').addClass('fa-angle-up');
        });

       //box collapse hide
        $(document).on('click', '.collapse-me .fa-angle-up', function () {
            $(this).closest('.box').children('.box-body, .box-footer').slideDown(300);
            $(this).removeClass('fa-angle-up').addClass('fa-angle-down');
            $('.collapse-me .fa-angle-down').not(this).closest('.box').children('.box-body, .box-footer').slideUp(300);
            $('.collapse-me .fa-angle-down').not(this).removeClass('fa-angle-down').addClass('fa-angle-up');
        });

        //active dashboard navigation
        var current = location.pathname;
        $('.dashboard-sidebar ul li a').each(function () {
            var $this = $(this);
             if ($this.attr('href').indexOf(current) !== -1) {
                $this.closest('.treeview').addClass('active');
                $this.closest('li').addClass('active');
            }
        });

        //datepicker active function
        init_datepicker = function () {
            //active datepicker
            if ($('.datepicker').length > 0) {
                $('.datepicker').datepicker({
                    todayHighlight: true,
                    format: 'dd-mm-yyyy',
                    autoclose: true
                });
            }
        }

        init_datepicker();

        $(document).on('click', '.inner-box-show', function () {
            $('.inner-box').addClass('show-inner-box');
        });

        $(document).on('click', '.close-inner-box', function () {
            $(this).closest('.inner-box').removeClass('show-inner-box');
            $('.preloading').removeClass('hide-preloading');
            $('.inner-box-content-form').html('');
        });
        
        $(document).on('click', '.user-status', function() {
            $(this).toggleClass('open-status-dropdown');
        });


    });

    $(window).on('scroll', function () {
        let scroll = $(window).scrollTop();
        
        if (scroll > 300) {
            $('.sticky-header').addClass('sticky');
        } else {
            $('.sticky-header').removeClass('sticky');
        }
    });


}(jQuery));
