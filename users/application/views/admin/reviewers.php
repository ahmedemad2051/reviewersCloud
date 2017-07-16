<div class="container">
 <h3>All Reviewers </h3>

<table class='table table-bordered'>
<tr>
<th>Id</th>
<th>User Id</th>
<th>User Name</th>
<th>Marketplace</th>
<th></th>
</tr>
<?php foreach($reviewers->result() as $reviewer) { ?>
<tr>
<td><?php echo $reviewer->id ?></td>
<td><?php echo $reviewer->amazon_user_id ?></td>
<td><?php echo $reviewer->amazon_user_name ?></td>
<td><?php echo $reviewer->home_marketplace ?></td>
<td><a href='<?php echo base_url(); ?>index.php/admin/reviewer_profile/<?php echo $reviewer->amazon_user_id ?>'>view</a></td>
</tr>

<?php } ?>

</table>
    
</div>