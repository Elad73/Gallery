      </div>
      <!-- /#wrapper -->

      <!-- jQuery -->
      <script src="js/jquery.js"></script>

      <!-- Bootstrap Core JavaScript -->
      <script src="js/bootstrap.min.js"></script>

      <!-- WYSIWYG FROM tinyMCA - decided not to use it, if wants to uncomment here and on scripts.js-->
      <!--
      <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
      <script src="js/scripts.js"></script>
      -->

      <script type="text/javascript">
          google.charts.load("current", {packages:["corechart"]});
          google.charts.setOnLoadCallback(drawChart);
          function drawChart() {
              var data = google.visualization.arrayToDataTable([
                  ['Task', 'Hours per Day'],
                  ['Work',     11],
                  ['Eat',      2],
                  ['Commute',  2],
                  ['Watch TV', 2],
                  ['Sleep',    7]
              ]);

              var options = {
                  title: 'My Daily Activities',
                  pieHole: 0.4,
              };

              var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
              chart.draw(data, options);
          }
      </script>


      </body>

</html>
