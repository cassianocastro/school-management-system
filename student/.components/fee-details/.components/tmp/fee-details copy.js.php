<?php

print <<<JS
  $(document).on('click', '.paynow-btn', () => {
    var month = $(this).data('month');

    $('#month').val(month);
  });

  var hash = '$hash';

  function submitPayuForm()
  {
    if ( hash == '' )
    {
      return;
    }

    var payuForm = document.forms.payuForm;

    payuForm.submit();
  }

  $(document).ready(() => submitPayuForm());
JS;