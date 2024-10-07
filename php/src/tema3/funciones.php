<?php

function addPage($page)
{
    $_SESSION['historial'][] = $page;
}
function getPage()
{
    return 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
}
