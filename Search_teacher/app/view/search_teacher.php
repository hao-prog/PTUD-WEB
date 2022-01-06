<!DOCTYPE html>
<html lang="vi-VN">
<head>
	<title>Search</title>
  	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
  	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
  	<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
  	<link rel="stylesheet" type="text/css" href="../../web/css/search_teacher.css">
  	<script type="text/javascript" src="../../web/js/delete_teacher.js"></script>

</head>
<body>
<?php 
require_once '../controller/teacher_search.php';

?>

	<div class="container mt-3 contai">
		<form class="row g-3 row1" >
		 	<div class=" col-md-3" >	
			 	<label class="lst" ><?php echo "Bộ môn" ?></label>
		    </div>
		    <div class=" col-md-9" style="float: right;">
		    	<select id="inputState" class="form-select" name="spec" >
			      	<option selected></option>
			        <?php 
			        	foreach ($specialized as $key => $value) {?>
			        	<option <?php if (isset($spec) && $spec==$key) echo "selected";?>  value="<?php echo $key;?>" >
			        				<?php echo $value;?>
			        			</option>
			        	
						
			        	<?php } ?>
			      </select>
		    </div>

		    <div class=" col-md-3" style="float: left;">
		 		<label class="lst" ><?php echo "Từ khoá" ?></label>
	    	</div>
	    	<div class=" col-md-9" style="float: right;">	
		    	<input type="text" name="str" class="form-control for" value="<?php echo $str;?>"  >
		    </div>
	    <div class="col-12">
    		<center><button  class="btn btn-primary" >Tìm kiếm</button>	</center>
  
  		</div>
		</form>
		<p>Số giáo viên tìm thấy: <?php echo count($search_teacher);?></p>
	<table>
		<tr>
			<th>No</th>
			<th>Tên giáo viên</th>
			<th>Khoa</th>
			<th>Mô tả chi tiết</th>
			<th>Action</th>
			
		</tr>
		<?php
		$j = 1;
		foreach($search_teacher as $i){
			
		?>

		<tr>
			<td><?php echo $j; $j++; ?></td>
			<td><?php echo $i[1]; ?></td>
			<td><?php foreach ($specialized as $key => $value) {
    					if ($i[3] == $key) echo $value;
    				}?>
    		</td>
			<td><?php echo $i[2];?></td>
			<td><a  class="btn btn-primary" onclick="return confirm('Bạn chắc chắn muốn xoá giáo viên <?php echo $i[1]; ?> ?');" href='../controller/teacher_delete.php?id=<?php echo $i[0]; ?>&spec=<?php echo $spec; ?>&str=<?php echo $str; ?>'>Xoá</a>&nbsp; 
				<a  class="btn btn-primary" href="" >Sửa</a></td>
		</tr>
		<?php } ?>	
		
	</table>
	</div>

</body>
</html>

