<?php
namespace starter\util;

class Alert
{
    public static function show($msg)
    {
        echo "<script type='text/javascript'>$('alert-content').text($msg);$('alert').show();</script>";
        echo "<script type='text/javascript'>console.log($msg);</script>";
    }
}
