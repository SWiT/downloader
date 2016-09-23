<?php
session_start();
include("config.inc.php");
if (isset($_SESSION["user"]) && $_SESSION["user"] == USER) {
	// Send the file.
	$filename = $_GET["fn"];
	$file = PATH."/".$filename;
	$fp = fopen($file, 'rb');
	$mimetype = mime_content_type($file);
	header("Content-Type: $mimetype");
	header("Content-Length: " . filesize($file));
	header('Content-Disposition: attachment; filename="'.$filename.'"');
    header("Content-Transfer-Encoding: binary");
	fpassthru($fp);
	exit;
} else {
	header("Location: index.php");
}
?>