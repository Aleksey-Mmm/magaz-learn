<?php
/**
 * Date: 20.11.2020
 * Time: 14:04
 */

function debug($data, $die = false)
{
    echo "<pre>". print_r($data, 1). "</pre>";
    if ($die) {
        die;
    }
}