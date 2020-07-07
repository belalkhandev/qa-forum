(function ($) {
    "use-strict"

    jQuery(document).ready(function () {

        //active navigation class
        var current = location.pathname;
        $('.navigation-menu ul li a').each(function () {
            var $this = $(this);
             if (current == '/' || current == '/admin' || current == '/admin/') {
                 $('.index-link').closest('li').addClass('active');
                 return false;
             }else if ($this.attr('href').indexOf(current) !== -1) {
                $this.closest('.treeview').addClass('nav-open');
                $this.closest('.treeview-menu').show();
                $this.closest('li').addClass('active');
            }
        });

        //hide sidebar
        $(document).on('click', '.hide-nav', function () {
            $('.sidebar-area').toggleClass('hide-sidebar');
        });

        $('.criteria-box').hide();
        $(document).on('click', '#criteria-box', function() {
            $('.criteria-box').slideToggle('slow');
        });

    });


}(jQuery));