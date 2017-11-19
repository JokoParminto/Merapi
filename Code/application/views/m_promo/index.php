<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Daftar Promo</h3>
            </div>
            <div class="box-body">
                    <!-- Pemberitahuan berhasil atau gagalnya proses  -->
                    <?php
                    $error = $this->session->flashdata('error');
                    if ($error) {
                        ?>
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                            <?php echo $error; ?> <a href="#" class="alert-link">Error!</a>.
                        </div> 
                    <?php } ?>
                    <?php
                    $success = $this->session->flashdata('success');
                    if ($success) {
                    ?>
                    <!-- Pemberitahuan berhasil atau gagalnya proses  -->
                        <div class="alert alert-success alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                            <?php echo $success; ?> <a href="#" class="alert-link">Success!</a>.
                        </div> 
                    <?php } ?>
                    <div class="row">
                        <?php foreach($m_promo as $m){ ?>
                            <div class="col-lg-3 col-md-4 col-sm-6 portfolio-item">
                                <div class="card h-100">
                                    <a href="#"><img class="card-img-top" src="<?php echo site_url('resources/img/kk.jpg');?>" alt=""></a>
                                    <div class="card-body">
                                        <h4 class="card-title">
                                            <a href="#"><?php echo $m['nama_promo']; ?></a>
                                            </br>
                                            Rp. <?php echo $m['harga_promo']; ?>,00
                                        </h4>
                                        <p class="card-text"><?php echo $m['isi_promo']; ?></p>
                                        <button 
                                            type="button" 
                                            class="btn btn-info btn-xs"
                                            data-toggle="modal" 
                                            data-target="#update_promo" 
                                            onclick="update_promo(<?php echo $m['id_promo'];?>)">
                                            <span class="fa fa-pencil"></span> Edit
                                        </button>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                <!-- /.row -->
                
                <div class="pull-right">
                    <?php echo $this->pagination->create_links(); ?>                    
                </div>                
            </div>
        </div>
    </div>
</div>


<div id="update_promo" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <div class="box-header with-border">
          	<h3 class="box-title">Tambah/Edit Event</h3>
        </div>
        </div>
            <div class="modal-body">
                <form enctype="multipart/form-data" method="post" id="form_update" name="form_update" accept-charset="utf-8" action="<?php echo site_url('m_promo/edit'); ?>">
                    <div class="box-body">
                        <div class="row clearfix">
                            <div class="col-md-6">
                                <input type="hidden" name="id_promo" class="form-control" id="id_promo" required />
                                <label for="nama_promo" class="control-label"><span class="text-danger">*</span>Nama Promo</label>
                                <div class="form-group">
                                    <input type="text" name="nama_promo" class="form-control" id="nama_promo" required />
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <label for="harga_promo" class="control-label"><span class="text-danger">*</span>Harga Promo</label>
                                <div class="form-group">
                                    <input type="text" name="harga_promo" class="form-control" id="harga_promo" required />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="isi_promo" class="control-label"><span class="text-danger">*</span>Isi Promo</label>
                                <div class="form-group">
                                    <textarea class="form-control" rows="10" name="isi_promo" id="isi_promo" required ></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="level_promo" class="control-label"><span class="text-danger">*</span>Level Promo</label>
                                <div class="form-group">
                                    <label class="radio-inline"><input type="radio" id="radio0" name="level_promo" value="0">Biasa</label>
                                    <label class="radio-inline"><input type="radio" id="radio1" name="level_promo" value="1">Special</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">
                        <i class="fa fa-check"></i> Save
                    </button>
                </form>                    
        <button type="button" class="btn btn-cancel" data-dismiss="modal">Close</button>
        </div>
    </div>
  </div>
</div>
<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<script type="text/javascript">
    function update_promo(id) { 
        // $( "#box_tampil_acara" ).empty();   
        $.ajax({
            url : "<?php echo base_url();?>m_promo/edit_promo_by_id/" + id,
            type: "GET",
            dataType: "JSON",
            success: function(data)
            {   
                $('[name="id_promo"]').val(data.id_promo);
                $('[name="nama_promo"]').val(data.nama_promo);
                $('[name="harga_promo"]').val(data.harga_promo);
                $('[name="isi_promo"]').val(data.isi_promo);
                if (data.level_promo == 0) {
                    $("#radio0").prop("checked", true)   
                } else {
                    $("#radio1").prop("checked", true)
                }
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error get data from ajax');
            }
        });
    } 
    // function handleChange() {
	// 	var myValue = document.getElementById("harga_promo").value;
	// 		if (myValue.indexOf("Rp. ") != 0){
	// 			myValue = "Rp. " + myValue;
	// 		}
	// 	document.getElementById("harga_promo").value = myValue;
	// }
    $('[name="isi_promo"]').keyup(function(){
        var str = this.value.replace(/(\w)[\n,]+(\w?)/g, '$1,\n$2');
        if (str!=this.value) this.value = str; 
    });
</script>



