<?php include 'includes/header.php'; ?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table mr-1"></i>
                            Users Managment
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>E-mail</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        include("includes/changeme.php");
                                        $sql="SELECT * FROM USERS";
                                        $result = $conn->query($sql);
                                        while($row = $result -> fetch_assoc())
                                        {
                                            $USERNAME=$row["NAME"];
                                            if($USERNAME=='admin')
                                            {
                                                continue;
                                            }
                                            $EMAIL=$row["EMAIL"];
                                            $print="<tr>
                                            <td>$USERNAME</td>
                                            <td>$EMAIL</td>
                                            </tr>";
                                            echo "$print";
                                        }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
                <?php include 'includes/footer.php'; ?>