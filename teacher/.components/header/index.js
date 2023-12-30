"use strict";

/**
 *
 */
function index()
{
    const button = document.querySelector("button[title='Logout']");

    button.addEventListener("click", () => location.assign('http://www.schoolsysmanager.com/actions/logout.php'));
}

export { index };