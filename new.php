<!DOCTYPE html>
<html lang="eng">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, shrink-to-fit=no, initial-scale=1">
<title>Digital Design</title>
<script src="https://code.jquery.com/jquery-1.9.1.js"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/> 
<link href="css/simple-sidebar.css" rel="stylesheet">
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
<style type="text/css">
	#white{
		color: #fff;
	}
</style>
</head>
<body>
<script type="text/javascript">
$(document).ready(function() {
	$("ul li").click(function(){
    $('#value').val($(this).attr('value'));
    //var value = $('#value').val();
    $("form[name='form_filter']").submit();
});
});
</script>

<div id="wrapper">
<div id="sidebar-wrapper">            
	<ul class="sidebar-nav">                
	<!--<li class="sidebar-brand"><a href=""><span id="white">Filter Graph</span></a></li>-->               
	<li class="active treeview">
          <a>
            <i class="fa fa-dashboard"></i> <span>Filter Graph</span>
            <span class="pull-right">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <form method='post' name='form_filter'>

          <input type="hidden" id="value" name="value" />
			<ul > 
				<li value="all" id="white">All</li> 
				<li value="none" id="white">None</li> 
				<li value="bumper" id="white">Bumper</li> 
				<li value="hoods" id="white">Hoods</li>
			</ul>
          </form>
        </li>          
	</ul>        
</div>               
<div id="page-content-wrapper">            
	<div class="container-fluid">                
		<div class="row">                    
			<div class="col-lg-12">
			                                    
				<div id="container" style="width:100; height:600px;"></div>                    					
			</div>                
		</div>            
	</div>        
</div>    
</div>


</body>
</html>