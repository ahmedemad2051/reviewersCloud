<div class="container">
    <div class="row">
        <div class="col-lg-4 col-sm-4 well">
            <?php
            $attributes = array("class" => "form-horizontal", "id" => "editform", "name" => "editform");
            echo form_open("admin/edit_clients/".$id, $attributes);
            ?>
            <fieldset>
                <legend>Edit client</legend>
                <?php echo validation_errors('<p class="error">'); ?>
                <div class="form-group">
                    <div class="row colbox">
                        <div class="col-lg-4 col-sm-4">
                            <label for="password" class="control-label">amazon_name</label>
                        </div>
                        <div class="col-lg-8 col-sm-8">
                            <?php
                            echo form_input(array('name' => 'amazon_name',
                                'id' => 'amazon_name',
                                'value' => set_value('amazon_name', $amazon_name)));
                            ?>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row colbox">
                        <div class="col-lg-4 col-sm-4">
                            <label for="password" class="control-label">contact_first_name </label>
                        </div>
                        <div class="col-lg-8 col-sm-8">
                            <?php
                            echo form_input(array('name' => 'contact_first_name',
                                'id' => 'contact_first_name',
                                'value' => set_value('contact_first_name', $contact_first_name)));
                            ?>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row colbox">
                        <div class="col-lg-4 col-sm-4">
                            <label for="contact_last_name" class="control-label">contact_last_name </label>
                        </div>
                        <div class="col-lg-8 col-sm-8">
                            <?php
                            echo form_input(array('name' => 'contact_last_name',
                                'id' => 'contact_last_name',
                                'value' => set_value('contact_last_name', $contact_last_name)));
                            ?>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row colbox">
                        <div class="col-lg-4 col-sm-4">
                            <label for="contact_phone" class="control-label">contact_phone </label>
                        </div>
                        <div class="col-lg-8 col-sm-8">
                            <?php
                            echo form_input(array('name' => 'contact_phone',
                                'id' => 'contact_phone',
                                'value' => set_value('contact_phone', $contact_phone)));
                            ?>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row colbox">
                        <div class="col-lg-4 col-sm-4">
                            <label for="contact_fax" class="control-label">contact_fax </label>
                        </div>
                        <div class="col-lg-8 col-sm-8">
                            <?php
                            echo form_input(array('name' => 'contact_fax',
                                'id' => 'contact_fax',
                                'value' => set_value('contact_fax', $contact_fax)));
                            ?>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row colbox">
                        <div class="col-lg-4 col-sm-4">
                            <label for="contact_email" class="control-label">contact_email </label>
                        </div>
                        <div class="col-lg-8 col-sm-8">
                            <?php
                            echo form_input(array('name' => 'contact_email',
                                'id' => 'contact_email',
                                'value' => set_value('contact_email', $contact_email)));
                            ?>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row colbox">
                        <div class="col-lg-4 col-sm-4">
                            <label for="contact_password" class="control-label">contact_password </label>
                        </div>
                        <div class="col-lg-8 col-sm-8">
                            <?php
                            echo form_input(array('name' => 'contact_password',
                                'id' => 'contact_password',
                                'value' => set_value('contact_password', $contact_password)));
                            ?>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row colbox">
                        <div class="col-lg-4 col-sm-4">
                            <label for="amazon_id" class="control-label">amazon_id </label>
                        </div>
                        <div class="col-lg-8 col-sm-8">
                            <?php
                            echo form_input(array('name' => 'amazon_id',
                                'id' => 'amazon_id',
                                'value' => set_value('amazon_id', $amazon_id)));
                            ?>
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
                                $the_marketplace_id = 'marketplace_'.$marketplace->id;
                                $data = array(
                                    'name' => $the_marketplace_id,
                                    'id' => $the_marketplace_id,
                                    'value' => $the_marketplace,
                                    'checked' => set_checkbox($the_marketplace_id, $the_marketplace, in_array($the_marketplace,explode(',',$marketplaces)) ? true : '')
                                );
                                echo $the_marketplace;
                                echo form_checkbox($data);
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row colbox">
                        <div class="col-lg-4 col-sm-4">
                            <label for="categories" class="control-label">categories </label>
                        </div>
                        <div class="col-lg-8 col-sm-8">
                            <?php
                            foreach ($all_categories as $marketplace) {
                                $the_marketplace = $marketplace->category;
                                $the_marketplace_id = 'category_'.$marketplace->id;
                                $data = array(
                                    'name' => $the_marketplace_id,
                                    'id' => $the_marketplace_id,
                                    'value' => $the_marketplace,
                                    'checked' => set_checkbox($the_marketplace_id, $the_marketplace, in_array($the_marketplace,explode(',',$categories)) ? true : '')
                                );
                                echo $the_marketplace;
                                echo form_checkbox($data);
                            }
                            ?>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row colbox">
                        <div class="col-lg-4 col-sm-4">
                            <label for="company_name" class="control-label">company_name </label>
                        </div>
                        <div class="col-lg-8 col-sm-8">
                            <?php
                            echo form_input(array('name' => 'company_name',
                                'id' => 'company_name',
                                'value' => set_value('company_name', $company_name)));
                            ?>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row colbox">
                        <div class="col-lg-4 col-sm-4">
                            <label for="billing_address_1" class="control-label">billing_address_1 </label>
                        </div>
                        <div class="col-lg-8 col-sm-8">
                            <?php
                            echo form_input(array('name' => 'billing_address_1',
                                'id' => 'billing_address_1',
                                'value' => set_value('billing_address_1', $billing_address_1)));
                            ?>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row colbox">
                        <div class="col-lg-4 col-sm-4">
                            <label for="billing_address_2" class="control-label">billing_address_2 </label>
                        </div>
                        <div class="col-lg-8 col-sm-8">
                            <?php
                            echo form_input(array('name' => 'billing_address_2',
                                'id' => 'billing_address_2',
                                'value' => set_value('billing_address_2', $billing_address_2)));
                            ?>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row colbox">
                        <div class="col-lg-4 col-sm-4">
                            <label for="billing_department" class="control-label">billing_department </label>
                        </div>
                        <div class="col-lg-8 col-sm-8">
                            <?php
                            echo form_input(array('name' => 'billing_department',
                                'id' => 'billing_department',
                                'value' => set_value('billing_department', $billing_department)));
                            ?>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row colbox">
                        <div class="col-lg-4 col-sm-4">
                            <label for="billing_city" class="control-label">billing_city </label>
                        </div>
                        <div class="col-lg-8 col-sm-8">
                            <?php
                            echo form_input(array('name' => 'billing_city',
                                'id' => 'billing_city',
                                'value' => set_value('billing_city', $billing_city)));
                            ?>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row colbox">
                        <div class="col-lg-4 col-sm-4">
                            <label for="billing_zip" class="control-label">billing_zip </label>
                        </div>
                        <div class="col-lg-8 col-sm-8">
                            <?php
                            echo form_input(array('name' => 'billing_zip',
                                'id' => 'billing_zip',
                                'value' => set_value('billing_zip', $billing_zip)));
                            ?>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row colbox">
                        <div class="col-lg-4 col-sm-4">
                            <label for="billing_state" class="control-label">billing_state </label>
                        </div>
                        <div class="col-lg-8 col-sm-8">
                            <?php
                            echo form_input(array('name' => 'billing_state',
                                'id' => 'billing_state',
                                'value' => set_value('billing_state', $billing_state)));
                            ?>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row colbox">
                        <div class="col-lg-4 col-sm-4">
                            <label for="billing_country" class="control-label">billing_country </label>
                        </div>
                        <div class="col-lg-8 col-sm-8">
                            <?php
                            echo form_input(array('name' => 'billing_country',
                                'id' => 'billing_country',
                                'value' => set_value('billing_country', $billing_country)));
                            ?>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row colbox">
                        <div class="col-lg-4 col-sm-4">
                            <label for="password" class="control-label">billing_cycle </label>
                        </div>
                        <div class="col-lg-8 col-sm-8">
                            weekly
                            <?php
                            $data = array(
                                'name' => 'billing_cycle',
                                'id' => 'billing_cycle_weekly',
                                'value' => 'weekly',
                                'checked' => ((set_value('billing_cycle') === 'weekly' || $billing_cycle == 'weekly') ? TRUE : FALSE),
                            );
                            echo form_radio($data);
                            ?> monthly <?php
                            $data = array(
                                'name' => 'billing_cycle',
                                'id' => 'billing_cycle_monthly',
                                'value' => 'monthly',
                                'checked' => ((set_value('billing_cycle') === 'monthly' || $billing_cycle == 'monthly') ? TRUE : FALSE),
                            );
                            echo form_radio($data);
                            ?> yearly <?php
                            $data = array(
                                'name' => 'billing_cycle',
                                'id' => 'billing_cycle_yearly',
                                'value' => 'yearly',
                                'checked' => ((set_value('billing_cycle') === 'yearly' || $billing_cycle == 'yearly') ? TRUE : FALSE),
                            );
                            echo form_radio($data);
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