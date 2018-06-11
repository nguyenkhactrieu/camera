@extends('admin.index')

@section('content')
<script>
  (function(w,d,s,g,js,fs){
    g=w.gapi||(w.gapi={});g.analytics={q:[],ready:function(f){this.q.push(f);}};
    js=d.createElement(s);fs=d.getElementsByTagName(s)[0];
    js.src='https://apis.google.com/js/platform.js';
    fs.parentNode.insertBefore(js,fs);js.onload=function(){g.load('analytics');};
}(window,document,'script'));
</script>
<script>

    gapi.analytics.ready(function() {

  /**
   * Authorize the user with an access token obtained server side.
   */
   gapi.analytics.auth.authorize({
    'serverAuth': {
      'access_token': '{{ $accesstoken }}'
  }
});


  /**
   * Creates a new DataChart instance showing sessions over the past 30 days.
   * It will be rendered inside an element with the id "chart-1-container".
   */
   var dataChart1 = new gapi.analytics.googleCharts.DataChart({
    query: {
      'ids': 'ga:175889736', // <-- Replace with the ids value for your view.
      'start-date': '7daysAgo',
      'end-date': 'today',
      'metrics': 'ga:sessions,ga:users',
      'dimensions': 'ga:date'
  },
  chart: {
    'container': 'chart-1-container',
    'type': 'LINE',
    'options': {
      'width': '100%'
  }
}
});
   dataChart1.execute();

   var dataChart3 = new gapi.analytics.googleCharts.DataChart({
    query: {
      'ids': 'ga:175889736', // <-- Replace with the ids value for your view.
      'start-date': '7daysAgo',
      'end-date': 'today',
      'metrics': 'ga:pageviews',
      'dimensions': 'ga:date'
  },
  chart: {
    'container': 'chart-3-container',
    'type': 'LINE',
    'options': {
      'width': '100%'
  }
}
});
   dataChart3.execute();


  /**
   * Creates a new DataChart instance showing top 5 most popular demos/tools
   * amongst returning users only.
   * It will be rendered inside an element with the id "chart-3-container".
   */
   var dataChart2 = new gapi.analytics.googleCharts.DataChart({
    query: {
      'ids': 'ga:175889736', // <-- Replace with the ids value for your view.
      'start-date': '7daysAgo',
      'end-date': 'today',
      'metrics': 'ga:pageviews',
      'dimensions': 'ga:pagePathLevel1',
      'sort': '-ga:pageviews',
      'filters': 'ga:pagePathLevel1!=/',
      'max-results': 7
  },
  chart: {
    'container': 'chart-2-container',
    'type': 'PIE',
    'options': {
      'width': '100%',
      'pieHole': 4/9,
  }
}
});
   dataChart2.execute();

});
</script>
<div id="noidung">

    <div id="donhang" class="items">
        <a href="pt/tat-ca-don-hang-0.html" style="display: block;" title="Đơn hàng mới"><i class="fa fa-address-card-o" aria-hidden="true" style="color:green" ></i><hr />
        <span style="font-size: 15px; color:black">Có  đơn hàng mới</span></a>
    </div>
    <div id="user_lock" class="items">
        <a href="index.php?key=userOnline&qur=block">
            <i class="fa fa-lock" aria-hidden="true" style="color:red"></i>
            <hr />
            <span style="font-size: 15px;color:black">Có  tài khoản đang bị khóa</span>
        </a>
    </div>
    <div id="hethang" class="items">
        <a href="#">
            <i class="fa fa-cart-arrow-down" aria-hidden="true" style="color:#ff6c00"></i>
            <hr />
            <span style="font-size: 15px;color:black"> Sản phẩm sắp hết hàng</span>
        </a>
    </div> 
    <div style="clear: both;"></div>
</div><!-- /noidung -->
<div class="analytics" style="overflow: scroll;">
    <div id="chart-1-container" class="analytics"></div>
    <div id="chart-2-container" class="analytics"></div>
    <div id="chart-3-container" class="analytics"></div>
</div>
@endsection