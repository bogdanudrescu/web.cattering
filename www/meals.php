<?php
// Add meal
if (isset($_POST['meal']) && isset($_POST['price'])) {
	
	$shortName = "";
	if (isset($_POST['short_meal'])) {
		$shortName = $_POST['short_meal'];
	}

	$query  = 'insert into meals (name, price, short_name) values ("' . $_POST['meal']. '", ' . $_POST['price'] . ', "' . $shortName . '")';
	mysql_query($query);
}

?>

<form method="POST" action="index.php?option=meals"><strong>Adauga fel
mancare</strong><br />
Denumire: <input type="text" name="meal" /><br />
Denumire scurta: <input type="text" name="short_meal" /><br />
Pret: <input type="text" name="price" /> lei<br />
<input type="submit" value="Add" /></form>
<br />

<table>
	<tr>
		<th>Fel mancare</th>
		<th>Pret</th>
	</tr>

	<?php
	// Display all meals
	$query  = 'select * from meals';
	$result = mysql_query($query);

	while ($row = mysql_fetch_assoc($result)) {
		echo '<tr>';
		echo '<td>' . $row['name'] . '</td>';
		echo '<td>' . $row['price'] . ' lei</td>';
		echo '</tr>';
	}

	?>

</table>
