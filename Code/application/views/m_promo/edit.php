<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">M Promo Edit</h3>
            </div>
			<?php echo form_open('m_promo/edit/'.$m_promo['id_promo']); ?>
			<div class="box-body">
				<div class="row clearfix">
					<div class="col-md-6">
						<label for="nama_promo" class="control-label"><span class="text-danger">*</span>Nama Promo</label>
						<div class="form-group">
							<input type="text" name="nama_promo" value="<?php echo ($this->input->post('nama_promo') ? $this->input->post('nama_promo') : $m_promo['nama_promo']); ?>" class="form-control" id="nama_promo" />
							<span class="text-danger"><?php echo form_error('nama_promo');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="isi_promo" class="control-label"><span class="text-danger">*</span>Isi Promo</label>
						<div class="form-group">
							<input type="text" name="isi_promo" value="<?php echo ($this->input->post('isi_promo') ? $this->input->post('isi_promo') : $m_promo['isi_promo']); ?>" class="form-control" id="isi_promo" />
							<span class="text-danger"><?php echo form_error('isi_promo');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="harga_promo" class="control-label"><span class="text-danger">*</span>Harga Promo</label>
						<div class="form-group">
							<input type="text" name="harga_promo" value="<?php echo ($this->input->post('harga_promo') ? $this->input->post('harga_promo') : $m_promo['harga_promo']); ?>" class="form-control" id="harga_promo" />
							<span class="text-danger"><?php echo form_error('harga_promo');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="level_promo" class="control-label"><span class="text-danger">*</span>Level Promo</label>
						<div class="form-group">
							<input type="text" name="level_promo" value="<?php echo ($this->input->post('level_promo') ? $this->input->post('level_promo') : $m_promo['level_promo']); ?>" class="form-control" id="level_promo" />
							<span class="text-danger"><?php echo form_error('level_promo');?></span>
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