<?php
/*
$ip = $_SERVER['REMOTE_ADDR'];
if ($ip == '192.168.0.1' || substr($ip, 0, 9) != '192.168.0') {
	die('Forbiden');
}
*/

session_start();

?>

<html>
<head>
<title>Catering NetDania</title>
</head>

<?php

if (isset($_GET['print'])) {
	echo '<body>'; // onload="javascript:window.print();"
} else {
	echo '<body>';
}

// Logout
if (isset($_GET['option']) && $_GET['option'] == "logout") {
	if(isset($_SESSION['user'])) {
		unset($_SESSION['user']);
		unset($_SESSION['user_name']);
		unset($_SESSION['user_id']);
		unset($_SESSION['user_type']);
		unset($_SESSION['date']);

		echo 'You have logged out! <br />';
	}
}

include('dbConf.php');
include('utilities.php');

// Login
if (!isset($_SESSION['user'])) {

	if (isset($_POST['user']) && isset($_POST['password']) ) {

		$query  = 'select * from users where users.user = "' . $_POST['user'] .'" and users.password = "' . $_POST['password'] . '"';

		$result = mysql_query($query);

		if (mysql_num_rows($result) > 0) {

			$row = mysql_fetch_assoc($result);

			$_SESSION['user'] = $row['user'];
			$_SESSION['user_name'] = $row['name'];
			$_SESSION['user_id'] = $row['id'];
			$_SESSION['user_type'] = $row['type'];
			$_SESSION['user_max_meals'] = $row['max_meals'];
		}
	}
}

if (!isset($_SESSION['user'])) {
	// Ask to login
	?>

<form method="POST" action="index.php">User: <input type="text"
	name="user" /><br />
Password: <input type="password" name="password" /><br />
<input type="submit" value="Login" /></form>

	<?php

} else {
	// The user is logged in, so the app begin

	define("ADMIN", 1);

	if (!isset($_GET['print'])) {
		echo 'Bine ai venit ' . $_SESSION['user_name'] . ' <a href="index.php">Home</a> <a href="index.php?option=changePass">Change Password</a> <a href="index.php?option=logout">Logout</a><br /><br />';

		// Add the menu
		if ($_SESSION['user_type'] == ADMIN) {
			echo '<a href="index.php?option=finalOrder">Comanda finala</a><br />';
			echo '<a href="index.php?option=detailsOrder">Comanda detaliata</a><br />';
			echo '<a href="index.php?option=meals">Meniuri</a><br />';
			echo '<a href="index.php?option=order">Comanda</a><br /><br />';
		}

		// Set the current date
		if (!isset($_SESSION['date'])) {
			$_SESSION['date'] = mktime(0, 0, 0, date("m"), date("d"), date("y"));
		} else if (isset($_GET['action'])) {
			switch ($_GET['action']) {

				case 'thisDate':
					$_SESSION['date'] = mktime(0, 0, 0, date("m"), date("d"), date("y"));
					break;

				case 'decreaseDate':
					$_SESSION['date'] = mktime(0, 0, 0, date("m", $_SESSION['date']), date("d", $_SESSION['date']) - 7, date("y", $_SESSION['date']));
					break;

				case 'increaseDate':
					$_SESSION['date'] = mktime(0, 0, 0, date("m", $_SESSION['date']), date("d", $_SESSION['date']) + 7, date("y", $_SESSION['date']));
					break;

			}
		}
	}

	// The day of week of the current date
	$dayOfCurrentWeek = date('w', $_SESSION['date']);
	$firstDayIndex = 1;
	$lastDayIndex = 5;
	$firstDay = getDateForWeekDay($firstDayIndex);
	$lastDay = getDateForWeekDay($lastDayIndex);

	$dayNames = array('Duminica', 'Luni', 'Marti', 'Miercuri', 'Joi', 'Vineri', 'Sambata');

	// Process option
	if (isset($_GET['option'])) {

		switch ($_GET['option']) {
			case 'finalOrder':
			case 'detailsOrder':
			case 'meals':
				if ($_SESSION['user_type'] == ADMIN) {
					include($_GET['option'] . '.php');
				}
				break;

			default:
				include($_GET['option'] . '.php');
				break;
		}

	} else if ($_SESSION['user_type'] != ADMIN) {
		include('order.php');
	}

}

echo '</body>';
?>

</html>
