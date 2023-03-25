
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
                    <div class="nav-link">Users / Edit</div>
                </nav>
            </div>
        </div>
    </div>
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12 text-right">
                <a href="<?php echo base_url('/users');?>" class="btn btn-primary">User List</a>
            </div>
        </div>
    </div>
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12 ">
                <div class="card">
                    <div class="card-header bg-purple text-white">
                        <div class="card-header-title">Edit User</div>
                    </div>
                    <div class="card-body">
                        <form name="addUser" id="addUser" method="POST" action="<?php echo base_url('users/edit/'.$user->ID);?>">
                            <div class="form-group">
                                <label>Name : </label>
                                <input type="text" name="name" id="name" class="form-control <?php echo (isset($validation) && $validation->hasError('name')) ? 'is-invalid' : '';?>" value="<?php echo set_value('name',$user->name);?>">
                                <?php
                                    if(isset($validation) && $validation->hasError('name')){
                                        echo  '<p class="invalid-feedback">'.$validation->getError('name').'</p>';
                                    }
                                ?>
                            </div>
                            <div class="form-group">
                                <label>Email : </label>
                                <input type="email" name="email" id="email" class="form-control <?php echo (isset($validation) && $validation->hasError('email')) ? 'is-invalid' : '';?>" value="<?php echo set_value('email',$user->email);?>" >
                                <?php
                                    if(isset($validation) && $validation->hasError('email')){
                                        echo  '<p class="invalid-feedback">'.$validation->getError('email').'</p>';
                                    }
                                ?>
                            </div>
                            <div class="form-group">
                                <label>Mobile : </label>
                                <input type="tel" name="mobile" id="mobile" class="form-control <?php echo (isset($validation) && $validation->hasError('mobile')) ? 'is-invalid' : '';?>" value="<?php echo set_value('mobile',$user->mobile);?>">
                                <?php
                                    if(isset($validation) && $validation->hasError('mobile')){
                                        echo  '<p class="invalid-feedback">'.$validation->getError('mobile').'</p>';
                                    }
                                ?>
                            </div>
                            <div class="form-group">
                                <label>Gender : </label>
                                <select name="gender" id="gender" class="form-control" value="<?php echo set_value('gender',$user->gender);?>">
                                    <option value="Male" <?php echo ($user->gender == 'Male') ? 'Selected':''; ?> >Male</option>
                                    <option value="Female" <?php echo ($user->gender == 'Female') ? 'Selected':''; ?>>Female</option>
                                    <option value="Others" <?php echo ($user->gender == 'Others') ? 'Selected':''; ?>>Others</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>State : </label>
                                <select name="state" id="state" class="form-control" value="<?php echo set_value('state',$user->state);?>">
                                    <?php
                                        
                                        foreach ($states as $key => $value) {
                                            if($states[$key]['ID'] == $user->state){
                                                $selected = "selected";
                                            }else{
                                                $selected = '';
                                            }
                                            echo '<option value="'.$states[$key]['ID'].'" '.$selected.'>'.$states[$key]['state_name'].'</option>';
                                        }
                                    ?>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>