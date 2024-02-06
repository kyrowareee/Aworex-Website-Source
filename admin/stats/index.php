<?php include $_SERVER['DOCUMENT_ROOT']."/classes/DB.php"; 
if (!isset($_GET['sort'])) {
    header('Location: ?sort=eft-7days');
}

?>
<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>
<link rel="stylesheet" href="/static/css/root.admin.css">
        <title>Admin</title>
        <script
src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js">
</script>
        <?php include $_SERVER['DOCUMENT_ROOT']."/classes/NavbarAdminNew.php"; ?>
        </head>
    <body>
    <script>
            $(document).ready(function() {


                    




                $('#reviewAdd').submit(function(e) {


                    e.preventDefault();
                    var formData = new FormData(this);
                    $.ajax({
                        type: "POST",
                        url: '/api/Admin/Promocodes/Add',
                        data: formData,
                        processData: false,
            contentType: false,

                       
                        success: function(response) {
                            var jsonData = JSON.parse(response);

                            console.log(response);
                            if (jsonData.errorcode == "0") {
                                Notify.noty('success', 'Created successfully!');
                                $.ajax({
                        type: "GET",
                        url: '/api/Admin/Promocodes/List',
                        processData: false,
            contentType: false,

                       
                        success: function(response) {
                            $('#chatc').html(response);
                        },
                        
                    });
              
                        
                  
                
                

            


                                
                            } else {
                                Notify.noty('danger', 'Unknown Error');
                            }
                        },
                        
                    });
                });
            });
        </script>
    

        <div class="container" style="margin-top: 75px;">
        <div class="modal fade" id="reviewModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
                <center><h1 class="h3 mb-3 mt-4 fw-normal text-center">Add Review</h1></center>
            <div class="modal-body">
            <form id="reviewAdd" action="" method="post">
            <div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Code</label>
  <input type="text" name="text" class="form-control" id="exampleFormControlInput1">
</div>
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Discount</label>
  <input type="text" name="value" class="form-control" id="exampleFormControlInput1">
</div>
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Amount of use</label>
  <input type="text" name="uses" class="form-control" id="exampleFormControlInput1">
</div>
            
            </div>

            <div class="modal-footer">
            <button data-bs-dismiss="modal" type="submit" style="margin-top: 20px; margin-left: 7px;" class="price__card__button">Add</button>
      </div>
      </form>
            
        </div>
    </div>
</div>
        <h1>Statistics</h1>
        <div class="col-md-auto d-flex align-items-center">
        EFT Cheat
        <a style="margin-bottom: 20px; margin-right: 7px; margin-left: 7px;" href="?sort=eft-1day" class="btn btn-sm btn-primary">1 day</a>
        <a style="margin-bottom: 20px; margin-right: 7px;" href="?sort=eft-7days" class="btn btn-sm btn-primary">7 days</a>
        <a style="margin-bottom: 20px; margin-right: 7px;" href="?sort=eft-30days" class="btn btn-sm btn-primary">30 days</a>
        <a style="margin-bottom: 20px; margin-right: 7px;" href="?sort=eft-alltime" class="btn btn-sm btn-primary">All time</a>
        </div>
         <div class="col-md-auto d-flex align-items-center">
        CS2 Cheat
        <a style="margin-bottom: 20px; margin-right: 7px; margin-left: 7px;" href="?sort=cs2-1day" class="btn btn-sm btn-primary">1 day</a>
        <a style="margin-bottom: 20px; margin-right: 7px;" href="?sort=cs2-7days" class="btn btn-sm btn-primary">7 days</a>
        <a style="margin-bottom: 20px; margin-right: 7px;" href="?sort=cs2-30days" class="btn btn-sm btn-primary">30 days</a>
        <a style="margin-bottom: 20px; margin-right: 7px;" href="?sort=cs2-alltime" class="btn btn-sm btn-primary">All time</a>
        </div>
        <div class="col-md-auto d-flex align-items-center">
        Spoofer
        <a style="margin-bottom: 20px; margin-right: 7px; margin-left: 7px;" href="?sort=spf-1day" class="btn btn-sm btn-primary">1 day</a>
        <a style="margin-bottom: 20px; margin-right: 7px;" href="?sort=spf-7days" class="btn btn-sm btn-primary">7 days</a>
        <a style="margin-bottom: 20px; margin-right: 7px;" href="?sort=spf-30days" class="btn btn-sm btn-primary">30 days</a>
        <a style="margin-bottom: 20px; margin-right: 7px;" href="?sort=spf-alltime" class="btn btn-sm btn-primary">All time</a>
        </div>
         <div class="col-md-auto d-flex align-items-center">
        EFT Arena Cheat
        <a style="margin-bottom: 20px; margin-right: 7px; margin-left: 7px;" href="?sort=efta-1day" class="btn btn-sm btn-primary">1 day</a>
        <a style="margin-bottom: 20px; margin-right: 7px;" href="?sort=efta-7days" class="btn btn-sm btn-primary">7 days</a>
        <a style="margin-bottom: 20px; margin-right: 7px;" href="?sort=efta-30days" class="btn btn-sm btn-primary">30 days</a>
        <a style="margin-bottom: 20px; margin-right: 7px;" href="?sort=efta-alltime" class="btn btn-sm btn-primary">All time</a>
        </div>
        <?php

$months = [
    1 => 'января',
    2 => 'февраля',
    3 => 'марта',
    4 => 'апреля',
    5 => 'мая',
    6 => 'июня',
    7 => 'июля',
    8 => 'августа',
    9 => 'сентября',
    10 => 'октября',
    11 => 'ноября',
    12 => 'декабря'
];
if ($_GET['sort'] === 'eft-1day' || $_GET['sort'] === 'cs2-1day' || $_GET['sort'] === 'efta-1day' ||  $_GET['sort'] === 'spf-1day') {
    $day = 'AND DATE(date) >= DATE_SUB(:currentDate, INTERVAL 1 DAY)';
    $dayss = 1;
}
if ($_GET['sort'] === 'eft-7days' || $_GET['sort'] === 'cs2-7days'|| $_GET['sort'] === 'efta-7days' ||  $_GET['sort'] === 'spf-7days') {
    $day = 'AND DATE(date) >= DATE_SUB(:currentDate, INTERVAL 7 DAY)';
    $dayss = 7;
}
if ($_GET['sort'] === 'eft-30days' || $_GET['sort'] === 'cs2-30days'|| $_GET['sort'] === 'efta-30days' ||  $_GET['sort'] === 'spf-30days') {
    $day = 'AND DATE(date) >= DATE_SUB(:currentDate, INTERVAL 31 DAY)';
    $dayss = 25;
}
// Получаем текущую дату
$currentDate = date('Y-m-d');

// Создаем пустой массив для хранения чисел последних 7 дней и их названий месяцев
$lastSevenDays = [];

// Цикл для добавления чисел последних 7 дней в массив
for ($i = 0; $i <= $dayss; $i++) {
    $currentDay = date('j', strtotime("-$i days", strtotime($currentDate)));
    $currentMonth = date('n', strtotime("-$i days", strtotime($currentDate)));
    $lastSevenDays[] = $currentDay;
}

// Выводим числа последних 7 дней в виде строки, разделенной запятыми
$date = implode(', ', array_reverse($lastSevenDays));


$currentDate = date('Y-m-d');

// Массивы для хранения данных
$profitPerDay = [];
if ($_GET['sort'] === 'eft-1day' || $_GET['sort'] === 'eft-7days' || $_GET['sort'] === 'eft-30days' || $_GET['sort'] === 'eft-alltime') {
$cheatTypes = [
    'cheat1' => 5,
    'cheat3' => 30,
    'cheat5' => 80,
    'cheat6' => 179
];
$when = "WHEN account_id = 'cheat1' THEN 5
            WHEN account_id = 'cheat3' THEN 30
            WHEN account_id = 'cheat5' THEN 80
            WHEN account_id = 'cheat6' THEN 179";
$whend = "WHEN account_id = 'cheat1' THEN 1
            WHEN account_id = 'cheat3' THEN 1
            WHEN account_id = 'cheat5' THEN 1
            WHEN account_id = 'cheat6' THEN 1";
$accountIds = ['cheat1', 'cheat3', 'cheat5', 'cheat6'];

// Формируем строку для условия в запросе
$condition = implode("','", $accountIds);

// Запрос к базе данных для получения количества проданных продуктов за последние 7 дней
$queryd = "SELECT COUNT(*) AS total_sold 
          FROM shops_tokens 
          WHERE id >= 475 
          $day
          AND account_id IN ('$condition')";
$paramsd = array(':currentDate' => $currentDate);

$resultd= DB::query($queryd, $paramsd)[0]['total_sold'];
}

if ($_GET['sort'] === 'cs2-1day' || $_GET['sort'] === 'cs2-7days' || $_GET['sort'] === 'cs2-30days' || $_GET['sort'] === 'cs2-alltime') {
$cheatTypes = [
    'csgo1' => 3,
    'csgo2' => 15,
    'csgo3' => 25,
    'csgo4' => 75
];
$when = "WHEN account_id = 'csgo1' THEN 3
            WHEN account_id = 'csgo2' THEN 15
            WHEN account_id = 'csgo3' THEN 25
            WHEN account_id = 'csgo4' THEN 75";
$whend = "WHEN account_id = 'csgo1' THEN 1
            WHEN account_id = 'csgo2' THEN 1
            WHEN account_id = 'csgo3' THEN 1
            WHEN account_id = 'csgo4' THEN 1";
            
$accountIds = ['csgo1', 'csgo2', 'csgo3', 'csgo4'];

// Формируем строку для условия в запросе
$condition = implode("','", $accountIds);
$querydd = "SELECT * FROM shops_tokens WHERE id >= 475 $day AND account_id IN ('$condition')";
$paramsdd = array(':currentDate' => $currentDate);
$shopsd = DB::query($querydd, $paramsdd);
$selled = 0;
foreach ($shopsd as $s) {
    if ($s['account_id'] === 'csgo1') {
        $selled = $selled+4;
    } else if ($s['account_id'] === 'csgo2') {
        $selled = $selled+25;
    } else if ($s['account_id'] === 'csgo3') {
        $selled = $selled+75;
    } else if ($s['account_id'] === 'csgo4') {
        $selled = $selled+149;
    }
}

// Запрос к базе данных для получения количества проданных продуктов за последние 7 дней
$queryd = "SELECT COUNT(*) AS total_sold 
          FROM shops_tokens 
          WHERE id >= 475 
          $day
          AND account_id IN ('$condition')";
$paramsd = array(':currentDate' => $currentDate);

$resultd = DB::query($queryd, $paramsd)[0]['total_sold'];
}
if ($_GET['sort'] === 'efta-1day' || $_GET['sort'] === 'efta-7days' || $_GET['sort'] === 'efta-30days' || $_GET['sort'] === 'efta-alltime') {
$cheatTypes = [
    'arena1' => 4,
    'arena2' => 25,
    'arena3' => 75,
    'arena4' => 149
];
$when = "WHEN account_id = 'arena1' THEN 4
            WHEN account_id = 'arena2' THEN 25
            WHEN account_id = 'arena3' THEN 75
            WHEN account_id = 'arena4' THEN 149";
$whend = "WHEN account_id = 'arena1' THEN 1
            WHEN account_id = 'arena2' THEN 1
            WHEN account_id = 'arena3' THEN 1
            WHEN account_id = 'arena4' THEN 1";

$accountIds = ['arena1', 'arena2', 'arena3', 'arena4'];

// Формируем строку для условия в запросе
$condition = implode("','", $accountIds);

// Запрос к базе данных для получения количества проданных продуктов за последние 7 дней
$queryd = "SELECT COUNT(*) AS total_sold 
          FROM shops_tokens 
          WHERE id >= 475 
          $day
          AND account_id IN ('$condition')";
$paramsd = array(':currentDate' => $currentDate);

$resultd = DB::query($queryd, $paramsd)[0]['total_sold'];

$querydd = "SELECT * FROM shops_tokens WHERE id >= 475 $day AND account_id IN ('$condition')";
$paramsdd = array(':currentDate' => $currentDate);
$shopsd = DB::query($querydd, $paramsdd)[0]['total_sold'];
$selled = 0;
foreach ($shopsd as $s) {
    echo $s['account_id'];
    if ($s['account_id'] === 'arena1') {
        $selled = $selled+4;
    } else if ($s['account_id'] === 'arena2') {
        $selled = $selled+25;
    } else if ($s['account_id'] === 'arena3') {
        $selled = $selled+75;
    } else if ($s['account_id'] === 'arena4') {
        $selled = $selled+149;
    }
}
}


if ($_GET['sort'] === 'spf-1day' || $_GET['sort'] === 'spf-7days' || $_GET['sort'] === 'spf-30days' || $_GET['sort'] === 'spf-alltime') {
$cheatTypes = [
    'spoofer1' => 20,
    'spoofer2' => 50,
    'spoofer3' => 99
];
$when = "WHEN account_id = 'spoofer' THEN 20
            WHEN account_id = 'spoofer1' THEN 20
            WHEN account_id = 'spoofer2' THEN 50
            WHEN account_id = 'spoofer3' THEN 99";
$whend = "WHEN account_id = 'spoofer' THEN 1
            WHEN account_id = 'spoofer1' THEN 1
            WHEN account_id = 'spoofer2' THEN 1
            WHEN account_id = 'spoofer3' THEN 1";


$accountIds = ['spoofer', 'spoofer1', 'spoofer2', 'spoofer3'];

// Формируем строку для условия в запросе
$condition = implode("','", $accountIds);

// Запрос к базе данных для получения количества проданных продуктов за последние 7 дней
$queryd = "SELECT COUNT(*) AS total_sold 
          FROM shops_tokens 
          WHERE id >= 475 
          $day
          AND account_id IN ('$condition')";
$paramsd = array(':currentDate' => $currentDate);


$querydd = "SELECT * FROM shops_tokens WHERE id >= 475 $day AND account_id IN ('$condition')";
$paramsdd = array(':currentDate' => $currentDate);
$shopsd = DB::query($querydd, $paramsdd)[0]['total_sold'];
$selled = 0;
foreach ($shopsd as $s) {
    if ($s['account_id'] === 'arena1') {
        $selled = $selled+4;
    } else if ($s['account_id'] === 'arena2') {
    } else if ($s['account_id'] === 'arena3') {
        $selled = $selled+75;
    } else if ($s['account_id'] === 'arena4') {
        $selled = $selled+149;
    }
}

$resultd = DB::query($queryd, $paramsd)[0]['total_sold'];


}


$query = "SELECT DATE(date) AS day, SUM(CASE 
            $whend
            ELSE 0
          END) AS profit 
          FROM shops_tokens 
          WHERE id >= 475 $day
          GROUP BY DAY(date)
          ORDER BY date";
// Запрос к базе данных для получения прибыли за последние 7 дней

$params = array(':currentDate' => $currentDate);

$result = DB::query($query, $params);

// Обработка результатов запроса
if ($result) {
    // Инициализация массива для хранения количества проданных копий по дням

    // Проход по результатам запроса
    foreach ($result as $row) {
        $formattedDate = date_create_from_format('Y-m-d', $row['day'])->format('j F');

        // Добавление количества проданных копий в массив
        $profitPerDay[$formattedDate] = $profitPerDay[$formattedDate]+$row['profit'];
    }



    // Вывод количества проданных копий по дням в календарном порядке
     $formattedProfit = implode(', ', $profitPerDay);

}

?>
<p>Total Selled: <?=$resultd?></p>
<p>Total Earned: <?=$selled?></p>
        <canvas id="myChart" style="width:100%"></canvas>

<script>
const xValues = [<?=$date?>];
const yValues = [<?=$formattedProfit?>];

new Chart("myChart", {
  type: "line",
  data: {
    labels: xValues,
    datasets: [{
      fill: false,
      lineTension: 0,
      backgroundColor: "#0078FF",
      borderColor: "#0059BD",
      data: yValues
    }]
  },
  options: {
    legend: {display: false},
    scales: {
      yAxes: [{ticks: {min: 0, max:<?=max($profitPerDay)?>}}],
    }
  }
});
</script>

        
      
        
    </body>
</html>