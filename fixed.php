<?php


if( isset( $_GET[ 'Login' ] )) {
	// Get username
	$user = preg_grep("[A-z]", Array($_GET['username']))[0];
	// Get password
	$pass = $_GET[ 'password' ];
	$pass = md5( $pass );
	// Check the database
	$query  = "SELECT * FROM `users` WHERE user = '$user' AND password = '$pass';";
	$result = mysqli_query($GLOBALS["___mysqli_ston"],  $query ) or die( '<pre>' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)) . '</pre>' );
	$fp = fopen("file.txt", "a+")
	if( $result && mysqli_num_rows( $result ) == 1 ) {
		// Get users details
		$row    = mysqli_fetch_assoc( $result );
		$avatar = $row["avatar"];
		// Login successful
		$html .= "<p>Welcome to the password protected area {$user}</p>";
		$html .= "<img src=\"{$avatar}\" />";
	} else {
		if(strpos(file_get_contents("file.txt"), $user)) {
			// Login failed
			$html .= "<pre><br />You are blocked. Send message to admin for fix problem: admin@example.com</pre>";
		} else {
			$html .= "<pre><br />Username and/or password incorrect.</pre>";
			sleep(rand(100, 600));
			fwrite($fp, $file . PHP_EOL)
		}
	}
	fclose(fp);
	((is_null($___mysqli_res = mysqli_close($GLOBALS["___mysqli_ston"]))) ? false : $___mysqli_res);
}

?>