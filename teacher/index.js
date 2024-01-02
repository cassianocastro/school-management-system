"use strict";

import { index as Header } from "./.components/header/index.js";
import { index as Aside } from "./.components/aside/index.js";
import { index as SM } from "./.components/study-materials/index.js";
import { index as Routines } from "./.components/routines/index.js";

/**
 *
 */
function index()
{
    var zIndex = 0;

    Header();
    Aside(zIndex);
    SM();
    Routines(zIndex);
}

index();