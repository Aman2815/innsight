<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Application</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css');?>">
</head>
<body>
    <div class="container-fluid bg-purple shadow-sm">
        <div class="container pb-2 pt-2">
            <div class="text-white h4">
                CRUD Application
            </div>
        </div>
    </div>
    <div class="bg-white shadow-sm">
        <div class="container">
            <div class="row">
                <nav class="nav nav-underline">
                    <div class="nav-link">Users / View</div>
                </nav>
            </div>
        </div>
    </div>
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12 text-right">
                <a href="<?php echo base_url('users/create');?>" class="btn btn-primary">ADD</a>
            </div>
        </div>
    </div>
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <?php
                    if(!empty($session->getFlashData('success'))){
                        ?>
                            <div class="alert alert-success">
                                <?php echo $session->getFlashData('success');?>
                            </div>
                        <?php
                    }
                    if(!empty($session->getFlashData('error'))){
                        ?>
                            <div class="alert alert-danger">
                                <?php echo $session->getFlashData('error');?>
                            </div>
                        <?php
                    }
                ?>
            </div>
            <div class="col-md-12 ">
                <div class="card">
                    <div class="card-header bg-purple text-white">
                        <div class="card-header-title">Users</div>
                    </div>
                    <div class="card-body">
                        <table class="table table-stripped">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Mobile</th>
                                <th>Gender</th>
                                <th>State</th>
                                <th width="150">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php
                                    foreach($userData as $user){
                                        ?>
                                        <tr>
                                            <td><?php echo $user['ID']?></td>
                                            <td><?php echo $user['name']?></td>
                                            <td><?php echo $user['email']?></td>
                                            <td><?php echo $user['mobile']?></td>
                                            <td><?php echo $user['gender']?></td>
                                            <td><?php echo $user['state_name']?></td>
                                            <td>
                                                <a href="<?php echo base_url('users/edit/'.$user['ID']); ?>" class="btn btn-primary btn-sm">Edit</a>
                                                <a onClick="deleteConfirm(<?php echo $user['ID'];?>)" class="btn btn-danger btn-sm">Delete</a>
                                            </td>    
                                        <tr>
                                        <?php
                                    }
                                ?>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script>
    function deleteConfirm(id){
        
        if(confirm("Are you sure, you want to delete?")){
            window.location.href='<?php echo base_url('users/delete/')?>'+id;
        }
    }
</script>
</html>