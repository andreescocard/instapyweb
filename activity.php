<?php
require("header.php");
?>

<table id="instapy" class="table table-striped table-bordered" style="width:100%">
<thead>
            <tr>
                <th>Profile</th>
                <th>Likes</th>
                <th>Comments</th>
                <th>Follows</th>
                <th>Unfollows</th>
                <th>Server calls</th>
                <th>Created</th>
                <th>Actions</th>
            </tr>
        </thead>
    <?php

require('config.php');

$dbo = new PDO("sqlite:".DBLOCATION);
foreach ($dbo->query('SELECT * FROM recordActivity ra join profiles p on p.id = ra.profile_id where p.id = '.$_GET['id'].' order by created desc limit 100') as $row){
    ?>

    <tr>
    <td><?php echo $row['name']; ?></td>
    <td><?php echo $row['likes']; ?></td>
    <td><?php echo $row['comments']; ?></td>
    <td><?php echo $row['follows']; ?></td>
    <td><?php echo $row['unfollows']; ?></td>
    <td><?php echo $row['server_calls']; ?></td>
    <td><?php echo $row['created']; ?></td>
    <td> <a href="https://instagram.com/<?php echo $row['name']; ?> "target="_blank" class="btn btn-info">Instagram</a></td>
    </tr>
    <?php
}



    ?>

    </table>
    <?php
require("footer.php");
?>
    <script>
$(document).ready(function() {
    $('#instapy').DataTable({
        "order": [[ 4, "desc" ]],
        responsive: true
    });
} );
</script>