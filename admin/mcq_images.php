<?php
include("includes/header.php");

require("includes/function.php");
require("language/language.php");

if($_POST['submit']){
    $file = $_FILES['image'];
    $count = count($file['name']);
    
    for($i=0;$i<$count;$i++){
        $file_name = time().$i.$file['name'][$i];
        move_uploaded_file($file['tmp_name'][$i],"mcq_images/".$file_name);
        $sql = "insert into mcq_images set image='$file_name'";
        mysqli_query($mysqli,$sql);
    }
    
    $_SESSION['msg'] = "Added Success";
    header("location:mcq_images.php");
    
    // $file_name = time().$file['name'];
    // if(move_uploaded_file($file['tmp_name'],"mcq_images/".$file_name)){
    //     $sql = "insert into mcq_images set image='$file_name'";
    //     if(mysqli_query($mysqli,$sql)){
    //         $_SESSION['msg'] = "Added Success";
    //         header("location:mcq_images.php");
    //     }
        
    // } 
}

?>

<div class="row">
    <div class="col-xs-12">
        <div class="card mrg_bottom">
            <div class="page_title_block">
                <div class="col-md-5 col-xs-12">
                    <div class="page_title">All Image Links</div>
                </div>
                <div class="col-md-7 col-xs-12">
                    <div class="search_list">
                        
                        <div class="search_block">
                              <form  method="post" action="">
                                <input class="form-control input-sm" onkeyup="search(this.value.toLowerCase())"  placeholder="Search image..." aria-controls="DataTables_Table_0" type="search" name="search_value" required>
                                <button type="submit" name="data_search" class="btn-search"><i class="fa fa-search"></i></button>
                          </form>  
                        </div>
                        
                        <!--div class="add_btn_primary"> <a href="add_video.php">Add Video</a> </div>-->
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="row mrg-top">
                <div class="col-md-12">

                    <div class="col-md-12 col-sm-12">
                        <?php if (isset($_SESSION['msg'])) { ?> 
                            <div class="alert alert-success alert-dismissible" role="alert"> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                <?php echo $_SESSION['msg']; ?></a> </div>
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
                            <tbody>
                                <form method="POST" enctype="multipart/form-data">
                                    <tr>
                                        <td>File</td>
                                        <td><input type="file" name="image[]" multiple required accept="image/png, image/gif, image/jpeg"></td>
                                        <td><input type="submit" name="submit"></td>
                                    </tr>
                                </form>    
                            </tbody>
                        </table>
                        
                        <table id="mytable"  class="table table-bordered table-striped table-hover table-sm ">
                            <thead>
                                <tr>
                                    <th>Sr.No.</th>
                                    <th>Image Name</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id="my_body">
                                
                                <?php
                                include("../includes/connection.php");
                                
                                if(isset($_POST['data_search'])){
                                    $search_value = $_POST['search_value'];
                                    $sql = "SELECT * FROM `mcq_images` WHERE image LIKE '%$search_value%' ORDER BY id DESC";
                                }else{
                                    $sql = "SELECT * FROM `mcq_images` ORDER BY id DESC";
                                }
                                
                                $query = mysqli_query($mysqli,$sql);
                                
                                $sno = 1;
                                while($row = mysqli_fetch_assoc($query)){
                                    ?>
                                        <tr>
                                            <td><?=$sno++?></td>
                                            <td>
                                                <input id="k<?=$row['id']?>" type="text" value="<?=$row['image']?>" realonly>
                                            </td>
                                            <td>
                                                <img src="mcq_images/<?=$row['image']?>" style="width:150px;height:150px;border:1px solid #c1c1c1;" class="img-circle">
                                            </td>
                                            <td>
                                               <a onclick="cop('k<?=$row['id']?>')" class="btn btn-sm btn-info" >Copy</a>
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

<!-- DataTables -->
<script src="assets/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="assets/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="dist/js/demo.js"></script>


<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.4/css/buttons.dataTables.min.css">
<script src="https://cdn.datatables.net/buttons/1.6.4/js/dataTables.buttons.min.js"></script>

<script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.flash.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.print.min.js"></script>

<script>
    function cop(a){
          /* Get the text field */
          var copyText = document.getElementById(a);
          copyText.select();
          copyText.setSelectionRange(0, 99999);
          navigator.clipboard.writeText(copyText.value);
        
        //   alert("Copied Success..");
    }
</script>


