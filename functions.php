<?php
 
/**
 * Функция форматирует цену и добавляет знак рубля
 * @param float $price 
 * @return string
 */
function formatPrice(float $price): string
{
    return number_format($price, 0, '.', ' ') . ' ' . '<b class="rub">р</b>';
}

/**
 * Функция считает разницу между двумя датами
 * @param string $start_date
 * @param string $end_date
 * @return string
 */
function timeDiff(
	string $start_date = null, 
	string $end_date = null
): string
{
	$time_diff = '00:00';

	if (is_null($start_date)) {
		$start_date = date('Y-m-d H:i:s');
	}

	if (is_null($end_date)) {
		$end_date = date('Y-m-d H:i:s', strtotime('tomorrow midnight'));
	}

	$end_date_timestamp = strtotime($end_date);
	$start_date_timestamp = strtotime($start_date);

	if ($end_date_timestamp >= $start_date_timestamp) {
		$time_diff = gmdate("H:i", $end_date_timestamp - $start_date_timestamp);
	} 

	return $time_diff;
}

/**
 * Функция считает разницу между двумя датами
 * @param string $path
 * @param array $data
 * @return string
 */
function renderTemplate($path, $data = []) 
{
	if (!file_exists($path)) {
	    return '';
	}
	
	extract($data);

	ob_start();

	include $path;

	$html = ob_get_clean();
	
	return $html;
}
