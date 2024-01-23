"use strict";

/**
 *
 */
function index()
{
    const dialog = document.querySelector("#invoice");

    const button = document.querySelector("#invoice footer button[title~='Print']");

    button.addEventListener("click", () => window.print());
}

export { index };