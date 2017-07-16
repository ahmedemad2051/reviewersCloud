<div class="container">
    <div class="row">
        <div class="col-lg-4 col-sm-4 well">
            <?php
            $attributes = array("class" => "form-horizontal", "id" => "editform", "name" => "editform");
            echo form_open("admin/edit_reviewer/" . $amazon_user_id, $attributes);
            ?>
            <fieldset>
                <legend>edit reviewer</legend>
                <?php echo validation_errors('<p class="error">'); ?>
                <div class="form-group">
                    <div class="row colbox">
                        <div class="col-lg-4 col-sm-4">
                            <label for="username" class="control-label">amazon_user_id </label>
                        </div>
                        <div class="col-lg-8 col-sm-8">
                            <?php
                            echo $amazon_user_id;
                            ?>
                            <span class="text-danger"><?php echo form_error('username'); ?></span>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row colbox">
                        <div class="col-lg-4 col-sm-4">
                            <label for="password" class="control-label">amazon_user_name</label>
                        </div>
                        <div class="col-lg-8 col-sm-8">
                            <?php
                            echo form_input(array('name' => 'amazon_user_name',
                                'id' => 'amazon_user_name',
                                'value' => set_value('amazon_user_name', $amazon_user_name)));
                            ?>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row colbox">
                        <div class="col-lg-4 col-sm-4">
                            <label for="password" class="control-label">ranking </label>
                        </div>
                        <div class="col-lg-8 col-sm-8">
                            <?php
                            echo form_input(array('name' => 'ranking',
                                'id' => 'ranking',
                                'value' => set_value('ranking', $ranking)));
                            ?>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row colbox">
                        <div class="col-lg-4 col-sm-4">
                            <label for="password" class="control-label">profile_email_address </label>
                        </div>
                        <div class="col-lg-8 col-sm-8">
                            <?php
                            echo form_input(array('name' => 'profile_email_address',
                                'id' => 'profile_email_address',
                                'value' => set_value('profile_email_address ', $profile_email_address)));
                            ?>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row colbox">
                        <div class="col-lg-4 col-sm-4">
                            <label for="password" class="control-label">profile_website </label>
                        </div>
                        <div class="col-lg-8 col-sm-8">
                            <?php
                            echo form_input(array('name' => 'profile_website',
                                'id' => 'profile_website',
                                'value' => set_value('profile_website', $profile_website)));
                            ?>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row colbox">
                        <div class="col-lg-4 col-sm-4">
                            <label for="password" class="control-label">home_marketplace </label>
                        </div>
                        <div class="col-lg-8 col-sm-8">
                            <select name="home_marketplace" id="home_marketplace">
                                <?php foreach ($marketplaces as $marketplace) { ?>
                                    <option value="<?= $marketplace->marketplace ?>" 
                                            <?php if ($marketplace->marketplace == $home_marketplace) echo 'selected="selected"'; ?>>
                                                <?= $marketplace->marketplace ?>
                                    </option>
                                <?php }
                                ?>
                            </select> 
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row colbox">
                        <div class="col-lg-4 col-sm-4">
                            <label for="password" class="control-label">shipping_country </label>
                        </div>
                        <div class="col-lg-8 col-sm-8">
                            <?php
                            echo form_input(array('name' => 'shipping_country',
                                'id' => 'shipping_country',
                                'value' => set_value('shipping_country', $shipping_country)));
                            ?>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row colbox">
                        <div class="col-lg-4 col-sm-4">
                            <label for="password" class="control-label">prime_member </label>
                        </div>
                        <div class="col-lg-8 col-sm-8">
                            yes
                            <?php
                            $data = array(
                                'name' => 'prime_member',
                                'id' => 'prime_member_yes',
                                'value' => 1,
                                'checked' => ((set_value('prime_member') === '1' || $prime_member == 1) ? TRUE : FALSE),
                            );
                            echo form_radio($data);
                            ?> no <?php
                            $data = array(
                                'name' => 'prime_member',
                                'id' => 'prime_member_no',
                                'value' => 0,
                                'checked' => ((set_value('prime_member') === '0' || $prime_member == 0) ? TRUE : FALSE),
                            );
                            echo form_radio($data);
                            ?>

                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row colbox">
                        <div class="col-lg-4 col-sm-4">
                            <label for="password" class="control-label">average_stars </label>
                        </div>
                        <div class="col-lg-8 col-sm-8">
                            <?php
                            echo form_input(array('name' => 'average_stars',
                                'id' => 'average_stars',
                                'value' => set_value('average_stars', $average_stars)));
                            ?>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row colbox">
                        <div class="col-lg-4 col-sm-4">
                            <label for="password" class="control-label">average_words </label>
                        </div>
                        <div class="col-lg-8 col-sm-8">
                            <?php
                            echo form_input(array('name' => 'average_words',
                                'id' => 'average_words',
                                'value' => set_value('average_words ', $average_words)));
                            ?>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row colbox">
                        <div class="col-lg-4 col-sm-4">
                            <label for="payment" class="control-label">preferred payment </label>
                        </div>
                        <div class="col-lg-8 col-sm-8">
                            <?php
                            $options = array(
                                '' => 'please select',
                                'paypal' => 'paypal',
                                'bank' => 'bank transfer',
                                'check_or_money_order' => 'check or money order',
                            );

                            $js = 'id="payment" onChange="payment_changed();"';
                            echo form_dropdown('payment', $options, '', $js);


                            echo "<div id = 'paypal_div' style='display:none'></br> paypal_email ";
                            echo form_input(array('name' => 'paypal_email',
                                'id' => 'paypal_email',
                                'value' => set_value('paypal_email')));

                            echo "</div><div id = 'bank_div'  style='display:none'></br> bank_details ";
                            echo form_input(array('name' => 'bank_details',
                                'id' => 'bank_details',
                                'value' => set_value('bank_details')));

                            echo "</div><div id = 'check_div'  style='display:none'></br> address ";
                            echo form_input(array('name' => 'address',
                                'id' => 'address',
                                'value' => set_value('address')));
                            echo "</div>";
                            ?>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-lg-12 col-sm-12 text-center">
                        <input id="btn_login" name="btn_save" type="submit" class="btn btn-default" value="Save" />
                        <input id="btn_cancel" name="btn_cancel" type="reset" class="btn btn-default" value="Cancel" />
                    </div>
                </div>
            </fieldset>
            <?php echo form_close(); ?>
            <?php echo $this->session->flashdata('msg'); ?>
        </div>
    </div>
</div>

<script type="text/javascript">
    function payment_changed() {
        switch ($('#payment').val()){
            case 'paypal':
                $('#paypal_div').show();
                $('#bank_div').hide();
                $('#check_div').hide();
                break;
            case 'bank':
                $('#paypal_div').hide();
                $('#bank_div').show();
                $('#check_div').hide();
                break;
            case 'check_or_money_order':
                $('#paypal_div').hide();
                $('#bank_div').hide();
                $('#check_div').show();
                break;
            default:
                $('#paypal_div').hide();
                $('#bank_div').hide();
                $('#check_div').hide();
        }
    }
</script>