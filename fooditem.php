
<!DOCTYPE html>
<html>
<head>
<style>
    *{
        font-family:sans-serif;
        cursor:pointer;
    }
    #admin{
        margin:10px;
        float:right;
        width:150px;
        padding:10px;
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
    <title>Add Item</title>
</head>

<body>
<a href="menu.php"><button id="admin">Menu</button></a>
<a href="dashboard.php"><button id="admin">Dashboard</button></a>
<h1>Add New Food Item</h1>
    <form action="./forms/newFoodItem.php"  method="post" enctype="multipart/form-data">
        <label for="item">Food Item</label>
        <input type="text" name="item" id="item" placeholder="Enter food item">
        <br>
        <label for="item">Picture</label>
        <input type="file" name="item" id="item" placeholder="Enter food item">
        <br>
        <label for="price"> Price</label>
        <input type="number" name="price" id="price">
        <br> <br>
        <button type="submit">Save</button>
    </form>
</body>
</html>