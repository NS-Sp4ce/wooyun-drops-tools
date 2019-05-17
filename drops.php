<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>
		乌云知识库
	</title>
	<meta content="webkit" name="renderer">
	<meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
	<meta content="width=device-width, initial-scale=1, maximum-scale=1" name="viewport">
	<link href="/layui/css/layui.css" media="all" rel="stylesheet">
</head>

<body class="layui-main">
	<div class="layui-container">
		<div class="layui-col-xs6 layui-col-md12">
			<div class="layui-field-title">
				<h1><a href="#">乌云知识库</a></h1>
				<h2><a href="#">WooYun Drops</a></h2>
			</div>
		</div>
		<hr class="layui-bg-blue">
		<div class="layui-col-xs6 layui-col-md12 layui-text-center layui-mt-5 layui-mb-5">
			<h1 class="layui-text-h1">乌云知识库</h1>
		</div>
		<div class="layui-col-xs6 layui-col-md12 layui-mt-5">
			<form class="layui-form" action="" method="get">
				<div class="layui-form-item" style="width: 90%;margin: 0 auto">
					<div class="layui-input-inline">
						<input type="text" name="q" required="" lay-verify="required" placeholder="搜索条件" class="layui-input">
					</div>
					<button class="layui-btn layui-btn-normal" type="submit">搜索</button>
				</div>
			</form>
		</div>
		<div class="layui-col-xs6 layui-col-md12">
			<!--检索结果-start-->
			<?php
				$q0 = isset($_GET['q']) ? $_GET['q'] : 'SQL注射';
				$q = str_replace("'", "", $q0);
				$qs = mysql_query("select * from drops where title like '%" . $q . "%' or link like '%" . $q . "%' group by id order by id desc");
				$num = "15"; //每页显示30条
				$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
			$total = mysql_num_rows($qs); //查询数据的总数total
			$pagenum = ceil($total / $num);
			$offset = ($page - 1) * $num;
			$drops_result2222 = mysql_query("select * from drops where title like '%" . $q . "%' or link like '%" . $q . "%' group by id order by id desc limit " . $offset . ",15");
			if (mysql_num_rows($$drops_result2222) > 0) {
				echo '
									<fieldset class="layui-elem-field layui-field-title" style="margin-top: 50px;">
					                		<legend>搜索结果</legend>
					            	</fieldset>
					        	    <table class="layui-table">
					                	<colgroup>
					                    	<col>
					                    	<col>
					                    	<col>
					                	</colgroup>
					                <thead>
					                    <tr>
					                        <th>
					                            标题
					                        </th>
					                        <th>
					                            链接
					                        </th>
					                        <th>
					                            操作
					                        </th>
					                    </tr>
					                </thead>';
				echo "<tbody>";
				while (@$row223 = mysql_fetch_array($$drops_result2222)) {
					echo "<tr>";
					echo '<td>' . $row223['title'] . '</td>' . PHP_EOL;
					echo '<td>' . $row223['link'] . '</td>' . PHP_EOL;
					echo '<td> <a href="http://' . $_SERVER["SERVER_ADDR"] . $row223['link'] . '" class="layui-btn layui-btn-normal">查看</a></td>' . PHP_EOL;
					echo "</tr>";
				}
				echo '</tbody>';
				echo '</table>';
				echo '<div  style="float:right;padding:10px 30px 0 0">';
				$page = $_GET['page'] ? $_GET['page'] : 1; //当前页数，默认是1
				if ($page == 1) {
					$prepage = 1;
				} else {
					$prepage = $page - 1;
				}
				if ($page == $pagenum) {
					$nextpage = $pagenum;
				} else {
					$nextpage = $page + 1;
				}
				echo '<center> 共 ' . $total . ' 条记录';
				echo '，' . $pagenum . ' 页 ';
				echo '<a href="drops.php?q=' . $q . '&page=1" class="layui-btn layui-btn-sm">首页</a>' . PHP_EOL;
				echo '<a href="drops.php?q=' . $q . '&page=' . $prepage . '" class="layui-btn layui-btn-primary layui-btn-sm">上一页</a>' . PHP_EOL;
				echo '<a href="drops.php?q=' . $q . '&page=' . $nextpage . '" class="layui-btn layui-btn-primary layui-btn-sm">下一页</a>' . PHP_EOL;
				echo '<a href="drops.php?q=' . $q . '&page=' . $pagenum . '" class="layui-btn layui-btn-danger layui-btn-sm">末页</a></center>' . PHP_EOL;
				echo '</div>';
			} else {
				echo '<blockquote class="layui-elem-quote layui-text layui-mt-5">未检索到相关内容！</blockquote>';
			}

			?>
			<!---检索结果-end-->
			<!---随机文章-start-->
			<?php
			$drops_random = mysql_query("SELECT * FROM drops WHERE id >= ((SELECT MAX(id) FROM drops)-(SELECT MIN(id) FROM drops)) * RAND() + (SELECT MIN(id) FROM drops) LIMIT 5");
			if (mysql_num_rows($drops_random) > 0) {
				echo '
				                <fieldset class="layui-elem-field layui-field-title" style="margin-top: 50px;">
				                    <legend>
				                        随机文章
				                    </legend>
				                </fieldset>
				                    <table class="layui-table">
				                        <colgroup>
				                            <col>
				                            <col>
				                            <col>
				                        </colgroup>
				                    <thead>
				                        <tr>
				                            <th>
				                                标题
				                            </th>
				                            <th>
				                                链接
				                            </th>
				                            <th>
				                                操作
				                            </th>
				                        </tr>
									</thead>
							';
				echo "<tbody>";
				while ($row223333 = mysql_fetch_array($drops_random)) 
				{
					echo "<tr>";
					echo '<td>' . $row223333['title'] . '</td>' . PHP_EOL;
					echo '<td>' . $row223333['link'] . '</td>' . PHP_EOL;
					echo '<td> <a href="http://' . $_SERVER["SERVER_ADDR"] . $row223333['link'] . '" class="layui-btn layui-btn-normal">查看</a></td>' . PHP_EOL;
					echo "</tr>";
				}
				echo '</tbody>';
				echo '</table>';
			}
			?>
		</div>
	</div>
	<div class="layui-footer">
		<ul>
			<li><a href="/">wooyun.org</a></li>
		</ul>
	</div>
	<script charset="utf-8" src="/layui/layui.js"></script>
</body>

</html>
