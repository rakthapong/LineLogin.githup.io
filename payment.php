<?php
$APP_ID = "1e844dd1-1d99-431f-909c-eb52684f5ccf";

$lineUserId = $_GET['lineUserId'] ?? '';

if (empty($lineUserId)) {
  echo "<h2 style='font-family:sans-serif;color:red;text-align:center;margin-top:80px;'>
          ❌ ไม่พบข้อมูลผู้ใช้งาน (lineUserId)
        </h2>";
  exit;
}

$userAgent = $_SERVER['HTTP_USER_AGENT'] ?? '';
$isLineBrowser = strpos($userAgent, 'Line') !== false;
?>

<!DOCTYPE html>
<html lang="th">
<head>
  <meta charset="UTF-8">
  <title>แจ้งชำระเงิน</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <style>
    body {
      font-family: sans-serif;
      background: #f5f5f5;
      text-align: center;
      padding: 40px 20px;
    }
    .box {
      background: #ffffff;
      padding: 30px;
      border-radius: 14px;
      max-width: 420px;
      margin: auto;
      box-shadow: 0 6px 14px rgba(0,0,0,0.12);
    }
    h2 {
      color: #d32f2f;
      margin-bottom: 10px;
    }
    p {
      color: #444;
      font-size: 15px;
      line-height: 1.6;
    }
    .btn {
      display: block;
      margin-top: 22px;
      padding: 14px;
      background: #1976d2;
      color: #fff;
      text-decoration: none;
      border-radius: 10px;
      font-size: 16px;
    }
    .note {
      margin-top: 14px;
      font-size: 13px;
      color: #777;
    }
  </style>
</head>

<body>

<div class="box">

<?php if ($isLineBrowser): ?>

  <h2>⚠️ กรุณาเปิดด้วยเบราเซอร์</h2>

  <p>
    ระบบไม่รองรับการใช้งานผ่าน<br>
    <b>เบราเซอร์ของ LINE</b>
  </p>

  <p>
    👉 กด <b>⋮ มุมขวาบน</b><br>
    👉 เลือก <b>เปิดใน Chrome / Safari</b>
  </p>

  <a class="btn"
     href="https://www.appsheet.com/start/<?php echo $APP_ID; ?>
     ?userSettings.lineUserId=<?php echo urlencode($lineUserId); ?>
     #view=payment_user">
     เปิดระบบแจ้งชำระเงิน
  </a>

  <div class="note">
    หากเปิดผ่าน LINE จะเกิดปัญหา Sync Token
  </div>

<?php else: ?>

  <h2>🔐 เข้าสู่ระบบแจ้งชำระเงิน</h2>

  <p>
    ระบบพร้อมใช้งานแล้ว<br>
    กรุณากดปุ่มด้านล่าง
  </p>

  <a class="btn"
     href="https://www.appsheet.com/start/<?php echo $APP_ID; ?>
     ?userSettings.lineUserId=<?php echo urlencode($lineUserId); ?>
     #view=payment_user">
     👉 แจ้งชำระเงิน
  </a>

<?php endif; ?>

</div>

</body>
</html>
