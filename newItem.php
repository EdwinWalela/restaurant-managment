
<!DOCTYPE html>
<html>
<head>
    <title>Add Item</title>
    <link rel="stylesheet" href="./static/style.css">
</head>

<body>
    <a href="index.php"><button id="admin">Menu</button></a>
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
        <button class="orange-btn" type="submit">Save</button>
    </form>
</body>
</html>