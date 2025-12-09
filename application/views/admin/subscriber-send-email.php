<?php
if(!$this->session->userdata('id')) {
    redirect(base_url().'admin');
}
?>

<?php $this->view('admin/header'); ?>

<h1 class="h3 mb-3 text-gray-800">Send Email to Subscribers</h1>

<div class="card shadow mb-4">
    <div class="card-body">        
        <?php echo form_open(base_url().'admin/subscriber/send-email'); ?>
            <div class="form-group">
                <label for="">Subject *</label>
                <input type="text" name="subject" class="form-control" value="">
            </div>
            <div class="form-group">
                <label for="">Message *</label>
                <textarea name="message" class="form-control editor" cols="30" rows="10"></textarea>
            </div>
            <button type="submit" class="btn btn-success" name="form1">Send Email</button>
        <?php echo form_close(); ?>
    </div>
</div>

<?php $this->view('admin/footer'); ?>