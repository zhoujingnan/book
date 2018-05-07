<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>风宇个人博客</title>
</head>

<link href="//cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="{{asset('css/common.css')}}"/>
<link rel="stylesheet" type="text/css" href="{{asset('css/article.css')}}"/>
<link rel="stylesheet" href="{{asset('plugin/jquery.page.css')}}">
<link href="logo.ico" rel="shortcut icon"/>
<script src="//cdn.bootcss.com/jquery/3.1.1/jquery.min.js"></script>
<script src="//cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript" src="{{asset('plugin/jquery.page.js')}}"></script>
<script src="{{asset('js/common.js')}}"></script>
<!--<script src="js/snowy.js"></script>-->
<script type="text/javascript">
	
$(function(){
	$("#page").Page({
	  totalPages: 7,//分页总数
	  liNums: 5,//分页的数字按钮数(建议取奇数)
	  activeClass: 'activP', //active 类样式定义
	  callBack : function(page){
			//console.log(page)
	  }
  });
})
</script>

<body>
	<div class="w_header">
		<div class="container">
			<div class="w_header_top">
				<a href="#" class="w_logo"></a>
				<span class="w_header_nav">
					<ul>
						<li><a href="index.html">首页</a></li>
						<li><a href="about.html" >关于</a></li>
						<li><a href=""  class="active">成长</a></li>
						<li><a href="">学习</a></li>
						<li><a href="">娱乐</a></li>
						<li><a href="moodList.html">说说</a></li>
						<li><a href="comment.html">留言</a></li>
					</ul>
				</span>
				<div class="w_search">
					<div class="w_searchbox">
						<input type="text" placeholder="search" />
						<button>搜索</button>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="w_container">
		<div class="container">
			<div class="row w_main_row">
				
				<ol class="breadcrumb w_breadcrumb">
				  <li><a href="#">首页</a></li>
				  <li class="active">文章</li>
				  <span class="w_navbar_tip">我们长路漫漫，只因学无止境。</span>
				</ol>
				
				<div class="col-lg-9 col-md-9 w_main_left">
					<div class="panel panel-default">
					  <div class="panel-body contentList">
					  	
					  	<div class="panel panel-default w_article_item">
						  <div class="panel-body">
						    <div class="row">
							  <div class="col-xs-6 col-md-3">
							    <a href="#" class="thumbnail w_thumbnail">
							      <img src="{{asset('img/aticleview.png')}}" alt="...">
							    </a>
							  </div>
							
							  <h4 class="media-heading">
							  	<a class="title" href="article_detail.html">Media heading</a>
							  </h4>
							  <p><a class="label label-default">Nginx</a><a class="label label-default">tomcat负载均衡</a></p>
							  <p class="w_list_overview overView">个人博客网站正在建设中。。。。</p>
							  <p class="count_r"><span class="count"><i class="glyphicon glyphicon-user"></i><a href="#">admin</a></span> <span class="count"><i class="glyphicon glyphicon-eye-open"></i>阅读:1003</span><span class="count"><i class="glyphicon glyphicon-comment"></i>评论:2</span><span class="count"><i class="glyphicon glyphicon-time"></i>2017-01-16</span></p>
							</div>
						  </div>
						</div>
					  	
					    <div class="panel panel-default w_article_item">
						  <div class="panel-body">
						    <div class="row">
							  <div class="col-xs-6 col-md-3">
							    <a href="#" class="thumbnail w_thumbnail">
							      <img src="{{asset('img/w.jpg')}}" alt="...">
							    </a>
							  </div>
							  <h4 class="media-heading">
							  	<a class="title" href="article_detail.html">使用 Nginx 实现 tomcat、glassfish 等 web 服务器负载均衡</a>
							  </h4>
							  <p><a class="label label-default">Nginx</a><a class="label label-default">tomcat负载均衡</a></p>
							  <p class="w_list_overview overView">web服务器负载均衡简介web服务器负载均衡是指将多台可用单节点服务器组合成web服务器集群，然后通过负载均衡器将客户端请求均匀的转发到不同的单节点web服务器上，从而增加整个web服务器集群的吞吐量</p>
							  <p class="count_r"><span class="count"><i class="glyphicon glyphicon-user"></i><a href="#">admin</a></span> <span class="count"><i class="glyphicon glyphicon-eye-open"></i>阅读:1003</span><span class="count"><i class="glyphicon glyphicon-comment"></i>评论:2</span><span class="count"><i class="glyphicon glyphicon-time"></i>2017-01-16</span></p>
							</div>
						  </div>
						</div>
						
						<div class="panel panel-default w_article_item">
						  <div class="panel-body">
						    <div class="row">
							  <div class="col-xs-6 col-md-3">
							    <a href="#" class="thumbnail w_thumbnail">
							      <img src="{{asset('img/slider/67zmaej.png')}}" alt="...">
							    </a>
							  </div>
							  <h4 class="media-heading">
							  	<a class="title" href="article_detail.html">32位的UUID生成方法总结</a>
							  </h4>
							  <p><a class="label label-default">Nginx</a><a class="label label-default">tomcat负载均衡</a></p>
							  <p class="w_list_overview overView">在学习过程中，我们常常会用到ID，在学习过程中，我们常常会用到ID，那么有哪些常用的 ID 生成方式，你知道吗？通过 java.util.UUID（终态类）生成</p>
							  <p class="count_r"><span class="count"><i class="glyphicon glyphicon-user"></i><a href="#">admin</a></span> <span class="count"><i class="glyphicon glyphicon-eye-open"></i>阅读:1003</span><span class="count"><i class="glyphicon glyphicon-comment"></i>评论:2</span><span class="count"><i class="glyphicon glyphicon-time"></i>2017-01-16</span></p>
							</div>
						  </div>
						</div>
						
						<div class="panel panel-default w_article_item">
						  <div class="panel-body">
						  	
						    <div class="row">
							  <div class="col-xs-6 col-md-3">
							    <a href="#" class="thumbnail w_thumbnail">
							      <img src="{{asset('img/slider/Aj6bieY.jpg')}}" alt="...">
							    </a>
							  </div>
							  
							  <h4 class="media-heading">
							  	<a class="title" href="article_detail.html">使用 Nginx 实现 tomcat、glassfish 等 web 服务器负载均衡</a>
							  </h4>
							  <p><a class="label label-default">Nginx</a><a class="label label-default">tomcat负载均衡</a></p>
							  <p class="w_list_overview overView">web服务器负载均衡简介web服务器负载均衡是指将多台可用单节点服务器组合成web服务器集群，然后通过负载均衡器将客户端请求均匀的转发到不同的单节点web服务器上，从而增加整个web服务器集群的吞吐量</p>
							  <p class="count_r"><span class="count"><i class="glyphicon glyphicon-user"></i><a href="#">admin</a></span> <span class="count"><i class="glyphicon glyphicon-eye-open"></i>阅读:1003</span><span class="count"><i class="glyphicon glyphicon-comment"></i>评论:2</span><span class="count"><i class="glyphicon glyphicon-time"></i>2017-01-16</span></p>
							</div>
							
						  </div>
						</div>
						
						
						
						<div class="panel panel-default w_article_item">
							  <div class="panel-body">
									<div class="row">
										<div class="col-xs-6 col-md-3">
										    <a href="#" class="thumbnail w_thumbnail">
										      <img src="{{asset('img/aticleview.png')}}" alt="...">
										    </a>
										  </div>
										  
									    <h4  class="media-heading"><a class="title" href="article_detail.html">排序算法之冒泡排序 － java实现</a></h4>
									    <p><a class="label label-default">UUID</a><a class="label label-default">java</a></p>
									    <p class="overView">冒泡排序是非常经典的排序算法，其实现思路非常简单易懂。下面介绍冒泡排序的基本思想、java实现以及时间和空间复杂度等内容。注：以下排序规则为从小到大，待排序数据为int类型。1.冒泡排序基本思想冒泡排序的基本思路是将待排序的数据两两进行比较，如果第一个元素比第二个元素大，那么将第一个元素和第二个元素进行交换。由冒泡排序的...</p>
									    <p class="count_r"><span class="count"><i class="glyphicon glyphicon-user"></i><a href="#">admin</a></span> <span class="count"><i class="glyphicon glyphicon-eye-open"></i>阅读:666</span><span class="count"><i class="glyphicon glyphicon-comment"></i>评论:18</span><span class="count"><i class="glyphicon glyphicon-time"></i>2016-12-25</span></p>
									</div>
							  </div>
							</div>
						
						<div class="panel panel-default w_article_item">
						  <div class="panel-body">
						    <div class="row">
							  <div class="col-xs-6 col-md-3">
							    <a href="#" class="thumbnail w_thumbnail">
							      <img src="{{asset('img/slider/Aj6bieY.jpg')}}" alt="...">
							    </a>
							  </div>
							  <h4 class="media-heading">
							  	<a class="title" href="article_detail.html">使用 Nginx 实现 tomcat、glassfish 等 web 服务器负载均衡</a>
							  </h4>
							  <p><a class="label label-default">Nginx</a><a class="label label-default">tomcat负载均衡</a></p>
							  <p class="w_list_overview overView">web服务器负载均衡简介web服务器负载均衡是指将多台可用单节点服务器组合成web服务器集群，然后通过负载均衡器将客户端请求均匀的转发到不同的单节点web服务器上，从而增加整个web服务器集群的吞吐量</p>
							  <p class="count_r"><span class="count"><i class="glyphicon glyphicon-user"></i><a href="#">admin</a></span> <span class="count"><i class="glyphicon glyphicon-eye-open"></i>阅读:1003</span><span class="count"><i class="glyphicon glyphicon-comment"></i>评论:2</span><span class="count"><i class="glyphicon glyphicon-time"></i>2017-01-16</span></p>
							</div>
						  </div>
						</div>
						
						
						<!--<div class="page">
							<nav aria-label="Page navigation">
						  <ul class="pagination">
						    <li>
						      <a href="#" aria-label="Previous">
						        <span aria-hidden="true">&laquo;</span>
						      </a>
						    </li>
						    <li class="active"><a href="#">1</a></li>
						    <li><a href="#">2</a></li>
						    <li><a href="#">3</a></li>
						    <li><a href="#">4</a></li>
						    <li><a href="#">5</a></li>
						    <li>
						      <a href="#" aria-label="Next">
						        <span aria-hidden="true">&raquo;</span>
						      </a>
						    </li>
						  </ul>
						</nav>
						</div>-->
						<div id="page">
							
						</div>
						
						
					  </div>
					</div>
					
				</div>
				<div class="col-lg-3 col-md-3 w_main_right">
					
					<div class="panel panel-default">
					  <div class="panel-heading">
					    <h3 class="panel-title">最新发布</h3>
					  </div>
					  <div class="panel-body">
					    	<ul class="list-unstyled sidebar">				
								<li><a href="/post/04928311">排序算法之冒泡排序 － java实现</a></li>
								<li><a href="/post/32097759">快速搭建基于二进制日志文件的 mysql 复制</a></li>							
								<li><a href="/post/09196557">web 服务器负载均衡教程，快速搭建高可用服务器集群</a></li>							
								<li><a href="/post/20654391">使用 redis 和 spring-session 实现 tomcat、glassfish 等 web 服务器集群 session 共享</a></li>							
								<li><a href="/post/41501569">使用 Nginx 实现 tomcat、glassfish 等 web 服务器负载均衡</a></li>							
								<li><a href="/post/89658700">mysql 复制（replication）基础概念和应用场景简介</a></li>							
								<li><a href="/post/03088922">redis 单节点在 Linux 生产环境的安装和简单配置</a></li>							
								<li><a href="/post/05203355">使用 jQuery 的 val() 方法来获取以及设置表单元素值</a></li>							
								<li><a href="/post/03120718">使用 jQuery 的 removeProp() 方法来删除元素的特性（property）</a></li>							
								<li><a href="/post/37454977">使用 jQuery 的 prop() 方法来获取以及设置元素的特性（property）</a></li>							
						</ul>
					  </div>
					</div>
					
					<div class="panel panel-default">
					  <div class="panel-heading">
					    <h3 class="panel-title">友情链接</h3>
					  </div>
					  <div class="panel-body">
					    <div class="newContent">
					    	<ul class="list-unstyled sidebar shiplink">				
								<li><a href="https://www.baidu.com/" target="_blank">百度</a></li>
								<li><a href="https://www.oschina.net/" target="_blank">开源中国</a></li>							
								<li><a href="http://www.ulewo.com/" target="_blank">有乐网</a></li>							
								<li><a href="http://www.sina.com.cn/" target="_blank">新浪网</a></li>							
								<li><a href="http://www.qq.com/" target="_blank">腾讯网</a></li>							
							</ul>
					    </div>
					  </div>
					</div>
				</div>
			
			
			</div>
		</div>
	</div>
	<div class="w_foot">
		<!--<div class="w_foot_copyright">© 2015~2016 版权所有 | <a target="_blank" href="http://www.miitbeian.gov.cn/" rel="nofollow">京ICP备15010892号-1</a></div>-->
		<div class="w_foot_copyright">Copyright © 2017-2020, www.wfyvv.com. All Rights Reserved. </div>
	</div>
	<!--toTop-->
	<div id="shape">
		<div class="shapeColor">
			<div class="shapeFly">
			</div>
		</div>
	</div>
	<!--snow-->
	<!--<div class="snow-container"></div>-->
</body>
</html>