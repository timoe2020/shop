<?php
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
        #up-adv{
            height: 500px;
            width: 100%;
            background-image: url("public/images/slide1.png");
        }
        #content{
            width: 100%;
            position: relative;

        }
        .shopclass{
            width: 100%;
            height: 320px;
            background: #bfa;
        }
        .title{
            position: relative;
            width: 100%;
            height: 30px;
            background: #3683BC;
            line-height: 30px;
        }
        .member{
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
            width: 18%;
            height: 280px;
            background: honeydew;
            border: 2px skyblue solid;
        }
        .more:hover{
            color: orange;
        }
        #down-adv{
            height: 500px;
            width: 100%;
            background-image: url("public/images/slide1.png");
        }



    </style>
</head>
<body>

    <?php
        include "public/header.php";
    ?>
    <div id="up-adv"></div>
    <div id="content">
        <?php
            $sqlClass="select * from shopclass";
            $ResClass=$conn->query($sqlClass);
            $ClassFlag=0;
            while ($RowClass=$ResClass->fetch_assoc())
            {?>

        <div class='shopclass' id='<?php echo $ClassFlag?>'>
            <div class='title'>
                <span class='class'>
                    <?php echo $RowClass['name']?>
                </span class='class'>
                    <span class="member">
                        <span class="brand" >
                            <?php
                            $sqlBrand="select * from brand where shopclass_id={$RowClass['id']}";
                            $ResBrand=$conn->query($sqlBrand);
                            while ($RowBrand=$ResBrand->fetch_assoc()) {
                                echo "<a href='#{$ClassFlag}' >";
                                echo $RowBrand['name'],"&nbsp";
                                echo "</a>";
                            }
                            ?>
                        </span>

                        <span><a class="more" href="brandlist.php?class_id=<?php echo $RowClass['id']?>">more</a></span>
                    </span>
            </div>
            <div class="shop">
                <?php
                $sqlShop="select * from shop where class_id={$RowClass['id']}";
                $ResShop=$conn->query($sqlShop);
                $flag=0;
                while ($RowShop=$ResShop->fetch_assoc())
                {
                    if($flag>=5)
                    {
                        continue;
                    }
                    if($RowShop['upshelf'])
                    {
                    ?>
                <div class="shopInfo">
<!--                    --><?php
                        echo "<a href='shopinfo.php?id={$RowShop['id']}' target='_blank'>";
                        echo $RowShop['name'];
                        echo "</a>";
//                    ?>
                </div>

                <?php
                    }
                    $flag++;

                }
                ?>
            </div>
        </div>
                    <?php
                $ClassFlag++;
            }

        ?>
    </div>
    <div id="down-adv">
    </div>
    <?php
    include "public/footer.php";
    ?>
</body>
</html>
