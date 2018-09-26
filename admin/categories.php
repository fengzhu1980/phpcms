<?php include "includes/admin_header.php" ?>

  <div id="wrapper">
    <?php
      // if ($connection) {
      //   echo "Connected.";
      // }
    ?>

    <?php include "includes/admin_navigation.php" ?>

    <div id="page-wrapper">

      <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
          <div class="col-lg-12">
            <h1 class="page-header">
              Admin Page
              <small>Subheading</small>
            </h1>
            <!-- Add Category Form Start -->
            <div class="col-xs-6">

              <?php
                if (isset($_POST['submit'])) {
                  $cat_title = $_POST['cat_title'];

                  if (trim($cat_title) == "" || empty($cat_title)) {
                    echo "This field should not be empty";
                  } else {
                    $query = "INSERT INTO categories(cat_title) ";
                    $query .= "VALUE('{$cat_title}')";
                    $create_category_query = mysqli_query($connection, $query);

                    if (!$create_category_query) {
                      die ('Query failed' . mysqli_error($connection));
                    }
                  }
                }
              ?>
              <!-- Add Category Form -->
              <form action="" method="post">
                <div class="form-group">
                  <label for="cat-title">Add Category</label>
                  <input type="text" class="form-control" name="cat_title">
                </div>
                <div class="form-group">
                  <input type="submit" class="btn btn-primary" name="submit" value="Add Category">
                </div>
              </form>
              <?php
              // Update include
              if (isset($_GET['edit'])) {
                $cat_id = $_GET['edit'];
                include "includes/update_categories.php";
              }
              ?>
            </div>
            <!-- Add Category Form End -->
            <!-- Add Category Table Start -->
            <div class="col-xs-6">
              <table class="table table0bordered table-hover">
                <thead>
                  <tr>
                    <th>Id</th>
                    <th>Category Title</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  // Query all list
                    $query = "SELECT * FROM categories";
                    $select_categories = mysqli_query($connection, $query);
                    while($row = mysqli_fetch_assoc($select_categories)) {
                      $cat_id = $row['cat_id'];
                      $cat_title = $row['cat_title'];

                      echo "<tr>";
                      echo "<td>{$cat_id}</td>";
                      echo "<td>{$cat_title}</td>";
                      echo "<td><a href='categories.php?delete={$cat_id}'>Delete</a></td>";
                      echo "<td><a href='categories.php?edit={$cat_id}'>Edit</a></td>";
                      echo "</tr>";
                    }
                  ?>
                  <?php
                  // Delete function
                    if (isset($_GET['delete'])) {
                      $the_cat_id = $_GET['delete'];
                      $query = "DELETE FROM categories WHERE cat_id = {$the_cat_id}";
                      $delete_query = mysqli_query($connection, $query);
                      header("Location: categories.php");
                    }
                  ?>
                </tbody>
              </table>
            </div>
            <!-- Add Category Table End -->
            <!-- <ol class="breadcrumb">
              <li>
                <i class="fa fa-dashboard"></i> <a href="index.html">Dashboard</a>
              </li>
              <li class="active">
                <i class="fa fa-file"></i> Blank Page
              </li>
            </ol> -->
          </div>
        </div>
        <!-- /.row -->

      </div>
      <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->
<?php include "includes/admin_footer.php" ?>