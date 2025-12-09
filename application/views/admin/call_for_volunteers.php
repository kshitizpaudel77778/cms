<?php
if(!$this->session->userdata('id')) {
    redirect(base_url().'admin');
}
?>

<?php $this->view('admin/header'); ?>

<h1 class="h3 mb-3 text-gray-800">Call for Volunteers</h1>

<?php echo form_open(base_url().'admin/call-for-volunteers'); ?>
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="form-group">
            <label for="">Title *</label>
            <input type="text" name="title" class="form-control" value="<?php echo safe_data($call_for_volunteers['title']); ?>">
        </div>
        <div class="form-group">
            <label for="">Content *</label>
            <textarea name="content" class="form-control editor" cols="30" rows="10"><?php echo safe_data($call_for_volunteers['content']); ?></textarea>
        </div>
    </div>
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">SEO Information</h6>
    </div>
    <div class="card-body">
        <div class="form-group">
            <label for="">Title</label>
            <input type="text" name="seo_title" class="form-control" value="<?php echo safe_data($call_for_volunteers['seo_title']); ?>">
        </div>
        <div class="form-group">
            <label for="">Meta Description</label>
            <textarea name="seo_meta_description" class="form-control h_100" cols="30" rows="10"><?php echo safe_data($call_for_volunteers['seo_meta_description']); ?></textarea>
        </div>
        <button type="submit" class="btn btn-success" name="form1">Update</button>
    </div>
</div>
<?php echo form_close(); ?>

<?php $this->view('admin/footer'); ?>