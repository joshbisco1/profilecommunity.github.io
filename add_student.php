<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['sid']==0)) {
  header('location:logout.php');
} else{
  if(isset($_POST['submit']))
  {
    $names=$_POST['names'];
    $age=$_POST['age'];
    $studentno=$_POST['studentno'];
    $sex=$_POST['sex'];
    $class=$_POST['class'];
    $stream=$_POST['stream'];
    $parentname=$_POST['parentname'];
    $relation=$_POST['relation'];
    $ocupation=$_POST['ocupation'];
    $email=$_POST['email'];
    $country=$_POST['country'];
    $district=$_POST['district'];
    $state=$_POST['state'];
    $village=$_POST['village'];
    $photo=$_FILES["photo"]["name"];
    move_uploaded_file($_FILES["photo"]["tmp_name"],"studentimages/".$_FILES["photo"]["name"]);
    $query=mysqli_query($con, "insert into  students(studentno,StudentName,class,stream,age,gender,email,parentName,relation,occupation,country,district,state,village,contactno,nextphone,studentImage) value('$studentno','$names','$class','$stream','$age','$sex','$email','$parentname','$relation','$ocupation','$country','$district','$state','$village','$phone','$nextphone','$photo')");
    if ($query) {
      echo "<script>alert('Student has been registered.');</script>"; 
      echo "<script>window.location.href = 'add_student.php'</script>";   
      $msg="";
    }
    else
    {
      echo "<script>alert('Something Went Wrong. Please try again.');</script>";    
    }
  }
  ?>
  <!DOCTYPE html>
  <html>
  <?php @include("includes/head.php"); ?>
  <body class="hold-transition sidebar-mini">
    <div class="wrapper">
      <!-- Navbar -->
      <?php @include("includes/header.php"); ?>
      <!-- /.navbar -->

      <!-- Main Sidebar Container -->
      <?php @include("includes/sidebar.php"); ?>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Add Student</li>
                </ol>
              </div>
            </div>
          </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="container-fluid">
            <div class="row ">
              <div class="col-md-12">
                <!-- general form elements -->
                <div class="card card-primary">
                  <div class="card-header">
                    <h3 class="card-title">Add Student</h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <form role="form" method="post" enctype="multipart/form-data">
                    <div class="card-body">
                      <span style="color: brown"><h5>Student details</h5></span>
                      <hr>
                      <div class="row">
                        <div class="form-group col-md-3">
                          <label for="studentno">Student No.</label>
                          <input type="text" class="form-control" id="studentno" name="studentno" placeholder="Enter student No" required>
                        </div>
                        <div class="form-group col-md-5">
                          <label for="names">Names</label>
                          <input type="text" class="form-control" id="names" name="names" placeholder="Names" required>
                        </div>
                        <div class="form-group col-md-2">
                          <label for="age">Age</label>
                          <input type="text" class="form-control" id="age" name="age" placeholder="age"required>
                        </div>
                        <div class="form-group col-md-2">
                          <label for="sex">Sex</label>
                          <select type="select" class="form-control" id="sex" name="sex"required>
                            <option>Select Sex</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                          </select>
                        </div>
                      </div>
                      <div class="row">
                        <div class="form-group col-md-4">
                          <label for="age">Block</label>
                          <select type="select" class="form-control" id="class" name="class" required>
                            <option>Select Block</option>
                            <option value="Block 1">1</option>
                            <option value="Block 2">2</option>
                            <option value="Block 3">3</option>
                            <option value="Block 4">4</option>
                            <option value="Block 5">5</option>
                            <option value="Block 6">6</option>
                            <option value="Block 7 ">7</option>
                            <option value="Block 8 ">8</option>
                            <option value="Block 9">9</option>
                            <option value="Block 10">10</option>
                            <option value="Block 11">11</option>
                            <option value="Block 12">12</option>
                            <option value="Block 12 ">13</option>
                            <option value="Block 14">14</option>
                            <option value="Block 15">15</option>
                            <option value="Block 16">16</option>
                            <option value="Block 17">17</option>
                            <option value="Block 18">18</option>
                            <option value="Block 19">19</option>
                            <option value="Block 20">20</option>
                            
                            
                          </select>
                        </div>
                        <div class="form-group col-md-4">
                          <label for="age">Course/Degree<span style="color: blue;">*optional</span></label>
                          <select type="select" class="form-control" id="stream" name="stream">
                            <option></option>
                            <option value="bsit">Bachelor of Science in Information Technology</option>
                            <option value="Single">Single</option>
                            <option value="Single">Single</option>
                            <option value="Single">Single</option>
                            <option value="Single">Single</option>
                            <option value="Single">Single</option>
                            <option value="Single">Single</option>
                          </select>
                        </div>
                        <div class="form-group col-md-4">
                          <label for="exampleInputFile">Student Photo</label>
                          <div class="input-group">
                            <div class="custom-file">
                              <input type="file" class="" name="photo" id="photo" required>
                            </div>
                          </div>
                        </div>
                      </div>
                      <hr>
                      <span style="color: brown"><h5>Parent details</h5></span>
                      <div class="row">
                        <div class="form-group col-md-3">
                          <label for="parentname">Parent Name.</label>
                          <input type="text" class="form-control" id="parentname" name="parentname" placeholder="Enter Name" required>
                        </div>
                        <div class="form-group col-md-5">
                          <label for="relation">Relationship</label>
                          <select type="select" class="form-control" id="relation" name="relation"required>
                            <option>Select Relationship</option>
                            <option value="Father">Father</option>
                            <option value="Mother">Mother</option>
                            <option value="Father">Uncel</option>
                            <option value="Mother">Ant</option>
                            <option value="Mother">Grand</option>
                          </select>
                        </div>
                        <div class="form-group col-md-2">
                          <label for="age">Email</label>
                          <input type="text" class="form-control" id="email" name="email" placeholder="email" required>
                        </div>
                        <div class="form-group col-md-2">
                          <label for="sex">Ocupation</label>
                          <input type="select" class="form-control" id="ocupation" name="ocupation" placeholder="Occupation"required>
                            
                            
                       
                        </div>
                      </div>
                    
                      <hr>
                      <span style="color: brown"><h5>Address</h5></span>
                      <div class="row">
                        <div class="form-group col-md-3 ">
                          <label for="Country">Street.</label>
                          <input type="select" class="form-control" id="country" name="country" placeholder="Street"required>
                          
                            
                          </input>
                        </div>
                        <div class="form-group col-md-3 ">
                          <label for="district">Barangay</label>
                          <input type="text" class="form-control" id="district" name="district" placeholder="Barangay"required>
                        </div>
                        <div class="form-group col-md-3 ">
                          <label for="county">City/Town</label>
                          <input type="text" class="form-control" id="state" name="state" placeholder="City/Town"required>
                        </div>
                        <div class="form-group col-md-3">
                          <label for="village">Province</label>
                          <input type="text" class="form-control" id="village" name="village" placeholder="Province"required>
                        </div>
                      </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                      <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                    </div>
                  </form>
                </div>
                <!-- /.card -->
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div>
          <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
      </div>
      <!-- /.content-wrapper -->
      <?php @include("includes/footer.php"); ?>

    </div>

    <!-- ./wrapper -->
    <?php @include("includes/foot.php"); ?>
  </body>
  </html>
  <?php
}?>
