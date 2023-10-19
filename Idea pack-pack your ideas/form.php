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

    if( isset($_POST['adbtn'])){
        echo'add button clicked <br>';
        $fid=$_POST['adbtn'];
        $fid = 'add1';
        echo "-+".gettype($fid);
        print_r($fid);
        echo "<br>->".$fid;

        if ($fid=="add1") {
            echo "A task is listing...";
            $tdtn=addslashes($_POST["tdtn"]);
            $ttl='task';
            $sql="INSERT INTO `tskstbl` (`Title`, `Dsptn`) VALUES ('$ttl', '$tdtn')";  
            $rdrt='/PHP%20Programs/Idea%20pack-pack%20your%20ideas/tasks.php';
        }
        elseif($fid=='add2'){
            $ttl='Project idea';
            $pdtn=addslashes($_POST["pdtn"]);
            $sql="INSERT INTO `tskstbl` (`Title`, `Dsptn`) VALUES ('$ttl', '$pdtn')";  
            $rdrt='/PHP%20Programs/Idea%20pack-pack%20your%20ideas/projects.php';
        }
        elseif($fid=='add3'){
            $ttl='Business idea';
            $pdtn=addslashes($_POST["bdtn"]);
            $sql="INSERT INTO `tskstbl` (`Title`, `Dsptn`) VALUES ('$ttl', '$bdtn')";  
            $rdrt='/PHP%20Programs/Idea%20pack-pack%20your%20ideas/tasks.html';
        }
        else {
            echo '<br>invalid form_id';
        }
}

elseif(isset($_POST['dltbtn'])){
        echo "delete button is clicked<br>";
        $fid=$_POST['dltbtn'];
        echo "deleting entry of tno--".$fid."<br>";
        $sql="DELETE FROM tskstbl WHERE tno=21";
        $rdrt='/PHP%20Programs/Idea%20pack-pack%20your%20ideas/tasks.php';
    } 
    
elseif(isset($_POST['edtbtn'])){
        echo "edit button is clicked<br>";
        $fid=$_POST['edtbtn'];
    // $sql="DELETE FROM `tskstbl` WHERE 'tno'=intval($_POST['$fid'])";
    }
    

    // echo 'deleting';
else{
    echo 'invalid form_id';
}

if($cntn->query($sql)==TRUE){
    echo 'command executed successfully';
    header('Location:'.$rdrt);

}
else{
    echo "Error due to $cntn->error";
}

$cntn->close();
?>

