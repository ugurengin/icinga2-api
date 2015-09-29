<html>
<title>Icinga2 API Add Host Object</title>
<body bgcolor="#DEDDD1">
<form action="">
<p><label>Hostname:<br> <input type="text" name="hostname"> </label></p>
<p><label>Displayname:<br> <input type="text" name="displayname"> </label> </p>
<p><label>Hostaddress:<br> <input type="text" name="hostaddr"> </label> </p>
<p><label>Product:<br> <input type="text" name="product"> </label> </p>
<p><label>OS:<br> <input type="text" name="os"> </label> </p>
<input type="submit" value="Submit" name="Add">
</form>

<?php

# Author: Ugur Engin
# Icinga2 Remote Host Add Over HTTP

function back() {
         echo '<form name="back" action="<a href="javascript:history.back()">" method="GET"> 
               <input type="submit" value="Back">
               </form>';
}

function failedrequest() {
        http_response_code(400);
}

if ($_SERVER[REQUEST_METHOD] == "GET") {

$hostname = $_GET['hostname'];
$dispname = $_GET['displayname'];
$hostaddr = $_GET['hostaddr'];
$prod = $_GET['product'];
$os = $_GET['os'];

if ( (empty($hostname)) || empty($dispname) || (empty($hostaddr)) || (empty($prod)) || (empty($os)) ) {

    failedrequest();
        echo "<strong><font color='red'>All fields must be filled to add new host object.</font></strong>";

} else {
        $a = htmlspecialchars(escapeshellarg($hostname));
        $b = htmlspecialchars(escapeshellarg($dispname));
        $c = htmlspecialchars(escapeshellarg($hostaddr));
        $d = htmlspecialchars(escapeshellarg($prod));
        $e = htmlspecialchars(escapeshellarg($os));

$addhost = "sudo /usr/sbin/icinga2 repository host add name='$a' check_command=hostalive address='$c' vars.product='$d' display_name='$b' vars.os='$e' --import=generic-api-host";
$commit = "sudo /usr/sbin/icinga2 repository commit";
$reload = "sudo /usr/bin/systemctl reload icinga2";

exec("$addhost;$commit;$reload &", $output);

foreach ($output as $line) {
   echo "<font color='green'>$line</font><br>";
}
   echo "<form><input type=\"button\" value=\"Back\" onClick=\"history.go(-1)\"></form>";
}

} else {
        failedrequest();
        echo "There is a problem with the http request.";
}

?>
</body>
</html>
