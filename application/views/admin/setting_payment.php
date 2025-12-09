<?php
if(!$this->session->userdata('id')) {
    redirect(base_url().'admin');
}
?>

<?php $this->view('admin/header'); ?>

<h1 class="h3 mb-3 text-gray-800">Setting - Payment</h1>


<div class="row">
    <div class="col-md-6">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">PayPal</h6>
            </div>
            <div class="card-body">        
                <?php echo form_open(base_url().'admin/setting/payment'); ?>
                    <div class="form-group">
                        <label for="">PayPal Client ID</label>
                        <input type="text" name="paypal_client_id" class="form-control" value="<?php echo safe_data($setting_payment['paypal_client_id']); ?>">
                    </div>
                    <div class="form-group">
                        <label for="">PayPal Secret Key</label>
                        <input type="text" name="paypal_secret_key" class="form-control" value="<?php echo safe_data($setting_payment['paypal_secret_key']); ?>">
                    </div>
                    <div class="form-group">
                        <label for="">PayPal Mode</label>
                        <select name="paypal_mode" class="form-control">
                            <option value="Sandbox" <?php if($setting_payment['paypal_mode'] == 'Sandbox') {echo 'selected';} ?>>Sandbox</option>
                            <option value="Production" <?php if($setting_payment['paypal_mode'] == 'Production') {echo 'selected';} ?>>Production</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-success" name="form_paypal">Update</button>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Stripe</h6>
            </div>
            <div class="card-body">        
                <?php echo form_open(base_url().'admin/setting/payment'); ?>
                    <div class="form-group">
                        <label for="">Stripe Public Key</label>
                        <input type="text" name="stripe_public_key" class="form-control" value="<?php echo safe_data($setting_payment['stripe_public_key']); ?>">
                    </div>
                    <div class="form-group">
                        <label for="">Stripe Secret Key</label>
                        <input type="text" name="stripe_secret_key" class="form-control" value="<?php echo safe_data($setting_payment['stripe_secret_key']); ?>">
                    </div>
                    <button type="submit" class="btn btn-success" name="form_stripe">Update</button>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>



<?php $this->view('admin/footer'); ?>