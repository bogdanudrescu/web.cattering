<?php

if (!isset($_GET['print'])) {
	echo '<a href="index.php?print=&option=finalOrder">Print</a><br />';
}
echo '<br />';

?>

<table>
	<tr>
		<td><?php

		echo '<strong>Meniu NetDania ' . date("d.m", $firstDay) . ' - ' . date("d.m.Y", $lastDay) . '</strong>';

		?> <br />
		<br />
		</td>
	</tr>

	<?php

	// Display the dates

	for ($i = $firstDayIndex; $i <= $lastDayIndex; $i++) {
		$currentDay = getDateForWeekDay($i);
		$currentDateText = date("Y-m-d", $currentDay);

		echo '<tr><td><strong>' . $dayNames[$i] . ' - ' . date("d/m", $currentDay) . '</strong></td></tr>';

		echo '<tr><td>';

		// Get all meals
		$query  = 'select * from meals';
		$resultAllMeals = mysql_query($query);

		$price = 0;
		
		while ($rowMeal = mysql_fetch_assoc($resultAllMeals)) {
			$resultOrders = mysql_query('select count(meal_id) from orders where date="' . $currentDateText . '" and meal_id=' . $rowMeal['id']);
			$rowCount = mysql_fetch_assoc($resultOrders);

			$count = $rowCount['count(meal_id)'];
			if ($count > 0) {
				echo $count . ' x ' . $rowMeal['name'] . '<br />';
				
				$price += $count * $rowMeal['price'];
			}
		}

		echo '</td></tr>';

		echo '<tr><td>';
		echo '<strong>Total ' . /*$dayNames[$i] .*/ ' - ' . $price . ' lei</strong><br /><br />';
		echo '</td></tr>';
	}

	?>

</table>

	<?php
	if (!isset($_GET['print'])) {
		?>

<br />
<br />
<a href="index.php?option=finalOrder&action=decreaseDate">Previous week</a>
&nbsp;&nbsp;&nbsp;
<a href="index.php?option=finalOrder&action=thisDate">This week</a>
&nbsp;&nbsp;&nbsp;
<a href="index.php?option=finalOrder&action=increaseDate">Next week</a>

		<?php
	}
	?>