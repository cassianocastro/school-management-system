"use strict";

/**
 *
 */
function index()
{
    const button = document.querySelector("button[title='Add new study material']");

    button.addEventListener("click", () => location.assign("?action=add-new"));
}

index();