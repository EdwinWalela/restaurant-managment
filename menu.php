
<!DOCTYPE html>
<html>
<head>
<style>
    *{
        font-family:sans-serif;
        cursor:pointer;
    }
    #admin{
        float:right;
        width:150px;
        padding:15px;
        border:none;
        background:#fff;
        color:tomato;
    }
        h1{
            margin-top:2em;
            color:#fff;
            text-align:center;
        }
        body{
            padding:50px 10px;
            text-align:center;
            background:tomato;
        }
        select{
            font-size:1.2em;
            padding:10px;
            margin:30px 0;
            width:200px;
        }
        form{
            border-radius:5px;
            box-shadow:0px 20px 10px rgba(0,0,0,0.3);
            padding:50px 10px;
            margin:20px auto 50px auto;
            max-width:400px;
           background:#fff;
            height:300px;
        }
        input{
            font-size:1.2em;
            padding:10px;
            margin:30px 0;
            width:160px;
            
        }
        label{
            width:100px;
            font-size:1.2em;
            color:#000;
            margin:10px 30px;
        }
        button{
            width:200px;
            padding:15px;
            border:none;
            background:#fff;
            color:tomato;
            text-decoration:underline;
            transition:all linear .3s .3s;
        }
        button:hover{
            transition:all linear .3s .1s;
            background:tomato;
            color:#fff;
            text-decoration:none;
        }
        .menu-card{
            border-radius:10px;
            background:#fff;
            padding:20px;
            margin:20px;
            width:200px;
            height:200px;
            display:inline-block;
            transition:all linear .3s;
        }
        .menu-card:hover{
            transition:all linear .3s;
            transform:scale(1.07);
        }
        .menu-card img{
            height:100px;
            width:100px;
        }
</style>
    <title>Pizza Menu</title>
</head>

<body>
<a href="fooditem.php"><button id="admin">Admin</button></a>
<h1>Our Menu</h1>
    <?php
        require "./config/dbconfig.php";
        $result = getMenu();
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo "<div class='menu-card'>";
            echo "<img src='./".$row["pic"]."'/>";
            echo "<p>".$row["name"]."</p>";
            echo "<h3>Ksh. ".$row["price"]."</h3>";
            echo "</div>";
        }
    ?>
<h1>Order Now </h1>
    <form action="result.php"  method="post">
        <label for="item">Food Item</label>
        <select name="item" id="item">
        <?php
            $result = getMenu();
            // output data of each row
            while($row = $result->fetch_assoc()) {
                print_r($row);
                echo "<option value='" .$row['name']. "'>".$row["name"]."</option>";
            }
        ?>
        </select>
        <br>
        <label for="quantity"> Quantity</label>
        <input type="number" name="quantity" id="quantity" value=1>
        <br> <br>
        <button type="submit">Order Now</button>
    </form>
</body>
</html>