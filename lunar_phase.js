
/*
地相基準時刻 2016/6/23 3:12:08 (いて座Aスターへの最接近時刻)
月相基準時刻 2016/3/9 0:24:00 (皆既月食)
地球公転周期 365.2421904 日	
月公転周期	27.321662 日

月相：
{ (now - 月相基準時刻) / 月公転周期 - (now - 月相基準時刻) / 地球公転周期 } の小数点以下
地相：
{ (now - 地相基準時刻) / 地球公転周期 } の小数点以下
 */

var data = {};

var jsonhttp = new XMLHttpRequest();
jsonhttp.onreadystatechange = function () {
  if (jsonhttp.readyState == 4) {
    if (jsonhttp.status == 200) {
        if ( !loadData() ) {
            data = JSON.parse(jsonhttp.responseText);
            onDateChange();
        }
    }
  }
}
jsonhttp.open("GET", "./lunar_phase.json");
jsonhttp.send();

function saveData() {
    if  (window.localStorage) {
        onDataChange();
        var json = JSON.stringify(data);
        window.localStorage.setItem("save_data" , json);
        window.alert("設定を保存しました");
    } else {
        window.alert("Cannot use localStorage.");
    }
}

function loadData() {
    if  (window.localStorage) {
        json = window.localStorage.getItem("save_data");
        if ( !json ) {
            return false;
        }
        data = JSON.parse(json);
        onDateChange();
    } else {
        window.alert("Cannot use localStorage.");
    }
    return true;
}

function floatFormat( number, n ) {
    var _pow = Math.pow( 10 , n ) ;
    return Math.round( number * _pow ) / _pow ;
}

function onDataChange () {
    data.earthRevPeriod = document.getElementById("earthRevPeriod").value;
    data.lunarRevPeriod = document.getElementById("lunarRevPeriod").value;
    data.lunarPhaseBase = document.getElementById("lunarPhaseBase").value;
    data.formula = document.getElementById("formula").value;

    T = date;
    T0 = new Date(data.lunarPhaseBase);
    Lp = data.lunarRevPeriod*86400000;
    Ep = data.earthRevPeriod*86400000;
   try {
        lunarPos = eval(data.formula);
    } catch(ex) {
        lunarPos = "error";
    }

    if ( isNaN(lunarPos) ) {
        document.getElementById("lunarPhase").value = "Error";
    } else {
        lunarPhase = floatFormat(lunarPos - Math.floor(lunarPos), 3);
        document.getElementById("lunarPhase").value = lunarPhase;
    }
}

function onDateChange () {
    datestr = document.getElementById("datepicker").value + " " + document.getElementById("timepicker").value;

    date = new Date(datestr);
    lunarPhaseBase = new Date(data.lunarPhaseBase);

    //lunarPos = (date - lunarPhaseBase)/(data.lunarRevPeriod*86400000) - (date - lunarPhaseBase)/(data.earthRevPeriod*86400000);
    T = date;
    T0 = lunarPhaseBase;
    Lp = data.lunarRevPeriod*86400000;
    Ep = data.earthRevPeriod*86400000;
    try {
        lunarPos = eval(data.formula);
    } catch(ex) {
        lunarPos = "error";
    }

    if ( isNaN(lunarPos) ) {
        document.getElementById("lunarPhase").value = "Error";
    } else {
        lunarPhase = floatFormat(lunarPos - Math.floor(lunarPos), 3);
        document.getElementById("lunarPhase").value = lunarPhase;
    }
/*
    earthPhaseBase = new Date(data.earthPhaseBase);
    earthPos = (date - earthPhaseBase)/(data.earthRevPeriod*86400000);
    earthPhase = floatFormat(earthPos - Math.floor(earthPos), 3);
    document.getElementById("earthPhase").value = earthPhase;
*/
    document.getElementById("earthRevPeriod").value = data.earthRevPeriod;
    document.getElementById("lunarRevPeriod").value = data.lunarRevPeriod;
    document.getElementById("lunarPhaseBase").value = data.lunarPhaseBase;
    document.getElementById("formula").value = data.formula;
}

function editSettings() {
    if ( document.getElementById("settings").style.display === "none" ) {
        document.getElementById("settings").style.display = "block";
    } else {
        document.getElementById("settings").style.display = "none";
    }
}

$(function() {
    //$.datepicker.setDefaults( $.datepicker.regional[ "ja" ] );
    $( "#datepicker" ).datepicker({
        dateFormat: "yy/mm/dd",
        changeMonth: true,
        changeYear: true
    });
});
  
$(function() {
  $('#timepicker').timepicker({ 'timeFormat': 'H:i:s' });
});

$(".datainput").change(function() {
    onDataChange();
});
