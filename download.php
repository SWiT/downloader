<?php
session_start();
include("config.php");
if (isset($_SESSION["user"])) {
	// Send the file.
	$p = $_GET["p"];
	$f = $_GET["f"];
	
	$file = "";
	$USER = $_SESSION["user"];
	foreach ($USER["files"] as $fileinfo) {
		if ($p == $fileinfo["path"]) {
			$file = $p . "/" . $f;
		}
	}
	
	$fp = fopen($file, 'rb');
	header("Content-Type: " . mime_content_type($file));
	header("Content-Length: " . filesize($file));
	header('Content-Disposition: attachment; filename="'.basename($file).'"');
    header("Content-Transfer-Encoding: binary");
	fpassthru($fp);
	exit;
} else {
	header("Location: index.php");
}
?>