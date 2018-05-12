<?php

function formatPrice($price)
{
    return number_format($price, 0, '.', ' ') . ' ' . '<b class="rub">р</b>';
}

function renderTemplate($path, $data = []) 
{
	if (!file_exists($path)) 
	{
	    return '';
	}
	extract($data);
	ob_start();
	include($path);
	$html = ob_get_clean();
	return $html;
}


