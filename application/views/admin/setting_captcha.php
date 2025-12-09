<?php
if(!$this->session->userdata('id')) {
    redirect(base_url().'admin');
}
?>

<?php $this->view('admin/header'); ?>

<h1 class="h3 mb-3 text-gray-800">Setting - Captcha</h1>

<div class="card shadow mb-4">

    <div class="card-body">
        
        <?php echo form_open(base_url().'admin/setting/captcha'); ?>
            <div class="row">
                <div class="col-md-5">
                    <div class="form-group">
                        <label for="">Recaptcha Site Key *</label>
                        <input type="text" name="recaptcha_site_key" class="form-control" value="<?php echo safe_data($setting_captcha['recaptcha_site_key']); ?>">
                    </div>
                    <div class="form-group">
                        <label for="">Captcha Status</label>
                        <select name="captcha_status" class="form-control">
                            <option value="On" <?php if($setting_captcha['captcha_status'] == 'On') {echo 'selected';} ?>>On</option>
                            <option value="Off" <?php if($setting_captcha['captcha_status'] == 'Off') {echo 'selected';} ?>>Off</option>
                        </select>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-success" name="form1">Update</button>
        <?php echo form_close(); ?>

    </div>
</div>

<?php $this->view('admin/footer'); ?>