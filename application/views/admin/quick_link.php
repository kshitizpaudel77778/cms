<?php
if(!$this->session->userdata('id')) {
    redirect(base_url().'admin');
}
?>

<?php $this->view('admin/header'); ?>

<h1 class="h3 mb-3 text-gray-800">Quick Links</h1>

<div class="row">
    <div class="col-lg-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Icon 1</h6>
            </div>
            <div class="card-body">        
                <?php echo form_open_multipart(base_url().'admin/quick-link'); ?>
                    <input type="hidden" name="current_photo" value="<?php echo safe_data($quick_link['icon1']); ?>">
                    <div class="form-group">
                        <label for="">Title</label>
                        <input type="text" name="title1" class="form-control" value="<?php echo safe_data($quick_link['title1']); ?>">
                    </div>
                    <div class="form-group">
                        <label for="">Existing Icon</label>
                        <div class="bg_f3f3f3 p_15"><img src="<?php echo base_url(); ?>public/uploads/<?php echo safe_data($quick_link['icon1']); ?>" alt="" class="w_100"></div>
                    </div>
                    <div class="form-group">
                        <label for="">Change Icon *</label>
                        <div><input type="file" name="icon1"></div>
                    </div>
                    <button type="submit" class="btn btn-success" name="form1">Update</button>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Icon 2</h6>
            </div>
            <div class="card-body">        
                <?php echo form_open_multipart(base_url().'admin/quick-link'); ?>
                    <input type="hidden" name="current_photo" value="<?php echo safe_data($quick_link['icon2']); ?>">
                    <div class="form-group">
                        <label for="">Title</label>
                        <input type="text" name="title2" class="form-control" value="<?php echo safe_data($quick_link['title2']); ?>">
                    </div>
                    <div class="form-group">
                        <label for="">Existing Icon</label>
                        <div class="bg_f3f3f3 p_15"><img src="<?php echo base_url(); ?>public/uploads/<?php echo safe_data($quick_link['icon2']); ?>" alt="" class="w_100"></div>
                    </div>
                    <div class="form-group">
                        <label for="">Change Icon *</label>
                        <div><input type="file" name="icon2"></div>
                    </div>
                    <button type="submit" class="btn btn-success" name="form2">Update</button>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Icon 3</h6>
            </div>
            <div class="card-body">        
                <?php echo form_open_multipart(base_url().'admin/quick-link'); ?>
                    <input type="hidden" name="current_photo" value="<?php echo safe_data($quick_link['icon3']); ?>">
                    <div class="form-group">
                        <label for="">Title</label>
                        <input type="text" name="title3" class="form-control" value="<?php echo safe_data($quick_link['title3']); ?>">
                    </div>
                    <div class="form-group">
                        <label for="">Existing Icon</label>
                        <div class="bg_f3f3f3 p_15"><img src="<?php echo base_url(); ?>public/uploads/<?php echo safe_data($quick_link['icon3']); ?>" alt="" class="w_100"></div>
                    </div>
                    <div class="form-group">
                        <label for="">Change Icon *</label>
                        <div><input type="file" name="icon3"></div>
                    </div>
                    <button type="submit" class="btn btn-success" name="form3">Update</button>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>

<?php $this->view('admin/footer'); ?>