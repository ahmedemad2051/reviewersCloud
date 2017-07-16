<div class="row">
    <div class="col-xs-12">
<h1>campaigns</h1>
<a class="btn btn-success" href="<?php echo site_url('admin/create_campaign'); ?>">create campaign</a>
<br><br>
<?php if ($campaigns->num_rows() > 0) { ?>
    <div class="row col-xs-12  custyle">
        <table class="table table-striped custab table-bordered">
            <thead>
            <tr>
                <th>ID</th>
                <th>client id</th>
                <th>name</th>
                <th>start date</th>
                <th>end date</th>
                <th>marketplaces</th>
                <th>Actions</th>
            </tr>
            </thead>
            <?php foreach ($campaigns->result() as $campaign) { ?>
                <tr>
                    <td><?php echo $campaign->id; ?></td>
                    <td><?php echo utf8_decode($campaign->client_id); ?></td>
                    <td><?php echo utf8_decode($campaign->name); ?></td>
                    <td><?php echo utf8_decode($campaign->start_date); ?></td>
                    <td><?php echo utf8_decode($campaign->end_date); ?></td>
                    <td><?php echo utf8_decode($campaign->marketplaces); ?></td>
                    <td>
                        <a href="edit_campaign/<?php echo $campaign->id ?>" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-edit"></span> Edit</a>
                        <a href="delete_campaign/<?php echo $campaign->id ?>" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove"></span> Del</a>
                        <a href="view_campaign/<?php echo $campaign->id ?>" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-tasks"></span> View</a>
                    </td>
                </tr>
            <?php } ?>

        </table>
        <ul class='pagination pagination-large'><?php echo $links; ?></ul>
    </div>

<?php } ?>
    </div>
</div>
