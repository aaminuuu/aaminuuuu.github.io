<?php include 'includes/header.php'; ?>
<div id="layoutSidenav_content">
                <main>
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table mr-1"></i>
                            Blog Managment
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Blog Name</th>
                                            <th>Blog Image</th>
                                            <th>Delete Blog</th>
                                            <th>Add/edit Desription</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        include("includes/changeme.php");
                                        $sql="SELECT * FROM BLOGS";
                                        $result = $conn->query($sql);
                                        while($row = $result -> fetch_assoc())
                                        {
                                            
                                            $USERNAME=$row["CNAME"];
                                            $EMAIL=$row["CIMAGE"];
                                            $print="
                                        <tr>
                                            <td>$USERNAME</td>
                                            <td><a href='$EMAIL' target='_blank'>Blog image</a></td>
                                            <td align='center'><input type='button' onclick=".'"'.'location.href='."'"."delete.php?id=$USERNAME';".'"'." value='Delete' style='width:50%'></td>
                                            <td><a href='edit.php?id=$USERNAME'>Add / Edit</a></td>
                                        </tr>";
                                        echo "$print";
                                        }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                <a class="small" href="index.php">Return to Users</a>
                                <a class="btn btn-primary" href="addBlogs.php">Add Blog</a>
                            </div>
                        </div>
                    </div>
                </main>
<?php include 'includes/footer.php'; ?>