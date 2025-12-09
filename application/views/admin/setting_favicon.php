<?php
if(!$this->session->userdata('id')) {
    redirect(base_url().'admin');
}
?>

<?php $this->view('admin/header'); ?>

<h1 class="h3 mb-3 text-gray-800">Setting - Favicon</h1>

<div class="card shadow mb-4">

    <div class="card-body">
        
        <?php echo form_open_multipart(base_url().'admin/setting/favicon'); ?>
            <input type="hidden" name="current_photo" value="<?php echo safe_data($setting_favicon['favicon']); ?>">
            <div class="form-group">
                <label for="">Existing Favicon</label>
                <div><img src="<?php echo base_url(); ?>public/uploads/<?php echo safe_data($setting_favicon['favicon']); ?>" alt="" class="w_50"></div>
            </div>
            <div class="form-group">
                <label for="">Change Favicon *</label>
                <div><input type="file" name="favicon"></div>
            </div>
            <button type="submit" class="btn btn-success" name="form_setting_favicon">Update</button>
        <?php echo form_close(); ?>

    </div>
</div>

<?php $this->view('admin/footer'); ?>