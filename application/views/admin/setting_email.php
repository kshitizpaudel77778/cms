<?php
if(!$this->session->userdata('id')) {
    redirect(base_url().'admin');
}
?>

<?php $this->view('admin/header'); ?>

<h1 class="h3 mb-3 text-gray-800">Setting - Email</h1>

<div class="card shadow mb-4">

    <div class="card-body">
        
        <?php echo form_open(base_url().'admin/setting/email'); ?>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="">Send Email From *</label>
                        <input type="text" name="send_email_from" class="form-control" value="<?php echo safe_data($setting_email['send_email_from']); ?>">
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="">Receive Email To *</label>
                        <input type="text" name="receive_email_to" class="form-control" value="<?php echo safe_data($setting_email['receive_email_to']); ?>">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="">SMTP Active *</label>
                        <select name="smtp_active" class="form-control">
                            <option value="Yes" <?php if($setting_email['smtp_active'] == 'Yes') {echo 'selected';} ?>>Yes</option>
                            <option value="No" <?php if($setting_email['smtp_active'] == 'No') {echo 'selected';} ?>>No</option>
                        </select>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="">SMTP SSL? *</label>
                        <select name="smtp_ssl" class="form-control">
                            <option value="Yes" <?php if($setting_email['smtp_ssl'] == 'Yes') {echo 'selected';} ?>>Yes</option>
                            <option value="No" <?php if($setting_email['smtp_ssl'] == 'No') {echo 'selected';} ?>>No</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="">SMTP Host *</label>
                        <input type="text" name="smtp_host" class="form-control" value="<?php echo safe_data($setting_email['smtp_host']); ?>">
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="">SMTP Port *</label>
                        <input type="text" name="smtp_port" class="form-control" value="<?php echo safe_data($setting_email['smtp_port']); ?>">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="">SMTP Username *</label>
                        <input type="text" name="smtp_username" class="form-control" value="<?php echo safe_data($setting_email['smtp_username']); ?>">
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="">SMTP Password *</label>
                        <input type="text" name="smtp_password" class="form-control" value="<?php echo safe_data($setting_email['smtp_password']); ?>">
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-success" name="form1">Update</button>
        <?php echo form_close(); ?>

    </div>
</div>

<?php $this->view('admin/footer'); ?>