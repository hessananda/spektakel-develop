<?php
//ACTION FILE
class action {
    
    //upload semua jenis file tanpa batasan atau filtering
    function upload_file($lokasi,$nama_file){

            global $nama_final;

            $loc=$_FILES["$nama_file"]['tmp_name'];
            $acak = rand(10000,99999);
            $nama = $_FILES["$nama_file"]['name'];
            $nama_final = $acak.$nama;
            $path="$lokasi/".$nama_final;
            move_uploaded_file($loc,$path);

    }

    function delete_file($column,$table,$lokasi,$primary,$id){
            global $sqlfetchhapus;
            $sqlfetchhapus = mysql_fetch_assoc(mysql_query("SELECT $column from $table WHERE ".$primary." = '$id' "));	
            unlink("$lokasi/$sqlfetchhapus[$column]");
    }

}