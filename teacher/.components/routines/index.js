"use strict";

/**
 *
 */
function index(zIndex)
{
    let menu = document.querySelector("#routines menu");

    {
        const section = document.querySelector("#periods");

        const button  = menu.querySelector(":first-child > button");

        button.addEventListener("click", () => {section.style.zIndex = ++zIndex});
    }

    {
        const section = document.querySelector("#timetable");

        const button  = menu.querySelector(":last-child > button");

        button.addEventListener("click", () => {section.style.zIndex = ++zIndex});
    }
}

export { index };