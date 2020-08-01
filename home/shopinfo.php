
<?php
session_start();
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
            background: skyblue;
        }
        .function-name{
            height: 30px;
            width: 100%;
            background: #bfa;

        }
        table{
            width: 600px;
            /*height: 200px;*/
            align-content: center;
            text-align: center;
            margin: 0 auto;
        }
        .table-title{
            height: 30px;
        }
        table td{
            border: 8px solid powderblue;
        }
        table tr{
            height: 100px;
        }
        table a:hover{
            color: #0C7CCB;
        }
        .commit{
            width: 98%;
            height: 200px;
        }
        .view-title{
            height: 20px;
            width: 100%;
            background: #bfa;
        }
        .commit-time{
            float: right;
        }
        .commit-content{
            background: #CEE2F5;
            width: 100%;
            height: 20px;
        }
        a:hover{
            color: orange;
        }

    </style>
</head>
<body>

<?php
include "public/header.php";
?>

<div id="content">

    <div class="function-name">
        <?php
        $sqlShop="select * from shop where id={$_GET['id']}";
        $ResShop=$conn->query($sqlShop);
        $RowShop=$ResShop->fetch_assoc()
        ?>
        <a  href="index.php">首页</a>>><?php echo"{$RowShop['name']}"?>详情:
    </div>
    <div>
    <table>
        <tr class="table-title">
            <td>图片</td>
            <td>价格</td>
            <td>库存</td>
            <td>加入购物车</td>
        </tr>


    </div>
    <?php
            echo"<tr>";
            echo "<td>{$RowShop['name']}</td>";
            echo "<td>{$RowShop['price']}</td>";
            echo "<td>{$RowShop['stock']}</td>";
            echo "<td><a href='cart/addcart.php?shop_id={$RowShop['id']}'>加入购物车</a></td>";
            echo"</tr>";

    ?>
    </table>

    <?php
    if(!$_SESSION['login'])
    {
        echo "去<a href='login/login.php'>登陆</a>后评论";
    }
    else{
    ?>
    <div>
        <div class="function-name">商品评论</div>
        <div class="comment-content">
            <form method="post" action="ShopCommit.php">
                <input name="shop_id" type="hidden" value=<?php echo $RowShop['id']?>>
                <textarea name="commit" class="commit">
                </textarea>
                <input type="submit" value="发表评论">
            </form>
        </div>
        <div class="view">
            <?php
            //找出当前商品id的评论
            $sqlCommit="select * from commit where shop_id='{$RowShop['id']}'";
            $ResCommit=$conn->query($sqlCommit);

            while($RowCommit=$ResCommit->fetch_assoc())
            {
                echo"<div class='view-title'>";
                //根据用户id找出用户名
                $sqlUser="select * from userdata where id={$RowCommit['user_id']}";
                $ResUser=$conn->query($sqlUser);
                $RowUser=$ResUser->fetch_assoc();
                echo "<span class='commit-user'>评论用户：{$RowUser['username']}</span>";
                echo "<span class='commit-time'>评论时间：";
                echo date("Y-m-d",$RowCommit['time']);
                echo"</span>";
                echo"</div>";
                echo "<div class='commit-content'>{$RowCommit['content']}</div>";

            }
            ?>



        </div>
    </div>
    <?php
    }
    ?>

</div>

</div>
<?php
include "public/footer.php";
?>
</body>
</html>
