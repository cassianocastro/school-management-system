<?php

print <<<JS
  $(document).ready(() => {
    $('#users-table').DataTable({
      ajax: {
        url: "../../../actions/ajax.php?user={$_GET['user']}",
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

  $('#student-registration').on('submit', () => {

    if ( true )
    {
      var formdata = $(this).serialize();

      $.ajax({
        url: "http://{$_SERVER["SERVER_NAME"]}/actions/student-registration.php",
        type: "post",
        data: formdata,
        dataType: "json",
        beforeSend: () => $('#loader').show(),
        success: (response) => {
          // console.log(response);

          if ( response.success == true )
          {
            location.assign(
              "http://{$_SERVER['SERVER_NAME']}/admin/user-account.php"
              + "?user=student"
              + "&action=fee-payment"
              + "&std_id=" + response.std_id
              + "&payment_method=" + response.payment_method
            );
          }
        },
        complete: () => {} // $('#loader').hide() }
      });
    }

    return false;
  });
JS;