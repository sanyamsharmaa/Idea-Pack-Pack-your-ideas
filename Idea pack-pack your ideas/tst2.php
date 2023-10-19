

<?php
// INSERT INTO `tskstbl` (`Title`, `Dsptn`) VALUES (ABS('Tasks'), 'To prepare for sih presentation');
// INSERT INTO `tskstbl` (`Title`, `Dsptn`) VALUES ('Tasks', 'Google map bootacamp and hackathon');
$server="localhost";
$username="root";
$password="";

$cntn=mysqli_connect($server,$username,$password);
if(!$cntn){
    die("conntection failed coz-".
    mysqli_connect_error());
}
else{
echo "connected successfully<br>";
}
$cntn->query('USE ipdb');
$fchq="SELECT * FROM tskstbl WHERE tno=29";
$rslt= mysqli_query($cntn,$fchq);
if($rslt){
    $row = mysqli_fetch_assoc($rslt);
    echo 'Deleting--'.$row['Dsptn'];
}
else{
    echo mysqli_error($cntn);
}
// echo $rslt['Dsptn'];
$sql="DELETE FROM tskstbl WHERE tno=32";
// $rdrt='/PHP%20Programs/Idea%20pack-pack%20your%20ideas/tasks.php';
$rslt2= mysqli_query($cntn,$sql);
if($rslt2){
    $row = mysqli_fetch_assoc($rslt2);
    echo '<br>result--'.$row['Dsptn'];
}
else{
    echo mysqli_error($cntn);
}
if($cntn->query($sql)==TRUE){
    echo '<br>command executed successfully';
    // header('Location:'.$rdrt);

}
else{
    echo "Error due to $cntn->error";
}

$cntn->close();
?>