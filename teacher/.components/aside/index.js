"use strict";

/**
 *
 */
function index()
{
    let path = location.toString();
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
}

export { index };