<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
<div class="sidebar-brand-text mx-3">Employee - Coop</div>
      </a>
      <!-- Divider -->
      <hr class="sidebar-divider my-0">
      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="index.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>
          <div class="sidebar-heading">
            การจัดการ
          </div>
      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item active">
        <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-fw fa-folder"></i>
          <span>รายการ</span>
        </a>
        <div id="collapsePages" class="collapse show" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
          <!--a class="collapse-item" href="forgot-password.html">Forgot Password</a-->
          <div class="collapse-divider"></div>
          <h6 class="collapse-header">จัดการข้อมูล</h6>
          <a class="collapse-item" href="my-company.php">ข้อมูลบริษัท<br></a>
          <h6 class="collapse-header">ระบบบริการฝากไฟล์</h6>
          <a class="collapse-item" href="upload_file.php">อัพโหลดเอกสาร<br></a>
          <a class="collapse-item" href="youfile.php">เอกสารของฉัน<br></a>
          <h6 class="collapse-header">เอกสารติดต่อหน่วยงาน</h6>
          <a class="collapse-item" href="bru_co5.php">แบบยืนยันการตอบรับ<br>นักศึกษาสหกิจศึกษา</a>
          <!-- <a class="collapse-item" href="bru_co6.php">หนังสือสัญญาการเข้ารับ <br>การฝึกปฏิบัติงานของนักศึกษา</a> -->
          <a class="collapse-item" href="bru_co9.php">แบบแจ้งรายละเอียดงาน  <br> ตำแหน่ง พนักงานที่ปรึกษา</a>
          <a class="collapse-item" href="bru_co13.php">แบบประเมินผล <br>  นักศึกษาสหกิจศึกษา</a>
          <a class="collapse-item" href="bru_co14.php">แบบประเมินรายงาน <br> นักศึกษาสหกิจศึกษา</a>
          <h6 class="collapse-header">นักศึกษาในความดูแล</h6>
          <a class="collapse-item" href="add_partner.php">เพิ่มนักศึกษา</a>
          <a class="collapse-item" href="std_partner.php">บันทึกงานนักศึกษา</a>
          <a class="collapse-item" href="systemcomment.php">ประเมินระบบ</a>           
          </div>
        </div>
      </li>
</a>
<!-- Divider -->
<hr class="sidebar-divider my-0">
<!-- Left Tab -->
<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">
<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
  <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>
</ul>
<!-- End of Sidebar -->
<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">
<!-- Main Content -->
<div id="content">
<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>
          <div class="modal fade" id="dialogFail" tabindex="-1" role="dialog" aria-labelledby="dialogFailLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="dialogFailLabel">คำเตือน!</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="window.location='../login/login.php';">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  เฉพาะ พนักงานองค์กร เท่านั้นทีสามารถใช้หน้านี้ได้
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-primary" onclick="window.location='../login/login.php';">กลับไปยังหน้า Login</button>
                </div>
              </div>
            </div>
          </div>
          <?php
            $user = !empty($_SESSION['user']) ? $_SESSION['user'] : '';
            $user_id = !empty($user['user_id']) ? $user['user_id'] : '';
            $user_type = !empty($user['user_type']) ? $user['user_type'] : '';
            $user_title = !empty($user['user_title']) ? $user['user_title'] : '';
            $user_name = !empty($user['user_name']) ? $user['user_name'] : '';
            $user_surname = !empty($user['user_surname']) ? $user['user_surname'] : '';
            // echo "<pre>"; print_r($user); echo "</pre>";
            if (empty($_SESSION['user'])) {
                echo '<input type="hidden" id="chk_user" value="1">';
            } elseif ($user_type == 3) { // admin
                echo 'สวัสดีคุณ '.$user_name.' '.$user_surname;
            } else {
                echo '<input type="hidden" id="chk_user" value="1">';
            }

          ?>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>

            

            <!-- Nav Item - Messages -->
            

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                
                <img class="img-profile rounded-circle" src="data:image/jpeg;base64,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">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="emp-infor.php">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  โปรไฟล์
                </a>
                <a class="dropdown-item" href="editprofile.php">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  แก้ไขโปรไฟล์
                </a>
                <!-- <a class="dropdown-item" href="#">
                  <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                  ประวัติการใช้งาน
                </a> -->
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="logout.php" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  ออกจากระบบ
                </a>
              </div>
            </li>
          </ul>
        </nav>