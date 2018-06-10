<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

    <style>

        img[src="https://cdn.rawgit.com/000webhost/logo/e9bd13f7/footer-powered-by-000webhost-white2.png"]

    {

        display:none;

    }

    </style>

    

    <script>

(function(w,d,s,g,js,fs){

  g=w.gapi||(w.gapi={});g.analytics={q:[],ready:function(f){this.q.push(f);}};

  js=d.createElement(s);fs=d.getElementsByTagName(s)[0];

  js.src='https://apis.google.com/js/platform.js';

  fs.parentNode.insertBefore(js,fs);js.onload=function(){g.load('analytics');};

}(window,document,'script'));

</script>
<base href="http://localhost/camera/">
<link rel="Shortcut Icon" href="{{asset('source/images/camera-42319_960_720.png')}}" type="image/x-icon" />

<!--<base href="http://localhost/khactrieucamera3/admin/" />-->

<meta name="viewport" content="width=device-width", initial-scale=1 /> 

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<script type="text/javascript" src="{{asset('source/admin/js/jquery-3.1.1.min.js')}}"></script>

<link rel="stylesheet" type="text/css" href="{{asset('source/css/bootstrap.min.css')}}"/>

<link rel="stylesheet" type="text/css" href="{{asset('source/css/bootstrap-theme.min.css')}}"/>

<!--ckeditor && ckfinder-->

<script type="text/javascript" src="{{asset('source/admin/ckeditor/ckeditor.js')}}"></script>

<script type="text/javascript" src="{{asset('source/admin/ckfinder/ckfinder.js')}}"></script>



<link type="text/css" rel="stylesheet" href="{{asset('source/admin/css/style_index.css')}}">

<link rel="stylesheet" type="text/css" href="{{asset('source/admin/css/reponsive.css')}}"/>

<link rel="stylesheet" type="text/css" href="{{asset('source/admin/fonts/css/font-awesome.min.css')}}" />

<script type="text/javascript" src="{{asset('source/admin/js/jquery.js')}}"></script>

<title>Admin</title>

<script>

    $(document).ready(function(){

       /* $("#chungloai").change(function(){

            var id = $("#chungloai").val(); 

                $.post("data.php", {id: id}, function (data){

                $("#loai").html(data);

            });

        });*/

        /*var hide = 1;

        $('#logout').click(function(){

            if(hide % 2 != 0){

                $('#arow_dow').css('color','red');

                $('#menu_logout').css('display','block');

                hide = hide + 1;

            }else {

                $('#arow_dow').css('color','white');

                $('#menu_logout').css('display','none');

                hide = hide + 1;

            }

        });*/

    });

</script>

</head>

<body>

    <div id="wrapper">

        @include ('admin.header')

        <div id="container">

            <div id="menu_wrapper">

                @include ('admin.menu')

            </div>

            <div id="content" >

                @yield('content')

            </div>

            <div class="clear" style="clear: both;">

            </div>

        </div>

        <div class="clear" style="clear: both;">

            </div>

        <div id="footer">

            

        </div>

    </div>

    

    <script>



gapi.analytics.ready(function() {



  /**

   * Authorize the user immediately if the user has already granted access.

   * If no access has been created, render an authorize button inside the

   * element with the ID "embed-api-auth-container".

   */

  gapi.analytics.auth.authorize({

    container: 'embed-api-auth-container',

    clientid: '872715588440-8qkipfsrak4eu94qmpsuhlqhhd6va20s.apps.googleusercontent.com'

  });





  /**

   * Create a new ViewSelector instance to be rendered inside of an

   * element with the id "view-selector-container".

   */

  var viewSelector = new gapi.analytics.ViewSelector({

    container: 'view-selector-container'

  });



  // Render the view selector to the page.

  viewSelector.execute();





  /**

   * Create a new DataChart instance with the given query parameters

   * and Google chart options. It will be rendered inside an element

   * with the id "chart-container".

   */

  var dataChart = new gapi.analytics.googleCharts.DataChart({

    query: {

      metrics: 'ga:sessions',

      dimensions: 'ga:date',

      'start-date': '30daysAgo',

      'end-date': 'yesterday'

    },

    chart: {

      container: 'chart-container',

      type: 'LINE',

      options: {

        width: '100%'

      }

    }

  });





  /**

   * Render the dataChart on the page whenever a new view is selected.

   */

  viewSelector.on('change', function(ids) {

    dataChart.set({query: {ids: ids}}).execute();

  });



});

</script>

</body>

</html>