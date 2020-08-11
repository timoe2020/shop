<?php
session_start();
include "../public/common/dbconfig.inc.php";
$sqlUser="select * from userdata where username='{$_SESSION['username']}'";
$ResUser=$conn->query($sqlUser);
$RowUser=$ResUser->fetch_assoc();
$user_id= $RowUser['id'];
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>订单结算页</title>
    <style>
        body {
            font: 12px/150% tahoma,arial,Microsoft YaHei,Hiragino Sans GB,"\u5b8b\u4f53",sans-serif;
            -webkit-font-smoothing: antialiased;
            color: #666;
            background: #fff;
        }
        a{
            text-decoration: none;
            color: blue;
            font-size: 12px;
        }
        .check-title{
            margin: 12px 18%;
        }
        .content{
            display: block;
            overflow: hidden;
            border:1px solid lightgray;
            width: 64%;
            margin: 0 auto;
        }
        .box{
            display: block;
            margin: 20px;
            border-bottom: lightgray 1px solid;
            /*background: #0C7CCB;*/
            overflow: hidden;

        }
        .info-box{
            margin: 10px 30px;
        }
        .add{
            float: right;
        }
        .pay{
            height: 100px;
        }
        .PayCheck{
            margin: 0 20px;
        }
        .PayCheck span{
            float: left;
            text-align: center;
            margin: 10px 5px;

        }

        .PayCheck .online{
            display: block;
            border: 2px red solid;
            padding: 4px 19px;

        }
        .PayCheck .offline{
            display: block;
            border: 1px rgba(102, 102, 102, 0.51) solid;
            color: rgba(102, 102, 102, 0.51);
            padding: 5px 20px;
            background: lightgray;
        }
        .PayCheck a{
            display: block;
            float: left;
            color: #666;
            margin: 5px 5px;

        }
        .ShopList-box{
            background: rgba(102, 102, 102, 0.04);
            display: block;
            overflow: hidden;
        }
        .PostWay{
            padding: 21px;
            position: relative;
            display: block;
            float: left;
            width: 31%;

        }
        .list{
            position: relative;
            padding: 20px;
            float: left;
            width: 60%;
            background: rgba(135, 206, 250, 0.18);
        }


        .ShopList tr{
            height: 50px;
        }

        .SubmitOrder{
            height: 50px;
            width: 100%;
            background: rgba(102, 102, 102, 0.04);
            padding: 20px;
            border-top: 1px lightgray solid;

        }
        .account{
            float: right;
            font-size: 20px;
            line-height: 30px;
            color: red;
            margin: 0 40px;
        }
        .input{
            display: block;
            float: right;
            padding: 3px 20px 20px 20px;

        }
        .input button{

            width: 160px;
            height: 40px;
            background: red;
            color: white;
            font-size: 20px;
            font-weight: bold;
        }
        b{
            color: red;
            font-size: 20px;
        }

    </style>
</head>
<body>
    <header>
        <?php
        include "public/header.php";
        ?>
    </header>
    <main>
        <div class="check-title">填写并核对订单信息</div>
        <div class="content">
            <form action="OrderSubmit.php" method="post">
            <div class="info box">
                <div class="title">
                    <span class="accept-info"><b>收货人信息</b></span>
                    <span class="add"><a href="user/AddInfo.php">新增收货地址</a></span>
                </div>
                <div class="info-check">
                    <table class="info-box">
                        <tr>
                            <td>选择</td>
                            <td>姓名</td>
                            <td>地址</td>
                            <td>电话</td>
                            <td>修改</td>
                            <td>删除</td>
                        </tr>
                        <?php
                        $sqlInfo="select * from relation where user_id='{$user_id}'";
                        $ResInfo=$conn->query($sqlInfo);

                        $i=1;
                        while ($RowInfo=$ResInfo->fetch_assoc())
                        {
                            echo"<tr>";
                            if($i==1)
                            {
                                echo "<td>"."<input type='radio' name='relation_id' value='{$RowInfo['id']}' checked>"."</td>";
                                $i++;
                            }
                            else{
                                echo "<td>"."<input type='radio' name='relation_id' value='{$RowInfo['id']}'>"."</td>";
                            }

                            echo "<td>{$RowInfo['realname']}</td>";
                            echo "<td>{$RowInfo['address']}</td>";
                            echo "<td>{$RowInfo['telephone']}</td>";
                            echo "<td><a href='user/EditInfo.php?id={$RowInfo['id']}'>修改</a></td>";
                            echo "<td><a href='user/DelInfo.php?id={$RowInfo['id']}'>删除</a></td>";
                            echo "</tr>";
                        }
                        ?>

                    </table>

                </div>
            </div>
            <div class="pay box">
                <div class="title"><b>支付方式</b></div>
                <div class="PayCheck">
                    <span class="offline way">货到付款</span>
                    <span class="online way">在线支付</span>
                    <span><a href="#">更多>></a></span>
                </div>
            </div>
            <div class=" box">
                <div class="title"><b>送货清单</b></div>
                <div class="ShopList-box">
                <div class="PostWay">配送方式</div>
                <div class="list">
                    <div class="store">商家：xx自营</div>
                    <div class="ShopList">
                        <table>
                            <tr class="table-title">
                                <td>商品</td>
                                <td>价格</td>
                                <td>数量</td>
                                <td>合计</td>

                            </tr>
                            <?php
                            $sqlCart="select * from cart where user_id='{$user_id}' ";
                            $ResCart=$conn->query($sqlCart);
                            $i=0;
                            $SumCount=0;
                            while ($RowCart=$ResCart->fetch_assoc())
                            {
                                $shop_id[$i++]=$RowCart['shop_id'];
                                $count_all=array_count_values($shop_id);
                                $count=count($count_all);
                                $key=array_keys($count_all);

                            }
                            for($i=0;$i<$count;$i++)
                            {
                                $sqlShop = "select * from shop where id='{$key[$i]}' order by id";
                                $ResShop = $conn->query($sqlShop);
                                $RowShop = $ResShop->fetch_assoc();
                                $num=$count_all[$key[$i]];
                                //根据商品id找商品的库存
                                $stock=$RowShop['stock'];
                                //判断是否超过库存
                                if($num>=$stock)
                                {
                                    $sum=$RowShop['price']*$count_all[$key[$i]];
                                    $SumCount=$SumCount+$sum;
                                    echo "<tr>";
                                    echo "<td>{$RowShop['name']}</td>";
                                    echo "<td>{$RowShop['price']}</td>";
                                    echo "<td>{$num}</td>";

                                    echo "<td>{$sum}</td>";
                                    echo "<tr>";
                                }
                                else{
                                    $sum=$RowShop['price']*$count_all[$key[$i]];
                                    $SumCount=$SumCount+$sum;
                                    echo "<tr>";
                                    echo "<td>{$RowShop['name']}</td>";
                                    echo "<td>{$RowShop['price']}</td>";
                                    echo "<td>{$num}</td>";

                                    echo "<td>{$sum}</td>";
                                    echo "<tr>";
                                }
                            }
                            ?>
                            <tr>
                                <td>总金额</td>
                                <td><?php echo $SumCount?> </td>
                            </tr>
                        </table>

                    </div>

                </div>

                </div>
                <div class="SubmitOrder">
                    <div class="account">
                        <span>应付金额：￥</span>
                        <span><?php echo $SumCount?></span>
                    </div>
                </div>
                <div class="input">
                    <?php
                    if (mysqli_num_rows($ResInfo) > 0)
                    {
                        echo"<button type='submit' >提交订单</button>";
                    }
                    else{
                        echo "<b>请先填写收货人信息</b>";
                    }
                    ?>

                </div>

            </div>

            </form>
        </div>

    </main>
    <footer>
        <?php
        include "public/footer.php";
        ?>
    </footer>

</body>
</html>
