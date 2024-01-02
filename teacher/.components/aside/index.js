"use strict";

/**
 *
 */
function index(zIndex)
{
    let menu = document.querySelector("body > aside menu");

    {
        const section = document.querySelector("#index");
        const button  = menu.querySelector(":first-child > button");

        button.addEventListener("click", () => section.style.zIndex = ++zIndex);
    }

    {
        const section = document.querySelector("#routines");
        const button  = menu.querySelector(":nth-child(2) > button");

        button.addEventListener("click", () => section.style.zIndex = ++zIndex);
    }

    {
        const section = document.querySelector("#sm");
        const button  = menu.querySelector(":nth-child(3) > button");

        button.addEventListener("click", () => section.style.zIndex = ++zIndex);
    }
}

export { index };