<?php

/**
 *
 */
function index(): void
{
    error_reporting(E_ALL);
    ini_set("display_errors", true);

    require_once __DIR__ . '/home/index.php';
}

index();