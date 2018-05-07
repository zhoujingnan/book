<!DOCTYPE html>
<html>

	<head>
		<meta charset="UTF-8">
		<title>风宇个人博客</title>
	</head>

	<link href="plugin/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/common.css" />
	<link href="logo.ico" rel="shortcut icon" />
	<script src="plugin/jquery.min.js"></script>
	<script src="plugin/bootstrap/js/bootstrap.min.js"></script>
	<!--<script type="text/javascript" src="plugin/jquery.page.js"></script>-->
	<!--<script src="js/common.js"></script>-->
	<!--<script src="js/snowy.js"></script>-->

	<body>
		<div class="w_header">
			<div class="container">
				<div class="w_header_top">
					<!-- <a href="#" class="w_logo"></a> -->
					<span class="w_header_nav">
					<!-- <ul>
						<li><a href="" class="active">首页</a></li>
						<li><a href="{{url('homeindex/about')}}">关于</a></li>
						<li><a href="{{url('homeindex/article')}}">成长</a></li>
						<li><a href="">学习</a></li>
						<li><a href="">娱乐</a></li>
						<li><a href="{{url('homeindex/moodList')}}">说说</a></li>
						<li><a href="{{url('homeindex/comment')}}">留言</a></li>
					</ul> -->
					<ul>
						@foreach($arr as $key =>$val)
						<li><a href="{{url('homecate/index',['cate_id'=>$val['cate_id']])}}">
							{{$val['cate_name']}}
						</a></li>
						@endforeach
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
					<div class="col-lg-9 col-md-9 w_main_left">
						<!--滚动图开始-->
						<div class="panel panel-default">

							<div id="w_carousel" class="carousel slide w_carousel" data-ride="carousel">
							
								<ol class="carousel-indicators">
									<li data-target="#w_carousel" data-slide-to="0" class="active"></li>
									<li data-target="#w_carousel" data-slide-to="1"></li>
									<li data-target="#w_carousel" data-slide-to="2"></li>
									<li data-target="#w_carousel" data-slide-to="3"></li>
								</ol>

								
								<div class="carousel-inner" role="listbox">
									<div class="item active">
										<img src="img/slider/slide1.jpg" alt="...">
										<div class="carousel-caption">
											<h3>First slide label</h3>
											<p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
										</div>
									</div>
									<div class="item">
										<img src="img/slider/slide2.jpg" alt="...">
										<div class="carousel-caption">...</div>
									</div>
									<div class="item">
										<img src="img/slider/slide3.jpg" alt="...">
										<div class="carousel-caption">...</div>
									</div>
									<div class="item">
										<img src="img/slider/slide4.jpg" alt="...">
										<div class="carousel-caption">...</div>
									</div>
								</div>

								
								<a class="left carousel-control" href="#w_carousel" role="button" data-slide="prev">
									<span class="glyphicon glyphicon-chevron-left"></span>
									<span class="sr-only">Previous</span>
								</a>
								<a class="right carousel-control" href="#w_carousel" role="button" data-slide="next">
									<span class="glyphicon glyphicon-chevron-right"></span>
									<span class="sr-only">Next</span>
								</a>
							</div>

						</div>
						<!-- 置顶开始 -->
						<!-- <div class="panel panel-default contenttop">
							<a href="article_detail.html">
								<strong>博主置顶</strong>
								<h3 class="title">嫁人就嫁程序员</h3>
								<p class="overView">个人网站正在建设中个人网站正在建设中个人网站正在建设中个人网站正在建设中个人网站正在建设中个人网站正在建设中个人网站正在建设中个人网站正在建设中个人网站正在建设中个人网站正在建设中。。。</p>
							</a>
						</div> -->
						<!-- 置顶结束 -->
						<div class="panel panel-default">
							<div class="panel-heading">
								<h3 class="panel-title">最新发布</h3>
							</div>

							<div class="panel-body">
<!-- 文章列表开始 -->
@foreach($book_data as $key =>$val)
<div class="contentList">
	<div class="panel panel-default">
		<div class="panel-body">
{{$val['b_id']}}
			<h4><a class="title" href="article_detail.html">{{$val['b_title']}}
				<span style="color:pink">&nbsp;&nbsp;&nbsp;&nbsp;{{$val['cate_name']}}</span>
			</a></h4>
			<p>
				<a class="label label-default">售价：{{$val['s_price']}}元</a>
				<a class="label label-default">借价：{{$val['b_price']}}元</a>
			</p>
			<p class="overView">
				{{substr($val['desc'],0,42)}}....
			</p>
			<p>
				<span class="count">
					<i class="glyphicon glyphicon-user"></i>
					<a href="#">{{$val['author']}}</a>
				</span> 
				<span class="count">
					<i class="glyphicon glyphicon-eye-open"></i>阅读:{{$val['read_num']}}
				</span>
				<span class="count">
					<i class="glyphicon glyphicon-comment"></i>评论:18
				</span>
				<span class="count">
					<i class="glyphicon glyphicon-time"></i>{{date("Y-m-d",$val['addtime'])}}
				</span>
				<?php if($member==''){ ?>
					<span class="count"><button>借书</button></span>
					<span class="count"><button>买书</button></span>
				<?php }else{ ?>
					<?php if($val['num']==0){ ?>
					<span>库存为零</span>
					<?php }else{ ?>
						<?php if(isset($val['type'])){ ?>
							<?php if($val['type']==0){ ?>
								<span class="count"><button>还书</button></span>
								<span class="count"><button>买书</button></span>
							<?php }elseif ($val['type']==1) { ?>	
								<span class="count">还书待审核</span>
								<span class="count"><button>买书</button></span>
							<?php }else{ ?>			
								<span class="count"><button>借书</button></span>
								<span class="count"><button>买书</button></span>	
							<?php } ?>	
						<?php }else{ ?>
							<span class="count"><button>借书</button></span>
							<span class="count"><button>买书</button></span>	
						<?php } ?>
					<?php } ?>				
				<?php } ?>
			</p>
		</div>
	</div>
</div>
@endforeach
<!--文章列表结束-->
							</div>
						</div>
					</div>

					<!--左侧开始-->
					<div class="col-lg-3 col-md-3 w_main_right">

						<div class="panel panel-default sitetip">
							<a href="article_detail.html">
								<strong>站点公告</strong>
								<h3 class="title">嫁人就嫁程序员</h3>
								<p class="overView">个人网站正在建设中个人网站正在建设中个人网站正在建设中个人网站正在建设中个人网站正在建设中个人网站正在建设中个人网站正在建设中个人网站正在建设中个人网站正在建设中个人网站正在建设中。。。</p>
							</a>
						</div>

						<div class="panel panel-default">
							<div class="panel-heading">
								<h3 class="panel-title">热门标签</h3>
							</div>
							<div class="panel-body">
								<div class="labelList">
									<a class="label label-default">java</a>
									<a class="label label-default">tomcat负载均衡</a>
									<a class="label label-default">panel</a>
									<a class="label label-default" href="/tag/jQuery">jQuery</a>
									<a class="label label-default" href="/tag/jQuery选择器">jQuery选择器</a>
									<a class="label label-default" href="/tag/linux">linux</a>
									<a class="label label-default" href="/tag/Nginx">Nginx</a>
									<a class="label label-default" href="/tag/linux文件类型">linux文件类型</a>
									<a class="label label-default" href="/tag/chrome请求两次">chrome</a>
									<a class="label label-default" href="/tag/Redis">Redis</a>
									<a class="label label-default" href="/tag/spring">spring</a>
									<a class="label label-default" href="/tag/tomcat">tomcat</a>
									<a class="label label-default" href="/tag/SyntaxHighlighter">SyntaxHighlighter</a>
								</div>
							</div>
						</div>

						<div class="panel panel-default">
							<div class="panel-heading">
								<h3 class="panel-title">最新发布</h3>
							</div>
							<div class="panel-body">
								<ul class="list-unstyled sidebar">
									<li>
										<a href="/post/04928311">排序算法之冒泡排序 － java实现</a>
									</li>
									<li>
										<a href="/post/32097759">快速搭建基于二进制日志文件的 mysql 复制</a>
									</li>
									<li>
										<a href="/post/09196557">web 服务器负载均衡教程，快速搭建高可用服务器集群</a>
									</li>
									<li>
										<a href="/post/20654391">使用 redis 和 spring-session 实现 tomcat、glassfish 等 web 服务器集群 session 共享</a>
									</li>
									<li>
										<a href="/post/41501569">使用 Nginx 实现 tomcat、glassfish 等 web 服务器负载均衡</a>
									</li>
									<li>
										<a href="/post/89658700">mysql 复制（replication）基础概念和应用场景简介</a>
									</li>
									<li>
										<a href="/post/03088922">redis 单节点在 Linux 生产环境的安装和简单配置</a>
									</li>
									<li>
										<a href="/post/05203355">使用 jQuery 的 val() 方法来获取以及设置表单元素值</a>
									</li>
									<li>
										<a href="/post/03120718">使用 jQuery 的 removeProp() 方法来删除元素的特性（property）</a>
									</li>
									<li>
										<a href="/post/37454977">使用 jQuery 的 prop() 方法来获取以及设置元素的特性（property）</a>
									</li>
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
										<li>
											<a href="https://www.baidu.com/" target="_blank">百度</a>
										</li>
										<li>
											<a href="https://www.oschina.net/" target="_blank">开源中国</a>
										</li>
										<li>
											<a href="http://www.ulewo.com/" target="_blank">有乐网</a>
										</li>
										<li>
											<a href="http://www.sina.com.cn/" target="_blank">新浪网</a>
										</li>
										<li>
											<a href="http://www.qq.com/" target="_blank">腾讯网</a>
										</li>
									</ul>
								</div>
							</div>
						</div>

						<div class="panel panel-default">
							<div class="panel-heading">
								<h3 class="panel-title">关注微信公众号</h3>
							</div>
							<div class="panel-body">
								<img src="img/qrcode.jpg" style="height: 230.5px;width: 230.5px;" />
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
		<div class="w_foot">
			<div class="w_foot_copyright">Copyright &copy; 2017-2020, www.wfyvv.com. All Rights Reserved. <span>|</span>
				<a target="_blank" href="http://www.miitbeian.gov.cn/" rel="nofollow">皖ICP备17002922号</a>
			</div>
		</div>
	</body>
	<script type="text/javascript">
		var $backToTopEle = $('<a href="javascript:void(0)" class="Hui-iconfont toTop" title="返回顶部" alt="返回顶部" style="display:none">^</a>').appendTo($("body")).click(function() {
			$("html, body").animate({ scrollTop: 0 }, 120);
		});
		var backToTopFun = function() {
			var st = $(document).scrollTop(),
				winh = $(window).height();
			(st > 0) ? $backToTopEle.show(): $backToTopEle.hide();
			/*IE6下的定位*/
			if(!window.XMLHttpRequest) {
				$backToTopEle.css("top", st + winh - 166);
			}
		};

		$(function() {
			$(window).on("scroll", backToTopFun);
			backToTopFun();
		});
	</script>

</html>