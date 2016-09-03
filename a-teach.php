<?php
session_start();
if(isset($_SESSION["username"])){
    ?>
<?php include_once 'page/header.php'; ?>
<?php
include_once 'class/class.php';
if(isset($_POST['btn-save'])){
    $id_inst = $_POST['id_inst'];
    $id_course = $_POST['id_course']; 
    if($crud->create_teach($id_inst, $id_course)){
        header("Location: t-teach.php?done");
    }else{
        header("Location: t-teach.php?err");
    }
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
                                    <h2>Form Siswa</small></h2>
                                    <div class="clearfix">
                                    </div>
                                    </div>
                                    <div class="x_content">
                                    	<br />
                                    <form class="form-horizontal form-label-left" method="post">

                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Pengajar </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                            
                                            <select class="select2_single form-control" name="id_inst">
                                                <option value=""></option>
                                                <?php 
                                        include_once 'koneksi.php';
                                        $result= "SELECT * FROM instructors";
                                        $hasil= mysql_query($result) or die(mysql_error());
                                        while ($row=mysql_fetch_array($hasil)){
                                            echo "<option value='".$row['id_inst']."'>".$row['name_inst']."</option>";
                                        }
                                        ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Kursus</label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                            
                                            <select class="select2_single form-control" name="id_course">
                                                <option value=""></option>
                                                <?php 
                                        include_once 'koneksi.php';
                                        $result= "SELECT * FROM course";
                                        $hasil= mysql_query($result) or die(mysql_error());
                                        while ($row=mysql_fetch_array($hasil)){
                                            echo "<option value='".$row['id_course']."'>".$row['name_course']."</option>";
                                        }
                                        ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="ln_solid"></div>
                                        <div class="form-group">
                                            <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                                                <button type="reset" class="btn btn-round btn-primary">Reset</button>
                                                <button type="submit" class="btn btn-round btn-success" name="btn-save">Submit</button>
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
    <?php
}
else {
    header("location:../index");}
?>