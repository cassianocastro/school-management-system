"use strict";

/**
 *
 */
function index()
{
    {
        const dialog = document.querySelector("#paynow-popup");

        const buttons = document.querySelectorAll("button[title='Pay now']");

        for ( const button of buttons )
        {
            button.addEventListener("click", () => dialog.showModal());
        }
    }

    {
        const dialog = document.querySelector("#invoice");

        const buttons = document.querySelectorAll("button[title='View']");

        for ( const button of buttons )
        {
            button.addEventListener("click", () => dialog.showModal());
        }
    }
}

index();