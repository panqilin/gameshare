<?php
	$param = $_GET;
	if (empty($param['roomid'] )) {
		$param['roomid'] = 999999;
	}
?>

<?php if(!empty($param)):?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="keyword" content="游戏 斗牛 斗地主 炸金花">
    <script src="https://cdn.bootcss.com/jquery/1.11.0/jquery.min.js"></script>
    <link rel = "Shortcut Icon" href='/resource/images/icon_niuniu.png'>
    <title>三俊开心斗地主</title>
    <style>
        * {
            margin: 0;
            padding: 0;
        }
        body {
            font-family: "Microsoft YaHei", "SimHei", "Arial", "Times New Roman";
            font-size: 1.4rem;
            background-color:#422f28;
        }
        #warp{ width:80%; margin: 0 auto;}
        .download {
            position:relative;
        }
        .rule {
            margin-top:20px;
        }
        .wz>p{
            color:#FFFFFF;
            margin-top:14px;
            margin-bottom:14px;
        }
        .wz>p span{
            padding-right:52px;
            background-image:url('/resource/images/mj_flag.png');
            background-repeat:no-repeat;
            background-size:48px;
            background-position:right center;
        }
        .xiazai {
            padding-top: 50%;
        }
        .xiazai a {
        		padding-top: 38.1875%;
        }
        .xiazai_ios a{
            display:block;
            background-image:url('resource/images/niuniu_btn.png');
            background-repeat:no-repeat;
            background-size:100%;
            background-position:center 0px;
            margin-top:-8px;
        }
        .xiazai_az a{
            display:block;
            background-image:url('resource/images/niuniu_btn.png');
            background-repeat:no-repeat;
            background-size:100%;
            background-position:center 0px;
            margin-top:-8px;
        }
        .wtips{
        	position:absolute;
        	left:0;
        	top:0;
        	background-color:rgba(0,0,0,0.65);
        	width:100%;
        	height:100%;
        	z-index:100;
        }
        .wtips img{
        	width:90%;
        	margin:1% 5%;
        }
    </style>
</head>
<body>
	<div style='display:none;'>
<img src='resource/images/icon_niuniu.png' />
</div>
	<div style="position:absolute;left:0;top:0;width:100%;height:100%;z-index:-2;overflow:hidden;">
		<img class="bg_img" src="resource/images/niuniu_bg.png" alt="" style="width:100%;"/>
	</div>
  <div id="warp">
      <div class="xiazai">
          <div style="width:25%;float:left"><img src="resource/images/icon_niuniu.png" width="90%"/></div>
          <div class="xiazai_ios" style="display:none;width:75%;float:right"><a href="https://www.2yx.cm:444/gameweb/gamecenter/banhao/weixin/index.html"></a></div>
		  <div class="xiazai_az" style="display:none;width:75%;float:right"><a href="http://www.2yx.cm/gameweb/gamecenter/banhao/weixin/gamecenter.apk"></a></div>
          <!-- <div id='openApp'>ceshiewfew</div> -->
      </div>


  </div>
  <div class="wtips" style="display:none">
  	<img src="resource/images/tips_weixin_ios.png"/>
  </div>
</body>
</html>
<script>


	function UrlParameters(){
	    var urlIndex=window.location.href.indexOf("?");
		if(urlIndex)
		{
		 var parameters=window.location.href.substring(urlIndex+1);
		 	return parameters;
		}
	}

  function openApp(urlParams) {
		var isrefresh = urlParams.indexOf("refresh=1"); // 获得refresh参数
		if(isrefresh !='undefined' && isrefresh >= 0) {
		 	return
		}
		// window.location.href = 'agt-nn://?TableKey='+key;
		// window.location.href = 'intent://mm.gamecenter.com?'+roomid;

		window.location.href = 'intent://invit.gamecenter.com?'+urlParams;
		window.setTimeout(function () {
		     window.location.href += '&refresh=1' //附加一个特殊参数，用来标识这次刷新不要再调用myapp:// 了
		}, 500);
  }


  $(document).ready(function () {
	  // $('body').css({ "width": $(window).width(), "height": $(window).height() ,"overflow": "hidden"});
	  $('.wz>p').css("font-size", $(window).width() * 0.86 * 0.66 * 0.1);
	  // $('.xiazai').css("padding-top",$(window).width()*0.45);
	  // $('.xiazai_az a,.xiazai_ios a').css({ "width": $('.xiazai').width()*0.70, "height": $('.xiazai').width()*0.70/3 });


	  /*
	       * 智能机浏览器版本信息:
	       */
	  var browser = {
	      versions: function () {
	          var u = navigator.userAgent, app = navigator.appVersion;
	          return {
	              trident: u.indexOf('Trident') > -1, //IE内核
	              presto: u.indexOf('Presto') > -1, //opera内核
	              webKit: u.indexOf('AppleWebKit') > -1, //苹果、谷歌内核
	              gecko: u.indexOf('Gecko') > -1 && u.indexOf('KHTML') == -1, //火狐内核
	              mobile: !!u.match(/AppleWebKit.*Mobile.*/) || !!u.match(/AppleWebKit/), //是否为移动终端
	              ios: !!u.match(/\(i[^;]+;( U;)? CPU.+Mac OS X/), //ios终端
	              android: u.indexOf('Android') > -1 || u.indexOf('Linux') > -1, //android终端或者uc浏览器
	              iPhone: u.indexOf('iPhone') > -1 || u.indexOf('Mac') > -1, //是否为iPhone或者QQHD浏览器
	              iPad: u.indexOf('iPad') > -1, //是否iPad
	              weixin: u.match(/MicroMessenger/i), //微信浏览器
                  webApp: u.indexOf('Safari') == -1,  //是否web应该程序，没有头部与底部
	              zhifubao: u.match(/AlipayClient/i)
	          };
	      }(),
	      language: (navigator.browserLanguage || navigator.language).toLowerCase()
	  };

	  if (browser.versions.weixin||browser.versions.zhifubao) {
	  	if(browser.versions.ios||browser.versions.iphone||browser.versions.ipad){
	  		$('.wtips img').attr("src","resource/images/tips_weixin_ios.png");
	  		$('.wtips').show();
	  	}else{
	  		$('.wtips img').attr("src","resource/images/tips_weixin_android.png");
	  		$('.wtips').show();
	  	}
	  }else{
		  if(browser.versions.android){
			  var urlParams = UrlParameters();
			  if(typeof urlParams!="undefined" && urlParams != ''){
			  	openApp(urlParams);
			  }
		  	$('.xiazai_az').show();
		  }
		  else if(browser.versions.ios||browser.versions.iphone||browser.versions.ipad){
			  var urlParams = UrlParameters();
              var isrefresh = urlParams.indexOf("refresh=1"); // 获得refresh参数
              if(isrefresh !='undefined' && isrefresh >= 0) {
                $('.xiazai_ios').show();
                    return
              }
			  if(typeof urlParams!="undefined" && urlParams != ''){
                   window.location.href = 'invitgamecentercom://?'+urlParams;
                   window.setTimeout(function () {
                        window.location.href += '&refresh=1' //附加一个特殊参数，用来标识这次刷新不要再调用myapp:// 了
                   }, 3000);
			  }



		  }
		  else{
		  	$('.xiazai_az').show();
		  }
		}
  });
</script>

<?php endif;?>


