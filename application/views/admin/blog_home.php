<?php
if(!$this->session->userdata('id')) {
    redirect(base_url().'admin');
}
?>

<?php $this->view('admin/header'); ?>

<h1 class="h3 mb-3 text-gray-800">Blog - Title and Subtitle</h1>

<div class="tab-content" id="pills-tabContent">

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Title and Subtitle</h6>
    </div>
    <div class="card-body">                
        <?php echo form_open(base_url().'admin/blog-home'); ?>
            <div class="form-group">
                <label for="">Title</label>
                <input type="text" name="title" class="form-control" value="<?php echo safe_data($blog_title_subtitle['title']); ?>">
            </div>
            <div class="form-group">
                <label for="">Meta Description</label>
                <textarea name="subtitle" class="form-control h_100" cols="30" rows="10"><?php echo safe_data($blog_title_subtitle['subtitle']); ?></textarea>
            </div>
            <button type="submit" class="btn btn-success" name="form_blog_title_subtitle">Update</button>
        <?php echo form_close(); ?>
    </div>
</div>


<?php $this->view('admin/footer'); ?>