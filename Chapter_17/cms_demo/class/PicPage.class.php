<?php
	/*==================================================================*/
	/*		文件名:picPage.class.php                            */
	/*		概要: 图片选择框的处理类.             	       	    */
	/*		作者: 高洛峰                                        */
	/*		创建时间: 2009-05-25                                */
	/*		最后修改时间:2009-05-25                             */
	/*		copyright (c)2009 lampteacher@gmail.com             */
	/*==================================================================*/
	class PicPage {
		private $album;
		private $pic;
		private $catId;
		private $currentPage;
		private $total;
		private $page;
		private $pageInfo;
		private $pics;

		function __construct($catId=1, $currentPage=1){
			$this->album=new Album();
			$this->pic=new Picture();
			$this->catId=$catId;
			$this->currentPage=$currentPage;
			$this->total=$this->pic->getRowTotal($catId);
			$this->page=new Page($this->total, $currentPage, PICTURE_PAGE_SIZE);
			$this->pageInfo=$this->page->getPageInfo();
			$this->pics=$this->getPics();
		}

		private function getSelect(){
			return $this->album->buildSelect("catId", $this->catId, array("onChange"=>"showWin('picPage.php?show=view&catId='+options[selectedIndex].value,'pop_win')"));
		}
		private function getPics(){
			return $this->pic->getAllPic($this->catId,$this->pageInfo["row_offset"], $this->pageInfo["row_num"]);
		}

		private function outputSelect(){
			echo '<ul class="viewmess">';
			echo '<li class="dark-row">';
			echo '<span style="float:left">&nbsp;&nbsp;请从相册中选择需要的图片&nbsp;&nbsp;';
			echo $this->getSelect();
			echo '</span>';
			echo '<span style="float:right;cursor:pointer;" onclick="document.getElementById(\'pop_win\').style.display=\'\'">';
			echo '<img src="images/close.gif" border=0>关闭&nbsp;&nbsp;</span>';
			echo '</li><div style="width:100%; clear:both"> </div>';
		}

		function outPut(){
			$this->outputSelect();
			if(empty($this->pics)){
				echo '该相册中没有图片';
			}else{	
				foreach($this->pics as $value){
					echo '<div class="pic_list">';
					if($value["hasThumb"] ==1 || $value["hasMark"] ==1){
						echo '<img onclick="show(this,'.$value["id"].')" alt="'.$value["picTitle"].'" src="'.GALLERY_PATH.str_replace(".","_new.",$value["picName"]).'" width="100" height="100">';
					}else{
						echo '<img onclick="show(this,'.$value["id"].')" alt="'.$value["picTitle"].'" src="'.GALLERY_PATH.$value["picName"].'" width="100" height="100">';
					}
					echo '<br><center>'.$value["picTitle"].'</center>';
					echo '</div>';
				}
			}
			$this->getOptPage();
		}	

		private function getOptPage(){
			echo '<div style="width:100%; clear:both"> </div>';
			echo '<li class="dark-row">';
			echo '<span class="right">';
			echo "该相册中共 <b>{$this->pageInfo['row_total']}</b> 张图片,";
			echo "本页显示 {$this->pageInfo['page_start']}-{$this->pageInfo['page_end']} 张图片&nbsp;&nbsp;";
			echo  $this->pageInfo["current_page"]."/".$this->pageInfo["page_num"]."&nbsp;&nbsp;";
		
			if ($this->pageInfo["current_page"] == 1){ 
				echo '<img border=0  alt="第一页" src="images/first.gif">&nbsp;&nbsp;';
			}else{ 
				echo "<a href=\"javascript:showWin('picPage.php?show=1&catId={$this->catId}&page=1', 'pop_win')\">";
				echo '<img border=0 alt="第一页" src="images/first.gif"></a>&nbsp;&nbsp;';
			}
			if ($this->pageInfo["prev_page"]){ 
				echo "<a href=\"javascript:showWin('picPage.php?show=view&catId={$this->catId}&page={$this->pageInfo["prev_page"]}','pop_win')\">";
				echo '<img border=0  alt="上一页" src="images/prev.gif"></a>&nbsp;&nbsp;';
			}else{ 
				echo '<img border=0  alt="上一页" src="images/prev.gif">&nbsp;&nbsp;';
			} 
			if ($this->pageInfo["next_page"]) {
				echo "<a href=\"javascript:showWin('picPage.php?show=view&catId={$this->catId}&page={$this->pageInfo["next_page"]}','pop_win')\">";
				echo '<img border=0  alt="下一页" src="images/next.gif"></a>&nbsp;&nbsp;';
			}else{ 
				echo '<img border=0  alt="下一页" src="images/next.gif">&nbsp;&nbsp;';
			}
			if ($this->pageInfo["current_page"]  ==  $this->pageInfo["page_num"]){ 
				echo '<img border=0  alt="最后一页" src="images/last.gif">';
			}else{
				echo "<a href=\"javascript:showWin('picPage.php?show=view&catId={$this->catId}&page={$this->pageInfo["page_num"]}','pop_win') \">";
				echo '<img border=0 alt="最后一页" src="images/last.gif"></a>';
			 } 
			echo '</span></li>';
		}
	}
?>
