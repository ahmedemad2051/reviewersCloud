<h1>Users</h1>
<?php if ($users->num_rows() > 0) { ?>
    <div class="row col-xs-12  custyle">
        <table class="table table-striped custab">
            <thead>
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
            </thead>
            <?php foreach ($users->result() as $user) { ?>
                <tr>
                    <td><?php echo $user->id; ?></td>
                    <td><?php echo utf8_decode($user->first_name); ?></td>
                    <td><?php echo utf8_decode($user->last_name); ?></td>
                    <td><?php echo utf8_decode($user->email); ?></td>
                    <td>
                        <a href="edit_user/<?php echo $user->id ?>" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-edit"></span> Edit</a>
                        <a href="delete_user/<?php echo $user->id ?>" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove"></span> Del</a>
                        <a href="view_user/<?php echo $user->id ?>" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-tasks"></span> View</a>
                    </td>
                </tr>
            <?php } ?>

        </table>
        <ul class='pagination pagination-large'><?php echo $links; ?></ul>
    </div>

<?php } ?>