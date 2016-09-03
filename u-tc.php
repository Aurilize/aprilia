<?php include_once 'page/header.php'; ?>
<?php
include_once 'class/class.php';
if(isset($_POST['btn-update'])){
    $id_take = $_GET['edit_user'];
    $id_st = $_POST['id_st'];
    $id_teach = $_POST['id_teach'];
    if($crud->update_tc($id_take, $id_st, $id_teach)){
        header("Location: t-tc.php?done");
    }else{
        header("Location: t-tc.php?err");
    }
}

if(isset($_GET['edit_user']))
{


 $id_take = $_GET['edit_user'];
 extract($crud->get_st($id_take)); 
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
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Siswa</label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                            <?php 
                                            include_once 'koneksi.php';
                                            $id_take = $_GET['edit_user'];
                                            $hasil=mysql_query("select *from take_course where id_take='".$id_take."'");
                                            $data=mysql_fetch_array($hasil);
                                            $id_st =$data['id_st'];
                                            ?>
                                                <select class="select2_single form-control" required="required" name="id_st">
                                                <?php
                                                include_once 'koneksi.php';
                                                $sql=mysql_query("select *from students");
                                                while($baris=mysql_fetch_array($sql)){
                                                    if ($id_st == $baris['id_st']) {
                                                        echo '<option value="'.$baris['id_st'].'" selected>'.$baris["name_st"].'</option>';
                                                    }
                                                    echo '<option value="'.$baris['id_st'].'" >'.$baris["name_st"];
                                                    echo '</option>';
                                                    }
                                                    ?>
                                                    </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Kursus</label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                            <?php 
                                            include_once 'koneksi.php';
                                            $id_take = $_GET['edit_user'];
                                            $hasil=mysql_query("select *from take_course where id_take='".$id_take."'");
                                            $data=mysql_fetch_array($hasil);
                                            $id_teach =$data['id_teach'];
                                            ?>
                                                <select class="select2_single form-control" required="required" name="id_teach">
                                                <?php
                                                include_once 'koneksi.php';
                                                $sql=mysql_query("select * FROM teach, course WHERE course.id_course=teach.id_course");
                                                while($baris=mysql_fetch_array($sql)){
                                                    if ($id_teach == $baris['id_teach']) {
                                                        echo '<option value="'.$baris['id_teach'].'" selected>'.$baris["name_course"].'</option>';
                                                    }
                                                    echo '<option value="'.$baris['id_teach'].'" >'.$baris["name_course"];
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