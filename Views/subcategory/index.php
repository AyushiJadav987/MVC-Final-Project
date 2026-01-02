<?php

include("./Views/common/header.php");
include("./Views/common/aside.php");


?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>SubCategory</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">General Form</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-6">
                    <!-- general form elements -->

                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Add SubCategory</h3>

                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        
                        <form method="post" action="index.php?action=<?= isset($res1) ? 'subupdate' : 'subadd' ?>">

                            <div class="card-body">
                                <div class="form-group">

                                    <label for="exampleInputEmail1">Category Name</label>

                                    <select name="catid" class="form-control">
                                        <option value=""> --Select category--</option>
                                        <?php while($row = mysqli_fetch_assoc( $catdata)){?>
                                        <option value="<?= $row['catid']?>"><?= $row['name']?></option>
                                        <?php } ?>

                                    </select>

                                </div>

                                <div class="form-group">


                                    <input type="hidden" name="subcatid"
                                        value="<?= (isset($res1))? $res1['subcatid']:''?>">

                                    <label for="exampleInputEmail1">SubCategory Name</label>
                                    <input type="text" name="subcat_name" class="form-control" placeholder="Enter Name"
                                        value="<?= (isset($res1))? $res1['subcat_name']:''?>" required>
                                </div>

                                <div class="form-group">

                                </div>

                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->

                </div>

                <!-- /.card -->

                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">List SubCategory</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">

                            <table class="table table-bordered">
                                <thead>

                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Category</th>
                                        <th>SubCategory</th>
                                        <th>Action</th>
                                    </tr>

                                </thead>
                                <tbody>

                                    <?php
                  while ($row = mysqli_fetch_assoc($res)) { ?>
                                    <tr>
                                        <td><?= $row['subcatid'] ?></td>
                                        <td><?= $row['name'] ?></td>
                                        <td><?= $row['subcat_name'] ?></td>
                                        <td>
                                            <a href="index.php?action=subedit&id=<?= $row['subcatid'] ?>"
                                                class="btn btn-primary">Edit</a>
                                            <a href="index.php?action=subdelete&id=<?= $row['subcatid'] ?>"
                                                class="btn btn-danger">Delete</a>
                                        </td>

                                    </tr>

                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->

                    </div>
                </div>
                <!--/.col (left) -->
                <!-- right column -->

                <!--/.col (right) -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<?php
include("./Views/common/footer.php");
?>