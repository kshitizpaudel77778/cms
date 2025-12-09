<?php
if(!$this->session->userdata('id')) {
    redirect(base_url().'admin');
}
?>

<?php $this->view('admin/header'); ?>

<h1 class="h3 mb-3 text-gray-800">Copyright</h1>

<div class="card shadow mb-4">
    <div class="card-body">        
        <?php echo form_open(base_url().'admin/copyright'); ?>
            <div class="form-group">
                <label for="">Copyright Text *</label>
                <input type="text" name="copyright_text" class="form-control" value="<?php echo safe_data($copyright['copyright_text']); ?>">
            </div>
            <button type="submit" class="btn btn-success" name="form1">Update</button>
        <?php echo form_close(); ?>
    </div>
</div>

<?php $this->view('admin/footer'); ?>