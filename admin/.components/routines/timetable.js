"use strict";

$('#class_id').change(() => {
    // alert($(this).val());

    $.ajax({
        url: '../../../actions/ajax.php',
        type: 'POST',
        data: { 'class_id': $(this).val() },
        dataType: 'json',
        success: (response) => {
            if ( response.count > 0 )
            {
                $('#section-container').show();
            }
            else
            {
                $('#section-container').hide();
            }

            $('#section_id').html(response.options);
        }
    });
});