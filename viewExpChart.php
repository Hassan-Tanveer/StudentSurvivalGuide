<?php session_start(); ?>
<?php include('includes/nav-dashboard.php');?>
<?php include('database/expenseServer.php');?>
<?php $db = mysqli_connect("127.0.0.1", "root", "", "studentsurvivalguide"); //127.0.0.1
echo $db->connect_error;

// SQL Statements to select the category and the corresponding (total) amount spent for the logged in user.
$viewID = $_SESSION['id'];
$query = "SELECT Category, SUM(Amount_Spent) FROM expenses WHERE User_ID = '$viewID' GROUP BY Category";
?>
<br/>
<h1 style="text-align: center"><i class="fas fa-chart-pie fa-lg mr-3"></i>My Expenses</h1>
<hr>

<!-- Scripts to use the charts API -->
    <!-- <script src=”https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js”></script> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);
      
// JavaScript function which draws the piechart, using the defined SQL statements coded above  
      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Type of Expense', 'Amount Spent'],
        <?php
        $result = $db->query($query);
        while($row = $result->fetch_assoc()) {
        echo "['".$row['Category']."',".$row['SUM(Amount_Spent)']."],";
        }
        ?>
        
        ]);

        var options = {
          title: 'Categories',
          legend: {position: 'left', alignment:'start'},
          // width:'700px',
          // height:'400px',
          chartArea: 
          {
            left:"5%",
            top:"12%",
            bottom: "35%",
            right: "30%",
            width: "100%",
            height: "90%" 
          }
          };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
      
      // $(window).resize(function(){
      //   window.addEventListener("resize", drawChart);
      //   // style=" width: window.innerWidth; height: window.innerWidth"
      // });
    </script>
</head>
  
<body>
  <div class="container">
    <div class="row">
      <div class="col" align="center">
      <p style="text-align:center; font-weight:bold">A breakdown of your expenses</p>
        <div id="piechart" class="child" style="width:600px; height: 400px"></div>
      </div>
    </div>
  </div>
</body>


<script type="text/javascript">
  function viewport(){
    var e = window,
    a = 'inner';
    if(!('innerWidth' in window)){
      a = 'client';
      e = document.documentElement || document.body;
    }
    return {width: e[a+'Width'] , height : e[a+'Height']};
  }
var vpWidth = viewport().width;
</script>