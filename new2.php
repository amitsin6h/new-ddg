<!DOCTYPE html>
<html lang="eng">
<head>
<title>Digital Design</title>
<script src="https://code.jquery.com/jquery-1.9.1.js"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/> 

<script type="text/javascript">
<?php
include_once('backend.php');
?>
		
$(function () {
    $('#container').highcharts({
        chart: {
            renderTo: 'container',
            type: 'bar'
        },
                 plotOptions: {
            series: {
                colorByPoint: true
            }
        },
                 title: {
            text: 'DD4 Graph'
			
			
		},
                subtitle: {
            text: 'Comments & Feedback Against Patterns Name with Rating'
        },
        xAxis: {
            categories: [<?php echo $name;?>]
        },
          yAxis: {
            min: 0,
            title: {
                text: 'Ratings (0-5)',
            },
        },
                credits: {
            enabled: false
        },
        series: [{
                        showInLegend: false,
                       
            data: [<?php echo $graph_data; ?>]
        },],
        tooltip: {
            formatter: function() {return ' ' +
                                '<span style="color:#8E44AD;">Name: </span>' + '<strong>' + this.point.patterns_name + '</strong>' + '<br />' +
                                '<span style="color:#F1C40F;">Ratings: </span>' + '<strong>' + this.point.y + '</strong>' + '<br />' +
                                '<span style="color:#2CC990;">Comments: </span>' + '<strong>' + this.point.comments + '</strong>' + '<br />' +
                                '<span style="color:#A94442;">Problems: </span>' + '<strong>' + this.point.problems + '</strong>' + '<br />' ;
            }
        }
    });
});
</script>
<script type="text/javascript">
$(document).ready(function() {
  $('#value').on('change', function() {
     document.forms['form_filter'].submit();
  });
});
</script>
</head>
<body>
<div>
<form method='post' name='form_filter' > 
	<select name="value" id="value"> 
		<option value="all">All</option> 
		<option value="none">None</option> 
		<option value="bumper">Bumper</option> 
		<option value="hoods">Hoods</option>
	</select> 
	
	<!--<input type='submit' value ='Filter'> -->
</form>
</div>
<div id="container" style="width:100; height:600px;"></div>
</body>
</html>