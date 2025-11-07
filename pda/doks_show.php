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
include 'golova.php';
include 'menu.php';
$tips = $_GET['tip'];
$data = $_GET['data'];
?>

<h1>Документы</h1>

 <?   
mysql_connect("localhost", "host1409556", "0f7cd928"); 
 mysql_query("SET NAMES 'cp1251'");
 $news_all = mysql_query("SELECT * FROM host1409556_barysh.doks WHERE tematika LIKE '$tips' AND date = '$data'");

$news = mysql_fetch_array($news_all); 

$dtn = $news[date]; 
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

	$text = preg_replace($patterns, $replace, $news[text]);

echo '<div style="margin-left: 5px;"><span class="title">';
if ($news[tematika] == 'ukaz') echo 'Указ';
if ($news[tematika] == 'raspor') echo 'Распоряжение';
if ($news[tematika] == 'cirk') echo 'Циркуляр';
if ($news[tematika] == 'udostoverenie') echo 'Удостоверение о рукоположении в сан '.$news[name];
echo ' № '.$news[nomer].' от '.$ddttn.'</span><br />';
if ($news[tematika] != 'udostoverenie') echo '<div style="padding-left: 25%; float:right; text-align: right; margin-top: 5px; margin-bottom: 5px"><i>'.$news[name].'</i></div><br /><br />';
echo '</div><div style="border-bottom: 1px #D7D7D7 solid; margin-top: 5px; margin-bottom: 5px">';


echo '<p>'.$text.'<br /><br /></p></div>';

?>

<?
include 'footer.php';
?>

</body>
</html>