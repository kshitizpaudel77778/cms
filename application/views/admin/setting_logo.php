<?php
if(!$this->session->userdata('id')) {
    redirect(base_url().'admin');
}
?>

<?php $this->view('admin/header'); ?>

<h1 class="h3 mb-3 text-gray-800">Setting - Logo</h1>

<div class="card shadow mb-4">

    <div class="card-body">
        
        <?php echo form_open_multipart(base_url().'admin/setting/logo'); ?>
            <input type="hidden" name="current_photo" value="<?php echo safe_data($setting_logo['logo']); ?>">
            <div class="form-group">
                <label for="">Existing Logo</label>
                <div><img src="<?php echo base_url(); ?>public/uploads/<?php echo safe_data($setting_logo['logo']); ?>" alt="" class="w_150"></div>
            </div>
            <div class="form-group">
                <label for="">Change Logo *</label>
                <div><input type="file" name="logo"></div>
            </div>
            <button type="submit" class="btn btn-success" name="form1">Update</button>
        <?php echo form_close(); ?>

    </div>
</div>

<?php $this->view('admin/footer'); ?>