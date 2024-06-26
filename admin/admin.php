<?php 
include 'includes/header.php';
$adminsCount = countRecords('admins');
?>
<div class="container mt-5">
          <div class="row">
            <div class="col-md-6">
            <div class="badge bg-danger "><?= $adminsCount ?></div>
                <h1><i class="bi bi-people"></i> Admins/staff </h1>
             
            </div>
          </div>
</div>
<div class="container-fluid px-4 mt-4   ">
<div class="card mb-4">

                            <div class="card-header bg-warning"">
                            <?php alertMessage() ?>
                                <i class="fas fa-table me-1"></i>
                                The admins 
                                
                                <a href="admins-create.php" class="btn btn-dark btn-sm text-end"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                                 <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4"/>
                                </svg></a>
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple" >
                                    <thead >
                                        <tr>
                                            <th>id</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>status</th>
                                            <th>Created at</th></th>
                                            <th>action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>id</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>status</th>
                                            <th>Created at</th></th>
                                            <th>action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php 
                                        $admins = getAll('admins') ;
                                        if(mysqli_num_rows($admins) > 0) {?>
                                        <?php foreach($admins as $admin):?>
                                        <tr>
                                            <td><?= $admin['id'] ?></td>
                                            <td><?= $admin['name'] ?></td>
                                            <td><?= $admin['email'] ?></td>
                                            <td><?= $admin['phone'] ?></td>
                                            <td><?php 
                                            if($admin['is_ban'] == 1){
                                               echo '<span class="badge bg-danger">banned</span>';
                                            }else{
                                                echo '<span class="badge bg-success">active</span>';
                                            }
                                            ?></td>
                                            <td><?= $admin['created_at'] ?></td>
                                            <td>
                                                <a href="admins-edit.php?id=<?=  $admin['id']; ?>" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i></a>
                                                <a href="admins-delete.php?id=<?=  $admin['id']; ?>" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></a>
                                            </td>
                                       
                                        </tr>
                                        <?php endforeach; ?>
                                  
                                    </tbody>
                                </table>
                            </div>
                            <?php }else{ ?>
                                            <tr>
                                            <td colspan="4">No Records found</td>
                                       
                                        </tr>
                                        <?php } ?>
                        </div>
</div>
<?php include 'includes/footer.php'?>