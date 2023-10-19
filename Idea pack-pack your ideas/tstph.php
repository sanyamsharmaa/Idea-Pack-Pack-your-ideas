<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<button type="submit" class="btn btn-warning " name="edtbtn">Check</button>

<?php
$rslt=$_POST['edtbtn'];
if (isset($rslt)) {
  
    echo '  <p>Check button is clicked</p>';
}
else{
    echo '011';
}
?>
   

</body>
</html>