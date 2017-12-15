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
                  ['Views',     <?php echo $session->get_count(); ?>],
                  ['Users',      <?php echo User::count_all(); ?>],
                  ['Photos',  <?php echo Photo::count_all(); ?>],
                  ['Comments', <?php echo Comment::count_all(); ?>]
              ]);

              var options = {
                  title: 'My Daily Activities',
                  pieSliceText: 'label',
                  pieHole: 0.5,
                  backgroundColor: 'transparent'
              };

              var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
              chart.draw(data, options);
          }
      </script>


      </body>

</html>
