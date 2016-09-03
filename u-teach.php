<?php include_once 'page/header.php'; ?>
<?php
include_once 'class/class.php';
if(isset($_POST['btn-update'])){
    $id_teach = $_GET['edit_user'];
    $id_inst = $_POST['id_inst'];
    $id_course = $_POST['id_course'];
    if($crud->update_teach($id_teach, $id_inst, $id_course)){
        header("Location: t-teach.php?done");
    }else{
        header("Location: t-teach.php?err");
    }
}

if(isset($_GET['edit_user']))
{


 $id_teach = $_GET['edit_user'];
 extract($crud->get_teach($id_teach)); 
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
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Pengajar</label>
                                            <div class="col-md-3 col-sm-3 col-xs-12">
                                            <?php 
                                            include_once 'koneksi.php';
                                            $id_teach = $_GET['edit_user'];
                                            $hasil=mysql_query("select *from teach where id_teach='".$id_teach."'");
                                            $data=mysql_fetch_array($hasil);
                                            $id_inst =$data['id_inst'];
                                            ?>
                                                <select class="select2_single form-control" required="required" name="id_inst">
                                                <?php
                                                include_once 'koneksi.php';
                                                $sql=mysql_query("select *from instructors");
                                                while($baris=mysql_fetch_array($sql)){
                                                    if ($id_inst == $baris['id_inst']) {
                                                        echo '<option value="'.$baris['id_inst'].'" selected>'.$baris["name_inst"].'</option>';
                                                    }
                                                    echo '<option value="'.$baris['id_inst'].'" >'.$baris["name_inst"];
                                                    echo '</option>';
                                                    }
                                                    ?>
                                                    </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Kursus</label>
                                            <div class="col-md-3 col-sm-3 col-xs-12">
                                            <?php 
                                            include_once 'koneksi.php';
                                            $id_teach = $_GET['edit_user'];
                                            $hasil=mysql_query("select *from teach where id_teach='".$id_teach."'");
                                            $data=mysql_fetch_array($hasil);
                                            $id_course =$data['id_course'];
                                            ?>
                                                <select class="select2_single form-control" required="required" name="id_course">
                                                <?php
                                                include_once 'koneksi.php';
                                                $sql=mysql_query("select *from course");
                                                while($baris=mysql_fetch_array($sql)){
                                                    if ($id_course== $baris['id_course']) {
                                                        echo '<option value="'.$baris['id_course'].'" selected>'.$baris["name_course"].'</option>';
                                                    }
                                                    echo '<option value="'.$baris['id_course'].'" >'.$baris["name_course"];
                                                    echo '</option>';
                                                    }
                                                    ?>
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