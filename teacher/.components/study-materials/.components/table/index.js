"use strict";

/**
 *
 */
function index()
{
    const dialog = document.querySelector("#smdialog");
    const button = document.querySelector("button[title='Add new study material']");

    button.addEventListener("click", () => dialog.showModal());
}

index();