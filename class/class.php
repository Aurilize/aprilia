<?php
require_once 'db/db.php';
class Kursus{
	private $conn;

	public function __construct(){
		$database = new Database();
		$db_con = $database->Connect();
		$this->conn = $db_con;
	}
	public function create_st($name_st, $email, $password, $gender, $active){
		try{
			$stmt = $this->conn->prepare("INSERT INTO students (id_st, name_st, email, password, gender, active) VALUES ('',:name_st, :email, :password, :gender, :active)");
			  $stmt->bindparam(":name_st",$name_st);
   			$stmt->bindparam(":email",$email);
   			$stmt->bindparam(":password",$password);
        $stmt->bindparam(":gender",$gender);
        $stmt->bindparam(":active",$active);
   			$stmt->execute();
   			return true;
		}
		catch(PDOException $e){
			echo $e->getMessage(); 
   			return false;
		}
	}
	public function get_st($id_st){
		$stmt = $this->conn->prepare("SELECT * FROM students WHERE id_st=:id_st");
		$stmt->execute(array(":id_st"=>$id_st));
  		$editRow=$stmt->fetch(PDO::FETCH_ASSOC);
  		return $editRow;
	}
	public function update_st($id_st, $name_st, $email, $password, $gender, $active){
		try{
			$stmt=$this->conn->prepare("UPDATE students SET name_st=:name_st, email=:email, password=:password, gender=:gender, active=:active WHERE id_st=:id_st");
			  $stmt->bindparam(":id_st",$id_st);
        $stmt->bindparam(":name_st",$name_st);
        $stmt->bindparam(":email",$email);
        $stmt->bindparam(":password",$password);
        $stmt->bindparam(":gender",$gender);
        $stmt->bindparam(":active",$active);
   			$stmt->execute();
   			return true;
		}
   		catch(PDOException $e){
			echo $e->getMessage(); 
   			return false;
		}
	}
	public function delete_st($id_st){
		$stmt = $this->conn->prepare("DELETE FROM students WHERE id_st=:id_st");
  		$stmt->bindparam(":id_st",$id_st);
  		$stmt->execute();
  		return true;
	}
  	public function view_st($query){
		$stmt = $this->conn->prepare($query);
		$stmt->execute();
		if($stmt->rowCount()>0){
      $i=1;
			while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
				?>
				<tr>    <td><?php print $i; ?></td>
                <td style="display: none"><?php print($row['id_st']); ?></td>
                <td><?php print($row['name_st']); ?></td>
                <td><?php print($row['email']); ?></td>
                <td><?php print md5($row['password']); ?></td>
                <td><?php print($row['gender']); ?></td>
                <td><?php print($row['active']); ?></td>
                <td align="center">
                <a href="u-st.php?edit_user=<?php print($row['id_st']); ?>"><i class="label label-success"> Ubah Data</i></a>
                </td>
                <td align="center">
                <a href="t-st.php?delete_user=<?php print($row['id_st']); ?>" onclick="return confirm('Apakah Anda yakin?');"><i class="label label-danger"> Hapus</i></a>
                </td>
                </tr>
                <?php
                $i++;
            }
        }
        else{
        	?>
            <tr>
            <td>Nothing here...</td>
            </tr>
            <?php
        }
    }


    public function create_inst($name_inst, $gender){
    try{
      $stmt = $this->conn->prepare("INSERT INTO instructors (id_inst, name_inst, gender) VALUES ('',:name_inst, :gender)");
      $stmt->bindparam(":name_inst",$name_inst);
        $stmt->bindparam(":gender",$gender);
        return true;
    }
    catch(PDOException $e){
      echo $e->getMessage(); 
        return false;
    }
  }
  public function get_inst($id_inst){
    $stmt = $this->conn->prepare("SELECT * FROM instructors WHERE id_inst=:id_inst");
    $stmt->execute(array(":id_inst"=>$id_inst));
      $editRow=$stmt->fetch(PDO::FETCH_ASSOC);
      return $editRow;
  }
  public function update_inst($id_inst, $name_inst, $gender){
    try{
      $stmt=$this->conn->prepare("UPDATE instructors SET name_inst=:name_inst, gender=:gender WHERE id_inst=:id_inst");
        $stmt->bindparam(":id_inst",$id_inst);
        $stmt->bindparam(":name_inst",$name_inst);
        $stmt->bindparam(":gender",$gender);
        $stmt->execute();
        return true;
    }
      catch(PDOException $e){
      echo $e->getMessage(); 
        return false;
    }
  }
  public function delete_inst($id_inst){
    $stmt = $this->conn->prepare("DELETE FROM instructors WHERE id_inst=:id_inst");
      $stmt->bindparam(":id_inst",$id_inst);
      $stmt->execute();
      return true;
  }
    public function view_inst($query){
    $stmt = $this->conn->prepare($query);
    $stmt->execute();
    if($stmt->rowCount()>0){
      $i=1;
      while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
        ?>
        <tr>    <td><?php print $i; ?></td>
                <td style="display: none"><?php print($row['id_inst']); ?></td>
                <td><?php print($row['name_inst']); ?></td>
                <td><?php print ($row['gender']); ?></td>
                <td align="center">
                <a href="u-inst.php?edit_user=<?php print($row['id_inst']); ?>"><i class="label label-success"> Ubah Data</i></a>
                </td>
                <td align="center">
                <a href="t-inst.php?delete_user=<?php print($row['id_inst']); ?>" onclick="return confirm('Apakah Anda yakin?');"><i class="label label-danger"> Hapus</i></a>
                </td>
                </tr>
                <?php
                $i++;
            }
        }
        else{
          ?>
            <tr>
            <td>Nothing here...</td>
            </tr>
            <?php
        }
    }


    public function create_course($name_course, $description){
    try{
      $stmt = $this->conn->prepare("INSERT INTO course (id_course, name_course, description) VALUES ('',:name_course, :description)");
      $stmt->bindparam(":name_course",$name_course);
        $stmt->bindparam(":description",$description);
        $stmt->execute();
        return true;
    }
    catch(PDOException $e){
      echo $e->getMessage(); 
        return false;
    }
  }
  public function get_course($id_course){
    $stmt = $this->conn->prepare("SELECT * FROM course WHERE id_course=:id_course");
    $stmt->execute(array(":id_course"=>$id_course));
      $editRow=$stmt->fetch(PDO::FETCH_ASSOC);
      return $editRow;
  }
  public function update_course($id_course, $name_course, $description){
    try{
      $stmt=$this->conn->prepare("UPDATE course SET name_course=:name_course, description=:description WHERE id_course=:id_course");
        $stmt->bindparam(":id_course",$id_course);
        $stmt->bindparam(":name_course",$name_course);
        $stmt->bindparam(":description",$description);
        $stmt->execute();
        return true;
    }
      catch(PDOException $e){
      echo $e->getMessage(); 
        return false;
    }
  }
  public function delete_course($id_course){
    $stmt = $this->conn->prepare("DELETE FROM course WHERE id_course=:id_course");
      $stmt->bindparam(":id_course",$id_course);
      $stmt->execute();
      return true;
  }
    public function view_course($query){
    $stmt = $this->conn->prepare($query);
    $stmt->execute();
    if($stmt->rowCount()>0){
      $i=1;
      while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
        ?>
        <tr>    <td><?php print $i; ?></td>
                <td style="display: none"><?php print($row['id_course']); ?></td>
                <td><?php print($row['name_course']); ?></td>
                <td><?php print($row['description']); ?></td>
                <td align="center">
                <a href="u-course.php?edit_user=<?php print($row['id_course']); ?>"><i class="label label-success"> Ubah Data</i></a>
                </td>
                <td align="center">
                <a href="t-course.php?delete_user=<?php print($row['id_course']); ?>" onclick="return confirm('Apakah Anda yakin?');"><i class="label label-danger"> Hapus</i></a>
                </td>
                </tr>
                <?php
                $i++;
            }
        }
        else{
          ?>
            <tr>
            <td>Nothing here...</td>
            </tr>
            <?php
        }
    }


    public function create_tc($id_st, $id_teach){
    try{
      $stmt = $this->conn->prepare("INSERT INTO take_course (id_take, id_st, id_teach) VALUES ('',:id_st, :id_teach)");
      $stmt->bindparam(":id_st",$id_st);
        $stmt->bindparam(":id_teach",$id_teach);
        $stmt->execute();
        return true;
    }
    catch(PDOException $e){
      echo $e->getMessage(); 
        return false;
    }
  }
  public function get_tc($id_take){
    $stmt = $this->conn->prepare("SELECT * FROM take_course WHERE id_take=:id_take");
    $stmt->execute(array(":id_take"=>$id_take));
      $editRow=$stmt->fetch(PDO::FETCH_ASSOC);
      return $editRow;
  }
  public function update_tc($id_take, $id_st, $id_teach){
    try{
      $stmt=$this->conn->prepare("UPDATE take_course SET id_teach=:id_teach, id_st=:id_st WHERE id_take=:id_take");
        $stmt->bindparam(":id_take",$id_take);
        $stmt->bindparam(":id_st",$id_st);
        $stmt->bindparam(":id_teach",$id_teach);
        $stmt->execute();
        return true;
    }
      catch(PDOException $e){
      echo $e->getMessage(); 
        return false;
    }
  }
  public function delete_tc($id_take){
    $stmt = $this->conn->prepare("DELETE FROM take_course WHERE id_take=:id_take");
      $stmt->bindparam(":id_take",$id_take);
      $stmt->execute();
      return true;
  }
    public function view_tc($query){
    $stmt = $this->conn->prepare($query);
    $stmt->execute();
    if($stmt->rowCount()>0){
      $i=1;
      while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
        ?>
        <tr>    <td><?php print $i; ?></td>
                <td style="display: none"><?php print($row['id_take']); ?></td>
                <td><?php print($row['name_st']); ?></td>
                <td><?php print($row['name_course']); ?></td>
                <td align="center">
                <a href="u-tc.php?edit_user=<?php print($row['id_take']); ?>"><i class="label label-success"> Ubah Data</i></a>
                </td>
                <td align="center">
                <a href="t-tc.php?delete_user=<?php print($row['id_take']); ?>" onclick="return confirm('Apakah Anda yakin?');"><i class="label label-danger"> Hapus</i></a>
                </td>
                </tr>
                <?php
                $i++;
            }
        }
        else{
          ?>
            <tr>
            <td>Nothing here...</td>
            </tr>
            <?php
        }
    }


    public function create_teach($id_inst, $id_course){
    try{
      $stmt = $this->conn->prepare("INSERT INTO teach (id_teach, id_inst, id_course) VALUES ('',:id_inst, :id_course)");
      $stmt->bindparam(":id_inst",$id_inst);
        $stmt->bindparam(":id_course",$id_course);
        $stmt->execute();
        return true;
    }
    catch(PDOException $e){
      echo $e->getMessage(); 
        return false;
    }
  }
  public function get_teach($id_teach){
    $stmt = $this->conn->prepare("SELECT * FROM teach WHERE id_teach=:id_teach");
    $stmt->execute(array(":id_teach"=>$id_teach));
      $editRow=$stmt->fetch(PDO::FETCH_ASSOC);
      return $editRow;
  }
  public function update_teach($id_teach, $id_inst, $id_course){
    try{
      $stmt=$this->conn->prepare("UPDATE teach SET id_inst=:id_inst, id_course=:id_course WHERE id_teach=:id_teach");
        $stmt->bindparam(":id_teach",$id_teach);
        $stmt->bindparam(":id_inst",$id_inst);
        $stmt->bindparam(":id_course",$id_course);
        $stmt->execute();
        return true;
    }
      catch(PDOException $e){
      echo $e->getMessage(); 
        return false;
    }
  }
  public function delete_teach($id_user){
    $stmt = $this->conn->prepare("DELETE FROM user WHERE id_user=:id_user");
      $stmt->bindparam(":id_user",$id_user);
      $stmt->execute();
      return true;
  }
    public function view_teach($query){
    $stmt = $this->conn->prepare($query);
    $stmt->execute();
    if($stmt->rowCount()>0){
      $i=1;
      while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
        ?>
        <tr>    <td><?php print $i; ?></td>
                <td style="display: none"><?php print($row['id_teach']); ?></td>
                <td><?php print($row['name_inst']); ?></td>
                <td><?php print($row['name_course']); ?></td>
                <td align="center">
                <a href="u-teach.php?edit_user=<?php print($row['id_teach']); ?>"><i class="label label-success"> Ubah Data</i></a>
                </td>
                <td align="center">
                <a href="t-teach.php?delete_user=<?php print($row['id_teach']); ?>" onclick="return confirm('Apakah Anda yakin?');"><i class="label label-danger"> Hapus</i></a>
                </td>
                </tr>
                <?php
                $i++;
            }
        }
        else{
          ?>
            <tr>
            <td>Nothing here...</td>
            </tr>
            <?php
        }
    }


    public function view_female($query){
    $stmt = $this->conn->prepare($query);
    $stmt->execute();
    if($stmt->rowCount()>0){
      $i=1;
      while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
        ?>
        <tr>    <td><?php print $i; ?></td>
                <td style="display: none"><?php print($row['id_st']); ?></td>
                <td><?php print($row['name_st']); ?></td>
                <td><?php print($row['lebih']); ?></td>
                </tr>
                <?php
                $i++;
            }
        }
        else{
          ?>
            <tr>
            <td>Nothing here...</td>
            </tr>
            <?php
        }
    }
}
$crud=new Kursus;