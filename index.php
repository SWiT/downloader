
<?php
include("config.php");

session_start();

echo "<html>";
echo "<header>";
echo "<title>".$CFG->TITLE."</title>";
echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"style.css\">";
echo "</header>";
echo "<body>";
echo "<h1>".$CFG->TITLE."</h1>";
//echo "<pre>";var_dump($CFG);echo "</pre>";
echo "<hr>";

if (isset($_POST["user"]) && isset($_POST["pass"]) ) {
    $username = $_POST["user"];
    $password = $_POST["pass"];
	
	$userfound = False;
	foreach ($CFG->USERS as $user) {
		if ($user["username"] == $username && $user["password"] == $password) {
			$userfound = True;
			$_SESSION["user"] = $user;
			break;
		}
	}
    if (!$userfound) {
        $_SESSION["user"] = NULL;
    }
}



if (isset($_SESSION["user"])) {
	$USER = $_SESSION["user"];
    // Show the files.
	foreach ($USER["files"] as $fileinfo) {
		$path = $fileinfo["path"];
		echo "<h2>$path</h2>";
		$files = scandir($path);
		$rowclass = "even";
		foreach($files as $fn) {
			$file = $path."/".$fn;
			if (!is_dir($file)) {
				$rowclass = ($rowclass == "odd")? "even" : "odd";
				echo "<div class='filerow $rowclass'>";
					echo "<div class='filename'>";
					echo "<a href=\"download.php?p=".urlencode($path)."&f=".urlencode($fn)."\">";
					echo $fn;
					echo "</a>";
					echo "</div>";
					echo "<div class='filesize'>". round(filesize($file)/1000000) ." MB</div>";
				echo "</div>";

			}
		}
    }
} else {
    //Show the login form.
    echo "<form method=\"post\">";
    echo "user:<input type='text' name='user'><br/>";
    echo "pass:<input type='password' name='pass'><br/>";
    echo "<input type='submit' name='submit' value='Login'>";
    echo "</form>";
    
}

echo "<hr>";
echo "<div class='footer'>";
echo "<a href=\"logout.php\">logout</a><br>";
echo "</div>";
echo "</body>";
echo "</html>";

