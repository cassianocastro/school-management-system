jQuery(document).ready(() => {

    jQuery('#class_id').change(() => {
        // alert(jQuery(this).val());

        jQuery.ajax({
            url:'ajax.php',
            type: 'POST',
            data: { 'class_id': jQuery(this).val() },
            dataType: 'json',
            success: (response) => {
                if ( response.count > 0 )
                {
                    jQuery('#section-container').show();
                }
                else
                {
                    jQuery('#section-container').hide();
                }

                jQuery('#section_id').html(response.options);
            }
        });
    });
});