<?php
$ClassId= $_GET['class_id'];

include "../public/common/dbconfig.inc.php";
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="public/css/reset.css">
    <style>

        #content{
            width: 100%;
            position: relative;
            overflow: auto;

        }
        .space{
            height: 50px;
        }
        .shop{
            width: 100%;
        }
        .shopclass{
            display: block;
            width: 100%;
            height: auto;
            background: #bfa;
        }
        .title{
            position: relative;
            width: 100%;
            height: 30px;
            background: transparent;
            line-height: 30px;
        }
        .member{
            width: 100%;
            position: absolute;
            right: 0;
        }
        .brand a{
            font-size: 12px;
        }
        .brand a:hover{
            color: orange;
        }
        .shopInfo a{
            display: block;
            float: left;
            width: 20%;
            height: 280px;
            background: honeydew;
            border: 2px skyblue solid;
        }
        .page{
            float: left;
            display: block;
            text-align: center;
            color: #1a2352;
            background: #bbffaa;
            width: 100%;
            height: 20px;
        }
        .page a:hover{
            color: orange;
        }

    </style>
</head>
<body>

<?php
include "public/header.php";
?>
<div class="space"></div>
<div id="content">
    <div class="shopclass">

        <div class="title">
            <div class="member">
                <?php
                $sqlBrand="select * from brand where shopclass_id={$ClassId}";
                $ResBrand=$conn->query($sqlBrand);
                while ($RowBrand=$ResBrand->fetch_assoc()) {
                    echo "<a href='#' >";
                    echo $RowBrand['name'],"&nbsp";

                    echo "</a>";
                }
                ?>
            </div>

        </div>
        <div class="shop">
            <?php
            $sqlShop="select * from shop where class_id={$ClassId}";
            $ResShop=$conn->query($sqlShop);
            $flag=0;
            while ($RowShop=$ResShop->fetch_assoc())
            {

                if($RowShop['upshelf'])
                {
                    ?>
                    <div class="shopInfo">
                        <?php
                        echo "<a href='shopinfo.php?id={$RowShop['id']}' target='_blank'>";
                        echo $RowShop['name'];
                        echo"<br>";
                        echo    $RowShop['price']."元";
                        echo "</a>";
                        ?>
                    </div>

                    <?php
                }
                $flag++;
            }
            ?>
        </div>
    </div>
    <div class="page">
        <span class="first"><a href="#">首页</a></span>
        <span class="page-line">|</span>
        <span class="last"><a href="#">上一页</a></span>
        <span class="page-line">|</span>
        <span class="next"><a href="#">下一页</a></span>
        <span class="page-line">|</span>
        <span class="end"><a href="#">尾页</a></span>
    </div>
</div>


</div>
<?php
include "public/footer.php";
?>

</body>
</html>
