<div class="container">
    <h3>Search for user</h3>
    <p>search for user, for example from this url <i>https://www.<strong>amazon.com</strong>/gp/pdp/profile/<strong>A2TF7IJ7VP2IXB</strong></i></p>

    <div class="row">
        <div class="col-lg-4 col-sm-4 well">
            <?php
            $attributes = array("class" => "form-horizontal", "id" => "searchform", "name" => "searchform");
            echo form_open("admin/new_reviewer", $attributes);
            ?>
            <fieldset>
                <div class="form-group">
                    <div class="row colbox">
                        <div class="col-lg-4 col-sm-4">
                            <label for="username" class="control-label">amazon marketplace</label>
                        </div>
                        <div class="col-lg-8 col-sm-8">
                            <select name="marketplace" id="marketplace">
                                <?php
                                  foreach($marketplaces as $marketplace) { ?>
                                    <option value="<?= $marketplace->marketplace ?>"><?= $marketplace->marketplace ?></option>
                                <?php
                                  } ?>
                              </select> 
                            <span class="text-danger"><?php echo form_error('username'); ?></span>
                        </div>
                    </div>
                    <div class="row colbox">
                        <div class="col-lg-4 col-sm-4">
                            <label for="username" class="control-label">amazon user id</label>
                        </div>
                        <div class="col-lg-8 col-sm-8">
                            <input class="form-control" id="username" name="username" placeholder="A2TF7IJ7VP2IXB" type="text" value="<?php echo set_value('username'); ?>" />
                            <span class="text-danger"><?php echo form_error('username'); ?></span>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-lg-12 col-sm-12 text-center">
                        <input id="btn_login" name="btn_login" type="submit" class="btn btn-default" value="search" />
                        <input id="btn_cancel" name="btn_cancel" type="reset" class="btn btn-default" value="Cancel" />
                    </div>
                </div>
            </fieldset>
            <?php echo form_close(); ?>
            <?php echo $this->session->flashdata('msg'); ?>
        </div>
    </div>
</div>