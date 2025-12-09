<?php
if(!$this->session->userdata('id')) {
    redirect(base_url().'admin');
}
?>

<?php $this->view('admin/header'); ?>

<h1 class="h3 mb-3 text-gray-800">Slider</h1>

<div class="card shadow mb-4">

    <div class="card-body">
        
        <?php echo form_open_multipart(base_url().'admin/slider'); ?>
            
            <input type="hidden" name="current_photo" value="<?php echo safe_data($slider['photo']); ?>">

            <div class="form-group">
                <label for="">Existing Photo</label>
                <div><img src="<?php echo base_url(); ?>public/uploads/<?php echo safe_data($slider['photo']); ?>" alt="" class="w_300"></div>
            </div>

            <div class="form-group">
                <label for="">Change Photo</label>
                <div><input type="file" name="photo"></div>
            </div>
        
            <div class="form-group">
                <label for="">Title *</label>
                <input type="text" name="title" class="form-control" value="<?php echo safe_data($slider['title']); ?>">
            </div>

            <div class="form-group">
                <label for="">Subtitle *</label>
                <input type="text" name="subtitle" class="form-control" value="<?php echo safe_data($slider['subtitle']); ?>">
            </div>

            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="">Date *</label>
                        <input id="datepicker" type="text" name="event_date" class="form-control" value="<?php echo safe_data($slider['event_date']); ?>">
                    </div>        
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="">Time *</label>
                        <input id="timepicker" type="text" name="event_time" class="form-control timepicker" value="<?php echo safe_data($slider['event_time']); ?>">
                    </div>        
                </div>
            </div>
            <button type="submit" class="btn btn-success" name="form1">Update</button>
        <?php echo form_close(); ?>

    </div>
</div>

<?php $this->view('admin/footer'); ?>