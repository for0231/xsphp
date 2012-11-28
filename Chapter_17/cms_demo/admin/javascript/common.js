//鼠标放入和离开时改变图像显示
function cimg(obj, imgname) {
	obj.src="images/"+imgname;
}

//点击选项管理中的菜单，改变菜单列表的显示
function switchmenu(menutitle, menulist, num){	
	var mTitleObj=document.getElementById(menutitle);
	var tlist=document.getElementById("menulist");
	var mlist=tlist.getElementsByTagName("div");
	
	switch(num){
		case 0: mTitleObj.innerText="【系统管理】"; break;
		case 1: mTitleObj.innerText="【文章管理】"; break;
		case 2: mTitleObj.innerText="【用户管理】"; break;
	}

	for(var i=0; i<mlist.length; i++){
		if(i==num){
			mlist[num].style.display="block";
		}else {
			mlist[i].style.display="none";
		}
	}	
	showScroll(tlist);				 	
}

//点击时收缩菜单
function domenu(menuTitleobj, menuListId){
	var listObj=document.getElementById(menuListId);
	if(listObj.style.display=="none"){
		listObj.style.display="";
		menuTitleobj.className=" ul_down";
	}else{ 
		listObj.style.display="none";
		menuTitleobj.className=" ul_up";
	}
	showScroll(listObj.parentNode.parentNode);	
}
//设置滚动条显示
function showScroll(menuList){
	menuList.style.height="auto";
	var offsetTop=getOffsetTop(menuList);
	if((offsetTop+menuList.offsetHeight)>(document.body.clientHeight-5) ) {
		menuList.style.height=(document.body.clientHeight-offsetTop)-5;
	}else {
		menuList.style.height="auto";
	}
}

//获取偏移量的高度
function getOffsetTop(node) {
    var y = node.offsetTop;
    var parent = node.offsetParent;
    while (parent != null){
        y += parent.offsetTop;
        parent = parent.offsetParent;
    }
    return y;
}

//多选框处理，全选、反选、全不选
	var checkall=document.getElementsByName("del[]");


	function select()
	{
		for(var i=0; i<checkall.length; i++)
		{
			checkall[i].checked=true;
		}
	}

	function fanselect()
	{
		for(var i=0; i<checkall.length; i++)
		{
			if(checkall[i].checked)
			{
				checkall[i].checked=false;
			}else
			{
				checkall[i].checked=true;
			}
		}
	}

	function noselect()
	{
		for(var i=0; i<checkall.length; i++)
		{
			checkall[i].checked=false;
		}
	}

	function show(obj,picId){
		document.getElementById('previewPic').src=obj.src;
		document.getElementById('picId').value=picId;
		document.getElementById('pop_win').style.display='';
	}

	//获取AJAX引擎的XMLHttpRequest对象
	function getXmlhttp() {
		var http_request;
	
		if(window.XMLHttpRequest) { 
			http_request = new XMLHttpRequest();
			if (http_request.overrideMimeType) {
				http_request.overrideMimeType("text/xml");
			}
		}else if (window.ActiveXObject) { 
			try {
				http_request = new ActiveXObject("Msxml2.XMLHTTP");
			} catch (e) {
				try {
					http_request = new ActiveXObject("Microsoft.XMLHTTP");
				} catch (e) {}
			}
		}
		if (!http_request) { 
			window.alert("can't create XMLHttpRequest object.");
			return null;
		}	
		return http_request;
	}

	function showWin(url,winObj){
		var popWin=document.getElementById(winObj);
		popWin.style.display='block';
		loadAJAXTab(url,popWin);
	}
	var ajccache=new Object();
	function loadAJAXTab(url,ocontent){
		if(ajccache[url]==null) {
			var xhttp=getXmlhttp();		
				xhttp.onreadystatechange=function(){
					if(xhttp.readyState == 4 && (xhttp.status==200 || window.location.href.indexOf("http")==-1)){					
						ocontent.innerHTML=xhttp.responseText;
						ajccache[url]=ocontent.innerHTML;
					}
				}
			xhttp.open("GET",url,true);
			xhttp.send(null);
		}else{
			ocontent.innerHTML=ajccache[url];
		}
	}

function newopen(pid){
	window.open("picLog.php?pid="+pid,"_blank", "width=550, height=300, top=150, left=150,scrollbars=yes,location=no")	
}
