<?php
if(!$this->session->userdata('id')) {
    redirect(base_url().'admin');
}
?>

<?php $this->view('admin/header'); ?>

<h1 class="h3 mb-3 text-gray-800">Setting - Tawk Live Chat</h1>

<div class="card shadow mb-4">

    <div class="card-body">
        
        <?php echo form_open(base_url().'admin/setting/tawk-live-chat'); ?>
            <div class="row">
                <div class="col-md-5">
                    <div class="form-group">
                        <label for="">Tawk Live Chat Code *</label>
                        <textarea name="tawk_live_chat_code" class="form-control" cols="30" rows="10"><?php echo safe_data($setting_tawk_live_chat['tawk_live_chat_code']); ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Tawk Live Chat Status</label>
                        <select name="tawk_live_chat_status" class="form-control">
                            <option value="On" <?php if($setting_tawk_live_chat['tawk_live_chat_status'] == 'On') {echo 'selected';} ?>>On</option>
                            <option value="Off" <?php if($setting_tawk_live_chat['tawk_live_chat_status'] == 'Off') {echo 'selected';} ?>>Off</option>
                        </select>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-success" name="form1">Update</button>
        <?php echo form_close(); ?>

    </div>
</div>

<?php $this->view('admin/footer'); ?>