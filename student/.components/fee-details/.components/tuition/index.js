"use strict";

import { index as Table } from "./.components/table/index.js";
import { index as Modal } from "./.components/modal/index.js";
import { index as Invoice } from "./.components/invoice/index.js";

/**
 *
 */
function index()
{
    $(document).on('click', '.paynow-btn', () => {
        let month = $(this).data('month');

        $('#month').val(month);
    });

    Table();
    Modal();
    Invoice();
}

export { index };