<?php   
function get_path($category_id)  
{     $con = mysql_connect("localhost","root","qWRPLperXKDS");     
	if (!$con) 
	{         
		die('���ݿ�����ʧ��: ' . mysql_error());     
		}       
		mysql_select_db('igem', $con);        // ���ҵ�ǰ�ڵ�ĸ��ڵ��ID������ʹ�ñ���������������ʵ��     
		$sql = "SELECT c1.parent_id, c2.category_name AS parent_name FROM category AS c1 LEFT JOIN category AS c2 ON c1.parent_id=c2.category_id            WHERE c1.category_id='$category_id' ";     //echo $sql."<br>";//���԰�SQL��ӡ�������õ����ݿ�ִ��һ�¿������     
		$result = mysql_query($sql);     
		$row = mysql_fetch_array($result);//����$row������˸��׽ڵ��ID��������Ϣ       // ����״·����������������     
		$path = array();       //������׽ڵ㲻Ϊ�գ����ڵ㣩���ͰѸ��ڵ�ӵ�·������     
		if ($row['parent_id']!=NULL)      
		{         //�����ڵ���Ϣ����һ������Ԫ��         
			$parent[0]['category_id'] = $row['parent_id'];         
			$parent[0]['category_name'] = $row['parent_name'];           //�ݹ�Ľ����ڵ�ӵ�·����         
			$path = array_merge(get_path($row['parent_id']), $parent);     
			}      
			return $path; 
			}   //���������ͼ���Կ�����K��ID��11�����Ǿ�����������·�� 
			$path =  get_path(11); echo "<h2>·�����飺</h2>"; echo "<pre>"; print_r($path); echo "</pre>"; 
			//��·�������ڵ��·����ӡ���� //��ӡ�����J>I>D>A> 
			echo "<h2>����ڵ��ӡ·����</h2>";   
			for ($i=count($path)-1; $i>=0; $i--) 
			{      echo $path[$i]['category_name']. '>'; 
				}   
				?>