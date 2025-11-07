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
<title>Контакты</title>

</head>
<body>

<?
include 'golova.php';

include 'menu.php';
include 'content.php';

?>

<h1>Контакты</h1>

<p><span class="title"><b>Барышское епархиальное управление</b></span></p>
<p><b>Адрес:</b> 433750, Ульяновская область, г.Барыш, пер. Пушкина, д.26.</p>
<p><b>Телефон/факс:</b> 8 (84253) 2-26-26.</p>
<p><b>E-mail:</b> <a href="mailto:upravlenie@barysh-eparhia.ru">upravlenie@barysh-eparhia.ru</a>.</p>
<p><b>Секретарь управления:</b> иерей Сергий Жидков.</p>
<p><b>Телефон:</b> 8-937-036-12-10.</p><br />
<p><span class="title"><b>Дни приема правящим архиереем</b></span></p>
<p><b>Вторник</b> - с 10:00 до 14:00</p>
<p><b>Среда</b> - с 10:00 до 14:00</p>
<p><b>Четверг</b> - с 10:00 до 14:00</p>
<p>Прием осуществляется по адресу: г.Барыш, пер. Пушкина, д.26.</p>
<br />
<p><span class="title"><b>Пресс-служба епархии</b></span></p>
<p><b>Пресс-секретарь:</b> иеромонах Даниил (Селеверстов). 
<p><b>Телефон:</b> 8-937-036-02-50.</p>
<p><b>E-mail:</b> <a href="mailto:info@barysh-eparhia.ru">info@barysh-eparhia.ru</a>.</p>
<br />
<p><span class="title"><b>Епархиальный склад</b></span></p>
<p><b>E-mail:</b> <a href="mailto:sklad@barysh-eparhia.ru">sklad@barysh-eparhia.ru</a>.</p>
<br />
<hr />
<p><span class="title"><b>Наши баннеры</b></span></p>
<table align="left" cellpadding="5" cellspacing="0" border="0" style="margin-left: 15px">
<tr><td>
<img src="http://barysh-eparhia.ru/IMG/banner.png" /><br />
<p><span style="font-size:12px;">(164х63 px)</span></p>
<TEXTAREA COLS=30 ROWS=10><a href='http://barysh-eparhia.ru/' target=_blank><img src='http://barysh-eparhia.ru/IMG/banner.png' width=164 height=63 title="Барышская епархия" alt='Барышская епархия'></a>
</TEXTAREA>
</td><td>
</td></tr>
</table>

<table align="left" cellpadding="5" cellspacing="0" border="0" style="margin-left: 15px">
<tr><td>
<img src="http://barysh-eparhia.ru/IMG/banner_mini.png" /><br />
<p><span style="font-size:12px;">(88x34 px)</span></p>
<TEXTAREA COLS=30 ROWS=10><a href='http://barysh-eparhia.ru/' target=_blank><img src='http://barysh-eparhia.ru/IMG/banner_mini.png' width=88 height=34 title="Барышская епархия" alt='Барышская епархия'></a>
</a>
</TEXTAREA>
</td><td>
</td></tr>
</table>


<?
include 'footer.php';
?>

</body>
</html>