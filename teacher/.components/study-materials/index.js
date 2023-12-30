"use strict";

import { index as Header } from "../header/index.js";
import { index as Aside } from "../aside/index.js";
import { index as Table } from "./.components/table/index.js";
import { index as Form } from "./.components/form/index.js";

/**
 *
 */
function index()
{
    Header();
    Aside();
    Table();
    Form();
}

index();