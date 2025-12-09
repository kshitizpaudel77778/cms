<?php
if(!$this->session->userdata('id')) {
    redirect(base_url().'admin');
}
?>

<?php $this->view('admin/header'); ?>

<h1 class="h3 mb-3 text-gray-800">Setting - Ticket</h1>

<div class="card shadow mb-4">

    <div class="card-body">
        
        <?php echo form_open(base_url().'admin/setting/ticket'); ?>
            <div class="row">
                <div class="col-md-8">
                    <div class="form-group">
                        <label for="">Agree Text *</label>
                        <textarea name="agree_text" class="form-control editor" cols="30" rows="10"><?php echo safe_data($setting_ticket['agree_text']); ?></textarea>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-success" name="form1">Update</button>
        <?php echo form_close(); ?>

    </div>
</div>

<?php $this->view('admin/footer'); ?>