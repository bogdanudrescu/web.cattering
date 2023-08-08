<?php

/**
 * Returns the date of the current selected week in the application.
 * @param $weekDay	the day in the week (0 - 6).
 * @param $hour		the hour of the returned date.
 */
function getDateForWeekDay($weekDay, $hour = 0) {
	global $dayOfCurrentWeek;

	return mktime($hour, 0, 0, date("m", $_SESSION['date']), date("d", $_SESSION['date']) - $dayOfCurrentWeek + $weekDay, date("y", $_SESSION['date']));
}

/**
 * Gets the day price amount for the specified user and date.
 * @param $userId	the id of the user.
 * @param $date		the date for which to compute the amount.
 */
function getDayPrice($userId, $date) {
	$daySum = mysql_fetch_assoc(mysql_query('select sum(meals.price) from orders, meals where orders.user_id = ' . $userId . ' and orders.date = "' . $date . '" and orders.meal_id = meals.id'));
	return $daySum['sum(meals.price)'];
}

function getMealPrice($mealId) {
	$mealRow = mysql_fetch_assoc(mysql_query('select * from meals where id = ' . $mealId));
	return $mealRow['price'];
}

?>