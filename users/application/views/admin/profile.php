<div class="container">
    <h3>profile</h3>

    <div class="">
        <div class="col-lg-5 col-sm-5 well">
            <?php
            $attributes = array("class" => "form-horizontal", "id" => "searchform", "name" => "searchform");
            echo form_open("admin/profile", $attributes);
            ?>

            <div class="form-group">
                <div class="row colbox">
                    <div class="col-lg-4 col-sm-4">
                        <label for="profile_id" class="control-label">id</label>
                    </div>
                    <div class="col-lg-8 col-sm-8">
                        <input class="form-control" id="profile_id" name="profile_id" type="text"
                               value="<?php echo set_value('profile_id'); ?>"/>
                        <span class="text-danger"><?php echo form_error('profile_id'); ?></span>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row colbox">
                    <div class="col-lg-4 col-sm-4">
                        <label for="email_contact" class="control-label">first name</label>
                    </div>
                    <div class="col-lg-8 col-sm-8">
                        <input class="form-control" id="email_contact" name="email_contact" type="text"
                               value="<?php echo set_value('email_contact'); ?>"/>
                        <span class="text-danger"><?php echo form_error('email_contact'); ?></span>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row colbox">
                    <div class="col-lg-4 col-sm-4">
                        <label for="last_name" class="control-label">last name</label>
                    </div>
                    <div class="col-lg-8 col-sm-8">
                        <input class="form-control" id="last_name" name="last_name" type="text"
                               value="<?php echo set_value('last_name'); ?>"/>
                        <span class="text-danger"><?php echo form_error('last_name'); ?></span>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row colbox">
                    <div class="col-lg-4 col-sm-4">
                        <label class="control-label">region</label>
                    </div>
                    <div class="col-lg-8 col-sm-8">
                        <input name="region" type="radio" value="north_america" checked/>North America
                        <input name="region" type="radio" value="europe"/>Europe
                        <input name="region" type="radio" value="asia_pacific"/>Asia Pacific
                        <span class="text-danger"><?php echo form_error('region'); ?></span>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row colbox">
                    <div class="col-lg-4 col-sm-4">
                        <label class="control-label">marketplace</label>
                    </div>
                    <div class="col-lg-8 col-sm-8">
                        <input name="marketplace_primary" type="radio" value="USA"/>USA
                        <input name="marketplace_primary" type="radio" value="Canada"/>Canada
                        <input name="marketplace_primary" type="radio" value="México"/>México(North America)
                        <br>
                        <input name="marketplace_primary" type="radio" value="UK"/>UK
                        <input name="marketplace_primary" type="radio" value="Germany"/>Germany
                        <input name="marketplace_primary" type="radio" value="France"/>France
                        <input name="marketplace_primary" type="radio" value="Italy"/>Italy
                        <br>
                        <input name="marketplace_primary" type="radio" value="Spain"/>Spain(Europe)
                        <input name="marketplace_primary" type="radio" value="India"/>India
                        <input name="marketplace_primary" type="radio" value="Japan"/>Japan
                        <br>
                        <input name="marketplace_primary" type="radio" value="China"/>China(Asia Pacific)
                        <span class="text-danger"><?php echo form_error('marketplace_primary'); ?></span>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row colbox">
                    <div class="col-lg-4 col-sm-4">
                        <label class="control-label">more</label>
                    </div>
                    <div class="col-lg-8 col-sm-8">
                        <input name="marketplace_more[]" type="checkbox" value="USA"/>USA
                        <input name="marketplace_more[]" type="checkbox" value="Canada"/>Canada
                        <input name="marketplace_more[]" type="checkbox" value="México"/>México(North America)
                        <br>
                        <input name="marketplace_more[]" type="checkbox" value="UK"/>UK
                        <input name="marketplace_more[]" type="checkbox" value="Germany"/>Germany
                        <input name="marketplace_more[]" type="checkbox" value="France"/>France
                        <input name="marketplace_more[]" type="checkbox" value="Italy"/>Italy
                        <br>
                        <input name="marketplace_more[]" type="checkbox" value="Spain"/>Spain(Europe)
                        <input name="marketplace_more[]" type="checkbox" value="India"/>India
                        <input name="marketplace_more[]" type="checkbox" value="Japan"/>Japan
                        <br>
                        <input name="marketplace_more[]" type="checkbox" value="China"/>China(Asia Pacific)
                        <span class="text-danger"><?php echo form_error('marketplace_more[]'); ?></span>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row colbox">
                    <div class="col-lg-4 col-sm-4">
                        <label for="email_contact" class="control-label">email contact</label>
                    </div>
                    <div class="col-lg-8 col-sm-8">
                        <input class="form-control" id="email_contact" name="email_contact" type="email"
                               value="<?php echo set_value('email_contact'); ?>"/>
                        <span class="text-danger"><?php echo form_error('email_contact'); ?></span>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row colbox">
                    <div class="col-lg-4 col-sm-4">
                        <label for="email_profile" class="control-label">email profile</label>
                    </div>
                    <div class="col-lg-8 col-sm-8">
                        <input class="form-control" id="email_profile" name="email_profile" type="email"
                               value="<?php echo set_value('email_profile'); ?>"/>
                        <span class="text-danger"><?php echo form_error('email_profile'); ?></span>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row colbox">
                    <div class="col-lg-4 col-sm-4">
                        <label class="control-label">reimbursement</label>
                    </div>
                    <div class="col-lg-8 col-sm-8">
                        <input name="reimbursement[]" type="checkbox" value="paypal"/>paypal
                        <input name="reimbursement[]" type="checkbox" value="SEPA"/>SEPA
                        <input name="reimbursement[]" type="checkbox" value="ACH"/>ACH
                        <br>
                        <input name="reimbursement[]" type="checkbox" value="check"/>check
                        <input name="reimbursement[]" type="checkbox" value="money_order"/>money order
                        <input name="reimbursement[]" type="checkbox" value="amazon_gift_card"/>amazon gift card
                        <span class="text-danger"><?php echo form_error('reimbursement[]'); ?></span>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row colbox">
                    <div class="col-lg-4 col-sm-4">
                        <label for="paypal" class="control-label">paypal</label>
                    </div>
                    <div class="col-lg-8 col-sm-8">
                        <input class="form-control" id="paypal" name="paypal" type="text"
                               value="<?php echo set_value('paypal'); ?>"/>
                        <span class="text-danger"><?php echo form_error('paypal'); ?></span>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row colbox">
                    <div class="col-lg-4 col-sm-4">
                        <label for="account_holder" class="control-label">account holder</label>
                    </div>
                    <div class="col-lg-8 col-sm-8">
                        <input class="form-control" id="account_holder" name="account_holder" type="text"
                               value="<?php echo set_value('account_holder'); ?>"/>
                        <span class="text-danger"><?php echo form_error('account_holder'); ?></span>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row colbox">
                    <div class="col-lg-4 col-sm-4">
                        <label for="IBAN" class="control-label">IBAN</label>
                    </div>
                    <div class="col-lg-8 col-sm-8">
                        <input class="form-control" id="IBAN" name="IBAN" type="text"
                               value="<?php echo set_value('IBAN'); ?>"/>
                        <span class="text-danger"><?php echo form_error('IBAN'); ?></span>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row colbox">
                    <div class="col-lg-4 col-sm-4">
                        <label for="BIC" class="control-label">BIC</label>
                    </div>
                    <div class="col-lg-8 col-sm-8">
                        <input class="form-control" id="BIC" name="BIC" type="text"
                               value="<?php echo set_value('BIC'); ?>"/>
                        <span class="text-danger"><?php echo form_error('BIC'); ?></span>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row colbox">
                    <div class="col-lg-4 col-sm-4">
                        <label for="facebook_profile" class="control-label">facebook profile</label>
                    </div>
                    <div class="col-lg-8 col-sm-8">
                        <input class="form-control" id="facebook_profile" name="facebook_profile" type="text"
                               value="<?php echo set_value('facebook_profile'); ?>"/>
                        <span class="text-danger"><?php echo form_error('facebook_profile'); ?></span>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row colbox">
                    <div class="col-lg-4 col-sm-4">
                        <label for="facebook_page" class="control-label">facebook page</label>
                    </div>
                    <div class="col-lg-8 col-sm-8">
                        <input class="form-control" id="facebook_page" name="facebook_page" type="text"
                               value="<?php echo set_value('facebook_page'); ?>"/>
                        <span class="text-danger"><?php echo form_error('facebook_page'); ?></span>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row colbox">
                    <div class="col-lg-4 col-sm-4">
                        <label for="facebook_group" class="control-label">facebook group</label>
                    </div>
                    <div class="col-lg-8 col-sm-8">
                        <input class="form-control" id="facebook_group" name="facebook_group" type="text"
                               value="<?php echo set_value('facebook_group'); ?>"/>
                        <span class="text-danger"><?php echo form_error('facebook_group'); ?></span>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row colbox">
                    <div class="col-lg-4 col-sm-4">
                        <label for="youtube" class="control-label">youtube</label>
                    </div>
                    <div class="col-lg-8 col-sm-8">
                        <input class="form-control" id="youtube" name="youtube" type="text"
                               value="<?php echo set_value('youtube'); ?>"/>
                        <span class="text-danger"><?php echo form_error('youtube'); ?></span>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row colbox">
                    <div class="col-lg-4 col-sm-4">
                        <label for="website" class="control-label">website</label>
                    </div>
                    <div class="col-lg-8 col-sm-8">
                        <input class="form-control" id="website" name="website" type="text"
                               value="<?php echo set_value('website'); ?>"/>
                        <span class="text-danger"><?php echo form_error('website'); ?></span>
                    </div>
                </div>
            </div>


            <div class="form-group">
                <div class="col-lg-12 col-sm-12 text-center">
                    <input id="btn_login" name="btn_save" type="submit" class="btn btn-default" value="create new"/>
                    <input id="btn_cancel" name="btn_cancel" type="reset" class="btn btn-default" value="Cancel"/>
                </div>
            </div>
        </div>
        <?php echo form_close(); ?>
    </div>
</div>
