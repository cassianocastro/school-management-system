$(document).on('click', '.paynow-btn', () => {
    let month = $(this).data('month');

    $('#month').val(month);
});