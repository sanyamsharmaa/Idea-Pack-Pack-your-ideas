<?php
$server="localhost";
$username="root";
$password="";

$cntn=mysqli_connect($server,$username,$password);
if(!$cntn){
    die('not connected'.mysqli_connect_error());    
}
else{
    $cntn->query('USE ipdb');
    }

$fchq="SELECT * FROM tskstbl WHERE Title = 'task'";
if($cntn->query($fchq)==TRUE){
    $rslt= mysqli_query($cntn,$fchq);
    $sz = mysqli_num_rows($rslt)-1;
    // echo 'size-'.$sz.'*';
    mysqli_data_seek($rslt, $sz);
    // $sz-=1;
}
else{
    echo "Error due to $cntn->error";
}
// print_r($rslt);  //print value and type both
while( $sz>=0 && $tro=mysqli_fetch_assoc($rslt)){  // mysqli_fetch_($rslt)- wrap a each row in array and traverse all the rows of table
    $li='<li class="list-group-item d-flex p-1 justify-content-between align-items-center fs-5 ">
    <div>'.$tro['Dsptn'].'</div>
    <div><form action="form.php" method="post">
            <input type="hidden" name="edtbtn" id="edtbtn" value="%d">
            <input type="hidden" name="dltbtn" id="dltbtn" value="%d">
            <button type="submit" class="btn btn-warning " name="edtbtn">Edit</button>
            <button type="submit" class="btn btn-danger ml-2" name="dltbtn">Remove</button></form>
    </div>
  </li>';
  echo sprintf($li,intval($tro['tno']),intval($tro['tno']));
  echo intval($tro['tno']);
  $sz--;
  if($sz>=0){
      mysqli_data_seek($rslt, $sz);
  }
}
?>