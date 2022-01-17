<?php
require_once('server.php');
if (isset($conn)) {
    $list = $conn->query("SELECT product_id, product_name, type FROM products");
    $list->setFetchMode(PDO::FETCH_OBJ);
    $datas = $list->fetchAll();
} else {die();}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>
<body>

<div class="text-center">
    <h1 class="font-weight-bold">List products</h1>
</div>
<form action="search.php" method="post" class="form-inline">
    <label for="search">Product's name</label>
    <input type="text" name="search" class="form-control">
    <button class="btn btn-success">Search</button>
    <a class="ml-auto" href="add.php"><button type="button" class="btn btn-success">Add product</button></a>
</form>
<table class="table mt-2 table-bordered table-striped">
    <thead class="bg-success text-white">
    <tr>
        <th class="col-1">#</th>
        <th class="col-4">Product's name</th>
        <th class="col-3">Type</th>
        <th class="col-3"></th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($datas as $data) : ?>
    <tr>
        <td><?= $data->product_id ?></td>
        <td><?= $data->product_name ?></td>
        <td><?= $data->type ?></td>
        <td>
            <a href="edit.php?id=<?php echo $data->product_id; ?>">edit</a> |
            <a href="delete.php?id=<?php echo $data->product_id; ?>">delete</a>
        </td>
    </tr>
    <?php endforeach; ?>
    </tbody>
</table>
</body>
</html>
