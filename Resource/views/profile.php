<?php include 'layouts/home-header.php'; 
    include '../../Controllers/OwnerGetController.php';
?>
<body>
    <?php
    include 'inc/navbar.php'; 
    if(isset($_SESSION['logged_user'])){
    ?>
        <div class="container">
            <?php if(isset($_GET['m'])){
                ?>
                <div class="alert alert-success mt-2">
                    <span><?php echo $_GET['m']; ?></span>
                </div>
                <?php
            }
            ?>
            <?php if(isset($_GET['e'])){
                ?>
                <div class="alert alert-danger mt-2">
                    <span><?php echo $_GET['e']; ?></span>
                </div>
                <?php
            }
            ?>
            <div class="d-flex flex-row mt-2">
                <div class="align-items-center card d-flex flex-column flex-grow-1 h-100 p-3">
                    <img src="../assets/images/b1g.png" alt="" style="border-radius:50%" height="100" width="100">
                    <span><?php echo $data['owner_firstname'].' '.$data['owner_lastname']; ?></span>
                </div>
                <div class="flex-grow-1 w-25 ml-5">
                    <ul class="nav nav-tabs" id="tabMenu" role="tablist">
                        <li class="nav-item">
                            <a href="#profile" class="nav-link active" id="profile-tab" data-toggle="tab" role="tab">
                            Profile
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#password" class="nav-link" id="password-tab" data-toggle="tab" role="tab">
                            Password
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content card">
                        <div class="tab-pane fade show active" id="profile" role="tabpanel">
                            <div class="container mt-3">
                                <form id="profileForm" action="../../Controllers/OwnerUpdateController.php?id=<?php echo $_GET['id']; ?>" method="post">
                                <div class="form-group">
                                    <label>Username</label>
                                    <input type="text" name="owner_username" value="<?php echo $data['owner_username']; ?>" class="form-control" placeholder="Username" readonly>
                                </div>
                                <div class="form-group">
                                    <label>First Name</label>
                                    <input type="text" name="owner_firstname" value="<?php echo $data['owner_firstname']; ?>" class="form-control" placeholder="First Name">
                                </div>
                                <div class="form-group">
                                    <label>Last Name</label>
                                    <input type="text" name="owner_lastname" value="<?php echo $data['owner_lastname']; ?>" class="form-control" placeholder="Last Name">
                                </div>
                                <div class="form-group">
                                    <label>Middle Name</label>
                                    <input type="text" name="owner_mi" value="<?php echo $data['owner_mi']; ?>" class="form-control" placeholder="Middle Name">
                                </div>
                                <div class="form-group">
                                    <div class="d-flex justify-content-end">
                                        <input type="submit" id="updateProfileBtn" name="update" value="Update" class="btn btn-primary">
                                    </div>
                                </div>
                            </form>
                            </div>
                        </div>
                        <div class="tab-pane" id="password" role="tabpanel">
                            <div class="container mt-3">
                                <form action="../../Controllers/OwnerUpdateController.php?id=<?php echo $_GET['id']; ?>" method="post" id="passwordForm">
                                    <div class="form-group">
                                        <label>Current Password</label>
                                        <input type="password" name="currentPassword" class="form-control" placeholder="Password">
                                    </div>
                                    <div class="form-group">
                                        <label>New Password</label>
                                        <input type="password" name="newPassword" class="form-control" placeholder="Password">
                                    </div>
                                    <div class="form-group">
                                        <label>Confirm Password</label>
                                        <input type="password" name="confirmPassword" class="form-control" placeholder="Password">
                                    </div>
                                <div class="form-group">
                                    <div class="d-flex justify-content-end">
                                        <input type="submit" id="updatePasswordBtn" name="updatePassword" value="Update" class="btn btn-primary">
                                    </div>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php
    }else{
        header('location:../../index.php');
    }?>    
</body>
<script>
    $('#tabMenu').click(function(e){
        e.preventDefault();
        $(this).tab('show');
    });
    $(function(){
        $('#profileForm').each(function(){
            $(this).data('serialized', $(this).serialize());
        }).on('change input', function(){
            $(this).find('#updateProfileBtn').prop('disabled', $(this).serialize() == $(this).data('serialized'));
        }).find('#updateProfileBtn').prop('disabled', true);
    
        $('#updatePasswordBtn').attr('disabled', true);
        $('#passwordForm :input').not('#updatePasswordBtn').bind('keyup', function(){
            if($(this).val().length != 0){
                $('#updatePasswordBtn').attr('disabled', false);
            }else{
                $('#updatePasswordBtn').attr('disabled', true);
            }
        });
    });
</script>
</html>