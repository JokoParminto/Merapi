<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">M Blog Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('m_blog/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>Id Blog</th>
						<th>Judul Blog</th>
						<th>Isi Blog</th>
						<th>Tag Blog</th>
						<th>Gambar Blog</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($m_blog as $m){ ?>
                    <tr>
						<td><?php echo $m['id_blog']; ?></td>
						<td><?php echo $m['judul_blog']; ?></td>
						<td><?php echo $m['isi_blog']; ?></td>
						<td><?php echo $m['tag_blog']; ?></td>
						<td><?php echo $m['gambar_blog']; ?></td>
						<td>
                            <a href="<?php echo site_url('m_blog/edit/'.$m['id_blog']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('m_blog/remove/'.$m['id_blog']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                <div class="pull-right">
                    <?php echo $this->pagination->create_links(); ?>                    
                </div>                
            </div>
        </div>
    </div>
</div>
