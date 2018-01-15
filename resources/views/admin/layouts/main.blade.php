<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <link rel="shortcut icon" href="{{asset('img/favicon.png')}}">
    <title>
        @yield('title', 'Dashboard - School Management System')
    </title>
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/bootstrap-theme.css')}}" rel="stylesheet">
    <link href="{{asset('css/w3.css')}}" rel="stylesheet">
    <link href="{{asset('css/elegant-icons-style.css')}}" rel="stylesheet" />
    <link href="{{asset('css/font-awesome.min.css')}}" rel="stylesheet" />
    <link href="{{asset('dist/css/pignose.calendar.min.css')}}" />
    <link href="{{asset('dist/css/pignose.calendar.css')}}" />
    <link href="{{asset('assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css')}}" rel="stylesheet" type="text/css" media="screen"/>
    <link rel="stylesheet" href="{{asset('css/owl.carousel.css')}}" type="text/css">
    <link href="{{asset('css/jquery-jvectormap-1.2.2.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/fullcalendar.css')}}">
    <link href="{{asset('css/widgets.css')}}" rel="stylesheet">
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
    <link href="{{asset('css/style-responsive.css')}}" rel="stylesheet" />
    <link href="{{asset('css/xcharts.min.css')}}" rel=" stylesheet">
    <link href="{{asset('css/jquery-ui-1.10.4.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="{{asset('css/calendar.css')}}">
    <link rel="stylesheet" href="{{asset('css/monthly.css')}}">
    <script src="{{asset('jquery.min.js')}}"></script>
    <script src="{{asset('js/jquery-calendar.js')}}"></script>

</head>

<body>
<section id="container" class="">
    @include('admin.layouts.header')
            <!--header end-->
    @include('admin.layouts.sidebar')
            <!--sidebar end-->
    <section id="main-content">
        <section class="wrapper">
            @yield('content')
        </section>
    </section>

</section>

<script src="{{asset('js/jquery.js')}}"></script>
<script src="{{asset('js/jquery-ui-1.10.4.min.js')}}"></script>
<script src="{{asset('js/jquery-1.8.3.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/jquery-ui-1.9.2.custom.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/jquery.scrollTo.min.js')}}"></script>
<script src="{{asset('js/jquery.nicescroll.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/jquery-knob/js/jquery.knob.js')}}"></script>
<script src="{{asset('js/jquery.sparkline.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js')}}"></script>
<script src="{{asset('js/owl.carousel.js')}}" ></script>
<script src="{{asset('js/jquery.rateit.min.js')}}"></script>
<script src="{{asset('js/jquery.customSelect.min.js')}}" ></script>
<script src="{{asset('assets/chart-master/Chart.js')}}"></script>
<script src="{{asset('dist/js/pignose.calendar.full.js')}}"></script>
<script src="{{asset('dist/js/pignose.calendar.full.min.js')}}"></script>
<script src="{{asset('dist/js/pignose.calendar.js')}}"></script>
<script src="{{asset('dist/js/pignose.calendar.min.js')}}"></script>
<script src="{{asset('js/scripts.js')}}"></script>
<script src="{{asset('js/sparkline-chart.js')}}"></script>
<script src="{{asset('js/easy-pie-chart.js')}}"></script>
<script src="{{asset('js/jquery-jvectormap-1.2.2.min.js')}}"></script>
<script src="{{asset('js/jquery-jvectormap-world-mill-en.js')}}"></script>
<script src="{{asset('js/xcharts.min.js')}}"></script>
<script src="{{asset('js/jquery.autosize.min.js')}}"></script>
<script src="{{asset('js/jquery.placeholder.min.js')}}"></script>
<script src="{{asset('js/gdp-data.js')}}"></script>
<script src="{{asset('js/morris.min.js')}}"></script>
<script src="{{asset('js/sparklines.js')}}"></script>
<script src="{{asset('js/countries.js')}}"></script>
<script src="{{asset('js/jquery.slimscroll.min.js')}}"></script>


<script>
    window._token = '{{ csrf_token() }}';
</script>

<script>

    //knob
    $(function() {
        $(".knob").knob({
            'draw' : function () {
                $(this.i).val(this.cv + '%')
            }
        })
    });

    //carousel
    $(document).ready(function() {
        $("#owl-slider").owlCarousel({
            navigation : true,
            slideSpeed : 300,
            paginationSpeed : 400,
            singleItem : true

        });
    });

    //custom select box

    $(function(){
        $('select.styled').customSelect();
    });

    /* ---------- Map ---------- */
    $(function(){
        $('#map').vectorMap({
            map: 'world_mill_en',
            series: {
                regions: [{
                    values: gdpData,
                    scale: ['#000', '#000'],
                    normalizeFunction: 'polynomial'
                }]
            },
            backgroundColor: '#eef3f7',
            onLabelShow: function(e, el, code){
                el.html(el.html()+' (GDP - '+gdpData[code]+')');
            }
        });
    });

</script>
<script>
    // Get the modal
    var modal = document.getElementById('id02');

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>



</body>
</html>
