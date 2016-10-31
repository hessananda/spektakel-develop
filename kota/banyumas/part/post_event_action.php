<?php

include("../config/koneksi.php");  
include "../config/file_action.php";   

$now = date("Y-m-d H:i:s");

session_start();

$menu = $_GET['menu'];

if (isset($_REQUEST['id'])) {
	$id=$_REQUEST['id'];
}

$button = "kosong";
isset($_POST['submit'])? $button = $_POST['submit'] : "";
isset($_POST['simpan'])? $button = $_POST['simpan'] : "";

if ($menu=='post') {
	if ($button=='submit') {
		require_once('controller/event_save.php');
?>
		<script type="text/javascript">			
			window.location.href = '../author_post.php?tab=ditinjau&id=<?php echo $_SESSION['userid'] ?>';
			alert("Data Berhasil Disubmit !");
		</script>
<?php			
	}
	elseif ($button=='simpan') {
		require_once('controller/event_draft_save.php');
?>
		<script type="text/javascript">			
			window.location.href = '../author_post.php?tab=draft&id=<?php echo $_SESSION['userid'] ?>';
			alert("Data Berhasil Disimpan !");
		</script>
<?php			
	}
	
}
elseif ($menu=='edit_draft') {
	if ($button=='submit') {
		require_once('controller/event_draft_update.php');
		require_once('controller/convert_to_event.php');
?>
		<script type="text/javascript">			
			window.location.href = '../author_post.php?tab=ditinjau&id=<?php echo $_SESSION['userid'] ?>';
			alert("Data Berhasil Disubmit !");
		</script>
<?php			
		
	}
	elseif ($button=='simpan') {
		require_once('controller/event_draft_update.php');
?>
		<script type="text/javascript">			
			window.location.href = '../post_event_draft_edit.php?id=<?php echo $id ?>';
			alert("Data Berhasil Diubah !");
		</script>
<?php		
	}
}
elseif ($menu=='edit') {

	require_once('controller/event_update.php');
?>
		<script type="text/javascript">			
			window.location.href = '../post_event_edit.php?id=<?php echo $id ?>';
			alert("Data Berhasil Diubah !");
		</script>
<?php		
	
}














// elseif ($action=='hapus') {

// 		delete_file('event_image','event','content/upload/2015/12','event_id',$id)	;	
// 		mysql_query("DELETE FROM event  WHERE event_id = '$id' ");
// 		echo mysql_error();

// 		header("location:../profil.php");
// }

// else
// {
// 	echo "disitu kadang saya merasa sedih";
// }

?>