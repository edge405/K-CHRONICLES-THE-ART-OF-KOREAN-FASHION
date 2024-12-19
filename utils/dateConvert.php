<?php

function convert($timestamp)
{
    $date = new DateTime($timestamp);
    return $date->format('F j, Y, g:i A');
}

function convertBlog($timestamp)
{
    $date = new DateTime($timestamp);
    return $date->format('F j, Y');
}
