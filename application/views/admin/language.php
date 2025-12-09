<?php
if(!$this->session->userdata('id')) {
    redirect(base_url().'admin');
}
?>

<?php $this->view('admin/header'); ?>

<h1 class="h3 mb-3 text-gray-800">Language</h1>

<?php
$i=0;
$arr1 = array();
$arr2 = array();
$arr3 = array();                
foreach ($language as $row) {
    $arr1[$i] = $row['id'];
    $arr2[$i] = $row['name'];
    $arr3[$i] = $row['value'];
    $i++;
}
?>

<?php echo form_open(base_url().'admin/language'); ?>
<div class="card shadow mb-4">
    <div class="card-body">
        <?php for($i=0;$i<count($arr1);$i++): ?>
        <div class="form-group">
            <label for="" class="col-md-12"><?php echo safe_data($arr2[$i]); ?></label>
            <div class="col-md-12">
                <input type="text" class="form-control" name="new_arr[]" value="<?php echo safe_data($arr3[$i]); ?>">
            </div>
        </div>
        <input type="hidden" name="new_arr1[]" value="<?php echo safe_data($arr1[$i]); ?>">
        <?php endfor; ?>
        <button type="submit" class="btn btn-success" name="form1">Update</button>
    </div>
</div>
<?php echo form_close(); ?>

<?php $this->view('admin/footer'); ?>