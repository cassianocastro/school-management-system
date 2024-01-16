"use strict";

/**
 *
 */
function index()
{
    const menu = document.querySelector("#controller menu");

    {
        const button = menu.querySelector(":first-child > button");

        button.addEventListener("click", () => location.assign('http://www.schoolsysmanager.com/student'));
    }
}

export { index };