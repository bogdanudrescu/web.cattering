<?php

$usersPerTable = 9;

if (!isset($_GET['print'])) {
	echo '<a href="index.php?print=&option=detailsOrder">Print</a><br />';
}

$missingUserOrdersTextList = '';

// Show tables with orders
$resultUsers = mysql_query('select * from users where max_meals > 0 order by type');

$userIndex = 0;
while ($rowUser = mysql_fetch_assoc($resultUsers)) {

	// Count if the user select something
	$userOdrersCount = mysql_fetch_assoc(mysql_query('select count(id) from orders where user_id = ' . $rowUser['id'] . ' and date >= "' . date("Y-m-d", $firstDay) . '"' . ' and date <= "' . date("Y-m-d", $lastDay) . '"'));

	if ($userOdrersCount['count(id)'] > 0) {
		$users[$userIndex] = $rowUser;
		$userIndex++;

	} else {
		$missingUserOrdersTextList = $missingUserOrdersTextList . $rowUser['name'] . ', ';
	}
}

echo '<br />';
echo '<br />';
if (!isset($_GET['print'])) {
	echo $missingUserOrdersTextList . 'nu au comandat!<br /><br />';
}

echo '<strong>Meniu NetDania ' . date("d.m", $firstDay) . ' - ' . date("d.m.Y", $lastDay) . '</strong>';
echo '<br /><br />';

$usersCount = $userIndex;

for ($i = 0; $i < $usersCount; $i++) {
	if ($i % $usersPerTable == 0) {
		$startUsers = $i;
		$endUsers = $i + $usersPerTable - 1;
		if ($endUsers > $usersCount - 1) {
			$endUsers = $usersCount - 1;
		}
		showOrdersTable($startUsers, $endUsers);
		echo '<br />';
		echo '<br />';
		echo '<br />';
		echo '<br />';
	}
}

function showOrdersTable($startUsers, $endUsers) {
	global $users, $firstDayIndex, $lastDayIndex, $dayOfCurrentWeek, $dayNames;

	echo '<table border="1" cellpadding="3" cellspacing="0">';

	// First row with users
	echo '<tr>';
	echo '<td>&nbsp;</td>';

	for ($userIndex = $startUsers; $userIndex <= $endUsers; $userIndex++) {
		echo '<td valign="top"><strong>' . $users[$userIndex]['name'] . '</strong></td>';
	}
	echo '</tr>';

	// One row for each day
	for ($i = $firstDayIndex; $i <= $lastDayIndex; $i++) {

		echo '<tr>';

		$currentDay = getDateForWeekDay($i);
		echo '<td width="70"><strong>' . $dayNames[$i] . '<br />' . date("d/m", $currentDay) . '</td>';

		for ($userIndex = $startUsers; $userIndex <= $endUsers; $userIndex++) {

			$userId = $users[$userIndex]['id'];

			echo '<td valign="top" width="140">';

			// Display the orders

			$query  = 'select * from orders where user_id = ' . $userId . ' and date = "' . date("Y-m-d", $currentDay) . '"';
			$result = mysql_query($query);

			//echo mysql_num_rows($result) . '<br />';

			if (mysql_num_rows($result) == 0) {
				echo '&nbsp;';

			} else {
				while ($row = mysql_fetch_assoc($result)) {
					$resultMeals = mysql_query('select * from meals where id = ' . $row['meal_id']);
					$rowMeals = mysql_fetch_assoc($resultMeals);

					$meal_name = $rowMeals['short_name'];
					if ($meal_name == "") {
						$meal_name = $rowMeals['name'];
					}

					echo $meal_name . '<br />';
				}
			}

			echo '</td>';

		}

		echo '</tr>';

	}

	echo '</table>';
}

if (!isset($_GET['print'])) {

	?>

<br />
<br />
<a href="index.php?option=detailsOrder&action=decreaseDate">Previous
week</a>
&nbsp;&nbsp;&nbsp;
<a href="index.php?option=detailsOrder&action=thisDate">This week</a>
&nbsp;&nbsp;&nbsp;
<a href="index.php?option=detailsOrder&action=increaseDate">Next week</a>

	<?php
}
?>