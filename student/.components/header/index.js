"use strict";

/**
 *
 */
function index()
{
    const menu = document.querySelector("body > header menu");

    {
        const button = menu.querySelector("button[title='Sidebar']");

        button.addEventListener("click", () => {});
    }

    {
        const aside  = document.querySelector("#messages");

        const button = menu.querySelector("button[title='Messages']");

        button.addEventListener("click", () => {
            if ( aside.style.display == "none" || aside.style.display == "" )
            {
                aside.style.display = "block";
            }
            else
            {
                aside.style.display = "none";
            }
        });
    }

    {
        const aside  = document.querySelector("#notifications");

        const button = menu.querySelector("button[title='Notifications']");

        button.addEventListener("click", () => {
            if ( aside.style.display == "none" || aside.style.display == "" )
            {
                aside.style.display = "block";
            }
            else
            {
                aside.style.display = "none";
            }
        });
    }

    {
        const button = menu.querySelector("button[title='Profile']");

        button.addEventListener("click", () => location.assign('http://www.schoolsysmanager.com/student/.components/profile'));
    }

    {
        const button = menu.querySelector("button[title='Logout']");

        button.addEventListener("click", () => location.assign('http://www.schoolsysmanager.com/actions/logout.php'));
    }
}

export { index };