
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
        body{
            background: rgb(245,245,245);
        }
        a{
            color: #bbb3b3;
        }
        .space{
            height: 40px;
        }
        #content{

        }
        .function-name{
            height: 30px;
            width: 100%;
            background: #0f100f;

        }
        table{
            width: 60%;
            display: inline-block;
            background: white;
            text-align: center;
            margin: 20px 20%;
        }
        .table-title{
            height: 30px;
        }
        table td{
            border-bottom: 1px solid #d7d7d7;
            width: 200px;
            height: 30px;
            padding: 15px;

        }
        table tr{
            width: 100%;
            /*height: 50px;*/
        }
        table a:hover{
            color: #0C7CCB;
        }
        .commit{
            width: 98%;
            height: 200px;
        }
        .view{
            margin: 10px 0;
            padding: 10px;
            border-top: #CEE2F5 dashed 2px;
        }
        .view-title{

            height: 20px;
            width: 59%;
            margin: 0 20%;
            /*background: #bfa;*/
            border: 1px dashed #d1d1ee;
            color: black;
        }
        .commit-time{
            float: right;
        }
        .commit-content{

            width: 59%;
            margin: 0 20%;
            height: 50px;
            border: 1px dashed #d1d1ee;
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
<div class="space"></div>

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
            <td>操作</td>
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
            <span>&nbsp</span>
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
