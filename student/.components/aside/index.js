"use strict";

/**
 *
 */
function index()
{
    let zIndex = 0;

    const menu = document.querySelector("#controller menu");

    {
        const section = document.querySelector("#index");
        const button  = menu.querySelector(":first-child > button");

        button.addEventListener("click", () => section.style.zIndex = ++zIndex);
    }

    {
        const section = document.querySelector("#syllabus");
        const button = menu.querySelector(":nth-child(2) > button");

        button.addEventListener("click", () => section.style.zIndex = ++zIndex);
    }

    {
        const section = document.querySelector("#routines");
        const button  = menu.querySelector(":nth-child(3) > button");

        button.addEventListener("click", () => section.style.zIndex = ++zIndex);
    }

    {
        const section = document.querySelector("#examinations");
        const button  = menu.querySelector(":nth-child(4) > button");

        button.addEventListener("click", () => section.style.zIndex = ++zIndex);
    }

    {
        const section = document.querySelector("#attendance");
        const button  = menu.querySelector(":nth-child(5) > button");

        button.addEventListener("click", () => section.style.zIndex = ++zIndex);
    }

    {
        const section = document.querySelector("#fee-details");
        const button  = menu.querySelector(":nth-child(6) > button");

        button.addEventListener("click", () => section.style.zIndex = ++zIndex);
    }

    {
        const section = document.querySelector("#sm");
        const button  = menu.querySelector(":nth-child(7) > button");

        button.addEventListener("click", () => section.style.zIndex = ++zIndex);
    }

    {
        const section = document.querySelector("#events");
        const button  = menu.querySelector(":nth-child(8) > button");

        button.addEventListener("click", () => section.style.zIndex = ++zIndex);
    }

    {
        const section = document.querySelector("#meeting");
        const button  = menu.querySelector(":nth-child(9) > button");

        button.addEventListener("click", () => section.style.zIndex = ++zIndex);
    }
}

export { index };