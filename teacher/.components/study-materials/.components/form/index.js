"use strict";

/**
 *
 */
function index()
{
    const dialog = document.querySelector("#smdialog");
    const button = dialog.querySelector("header button");

    button.addEventListener("click", () => dialog.close());
}

export { index };