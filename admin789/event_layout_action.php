<?php

include "config/koneksi.php";
include ('config/fungsi_thumb.php');
session_start();

$master = 'event_layout' ;
$now = date("Y-m-d H:i:s");
$action = $_GET['action'];

if ($action=='hapus')
{

	header("location:event_layout_view.php");
				
}

elseif ($action=='edit')
{
	$id=$_GET['id'];
	$memberUpSelect = "UPDATE event_layout SET ".$master.'_event_id'." = '$_POST[event_layout_event_id]',
					   					   ".$master.'_user_yang_edit'." = '$_SESSION[user_id]'
					   WHERE ".$master.'_id'." = '$id' ";

	mysql_query($memberUpSelect);

	echo mysql_error();

	header("location:event_layout_view.php");

}

elseif ($action=='input')
{
}

else
{
	echo "disitu kadang saya merasa sedih";
}


?>