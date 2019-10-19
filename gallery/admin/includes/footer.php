  </div>
  <!-- /#wrapper -->

  <!-- jQuery -->
  <script src="js/jquery.js"></script>

  <!-- Bootstrap Core JavaScript -->
  <script src="js/bootstrap.min.js"></script>
  <script type="text/javascript">
      $(document).on("click",".openmodal",function() {
        $("#photo-library").modal();
      });
  </script>
  <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
  <script>
      tinymce.init({
          selector: 'textarea'
      });
  </script>
  <script type="text/javascript">
      google.charts.load('current', {
          'packages': ['corechart']
      });
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

          var data = google.visualization.arrayToDataTable([
              ['Task', 'Hours per Day'],
              ['Views', <?php echo $session->count; ?>],
              ['Photos', <?php echo Photo::count_all(); ?>],
              ['Users', <?php echo Users::count_all(); ?>],
              ['Comments', <?php echo Comment::count_all(); ?>]
          ]);

          var options = {
              legend: "none",
              title: 'My Daily Activities',
              pieSliceText: 'label',
              backgroundColor: 'transparent'
          };

          var chart = new google.visualization.PieChart(document.getElementById('piechart'));

          chart.draw(data, options);
      }
  </script>
  </body>

  </html>
  <?php ob_end_flush(); ?>