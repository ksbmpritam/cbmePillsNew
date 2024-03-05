<?php
include ("includes/header.php");
require ("includes/function.php");
require ("language/language.php");
require_once ("thumbnail_images.class.php");



if (isset($_POST['submit'])) {
    $teacher_id = $_GET['id'];
    $mobile = filter_input(INPUT_POST, 'mobile', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $display_name = filter_input(INPUT_POST, 'display_name', FILTER_SANITIZE_STRING);
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    $gender = filter_input(INPUT_POST, 'gender', FILTER_SANITIZE_STRING);
    $status = filter_input(INPUT_POST, 'status', FILTER_SANITIZE_STRING);
    $pass = filter_input(INPUT_POST, 'pass', FILTER_SANITIZE_STRING);

    // Validate input
    if ($teacher_id && $mobile && $email && $display_name && $name && $gender && $status && $pass) {
        $sqli = "SELECT * FROM `users` WHERE id ='$teacher_id'";
        $data = mysqli_query($mysqli, $sqli);

        if (mysqli_num_rows($data) > 0) {
            $qry = mysqli_query($mysqli, "UPDATE users SET name='$name', display_name='$display_name', email='$email', password='$pass', mobile='$mobile', gender='$gender', status='$status' WHERE id='$teacher_id'");
            
            if ($qry) {
                $_SESSION['msg'] = "Teacher updated successfully.";
                header("Location: all_user.php");
                exit;
            } else {
                echo "Error updating user: " . mysqli_error($mysqli);
            }
        } else {
            echo "User with mobile or email does not exist.";
        }
    } else {
        echo "Invalid input data.";
    }
}

?>

<style>
    .margin_top{
        margin:20px 0 0 0!important;
    }
</style>

<div class="row">
    <?

      //echo "<pre>";print_r($data);
    
      $teacher_id = $_GET['id'];
    
      $event_sql = "SELECT * FROM users where id = '$teacher_id'";
    
      $event_result = mysqli_query($mysqli, $event_sql);
    
      $data = mysqli_fetch_assoc($event_result);
      
    // echo "<pre>";print_r($data['name']);

    ?>
    
    <div class="col-md-12">

        <div class="card">

            <div class="page_title_block">

                <div class="col-md-5 col-xs-12">

                    <div class="page_title">Edit Teachers</div>
                    
                </div>
                <div class="col-md-7 col-xs-12">
                    <div class="search_list">
                        <div class="add_btn_primary"> <a href="all_user.php">List Teacher</a> </div>
                    </div>
                </div>

            </div>

            <div class="clearfix"></div>

            <div class="row mrg-top">

                <div class="col-md-12">



                    <div class="col-md-12 col-sm-12">

                        <?php if (isset($_SESSION['msg'])) { ?> 

                            <div class="alert alert-success alert-dismissible" role="alert"> 
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>

                                <?php echo $_SESSION['msg']; ?></a> </div>

                            <?php unset($_SESSION['msg']);
                            }
                            ?> 

                    </div>

                </div>

            </div>

            <div class="card-body mrg_bottom"> 
            
                
                <form action="" name="addteacher" method="post" class="form form-horizontal" enctype="multipart/form-data">

                            <div class="row">
                              <div class="col-lg-12 col-md-12 col-sm-12 margin_top">
                                    <label>Name</label>
                                        <input class="form-control" name="name" value="<?= isset($data['name']) ? $data['name'] : '' ?>" type="text" required>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 margin_top">
                                    <label>Display Name</label>
                                    <input class="form-control" name="display_name" value="<?= isset($data['display_name']) ? $data['display_name'] : '' ?>" type="text" required>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 margin_top">
                                    <label>Email</label>
                                    <input class="form-control" name="email" type="email" value="<?= isset($data['email']) ? $data['email'] : '' ?>" required >
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 margin_top">
                                    <label>Mobile</label>
                                    <input class="form-control" name="mobile" value="<?= isset($data['mobile']) ? $data['mobile'] : '' ?>"  type="text" required >
                                    </div>
                                    
                                    <div class="col-lg-12 col-md-12 col-sm-12 margin_top">
                                    <label>Password</label>
                                    <input class="form-control" name="pass" min="6" max="16" value="<?= isset($data['password']) ? $data['password'] : '' ?>" type="text" required >
                                    </div>
    
                                    <!--<div class="col-lg-12 col-md-12 col-sm-12 margin_top">-->
                                    <!--<label>Profile Image Url</label>-->
                                    <!--<input class="form-control" name="profile_pic_url" type="text" placeholder="https://cbmepill.com/assets1/images/logo.png" required >-->
                                    <!--</div>-->
                                  
                                 <div class="col-lg-12 col-md-12 col-sm-12 margin_top">
                                    <label>Gender</label>
                                    <select class="form-control" name="gender">
                                        <option value="male"  <?= ($data['gender'] == "male") ? "selected" : "" ?>> Male </option>
                                        <option value="female"  <?= ($data['gender'] == "female") ? "selected" : "" ?>> Female </option>
                                    </select>                           
                                </div>
                                
                                  <div class="col-lg-12 col-md-12 col-sm-12 margin_top">
                                    <label>Status</label>
                                    <select class="form-control" name="status">
                                        <option value="1" <?= ($data['status'] == "1") ? "selected" : "" ?>>Active</option>
                                        <option value="0" <?= ($data['status'] == "0") ? "selected" : "" ?>>Deactive</option>
                                    </select>                           
                                </div>
                           
                                            
                                <div class="col-md-6">
                                    <button type="submit" name="submit" class="btn btn-primary" style="margin-top: 10px;">Save</button>
                                </div>
                            </div>
                            
                        </div>

                    </div>

                </form>

            </div>

        </div>

    </div>

</div>



<?php include ("includes/footer.php"); ?>       