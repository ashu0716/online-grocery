<?php
ob_start();
include("connections.php");

session_start();
$uname=$_SESSION['uname'];
$clint=$_SESSION['clint_id'];

if($uname==NULL & $clint==NULL)
{	
	header("location:login.php");
}



$bid=$_GET['bid'];
?>
<html>
<head>
<?php
		$select_brand_title="select * from brand where bid='$bid' ";
$result_brand_title=mysqli_query($conn, $select_brand_title)or die(mysqli_error($conn));
$row_brand_title=mysqli_fetch_array($result_brand_title);
			  		?>
<title><?php echo $row_brand_title['bname']; ?> Products</title>
<?php
$select_logo="select * from logo where lstatus='Active' ";
$result_logo=mysqli_query($conn, $select_logo)or die(mysqli_error($conn));
$row_logo=mysqli_fetch_array($result_logo);
?>
<link rel="icon"  href="life/logo_images_upload/<?php echo $row_logo['limage']; ?>">
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<script type="text/javascript">(window.NREUM||(NREUM={})).loader_config={xpid:"VwUDU1NRGwADUlRWBgk="};window.NREUM||(NREUM={}),__nr_require=function(t,e,n){function r(n){if(!e[n]){var o=e[n]={exports:{}};t[n][0].call(o.exports,function(e){var o=t[n][1][e];return r(o||e)},o,o.exports)}return e[n].exports}if("function"==typeof __nr_require)return __nr_require;for(var o=0;o<n.length;o++)r(n[o]);return r}({1:[function(t,e,n){function r(t){try{c.console&&console.log(t)}catch(e){}}var o,i=t("ee"),a=t(12),c={};try{o=localStorage.getItem("__nr_flags").split(","),console&&"function"==typeof console.log&&(c.console=!0,o.indexOf("dev")!==-1&&(c.dev=!0),o.indexOf("nr_dev")!==-1&&(c.nrDev=!0))}catch(s){}c.nrDev&&i.on("internal-error",function(t){r(t.stack)}),c.dev&&i.on("fn-err",function(t,e,n){r(n.stack)}),c.dev&&(r("NR AGENT IN DEVELOPMENT MODE"),r("flags: "+a(c,function(t,e){return t}).join(", ")))},{}],2:[function(t,e,n){function r(t,e,n,r,o){try{d?d-=1:i("err",[o||new UncaughtException(t,e,n)])}catch(c){try{i("ierr",[c,(new Date).getTime(),!0])}catch(s){}}return"function"==typeof f&&f.apply(this,a(arguments))}function UncaughtException(t,e,n){this.message=t||"Uncaught error with no additional information",this.sourceURL=e,this.line=n}function o(t){i("err",[t,(new Date).getTime()])}var i=t("handle"),a=t(13),c=t("ee"),s=t("loader"),f=window.onerror,u=!1,d=0;s.features.err=!0,t(1),window.onerror=r;try{throw new Error}catch(l){"stack"in l&&(t(5),t(4),"addEventListener"in window&&t(3),s.xhrWrappable&&t(6),u=!0)}c.on("fn-start",function(t,e,n){u&&(d+=1)}),c.on("fn-err",function(t,e,n){u&&(this.thrown=!0,o(n))}),c.on("fn-end",function(){u&&!this.thrown&&d>0&&(d-=1)}),c.on("internal-error",function(t){i("ierr",[t,(new Date).getTime(),!0])})},{}],3:[function(t,e,n){function r(t){for(var e=t;e&&!e.hasOwnProperty(u);)e=Object.getPrototypeOf(e);e&&o(e)}function o(t){c.inPlace(t,[u,d],"-",i)}function i(t,e){return t[1]}var a=t("ee").get("events"),c=t(14)(a,!0),s=t("gos"),f=XMLHttpRequest,u="addEventListener",d="removeEventListener";e.exports=a,"getPrototypeOf"in Object?(r(document),r(window),r(f.prototype)):f.prototype.hasOwnProperty(u)&&(o(window),o(f.prototype)),a.on(u+"-start",function(t,e){var n=t[1],r=s(n,"nr@wrapped",function(){function t(){if("function"==typeof n.handleEvent)return n.handleEvent.apply(n,arguments)}var e={object:t,"function":n}[typeof n];return e?c(e,"fn-",null,e.name||"anonymous"):n});this.wrapped=t[1]=r}),a.on(d+"-start",function(t){t[1]=this.wrapped||t[1]})},{}],4:[function(t,e,n){var r=t("ee").get("raf"),o=t(14)(r),i="equestAnimationFrame";e.exports=r,o.inPlace(window,["r"+i,"mozR"+i,"webkitR"+i,"msR"+i],"raf-"),r.on("raf-start",function(t){t[0]=o(t[0],"fn-")})},{}],5:[function(t,e,n){function r(t,e,n){t[0]=a(t[0],"fn-",null,n)}function o(t,e,n){this.method=n,this.timerDuration="number"==typeof t[1]?t[1]:0,t[0]=a(t[0],"fn-",this,n)}var i=t("ee").get("timer"),a=t(14)(i),c="setTimeout",s="setInterval",f="clearTimeout",u="-start",d="-";e.exports=i,a.inPlace(window,[c,"setImmediate"],c+d),a.inPlace(window,[s],s+d),a.inPlace(window,[f,"clearImmediate"],f+d),i.on(s+u,r),i.on(c+u,o)},{}],6:[function(t,e,n){function r(t,e){d.inPlace(e,["onreadystatechange"],"fn-",c)}function o(){var t=this,e=u.context(t);t.readyState>3&&!e.resolved&&(e.resolved=!0,u.emit("xhr-resolved",[],t)),d.inPlace(t,v,"fn-",c)}function i(t){y.push(t),h&&(w=-w,b.data=w)}function a(){for(var t=0;t<y.length;t++)r([],y[t]);y.length&&(y=[])}function c(t,e){return e}function s(t,e){for(var n in t)e[n]=t[n];return e}t(3);var f=t("ee"),u=f.get("xhr"),d=t(14)(u),l=NREUM.o,p=l.XHR,h=l.MO,m="readystatechange",v=["onload","onerror","onabort","onloadstart","onloadend","onprogress","ontimeout"],y=[];e.exports=u;var g=window.XMLHttpRequest=function(t){var e=new p(t);try{u.emit("new-xhr",[e],e),e.addEventListener(m,o,!1)}catch(n){try{u.emit("internal-error",[n])}catch(r){}}return e};if(s(p,g),g.prototype=p.prototype,d.inPlace(g.prototype,["open","send"],"-xhr-",c),u.on("send-xhr-start",function(t,e){r(t,e),i(e)}),u.on("open-xhr-start",r),h){var w=1,b=document.createTextNode(w);new h(a).observe(b,{characterData:!0})}else f.on("fn-end",function(t){t[0]&&t[0].type===m||a()})},{}],7:[function(t,e,n){function r(t){var e=this.params,n=this.metrics;if(!this.ended){this.ended=!0;for(var r=0;r<d;r++)t.removeEventListener(u[r],this.listener,!1);if(!e.aborted){if(n.duration=(new Date).getTime()-this.startTime,4===t.readyState){e.status=t.status;var i=o(t,this.lastSize);if(i&&(n.rxSize=i),this.sameOrigin){var a=t.getResponseHeader("X-NewRelic-App-Data");a&&(e.cat=a.split(", ").pop())}}else e.status=0;n.cbTime=this.cbTime,f.emit("xhr-done",[t],t),c("xhr",[e,n,this.startTime])}}}function o(t,e){var n=t.responseType;if("json"===n&&null!==e)return e;var r="arraybuffer"===n||"blob"===n||"json"===n?t.response:t.responseText;return h(r)}function i(t,e){var n=s(e),r=t.params;r.host=n.hostname+":"+n.port,r.pathname=n.pathname,t.sameOrigin=n.sameOrigin}var a=t("loader");if(a.xhrWrappable){var c=t("handle"),s=t(8),f=t("ee"),u=["load","error","abort","timeout"],d=u.length,l=t("id"),p=t(11),h=t(10),m=window.XMLHttpRequest;a.features.xhr=!0,t(6),f.on("new-xhr",function(t){var e=this;e.totalCbs=0,e.called=0,e.cbTime=0,e.end=r,e.ended=!1,e.xhrGuids={},e.lastSize=null,p&&(p>34||p<10)||window.opera||t.addEventListener("progress",function(t){e.lastSize=t.loaded},!1)}),f.on("open-xhr-start",function(t){this.params={method:t[0]},i(this,t[1]),this.metrics={}}),f.on("open-xhr-end",function(t,e){"loader_config"in NREUM&&"xpid"in NREUM.loader_config&&this.sameOrigin&&e.setRequestHeader("X-NewRelic-ID",NREUM.loader_config.xpid)}),f.on("send-xhr-start",function(t,e){var n=this.metrics,r=t[0],o=this;if(n&&r){var i=h(r);i&&(n.txSize=i)}this.startTime=(new Date).getTime(),this.listener=function(t){try{"abort"===t.type&&(o.params.aborted=!0),("load"!==t.type||o.called===o.totalCbs&&(o.onloadCalled||"function"!=typeof e.onload))&&o.end(e)}catch(n){try{f.emit("internal-error",[n])}catch(r){}}};for(var a=0;a<d;a++)e.addEventListener(u[a],this.listener,!1)}),f.on("xhr-cb-time",function(t,e,n){this.cbTime+=t,e?this.onloadCalled=!0:this.called+=1,this.called!==this.totalCbs||!this.onloadCalled&&"function"==typeof n.onload||this.end(n)}),f.on("xhr-load-added",function(t,e){var n=""+l(t)+!!e;this.xhrGuids&&!this.xhrGuids[n]&&(this.xhrGuids[n]=!0,this.totalCbs+=1)}),f.on("xhr-load-removed",function(t,e){var n=""+l(t)+!!e;this.xhrGuids&&this.xhrGuids[n]&&(delete this.xhrGuids[n],this.totalCbs-=1)}),f.on("addEventListener-end",function(t,e){e instanceof m&&"load"===t[0]&&f.emit("xhr-load-added",[t[1],t[2]],e)}),f.on("removeEventListener-end",function(t,e){e instanceof m&&"load"===t[0]&&f.emit("xhr-load-removed",[t[1],t[2]],e)}),f.on("fn-start",function(t,e,n){e instanceof m&&("onload"===n&&(this.onload=!0),("load"===(t[0]&&t[0].type)||this.onload)&&(this.xhrCbStart=(new Date).getTime()))}),f.on("fn-end",function(t,e){this.xhrCbStart&&f.emit("xhr-cb-time",[(new Date).getTime()-this.xhrCbStart,this.onload,e],e)})}},{}],8:[function(t,e,n){e.exports=function(t){var e=document.createElement("a"),n=window.location,r={};e.href=t,r.port=e.port;var o=e.href.split("://");!r.port&&o[1]&&(r.port=o[1].split("/")[0].split("@").pop().split(":")[1]),r.port&&"0"!==r.port||(r.port="https"===o[0]?"443":"80"),r.hostname=e.hostname||n.hostname,r.pathname=e.pathname,r.protocol=o[0],"/"!==r.pathname.charAt(0)&&(r.pathname="/"+r.pathname);var i=!e.protocol||":"===e.protocol||e.protocol===n.protocol,a=e.hostname===document.domain&&e.port===n.port;return r.sameOrigin=i&&(!e.hostname||a),r}},{}],9:[function(t,e,n){function r(){}function o(t,e,n){return function(){return i(t,[(new Date).getTime()].concat(c(arguments)),e?null:this,n),e?void 0:this}}var i=t("handle"),a=t(12),c=t(13),s=t("ee").get("tracer"),f=NREUM;"undefined"==typeof window.newrelic&&(newrelic=f);var u=["setPageViewName","setCustomAttribute","setErrorHandler","finished","addToTrace","inlineHit"],d="api-",l=d+"ixn-";a(u,function(t,e){f[e]=o(d+e,!0,"api")}),f.addPageAction=o(d+"addPageAction",!0),f.setCurrentRouteName=o(d+"routeName",!0),e.exports=newrelic,f.interaction=function(){return(new r).get()};var p=r.prototype={createTracer:function(t,e){var n={},r=this,o="function"==typeof e;return i(l+"tracer",[Date.now(),t,n],r),function(){if(s.emit((o?"":"no-")+"fn-start",[Date.now(),r,o],n),o)try{return e.apply(this,arguments)}finally{s.emit("fn-end",[Date.now()],n)}}}};a("setName,setAttribute,save,ignore,onEnd,getContext,end,get".split(","),function(t,e){p[e]=o(l+e)}),newrelic.noticeError=function(t){"string"==typeof t&&(t=new Error(t)),i("err",[t,(new Date).getTime()])}},{}],10:[function(t,e,n){e.exports=function(t){if("string"==typeof t&&t.length)return t.length;if("object"==typeof t){if("undefined"!=typeof ArrayBuffer&&t instanceof ArrayBuffer&&t.byteLength)return t.byteLength;if("undefined"!=typeof Blob&&t instanceof Blob&&t.size)return t.size;if(!("undefined"!=typeof FormData&&t instanceof FormData))try{return JSON.stringify(t).length}catch(e){return}}}},{}],11:[function(t,e,n){var r=0,o=navigator.userAgent.match(/Firefox[\/\s](\d+\.\d+)/);o&&(r=+o[1]),e.exports=r},{}],12:[function(t,e,n){function r(t,e){var n=[],r="",i=0;for(r in t)o.call(t,r)&&(n[i]=e(r,t[r]),i+=1);return n}var o=Object.prototype.hasOwnProperty;e.exports=r},{}],13:[function(t,e,n){function r(t,e,n){e||(e=0),"undefined"==typeof n&&(n=t?t.length:0);for(var r=-1,o=n-e||0,i=Array(o<0?0:o);++r<o;)i[r]=t[e+r];return i}e.exports=r},{}],14:[function(t,e,n){function r(t){return!(t&&t instanceof Function&&t.apply&&!t[a])}var o=t("ee"),i=t(13),a="nr@original",c=Object.prototype.hasOwnProperty,s=!1;e.exports=function(t,e){function n(t,e,n,o){function nrWrapper(){var r,a,c,s;try{a=this,r=i(arguments),c="function"==typeof n?n(r,a):n||{}}catch(f){l([f,"",[r,a,o],c])}u(e+"start",[r,a,o],c);try{return s=t.apply(a,r)}catch(d){throw u(e+"err",[r,a,d],c),d}finally{u(e+"end",[r,a,s],c)}}return r(t)?t:(e||(e=""),nrWrapper[a]=t,d(t,nrWrapper),nrWrapper)}function f(t,e,o,i){o||(o="");var a,c,s,f="-"===o.charAt(0);for(s=0;s<e.length;s++)c=e[s],a=t[c],r(a)||(t[c]=n(a,f?c+o:o,i,c))}function u(n,r,o){if(!s||e){var i=s;s=!0;try{t.emit(n,r,o)}catch(a){l([a,n,r,o])}s=i}}function d(t,e){if(Object.defineProperty&&Object.keys)try{var n=Object.keys(t);return n.forEach(function(n){Object.defineProperty(e,n,{get:function(){return t[n]},set:function(e){return t[n]=e,e}})}),e}catch(r){l([r])}for(var o in t)c.call(t,o)&&(e[o]=t[o]);return e}function l(e){try{t.emit("internal-error",e)}catch(n){}}return t||(t=o),n.inPlace=f,n.flag=a,n}},{}],ee:[function(t,e,n){function r(){}function o(t){function e(t){return t&&t instanceof r?t:t?s(t,c,i):i()}function n(n,r,o){if(!l.aborted){t&&t(n,r,o);for(var i=e(o),a=h(n),c=a.length,s=0;s<c;s++)a[s].apply(i,r);var f=u[g[n]];return f&&f.push([w,n,r,i]),i}}function p(t,e){y[t]=h(t).concat(e)}function h(t){return y[t]||[]}function m(t){return d[t]=d[t]||o(n)}function v(t,e){f(t,function(t,n){e=e||"feature",g[n]=e,e in u||(u[e]=[])})}var y={},g={},w={on:p,emit:n,get:m,listeners:h,context:e,buffer:v,abort:a,aborted:!1};return w}function i(){return new r}function a(){(u.api||u.feature)&&(l.aborted=!0,u=l.backlog={})}var c="nr@context",s=t("gos"),f=t(12),u={},d={},l=e.exports=o();l.backlog=u},{}],gos:[function(t,e,n){function r(t,e,n){if(o.call(t,e))return t[e];var r=n();if(Object.defineProperty&&Object.keys)try{return Object.defineProperty(t,e,{value:r,writable:!0,enumerable:!1}),r}catch(i){}return t[e]=r,r}var o=Object.prototype.hasOwnProperty;e.exports=r},{}],handle:[function(t,e,n){function r(t,e,n,r){o.buffer([t],r),o.emit(t,e,n)}var o=t("ee").get("handle");e.exports=r,r.ee=o},{}],id:[function(t,e,n){function r(t){var e=typeof t;return!t||"object"!==e&&"function"!==e?-1:t===window?0:a(t,i,function(){return o++})}var o=1,i="nr@id",a=t("gos");e.exports=r},{}],loader:[function(t,e,n){function r(){if(!b++){var t=w.info=NREUM.info,e=d.getElementsByTagName("script")[0];if(setTimeout(f.abort,3e4),!(t&&t.licenseKey&&t.applicationID&&e))return f.abort();s(y,function(e,n){t[e]||(t[e]=n)}),c("mark",["onload",a()],null,"api");var n=d.createElement("script");n.src="https://"+t.agent,e.parentNode.insertBefore(n,e)}}function o(){"complete"===d.readyState&&i()}function i(){c("mark",["domContent",a()],null,"api")}function a(){return(new Date).getTime()}var c=t("handle"),s=t(12),f=t("ee"),u=window,d=u.document,l="addEventListener",p="attachEvent",h=u.XMLHttpRequest,m=h&&h.prototype;NREUM.o={ST:setTimeout,CT:clearTimeout,XHR:h,REQ:u.Request,EV:u.Event,PR:u.Promise,MO:u.MutationObserver},t(9);var v=""+location,y={beacon:"bam.nr-data.net",errorBeacon:"bam.nr-data.net",agent:"js-agent.newrelic.com/nr-998.min.js"},g=h&&m&&m[l]&&!/CriOS/.test(navigator.userAgent),w=e.exports={offset:a(),origin:v,features:{},xhrWrappable:g};d[l]?(d[l]("DOMContentLoaded",i,!1),u[l]("load",r,!1)):(d[p]("onreadystatechange",o),u[p]("onload",r)),c("mark",["firstbyte",a()],null,"api");var b=0},{}]},{},["loader",2,7]);</script>
<meta name="keywords" content="Grocery Store Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design">
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<link href="css\bootstrap.css" rel="stylesheet" type="text/css" media="all">
<link href="css\style.css" rel="stylesheet" type="text/css" media="all">
<!-- font-awesome icons -->
<link href="css\font-awesome.css" rel="stylesheet" type="text/css" media="all">
<!-- //font-awesome icons -->
<!-- js -->
<script src="js\jquery-1.11.1.min.js"></script>
<!-- //js -->
<link href='//fonts.googleapis.com/css?family=Ubuntu:400,300,300italic,400italic,500,500italic,700,700italic' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<!-- start-smoth-scrolling -->
<script type="text/javascript" src="js\move-top.js"></script>
<script type="text/javascript" src="js\easing.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){		
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script>
<!-- start-smoth-scrolling -->

</head>

<body>
<script src='//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js'></script><script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
ga('create', 'UA-30027142-1', 'w3layouts.com');
  ga('send', 'pageview');
</script> 
<script async type='text/javascript' src='//cdn.fancybar.net/ac/fancybar.js?zoneid=1502&serve=C6ADVKE&placement=w3layouts' id='_fancybar_js'></script>
<style type='text/css'>  
.adsense_fixed{position:fixed;bottom:-8px;width:100%;z-index:999999999999;}.adsense_content{width:720px;margin:0 auto;position:relative;background:#fff;}.adsense_btn_close,.adsense_btn_info{font-size:12px;color:#fff;height:20px;width:20px;vertical-align:middle;text-align:center;background:#000;top:4px;left:4px;position:absolute;z-index:99999999;font-family:Georgia;cursor:pointer;line-height:18px}.adsense_btn_info{left:26px;font-family:Georgia;font-style:italic}.adsense_info_content{display:none;width:260px;height:340px;position:absolute;top:-360px;background:rgba(255,255,255,.9);font-size:14px;padding:20px;font-family:Arial;border-radius:4px;-webkit-box-shadow:0 1px 26px -2px rgba(0,0,0,.3);-moz-box-shadow:0 1px 26px -2px rgba(0,0,0,.3);box-shadow:0 1px 26px -2px rgba(0,0,0,.3)}.adsense_info_content:after{content:'';position:absolute;left:25px;top:100%;width:0;height:0;border-left:10px solid transparent;border-right:10px solid transparent;border-top:10px solid #fff;clear:both}.adsense_info_content #adsense_h3{color:#000;margin:0;font-size:18px!important;font-family:'Arial'!important;margin-bottom:20px!important;}.adsense_info_content .adsense_p{color:#888;font-size:13px!important;line-height:20px;font-family:'Arial'!important;margin-bottom:20px!important;}.adsense_fh5co-team{color:#000;font-style:italic;}
</style>
<script>

    $(function() {
      $('.adsense_btn_close').click(function() {
        $(this).closest('.adsense_fixed').css('display', 'none');
      });

      $('.adsense_btn_info').click(function() {
        if ($('.adsense_info_content').is(':visible')) {
          $('.adsense_info_content').css('display', 'none');
        } else {
          $('.adsense_info_content').css('display', 'block');
        }
      });

    });

  </script>
<body>

<!-- header -->
<?php
	include("headers.php");
?>
<!-- End header --> 

<!-- script-for sticky-nav --> 
<script>
	$(document).ready(function() {
		 var navoffeset=$(".agileits_header").offset().top;
		 $(window).scroll(function(){
			var scrollpos=$(window).scrollTop(); 
			if(scrollpos >=navoffeset){
				$(".agileits_header").addClass("fixed");
			}else{
				$(".agileits_header").removeClass("fixed");
			}
		 });
		 
	});
	</script> 
<!-- //script-for sticky-nav -->
<div class="logo_products">
  <div class="container">
    <div class="w3ls_logo_products_left">
      <h1><a href="indexs.php"><img style="border:0px solid red;" width="145" height="111" src="life/logo_images_upload/<?php echo $row_logo['limage']; ?>"></a></h1>
    </div>
    <div class="w3ls_logo_products_left1">
      <ul class="special_items">
        <li><a href="all_products.php">Products</a><i>/</i></li>
        <li><a href="abouts.php">About Us</a><i>/</i></li>
        <li><a href="best_deals.php">Best Deals</a><i>/</i></li>
        <li><a href="services.php">Services</a></li>
      </ul>
    </div>
    <?php
                    $select_shop_details="select * from shop_details ";
					$result_shop_details=mysqli_query($conn, $select_shop_details)or die(mysqli_error($conn));
					$row_shop_details=mysqli_fetch_array($result_shop_details)
					?>
    <div class="w3ls_logo_products_left1">
      <ul class="phone_email">
        <li><i class="fa fa-phone" aria-hidden="true"></i><?php echo $row_shop_details['s_d_ph']; ?></li>
        <li><i class="fa fa-envelope-o" aria-hidden="true"></i><a href="mailto:<?php echo $row_shop_details['s_d_email']; ?>"> <?php echo $row_shop_details['s_d_email']; ?></a></li>
      </ul>
    </div>
    <div class="clearfix"> </div>
  </div>
</div>
<!-- //header --> 
<!-- products-breadcrumb -->
<div class="products-breadcrumb">
  <div class="container">
    <ul>
      <li><i class="fa fa-home" aria-hidden="true"></i><a href="indexs.php">Home</a><span>|</span></li>
      <li style="color:#FFF;"> <a href=""><?php echo $row_brand_title['bname']; ?></a> </li>
    </ul>
  </div>
</div>
<!-- //products-breadcrumb --> 
<!---728x90---> 
<!-- banner -->
<div class="banner">
  <div class="w3l_banner_nav_left">
    <nav class="navbar nav_bottom"> 
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header nav_2">
        <button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      </div>
      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
        <ul class="nav navbar-nav nav_1">
          <?php
$select="select * from category ORDER BY cname;";
$result=mysqli_query($select)or die(mysqli_error($conn));
while($row=mysqli_fetch_array($result))
{
?>
          <li class="dropdown mega-dropdown active"> <a href="<?php echo $row['cname'];?>s.php" class="dropdown-toggle" data-toggle="dropdown"> <?php echo $row['cname'];?><span class="caret"></span></a>
            <div class="dropdown-menu mega-dropdown-menu w3ls_vegetables_menu">
              <?php
			  $cname=$row['cname'];
						$select1="select * from sub_category INNER JOIN category ON category.cid=sub_category.cid where cname='$cname' order by s_cname ";
								$result1=mysqli_query($conn,$select1)or die(mysqli_error($conn));
								while($row1=mysqli_fetch_array($result1))
								{
								?>
              <div class="w3ls_vegetables">
                <ul>
                  <li><a href="products.php?s_cid=<?php echo $row1['s_cid']; ?>"><?php echo $row1['s_cname']; ?></a></li>
                </ul>
              </div>
              <?php
								}
							?>
            </div>
          </li>
          <?php
								}
							?>
        </ul>
      </div>
      <!-- /.navbar-collapse --> 
    </nav>
  </div>
  <div class="w3l_banner_nav_right"> 
    
    <!---728x90---><!---728x90--->
    <div class="w3ls_w3l_banner_nav_right_grid" id="focus">
      <?php
		$select_brand="select * from brand where bid='$bid' ";
$result_brand=mysqli_query($conn, $select_brand)or die(mysqli_error($conn));
$row_brand=mysqli_fetch_array($result_brand);
$bname=$row_brand['bname'];

			  		?>
      <br>
      <h3><?php echo $row_brand['bname']; ?> Products</h3>
      <div class="w3ls_w3l_banner_nav_right_grid1">
        <?php
                    $select_product="select * from product INNER JOIN brand ON brand.bid=product.bid  INNER JOIN sub_category ON sub_category.s_cid=product.s_cid INNER JOIN category ON sub_category.cid=category.cid where bname='$bname' ";
					$query_product=mysqli_query($conn,$select_product)or die(mysqli_error($conn));
					while($fetch_product=mysqli_fetch_array($query_product))
										{		
					$dis=$fetch_product['dis'];
	$p=1;
	if( $dis < $p )
	{	
					?>
        <div class="col-md-3 w3ls_w3l_banner_left" style="border:0px solid red; margin-bottom:30px;">
          <div class="hover14 column">
            <div class="agile_top_brand_left_grid w3l_agile_top_brand_left_grid">
              <div class="agile_top_brand_left_grid1">
                <figure>
                  <div class="snipcart-item block">
                    <div class="snipcart-thumb"> <a href="singles.php?pid=<?php echo $fetch_product['pid']; ?>"><img style="height:180px;" title="" alt="" src="life\product_images_upload\<?php echo $fetch_product['pimage']; ?>"  class="img-responsive"></a>
                      <p style="height:65px; border:0px solid red; "><?php echo $fetch_product['pname']; ?></p>
                      <h4 style="border:0px solid red; width:100%;">₹<?php echo $fetch_product['oprice']; ?></h4>
                    </div>
                    <div class="snipcart-details top_brand_home_details">
                      <form action="" method="post" >
                      <fieldset>
                        <input type="hidden" name="add" value="1">
                        <?php
                        $qty=$fetch_product['pqty'];
						$q=0;
						if( $qty > $q )
                        {
                        ?>
                        <style>
						#addtocart
						{
							background-color:#84C639;
						}
						#addtocart:hover
						{
							background-color:#006600;
						}
						</style>
                        <a href="add_to_carts.php?crt_id=<?php  echo $pid=$fetch_product['pid']; ?>">
                        <input id="addtocart" type="button" name="cart" value="Add To Cart" class="button" >
                        </a>
                        <?php
                        }
                        else
                        {
                        ?>
                        <style>
						#outofstock
						{
							background-color:#FF0000;
						}
						#outofstock:hover
						{
							background-color:#FF8484;
						}
						</style>
                        <input id="outofstock" type="button" name="cart" value="Out Of Stock" class="button" >
                        <?php
                        }
                        ?>
                      </fieldset>
                    </form>
                    </div>
                  </div>
                </figure>
              </div>
            </div>
          </div>
        </div>
        <?php
	}
	else
	{
		?>
        <div class="col-md-3 w3ls_w3l_banner_left" style="border:0px solid red; margin-bottom:30px;">
          <div class="hover14 column">
            <div class="agile_top_brand_left_grid w3l_agile_top_brand_left_grid">
              <div class="agile_top_brand_left_grid_pos"> <img src="images\offer.png" alt=" " class="img-responsive"> </div>
              <div class="agile_top_brand_left_grid1">
                <figure>
                  <div class="snipcart-item block">
                    <div class="snipcart-thumb"> <a href="singles.php?pid=<?php echo $fetch_product['pid']; ?>"><img style="height:180px;" title="" alt="" src="life\product_images_upload\<?php echo $fetch_product['pimage']; ?>"  class="img-responsive"></a>
                      <p style="height:65px; border:0px solid red; "><?php echo $fetch_product['pname']; ?></p>
                      <h4 style="border:0px solid red; width:100%;">₹<?php echo $fetch_product['oprice']; ?><span>₹<?php echo $fetch_product['price']; ?></span><span class="blink_me" style="border:0px solid red; float:right; display:inline-block; color:red; font-weight:900; text-decoration:none;"><?php echo $fetch_product['dis']; ?>% off&nbsp;&nbsp;&nbsp;&nbsp;</span></h4>
                    </div>
                    <div class="snipcart-details top_brand_home_details">
                      <form action="" method="post" >
                      <fieldset>
                        <input type="hidden" name="add" value="1">
                        <?php
                        $qty=$fetch_product['pqty'];
						$q=0;
						if( $qty > $q )
                        {
                        ?>
                        <style>
						#addtocart
						{
							background-color:#84C639;
						}
						#addtocart:hover
						{
							background-color:#006600;
						}
						</style>
                        <a href="add_to_carts.php?crt_id=<?php  echo $pid=$fetch_product['pid']; ?>">
                        <input id="addtocart" type="button" name="cart" value="Add To Cart" class="button" >
                        </a>
                        <?php
                        }
                        else
                        {
                        ?>
                        <style>
						#outofstock
						{
							background-color:#FF0000;
						}
						#outofstock:hover
						{
							background-color:#FF8484;
						}
						</style>
                        <input id="outofstock" type="button" name="cart" value="Out Of Stock" class="button" >
                        <?php
                        }
                        ?>
                      </fieldset>
                    </form>
                    </div>
                  </div>
                </figure>
              </div>
            </div>
          </div>
        </div>
        <?php
}
}
?>
        <div class="clearfix"> </div>
      </div>
    </div>
  </div>
  <div class="clearfix"></div>
</div>
<!-- //banner --> 

<!-- footer -->
<?php 
	include("footers.php");
 ?>
<!-- //footer --> 

<!-- Bootstrap Core JavaScript --> 
<script src="js\bootstrap.min.js"></script> 
<script>
$(document).ready(function(){
    $(".dropdown").hover(            
        function() {
            $('.dropdown-menu', this).stop( true, true ).slideDown("fast");
            $(this).toggleClass('open');        
        },
        function() {
            $('.dropdown-menu', this).stop( true, true ).slideUp("fast");
            $(this).toggleClass('open');       
        }
    );
});
</script> 
<!-- here stars scrolling icon --> 
<script type="text/javascript">
		$(document).ready(function() {
			/*
				var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
				};
			*/
								
			$().UItoTop({ easingType: 'easeOutQuart' });
								
			});
	</script> 
<!-- //here ends scrolling icon --> 
<script src="js\minicart.min.js"></script> 
<script>
	// Mini Cart
	paypal.minicart.render({
		action: '#'
	});

	if (~window.location.search.indexOf('reset=true')) {
		paypal.minicart.reset();
	}
</script> 
<script type="text/javascript">window.NREUM||(NREUM={});NREUM.info={"beacon":"bam.nr-data.net","licenseKey":"26612e640c","applicationID":"3365418","transactionName":"NVVXMUVWVkMHBRUPXgwfYBdeGFxVCwkSSVgMVFAdGUdQQA==","queueTime":0,"applicationTime":1,"atts":"GRJURw1MRU0=","errorBeacon":"bam.nr-data.net","agent":""}</script>
</body>
</body>
</html>
<?php
ob_flush();
?>