<?php
session_start();
include("Database/Database.php");
if ($_SESSION['username'] == null) {
    echo "<script>alert('Please login.');</script>";
    header("Refresh:0 , url=index.html");
    exit();
}
$username = $_SESSION['username'];
$sql_fetch_todos = "SELECT * FROM product ORDER BY id ASC";
$query = mysqli_query($conn, $sql_fetch_todos);

?>
<!doctype html>
<html lang="en">

<head>
    <title>Modify Page</title>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="dp.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@400;500;600;700&display=swap" rel="stylesheet">  

    <link rel="stylesheet" href="style.css">
    
</head>
<body>
    <div class="header">
        <p>Product Management System 2023</p>
        <a name="" id="" class="button-logout" href="logout.php" role="button">Log out</a>
    </div>
    <div class="headings">
        <h1>Update your products</h1>
        <h2>Hello <?php echo $username ?></h2>
    </div>
    <div class="table-product">
        <table class="table">
            <thead class="thead-dark">
                <tr>
                <th scope="col">Order</th>
                <th scope="col">ID:Product</th>
                <th scope="col">List</th>
                <th scope="col">Amount</th>
                <th scope="col">Price</th>
                <th scope="col">Description</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $idpro = 1;
                while ($row = mysqli_fetch_array($query)) { ?>
                    <tr>
                        <td scope="row"><?php echo $idpro ?></td>
                        <td><?php echo $row['id'] ?></td>
                        <td><?php echo $row['proname'] ?></td>
                        <td><?php echo $row['amount'] ?></td>
                        <td><?php echo $row['price'] ?></td>
                        <td><?php echo $row['description'] ?></td>
                    </tr>
                <?php
                    $idpro++;
                } ?>
            </tbody>
        </table>
        <br>
    </div>
    <div class="fixproduct">
        <form method="POST" action="main/fix.php">
            <div class="form-group">
                <label for="">List product : </label>
                <br>
                <input type="text" class="form-control" name="name" value="<?php echo $_GET['message']; ?>" required>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Amount : </label>
                <br>
                <input type="text" value="<?php echo $_GET['amount'] ?>" class="form-control" name="value" required>
                <input type="hidden" value="<?php echo $_GET['id'] ?>" name="id" />
            </div>
            <br>
            <div class="form-group">
                <label for="price">Price:</label>
                <br>
                <input type="text" value="<?php echo $_GET['price'] ?>" class="form-control" name="price" required>
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <br>
                <textarea class="form-control" name="description" rows="4" required><?php echo $_GET['description'] ?></textarea>
            </div>
            <br>
            <div class="form-button">
                <button type="submit" class="modifybtn" style="float:right">Modify</button>
                <a name="" id="" class="return" href="list.php" role="button" style="float:left">Return</a>
            </div>
        </form>
    </div>
    <?php
    mysqli_close($conn);
    ?>
</body>
</html>