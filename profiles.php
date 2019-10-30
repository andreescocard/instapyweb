<?php
require("header.php");
?>

<table id="instapy" class="table table-striped table-bordered" style="width:100%">
<thead>
            <tr>
                <th>Id</th>
                <th>Profile</th>
                <th>Actions</th>
            </tr>
        </thead>
    <?php

require('config.php');

//edit this line to your scenario
$bye = array("3", "5", "6", "8", "9", "10", "13", "15", "16", "17", "18", "19", "22"); 

$dbo = new PDO("sqlite:".DBLOCATION);
foreach ($dbo->query('SELECT * FROM profiles ') as $row){
  if(!in_array($row['id'], $bye)){
    ?>

    <tr>
    <td><?php echo $row['id']; ?></td>
    <td><?php echo $row['name']; ?></td>
    <td>
    <a href="singleprofile.php?id=<?php echo $row['id']; ?>" class="btn btn-dark">Progress</a>
    <a href="activity.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">Activity</a>
    <a href="https://instagram.com/<?php echo $row['name']; ?> "target="_blank" class="btn btn-info">Instagram</a>
    </td>
    </tr>
    <?php
  }
}



    ?>

    </table>
    <?php
require("footer.php");
?>
    <script>
$(document).ready(function() {
    $('#instapy').DataTable({
        responsive: true
    });
} );
</script>