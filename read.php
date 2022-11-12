<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Record</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        .wrapper{
            width: 1200px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
  <?php
    if (isset($_GET["Id"]) && !empty(trim($_GET["Id"]))) {
        require_once "config.php";

        $Id = trim($_GET["Id"]);
        $query = mysqli_query($conn, "SELECT * FROM apparel WHERE Id = '$Id'");

        if ($apparel = mysqli_fetch_assoc($query)) {
            $Brands   = $apparel["Brands"];
            $Clothing    = $apparel["Clothing"];
            $Size       = $apparel["Size"];
            $Price = $apparel["Price"];
            $Description     = $apparel["Description"];
        } else {
            header("location: read.php");
            exit();
        }

        mysqli_close($conn);
    } else {
        header("location: read.php");
        exit();
    }
  ?>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h1> User View</h1>
                    </div>
                    <div class="form-group">
                        <label>Brands</label>
                        <p class="form-control-static"><?php echo $Brands ?></p>
                    </div>
                    <div class="form-group">
                        <label>Clothing</label>
                        <p class="form-control-static"><?php echo $Clothing ?></p>
                    </div>
                    <div class="form-group">
                        <label>Size</label>
                        <p class="form-control-static"><?php echo $Size ?></p>
                    </div>
                    <div class="form-group">
                        <label>Price</label>
                        <p class="form-control-static"><?php echo $Price ?></p>
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <p class="form-control-static"><?php echo $Description ?></p>
                    </div>
                    <p><a href="index.php" class="btn btn-primary">Back</a></p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>