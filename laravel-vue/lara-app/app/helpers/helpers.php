<?php

    function convert_date($value) {
        return date('j F Y', strtotime($value));
    }

?>