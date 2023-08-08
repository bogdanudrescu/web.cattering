<?php

$passwordSet = false;

if (isset($_POST['oldPassword']) && isset($_POST['password']) && isset($_POST['newPassword'])) {

	$resultUsers = mysql_query('select * from users where id = ' . $_SESSION['user_id']);
	$rowUser = mysql_fetch_assoc($resultUsers);

	if ($rowUser['password'] == $_POST['oldPassword']) {

		if ($_POST['password'] == $_POST['newPassword']) {

			mysql_query('update users set password = "' . $_POST['newPassword'] . '" where id = ' . $_SESSION['user_id']);

			$passwordSet = true;

			echo 'Parola a fost modificata cu succes!<br />';
		} else {
			echo 'Parola noua a fost intordusa gresit!<br /><br />';
		}

	} else {
		echo 'Introduceti vechea parola corect!<br /><br />';
	}

}

if (!$passwordSet) {
	echo '<form method="POST" action="index.php?option=changePass">';
	echo 'Old Password: <input type="password" name="oldPassword" /><br />';
	echo 'New Password: <input type="password" name="password" /><br />';
	echo 'Repeat Password: <input type="password" name="newPassword" /><br />';
	echo '<input type="submit" value="Change" /></form>';
}

?>