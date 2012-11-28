<?php
	include "./libs/Smarty.class.php";             	//包含Smarty类库所在的文件
	require("Page_class.php");                  	//包含分页类Page所在的文件
	require("MyDB_class.php");                	//包含数据库读取类所在的文件

	$tpl = new Smarty();                      	//创建一个Smarty类的对象$tpl
	$tpl->template_dir = "./templates/";          	//设置所有模板文件存放的目录
	$tpl->compile_dir = "./templates_c/";         	//设置所有编译过的模板文件存放的目录
	$tpl->cache_dir = "./cache/";                	//设置存放Smarty缓存文件的目录
	$tpl->caching=1;                         	//设置开关Smarty缓存模板功能属性，这里为开启
	$tpl->cache_lifetime=60*60;                	//设置模板缓存有效时间段的长度，这里为1小时
	$tpl->left_delimiter = '<{';                  	//设置模板语言中的左结束符
	$tpl->right_delimiter = '}>';       	      	//设置模板语言中的右结束符

     	/*在GET方法中获取用户提交的页面索引数字。默认第一页，页面索引$current_page值为1*/
	$current_page=isset($_GET['page'])?intval($_GET['page']):1;

     	/* 通过is_cached()方法判断指定的页面是否已经被缓存，如果是则不再执行数据库操作 */
	if(!$tpl->is_cached("index.tpl", $current_page)) {
		$mydb=new MyDB();                     		//创建数据库操作类MyDB的对象
		$total=$mydb->getRowTotal();              	//调用MyDB类的方法返回数据表记录总数
		$fpage=new Page($total,$current_page, 5);    	//通过获取的值创建分页类Page的对象
		$pageInfo=$fpage->getPageInfo();           	//获取和当前页面有关的所有信息数组
         	/* 通过调用MyDB中的方法，获取当前页面所需要的所有记录的数据数组 */
		$products=$mydb->getPageRows($pageInfo["row_offset"], $pageInfo["row_num"]);
		if($products) {                           	//如果从数据库中获取到商品记录
			$tpl->assign("tableName", "商品列表");  //分配页面显示的表面到模板中
			$tpl->assign("url", "index.php");       //分配分页处理文件的URL到模板中
			$tpl->assign("products", $products);    //将在本页显示的所有数据数组分配给模板
			$tpl->assign("pageInfo", $pageInfo);    //将和当前页有关的所有信息数组分配给模板
		}else {                                 	//如果没有获取到任何商品记录
			echo "数据读取失败!";               	//输出一行提示信息
			exit;                              	//并退出程序
		}
	}
	$tpl->display("index.tpl", $current_page);         	//加载输出模板index.tpl，并指定页面缓存标号
?>
