<?php
if(!$this->session->userdata('id')) {
    redirect(base_url().'admin');
}
?>

<?php $this->view('admin/header'); ?>

<h1 class="h3 mb-3 text-gray-800">Setting - Banner</h1>

<div class="row">
    <div class="col-md-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">About Page</h6>
            </div>
            <div class="card-body">
                <?php echo form_open_multipart(base_url().'admin/setting/banner'); ?>
                    <input type="hidden" name="current_photo" value="<?php echo safe_data($banner_about['banner']); ?>">
                    <div class="form-group">
                        <label for="">Existing Photo</label>
                        <div><img src="<?php echo base_url(); ?>public/uploads/<?php echo safe_data($banner_about['banner']); ?>" alt="" class="w_100_p"></div>
                    </div>
                    <div class="form-group">
                        <label for="">Change Photo *</label>
                        <div><input type="file" name="banner"></div>
                    </div>
                    <button type="submit" class="btn btn-success" name="form_banner_about">Update</button>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Organizers Page</h6>
            </div>
            <div class="card-body">
                <?php echo form_open_multipart(base_url().'admin/setting/banner'); ?>
                    <input type="hidden" name="current_photo" value="<?php echo safe_data($banner_organizers['banner']); ?>">
                    <div class="form-group">
                        <label for="">Existing Photo</label>
                        <div><img src="<?php echo base_url(); ?>public/uploads/<?php echo safe_data($banner_organizers['banner']); ?>" alt="" class="w_100_p"></div>
                    </div>
                    <div class="form-group">
                        <label for="">Change Photo *</label>
                        <div><input type="file" name="banner"></div>
                    </div>
                    <button type="submit" class="btn btn-success" name="form_banner_organizers">Update</button>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Organizer Detail Page</h6>
            </div>
            <div class="card-body">
                <?php echo form_open_multipart(base_url().'admin/setting/banner'); ?>
                    <input type="hidden" name="current_photo" value="<?php echo safe_data($banner_organizer_detail['banner']); ?>">
                    <div class="form-group">
                        <label for="">Existing Photo</label>
                        <div><img src="<?php echo base_url(); ?>public/uploads/<?php echo safe_data($banner_organizer_detail['banner']); ?>" alt="" class="w_100_p"></div>
                    </div>
                    <div class="form-group">
                        <label for="">Change Photo *</label>
                        <div><input type="file" name="banner"></div>
                    </div>
                    <button type="submit" class="btn btn-success" name="form_banner_organizer_detail">Update</button>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Attendees Page</h6>
            </div>
            <div class="card-body">
                <?php echo form_open_multipart(base_url().'admin/setting/banner'); ?>
                    <input type="hidden" name="current_photo" value="<?php echo safe_data($banner_attendees['banner']); ?>">
                    <div class="form-group">
                        <label for="">Existing Photo</label>
                        <div><img src="<?php echo base_url(); ?>public/uploads/<?php echo safe_data($banner_attendees['banner']); ?>" alt="" class="w_100_p"></div>
                    </div>
                    <div class="form-group">
                        <label for="">Change Photo *</label>
                        <div><input type="file" name="banner"></div>
                    </div>
                    <button type="submit" class="btn btn-success" name="form_banner_attendees">Update</button>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Accommodations Page</h6>
            </div>
            <div class="card-body">
                <?php echo form_open_multipart(base_url().'admin/setting/banner'); ?>
                    <input type="hidden" name="current_photo" value="<?php echo safe_data($banner_accommodations['banner']); ?>">
                    <div class="form-group">
                        <label for="">Existing Photo</label>
                        <div><img src="<?php echo base_url(); ?>public/uploads/<?php echo safe_data($banner_accommodations['banner']); ?>" alt="" class="w_100_p"></div>
                    </div>
                    <div class="form-group">
                        <label for="">Change Photo *</label>
                        <div><input type="file" name="banner"></div>
                    </div>
                    <button type="submit" class="btn btn-success" name="form_banner_accommodations">Update</button>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Parking Page</h6>
            </div>
            <div class="card-body">
                <?php echo form_open_multipart(base_url().'admin/setting/banner'); ?>
                    <input type="hidden" name="current_photo" value="<?php echo safe_data($banner_parking['banner']); ?>">
                    <div class="form-group">
                        <label for="">Existing Photo</label>
                        <div><img src="<?php echo base_url(); ?>public/uploads/<?php echo safe_data($banner_parking['banner']); ?>" alt="" class="w_100_p"></div>
                    </div>
                    <div class="form-group">
                        <label for="">Change Photo *</label>
                        <div><input type="file" name="banner"></div>
                    </div>
                    <button type="submit" class="btn btn-success" name="form_banner_parking">Update</button>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Location Page</h6>
            </div>
            <div class="card-body">
                <?php echo form_open_multipart(base_url().'admin/setting/banner'); ?>
                    <input type="hidden" name="current_photo" value="<?php echo safe_data($banner_location['banner']); ?>">
                    <div class="form-group">
                        <label for="">Existing Photo</label>
                        <div><img src="<?php echo base_url(); ?>public/uploads/<?php echo safe_data($banner_location['banner']); ?>" alt="" class="w_100_p"></div>
                    </div>
                    <div class="form-group">
                        <label for="">Change Photo *</label>
                        <div><input type="file" name="banner"></div>
                    </div>
                    <button type="submit" class="btn btn-success" name="form_banner_location">Update</button>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Code of Conduct Page</h6>
            </div>
            <div class="card-body">
                <?php echo form_open_multipart(base_url().'admin/setting/banner'); ?>
                    <input type="hidden" name="current_photo" value="<?php echo safe_data($banner_code_of_conduct['banner']); ?>">
                    <div class="form-group">
                        <label for="">Existing Photo</label>
                        <div><img src="<?php echo base_url(); ?>public/uploads/<?php echo safe_data($banner_code_of_conduct['banner']); ?>" alt="" class="w_100_p"></div>
                    </div>
                    <div class="form-group">
                        <label for="">Change Photo *</label>
                        <div><input type="file" name="banner"></div>
                    </div>
                    <button type="submit" class="btn btn-success" name="form_banner_code_of_conduct">Update</button>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Call for Volunteers Page</h6>
            </div>
            <div class="card-body">
                <?php echo form_open_multipart(base_url().'admin/setting/banner'); ?>
                    <input type="hidden" name="current_photo" value="<?php echo safe_data($banner_call_for_volunteers['banner']); ?>">
                    <div class="form-group">
                        <label for="">Existing Photo</label>
                        <div><img src="<?php echo base_url(); ?>public/uploads/<?php echo safe_data($banner_call_for_volunteers['banner']); ?>" alt="" class="w_100_p"></div>
                    </div>
                    <div class="form-group">
                        <label for="">Change Photo *</label>
                        <div><input type="file" name="banner"></div>
                    </div>
                    <button type="submit" class="btn btn-success" name="form_banner_call_for_volunteers">Update</button>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Photos Page</h6>
            </div>
            <div class="card-body">
                <?php echo form_open_multipart(base_url().'admin/setting/banner'); ?>
                    <input type="hidden" name="current_photo" value="<?php echo safe_data($banner_photos['banner']); ?>">
                    <div class="form-group">
                        <label for="">Existing Photo</label>
                        <div><img src="<?php echo base_url(); ?>public/uploads/<?php echo safe_data($banner_photos['banner']); ?>" alt="" class="w_100_p"></div>
                    </div>
                    <div class="form-group">
                        <label for="">Change Photo *</label>
                        <div><input type="file" name="banner"></div>
                    </div>
                    <button type="submit" class="btn btn-success" name="form_banner_photos">Update</button>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Videos Page</h6>
            </div>
            <div class="card-body">
                <?php echo form_open_multipart(base_url().'admin/setting/banner'); ?>
                    <input type="hidden" name="current_photo" value="<?php echo safe_data($banner_videos['banner']); ?>">
                    <div class="form-group">
                        <label for="">Existing Photo</label>
                        <div><img src="<?php echo base_url(); ?>public/uploads/<?php echo safe_data($banner_videos['banner']); ?>" alt="" class="w_100_p"></div>
                    </div>
                    <div class="form-group">
                        <label for="">Change Photo *</label>
                        <div><input type="file" name="banner"></div>
                    </div>
                    <button type="submit" class="btn btn-success" name="form_banner_videos">Update</button>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Schedule Page</h6>
            </div>
            <div class="card-body">
                <?php echo form_open_multipart(base_url().'admin/setting/banner'); ?>
                    <input type="hidden" name="current_photo" value="<?php echo safe_data($banner_schedule['banner']); ?>">
                    <div class="form-group">
                        <label for="">Existing Photo</label>
                        <div><img src="<?php echo base_url(); ?>public/uploads/<?php echo safe_data($banner_schedule['banner']); ?>" alt="" class="w_100_p"></div>
                    </div>
                    <div class="form-group">
                        <label for="">Change Photo *</label>
                        <div><input type="file" name="banner"></div>
                    </div>
                    <button type="submit" class="btn btn-success" name="form_banner_schedule">Update</button>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Speakers Page</h6>
            </div>
            <div class="card-body">
                <?php echo form_open_multipart(base_url().'admin/setting/banner'); ?>
                    <input type="hidden" name="current_photo" value="<?php echo safe_data($banner_speakers['banner']); ?>">
                    <div class="form-group">
                        <label for="">Existing Photo</label>
                        <div><img src="<?php echo base_url(); ?>public/uploads/<?php echo safe_data($banner_speakers['banner']); ?>" alt="" class="w_100_p"></div>
                    </div>
                    <div class="form-group">
                        <label for="">Change Photo *</label>
                        <div><input type="file" name="banner"></div>
                    </div>
                    <button type="submit" class="btn btn-success" name="form_banner_speakers">Update</button>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Speaker Detail Page</h6>
            </div>
            <div class="card-body">
                <?php echo form_open_multipart(base_url().'admin/setting/banner'); ?>
                    <input type="hidden" name="current_photo" value="<?php echo safe_data($banner_speaker_detail['banner']); ?>">
                    <div class="form-group">
                        <label for="">Existing Photo</label>
                        <div><img src="<?php echo base_url(); ?>public/uploads/<?php echo safe_data($banner_speaker_detail['banner']); ?>" alt="" class="w_100_p"></div>
                    </div>
                    <div class="form-group">
                        <label for="">Change Photo *</label>
                        <div><input type="file" name="banner"></div>
                    </div>
                    <button type="submit" class="btn btn-success" name="form_banner_speaker_detail">Update</button>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Sponsors Page</h6>
            </div>
            <div class="card-body">
                <?php echo form_open_multipart(base_url().'admin/setting/banner'); ?>
                    <input type="hidden" name="current_photo" value="<?php echo safe_data($banner_sponsors['banner']); ?>">
                    <div class="form-group">
                        <label for="">Existing Photo</label>
                        <div><img src="<?php echo base_url(); ?>public/uploads/<?php echo safe_data($banner_sponsors['banner']); ?>" alt="" class="w_100_p"></div>
                    </div>
                    <div class="form-group">
                        <label for="">Change Photo *</label>
                        <div><input type="file" name="banner"></div>
                    </div>
                    <button type="submit" class="btn btn-success" name="form_banner_sponsors">Update</button>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Call for Sponsors Page</h6>
            </div>
            <div class="card-body">
                <?php echo form_open_multipart(base_url().'admin/setting/banner'); ?>
                    <input type="hidden" name="current_photo" value="<?php echo safe_data($banner_call_for_sponsors['banner']); ?>">
                    <div class="form-group">
                        <label for="">Existing Photo</label>
                        <div><img src="<?php echo base_url(); ?>public/uploads/<?php echo safe_data($banner_call_for_sponsors['banner']); ?>" alt="" class="w_100_p"></div>
                    </div>
                    <div class="form-group">
                        <label for="">Change Photo *</label>
                        <div><input type="file" name="banner"></div>
                    </div>
                    <button type="submit" class="btn btn-success" name="form_banner_call_for_sponsors">Update</button>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Tickets Page</h6>
            </div>
            <div class="card-body">
                <?php echo form_open_multipart(base_url().'admin/setting/banner'); ?>
                    <input type="hidden" name="current_photo" value="<?php echo safe_data($banner_tickets['banner']); ?>">
                    <div class="form-group">
                        <label for="">Existing Photo</label>
                        <div><img src="<?php echo base_url(); ?>public/uploads/<?php echo safe_data($banner_tickets['banner']); ?>" alt="" class="w_100_p"></div>
                    </div>
                    <div class="form-group">
                        <label for="">Change Photo *</label>
                        <div><input type="file" name="banner"></div>
                    </div>
                    <button type="submit" class="btn btn-success" name="form_banner_tickets">Update</button>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Booking Page</h6>
            </div>
            <div class="card-body">
                <?php echo form_open_multipart(base_url().'admin/setting/banner'); ?>
                    <input type="hidden" name="current_photo" value="<?php echo safe_data($banner_booking['banner']); ?>">
                    <div class="form-group">
                        <label for="">Existing Photo</label>
                        <div><img src="<?php echo base_url(); ?>public/uploads/<?php echo safe_data($banner_booking['banner']); ?>" alt="" class="w_100_p"></div>
                    </div>
                    <div class="form-group">
                        <label for="">Change Photo *</label>
                        <div><input type="file" name="banner"></div>
                    </div>
                    <button type="submit" class="btn btn-success" name="form_banner_booking">Update</button>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Blog Page</h6>
            </div>
            <div class="card-body">
                <?php echo form_open_multipart(base_url().'admin/setting/banner'); ?>
                    <input type="hidden" name="current_photo" value="<?php echo safe_data($banner_blog['banner']); ?>">
                    <div class="form-group">
                        <label for="">Existing Photo</label>
                        <div><img src="<?php echo base_url(); ?>public/uploads/<?php echo safe_data($banner_blog['banner']); ?>" alt="" class="w_100_p"></div>
                    </div>
                    <div class="form-group">
                        <label for="">Change Photo *</label>
                        <div><input type="file" name="banner"></div>
                    </div>
                    <button type="submit" class="btn btn-success" name="form_banner_blog">Update</button>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Blog Detail Page</h6>
            </div>
            <div class="card-body">
                <?php echo form_open_multipart(base_url().'admin/setting/banner'); ?>
                    <input type="hidden" name="current_photo" value="<?php echo safe_data($banner_blog_detail['banner']); ?>">
                    <div class="form-group">
                        <label for="">Existing Photo</label>
                        <div><img src="<?php echo base_url(); ?>public/uploads/<?php echo safe_data($banner_blog_detail['banner']); ?>" alt="" class="w_100_p"></div>
                    </div>
                    <div class="form-group">
                        <label for="">Change Photo *</label>
                        <div><input type="file" name="banner"></div>
                    </div>
                    <button type="submit" class="btn btn-success" name="form_banner_blog_detail">Update</button>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Contact Page</h6>
            </div>
            <div class="card-body">
                <?php echo form_open_multipart(base_url().'admin/setting/banner'); ?>
                    <input type="hidden" name="current_photo" value="<?php echo safe_data($banner_contact['banner']); ?>">
                    <div class="form-group">
                        <label for="">Existing Photo</label>
                        <div><img src="<?php echo base_url(); ?>public/uploads/<?php echo safe_data($banner_contact['banner']); ?>" alt="" class="w_100_p"></div>
                    </div>
                    <div class="form-group">
                        <label for="">Change Photo *</label>
                        <div><input type="file" name="banner"></div>
                    </div>
                    <button type="submit" class="btn btn-success" name="form_banner_contact">Update</button>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Privacy Page</h6>
            </div>
            <div class="card-body">
                <?php echo form_open_multipart(base_url().'admin/setting/banner'); ?>
                    <input type="hidden" name="current_photo" value="<?php echo safe_data($banner_privacy['banner']); ?>">
                    <div class="form-group">
                        <label for="">Existing Photo</label>
                        <div><img src="<?php echo base_url(); ?>public/uploads/<?php echo safe_data($banner_privacy['banner']); ?>" alt="" class="w_100_p"></div>
                    </div>
                    <div class="form-group">
                        <label for="">Change Photo *</label>
                        <div><input type="file" name="banner"></div>
                    </div>
                    <button type="submit" class="btn btn-success" name="form_banner_privacy">Update</button>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Terms Page</h6>
            </div>
            <div class="card-body">
                <?php echo form_open_multipart(base_url().'admin/setting/banner'); ?>
                    <input type="hidden" name="current_photo" value="<?php echo safe_data($banner_terms['banner']); ?>">
                    <div class="form-group">
                        <label for="">Existing Photo</label>
                        <div><img src="<?php echo base_url(); ?>public/uploads/<?php echo safe_data($banner_terms['banner']); ?>" alt="" class="w_100_p"></div>
                    </div>
                    <div class="form-group">
                        <label for="">Change Photo *</label>
                        <div><input type="file" name="banner"></div>
                    </div>
                    <button type="submit" class="btn btn-success" name="form_banner_terms">Update</button>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Search Page</h6>
            </div>
            <div class="card-body">
                <?php echo form_open_multipart(base_url().'admin/setting/banner'); ?>
                    <input type="hidden" name="current_photo" value="<?php echo safe_data($banner_search['banner']); ?>">
                    <div class="form-group">
                        <label for="">Existing Photo</label>
                        <div><img src="<?php echo base_url(); ?>public/uploads/<?php echo safe_data($banner_search['banner']); ?>" alt="" class="w_100_p"></div>
                    </div>
                    <div class="form-group">
                        <label for="">Change Photo *</label>
                        <div><input type="file" name="banner"></div>
                    </div>
                    <button type="submit" class="btn btn-success" name="form_banner_search">Update</button>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>


<?php $this->view('admin/footer'); ?>