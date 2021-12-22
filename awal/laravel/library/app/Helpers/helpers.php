<?php

function convert_date($value)
{
    return date('d M Y - H:i:s', strtotime($value));
}

function convert_to_rupiah($number)
{
    return 'Rp. ' . strrev(implode('.', str_split(strrev(strval($number)), 3)));
}