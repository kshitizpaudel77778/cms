<?php
if(!$this->session->userdata('id')) {
    redirect(base_url().'admin');
}
?>

<?php $this->view('admin/header'); ?>

<h1 class="h3 mb-3 text-gray-800">Subscribers</h1>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 mt-2 font-weight-bold text-primary">View Subscribers</h6>
        <div class="float-right d-inline">
            <a href="<?php echo base_url(); ?>admin/subscriber/export-csv" class="btn btn-primary btn-sm" target="_blank">
                <i class="fa fa-plus"></i> Export as CSV
            </a>
        </div>
    </div>
    <div class="card-body">       
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>SL</th>
                        <th>Subscriber Email</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i=0;
                    foreach($subscriber_all as $row)
                    {
                        $i++;
                        ?>
                        <tr>
                            <td><?php echo safe_data($i); ?></td>
                            <td><?php echo safe_data($row['subs_email']); ?></td>
                            <td>
                                <a href="<?php echo base_url(); ?>admin/subscriber/delete-subscriber/<?php echo safe_data($row['subs_id']); ?>" class="btn btn-danger btn-sm" onClick="return confirm('Are you sure?');"><i class="fas fa-trash-alt"></i></a>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>    

<?php $this->view('admin/footer'); ?>