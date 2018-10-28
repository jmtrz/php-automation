<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Php & Raspberry Pi</title>
  <!--BootStrap-Toggle-->
  <link href="../styles/toggle-button/style/bootstrap-toggle.css" rel="stylesheet">
  <link href="../styles/toggle-button/doc/stylesheet.css" rel="stylesheet">
  <!-- <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script> -->
  <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/8.3/styles/github.min.css" rel="stylesheet" > -->
  <!-- <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet"> -->
  <!-- <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet"> -->
  <!-- Bootstrap core CSS-->
  <link href="../styles/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="../styles/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  <link href="../styles/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="../styles/css/sb-admin.css" rel="stylesheet">
  <!--fontawesome-->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

  <!--CSS Styles-->
  <link rel="stylesheet" href="./style-test.css">
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top" >
    <?php 
            include('../app/GPIO/light.php');
            include('../app/common/status-modal.php');
            require_once('../routes.php');

            spl_autoload_register(function($class_name){
            
                 if (file_exists('../app/controller/'.$class_name.'php')){
                    require_once(__DIR__.'../app/controller/'.$class_name.'php');
                }

            });
 
    ?>
    
    <!-- Bootstrap core JavaScript-->
    <script src="../styles/vendor/jquery/jquery.min.js"></script>
    <script src="../styles/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="../styles/vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Page level plugin JavaScript-->
    <script src="../styles/vendor/chart.js/Chart.min.js"></script>
    <script src="../styles/vendor/datatables/jquery.dataTables.js"></script>
    <script src="../styles/vendor/datatables/dataTables.bootstrap4.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="../styles/js/sb-admin.min.js"></script>
    <!-- Custom scripts for this page-->
    <script src="../styles/js/sb-admin-datatables.min.js"></script>
    <script src="../styles/js/sb-admin-charts.min.js"></script>
    <!--p5.js Library-->
    <!-- <script src="../p5.min.js"></script>
    <script src="../addons/p5.dom.min.js"></script>
    <script src="../addons/p5.sound.min.js"></script>
    <script src="../addons/timer.js"></script> -->
    <!--momnet.js-->
    <script src="../../../node_modules/moment/min/moment.min.js"></script>
    <script src="../../node_modules/moment/moment.js"></script>
    <!--bootStrap Toggle-->
    <script src="../stylee/toggle-button/doc/script.js"></script>
    <script src="../styles/toggle-button/js/bootstrap-toggle.js"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/8.3/highlight.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script> -->

    <!--Timer Script-->
    <!-- <script src="../javascript/timer.js"></script> -->
    <script type="text/javascript">
            
            var timer;
            var timer1;
            var controller;
            // $(document).ready(function(){
            //     timer = new _timer(function (time) {
            //         if (time == 0) {
            //             timer.stop();
                    
            //             $('#AlertModal').modal('show');
                        
            //             // alert('Code Expired');
            //             location.reload();
            //         }
            //     });
            //     timer.reset(10);
            //     timer.mode(0);
            //     // timer.start(1000);
            // });
            
            $("#controller").change(function(){
                
               

                var obj = new Object();
                if($('#controller').prop('checked')){
                            obj = "on-controller1";
                           
                            // alert('On');
                }
                else{
                            obj = "off-controller1";
                           
                            // alert('On');
                }

                        $.ajax({
                            type: "GET",
                            url: '../app/GPIO/light.php',
                            data: obj,
                            success: function (newdata) {
                                // alert('FUCK YEAH');
                            },
                            error: function (request, textStatus, errorThrown) {
                                bootbox.alert("AJAX error: " + request.statusText);
                            }
                        });
    
                
                if($(this).prop('checked') == false)
                {
                    timer = new _timer(function (time) {
                        if (time == 0) {
                            timer.stop();
                        
                            // if($('#AlertModal').modal('show')){
                            //     $('#AlertModal').modal('hide');
                            //     $('#AlertModal').modal('show');
                            // }else{
                            //     $('#AlertModal').modal('show');
                            // }
                            $('#AlertModal').modal('show');
                            
                            // alert('Controller1');
                            // location.reload();
                        }
                    });
                  //day = 86400(s)
                  //7 days = 604800
                    timer.reset(5);
                    timer.mode(0);
                    timer.start(1000);
                }else{
                    timer.stop();
                }
                
            });

            $("#controller1").change(function(){
                if($(this).prop('checked') == false)
                {
                    timer1 = new _timer1(function (time) {
                       
                        if (time == 0) {
                            timer1.stop();
                        
                            $('#AlertModal').modal('show');
                            
                            // alert('Controller2');
                            // location.reload();
                        }
                    });
                    timer1.reset(5);
                    timer1.mode(0);
                    timer1.start(1000);
                }else{
                    timer.stop();
                }
            });

            $("#controller2").change(function(){
                if($(this).prop('checked') == false)
                {
                    timer2 = new _timer2(function (time) {
                       
                        if (time == 0) {
                            timer2.stop();
                        
                            $('#AlertModal').modal('show');
                            
                            // alert('Code Expired');
                            // location.reload();
                        }
                    });
                    timer2.reset(86400);
                    timer2.mode(0);
                    timer2.start(1000);
                }else{
                    timer.stop();
                }
            });

            $("#controller3").change(function(){
                if($(this).prop('checked') == false)
                {
                    timer3 = new _timer3(function (time) {
                       
                        if (time == 0) {
                            timer3.stop();
                        
                            $('#AlertModal').modal('show');
                            
                            // alert('Code Expired');
                            // location.reload();
                        }
                    });
                    timer3.reset(86400);
                    timer3.mode(0);
                    timer3.start(1000);
                }else{
                    timer.stop();
                }
            });

            $("#controller4").change(function(){
                if($(this).prop('checked') == false)
                {
                    timer4 = new _timer4(function (time) {
                       
                        if (time == 0) {
                            timer4.stop();
                        
                            $('#AlertModal').modal('show');
                            
                            // alert('Code Expired');
                            // location.reload();
                        }
                    });
                    timer4.reset(86400);
                    timer4.mode(0);
                    timer4.start(1000);
                }else{
                    timer4.stop();
                }
            });

            $("#controller5").change(function(){
                if($(this).prop('checked') == false)
                {
                    timer5 = new _timer5(function (time) {
                       
                        if (time == 0) {
                            timer5.stop();
                        
                            $('#AlertModal').modal('show');
                            
                            // alert('Code Expired');
                            // location.reload();
                        }
                    });
                    timer5.reset(86400);
                    timer5.mode(0);
                    timer5.start(1000);
                }else{
                    timer5.stop();
                }
            });

            $("#controller6").change(function(){
                if($(this).prop('checked') == false)
                {
                    timer6 = new _timer6(function (time) {
                       
                        if (time == 0) {
                            timer5.stop();
                        
                            $('#AlertModal').modal('show');
                            
                            // alert('Code Expired');
                            // location.reload();
                        }
                    });
                    timer6.reset(86400);
                    timer6.mode(0);
                    timer6.start(1000);
                }else{
                    timer6.stop();
                }
            });

            function _timer(callback) {
                    var time = 0;     //  The default time of the timer
                    var mode = 1;     //    Mode: count up or count down
                    var status = 0;    //    Status: timer is running or stoped
                    var timer_id;    //    This is used by setInterval function

                    // this will start the timer ex. start the timer with 1 second interval timer.start(1000) 
                    this.start = function (interval) {
                        interval = (typeof (interval) !== 'undefined') ? interval : 1000;

                        if (status == 0) {
                            status = 1;
                            timer_id = setInterval(function () {
                                switch (mode) {
                                    default:
                                        if (time) {
                                            time--;
                                             generateTime();
                                 
                                            if (typeof (callback) === 'function') callback(time);
                                        }
                                        break;

                                    case 1:
                                        if (time < 86400) {
                                            time++;
                                            generateTime();

                                            if (typeof (callback) === 'function') callback(time);
                                        }
                                        break;
                                }
                            }, interval);
                        }
                    }

                    //  Same as the name, this will stop or pause the timer ex. timer.stop()
                    this.stop = function () {
                        if (status == 1) {
                            status = 0;
                            clearInterval(timer_id);
                        }
                    }

                    // Reset the timer to zero or reset it to your own custom time ex. reset to zero second timer.reset(0)
                    this.reset = function (sec) {
                        sec = (typeof (sec) !== 'undefined') ? sec : 0;
                        time = sec;
                        generateTime(time);
                        // generateTime2(time);
                        // generateTime3(time);
                        // generateTime4(time);
                        // generateTime5(time);
                        // generateTime6(time);
                        // generateTime7(time);
                    }

                    // Change the mode of the timer, count-up (1) or countdown (0)
                    this.mode = function (tmode) {
                        mode = tmode;
                    }

                    // This methode return the current value of the timer
                    this.getTime = function () {
                        return time;
                    }

                    // This methode return the current mode of the timer count-up (1) or countdown (0)
                    this.getMode = function () {
                        return mode;
                    }

                    // This methode return the status of the timer running (1) or stoped (1)
                    this.getStatus
                    {
                        return status;
                    }

                    // This methode will render the time variable to hour:minute:second format
                    function generateTime() {


                        var second = time % 60;
                        var minute = Math.floor(time / 60) % 60;
                        var hour = Math.floor(time / 3600) % 60;
                        var days = Math.floor(time/86400) ;

                        second = (second < 10) ? '0' + second : second;
                        minute = (minute < 10) ? '0' + minute : minute;
                        hour = (hour < 10) ? '0' + hour : hour;
                        days = (days < 10) ? '0' + days : days;

                        //$('div.timer span.second').html(second);
                        //$('div.timer span.minute').html(minute);
                        //$('div.timer span.hour').html(hour);

                        $('#timer').html('<span><strong> Remaining Days :  </strong >' +days+'day(s):'+hour+'hr(s)</span >');
                    
                       
                    }
                    
            }

            function _timer1(callback) {
                    var time = 0;     //  The default time of the timer
                    var mode = 1;     //    Mode: count up or count down
                    var status = 0;    //    Status: timer is running or stoped
                    var timer_id;    //    This is used by setInterval function

                    // this will start the timer ex. start the timer with 1 second interval timer.start(1000) 
                    this.start = function (interval) {
                        interval = (typeof (interval) !== 'undefined') ? interval : 1000;

                        if (status == 0) {
                            status = 1;
                            timer_id = setInterval(function () {
                                switch (mode) {
                                    default:
                                        if (time) {
                                            time--;
                                            generateTime2();
                                            
                                            if (typeof (callback) === 'function') callback(time);
                                        }
                                        break;

                                    case 1:
                                        if (time < 86400) {
                                            time++;
                                            generateTime2();

                                            if (typeof (callback) === 'function') callback(time);
                                        }
                                        break;
                                }
                            }, interval);
                        }
                    }

                    //  Same as the name, this will stop or pause the timer ex. timer.stop()
                    this.stop = function () {
                        if (status == 1) {
                            status = 0;
                            clearInterval(timer_id);
                        }
                    }

                    // Reset the timer to zero or reset it to your own custom time ex. reset to zero second timer.reset(0)
                    this.reset = function (sec) {
                        sec = (typeof (sec) !== 'undefined') ? sec : 0;
                        time = sec;
                        generateTime2(time);
                    }

                    // Change the mode of the timer, count-up (1) or countdown (0)
                    this.mode = function (tmode) {
                        mode = tmode;
                    }

                    // This methode return the current value of the timer
                    this.getTime = function () {
                        return time;
                    }

                    // This methode return the current mode of the timer count-up (1) or countdown (0)
                    this.getMode = function () {
                        return mode;
                    }

                    // This methode return the status of the timer running (1) or stoped (1)
                    this.getStatus
                    {
                        return status;
                    }

                    // This methode will render the time variable to hour:minute:second format
                    function generateTime2() {
                        var second = time % 60;
                        var minute = Math.floor(time / 60) % 60;
                        var hour = Math.floor(time / 3600) % 60;
                        var days = Math.floor(time/86400) ;

                        second = (second < 10) ? '0' + second : second;
                        minute = (minute < 10) ? '0' + minute : minute;
                        hour = (hour < 10) ? '0' + hour : hour;
                        days = (days < 10) ? '0' + days : days;

                        //$('div.timer span.second').html(second);
                        //$('div.timer span.minute').html(minute);
                        //$('div.timer span.hour').html(hour);
                        
                        $('#timer1').html('<span><strong> Remaining Days : </strong >' +days+'day(s):'+hour+'hr(s)</span >');
                    }
            }

            function _timer2(callback) {
                    var time = 0;     //  The default time of the timer
                    var mode = 1;     //    Mode: count up or count down
                    var status = 0;    //    Status: timer is running or stoped
                    var timer_id;    //    This is used by setInterval function

                    // this will start the timer ex. start the timer with 1 second interval timer.start(1000) 
                    this.start = function (interval) {
                        interval = (typeof (interval) !== 'undefined') ? interval : 1000;

                        if (status == 0) {
                            status = 1;
                            timer_id = setInterval(function () {
                                switch (mode) {
                                    default:
                                        if (time) {
                                            time--;
                                            generateTime3();
                                            
                                            if (typeof (callback) === 'function') callback(time);
                                        }
                                        break;

                                    case 1:
                                        if (time < 86400) {
                                            time++;
                                            generateTime3();

                                            if (typeof (callback) === 'function') callback(time);
                                        }
                                        break;
                                }
                            }, interval);
                        }
                    }

                    //  Same as the name, this will stop or pause the timer ex. timer.stop()
                    this.stop = function () {
                        if (status == 1) {
                            status = 0;
                            clearInterval(timer_id);
                        }
                    }

                    // Reset the timer to zero or reset it to your own custom time ex. reset to zero second timer.reset(0)
                    this.reset = function (sec) {
                        sec = (typeof (sec) !== 'undefined') ? sec : 0;
                        time = sec;
                        generateTime3(time);
                    }

                    // Change the mode of the timer, count-up (1) or countdown (0)
                    this.mode = function (tmode) {
                        mode = tmode;
                    }

                    // This methode return the current value of the timer
                    this.getTime = function () {
                        return time;
                    }

                    // This methode return the current mode of the timer count-up (1) or countdown (0)
                    this.getMode = function () {
                        return mode;
                    }

                    // This methode return the status of the timer running (1) or stoped (1)
                    this.getStatus
                    {
                        return status;
                    }

                    // This methode will render the time variable to hour:minute:second format
                    function generateTime3() {
                        var second = time % 60;
                        var minute = Math.floor(time / 60) % 60;
                        var hour = Math.floor(time / 3600) % 60;
                        var days = Math.floor(time/86400) ;

                        second = (second < 10) ? '0' + second : second;
                        minute = (minute < 10) ? '0' + minute : minute;
                        hour = (hour < 10) ? '0' + hour : hour;
                        days = (days < 10) ? '0' + days : days;

                        //$('div.timer span.second').html(second);
                        //$('div.timer span.minute').html(minute);
                        //$('div.timer span.hour').html(hour);
                        
                        $('#timer2').html('<span><strong> Remaining Days :   </strong >' +days+'day(s):'+hour+'hr(s)</span >');
                    }
            }

            function _timer3(callback) {
                    var time = 0;     //  The default time of the timer
                    var mode = 1;     //    Mode: count up or count down
                    var status = 0;    //    Status: timer is running or stoped
                    var timer_id;    //    This is used by setInterval function

                    // this will start the timer ex. start the timer with 1 second interval timer.start(1000) 
                    this.start = function (interval) {
                        interval = (typeof (interval) !== 'undefined') ? interval : 1000;

                        if (status == 0) {
                            status = 1;
                            timer_id = setInterval(function () {
                                switch (mode) {
                                    default:
                                        if (time) {
                                            time--;
                                            generateTime4();
                                            
                                            if (typeof (callback) === 'function') callback(time);
                                        }
                                        break;

                                    case 1:
                                        if (time < 86400) {
                                            time++;
                                            generateTime4();

                                            if (typeof (callback) === 'function') callback(time);
                                        }
                                        break;
                                }
                            }, interval);
                        }
                    }

                    //  Same as the name, this will stop or pause the timer ex. timer.stop()
                    this.stop = function () {
                        if (status == 1) {
                            status = 0;
                            clearInterval(timer_id);
                        }
                    }

                    // Reset the timer to zero or reset it to your own custom time ex. reset to zero second timer.reset(0)
                    this.reset = function (sec) {
                        sec = (typeof (sec) !== 'undefined') ? sec : 0;
                        time = sec;
                        generateTime4(time);
                    }

                    // Change the mode of the timer, count-up (1) or countdown (0)
                    this.mode = function (tmode) {
                        mode = tmode;
                    }

                    // This methode return the current value of the timer
                    this.getTime = function () {
                        return time;
                    }

                    // This methode return the current mode of the timer count-up (1) or countdown (0)
                    this.getMode = function () {
                        return mode;
                    }

                    // This methode return the status of the timer running (1) or stoped (1)
                    this.getStatus
                    {
                        return status;
                    }

                    // This methode will render the time variable to hour:minute:second format
                    function generateTime4() {
                        var second = time % 60;
                        var minute = Math.floor(time / 60) % 60;
                        var hour = Math.floor(time / 3600) % 60;
                        var days = Math.floor(time/86400) ;

                        second = (second < 10) ? '0' + second : second;
                        minute = (minute < 10) ? '0' + minute : minute;
                        hour = (hour < 10) ? '0' + hour : hour;
                        days = (days < 10) ? '0' + days : days;

                        //$('div.timer span.second').html(second);
                        //$('div.timer span.minute').html(minute);
                        //$('div.timer span.hour').html(hour);
                        
                        $('#timer3').html('<span><strong> Remaining Days :  </strong >' +days+'day(s):'+hour+'hr(s)</span >');
                    }
            }

            function _timer4(callback) {
                    var time = 0;     //  The default time of the timer
                    var mode = 1;     //    Mode: count up or count down
                    var status = 0;    //    Status: timer is running or stoped
                    var timer_id;    //    This is used by setInterval function

                    // this will start the timer ex. start the timer with 1 second interval timer.start(1000) 
                    this.start = function (interval) {
                        interval = (typeof (interval) !== 'undefined') ? interval : 1000;

                        if (status == 0) {
                            status = 1;
                            timer_id = setInterval(function () {
                                switch (mode) {
                                    default:
                                        if (time) {
                                            time--;
                                            generateTime5();
                                            
                                            if (typeof (callback) === 'function') callback(time);
                                        }
                                        break;

                                    case 1:
                                        if (time < 86400) {
                                            time++;
                                            generateTime5();

                                            if (typeof (callback) === 'function') callback(time);
                                        }
                                        break;
                                }
                            }, interval);
                        }
                    }

                    //  Same as the name, this will stop or pause the timer ex. timer.stop()
                    this.stop = function () {
                        if (status == 1) {
                            status = 0;
                            clearInterval(timer_id);
                        }
                    }

                    // Reset the timer to zero or reset it to your own custom time ex. reset to zero second timer.reset(0)
                    this.reset = function (sec) {
                        sec = (typeof (sec) !== 'undefined') ? sec : 0;
                        time = sec;
                        generateTime5(time);
                    }

                    // Change the mode of the timer, count-up (1) or countdown (0)
                    this.mode = function (tmode) {
                        mode = tmode;
                    }

                    // This methode return the current value of the timer
                    this.getTime = function () {
                        return time;
                    }

                    // This methode return the current mode of the timer count-up (1) or countdown (0)
                    this.getMode = function () {
                        return mode;
                    }

                    // This methode return the status of the timer running (1) or stoped (1)
                    this.getStatus
                    {
                        return status;
                    }

                    // This methode will render the time variable to hour:minute:second format
                    function generateTime5() {
                        var second = time % 60;
                        var minute = Math.floor(time / 60) % 60;
                        var hour = Math.floor(time / 3600) % 60;
                        var days = Math.floor(time/86400) ;

                        second = (second < 10) ? '0' + second : second;
                        minute = (minute < 10) ? '0' + minute : minute;
                        hour = (hour < 10) ? '0' + hour : hour;
                        days = (days < 10) ? '0' + days : days;

                        //$('div.timer span.second').html(second);
                        //$('div.timer span.minute').html(minute);
                        //$('div.timer span.hour').html(hour);
                        
                        $('#timer4').html('<span><strong> Remaining Days :   </strong >' +days+'day(s):'+hour+'hr(s)</span >');
                    }
            }

            function _timer5(callback) {
                    var time = 0;     //  The default time of the timer
                    var mode = 1;     //    Mode: count up or count down
                    var status = 0;    //    Status: timer is running or stoped
                    var timer_id;    //    This is used by setInterval function

                    // this will start the timer ex. start the timer with 1 second interval timer.start(1000) 
                    this.start = function (interval) {
                        interval = (typeof (interval) !== 'undefined') ? interval : 1000;

                        if (status == 0) {
                            status = 1;
                            timer_id = setInterval(function () {
                                switch (mode) {
                                    default:
                                        if (time) {
                                            time--;
                                            generateTime6();
                                            
                                            if (typeof (callback) === 'function') callback(time);
                                        }
                                        break;

                                    case 1:
                                        if (time < 86400) {
                                            time++;
                                            generateTime6();

                                            if (typeof (callback) === 'function') callback(time);
                                        }
                                        break;
                                }
                            }, interval);
                        }
                    }

                    //  Same as the name, this will stop or pause the timer ex. timer.stop()
                    this.stop = function () {
                        if (status == 1) {
                            status = 0;
                            clearInterval(timer_id);
                        }
                    }

                    // Reset the timer to zero or reset it to your own custom time ex. reset to zero second timer.reset(0)
                    this.reset = function (sec) {
                        sec = (typeof (sec) !== 'undefined') ? sec : 0;
                        time = sec;
                        generateTime6(time);
                    }

                    // Change the mode of the timer, count-up (1) or countdown (0)
                    this.mode = function (tmode) {
                        mode = tmode;
                    }

                    // This methode return the current value of the timer
                    this.getTime = function () {
                        return time;
                    }

                    // This methode return the current mode of the timer count-up (1) or countdown (0)
                    this.getMode = function () {
                        return mode;
                    }

                    // This methode return the status of the timer running (1) or stoped (1)
                    this.getStatus
                    {
                        return status;
                    }

                    // This methode will render the time variable to hour:minute:second format
                    function generateTime6() {
                        var second = time % 60;
                        var minute = Math.floor(time / 60) % 60;
                        var hour = Math.floor(time / 3600) % 60;
                        var days = Math.floor(time/86400) ;

                        second = (second < 10) ? '0' + second : second;
                        minute = (minute < 10) ? '0' + minute : minute;
                        hour = (hour < 10) ? '0' + hour : hour;
                        days = (days < 10) ? '0' + days : days;

                        //$('div.timer span.second').html(second);
                        //$('div.timer span.minute').html(minute);
                        //$('div.timer span.hour').html(hour);
                        
                        $('#timer5').html('<span><strong> Remaining Days :   </strong >' +days+'day(s):'+hour+'hr(s)</span >');
                    }
            }

            function _timer6(callback) {
                    var time = 0;     //  The default time of the timer
                    var mode = 1;     //    Mode: count up or count down
                    var status = 0;    //    Status: timer is running or stoped
                    var timer_id;    //    This is used by setInterval function

                    // this will start the timer ex. start the timer with 1 second interval timer.start(1000) 
                    this.start = function (interval) {
                        interval = (typeof (interval) !== 'undefined') ? interval : 1000;

                        if (status == 0) {
                            status = 1;
                            timer_id = setInterval(function () {
                                switch (mode) {
                                    default:
                                        if (time) {
                                            time--;
                                            generateTime7();
                                            
                                            if (typeof (callback) === 'function') callback(time);
                                        }
                                        break;

                                    case 1:
                                        if (time < 86400) {
                                            time++;
                                            generateTime7();

                                            if (typeof (callback) === 'function') callback(time);
                                        }
                                        break;
                                }
                            }, interval);
                        }
                    }

                    //  Same as the name, this will stop or pause the timer ex. timer.stop()
                    this.stop = function () {
                        if (status == 1) {
                            status = 0;
                            clearInterval(timer_id);
                        }
                    }

                    // Reset the timer to zero or reset it to your own custom time ex. reset to zero second timer.reset(0)
                    this.reset = function (sec) {
                        sec = (typeof (sec) !== 'undefined') ? sec : 0;
                        time = sec;
                        generateTime7(time);
                    }

                    // Change the mode of the timer, count-up (1) or countdown (0)
                    this.mode = function (tmode) {
                        mode = tmode;
                    }

                    // This methode return the current value of the timer
                    this.getTime = function () {
                        return time;
                    }

                    // This methode return the current mode of the timer count-up (1) or countdown (0)
                    this.getMode = function () {
                        return mode;
                    }

                    // This methode return the status of the timer running (1) or stoped (1)
                    this.getStatus
                    {
                        return status;
                    }

                    // This methode will render the time variable to hour:minute:second format
                    function generateTime7() {
                        var second = time % 60;
                        var minute = Math.floor(time / 60) % 60;
                        var hour = Math.floor(time / 3600) % 60;
                        var days = Math.floor(time/86400) ;

                        second = (second < 10) ? '0' + second : second;
                        minute = (minute < 10) ? '0' + minute : minute;
                        hour = (hour < 10) ? '0' + hour : hour;
                        days = (days < 10) ? '0' + days : days;

                        //$('div.timer span.second').html(second);
                        //$('div.timer span.minute').html(minute);
                        //$('div.timer span.hour').html(hour);
                        
                        $('#timer6').html('<span><strong> Remaining Days :  </strong >' +days+'day(s):'+hour+'hr(s)</span >');
                    }
            }
                  

   
   </script>

  
                                           
  </div>
</body>

</html>

