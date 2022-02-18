<!doctype html>
<html lang="en">
<?php
session_start();
include('condb.php');
$m_id = $_SESSION['m_id'];
$m_level = $_SESSION['m_level'];

if ($m_level == 'admin') Header("Location: ./admin.php");

$queryemp = "SELECT * FROM tbl_emp WHERE m_id=$m_id";
$resultm = mysqli_query($condb, $queryemp) or die("Error in query: $queryemp " . mysqli_error($condb));
$rowm = mysqli_fetch_array($resultm);
?>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
  <title>ระบบบันทึกเวลาการทำงาน by ร้านเจริญการค้า</title>
</head>

<body>
  <div class="container">
    <div class="row">
      <div class="col col-sm-12">
        <h3 class="jumbotron" align="center">WORK-IO ระบบบันทึกเวลาการทำงาน by ร้านเจริญการค้า </h3>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row">
      <div class="col col-sm-2">
        <img src="img/<?php echo $rowm['m_img']; ?>" width='70%'>
        <br>
        <b>
          <?php echo $rowm['m_firstname'] . $rowm['m_name'] . ' ' . $rowm['m_lastname']; ?>
          <br>
          <?php echo $rowm['m_position']; ?>
        </b>
        <br>
        <div class="list-group">
          <a href="profile.php" class="list-group-item list-group-item-action active">
            หน้าแรก
          </a>
          <a href="job.php" class="list-group-item list-group-item-action">ลากิจ</a>
          <a href="logout.php" class="list-group-item list-group-item-danger" onclick="return confirm('Logout??');">ออกจากระบบ</a>
        </div>
      </div>
      <div class="col col-sm-10">
        <h3>รายการลากิจ
          <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">
            <i class="fa fa-plus-square me-1" aria-hidden="true"></i> เพิ่มรายการ
          </button>
        </h3>
        <table class="table">
          <thead>
            <tr>
              <th>#</th>
              <th>ประเภท</th>
              <th>หมาายเหตุ</th>
              <th>ลงชื่อ</th>
              <th>เริ่ม</th>
              <th>สิ้นสุด</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $queryjob = "SELECT * FROM tbl_job WHERE ref_m_id = $m_id ORDER BY id DESC";
            $rs = mysqli_query($condb, $queryjob)  or die("Error:" . mysqli_error($condb));
            foreach ($rs as $row) {
            ?>
              <tr>
                <td><?php echo str_pad($row['id'], 4, "0", STR_PAD_LEFT) ?></td>
                <td><?php echo $row['job_detail'] ?></td>
                <td><?php echo $row['job_remark'] ?></td>
                <td><?php echo $row['job_by'] ?></td>
                <td><?php echo date("Y-m-d", strtotime($row['date_start'])) ?></td>
                <td><?php echo date("Y-m-d", strtotime($row['date_end'])) ?></td>
                <td></td>
              </tr>
            <?php
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <!--start form modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">บันทึกการลางาน</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="save_job.php" method="post">
            <div class="row mb-2">
              <label for="detail" class="col-md-4 col-form-label">เลือกประเภท:</label>
              <div class="col-md-8">
                <select name="job_detail" id="detail" class="form-control">
                  <option value="ลาป่วย">ลาป่วย</option>
                  <option value="ลากิจ">ลากิจ</option>
                  <option value="พักร้อน">พักร้อน</option>
                </select>
              </div>
            </div>
            <div class="row mb-2">
              <label for="date" class="col-md-4">วัน-เวลา</label>
              <div class="col-md-8">
                <div class="row">
                  <div class="col-md-12">
                    <label for="date_start" class="col-form-label"><i>วันเริ่ม</i></label>
                    <input type="date" name="date_start" id="date_start" class="form-control">
                  </div>
                  <div class="col-md-12">
                    <label for="date_end" class="col-form-label"><i>วันสิ้นสุด</i></label>
                    <input type="date" name="date_end" id="date_end" class="form-control">
                  </div>
                </div>
              </div>
            </div>
            <div class="row mb-2">
              <label for="remark" class="col-md-4 col-form-label">หมายเหตุ:</label>
              <div class="col-md-8">
                <textarea id="remark" class="form-control" name="job_remark" required minlength="3" style="height:5.5rem;resize:none"></textarea>
              </div>
            </div>
            <div class="row mb-2">
              <label for="by" class="col-md-4 col-form-label">ลงชื่อ:</label>
              <div class="col-md-8">
                <input id="by" type="text" class="form-control" name="job_by" required minlength="2" />
              </div>
            </div>
        </div>
        <div class="modal-footer">
          <input type="hidden" name="m_id" value="<?php echo $m_id; ?>">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
          <button type="submit" class="btn btn-success">บันทึก</button>
        </div>
        </form>
      </div>
    </div>
  </div>
  <!--end form modal -->
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>