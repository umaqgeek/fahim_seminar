// common javascript document

// EMPTY!

$.ajaxSetup ({
		cache: false
	});
	var ajax_load_circle = "<img class='loading' src='"+base_url+"images/load.gif' alt='loading...' />";
	var ajax_load = "<img class='loading' src='"+base_url+"images/bar-load.gif' alt='loading...' />";
	
	function jAjaxGet(loc,vget)
	{ 
		$("#ajaxcontent")
			.html(ajax_load)
			.load(loc, vget);
	}
	
	function jAjaxLm1(target,loc,vget)
	{
		alert(target+loc+vget);
	}
	
	function jAjaxLm(target,loc,vget)
	{ 
	$(target)
		.html(ajax_load_circle)
		.load(loc, vget);
	}
	
	function jAjaxPost(loc,vpost)
	{
		$("#ajaxcontent")
			.html(ajax_load)
			.load(loc, vpost);
	}
	
	function doHash(f,v)
	{
		var hashPost = new Object();
		hashPost['v'] = v;
		
		var frm = f;
		var numberElements = frm.elements.length;
		for(var i = 0; i < numberElements; i++) {
			hashPost[frm.elements[i].name] = frm.elements[i].value;
		}
		
		return hashPost;
	}
	
	