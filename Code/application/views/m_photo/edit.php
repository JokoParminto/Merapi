<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">M Photo Edit</h3>
            </div>
			<?php echo form_open('m_photo/edit/'.$m_photo['id_photo']); ?>
			<div class="box-body">
				<div class="row clearfix">
					<div class="col-md-6">
						<label for="nama_photo" class="control-label"><span class="text-danger">*</span>Nama Photo</label>
						<div class="form-group">
							<input type="text" name="nama_photo" value="<?php echo ($this->input->post('nama_photo') ? $this->input->post('nama_photo') : $m_photo['nama_photo']); ?>" class="form-control" id="nama_photo" />
							<span class="text-danger"><?php echo form_error('nama_photo');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="desc_photo" class="control-label"><span class="text-danger">*</span>Desc Photo</label>
						<div class="form-group">
							<input type="text" name="desc_photo" value="<?php echo ($this->input->post('desc_photo') ? $this->input->post('desc_photo') : $m_photo['desc_photo']); ?>" class="form-control" id="desc_photo" />
							<span class="text-danger"><?php echo form_error('desc_photo');?></span>
						</div>
					</div>
				</div>
			</div>
			<div class="box-footer">
            	<button type="submit" class="btn btn-success">
					<i class="fa fa-check"></i> Save
				</button>
	        </div>				
			<?php echo form_close(); ?>
		</div>
    </div>
</div>