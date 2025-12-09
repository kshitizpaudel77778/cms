<?php
if(!$this->session->userdata('id')) {
    redirect(base_url().'admin');
}
?>

<?php $this->view('admin/header'); ?>

<h1 class="h3 mb-3 text-gray-800">Home Section Manage</h1>

<div class="card shadow mb-4">
    <div class="card-body">
        <div class="row">
            <div class="col-md-5">
                <?php echo form_open(base_url().'admin/home-section'); ?>            
                <div class="table-responsive">
                    <table class="table table-bordered table-sm" id="" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Section Name</th>
                                <th>Section Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i=0;
                            foreach($home_section as $row)
                            {
                                $i++;
                                ?>
                                <input type="hidden" name="section_name[]" value="<?php echo safe_data($row['section_name']); ?>">
                                <tr>
                                    <td><?php echo safe_data($row['section_name']); ?></td>
                                    <td>
                                        <select name="section_status[]" class="form-control form-control-sm">
                                            <option value="Show" <?php if($row['section_status'] == 'Show') {echo 'selected';} ?>>Show</option>
                                            <option value="Hide" <?php if($row['section_status'] == 'Hide') {echo 'selected';} ?>>Hide</option>
                                        </select>
                                    </td>
                                </tr>
                                <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <button type="submit" class="btn btn-success" name="form1">Update</button>
            <?php echo form_close(); ?>  
            </div>
        </div>
    </div>
</div>

<?php $this->view('admin/footer'); ?>