<?php echo "<select name='ed' size='1' id=st'>";    ?>
<?php 
function display_children($category_id, $level)  
{     $con = mysql_connect("localhost","root","qWRPLperXKDS");     
	if (!$con) {         die('���ݿ�����ʧ��: ' . mysql_error());     }   
	
	mysql_select_db('igem', $con);      // ��õ�ǰ�ڵ�����к��ӽڵ㣨ֱ�Ӻ��ӣ�û�����ӣ�     
	$result = mysql_query("SELECT * FROM category WHERE parent_id='$category_id'");       // �������ӽڵ㣬��ӡ�ڵ�  
	   
	while ($row = mysql_fetch_array($result))      
	{         
		// ���ݲ㼶������������ʽ��ӡ�ڵ������         
		// ����ֻ�Ǵ�ӡ������Խ����´���ĳ�����������ѽڵ���Ϣ�洢����      
		echo "<option value='".$row['value']."'>".str_repeat('|-',$level).$row['category_name']."</option>";          
		// �ݹ�Ĵ�ӡ���еĺ��ӽڵ�        
		display_children($row['category_id'], $level+1);     } 
		}   
		//���ڵ���A:1���Ǿ���������ӡ���еĽڵ� 
		display_children(1, 0); 
		echo "</select>";?> 
		


