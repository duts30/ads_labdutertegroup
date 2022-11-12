<?php
require_once "config.php";

$Brands = $Clothing = $Size = $Price = $Description = "";
$Brands_error = $Clothing_error = $Size_error = $Price_error = $Description_error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
    $Brands = trim($_POST["Brands"]);
    if (empty($Brands)) {
        $Brands_error = "Brands Name is required.";
    } elseif (!filter_var($Brands, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))) {
        $Brands_error = "Brands is invalid.";
    } else {
        $Brands = $Brands;
    }

    $Clothing = trim($_POST["Clothing"]);
    if (empty($Clothing)) {
        $Clothing_error = "Clothing Name is required.";
    } elseif (!filter_var($Clothing, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))) {
        $Clothing_error = "Clothing is invalid.";
    } else {
        $Clothing = $Clothing;
    }

    $Size = trim($_POST["Size"]);
    if (empty($Size)) {
        $Size_error = "Size is required.";
    } elseif (!filter_var($Size, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))) {
        $Size_error = "Size is required.";
    } else {
        $Size = $Size;
    }

    $Price = trim($_POST["Price"]);
    if(empty($Price)){
        $Price_error = "Price is required.";
    } else {
        $Price = $Price;
    }

    $Description = trim($_POST["Description"]);
    if(empty($Description)){
        $Description_error = "Description is required.";
    } else {
        $Description = $Description;
    }

    if (empty($Brands_error) && empty($Clothing_error) && empty($Size_error) && empty($Price_error) && empty($Description_error)) {
          $sql = "INSERT INTO apparel (Brands, Clothing, Size, Price, Description) VALUES ('$Brands', '$Clothing', '$Size', '$Price', '$Description')";
          

          if (mysqli_query($conn, $sql)) {
              header("location: index.php");
          } else {
               echo "Something went wrong. Please try again later.";
          }
      }
    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add </title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        .wrapper {
            width: 1200px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h2>Add Clothing Apparel</h2>
                    </div>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group <?php echo (!empty($Brands_error)) ? 'has-error' : ''; ?>">
                            <label>Brands</label>
                            <input type="text" name="Brands" class="form-control" value="">
                            <span class="help-block"><?php echo $Brands_error;?></span>
                        </div>

                        <div class="form-group <?php echo (!empty($Clothing_error)) ? 'has-error' : ''; ?>">
                            <label>Types Of Clothing</label>
                            <select name="Clothing" class="form-control">

                                <option value="">--Select Clothing--</option>
                                <option value="Dress">Dress</option>
                                <option value="Robe">Robe</option>
                                <option value="Costume">Costume</option>
                                <option value="Vesture">Vesture</option>
                                <option value="Garb">Garb</option>
                                <option value="Habiliments">Habiliments</option>
                                <option value="Outfit">Outfit</option>
                                <option value="Rainment">Rainment</option>

                            </select>
                            <span class="help-block"><?php echo $Clothing_error;?></span>
                        </div>

                        <div class="form-group <?php echo (!empty($Size_error)) ? 'has-error' : ''; ?>">
                            <label>Size</label>
                            <input type="text" name="Size" class="form-control" value="">
                            <span class="help-block"><?php echo $Size_error;?></span>
                        </div>

                        <div class="form-group <?php echo (!empty($Price_error)) ? 'has-error' : ''; ?>">
                            <label>Price</label>
                            <input type="text" name="Price" class="form-control" value="">
                            <span class="help-block"><?php echo $Price_error;?></span>
                        </div>

                        <div class="form-group <?php echo (!empty($Description_error)) ? 'has-error' : ''; ?>">
                            <label>Description</label>
                            <textarea name="Description" class="form-control"></textarea>
                            <span class="help-block"><?php echo $Description_error;?></span>
                        </div>

                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="index.php" class="btn btn-default">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>