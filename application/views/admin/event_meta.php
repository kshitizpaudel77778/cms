<?php
if(!$this->session->userdata('id')) {
    redirect(base_url().'admin');
}
?>

<?php $this->view('admin/header'); ?>

<h1 class="h3 mb-3 text-gray-800">Schedule Page - Meta Information</h1>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">SEO Section</h6>
    </div>
    <div class="card-body">
        <?php echo form_open(base_url().'admin/event-meta'); ?>            
            <div class="form-group">
                <label for="">Title *</label>
                <input type="text" name="seo_title" class="form-control" value="<?php echo safe_data($event_meta['seo_title']); ?>">
            </div>

            <div class="form-group">
                <label for="">Meta Description *</label>
                <textarea name="seo_meta_description" class="form-control h_100" cols="30" rows="10"><?php echo safe_data($event_meta['seo_meta_description']); ?></textarea>
            </div>
            <button type="submit" class="btn btn-success" name="form1">Update</button>
        <?php echo form_close(); ?>
    </div>
</div>

<?php $this->view('admin/footer'); ?>