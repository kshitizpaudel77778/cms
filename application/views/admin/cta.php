<?php
if(!$this->session->userdata('id')) {
    redirect(base_url().'admin');
}
?>

<?php $this->view('admin/header'); ?>

<h1 class="h3 mb-3 text-gray-800">Call to Action</h1>

<div class="card shadow mb-4">

    <div class="card-body">
        
        <?php echo form_open_multipart(base_url().'admin/cta'); ?>
            
            <input type="hidden" name="current_background_photo" value="<?php echo safe_data($cta['background_photo']); ?>">

            <div class="form-group">
                <label for="">Existing Background Photo</label>
                <div><img src="<?php echo base_url(); ?>public/uploads/<?php echo safe_data($cta['background_photo']); ?>" alt="" class="w_300"></div>
            </div>

            <div class="form-group">
                <label for="">Change Background Photo</label>
                <div><input type="file" name="background_photo"></div>
            </div>
        
            <div class="form-group">
                <label for="">Title *</label>
                <input type="text" name="title" class="form-control" value="<?php echo safe_data($cta['title']); ?>">
            </div>

            <div class="form-group">
                <label for="">Text *</label>
                <textarea name="text" class="form-control h_100" cols="30" rows="10"><?php echo safe_data($cta['text']); ?></textarea>
            </div>

            <div class="form-group">
                <label for="">Button Text *</label>
                <input type="text" name="button_text" class="form-control" value="<?php echo safe_data($cta['button_text']); ?>">
            </div>

            <div class="form-group">
                <label for="">Button URL *</label>
                <input type="text" name="button_url" class="form-control" value="<?php echo safe_data($cta['button_url']); ?>">
            </div>

            <button type="submit" class="btn btn-success" name="form1">Update</button>
        <?php echo form_close(); ?>

    </div>
</div>

<?php $this->view('admin/footer'); ?>