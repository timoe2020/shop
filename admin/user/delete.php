<?php
    include "../../public/common/dbconfig.inc.php";
    $id=$_GET['id'];
    if(mysqli_query($conn,"DELETE FROM userdata WHERE id='{$id}'"))
    {
        echo"删除成功<br>";
        echo"<a href='index.php'>点击返回主界面</a>";
    }
    else{
        echo "something wrong happened";
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

?>
