<form action="cal.php" method="GET">
<input id="search" name="keywords" type="text" placeholder="Type here">
<input id="submit" type="submit" value="Search">
</form>
</body>
</html>

<?php

$connection = mysql_connect("localhost","root","password");

mysql_select_db("eventSystem")or die(mysql_error());

$keywords = isset($_GET['keywords']) ? '%'.$_GET['keywords'].'%' : '';

$result = mysql_query("SELECT firstname FROM registert where firstname like '$keywords'");
while ($row = mysql_fetch_assoc($result)) {
    echo $row['firstname'];
}

?>
