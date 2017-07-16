<div class="container">
    <div class="row">
        <div class="col-lg-4 col-sm-4 well">

            <fieldset>
                <legend>View campaign</legend>
                <div class="form-group">
                    <div class="row colbox">
                        <div class="col-lg-4 col-sm-4">
                            <label for="password" class="control-label">client id: </label>
                        </div>
                        <div class="col-lg-7 col-sm-7 col-xs-offset-1">
                            <?php
                            echo $campaign->client_id;
                            ?>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row colbox">
                        <div class="col-lg-4 col-sm-4">
                            <label for="password" class="control-label">campaign name: </label>
                        </div>
                        <div class="col-lg-7 col-sm-7 col-xs-offset-1">
                            <?php
                            echo $campaign->name;
                            ?>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row colbox">
                        <div class="col-lg-4 col-sm-4">
                            <label for="password" class="control-label">start date: </label>
                        </div>
                        <div class="col-lg-7 col-sm-7 col-xs-offset-1">
                            <?php
                            echo $campaign->start_date;
                            ?>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row colbox">
                        <div class="col-lg-4 col-sm-4">
                            <label for="password" class="control-label">end date: </label>
                        </div>
                        <div class="col-lg-7 col-sm-7 col-xs-offset-1">
                            <?php
                            echo $campaign->end_date;
                            ?>
                        </div>
                    </div>
                </div>


                <div class="form-group">
                    <div class="row colbox">
                        <div class="col-lg-4 col-sm-4">
                            <label for="marketplaces" class="control-label">marketplaces: </label>
                        </div>
                        <div class="col-lg-7 col-sm-7 col-xs-offset-1" style="word-wrap: break-word;">
                            <?php
                            echo $campaign->marketplaces;
                            ?>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row colbox">
                        <div class="col-lg-4 col-sm-4">
                            <label for="marketplaces" class="control-label"> </label>
                        </div>
                        <div class="col-lg-7 col-sm-7 col-xs-offset-1" style="word-wrap: break-word;">
                            <?php
                            echo "<a class='btn btn-success' href='".site_url('admin/edit_campaign/'.$campaign->id) ."' > Change</a>";
                            ?>
                            <a class='btn btn-danger col-xs-offset-1' href='<?php echo site_url('admin/delete_campaign/'.$campaign->id); ?>'  onclick="return confirm('are you sure?')">Terminate</a>

                        </div>
                    </div>
                </div>


            </fieldset>

        </div>
        <?php
        if (count(explode(',', $campaign->marketplaces)) > 1) { ?>
        <div class="col-lg-7 col-sm-7 col-xs-offset-1 ">

            <fieldset>
                <legend>Offers</legend>
                <?php
                if (count(explode(',', $campaign->marketplaces)) > 1) {
                    echo "<a class='btn btn-primary' href='" . site_url('admin/create_offer/' . $campaign->id) . "'>create offer</a>";
                    echo '<br><br>';
                }
                ?>
                <?php if ($offers->num_rows() > 0) { ?>
                    <div class="row col-xs-12  custyle">
                        <table class="table table-striped custab table-bordered">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>campaign id</th>
                                <th>marketplace</th>
                                <th>asin</th>
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
                                    <td><?php echo utf8_decode($offer->asin); ?></td>
                                    <td><?php echo utf8_decode($offer->item); ?></td>
                                    <td><?php echo utf8_decode($offer->qty); ?></td>
                                    <td>
                                        <a href="<?php echo base_url(); ?>index.php/Admin/edit_offer/<?php echo $offer->id ?>"
                                           class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-edit"></span>
                                            Edit</a>
                                        <a href="<?php echo base_url(); ?>index.php/Admin/delete_offer/<?php echo $offer->campaign_id ?>/<?php echo $offer->id ?>"
                                           class="btn btn-danger btn-xs"
                                           onclick="return confirm('are you sure delete this offer?')">
                                            <span class="glyphicon glyphicon-remove"></span> Del</a>
                                        <a href="<?php echo base_url(); ?>index.php/Admin/view_offer/<?php echo $offer->id ?>"
                                           class="btn btn-default btn-xs"><span
                                                    class="glyphicon glyphicon-tasks"></span> View</a>
                                    </td>
                                </tr>
                            <?php } ?>

                        </table>
                        <ul class='pagination pagination-large'><?php echo $links; ?></ul>
                    </div>

                <?php } else { ?>
                    <span class="text-danger">No Offers yet</span>
                <?php } ?>


            </fieldset>

        </div>
    <?php } ?>
    </div>
</div>