<div class="container">
    <h3>Create campaign</h3>

    <div class="">
        <div class="col-lg-5 col-sm-5 well">
            <?php
            $attributes = array("class" => "form-horizontal", "id" => "searchform", "name" => "searchform");
            echo form_open("admin/edit_campaign/".$campaign->id, $attributes);
            ?>
            <div class="col-xs-12">
                <div class="form-group">
                    <div class="row colbox">
                        <div class="col-lg-4 col-sm-4">
                            <label for="client" class="control-label">client</label>
                        </div>
                        <div class="col-lg-7 col-sm-7">
                            <select name="client" id="client" class="form-control">
                                <option>select client</option>
                                <?php
                                foreach ($clients as $client) { ?>
                                    <option <?php if($client->id == $campaign->client_id)  {echo 'selected';}  ?> value="<?= $client->id ?>"><?= $client->contact_first_name ?> <?= $client->contact_last_name ?></option>
                                    <?php
                                } ?>
                            </select>
                            <span class="text-danger"><?php echo form_error('client'); ?></span>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row colbox">
                        <div class="col-lg-4 col-sm-4">
                            <label for="marketplaces" class="control-label">marketplaces </label>
                        </div>
                        <div class="col-lg-8 col-sm-8">
                            <?php
                            foreach ($all_marketplaces as $marketplace) {
                                $the_marketplace = $marketplace->marketplace;
//                                $the_marketplace_id = 'marketplace_' . $marketplace->id;
                                $the_marketplace_id = 'marketplaces[]';
                                $data = array(
                                    'name' => $the_marketplace_id,
                                    'id' => $the_marketplace_id,
                                    'value' => $the_marketplace,
                                    'checked' => set_checkbox($the_marketplace_id, $the_marketplace, in_array($the_marketplace,explode(',',$campaign->marketplaces)) ? true : '')

                                );
                                echo "<label for='" . $the_marketplace_id . "'>" . $the_marketplace . "</label>";
                                echo form_checkbox($data);

                            }
                            ?>
                            <span class="text-danger"><?php echo form_error('marketplaces'); ?></span>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row colbox">
                        <div class="col-lg-4 col-sm-4">
                            <label for="name" class="control-label">Campaign name</label>
                        </div>
                        <div class="col-lg-8 col-sm-8">
                            <input class="form-control" id="name" name="name" type="text"
                                   value="<?php echo $campaign->name; ?>"/>
                            <span class="text-danger"><?php echo form_error('name'); ?></span>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row colbox">
                        <div class="col-lg-4 col-sm-4">
                            <label for="start" class="control-label">Start date</label>
                        </div>
                        <div class="col-lg-8 col-sm-8">
                            <input class="form-control" id="start" name="start_date" value="<?php echo $campaign->start_date; ?>" type="date"/>
                            <span class="text-danger"><?php echo form_error('start_date'); ?></span>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row colbox">
                        <div class="col-lg-4 col-sm-4">
                            <label for="end" class="control-label">End date</label>
                        </div>
                        <div class="col-lg-8 col-sm-8">
                            <input class="form-control" id="end" name="end_date" value="<?php echo $campaign->end_date; ?>" type="date"/>
                            <span class="text-danger"><?php echo form_error('end_date'); ?></span>
                        </div>
                    </div>
                    no end date
                    <input type="checkbox" name="no_end" value=true>
                </div>

                <div class="form-group">
                    <div class="col-lg-12 col-sm-12 text-center">
                        <input id="btn_login" name="btn_save" type="submit" class="btn btn-default" value="update"/>
                        <input id="btn_cancel" name="btn_cancel" type="reset" class="btn btn-default" value="Cancel"/>
                    </div>
                </div>
            </div>
            <?php echo form_close(); ?>
            <?php echo $this->session->flashdata('msg'); ?>
        </div>
    </div>
</div>