<?php
// Open the add form

/**
 * Insert the add meal form into the html response.
 */
function insertAddForm() {
	//echo '<form method="POST" action="index.php?option=order&action=add&year=' . $_GET['year'] . '&month=' . $_GET['month'] . '&day=' . $_GET['day'] . '"><br />';
	echo '<form method="POST" action="index.php?option=order&action=add&day=' . $_GET['day'] . '"><br />';

	$result = mysql_query('select * from meals');

	echo '<select name="meal" size="1" >'; // multiple="true"

	while ($row = mysql_fetch_assoc($result)) {
		echo '<option value="' . $row['id'] . '">' . $row['name'] . ' - ' . $row['price'] . ' lei</option>';
	}

	echo '</select>&nbsp;';
	echo '<input type="submit" value="Add" />';
	echo '</form>';
}

$maxSum = 16;
$defaultSum = 12;

/**
 * Check whether the user is allow to insert a meal on the specify day.
 * @param $userId	the id of the user.
 * @param $mealId	the id of the meal to be inserted.
 * @param $day		the date for which the meal is about to be added. String text format as Y-m-d.
 */
function isAllowInsert($userId, $mealId, $day) {
	global $firstDayIndex, $lastDayIndex, $maxSum, $defaultSum;

	$maxSumCount = 0;

	for ($i = $firstDayIndex; $i <= $lastDayIndex; $i++) {
		$currentDay = getDateForWeekDay($i);
		$currentDayFormatYmd = date("Y-m-d", $currentDay);

		$daySum = getDayPrice($_SESSION['user_id'], $currentDayFormatYmd);
		
		if ($defaultSum < $daySum && $daySum <= $maxSum) {
			$maxSumCount++;
		}
	}

	// This should never happen
	if ($maxSumCount > 2) {
		return false;
	}

	$totalDaySum = getDayPrice($_SESSION['user_id'], $day) + getMealPrice($mealId);

	if ($maxSumCount < 2) {
		return $totalDaySum <= $maxSum;
	} else {
		return $totalDaySum <= $defaultSum;
	}
}

// ----------------------- here begin file execution code ------------------------------

if (isset($_GET['action'])) {

	switch ($_GET['action']) {

		case 'add':
			
			if (isAllowInsert($_SESSION['user_id'], $_POST['meal'], $_GET['day'])) {
				mysql_query('insert into orders (user_id, meal_id, date) values (' . $_SESSION['user_id'] . ', ' . $_POST['meal'] . ', "' . $_GET['day'] . '")');
			} else {
				echo '<strong>EROARE!!!</strong> Comanda nu a fost adaugata pentru ca depasiti suma alocata! Va rugam incadrati-va in sumele de mai jos!<br /><br />';
			}
			break;

		case 'delete':
			$orderResult = mysql_query('select * from orders where id=' . $_GET['id']);
			if (mysql_num_rows($orderResult) > 0) {
				$orderRow = mysql_fetch_assoc($orderResult);
				if ($orderRow['user_id'] == $_SESSION['user_id']) {
					mysql_query('delete from orders where id=' . $_GET['id']);
				}
			}
			break;
	}
}

?>

<strong>ATENTIE!!!</strong> Se poate comanda de urmatoarele sume:
cel mult 2 zile pe saptamana de maxim <?php echo $maxSum;?> lei/zi, in rest de maxim <?php echo $defaultSum;?> lei/zi. 
<br />
<br />
<br />

<table cellpadding="10">

<?php

$now = time();

// Display the orders
for ($i = $firstDayIndex; $i <= $lastDayIndex; $i++) {
	//$currentDay = mktime(12, 0, 0, date("m", $_SESSION['date']), date("d", $_SESSION['date']) - $dayOfCurrentWeek + $i, date("y", $_SESSION['date']));
	$currentDay = getDateForWeekDay($i, 12);
	$currentDayFormatYmd = date("Y-m-d", $currentDay);

	// Selected meals for current day
	$query  = 'select * from orders where user_id = ' . $_SESSION['user_id'] . ' and date = "' . $currentDayFormatYmd . '"';
	$result = mysql_query($query);
	$mealsCount = mysql_num_rows($result);

	// Display day of week and date
	echo '<tr><td><strong>' . $dayNames[$i] . ' - ' . date("d/m", $currentDay);

	if ($mealsCount < $_SESSION['user_max_meals']) {
		if (isset($_GET['action']) && $_GET['action'] == 'requestAdd' && $currentDayFormatYmd == $_GET['day']) {
			echo '<a name="add"/>';
		}
	
		// Add link
		if ($now <= $currentDay && !(isset($_GET['action']) && $_GET['action'] == 'requestAdd')) {
			echo ' <a href="index.php?option=order&action=requestAdd&day=' . $currentDayFormatYmd . '">Add</a>';
		}
	
		// Add form
		if (isset($_GET['action']) && $_GET['action'] == 'requestAdd' && $currentDayFormatYmd == $_GET['day']) {
			insertAddForm();
		}
	}

	echo '</td></tr>';

	echo '<tr><td>';

	//echo mysql_num_rows($result) . '<br />';

	$price = 0;

	// Display selected meals for current day
	while ($row = mysql_fetch_assoc($result)) {
		$resultMeals = mysql_query('select * from meals where id = ' . $row['meal_id']);
		$rowMeals = mysql_fetch_assoc($resultMeals);

		$price += $rowMeals['price'];

		echo $rowMeals['name'] . ' - ' . $rowMeals['price'] . ' lei';

		if ($now <= $currentDay) {
			echo ' <a href="index.php?option=order&action=delete&id=' . $row['id'] . '">X</a>';
		}
		echo '<br />';
	}

	echo '<br />Total ' . $price . ' lei<br /><br />';

	//echo '<a href="index.php?option=order&action=requestAdd&year=' . date("Y", $currentDay). '&month=' . date("m", $currentDay). '&day=' . date("d", $currentDay). '">Add</a>';
	echo '';
	echo '</td></tr>';

}

?>

</table>
<br />
<br />
<a href="index.php?option=order&action=decreaseDate">Previous week</a>
&nbsp;&nbsp;&nbsp;
<a href="index.php?option=order&action=thisDate">This week</a>
&nbsp;&nbsp;&nbsp;
<a href="index.php?option=order&action=increaseDate">Next week</a>
