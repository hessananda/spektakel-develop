<?php
include "../config/koneksi.php";

$status=""; // set variable status
$action=""; // set variable status
$now = date("Y-m-d H:i:s");

if (isset($_REQUEST['status'])) {
  $status = $_REQUEST['status'];
}

if (isset($_REQUEST['action'])) {
  $action = $_REQUEST['action'];
}

if ($status=="registered") {
      
      $username = '';
      $email = '';
      $password = '';
      $password_welcome = '';
      $password_final = '';
      
      if (isset($_REQUEST['email'])) {
        $email = $_REQUEST['email'];
      }

      if (isset($_REQUEST['password'])) {
        $password = $_REQUEST['password'];
        $password_final = md5($password) ;
      }

      if (isset($_REQUEST['password_welcome'])) {        
        $password_final = $_REQUEST['password_welcome']; ;
      }

      if (isset($_REQUEST['username'])) {
        $username = $_REQUEST['username'];
      }      

      $query = "SELECT * FROM member WHERE (username = '$username' OR email = '$email') AND password = '$password_final' AND status = '1' ";

      $login = mysqli_query($con,$query);
      $ketemu = mysqli_num_rows($login);
      $r = mysqli_fetch_array($login);      

      if ($ketemu > 0){
        session_start();

        $_SESSION['userid']       = $r['id'];
        $_SESSION['username']     = $r['email'];
        $_SESSION['full_name']    = $r['full_name'];
        $_SESSION['password']     = $r['password'];

        if(isset($_POST['rememberme'])){     
          $date = date_create(date('Y-m-d H:i:s'));
          date_add($date, date_interval_create_from_date_string('1 years'));
          $_SESSION['bataswaktu'] = date_format($date, 'Y-d-m H:i:s');
          
         }else{
          $date = date_create(date('Y-m-d H:i:s'));
          date_add($date, date_interval_create_from_date_string('1 hours'));
          $_SESSION['bataswaktu'] = date_format($date, 'Y-d-m H:i:s');
          
         }

      if ($action=='') {
          header('location:../index.php');
        }
      elseif ($action=='post_event') {
        header('location:../post_event.php?');
      }
      elseif ($action=='profil') {
         header('location:../profil.php');
       } 


      }
      else{

      ?>
        <script type="text/javascript">
           alert ("Username dan Password tidak tepat");
           window.location = "../index.php";
        </script>
      <?php
      }
}
elseif ($status=="new") 
{
      $passwordmd5 = md5($_POST['password']) ;
      $registration_code = rand(1000000, 9999999);
      mysqli_query($con,"INSERT INTO member VALUES('',
                                             '$_POST[fullname]',
                                             '$_POST[email]',
                                             '$_POST[email]',
                                             '$passwordmd5',
                                             '$now',
                                             '',
                                             '',
                                             '',
                                             '',
                                             '',
                                             '',
                                             '',
                                             '',
                                             '',
                                             '',
                                             '',
                                             '',
                                             '',
                                             '',
                                             '',
                                             '',                                             
                                             '$registration_code',
                                             '',
                                             '0',
                                             ''
                                              ) ");

      echo mysqli_error($con);

      include("email_registration.php");

// if ($mail) {
//   echo "email registrasi berhasil dikirim";
// }
// else{
//   echo "email gagal dikirim";
// }
      
      header('location:../welcome_member.php?welcome');  
}

elseif ($status=="forget") 
{
      $email = '';
      if (isset($_REQUEST['email'])) {
        $email = $_REQUEST['email'];
      }

      $q1 = "SELECT email FROM member WHERE email = '$email' AND status = 0 ";      
      $q2 = "SELECT email FROM member WHERE email = '$email' AND status = 1 " ;

      $sql1 = mysqli_query($con,$q1);      
      $sql2 = mysqli_query($con,$q2);

      $ketemu1 = mysqli_num_rows($sql1);
      $ketemu2 = mysqli_num_rows($sql2);

      if ($ketemu1 < 1 AND $ketemu2 >= 1) { #jika email ketemu, user sudah aktif
        # kirim email dan alert email telah dikirim
        include('email_forget_password.php');
?>
        <script type="text/javascript">
          alert('Email Permintaan Reset Password Telah Dikirim !');
          window.location = '../index.php';
        </script>
<?php        
      }
      elseif($ketemu1 >= 1 AND $ketemu2 < 1){ #jika ketemu tapi user belum aktif
        #kasih pemberitahuan kalo kamu perlu mengaktifkan akun dengan email 
        ?>
        <script type="text/javascript">
          alert('Silahkan Konfirmasi Pendaftaran Anda, Cek Email Dari Spektakel.id');
          window.location = '../index.php';
        </script>
<?php        
      }
      elseif ($ketemu1 < 1 AND $ketemu2 < 1) { #jika tidak ada user
        ?>
        <script type="text/javascript">
          alert('Email yang Anda Masukan Belum Terdaftar');
          window.location = '../index.php';
        </script>
<?php        
      }
}

elseif ($status=='forget_password_action') {

   $password = $_POST['new_password'];
   $id = $_POST['id'];
      
    $query = mysqli_query($con,"UPDATE member SET password = md5('$password') WHERE md5(id) = '$id' ");   

    if ($query) {
         echo "berhasil ganti password" ;
      header("location:../forget_password.php?tujuan=berhasil"); 
    }
    else{
      echo "belum jalan bos" ;
      header("location:../forget_password.php?tujuan=gagal");
    } 
  
}

?>