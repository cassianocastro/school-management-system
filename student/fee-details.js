jQuery(document).on('click', '.paynow-btn', () => {
    var month = jQuery(this).data('month');

    jQuery('#month').val(month);
});