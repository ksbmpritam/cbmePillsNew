<?php

include("includes/header_teacher.php");

require("includes/function.php");

require("language/language.php");



if (isset($_GET['id'])) {
    $del = $_GET['id'];
    Delete('competency', 'id=' . $del . '');

    $_SESSION['msg'] = "12";
    header("Location:teacher_competency.php");
    exit;
}

//Active and Deactive status
if (isset($_GET['status'])) {
    $competencyid = $_GET['status'];
    $query = mysqli_query($mysqli, "select status from competency where id='$competencyid'");
    $row = mysqli_fetch_assoc($query);
    if ($row['status'] == 0) {
        $status = 1;
    } else {
        $status = 0;
    }

    $query1 = mysqli_query($mysqli, "update competency set status='$status' where id='$competencyid'");
    if ($query1) {

        $_SESSION['msg'] = "11";
        header("Location:teacher_competency.php");
        exit;
    }
}



?>

<div class="row">
    <div class="col-xs-12">
        <div class="card mrg_bottom">
            <div class="page_title_block">
                <div class="col-md-5 col-xs-12">
                    <div class="page_title">All Competency</div>
                </div>
                <div class="col-md-7 col-xs-12">
                    <div class="search_list">
                        <div class="search_block">
                              <form  method="post" action="">
                              <input class="form-control input-sm" onkeyup="search(this.value.toLowerCase())" placeholder="Search competency..." aria-controls="DataTables_Table_0" type="search" name="search_value" required>
                                    <button type="submit" name="data_search" class="btn-search"><i class="fa fa-search"></i></button>
                              </form>
                            </div>
                             <!--<div class="add_btn_primary"> <a href="add_competency.php">Add Competency</a> </div>-->
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="row mrg-top">
                <div class="col-md-12">

                    <div class="col-md-12 col-sm-12">
                        <?php if (isset($_SESSION['msg'])) { ?> 
                            <div class="alert alert-success alert-dismissible" role="alert"> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                <?php echo $client_lang[$_SESSION['msg']]; ?></a> </div>
                            <?php unset($_SESSION['msg']);
                        }
                        ?>	
                    </div>
                </div>
            </div>
            <div class="col-md-12 mrg-top">
                <div class="row">

                    <div class="table-responsive">
                        <table border="0" cellspacing="5" cellpadding="5">
                            <tbody><tr>
                                <td>Date</td>
                                <td><input type="date"  id="date"></td>
                            </tr>
                        </tbody></table>
                        
                        <table id="mytable"  class="table table-bordered table-striped table-hover table-sm ">
                            <thead>
                                <tr>
                                    <th>Sr.No.</th>
                                    <th>Date</th>
                                    <th>SLO Content</th>
                                    <th>Method</th>
                                    <th>Time Allotted</th>
                                     <th>Resources Provided</th>
                                    <th>Assessment</th>
                                    <th>Follow Up</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id="my_body">
                                
                                <?php
                                include("../includes/connection.php");
                                
                                if(isset($_POST['data_search'])){
                                    $search_value = $_POST['search_value'];
                                    // $sql = "SELECT * FROM `competency` WHERE slo_content LIKE '%$search_value%' AND status=1";
                                    $sql = "SELECT * FROM `competency` WHERE slo_content LIKE '%$search_value%' AND status = 1 ORDER BY id DESC";

                                }else{
                                    $sql = "SELECT * FROM `competency` WHERE status=1 ORDER BY id DESC";
                                }
                                
                                
                                $query = mysqli_query($mysqli,$sql);
                                
                                $sno = 1;
                                while($row = mysqli_fetch_assoc($query)){
                                    ?>
   
                                        <tr>
                                            <td><?=$sno++?></td>
                                            <td><?=$row['date']?></td>
                                            <td><?=$row['slo_content']?></td>
                                            <td><?=$row['method']?></td>
                                            <td><?=$row['time_allotted']?></td>
                                            <td><?=$row['resources_provided']?></td>
                                            <td><?=$row['assessment']?></td>
                                            <td><?=$row['follow_up']?></td>
                                           
                                            <td>
                                                <?php 
                                                    if($row['status'] == 1){
                                                        echo "Active";
                                                    }else{
                                                        echo "Deactivate";
                                                    }
                                                ?>
                                            </td>
                                            <td>
                                                <?php 
                                                    if($row['status'] == 1){
                                                        ?>
                                                            <a href="teacher_competency.php?status=<?=$row['id']?>" class="btn btn-sm btn-info" >Active</a>
                                                        <?php
                                                    }else{
                                                        ?>
                                                            <a href="teacher_competency.php?status=<?=$row['id']?>" class="btn btn-sm btn-info" >Deactive</a>
                                                        <?php
                                                    }
                                                    
                                                    ?>
                                                        <a href="edit-competency.php?id=<?=$row['id']?>" class="btn btn-sm btn-primary btn-sm" > Edit </a>
                                                        <a href="competency.php?id=<?= $row['id'] ?>" class="remove_I_id btn btn-sm btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete?')">Delete</a>

                                                    <?php
                                                ?>
                                            </td>
                                        </tr>
                                        
                                    <?php
                                }
                                
                                ?>
                                
                            </tbody>
                        </table>
                    </div>






                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>

<?php include("includes/footer.php"); ?>  
<!-- DataTables -->
<script src="assets/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="assets/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="dist/js/demo.js"></script>


<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.4/css/buttons.dataTables.min.css">
<script src="https://cdn.datatables.net/buttons/1.6.4/js/dataTables.buttons.min.js"></script>

<script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.flash.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.print.min.js"></script>



<div id="myModal2" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body result-div">
            </div>
        </div>

    </div>
</div>




<script type="text/javascript" language="javascript" >
    // $(document).ready(function () {
    //     var tableblog = $('#co_tableblog').DataTable({
    //         "lengthMenu": [10, 25, 50, 75, 100, 250],
    //         dom: 'Blfrtip',
    //         //"dom": 'Bfrtip',
    //         "buttons": ['csv'],
    //         "processing": false,
    //         "serverSide": false,
    //         "ajax": {
    //                 url: "<?php #echo 'ajax/get_all_games.php'; ?>",
    //             type: "post",
    //             error: function () {  // error handling
    //                 $(".co_tableblog-error").html("");
    //             }
    //         }
    //     });
        
        $('#co_tableblog').on('click', 'a.add_I_id', function () {
            var id = $(this).attr('data_id');
            console.log(id);
            if (confirm('Are you sure you want to Edit This Pill?')) {
                $.ajax({
                    type: "POST",
                    data: {id: id},
                    url: "<?php echo 'ajax/get_pill.php'; ?>",

                    success: function (result) {
                        $('#myModal2').modal('show');
                        $('.result-div').html(result);
                    },
                    async: false
                });
            }
        });
    });
</script>

<script>
    const search = (input) => {
        let table = document.querySelector('#mytable');
        let table_row = table.querySelectorAll('tr');
        let table_column = table_row[1].querySelectorAll('td'); //This is Total No. Of Column

        for (let i = 1; i < table_row.length; i++) {
            for(let j = 0; j < table_column.length; j++){
                let field_Value = table_row[i].querySelectorAll('td')[j]; //this is for field
                if (field_Value.innerText.toLowerCase().indexOf(input) > -1) {
                    table_row[i].style.display = "";
                    break;
                } else {
                    table_row[i].style.display = "none";
                }
            }                   
        }
    }
</script>
