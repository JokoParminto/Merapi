<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">M Blog Add</h3>
            </div>
            <?php echo form_open('m_blog/add'); ?>
          	<div class="box-body">
          		<div class="row clearfix">
					<div class="col-md-6">
						<label for="judul_blog" class="control-label"><span class="text-danger">*</span>Judul Blog</label>
						<div class="form-group">
							<input type="text" name="judul_blog" value="<?php echo $this->input->post('judul_blog'); ?>" class="form-control" id="judul_blog" />
							<span class="text-danger"><?php echo form_error('judul_blog');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="isi_blog" class="control-label"><span class="text-danger">*</span>Isi Blog</label>
						<div class="form-group">
							<input type="text" name="isi_blog" value="<?php echo $this->input->post('isi_blog'); ?>" class="form-control" id="isi_blog" />
							<span class="text-danger"><?php echo form_error('isi_blog');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="tag_blog" class="control-label"><span class="text-danger">*</span>Tag Blog</label>
						<div class="form-group">
							<input type="text" name="tag_blog" value="<?php echo $this->input->post('tag_blog'); ?>" class="form-control" id="tag_blog" />
							<span class="text-danger"><?php echo form_error('tag_blog');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="gambar_blog" class="control-label"><span class="text-danger">*</span>Gambar Blog</label>
						<div class="form-group">
							<input type="text" name="gambar_blog" value="<?php echo $this->input->post('gambar_blog'); ?>" class="form-control" id="gambar_blog" />
							<span class="text-danger"><?php echo form_error('gambar_blog');?></span>
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