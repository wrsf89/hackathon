<?php 

include "db.php";

if(isset($_POST['number'])){

   $name = $_POST['number'];

   $query ="INSERT INTO carnum (data) VALUES ('$name');";  

   if(mysqli_query($dbh, $query))
   {
        echo "<script>alert('데이터 전송 완료'); </script>";
   }else{

        echo "<script>alert('데이터 전송 실패'); </script>";
   }


}else{

   echo("nothing");

}



 ?>