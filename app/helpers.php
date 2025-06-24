<?php
if (!function_exists('format_currency')) {
    function format_currency($amount, $suffix = ' Ft') {
        return number_format($amount, 0, ',', ' ') . $suffix;
    }
}
