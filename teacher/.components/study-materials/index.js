"use strict";

import { index as Material } from "./.components/material/index.js";
import { index as Form } from "./.components/form/index.js";

/**
 *
 */
function index()
{
    const dialog = document.querySelector("#smdialog");
    const button = document.querySelector("#sm footer button");

    button.addEventListener("click", () => dialog.showModal());

    Form();
}

export { index };