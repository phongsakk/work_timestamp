<!doctype html>
<html lang="en">
<?php
session_start();
if (empty($_GET['user'])) header('Location:./admin.php');
if (empty($_SESSION['m_id'])) header('Location:./index.php');
if (!($_SESSION['m_level'] == 'admin')) header('Location:./profile.php');

include('./condb.php');
$mid = mysqli_real_escape_string($condb, $_GET['user']);
$sql = "SELECT * FROM tbl_emp WHERE m_id='$mid'";
$result = mysqli_query($condb, $sql);
$user = mysqli_fetch_assoc($result);

$sql = "SELECT * FROM tbl_work_io WHERE m_id='$mid' ORDER BY workdate ASC";
$result = mysqli_query($condb, $sql);
$work = mysqli_fetch_all($result, MYSQLI_ASSOC);

$sql = "SELECT * FROM tbl_job WHERE ref_m_id='$mid'";
$result = mysqli_query($condb, $sql);
$absent = mysqli_fetch_all($result, MYSQLI_ASSOC);

mysqli_close($condb);

$events = json_encode(array());
if (count($work)) $events = workingArray($work, $absent);

function workingArray($arr, $leave)
{
    $dayBegin = strtotime($arr[0]['workdate']);
    $dayToday = strtotime(date("Y-m-d"));

    $workdate = array_column($arr, 'workdate');
    for ($i = 0; $i < count($workdate); $i++) {
        $workdate[$i] = strtotime($workdate[$i]);
    }

    $last = false;
    $eventDay = [];
    $eventTime = [];
    $period = [];
    for (
        $checkingDay = $dayBegin;
        $checkingDay <= $dayToday;
        $checkingDay += 86400
    ) {
        $index = array_search($checkingDay, $workdate);
        $work = false;

        // Event Time:
        if (!($index === false)) {
            if ($arr[$index]['workin']) {
                $event = [
                    'title' => 'เริ่ม',
                    'start' => date("Y-m-d", $checkingDay) . "T" . date("H:i:s", strtotime($arr[$index]['workin'])),
                    'allDay' => false,
                    "backgroundColor" => "#ODCAF0"
                ];
                array_push($eventTime, $event);
            }
            if ($arr[$index]['workout']) {
                $event = [
                    'title' => 'ออก',
                    'start' => date("Y-m-d", $checkingDay) . "T" . date("H:i:s", strtotime($arr[$index]['workout'])),
                    'allDay' => false,
                    "backgroundColor" => "#FFC107"
                ];
                array_push($eventTime, $event);
            }
            $work = true;
        }

        // Event Days:
        if ($work === $last) {
            $period["end"] = date("Y-m-d", $checkingDay + 86400);
        } else {
            if ($period) array_push($eventDay, $period);
            $period = [
                "title" => ($work) ? "มาทำงาน" : "ไม่มาทำงาน",
                "start" => date("Y-m-d", $checkingDay),
                "end" => date("Y-m-d", $checkingDay + 86400),
                "backgroundColor" => ($work) ? "#198754" : "#DC3545",
                "borderColor" => ($work) ? "#198754" : "#DC3545"
            ];
        }
        if ($checkingDay + 86400 > $dayToday) {
            array_push($eventDay, $period);
        }
        $last = $work;
    }

    // Leave:
    $eventLeave = [];
    foreach ($leave as $l) {
        array_push($eventLeave, [
            "title" => $l['job_detail'] . "(" . $l['job_remark'] . ")",
            "start" => $l['date_start'],
            "end" => date("Y-m-d", strtotime($l['date_end']) + 86400),
            "backgroundColor" => "#FFC107",
            "borderColor" => "#FFC107"
        ]);
    }
    $events = json_encode(array_merge($eventDay, $eventTime, $eventLeave));
    return $events;
}
?>

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" />
    <link href='https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css' rel='stylesheet' />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.2/main.min.css">
    <title>ระบบบันทึกเวลาการทำงาน by ร้านเจริญการค้า</title>

    <style>
        .fc-toolbar-chunk5 {
            float: right;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col col-lg-12">
                <h3 class="jumbotron" align="center">WORK-IO ระบบบันทึกเวลาการทำงาน by ร้านเจริญการค้า </h3>
            </div>
        </div>
    </div>

    <div class="container mb-4">
        <div class="bg-light rounded px-2 py-4">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="pb-2 border-bottom">:: ข้อมูลพนักงาน ::</h3>
                </div>
                <div class="col-lg-4">
                    <div class="p-3 mx-auto" style="width:18rem">
                        <div class="card border-primary mt-2">
                            <div class="card-header bg-primary">
                                <div class="row">
                                    <div class="col-auto mx-auto">
                                        <img src="./img/<?php echo $user['m_img'] ?>" alt="Profile" class="img-thumbnail rounded-circle" style="max-width:7rem">
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row mb-2">
                                    <div class="col-lg-12 font-weight-bold">
                                        ชื่อพนักงาน:
                                    </div>
                                    <div class="col-lg-12">
                                        <?php echo "{$user['m_firstname']}{$user['m_name']} {$user['m_lastname']}" ?>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-lg-12 font-weight-bold">
                                        รหัสพนักงาน:
                                    </div>
                                    <div class="col-lg-12">
                                        <?php echo $user['m_username'] ?>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-lg-12 font-weight-bold">
                                        ตำแหน่ง:
                                    </div>
                                    <div class="col-lg-12">
                                        <?php echo $user['m_position'] ?>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-lg-12 font-weight-bold">ติดต่อ:</div>
                                    <div class="col-lg-12">
                                        <i class="fa fa-phone me-1" aria-hidden="true"></i>
                                        <?php echo $user['m_phone'] ?>
                                    </div>
                                    <div class="col-lg-12">
                                        <i class="fa fa-envelope me-1" aria-hidden="true"></i>
                                        <?php echo $user['m_email'] ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="container">
                        <div id="calendar"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.2/main.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                timeZone: 'Asia/Bangkok',
                themeSystem: 'bootstrap',
                initialView: 'dayGridMonth',
                events: <?php echo $events ?>,
                eventTimeFormat: {
                    hour: '2-digit',
                    minute: '2-digit',
                    meridiem: 'short'
                }
            });
            calendar.render();
        });
    </script>
</body>

</html>