<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="UTF-8">
      <title>Dashboard</title>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
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
              <h2 class="text-center">List of Apparels</h2>
                <div class="col-md-12">
                    <div class="page-header clearfix">
                        <h2 class="pull-left">Clothing</h2>
                        <a href="create.php" class="btn btn-success pull-right">Add</a>
                    </div>
                    <?php
                    // Include config file
                    require_once "config.php";

                    // select all users
                    $data = "SELECT * FROM apparel";
                    if($apparels = mysqli_query($conn, $data)){
                        if(mysqli_num_rows($apparels) > 0){
                            echo "<table class='table table-bordered table-striped'>
                                    <thead>
                                      <tr>
                                        <th>Id</th>
                                        <th>Brands</th>
                                        <th>Clothing</th>
                                        <th>Size</th>
                                        <th>Price</th>
                                        <th>Description</th>
                                        <th>Action</th>
                                      </tr>
                                    </thead>
                                    <tbody>";
                                while($apparel = mysqli_fetch_array($apparels)) {
                                    echo "<tr>
                                            <td>" . $apparel['Id'] . "</td>
                                            <td>" . $apparel['Brands'] . "</td>
                                            <td>" . $apparel['Clothing'] . "</td>
                                            <td>" . $apparel['Size'] . "</td>
                                            <td>" . $apparel['Price'] . "</td>
                                            <td>" . $apparel['Description'] . "</td>
                                            
                                            <td>
                                              <a href='read.php?Id=". $apparel['Id'] ."' title='View User' data-toggle='tooltip'><span class='glyphicon glyphicon-eye-open'></span></a>
                                              <a href='edit.php?Id=". $apparel['Id'] ."' title='Edit User' data-toggle='tooltip'><span class='glyphicon glyphicon-pencil'></span></a>
                                              <a href='delete.php?Id=". $apparel['Id'] ."' title='Delete User' data-toggle='tooltip'><span class='glyphicon glyphicon-trash'></span></a>
                                            </td>
                                          </tr>";
                                }
                                echo "</tbody>
                                </table>";
                            mysqli_free_result($apparels);
                        } else{
                            echo "<p class='lead'><em>No records found.</em></p>";
                        }
                    } else{
                        echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
                    }

                    // Close connection
                    mysqli_close($conn);
                    ?>
                </div>
            </div>
        </div>
    </div>
  </body>
</html>