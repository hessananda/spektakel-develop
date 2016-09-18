<?php
$button = "kosong";
isset($_POST['submit'])? $button = $_POST['submit'] : "";

isset($_POST['pratinjau'])? $button = $_POST['pratinjau'] : "";

isset($_POST['simpan'])? $button = $_POST['simpan'] : "";

if ($button=='submit') {
	require_once('controller/event_save.php');
	echo $button;
}
elseif ($button=='pratinjau') {
	require_once('controller/event_draft_save.php');
	echo $button;
}
elseif ($button=='simpan') {
	require_once('controller/event_draft_save.php');
	echo $button;
}


?>