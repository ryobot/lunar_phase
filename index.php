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
    <td><div class="board" style="background: #baa;"><b>Position</b></div></td>
    <!-- result -->
    <td rowspan="2">
        <div class="board" id="result_div" style="padding: 30px;">
        </div>
    </td>
    </tr>
    <!-- date -->
    <tr>
    <td><div class="board" style="background: #aba;"><b>Date</b>
        <input type="text" id="datepicker" value="<?php echo date('Y/m/d', $now); ?>" size="10" onchange="onDateChange()" />
        <input type="text" id="timepicker" class="time" value="<?php echo date('H:i:s', $now); ?>" size="10"  onchange="onDateChange()" />
    </div></td>
    </tr>
    <!-- data -->
    <tr>
    <td colspan = "2"><div class="board" style="background: #aab;"><b>date : </b>
        <table class="sliders"><tr>
        <td>Lunar Phase : <input type="text" id="lunarPhase" value="0" readonly size="6" /></td>
        <td>Earth Phase : <input type="text" id="earthPhase" value="0" readonly size="6" /></td>
        </tr><tr style="font-size: 10pt;">
        <td>New Moon=0,1 Full Moon:0.5</td>
        <td>Summer=0, 1 Fall=0.25 Winter=0.5 Spring=0.75</td>
        </tr></table>
    </td>
    </tr>
</table>

</div></body>
</html>
