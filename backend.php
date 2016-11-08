<?php
       include_once 'db_con.php';
		if(isset($_POST['value'])) {
		
		
			if($_POST['value'] == 'none') {
			
				$sqlquery = "select pattern_file_id as id, patterns.name as Name,  ROUND(AVG(question_1)) as Rating,  group_concat(`question_2`) as Problems,  group_concat(`question_5`) as 'Comments'
                FROM    reviews
                left outer join pattern_files on reviews.pattern_file_id =pattern_files.id
                left outer join patterns on patterns.id = pattern_files.pattern_id
                where (question_1 >0 and question_5 !='') and ( question_2 like '%none%')
                group by reviews.pattern_file_id";  
			}  
			elseif($_POST['value'] == 'bumper') {  
			
			$sqlquery = "select pattern_file_id as id, patterns.name as Name,  ROUND(AVG(question_1)) as Rating,  group_concat(`question_2`) as Problems,  group_concat(`question_5`) as 'Comments'
                FROM    reviews
                left outer join pattern_files on reviews.pattern_file_id =pattern_files.id
                left outer join patterns on patterns.id = pattern_files.pattern_id
                where (question_1 >0 and question_5 !='') and ( question_2 like '%none%')
                group by reviews.pattern_file_id";
			} elseif($_POST['value'] == 'hoods'){
				$sqlquery = "select pattern_file_id as id, patterns.name as Name,  ROUND(AVG(question_1)) as Rating,  group_concat(`question_2`) as Problems,  group_concat(`question_5`) as 'Comments'
                FROM    reviews
                left outer join pattern_files on reviews.pattern_file_id =pattern_files.id
                left outer join patterns on patterns.id = pattern_files.pattern_id
                where (question_1 >0 and question_5 !='') and ( question_2 like '%hoods%')
                group by reviews.pattern_file_id";
			} elseif($_POST['value'] == 'all'){
			
				$sqlquery = "select pattern_file_id as id, patterns.name as Name,  ROUND(AVG(question_1)) as Rating,  group_concat(`question_2`) as Problems,  group_concat(`question_5`) as 'Comments'
                FROM    reviews
                left outer join pattern_files on reviews.pattern_file_id =pattern_files.id
                left outer join patterns on patterns.id = pattern_files.pattern_id
                where question_1 >0 and question_5 !=''
                group by reviews.pattern_file_id";  
			}
			
		
		}else {  
			
			$sqlquery = "select pattern_file_id as id, patterns.name as Name,  ROUND(AVG(question_1)) as Rating,  group_concat(`question_2`) as Problems,  group_concat(`question_5`) as 'Comments'
                FROM    reviews
                left outer join pattern_files on reviews.pattern_file_id =pattern_files.id
                left outer join patterns on patterns.id = pattern_files.pattern_id
                where question_1 >0 and question_5 !=''
                group by reviews.pattern_file_id";  
			} 
		
		
		$result = mysqli_query($db_con, $sqlquery);
        $graph_data = "";
		$name = "";
        while($row = mysqli_fetch_array($result)){
                $rating = $row['Rating'];
                $file_name = $row['Name'];
                $file_id = $row['id'];
                $problems= $row['Problems'];
                $comments = str_replace(array("'", "\r", "\n"), "", $row['Comments']);
                $graph_data .= "{y:$rating, patterns_name: '$file_name', comments:'$comments',problems:'$problems'},";
                $name .="'$file_name',";
				
        }
?>