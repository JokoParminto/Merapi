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
<div class="col-md-12">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Daftar Foto</h3>
            <div class="box-tools">
                
                <button 
                    type="button" 
                    class="btn btn-info btn-xs"
                    data-toggle="modal" 
                    data-target="#addit_photo" 
                    onclick="addit_photo()">
                    <span class="fa fa-pencil"></span> Add
                </button>
            </div>
            </div>
            <div class="box-body">
            <?php foreach($m_photo as $m){ ?>
                            <div class="col-lg-3 col-md-4 col-sm-6 portfolio-item">
                                <div class="card h-100">
                                    <a href="#"><img class="card-img-top" style="-webkit-user-select: none;background-position: 0px 0px, 10px 10px;background-size: 20px 20px;background-image:linear-gradient(45deg, #eee 25%, transparent 25%, transparent 75%, #eee 75%, #eee 100%),linear-gradient(45deg, #eee 25%, white 25%, white 75%, #eee 75%, #eee 100%);" src="<?php echo site_url('images/thumbs/'.$m['file_photo'].'');?>" alt=""></a>
                                    <div class="card-body">
                                        <h4 class="card-title">
                                            <a href="#"><?php echo $m['nama_photo']; ?></a>
                                        </h4>
                                        <p class="card-text"></p>
                                        <p class="card-text">Letak Foto : <?php echo $retVal = ($m['letak_photo'] == 1) ? 'Atas' : 'Bawah' ;; ?></p>
                                        <button 
                                            type="button" 
                                            class="btn btn-info btn-xs"
                                            data-toggle="modal" 
                                            data-target="#addit_photo" 
                                            onclick="addit_photo(<?php echo $m['id_photo'];?>)">
                                            <span class="fa fa-pencil"></span> Edit
                                        </button>
                                        <a href="<?php echo site_url('m_photo/remove/'.$m['id_photo']); ?>" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure delete <?php echo $m['nama_photo']?> ?')"><span class="fa fa-trash"></span> Delete</a>
                                    </div>
                                </div>
                            </div>
            <?php } ?>
            <div class="pull-right">
                <?php echo $this->pagination->create_links(); ?>                    
            </div>                
        </div>
    </div>
</div>
</div>

<div class="modal fade" id="addit_photo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
  <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<div class="modal-body">
    </br></br></br></br></br></br>
    <h5 class="modal-title" id="exampleModalLabel">Add/Update Photo</h5>
    <form enctype="multipart/form-data" method="post" id="box_addit_photo" name="box_addit_photo" accept-charset="utf-8" action="<?php echo site_url('m_photo/add'); ?>">
        <div class="box-body">
            <div class="row clearfix">
            <input type="hidden" name="id_photo" class="form-control" id="id_photo"/>
                <div class="col-md-6">
                    <label for="name_event" class="control-label"><span class="text-danger">*</span>Name Photo</label>
                    <div class="form-group">
                        <input type="text" name="nama_photo" class="form-control" id="nama_photo" required/>
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="lokasi" class="control-label"><span class="text-danger">*</span>Lokasi</label>
                    <div class="form-group">
                        <select class="form-control" id="letak_photo" name="letak_photo">
                            <option value="1">Atas</option>
                            <option value="0">Bawah</option>
                        </select>
                    </div>
                </div>
               
                <div class="col-md-6">
                    <label for="gambar" class="control-label">Poster</label>
                    <div class="form-group">
                        <input type='file'  class="btn btn-primary btn-file" name='gambar'  size='20' id="gambar" required />
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="desc_photo" class="control-label"><span class="text-danger">*</span>Deskripsi Photo</label>
                    <div class="form-group">
                        <textarea name="desc_photo" class="form-control" id="desc_photo" required ></textarea>
                    </div>
                </div>
                <img id="blah" src="#" alt="" />
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="submit" id="simpan" class="btn btn-success">
            <i class="fa fa-check"></i> Save
        </button>
    </form>
</div>
</div>
</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript">
function addit_photo(id) { 
    jQuery('#blah').removeAttr('src') 
    $('#box_addit_photo').trigger("reset"); 
        if (id) {
            $.ajax({
                url : "<?php echo base_url();?>m_photo/edit_photo_by_id/" + id,
                type: "GET",
                dataType: "JSON",
                success: function(data)
                {   
                     $('[name="id_photo"]').val(data.id_photo);
                     $('[name="nama_photo"]').val(data.nama_photo);
                     $('[name="desc_photo"]').val(data.desc_photo);
                     $("#letak_photo").val(data.letak_photo)
                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    alert('Error get data from ajax');
                }
            });
        }
    } 

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#blah')
                    .attr('src', e.target.result)
                    .width(150)
                    .height(200);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
    $('#gambar').bind('change', function(){
        var ukurangambar = this.files[0].size;
        if (ukurangambar > 2000000) {
            alert('Maaf ukuran foto anda terlalu besar!')
            document.getElementById("simpan").disabled = true;
        } else {
            document.getElementById("simpan").disabled = false;
        }
    })
</script>
