<?php
// Функция форматирует цену и добавляет знак рубля
function formatPrice($price)
{
    return number_format($price, 0, '.', ' ') . ' ' . '<b class="rub">р</b>';
}
// Функция считает сколько времени до конца суток
function timeCalculation($tomorrow)
{
	$now = time();
	$tomorrow = strtotime('tomorrow midnight');
	if ($tomorrow < $now)
	{
		return '00:00';
	}
	return gmdate("H:i", $tomorrow - $now);

}
// Функция-шаблонизатор
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



