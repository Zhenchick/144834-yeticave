<?php
include_once "mysql_helper.php";

/**
 * Функция форматирует цену и добавляет знак рубля
 * @param float $price 
 *
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
 *
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
		//$time_diff = gmdate("m-d H:i", $end_date_timestamp - $start_date_timestamp);
		$diff = $end_date_timestamp - $start_date_timestamp;
		$hours = floor($diff/3600);
		$diff -= $hours*3600;
		$minute = floor($diff/60);
		$time_diff = "$hours:$minute";
	} 

	return $time_diff;
}

/**
 * Функция-шаблонизатор
 * @param string $path
 * @param array $data
 *
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

/**
* Функция вывода лота по его id
* @param $connect
* @param int $lot_id
* 
* @return array $lot
*/
function getLotById($connect, $lot_id)
{
	$lot_desc_by_id_sql_query = "
    SELECT 
        * 
    FROM 
        `lots`
    WHERE
    	`id` = $lot_id;
    ";
    $result_lot_desc_by_id_sql_query = mysqli_query($connect, $lot_desc_by_id_sql_query);
    $lot = mysqli_fetch_assoc($result_lot_desc_by_id_sql_query);
    return $lot;
}

/**
*
*/
function getBetsByLotId($connect, $lot_id)
{
	$bets_by_id_sql_query = "
	SELECT
		`b`.*,
		`u`.`name`
	FROM
		`bets` AS `b`
	JOIN
		`users` AS `u`
	ON 
		`u`.`id` = `b`.`user_id`
	WHERE
		`lot_id` = ? ORDER BY `date_of_placement` DESC;
	";
	$stmt = db_get_prepare_stmt($connect, $bets_by_id_sql_query, [$lot_id]);
	mysqli_stmt_execute($stmt);
	$res = mysqli_stmt_get_result($stmt);

	return mysqli_fetch_all($res, MYSQLI_ASSOC);

	//SELECT * FROM `bets` WHERE `lot_id` = 1 ORDER BY `date_of_placement` ASC; добавить им пользователя
}

/**
*
*/
function getMinBet($lot, $bets = [])
{
	if (empty($bets)) {
		return $lot['start_price'];
	} else {
		$last_bet = $bets[0];
		return $last_bet['price'] + $lot['step_of_bet'];
	}
	
}

function currentPrice($lot, $bets = [])
{
	if (empty($bets)) {
		return $lot['start_price'];
	} else {
		$last_bet = $bets[0];
		return $last_bet['price'];
	}
}