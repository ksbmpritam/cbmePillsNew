<?php
include("includes/connection.php");
$date = mysqli_real_escape_string($mysqli,$_GET['date']);


if(!empty($date)){
    $sql = "SELECT * FROM `competency` WHERE date LIKE '%$date%'";
}else{
    $sql = "SELECT * FROM `competency`";
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
                                <a href="competency.php?status=<?=$row['id']?>" class="btn btn-sm btn-info" >Active</a>
                            <?php
                        }else{
                            ?>
                                <a href="competency.php?status=<?=$row['id']?>" class="btn btn-sm btn-info" >Deactive</a>
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