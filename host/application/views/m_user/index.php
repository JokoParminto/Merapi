<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">M Users Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('m_user/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>Id User</th>
						<th>Password</th>
						<th>Username</th>
						<th>Name</th>
						<th>Level</th>
						<th>Create At</th>
						<th>Updated At</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($m_users as $m){ ?>
                    <tr>
						<td><?php echo $m['id_user']; ?></td>
						<td><?php echo $m['password']; ?></td>
						<td><?php echo $m['username']; ?></td>
						<td><?php echo $m['name']; ?></td>
						<td><?php echo $m['level']; ?></td>
						<td><?php echo $m['create_at']; ?></td>
						<td><?php echo $m['updated_at']; ?></td>
						<td>
                            <a href="<?php echo site_url('m_user/edit/'.$m['id_user']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('m_user/remove/'.$m['id_user']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
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
