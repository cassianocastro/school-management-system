"use strict";

import { index as Header } from "./.components/header/index.js";
import { index as Aside } from "./.components/aside/index.js";
import { index as SM } from "./.components/study-materials/index.js";

/**
 *
 */
function index()
{
    Header();
    Aside();
    SM();
}

index();