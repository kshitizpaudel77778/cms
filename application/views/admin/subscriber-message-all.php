<?php
if(!$this->session->userdata('id')) {
    redirect(base_url().'admin');
}
?>

<?php $this->view('admin/header'); ?>

<h1 class="h3 mb-3 text-gray-800">All Messages</h1>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 mt-2 font-weight-bold text-primary">View Messages</h6>
    </div>
    <div class="card-body">       
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>SL</th>
                        <th>Subject</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i=0;
                    foreach($message_all as $row)
                    {
                        $i++;
                        ?>
                        <tr>
                            <td><?php echo safe_data($i); ?></td>
                            <td><?php echo safe_data($row['subject']); ?></td>
                            <td>
                                <a href="" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#messageDetail<?php echo safe_data($i); ?>"><i class="fas fa-eye"></i></a>
                                <a href="<?php echo base_url(); ?>admin/subscriber/delete-message/<?php echo safe_data($row['id']); ?>" class="btn btn-danger btn-sm" onClick="return confirm('Are you sure?');"><i class="fas fa-trash-alt"></i></a>
                            </td>
                        </tr>
                        <!-- Modal Start -->
                        <div class="modal fade" id="messageDetail<?php echo safe_data($i); ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Message Details</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="">Subject</label>
                                            <div>
                                                <?php echo safe_data($row['subject']); ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Message</label>
                                            <div>
                                                <?php echo safe_data($row['message']); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- // Modal End -->
                        <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>    

<?php $this->view('admin/footer'); ?>