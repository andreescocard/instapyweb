<?php
require("header.php");
?>

<table id="instapy" class="table table-striped table-bordered" style="width:100%">
<thead>
            <tr>
                <th>Profiles</th>
                <th>Followers</th>
                <th>Following</th>
                <th>Total Posts</th>
                <th>Created</th>
                <th>Actions</th>
            </tr>
        </thead>
    <?php

require('config.php');

$dbo = new PDO("sqlite:".DBLOCATION);
foreach ($dbo->query('SELECT * FROM accountsProgress ap join profiles p on p.id = ap.profile_id where p.id = '.$_GET['id'].' order by created desc limit 100') as $row){
    ?>

    <tr>
    <td><?php echo $row['name']; ?></td>
    <td><?php echo $row['followers']; ?></td>
    <td><?php echo $row['following']; ?></td>
    <td><?php echo $row['total_posts']; ?></td>
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