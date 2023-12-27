(function () {
    var path = window.location.href;

    // console.log(path);

    $(".nav-link").each(() => {
        var href = $(this).attr('href');
        // console.log(href);

        if ( path === decodeURIComponent(href) )
        {
            $(this).addClass('active');

            var parent = $(this).closest('.has-treeview');

            parent.addClass('menu-open');

            $(parent).find('.nav-link').first().addClass('active');

            // console.log(parent);
        }
    });
}());

jQuery(document).ready(() => {
    jQuery('#class').change(() => {
        // alert(jQuery(this).val());

        jQuery.ajax({
            url: 'ajax.php',
            type: 'POST',
            data: { 'class_id': jQuery(this).val() },
            dataType: 'json',
            success: function (response) {
                if ( response.count > 0 )
                {
                    jQuery('#section-container').show();
                }
                else
                {
                    jQuery('#section-container').hide();
                }

                jQuery('#section').html(response.options);
            }
        });
    });
});