<?php
  include_once '../config/db.php';
 
  include_once '../modal/company.php';

  $company = new Edit_Company();
  $find_company = $company->find_company();
  //echo "<pre>"; print_r($find_news); echo "</pre>";
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <link rel="icon" type="image/png" href="../img/icons/LOGO-bru.ico"/>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Admin News - Update</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.css" rel="stylesheet">
  <style>
    .button2
    {
      background-color: #1982C4;
      border: none;
      border-radius: 2px;
      color: white;
      padding: 10px 20px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 14px;
      margin: 4px 2px;
      cursor: pointer; /* Blue */
    }
    #com {
    border-collapse: collapse;
    width: 100%;
  }

  #com td, #customers th {
    border: 1px solid #ddd;
    padding: 8px;
  }

  #com tr:nth-child(even){background-color: #FAFFFD;}

  #com tr:hover {background-color: #FAFFFD;}

  #com th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: center;
    background-color: #FA824C;
    color: #FAFFFD;
  }

  </style> 
</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

  <?php include "header-admin.php" ?>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
          <h1 class="h3 mb-4 text-gray-800">ข้อมูลบริษัทที่มี</h1>
        </div>
        <div align="right">  
                          <button type="button" name="add" id="add" data-toggle="modal" data-target="#add_data_Modal" class="btn btn-warning">เพิ่มข้อมูล</button>  
        </div>  
        <div class="tabbable" id="tabs-343650">
                  <ul class="nav nav-tabs">
                    <li class="nav-item">                      <a class="nav-link active show" href="#tab1" data-toggle="tab">รายการที่มีอยู่</a>                    </li>
                    <li class="nav-item">                      <a class="nav-link" href="#tab2" data-toggle="tab">เพิ่มข้อมูลบริษัท</a>                    </li>
                  </ul>
          <div class="tab-content">
        <!-- Table Update News -->
            <div class="tab-pane active" id="tab1">
              <div>
                  <table class="table table-bordered table-sm" id="com">
                  <thead>
                    <tr>
                      <th>                  ลำดับ                </th>
                      <th>                  ชื่อบริษัท               </th>
                      <th>                  ที่อยู่บริษัท                 </th>
                      <th>                  เบอร์ติดต่อ                 </th>
                      <th>                  Fax                 </th>
                      <th>                  วันที่ปรับปรุงข้อมูล               </th>
                      <th>                  แก้ไข               </th>
                      <th>                  ลบ               </th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $i = 0;
                    if($find_company){
                      foreach ($find_company as $val){
                        $user_company_id = !empty($val['user_company_id'])? $val['user_company_id'] : '';
                        $user_company_name = !empty($val['user_company_name'])? $val['user_company_name'] : '';
                        $user_company_update_date = !empty($val['user_company_update_date'])? $val['user_company_update_date'] : '';
                        $user_company_address = !empty($val['user_company_address'])? $val['user_company_address'] : '';
                        $user_company_phone = !empty($val['user_company_phone'])? $val['user_company_phone'] : '';
                        $user_coop_company_fax = !empty($val['user_coop_company_fax'])? $val['user_coop_company_fax'] : '';
                        
                        $i = $i+1;
                    ?>
                    <tr class="table-success" id="row-<?php echo $user_company_id;?>">
                          
                          <td><?php echo $i;?></td>
                          <td><?php echo $user_company_name; ?></td>
                          <td><?php echo $user_company_address; ?></td>
                          <td><?php echo $user_company_phone; ?></td>
                          <td><?php echo $user_coop_company_fax; ?></td>
                          <td><?php echo $user_company_update_date; ?></td>                  
                          <td><input type="button" name="edit" value="Edit" id="<?php echo $user_company_id; ?>" class="btn btn-info btn-xs edit_data" /></td> 
                          <td><button type="button" name="del_news" class="btn btn-danger" onclick="return delete_company(<?php echo $user_company_id?>);">ลบ</button></td> 
                          
                    </tr>
                    <?php }}?>
                  </tbody>
                </table>
              </div>
              
            </div>

              <!-- <div class="tab-pane" id="tab2">
                <div>                 
                  <form method="post" type="insert" action ="../controller/company_controller.php" enctype="multipart/form-data">
                    <h4>รายชื่อบริษัท</h4> <br /> <br />         
                    <div class="col-auto">
                    <label>ใส่หัวข้อ</label>
                    <input type="text" name="user_coop_company_name" id="user_coop_company_name" class="form-control" required/>
                    <br />
                    <label>ที่อยู่ บริษัท</label>
                    <textarea class="form-control" name="user_coop_company_address" id="user_coop_company_address" cols="30" rows="10" required></textarea>                     
                    <br />
                                        
                    </div>
                    <input type="hidden" name="type" value="insert">
                    <input type="hidden" name="user_coop_company_update_date" id="user_coop_company_update_date" value="<?php echo date('Y-m-d H:i:s'); ?>">
                    <input type="hidden" name="user_coop_company_update_by" id="user_coop_company_update_by" value="<? echo $user_title." ". $user_name." ".$user_surname ?>">
                    <button type="submit"  class="btn btn-success">เพิ่มรายชื่อบริษัท</button>                    
                  </div>
                  </form>
                </div>
              </div> -->
        </div>
        
           
      </div>
      <!-- End of Main Content -->
 
          
<!-- Modal - Updae NEWS details -->
<div id="add_data_Modal" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">  
                     <button type="button" class="close" data-dismiss="modal">&times;</button>  
                     <h4 class="modal-title">Add Company</h4>  
                </div>  
                <div class="modal-body">  
                     <form method="post" id="insert_form_company">  
                          <label>ชื่อบริษัท</label>  
                          <input type="text" name="user_company_name" id="user_company_name" class="form-control" required/>  
                          <br />  
                          <label>ที่อยู่บริษัท</label>  
                          <textarea name="user_company_address" id="user_company_address" class="form-control" required></textarea>  
                          <br />  
                          <label>เบอร์ติดต่อ</label>  
                          <input type="text" name="user_company_phone" id="user_company_phone" class="form-control" required/>  
                          <br />  
                          <label>เบอร์ Fax</label>  
                          <input  type="text" name="user_company_fax" id="user_company_fax" class="form-control" required></input >  
                          <br />  
                          <input type="hidden" name="user_company_update_date" id="user_company_update_date" value="<?php echo date('Y-m-d H:i:s'); ?>">
                          <input type="hidden" name="user_company_update_by" id="user_company_update_by" value="<? echo $user_title." ".$user_name." ".$user_surname ?>">                        
                          <input type="submit" name="insert" id="insert" value="Insert" class="btn btn-success" /> 
                     </form>  
                </div>  
                <div class="modal-footer">  
                     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
                </div>  
           </div>  
      </div>  
 </div>  
<!-- // Modal -->
<script>
// Modal script
</script>
    </div>
    <!-- End of Content Wrapper -->
    <?php include "footer-admin.php" ?>
  </div>
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>
  <!-- Logout Modal-->
  <?php include "logout.php" ?>
  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>
  <script src="js/company.js"></script>
  <script src="js/script.js"></script>

</body>

</html>




   
 
