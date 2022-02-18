<!doctype html>
<html lang="en">
<?php
session_start();
if (empty($_SESSION['m_id'])) header('Location:./index.php');
if (!($_SESSION['m_level'] === 'admin')) header('Location:./profile.php');
?>

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
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

  <div class="container mb-4">
    <div class="px-2 py-4 bg-light rounded">
      <div class="row">
        <div class="col-sm-12 mb-2">
          <div class="row">
            <div class="col-sm-auto mr-auto">
              <h4>:: ผู้ดูแลระบบ ::</h4>
            </div>
            <div class="col-sm-auto ml-auto">
              <a href="./logout.php" role="button" class="btn btn-danger ml-auto">
                <i class="fa fa-sign-out me-1" aria-hidden="true"></i> ออกจากระบบ
              </a>
            </div>
          </div>
        </div>
        <div class="col-sm-12">
          <table class="table table-hover">
            <thead class="thead-dark">
              <tr>
                <th>รหัสพนักงาน</th>
                <th>ชื่อ</th>
                <th>ตำแหน่ง</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <?php
              include('./condb.php');
              $sql = "SELECT * FROM tbl_emp WHERE m_level <> 'admin'";
              $result = mysqli_query($condb, $sql);
              if (mysqli_num_rows($result)) {
                while ($row = mysqli_fetch_assoc($result)) {
              ?>
                  <tr>
                    <td><?php echo $row['m_username'] ?></td>
                    <td><?php echo "{$row['m_firstname']}{$row['m_name']} {$row['m_lastname']}" ?></td>
                    <td><?php echo $row['m_position'] ?></td>
                    <td style="padding-block:.3125rem">
                      <a href="./info.php?user=<?php echo $row['m_id'] ?>" role=" button" class="btn btn-info">
                        <i class="fa fa-info-circle me-1" aria-hidden="true"></i> ดูข้อมูล
                      </a>
                    </td>
                  </tr>
              <?php
                }
              }
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
</body>

</html>