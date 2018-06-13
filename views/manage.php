<?php require_once('../config.php'); ?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <script src="../js/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>    
    <script type="text/javascript" src="/testing/js/vue-weather-widget.min.js"></script>
    <link href="../css/vue-weather-widget.min.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/index.css">
    <title>Quản lí nhân sự</title>
  </head>
<body>
<div id="app">
    <?php require(ROOT.'/components/navbar.php'); ?>  
    <?php require(ROOT.'/components/sidebar.php'); ?>

<!-- Page Content -->
<div id="page-content-wrapper">
    <div class="container">
      
    <weather 
        api-key="ed39799c9a478eb6eb38fad961cb8f3e"
        title="Thời tiết hiện tại"
        :latitude="lat"
        :longitude="lon"
        language="en"
        units="uk">
    </weather>
      </div>
    <?php  
?>
  </div>
</div>

</div>
</body>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
<script>

    $("#menu-toggle").click(function(e) {
      e.preventDefault();
    $("#wrapper").toggleClass("toggled");
  });
  console.log(window.location.href);
  $(".dashboard").click(function () {
    const baseUrl = "";
    window.location.href = window.location.href;
  });
</script>
<script type="module">
const self = this
// const VueWeatherWidget = require('VueWeatherWidget');
window.vm = new Vue({
    el: '#app',
    data () {
      return {
        lat: null,
        lon: null
      }
    },
    computed: {
      currentPosition () {
        return self.navigator.geolocation.watchPosition();
      }
    },
    methods: {
      setPosition (position) {
        this.lat = position.coords.latitude;
        this.lon = position.coords.longitude;
      },
      getLocation () {
        navigator.geolocation.watchPosition(this.setPosition);
      }
    },
    components: {
        'weather': VueWeatherWidget$1
    },
    mounted () {
      this.getLocation();
    }
  });
</script>
</html>