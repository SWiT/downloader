
<?php
include("config.inc.php");
session_start();

echo "<html>";
echo "<header>";
echo "<title>".TITLE."</title>";
echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"style.css\">";
echo "</header>";
echo "<body>";
echo "<h1>".TITLE."</h1>";
echo "<hr>";

if (isset($_POST["user"]) && isset($_POST["pass"]) ) {
    $user = $_POST["user"];
    $pass = $_POST["pass"];
    if ($user == USER && $pass == PASS) {
        $_SESSION["user"] = $user;
    } else {
        $_SESSION["user"] = NULL;
    }
}

if (isset($_SESSION["user"]) && $_SESSION["user"] == USER) {
    // Show the files.
    $files = scandir(PATH);
    $rowclass = "even";
    foreach($files as $fn) {
        $file = PATH."/".$fn;
        if (!is_dir($file)) {
            $rowclass = ($rowclass == "odd")? "even" : "odd";
            echo "<div class='filerow $rowclass'>";
                echo "<div class='filename'>";
                echo "<a href=\"download.php?fn=$fn\">";
                echo $fn;
                echo "</a>";
                echo "</div>";
                echo "<div class='filesize'>". round(filesize($file)/1000000) ." MB</div>";
            echo "</div>";

        }
    }
} else {
    //Show the login form.
    ?>
    <form method="post">
        user:<input type='text' name='user'><br/>
        pass:<input type='password' name='pass'><br/>
        <input type='submit' name='submit' value='Login'>
    </form>
    <?php
}
?>
<hr>
<div class='footer'>
    <a href="?logout">logout</a><br>
</div>
</body>
</html>

