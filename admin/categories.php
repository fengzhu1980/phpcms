<?php include "includes/admin_header.php" ?>

  <div id="wrapper">

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

              <?php insert_categories(); ?>
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
              <table class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th>Id</th>
                    <th>Category Title</th>
                    <th>Action</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  // Query all list
                  find_all_categories();
                  ?>
                  <?php
                  // Delete function
                  delete_categories();
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