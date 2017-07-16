<h1>Clients</h1>
<br>
<?php if ($clients->num_rows() > 0) { ?>
    <div class="row col-xs-12  custyle">
        <table class="table table-striped custab">
            <thead>
            <tr>
                <th>ID</th>
                <th>Amazon Name</th>
                <th>Amazon Id</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
            </thead>
            <?php foreach ($clients->result() as $client) { ?>
                <tr>
                    <td><?php echo $client->id; ?></td>
                    <td><?php echo utf8_decode($client->amazon_name); ?></td>
                    <td><?php echo utf8_decode($client->amazon_id); ?></td>
                    <td><?php echo utf8_decode($client->contact_phone); ?></td>
                    <td><?php echo utf8_decode($client->contact_email); ?></td>
                    <td>
                        <a href="edit_clients/<?php echo $client->id ?>" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-edit"></span> Edit</a>
                        <a href="delete_clients/<?php echo $client->id ?>" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove"></span> Del</a>
                        <a href="view_client/<?php echo $client->id ?>" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-tasks"></span> View</a>
                    </td>
                </tr>
            <?php } ?>

        </table>
        <ul class='pagination pagination-large'><?php echo $links; ?></ul>
    </div>

<?php } ?>