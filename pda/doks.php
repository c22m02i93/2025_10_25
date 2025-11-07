<?
if (isset($_REQUEST[session_name()])) session_start ();
$auth=$_SESSION['auth'];
$name_user=$_SESSION['name_user'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?
include 'head.php';
?>
<title>Документы</title>

</head>
<body>

<?
$tip = $_GET['tip'];

include 'golova.php';

include 'menu.php';
include 'content.php';
include 'function.php';
mysql_connect("localhost", "host1409556", "0f7cd928"); 
mysql_query("SET NAMES 'cp1251'");
?>

<h1>Документы</h1>

<?
if (empty($_GET['tip'])) {
echo '<a href="doks.php?tip=ukaz">Указы</a><br />
<a href="doks.php?tip=raspor">Распоряжения</a><br />
<a href="doks.php?tip=cirk">Циркуляры</a><br />
<a href="doks.php?tip=udostoverenie">Удостоверения</a>';
}
else {
 
 if(!isset($_GET['page'])){
  $p = 1;
}
else{
  $p = addslashes(strip_tags(trim($_GET['page'])));
  if($p < 1) $p = 1;
}
$num_elements = 10;
$total = mysql_result(mysql_query("SELECT COUNT(*) FROM host1409556_barysh.doks WHERE tematika LIKE '$tip'"),0,0); //Подсчет общего числа записей
$num_pages = ceil($total / $num_elements); //Подсчет числа страниц
if ($p > $num_pages) $p = $num_pages;
$start = ($p - 1) * $num_elements; //Стартовая позиция выборки из БД
                    
					
  echo GetNavtip($p, $num_pages, "doks", $tip).'<hr style="width: 100%" />';
            $sel = "SELECT * FROM host1409556_barysh.doks WHERE tematika LIKE '$tip' ORDER BY date DESC LIMIT ".$start.", ".$num_elements;
            $query = mysql_query($sel);
            if(mysql_num_rows($query)>0){

			while($res = mysql_fetch_array($query)){


$dtn = $res[date]; 
$yyn = substr($dtn,0,4); // Год
$mmn = substr($dtn,5,2); // Месяц
$ddn = substr($dtn,8,2); // День

// Переназначаем переменные
if ($mmn == "01") $mm1n="января";
if ($mmn == "02") $mm1n="февраля";
if ($mmn == "03") $mm1n="марта";
if ($mmn == "04") $mm1n="апреля";
if ($mmn == "05") $mm1n="мая";
if ($mmn == "06") $mm1n="июня";
if ($mmn == "07") $mm1n="июля";
if ($mmn == "08") $mm1n="августа";
if ($mmn == "09") $mm1n="сентября";
if ($mmn == "10") $mm1n="октября";
if ($mmn == "11") $mm1n="ноября";
if ($mmn == "12") $mm1n="декабря";

if ($ddn == "01") $ddn="1";
if ($ddn == "02") $ddn="2";
if ($ddn == "03") $ddn="3";
if ($ddn == "04") $ddn="4";
if ($ddn == "05") $ddn="5";
if ($ddn == "06") $ddn="6";
if ($ddn == "07") $ddn="7";
if ($ddn == "08") $ddn="8";
if ($ddn == "09") $ddn="9";


$ddttn = $ddn.' '.$mm1n.' '.$yyn.' г.'; // Конечный вид строки

	$patterns = array ('/(?:\{{3})(http:\/\/[^\s\[<\(\)\|]+)(?:\}{3})-(?:\{{3})([^}]+)(?:\}{3})/i', '/(?:\{{3})(http:\/\/[^\s\[<\(\)\|]+)(?:\}{3})/i', '/\n/');
	$replace = array ('<a href="${1}" target=_blank>${2}</a>', '<a href="${1}" target=_blank>${1}</a>', '</p><p>');

	$text = preg_replace($patterns, $replace, $res[text]);

echo '<div style="margin-left: 5px;"><span class="title">';
if ($res[tematika] == 'ukaz') echo 'Указ';
if ($res[tematika] == 'raspor') echo 'Распоряжение';
if ($res[tematika] == 'cirk') echo 'Циркуляр';
if ($res[tematika] == 'udostoverenie') echo 'Удостоверение о рукоположении в сан '.$res[name];
echo ' № '.$res[nomer].' от '.$ddttn.'</span><br />';
if ($res[tematika] != 'udostoverenie') echo '<div style="padding-left: 25%; float:right; text-align: right; margin-top: 5px; margin-bottom: 5px"><i>'.$res[name].'</i></div><br /><br />';
echo '</div><div style="border-bottom: 1px #D7D7D7 solid; margin-top: 5px; margin-bottom: 5px">';


echo '<p>'.$text.'<br /><br /></p></div>';
}

}

  echo GetNavtip($p, $num_pages, "doks", $tip).'<hr style="width: 100%" />';
}

include 'footer.php';
?>

</body>
</html>