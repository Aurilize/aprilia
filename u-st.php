<?php include_once 'page/header.php'; ?>
<?php
include_once 'class/class.php';
if(isset($_POST['btn-update'])){
    $id_st = $_GET['edit_user'];
    $name_st = $_POST['name_st'];
    $email = $_POST['email']; 
    $password = $_POST['password'];
    $gender = $_POST['gender'];
    $active = $_POST['active'];
    if($crud->update_st($id_st, $name_st, $email, $password, $gender, $active)){
        header("Location: t-st.php?done");
    }else{
        header("Location: t-st.php?err");
    }
}

if(isset($_GET['edit_user']))
{


 $id_st = $_GET['edit_user'];
 extract($crud->get_st($id_st)); 
}
?>
<body class="nav-md">

    <div class="container body">


        <div class="main_container">

            <?php include_once 'page/sidebar.php'; ?>

            </div>
            <!-- /top navigation -->

            <!-- page content -->

            <div class="right_col" role="main">

                    
                        <div class="clearfix">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Form Ubah Siswa</small></h2>
                                    <div class="clearfix">
                                    </div>
                                    </div>
                                    <div class="x_content">
                                    	<br />
                                    <form class="form-horizontal form-label-left" method="post">
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama</label>
                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                                <input type="text" class="form-control" 
                                                name="name_st" value="<?php echo $name_st ?>">
                                            </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Email</label>
                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                                <input type="email" class="form-control" 
                                                name="email" value="<?php echo $email ?>">
                                            </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Password</label>
                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                                <input type="password" class="form-control" 
                                                name="password" value="<?php echo $password ?>">
                                            </div>
                                    </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Gender</label>
                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                                <select class="form-control" name="gender">
                                                <optgroup label="Pilih Akses">
                                                <?php
                                                if ($gender== "Laki - laki") echo "<option value='Laki - laki' selected>Laki - laki</option>";
                                                else echo "<option value='Laki - laki'>Laki - laki</option>";
                                                if ($gender== "Perempuan") echo "<option value='Perempuan' selected>Perempuan</option>";
                                                else echo "<option value='Perempuan'>Perempuan</option>";                  
                                                ?>
                                                    </optgroup>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Active</label>
                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                                <select class="form-control" name="active">
                                                <optgroup label="Pilih Akses">
                                                <?php
                                                if ($active== "Ya") echo "<option value='Ya' selected>Ya</option>";
                                                else echo "<option value='Ya'>Ya</option>";
                                                if ($active== "Tidak") echo "<option value='Tidak' selected>Tidak</option>";
                                                else echo "<option value='Tidak'>Tidak</option>";                  
                                                ?>
                                                    </optgroup>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="ln_solid"></div>
                                        <div class="form-group">
                                            <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                                                <?php
                                                $url = isset($_SERVER['HTTP_REFERER']) ? htmlspecialchars($_SERVER['HTTP_REFERER']) : '';
                                                ?>
                                                <a href="<?=$url?>" class="btn btn-round btn-primary" >Cancel</a>
                                                <button type="submit" class="btn btn-round btn-success" name="btn-update">Submit</button>
                                            </div>
                                        </div>
                                    </form>
                                    </div>
                                </div>
                                
                                </div>
                                
                                </div>

                                </div>

                <!-- footer content -->
                
                <!-- /footer content -->
            </div>
            <!-- /page content -->

        </div>

    </div>

    <?php include_once 'page/end.php'; ?>