<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Wine360</title>

    <link rel="shortcut icon" href="<?php echo e(asset('favicon.png')); ?>">

    <!-- Fonts -->
    
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/style.css')); ?>">

    <!-- jPList core -->        
    <link href="<?php echo e(asset('css/jplist.core.min.css')); ?>" rel="stylesheet" type="text/css" />
    <!-- Pagination Bundle -->          
    <link href="<?php echo e(asset('css/jplist.pagination-bundle.min.css')); ?>" rel="stylesheet" type="text/css" />
    
    <!-- Select2 -->
    <link rel="stylesheet" href="<?php echo e(asset('css/scripts/select2.min.css')); ?>" >
    <link rel="stylesheet" href="<?php echo e(asset('css/scripts/select2-bootstrap.min.css')); ?>">

    <!-- Data tabels treba zamjeniti da se ne povlaci s interneta nego da bude instalirano unutar projekta-->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css">

    <script src="https://kit.fontawesome.com/e5d59bd96d.js" crossorigin="anonymous"></script>

    <!-- JavaScripts -->
    <script src="<?php echo e(asset('js/scripts/jquery.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(url('js/cropit_src/jquery.cropit.js')); ?>" ></script>
    <script src="<?php echo e(asset('js/scripts/bootstrap.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(url('js/Wine360.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(url('js/jeditable.js')); ?>"></script>

    <script src="<?php echo e(asset('js/jplist.core.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/jplist.pagination-bundle.min.js')); ?>"></script>


    <script src="<?php echo e(asset('js/scripts/select2.full.min.js')); ?>"></script>

    <script src="<?php echo e(asset('js/scripts/jquery-ui.min.js')); ?>"></script>

    <script type="text/javascript" src="<?php echo e(url('js/datetimepicker.js')); ?>" ></script>
<!-- Data tabels treba zamjeniti da se ne povlaci s interneta nego da bude instalirano unutar projekta-->
    <script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>

    <link rel="stylesheet" href="<?php echo e(asset('css/scripts/jquery-ui-timepicker-addon.css')); ?>" />
    
    <link rel="stylesheet" href="<?php echo e(asset('css/scripts/jquery-ui.css')); ?>" />

    <script type="text/javascript">
        $.fn.select2.defaults.set('theme', 'bootstrap');

        $(function(){
            
            $(".date-input").datepicker({
                dateFormat: "dd.mm.yy.",
                autoclose: true,
                orientation: 'auto'
            });
            $(".datetime-input").datetimepicker({
                timeFormat: 'HH:mm',
            });


            jQuery.fn.jplist.settings = {
                /**
                * jQuery UI date picker
                */
                datepicker: function(input, options){

                    //set options
                    options.localization = 'de';
                    options.dateFormat = 'dd.mm.yy.';
                    options.changeMonth = true;
                    options.changeYear = true;

                    //start datepicker
                    input.datepicker(options);
                }
            };

        });


var lang = "<?php echo e(data_get(Auth::user(), 'appLanguage', 'en')); ?>";
/** Language Datepicker DE **/
if(lang == 'en'){
    ( function( factory ) {
        if ( typeof define === "function" && define.amd ) {

            // AMD. Register as an anonymous module.
            define( [ "../widgets/datepicker" ], factory );
        } else {

            // Browser globals
            factory( jQuery.datepicker );
        }
    }( function( datepicker ) {
        datepicker.regional.en = {    
        dateFormat:"dd.mm.yy.",
    };
    datepicker.setDefaults( datepicker.regional.en );

    return datepicker.regional.en;

    } ) );

}else if(lang == 'de'){
    ( function( factory ) {
        if ( typeof define === "function" && define.amd ) {

            // AMD. Register as an anonymous module.
            define( [ "../widgets/datepicker" ], factory );
        } else {

            // Browser globals
            factory( jQuery.datepicker );
        }
    }( function( datepicker ) {

    datepicker.regional.de = {
        closeText:"Schließen",
        prevText:"&#x3C;Zurück",
        nextText:"Vor&#x3E;",
        currentText:"Heute",
        monthNames:["Januar","Februar","März","April","Mai","Juni","Juli","August","September","Oktober","November","Dezember"],
        monthNamesShort:["Jan","Feb","Mär","Apr","Mai","Jun","Jul","Aug","Sep","Okt","Nov","Dez"],
        dayNames:["Sonntag","Montag","Dienstag","Mittwoch","Donnerstag","Freitag","Samstag"],
        dayNamesShort:["So","Mo","Di","Mi","Do","Fr","Sa"],
        dayNamesMin:["So","Mo","Di","Mi","Do","Fr","Sa"],
        weekHeader:"KW",
        dateFormat:"dd.mm.yy.",
        firstDay:1,
        isRTL:!1,
        showMonthAfterYear:!1,
        yearSuffix:"" };
    datepicker.setDefaults( datepicker.regional.de );

    return datepicker.regional.de;

    } ) );


    !function(a){
        a.timepicker.regional.de={timeOnlyTitle:"Zeit wÃ¤hlen",timeText:"Zeit",hourText:"Stunde",minuteText:"Minute",secondText:"Sekunde",millisecText:"Millisekunde",microsecText:"Mikrosekunde",timezoneText:"Zeitzone",currentText:"Jetzt",closeText:"Fertig",timeFormat:"HH:mm",timeSuffix:"",amNames:["vorm.","AM","A"],pmNames:["nachm.","PM","P"],isRTL:!1}

        a.timepicker.setDefaults( a.timepicker.regional.de );

        return a.timepicker.regional.de;

    }(jQuery);
}
/** Language Datepicker HR **/
else if(lang == 'hr'){
    ( function( factory ) {
        if ( typeof define === "function" && define.amd ) {

            // AMD. Register as an anonymous module.
            define( [ "../widgets/datepicker" ], factory );
        } else {

            // Browser globals
            factory( jQuery.datepicker );
        }
    }( function( datepicker ) {

    datepicker.regional.hr = {
        closeText:"Zatvori",
        prevText:"&#x3C;",
        nextText:"&#x3E;",
        currentText:"Danas",
        monthNames:["Siječanj","Veljača","Ožujak","Travanj","Svibanj","Lipanj","Srpanj","Kolovoz","Rujan","Listopad","Studeni","Prosinac"],
        monthNamesShort:["Sij","Velj","Ožu","Tra","Svi","Lip","Srp","Kol","Ruj","Lis","Stu","Pro"],
        dayNames:["Nedjelja","Ponedjeljak","Utorak","Srijeda","Četvrtak","Petak","Subota"],
        dayNamesShort:["Ned","Pon","Uto","Sri","Čet","Pet","Sub"],
        dayNamesMin:["Ne","Po","Ut","Sr","Če","Pe","Su"],
        weekHeader:"Tje",
        dateFormat:"dd.mm.yy.",
        firstDay:1,
        isRTL:!1,
        showMonthAfterYear:!1,
        yearSuffix:"" };




    datepicker.setDefaults( datepicker.regional.hr );

    return datepicker.regional.hr;

    } ) );


    !function(a){
        a.timepicker.regional.hr={timeOnlyTitle:"Odaberi vrijeme",timeText:"Vrijeme",hourText:"Sati",minuteText:"Minute",secondText:"Sekunde",millisecText:"Milisekunde",microsecText:"Mikrosekunde",timezoneText:"Vremenska zona",currentText:"Sada",closeText:"Gotovo",timeFormat:"HH:mm",timeSuffix:"",amNames:["a.m.","AM","A"],pmNames:["p.m.","PM","P"],isRTL:!1}

        a.timepicker.setDefaults( a.timepicker.regional.hr );

        return a.timepicker.regional.hr;
    }(jQuery);

}

        $( function() {
            $( ".date-input" ).datepicker( $.datepicker.regional[ lang ] );
        } );
    </script>

</head>
<body id="app-layout" class="<?php echo $__env->yieldContent('body_class'); ?>">


    <?php echo $__env->yieldContent('content'); ?>

    


    <script type="text/javascript">

        if($(window).width() < 1200){
            $('#dashboard-content .sidebar').addClass('hidden-side');
            $('#dashboard-content .content').addClass('full');
            $('#dashboard-content .sidebar ul li span').hide();
            $('#smanji').addClass('d-none');
            $('#dashboard-content .sidebar img').addClass('hidden-img');
            $("#burger-container").removeClass('open');
            $('#povecaj').removeClass('d-none');
        }

        $("#burger-container").on('click', function(){
            $(this).toggleClass("open");
            if($('#dashboard-content .sidebar').hasClass('hidden-side')){
                $('#dashboard-content .sidebar').removeClass('hidden-side');
                $('#dashboard-content .content').removeClass('full');
                $('#dashboard-content .sidebar ul span').show();
                $('#dashboard-content .sidebar img').removeClass('hidden-img');
                $('#povecaj').addClass('d-none');
                $('#smanji').removeClass('d-none');
            }else{
                $('#dashboard-content .sidebar').addClass('hidden-side');
                $('#dashboard-content .content').addClass('full');
                $('#dashboard-content .sidebar ul li span').hide();
                $('#dashboard-content .sidebar img').addClass('hidden-img');
                $('#smanji').addClass('d-none');
                $('#povecaj').removeClass('d-none');
            }
        });
        
        // Header title
        jQuery('#edit-application-name span#editAppName').editable(function(value, settings) {
                return(value);
            }, {
            // submit    : 'OK',
            cssclass : 'appName',
            select : true,
            onblur   : 'submit',
            callback: function(value, settings) {
                
                var CSRF_TOKEN = jQuery('#edit-application-name input[name="_token"]').val();

                jQuery.ajax({
                    type: "POST",
                    url: '<?php echo e(url("configuration")); ?>/'+jQuery('#u').val()+'/name', 
                    data: {
                        name: value,
                        _token: CSRF_TOKEN
                    },
                    success: function(data) {
                    }
                });

                
            }
        });


        jQuery('#headline-image').change(function(){
            jQuery('#edit-application-image').submit();
        });
        
        jQuery('#headline-user-image').change(function(){
            jQuery('#edit-user-image').submit();
        });
        
        jQuery('#remove-user-image').click(function(){
            jQuery('#remove-user-image-form').submit();
        });
        
        jQuery('#remove-config-image').click(function(){
            jQuery('#remove-application-image').submit();
        });


        var link = window.location.href;

        // Function to handle highlighting and toggling of sub-tabs
        function handleSubTabs(subTabId, tabId) {
            // Remove 'hover' class from all tabs
            $('#dashboard-content .sidebar ul li').removeClass('hover');

            // Add 'hover' class to the clicked tab
            $(tabId).addClass('hover');

            // Toggle visibility of the sub-tab content
            $(subTabId).stop().slideToggle();
        }
        // Check the URL and highlight the corresponding tab
        if (link.match('users')) {
            handleSubTabs('#subTabsUsers', '#usersTab');
        }else if (link.match('vehiclesAdd')) {
            handleSubTabs('#subTabsVehicles', '#vehicleAllocationTab');
        }else if (link.match('vehicles')) {
            handleSubTabs('#subTabsVehicles', '#vehiclesListTab');
        }else if(link.match('costs')){
            handleSubTabs('#subTabsVehicles', '#dashboard-content .sidebar ul li:nth-child(3)');
        }else if(link.match('kilometers')){
            handleSubTabs('#subTabsVehicles', '#kilometerHistoryTab');
        }else if (link.match('malfunction')) {
            handleSubTabs('#subTabsIncidents', '#malfunctionTab');
        }else if (link.match('damage')) {
            handleSubTabs('#subTabsIncidents', '#damageTab');
        } else if (link.match('maintenance')) {
            handleSubTabs(null, '#maintenanceTab');
        } else if (link.match('reminders')) {
            handleSubTabs(null, '#remindersTab');
        } else if (link.match('fuel')) {
            handleSubTabs(null, '#fuelTab');
        } else if (link.match('reports')) {
            handleSubTabs(null, '#reportsTab');
        } else if (link.match('workOrder')) {
            handleSubTabs(null, '#workOrderTab');
        } else if (link.match('configuration')) {
            handleSubTabs(null, '#dashboard-content .sidebar ul li:nth-child(10)');
        } else if (link.match('cleanings')) {
            handleSubTabs(null, '#dashboard-content .sidebar ul li:nth-child(11)');
        } else if (link.match('parkings')) {
            handleSubTabs(null, '#dashboard-content .sidebar ul li:nth-child(12)');
        } else if (link.match('chargers')) {
            handleSubTabs(null, '#dashboard-content .sidebar ul li:nth-child(13)');
        } else if (link.match('suppliers')) {
            handleSubTabs(null, '#suppliersTab');
        } else {
            handleSubTabs(null, '#dashboardTab');
        }

        // Click event for the "Vehicles" tab
        $('#vehiclesTab').click(function (event) {
            // Prevent default link behavior
            event.preventDefault();

            // Toggle visibility of the sub-tabs for the "Vehicles" tab
            $('#subTabsVehicles').stop().slideToggle();
        });

          // Click event for the "Vehicles" tab
          $('#incidentsTab').click(function (event) {
            // Prevent default link behavior
            event.preventDefault();

            // Toggle visibility of the sub-tabs for the "Vehicles" tab
            $('#subTabsIncidents').stop().slideToggle();
        });

     
            

    $(document).ready(function(){

        //Admin dashboard - search
        $('#search-users').jplist({   
            items_box: '.list' 
            ,item_path: '.list-item'
            ,panel_path: '.panel'
        });

        $('.jplist-group label').click(function() {
            $('.jplist-group label').removeClass('active');
            $(this).addClass('active');
        });

        $('.jplist .reset-btn').click(function() {
            $('.jplist-group label').removeClass('active');
            $('.jplist-group label:nth-child(2)').addClass('active');
        });
        //End Admin dashboard - search

        //Legal user search vehicle (left side of dashboard)
        $('#vehicle-thumbnail-container').jplist({   
            items_box: '.list' 
            ,item_path: '.list-item'
            ,panel_path: '.panel'
        });

        $('#fuel-fill-list-container').jplist({   
            items_box: '.list' 
            ,item_path: '.list-item'
            ,panel_path: '.panel'
        });


        $('#vehicle-malfunction-list-container').jplist({   
            items_box: '.list' 
            ,item_path: '.list-item'
            ,panel_path: '.panel'
        });


        $('#comments-list-container').jplist({   
            items_box: '.list' 
            ,item_path: '.list-item'
            ,panel_path: '.panel'
        });

        
        $('#add-comment').on('click', function(e){
            e.preventDefault();

            //Submit form if valid
            $('#add-comment-modal').modal({ backdrop: 'static', keyboard: false })
            .on('click', '#submit-add-comment', function(){
                                
                var formInvalid = false;

                $('#add-comment-modal input').each(function() {
                    if ($(this).val() === '') {
                        formInvalid = true;
                    }
                });
                if($('#add-comment-modal select').val() === '') {
                    formInvalid = true;
                }

                if(formInvalid){
                    $('#add-comment-modal .alert-danger').show();
                }
                else{
                    // alert('false'+formInvalid);
                    $('#add-comment-modal form').submit();
                }
                

            });

        });
        
    });

    </script>
    
</body>
</html>
<?php /**PATH C:\Projekti\Wine360\resources\views/layouts/app.blade.php ENDPATH**/ ?>