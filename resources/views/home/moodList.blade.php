<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>风宇个人博客</title>
</head>

<link href="//cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="{{asset('css/common.css')}}"/>
<link rel="stylesheet" type="text/css" href="{{asset('css/moodList.css')}}"/>
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
				<!--<span class="w_slogan">百度一下,你就知道</span>-->
				<span class="w_header_nav">
					<ul>
						<li><a href="index.html">首页</a></li>
						<li><a href="about.html">关于</a></li>
						<li><a href="article.html">成长</a></li>
						<li><a href="">学习</a></li>
						<li><a href="">娱乐</a></li>
						<li><a href=""  class="active">说说</a></li>
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
				  <li class="active">说说</li>
				  <span class="w_navbar_tip">删删写写，回回忆忆，虽无法行云流水，却也可碎言碎语</span>
				</ol>
					

			<div class="bloglist">
				
			    <ul class="arrow_box">
			     <div class="sy">
			     <img src="{{asset('img/slider/bb.jpg')}}">
			      <p> 我希望我的爱情是这样的，相濡以沫，举案齐眉，平淡如水。</p>
			     </div>
		      	<!--<p class="bloglist_count"><span class="count"><i class="glyphicon glyphicon-user"></i><a href="#">admin</a></span> <span class="count"><i class="glyphicon glyphicon-eye-open"></i>阅读:22</span><span class="count"><i class="glyphicon glyphicon-comment"></i>评论:0</span></p>-->
			      <span class="dateview">2017-02-07</span>
			    </ul>
			    
			    <ul class="arrow_box">
			         <div class="sy">
			      		<p> 我希望我的爱情是这样的，相濡以沫，举案齐眉，平淡如水。我在岁月中找到他，依靠他，将一生交付给他。做他的妻子，他孩子的母亲，为他做饭，洗衣服，缝一颗掉了的纽扣。然后，我们一起在时光中变老。</p>
			        </div>
			        <!--<p class="bloglist_count"><span class="count"><i class="glyphicon glyphicon-user"></i><a href="#">admin</a></span> <span class="count"><i class="glyphicon glyphicon-eye-open"></i>阅读:88</span><span class="count"><i class="glyphicon glyphicon-comment"></i>评论:2</span></p>-->
			      <span class="dateview">2017-02-01</span>
			    </ul>
			    
			    <ul class="arrow_box">
			         <div class="sy">
			      <img src="{{asset('img/slider/slide3.jpg')}}">
			      <p> 我希望我的爱情是这样的，相濡以沫，举案齐眉，平淡如水。我在岁月中找到他，依靠他，将一生交付给他。做他的妻子，他孩子的母亲，为他做饭，洗衣服，缝一颗掉了的纽扣。然后，我们一起在时光中变老。</p>
			        </div>
			        <!--<p class="bloglist_count"><span class="count"><i class="glyphicon glyphicon-user"></i><a href="#">admin</a></span> <span class="count"><i class="glyphicon glyphicon-eye-open"></i>阅读:100</span><span class="count"><i class="glyphicon glyphicon-comment"></i>评论:0</span></p>-->
			        <span class="dateview">2017-01-28</span>
			    </ul>
			    
			    <ul class="arrow_box">
			         <div class="sy">
			      		<p> 我希望我的爱情是这样的，相濡以沫，举案齐眉，平淡如水。我在岁月中找到他，依靠他，将一生交付给他。做他的妻子，他孩子的母亲，为他做饭，洗衣服，缝一颗掉了的纽扣。然后，我们一起在时光中变老。</p>
			        </div>
			        <!--<p class="bloglist_count"><span class="count"><i class="glyphicon glyphicon-user"></i><a href="#">admin</a></span> <span class="count"><i class="glyphicon glyphicon-eye-open"></i>阅读:10</span><span class="count"><i class="glyphicon glyphicon-comment"></i>评论:1</span></p>-->
			      <span class="dateview">2017-01-01</span>
			    </ul>
			    
			    <ul class="arrow_box">
			         <div class="sy">
			      <img src="{{asset('img/slider/001.png')}}">
			      <p> 我希望我的爱情是这样的，相濡以沫，举案齐眉，平淡如水。我在岁月中找到他，依靠他，将一生交付给他。做他的妻子，他孩子的母亲，为他做饭，洗衣服，缝一颗掉了的纽扣。然后，我们一起在时光中变老。</p>
			        </div>
			        <!--<p class="bloglist_count"><span class="count"><i class="glyphicon glyphicon-user"></i><a href="#">admin</a></span> <span class="count"><i class="glyphicon glyphicon-eye-open"></i>阅读:1003</span><span class="count"><i class="glyphicon glyphicon-comment"></i>评论:8</span></p>-->
			        <span class="dateview">2016-12-25</span>
			    </ul>
			    
			    <ul class="arrow_box">
			     <div class="sy">
			     <img src="{{asset('img/slider/bb.jpg')}}">
			      <p> 我希望我的爱情是这样的，相濡以沫，举案齐眉，平淡如水。</p>
			     </div>
		      	<!--<p class="bloglist_count"><span class="count"><i class="glyphicon glyphicon-user"></i><a href="#">admin</a></span> <span class="count"><i class="glyphicon glyphicon-eye-open"></i>阅读:22</span><span class="count"><i class="glyphicon glyphicon-comment"></i>评论:0</span></p>-->
			      <span class="dateview">2017-02-07</span>
			    </ul>
			    
			    <ul class="arrow_box">
			         <div class="sy">
			      		<p> 我希望我的爱情是这样的，相濡以沫，举案齐眉，平淡如水。我在岁月中找到他，依靠他，将一生交付给他。做他的妻子，他孩子的母亲，为他做饭，洗衣服，缝一颗掉了的纽扣。然后，我们一起在时光中变老。</p>
			        </div>
			        <!--<p class="bloglist_count"><span class="count"><i class="glyphicon glyphicon-user"></i><a href="#">admin</a></span> <span class="count"><i class="glyphicon glyphicon-eye-open"></i>阅读:88</span><span class="count"><i class="glyphicon glyphicon-comment"></i>评论:2</span></p>-->
			      <span class="dateview">2017-02-01</span>
			    </ul>
			    
			    <ul class="arrow_box">
			         <div class="sy">
			      <img src="{{asset('img/slider/slide3.jpg')}}">
			      <p> 我希望我的爱情是这样的，相濡以沫，举案齐眉，平淡如水。我在岁月中找到他，依靠他，将一生交付给他。做他的妻子，他孩子的母亲，为他做饭，洗衣服，缝一颗掉了的纽扣。然后，我们一起在时光中变老。</p>
			        </div>
			        <!--<p class="bloglist_count"><span class="count"><i class="glyphicon glyphicon-user"></i><a href="#">admin</a></span> <span class="count"><i class="glyphicon glyphicon-eye-open"></i>阅读:100</span><span class="count"><i class="glyphicon glyphicon-comment"></i>评论:0</span></p>-->
			        <span class="dateview">2017-01-28</span>
			    </ul>
			    
			    <ul class="arrow_box">
			         <div class="sy">
			      		<p> 我希望我的爱情是这样的，相濡以沫，举案齐眉，平淡如水。我在岁月中找到他，依靠他，将一生交付给他。做他的妻子，他孩子的母亲，为他做饭，洗衣服，缝一颗掉了的纽扣。然后，我们一起在时光中变老。</p>
			        </div>
			        <!--<p class="bloglist_count"><span class="count"><i class="glyphicon glyphicon-user"></i><a href="#">admin</a></span> <span class="count"><i class="glyphicon glyphicon-eye-open"></i>阅读:10</span><span class="count"><i class="glyphicon glyphicon-comment"></i>评论:1</span></p>-->
			      <span class="dateview">2017-01-01</span>
			    </ul>
			    
			    <ul class="arrow_box">
			         <div class="sy">
			      <img src="{{asset('img/slider/001.png')}}">
			      <p> 我希望我的爱情是这样的，相濡以沫，举案齐眉，平淡如水。我在岁月中找到他，依靠他，将一生交付给他。做他的妻子，他孩子的母亲，为他做饭，洗衣服，缝一颗掉了的纽扣。然后，我们一起在时光中变老。</p>
			        </div>
			        <!--<p class="bloglist_count"><span class="count"><i class="glyphicon glyphicon-user"></i><a href="#">admin</a></span> <span class="count"><i class="glyphicon glyphicon-eye-open"></i>阅读:1003</span><span class="count"><i class="glyphicon glyphicon-comment"></i>评论:8</span></p>-->
			        <span class="dateview">2016-12-25</span>
			    </ul>
			    
			    
			    <ul class="arrow_box">
			     <div class="sy">
			     <img src="{{asset('img/slider/bb.jpg')}}">
			      <p> 我希望我的爱情是这样的，相濡以沫，举案齐眉，平淡如水。</p>
			     </div>
		      	<!--<p class="bloglist_count"><span class="count"><i class="glyphicon glyphicon-user"></i><a href="#">admin</a></span> <span class="count"><i class="glyphicon glyphicon-eye-open"></i>阅读:22</span><span class="count"><i class="glyphicon glyphicon-comment"></i>评论:0</span></p>-->
			      <span class="dateview">2017-02-07</span>
			    </ul>
			    
			    <ul class="arrow_box">
			         <div class="sy">
			      		<p> 我希望我的爱情是这样的，相濡以沫，举案齐眉，平淡如水。我在岁月中找到他，依靠他，将一生交付给他。做他的妻子，他孩子的母亲，为他做饭，洗衣服，缝一颗掉了的纽扣。然后，我们一起在时光中变老。</p>
			        </div>
			        <!--<p class="bloglist_count"><span class="count"><i class="glyphicon glyphicon-user"></i><a href="#">admin</a></span> <span class="count"><i class="glyphicon glyphicon-eye-open"></i>阅读:88</span><span class="count"><i class="glyphicon glyphicon-comment"></i>评论:2</span></p>-->
			      <span class="dateview">2017-02-01</span>
			    </ul>
			    
			    <ul class="arrow_box">
			         <div class="sy">
			      <img src="{{asset('img/slider/slide3.jpg')}}">
			      <p> 我希望我的爱情是这样的，相濡以沫，举案齐眉，平淡如水。我在岁月中找到他，依靠他，将一生交付给他。做他的妻子，他孩子的母亲，为他做饭，洗衣服，缝一颗掉了的纽扣。然后，我们一起在时光中变老。</p>
			        </div>
			        <!--<p class="bloglist_count"><span class="count"><i class="glyphicon glyphicon-user"></i><a href="#">admin</a></span> <span class="count"><i class="glyphicon glyphicon-eye-open"></i>阅读:100</span><span class="count"><i class="glyphicon glyphicon-comment"></i>评论:0</span></p>-->
			        <span class="dateview">2017-01-28</span>
			    </ul>
			    
			    <ul class="arrow_box">
			         <div class="sy">
			      		<p> 我希望我的爱情是这样的，相濡以沫，举案齐眉，平淡如水。我在岁月中找到他，依靠他，将一生交付给他。做他的妻子，他孩子的母亲，为他做饭，洗衣服，缝一颗掉了的纽扣。然后，我们一起在时光中变老。</p>
			        </div>
			        <!--<p class="bloglist_count"><span class="count"><i class="glyphicon glyphicon-user"></i><a href="#">admin</a></span> <span class="count"><i class="glyphicon glyphicon-eye-open"></i>阅读:10</span><span class="count"><i class="glyphicon glyphicon-comment"></i>评论:1</span></p>-->
			      <span class="dateview">2017-01-01</span>
			    </ul>
			    
			    <ul class="arrow_box">
			         <div class="sy">
			      <img src="{{asset('img/slider/001.png')}}">
			      <p> 我希望我的爱情是这样的，相濡以沫，举案齐眉，平淡如水。我在岁月中找到他，依靠他，将一生交付给他。做他的妻子，他孩子的母亲，为他做饭，洗衣服，缝一颗掉了的纽扣。然后，我们一起在时光中变老。</p>
			        </div>
			        <!--<p class="bloglist_count"><span class="count"><i class="glyphicon glyphicon-user"></i><a href="#">admin</a></span> <span class="count"><i class="glyphicon glyphicon-eye-open"></i>阅读:1003</span><span class="count"><i class="glyphicon glyphicon-comment"></i>评论:8</span></p>-->
			        <span class="dateview">2016-12-25</span>
			    </ul>
			    
			    
			    <ul class="arrow_box">
			     <div class="sy">
			     <img src="{{asset('img/slider/bb.jpg')}}">
			      <p> 我希望我的爱情是这样的，相濡以沫，举案齐眉，平淡如水。</p>
			     </div>
		      	<!--<p class="bloglist_count"><span class="count"><i class="glyphicon glyphicon-user"></i><a href="#">admin</a></span> <span class="count"><i class="glyphicon glyphicon-eye-open"></i>阅读:22</span><span class="count"><i class="glyphicon glyphicon-comment"></i>评论:0</span></p>-->
			      <span class="dateview">2017-02-07</span>
			    </ul>
			    
			    <ul class="arrow_box">
			         <div class="sy">
			      		<p> 我希望我的爱情是这样的，相濡以沫，举案齐眉，平淡如水。我在岁月中找到他，依靠他，将一生交付给他。做他的妻子，他孩子的母亲，为他做饭，洗衣服，缝一颗掉了的纽扣。然后，我们一起在时光中变老。</p>
			        </div>
			        <!--<p class="bloglist_count"><span class="count"><i class="glyphicon glyphicon-user"></i><a href="#">admin</a></span> <span class="count"><i class="glyphicon glyphicon-eye-open"></i>阅读:88</span><span class="count"><i class="glyphicon glyphicon-comment"></i>评论:2</span></p>-->
			      <span class="dateview">2017-02-01</span>
			    </ul>
			    
			    <ul class="arrow_box">
			         <div class="sy">
			      <img src="{{asset('img/slider/slide3.jpg')}}">
			      <p> 我希望我的爱情是这样的，相濡以沫，举案齐眉，平淡如水。我在岁月中找到他，依靠他，将一生交付给他。做他的妻子，他孩子的母亲，为他做饭，洗衣服，缝一颗掉了的纽扣。然后，我们一起在时光中变老。</p>
			        </div>
			        <!--<p class="bloglist_count"><span class="count"><i class="glyphicon glyphicon-user"></i><a href="#">admin</a></span> <span class="count"><i class="glyphicon glyphicon-eye-open"></i>阅读:100</span><span class="count"><i class="glyphicon glyphicon-comment"></i>评论:0</span></p>-->
			        <span class="dateview">2017-01-28</span>
			    </ul>
			    
			    <ul class="arrow_box">
			         <div class="sy">
			      		<p> 我希望我的爱情是这样的，相濡以沫，举案齐眉，平淡如水。我在岁月中找到他，依靠他，将一生交付给他。做他的妻子，他孩子的母亲，为他做饭，洗衣服，缝一颗掉了的纽扣。然后，我们一起在时光中变老。</p>
			        </div>
			        <!--<p class="bloglist_count"><span class="count"><i class="glyphicon glyphicon-user"></i><a href="#">admin</a></span> <span class="count"><i class="glyphicon glyphicon-eye-open"></i>阅读:10</span><span class="count"><i class="glyphicon glyphicon-comment"></i>评论:1</span></p>-->
			      <span class="dateview">2017-01-01</span>
			    </ul>
			    
			    <ul class="arrow_box">
			         <div class="sy">
			      <img src="{{asset('img/slider/001.png')}}">
			      <p> 我希望我的爱情是这样的，相濡以沫，举案齐眉，平淡如水。我在岁月中找到他，依靠他，将一生交付给他。做他的妻子，他孩子的母亲，为他做饭，洗衣服，缝一颗掉了的纽扣。然后，我们一起在时光中变老。</p>
			        </div>
			        <!--<p class="bloglist_count"><span class="count"><i class="glyphicon glyphicon-user"></i><a href="#">admin</a></span> <span class="count"><i class="glyphicon glyphicon-eye-open"></i>阅读:1003</span><span class="count"><i class="glyphicon glyphicon-comment"></i>评论:8</span></p>-->
			        <span class="dateview">2016-12-25</span>
			    </ul>
			    
		  </div>
		  
			
			<div id="page">
				
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