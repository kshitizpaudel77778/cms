<?php
if(!$this->session->userdata('id')) {
    redirect(base_url().'admin');
}
?>

<?php $this->view('admin/header'); ?>

<h1 class="h3 mb-3 text-gray-800">Welcome</h1>

<div class="card shadow mb-4">

    <div class="card-body">
        
        <?php echo form_open_multipart(base_url().'admin/welcome'); ?>
            
            <input type="hidden" name="current_photo" value="<?php echo safe_data($welcome['photo']); ?>">

            <div class="form-group">
                <label for="">Existing Photo</label>
                <div><img src="<?php echo base_url(); ?>public/uploads/<?php echo safe_data($welcome['photo']); ?>" alt="" class="w_300"></div>
            </div>

            <div class="form-group">
                <label for="">Change Photo</label>
                <div><input type="file" name="photo"></div>
            </div>
        
            <div class="form-group">
                <label for="">Title *</label>
                <input type="text" name="title" class="form-control" value="<?php echo safe_data($welcome['title']); ?>">
            </div>

            <div class="form-group">
                <label for="">Subtitle *</label>
                <input type="text" name="subtitle" class="form-control" value="<?php echo safe_data($welcome['subtitle']); ?>">
            </div>

            <div class="form-group">
                <label for="">Description *</label>
                <textarea name="description" class="form-control" cols="30" rows="10"><?php echo safe_data($welcome['description']); ?></textarea>
            </div>

            <div class="form-group">
                <label for="">Button Text</label>
                <input type="text" name="button_text" class="form-control" value="<?php echo safe_data($welcome['button_text']); ?>">
            </div>

            <div class="form-group">
                <label for="">Button URL</label>
                <input type="text" name="button_url" class="form-control" value="<?php echo safe_data($welcome['button_url']); ?>">
            </div>

            <div class="form-group">
                <label for="">Youtube Video Code *</label>
                <input type="text" name="yt_video_code" class="form-control" value="<?php echo safe_data($welcome['yt_video_code']); ?>">
            </div>

            <div class="form-group">
                <label for="">Youtube Video Preview</label>
                <div><iframe class="w_500" width="560" height="315" src="https://www.youtube.com/embed/<?php echo safe_data($welcome['yt_video_code']); ?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></div>
            </div>

            <button type="submit" class="btn btn-success" name="form1">Update</button>
        <?php echo form_close(); ?>

    </div>
</div>

<?php $this->view('admin/footer'); ?>