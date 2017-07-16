<div class="container">
    <h3>Edit offer</h3>

    <div class="">
        <div class="col-lg-5 col-sm-5 well">
            <?php
            $attributes = array("class" => "form-horizontal", "id" => "searchform", "name" => "searchform");
            echo form_open("admin/edit_offer/".$offer->id, $attributes);
            ?>
            <div class="col-xs-12">
                <div class="form-group">
                    <div class="row colbox">
                        <div class="col-lg-4 col-sm-4">
                            <label for="client" class="control-label">marketplace</label>
                        </div>
                        <div class="col-lg-7 col-sm-7">
                            <select name="marketplace" id="marketplace" class="form-control">
                                <!--                                <option>select marketplace</option>-->
                                <?php
                                foreach (explode(',',$campaign->marketplaces) as $market) { ?>
                                    <option <?php if($offer->marketplace == $market) {echo 'selected';} ?> value="<?= $market ?>"><?= $market ?></option>
                                    <?php
                                } ?>
                            </select>
                            <span class="text-danger"><?php echo form_error('marketplace'); ?></span>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row colbox">
                        <div class="col-lg-4 col-sm-4">
                            <label for="asin" class="control-label">asin</label>
                        </div>
                        <div class="col-lg-8 col-sm-8">
                            <input class="form-control" id="asin" name="asin" type="text"
                                   value="<?php echo $offer->asin; ?>"/>
                            <span class="text-danger"><?php echo form_error('asin'); ?></span>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row colbox">
                        <div class="col-lg-4 col-sm-4">
                            <label for="item" class="control-label">item</label>
                        </div>
                        <div class="col-lg-8 col-sm-8">
                            <input class="form-control" id="item" name="item" type="text"
                                   value="<?php echo $offer->item; ?>"/>
                            <span class="text-danger"><?php echo form_error('item'); ?></span>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row colbox">
                        <div class="col-lg-4 col-sm-4">
                            <label for="qty" class="control-label">qty</label>
                        </div>
                        <div class="col-lg-8 col-sm-8">
                            <input class="form-control" id="qty" name="qty" type="number"
                                   value="<?php echo $offer->qty; ?>"/>
                            <span class="text-danger"><?php echo form_error('qty'); ?></span>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row colbox">
                        <div class="col-lg-4 col-sm-4">
                            <label for="super_url" class="control-label">super_url</label>
                        </div>
                        <div class="col-lg-8 col-sm-8">
                            <input class="form-control" id="super_url" name="super_url" type="text"
                                   value="<?php echo $offer->super_url; ?>"/>
                            <span class="text-danger"><?php echo form_error('super_url'); ?></span>
                        </div>
                    </div>
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