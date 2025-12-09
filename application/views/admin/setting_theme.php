<?php
if(!$this->session->userdata('id')) {
    redirect(base_url().'admin');
}
?>

<?php $this->view('admin/header'); ?>

<h1 class="h3 mb-3 text-gray-800">Setting - Theme</h1>

<div class="card shadow mb-4">

    <div class="card-body">
        
        <?php echo form_open(base_url().'admin/setting/theme'); ?>
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="">Front End Color *</label>
                        <input type="text" name="front_end_color" class="form-control jscolor" value="<?php echo safe_data($setting_theme['front_end_color']); ?>">
                    </div>
                    <div class="form-group">
                        <label for="">Theme Direction *</label>
                        <select name="theme_direction" class="form-control">
                            <option value="ltr" <?php if($setting_theme['theme_direction'] == 'ltr') {echo 'selected';} ?>>Left to Right (LTR)</option>
                            <option value="rtl" <?php if($setting_theme['theme_direction'] == 'rtl') {echo 'selected';} ?>>Right to Left (RTL)</option>
                        </select>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-success" name="form1">Update</button>
        <?php echo form_close(); ?>

    </div>
</div>

<?php $this->view('admin/footer'); ?>