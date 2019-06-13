
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
            font-size:1.1em;
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
                padding:20px 10px;
                margin:20px auto 50px auto;
                max-width:400px;
                background:#fff;
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
    </style>

    <title>Add Items</title>
    <?php
        require "./config/dbconfig.php";

        $queries = array();
        parse_str($_SERVER["QUERY_STRING"],$queries);

        if($_SERVER["REQUEST_METHOD"] == "GET" && $queries["food"]){
           $result = getFoodItem($queries["food"]);
           $row = $result->fetch_assoc();
        }
    ?>
</head>

<body>
<a href="dashboard.php"><button id="admin">Dashboard</button></a>
<h1>Edit Item</h1>
    <form action="./forms/updateItem.php"  method="post" enctype="multipart/form-data">
        <label for="item">Food Item</label>
        <input type="text" name="item" id="item" value=<?php echo $row["name"] ?> placeholder="Enter food item">
        <br>
        <label for="item">Picture</label>
        <input type="file" name="item" id="item" placeholder="Enter food item">
        <br>
        <label for="price"> Price</label>
        <input type="number" name="price" value=<?php echo $row["price"] ?> id="price">
        <br> <br>
        <button type="submit">Update</button>
    </form>
</body>
</html>