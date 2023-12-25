jQuery(document).on('click', '.paynow-btn', function() {
    var month = jQuery(this).data('month');

    jQuery('#month').val(month);
});