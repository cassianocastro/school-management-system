<script>
  jQuery(document).ready(() => {
    jQuery('#users-table').DataTable({
      ajax: {
        url: 'ajax.php?user=<?= $_GET['user'] ?>',
        type: 'POST'
      },
      columns: [
        {
          data: 'serial'
        },
        {
          data: 'name'
        },
        {
          data: 'email'
        },
        {
          data: 'action',
          orderable: false
        }
      ],
      processing: true,
      serverSide: true
    });
  });

  jQuery('#student-registration').on('submit', () => {

    if ( true )
    {
      var formdata = jQuery(this).serialize();

      jQuery.ajax({
        type: "post",
        url: "http://<?= $_SERVER["SERVER_NAME"] ?>/actions/student-registration.php",
        data: formdata,
        dataType: "json",
        beforeSend: () => jQuery('#loader').show(),
        success: (response) => {
          // console.log(response);

          if ( response.success == true )
          {
            location.assign(`http://<?= $_SERVER["SERVER_NAME"] ?>/admin/user-account.php?user=student&action=fee-payment&std_id=${response.std_id}&payment_method=${response.payment_method}`);
          }
        },
        complete: () => {} // jQuery('#loader').hide() }
      });
    }

    return false;
  });
</script>