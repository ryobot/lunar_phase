<?php
$now = time();
$datestr = date("Y/m/d H:i:s", $now);
?>

<html lang="ja">
<head>
<meta charset="utf-8" />
<title>Lunar Phase Drawing Context</title>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.9.2/themes/base/jquery-ui.css" />
<script src="http://code.jquery.com/jquery-1.8.3.js"></script>
<script src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
<!-- <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1/i18n/jquery.ui.datepicker-ja.min.js"></script> -->
<script type="text/javascript" src="./jquery.timepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="./jquery.timepicker.css" />
<!--
<link rel="stylesheet" href="../jquery/jquery-ui.css" />
<script src="../jquery/jquery-1.8.3.js"></script>
<script src="../jquery/jquery-ui.js"></script>
-->
<link rel="stylesheet" href="lunar_phase.css" />
<script type="text/javascript" src="./lunar_phase.js"></script>
</head>
<body>
<div class="contents">
<table>
    <!-- title -->
    <tr>
    <td colspan="2"><div class="board" style="background: #667; text-align: center;"><b>Lunar Phase Drawing Context</b></div></td>
    </tr>
    <!-- position -->
    <tr>
    <td><div class="board" style="background: #baa;"><h5>位置関係 </h5></div></td>
    <!-- result -->
    <td rowspan="2">
        <div class="board" id="result_div" style="padding: 30px;">
        </div>
    </td>
    </tr>
    <!-- date -->
    <tr>
    <td><div class="board" style="background: #aba;"><h5>現在時刻 (T) </h5>
        <p><input type="text" id="datepicker" value="<?php echo date('Y/m/d', $now); ?>" size="10" onchange="onDateChange()" />
        <input type="text" id="timepicker" class="time" value="<?php echo date('H:i:s', $now); ?>" size="10"  onchange="onDateChange()" /></p>
    </div></td>
    </tr>
    <!-- data -->
    <tr>
    <td colspan = "2"><div class="board" style="background: #aab;">
        <h5>月相 <input type="text" id="lunarPhase" value="0" readonly size="6" /></h5>        
        <table>
            <tr><td>地球の公転周期 (Ep) </td><td><input type="text" id="earthRevPeriod" value="0" size="20" /></td></tr>
            <tr><td>月の公転周期　 (Lp) </td><td><input type="text" id="lunarRevPeriod" value="0" size="20" /></td></tr>
            <tr><td>月相の基準時間 (T0) </td><td><input type="text" id="lunarPhaseBase" value="0" size="20" /></td></tr>
            <tr><td>月相の計算式　 </td><td><input type="text" id="formula" value="0" size="40" /></td></tr>
        </table>
    </td>
    </tr>
</table>

</div></body>
</html>
