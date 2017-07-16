<div class="row">
    <div class="col-xs-12">
<h1>offers</h1>
<br><br>
<?php if ($offers->num_rows() > 0) { ?>
    <div class="row col-xs-12  custyle">
        <table class="table table-striped custab table-bordered">
            <thead>
            <tr>
                <th>ID</th>
                <th>campaign id</th>
                <th>marketplace</th>
                <th>item</th>
                <th>quantity</th>
                <th>Actions</th>
            </tr>
            </thead>
            <?php foreach ($offers->result() as $offer) { ?>
                <tr>
                    <td><?php echo $offer->id; ?></td>
                    <td><?php echo utf8_decode($offer->campaign_id); ?></td>
                    <td><?php echo utf8_decode($offer->marketplace); ?></td>
                    <td><?php echo utf8_decode($offer->item); ?></td>
                    <td><?php echo utf8_decode($offer->qty); ?></td>
                    <td>
                        <a href="edit_offer/<?php echo $offer->id ?>" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-edit"></span> Edit</a>
                        <a href="delete_offer/<?php echo $offer->id ?>" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove"></span> Del</a>
                        <a href="view_offer/<?php echo $offer->id ?>" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-tasks"></span> View</a>
                    </td>
                </tr>
            <?php } ?>

        </table>
        <ul class='pagination pagination-large'><?php echo $links; ?></ul>
    </div>

<?php } ?>
    </div>
</div>
