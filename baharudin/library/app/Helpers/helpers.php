<?php
function dateFormat($value)
{
	return date('H:i:s - d M y', strtotime($value));
}
?>