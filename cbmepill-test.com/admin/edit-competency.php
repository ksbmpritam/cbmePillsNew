<?php
include ("includes/header.php");
require ("includes/function.php");
require ("language/language.php");
require_once ("thumbnail_images.class.php");


if (isset($_POST['submit'])) {
    $competency_id = $_GET['id']; 
    $slo_content = filter_input(INPUT_POST, 'slo_content', FILTER_SANITIZE_STRING);
    $method = filter_input(INPUT_POST, 'method', FILTER_SANITIZE_STRING);
    $time_allotted = filter_input(INPUT_POST, 'time_allotted', FILTER_SANITIZE_STRING);
    $resources_provided = filter_input(INPUT_POST, 'resources_provided', FILTER_SANITIZE_STRING);
    $assessment = filter_input(INPUT_POST, 'assessment', FILTER_SANITIZE_STRING);
    $follow_up = filter_input(INPUT_POST, 'follow_up', FILTER_SANITIZE_STRING);
    $status = filter_input(INPUT_POST, 'status', FILTER_SANITIZE_STRING);
    $date = date('Y-m-d h:i:s');
    
    $sqli = "SELECT * FROM `competency` WHERE id ='$competency_id'";
    $data = mysqli_query($mysqli, $sqli);

    if (mysqli_num_rows($data) > 0) {
        $qry = mysqli_query($mysqli, "UPDATE competency SET slo_content='$slo_content', method='$method', time_allotted='$time_allotted', resources_provided='$resources_provided', assessment='$assessment', follow_up='$follow_up', status='$status' WHERE id='$competency_id'");
        
        if ($qry) {
            $_SESSION['msg'] = "Competency updated successfully.";
            header("Location: competency.php");
            exit;
        } else {
            echo "Error updating competency: " . mysqli_error($mysqli);
        }
    } else {
        echo "Competency does not exist.";
    }
    
}

?>

<style>
    .margin_top{
        margin:5px 0 0 0!important;
    }
</style>

<div class="row">
    <?

      //echo "<pre>";print_r($data);
    
      $competency_id = $_GET['id'];
    
      $event_sql = "SELECT * FROM competency where id = '$competency_id'";
    
      $event_result = mysqli_query($mysqli, $event_sql);
    
      $data = mysqli_fetch_assoc($event_result);
      
    // echo "<pre>";print_r($data);

    ?>
    <div class="col-md-12">

        <div class="card">

            <div class="page_title_block">

                <div class="col-md-5 col-xs-12">

                    <div class="page_title">Edit Competency</div>

                </div>
                <div class="col-md-7 col-xs-12">
                    <div class="search_list">
                        <div class="add_btn_primary"> <a href="competency.php">List Competency</a> </div>
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
            
                
                <form action="" name="addCompetency" method="post" class="form form-horizontal" enctype="multipart/form-data">

                            <div class="row">
                              <div class="col-lg-12 col-md-12 col-sm-12 margin_top">
                                    <label>SLO Content</label>
                                    <input class="form-control" name="slo_content" value="<?= isset($data['slo_content']) ? $data['slo_content'] : '' ?>" type="text"  required>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 margin_top">
                                    <label>Method</label>
                                    <input class="form-control" name="method" value="<?= isset($data['method']) ? $data['method'] : '' ?>" type="text"  >
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 margin_top">
                                    <label>Time Allotted</label>
                                    <input class="form-control" name="time_allotted" value="<?= isset($data['time_allotted']) ? $data['time_allotted'] : '' ?>" type="text"  required>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 margin_top">
                                        <label>Resources Provided</label>
                                        <input class="form-control" name="resources_provided" value="<?= isset($data['resources_provided']) ? $data['resources_provided'] : '' ?>" type="text"  required>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 margin_top">
                                        <label>Assessment</label>
                                        <textarea rows="4" name="assessment" class="form-control"> <?= isset($data['assessment']) ? $data['assessment'] : '' ?> </textarea>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 margin_top">
                                        <label>Follow Up</label>
                                        <input class="form-control" name="follow_up" value="<?= isset($data['follow_up']) ? $data['follow_up'] : '' ?>"  type="text">
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