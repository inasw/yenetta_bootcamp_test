<?php
session_start();
require_once "Database/Database.php";
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
    <title>CRUD Operation</title>
   
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
        <h1>List of products</h1>
        <h2>Hello <?php echo $username ?></h2>
    </div>
    <div class="table-product">
        <table>
            <tr>
                <th scope="col">Order</th>
                <th scope="col">ID:Product</th>
                <th scope="col">List</th>
                <th scope="col">Amount</th>
                <th scope="col">Price</th>
                <th scope="col">Description</th>
                <th scope="col">Modify</th>
                <th scope="col">Delete</th>
            </tr>
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
                        
                        <td class="modify"><a name="edit" id="" class="bfix" href="fix.php?id=<?php echo $row['id'] ?>&message=<?php echo $row['proname'] ?>&amount=<?php echo $row['amount']; ?> &price=<?php echo $row['price']; ?>&description=<?php echo $row['description']; ?> " role="button">
                                Modify
                            </a></td>
                        <td class="delete"><a name="id" id="" class="bdelete" href="main/delete.php?id=<?php echo $row['id'] ?>" role="button">
                                Delete
                            </a></td>
                    </tr>
                <?php
                    $idpro++;
                } ?>
            </tbody>
        </table>
        <br>
        <a name="" id="" class="Addlist" style="float:right" href="addlist.php" role="button">Add list</a>
    </div>
    <?php
    mysqli_close($conn);
    ?>
    
</body>

</html>