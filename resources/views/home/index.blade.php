<!DOCTYPE html>
<html>

	<head>
		
		<meta charset="UTF-8">
		<title>{{$n_data['net_title']}}</title>
		
	</head>
	<link rel="stylesheet" href="{{asset('css/jquery.bigautocomplete.css')}}" type="text/css" />
	<link href="plugin/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="{{asset('css/common.css')}}" />
	<link href="logo.ico" rel="shortcut icon" />
	<script src="{{asset('plugin/jquery.min.js')}}"></script>
	<script src="{{asset('plugin/bootstrap/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('jquery-1.8.3.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/jquery-1.8.2.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/jquery.bigautocomplete.js')}}"></script>	
	<!--<script type="text/javascript" src="plugin/jquery.page.js"></script>-->
	<!--<script src="js/common.js"></script>-->
	<!--<script src="js/snowy.js"></script>-->
<style>
	.bttn{    width: 43px;
    height: 31px;
    margin-top: 10px;
    font-size: 13px;}
</style>
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
						<input type="hidden" class="key">
						<li><a href="{{url('/')}}">
							首页
						</a></li>
						@foreach($arr as $key =>$val)
						<li><a cate_id="{{$val['cate_id']}}" href="javascript:void(0)" class="aaa">
							{{$val['cate_name']}}
						</a></li>
						@endforeach
					</ul>			

				</span>
					<!-- <div class="w_search">
						<div class="w_searchbox">
							<input type="text" placeholder="search" id="tt"/>
							<button>搜索</button>
						</div>
					</div> -->
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

								<!-- 轮播图开始 -->
								<div class="carousel-inner" role="listbox">

									<div class="item active">
										<img src="images/1525607601-3620.jpg" alt="...">
										<div class="carousel-caption">
										</div>
									</div>
									<?php foreach ($imgArr as $key => $val) {?>
									<div class="item">
										<img src="{{asset($val['img'])}}" alt="...">
										<div class="carousel-caption">...</div>
									</div>
									<?php } ?>
									<!-- <div class="item">
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
									</div>	 -->													
								</div>
								<!-- 轮播图结束 -->
								
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
<span class="tt">
@foreach($book_data as $key =>$val)
<div class="contentList">
	<div class="panel panel-default">
		<div class="panel-body">
{{$val['b_id']}}
			<h4><a class="title" href="javascript:void(0)" b_id="{{$val['b_id']}}">{{$val['b_title']}}
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
					<a href="{{url('homeindex/comment',['b_id'=>$val['b_id']])}}" class="comment"><i class="glyphicon glyphicon-comment"></i>评论
					</a>
				</span>
				<span class="count">
					<i class="glyphicon glyphicon-time"></i>{{date("Y-m-d",$val['addtime'])}}
				</span>
				<span class="collect" b_id="{{$val['b_id']}}">收藏</span>
				&nbsp;&nbsp;&nbsp;&nbsp;
				<?php if($member==''){ ?>
					<span class="count">
						<button class="aa" num="{{$val['num']}}" b_id="{{$val['b_id']}}">借书</button>
					</span>
					<span class="count">
						<button class="bb" num="{{$val['num']}}" b_id="{{$val['b_id']}}">买书</button>
					</span>
				<?php }else{ ?>
					<?php if($val['num']==0){ ?>
					<span>库存为零</span>
					<?php }else{ ?>
						<?php if(isset($val['type'])){ ?>
							<?php if($val['type']==0){ ?>
								<span class="count">
									<button class="aa" num="{{$val['num']}}" b_id="{{$val['b_id']}}">还书</button>
								</span>
								<span class="count">
									<button class="bb" num="{{$val['num']}}" b_id="{{$val['b_id']}}">买书</button>
								</span>
							<?php }elseif ($val['type']==1) { ?>	
								<span class="count">还书待审核</span>
								<span class="count">
									<button class="bb" num="{{$val['num']}}" b_id="{{$val['b_id']}}">买书</button>
								</span>
							<?php }else{ ?>			
								<span class="count">
									<button class="aa" num="{{$val['num']}}" b_id="{{$val['b_id']}}">借书</button>
								</span>
								<span class="count">
									<button class="bb" num="{{$val['num']}}" b_id="{{$val['b_id']}}">买书</button>
								</span>	
							<?php } ?>	
						<?php }else{ ?>
							<span class="count">
								<button class="aa" num="{{$val['num']}}" b_id="{{$val['b_id']}}">借书</button>
							</span>
							<span class="count">
								<button class="bb" num="{{$val['num']}}" b_id="{{$val['b_id']}}">买书</button>
							</span>	
						<?php } ?>
					<?php } ?>				
				<?php } ?>
			</p>
		</div>
	</div>
</div>
@endforeach

	<span class="span">
		<input type="hidden" name="page" value="{{$page}}">
		<input type="hidden" name="totalpage" value="{{$totalpage}}">
		<span>总条数:{{$count}}</span>&nbsp;&nbsp;&nbsp;&nbsp;
		<span>{{$page}}/{{$totalpage}}</span>
		<a href="javascript:void(0)" class="first">首页</a>
		<a href="javascript:void(0)" class="prev">上一页</a>
		<a href="javascript:void(0)" class="next">下一页</a>
	</span>
</span>
<script>
$(function(){
	//长尾词
	$("#tt").bigAutocomplete({width:254,data:<?php echo json_encode($str,JSON_UNESCAPED_UNICODE); ?>,callback:function(data){
				// alert(data.title);
				
			}});	
	//搜索
	$(document).on("click",".bttn",function(){
		ajaxPage(1)
	})

	//判断点击的页数
	$(document).on("click",".span a",function(){
		var page=parseInt($("[name='page']").val());
		var totalpage=parseInt($("[name='totalpage']").val());
		if($(this).is(".first")){
			p=1;
		}else if($(this).is('.prev')){
			p=page-1;
			if(p<1){p=1;}
		}else if($(this).is('.next')){
			p=page+1; 
			if(p>totalpage){p=totalpage}
		}
		// console.log(p)
		ajaxPage(p);
	})
	//分类搜索
	$(document).on("click",".aaa",function(){
		var cate_id=$(this).attr("cate_id");
		$(".key").val(cate_id);
		ajaxPage(1);
	})
	//分页
	function ajaxPage(p){
		var cate_id=$(".key").val();
		var book_title=$("#tt").val();
		$.ajax({
			type:'get',
			url:"{{url('homeindex/ajaxPage')}}",
			data:{page:p,cate_id:cate_id,b_title:book_title},
			success:function(arr){
				// console.log(arr);
				$(".tt").html(arr);
			}
		})
	}
	//判断
	$(document).on("click",".aa",function(){
		var b_id=$(this).attr("b_id");
		var num=$(this).attr("num");
		var html=$(this).html();
		if(html=="还书"){
			type=1;
		}else if(html=="借书")
		{
			type=0;
		}else if(html=="买书")
		{
			type=2;
		}
		// console.log(b_id);
		// console.log(num);
		$.ajax({
			type:'get',
			url:"<?php echo url('homeindex/addRead')?>",
			data:{b_id:b_id,num:num,type:type},
			success:function(msg){
				// console.log(msg);
				if(msg==1){
					history.go(0)
				}else if(msg==2){
					alert("每个用户只能借三本");
				}else if(msg==3){
					alert("账号审核中");
				}else if(msg==4){
					// alert("押金不足");
					if(confirm("押金不足，充值押金？")){
						$.ajax({
							type:"get",
							url:"{{url('homeindex/moneyAdd')}}",
							success:function(arr){
								console.log(arr)
								$(".tt").html(arr);
							}
						})
					}
				}
			}
		})
	})
	//收藏
	$(document).on("click",".collect",function(){
		var b_id=$(this).attr('b_id');
		$.ajax({
			type:'get',
			url:"{{url('homeindex/collect')}}",
			data:{b_id:b_id},
			success:function(msg){
				console.log(msg)
				if(msg==1){
					alert("您已收藏过了")
				}else if(msg==2){
					alert('收藏成功')
				}else if(msg==3){
					alert('收藏失败')
				}
			}
		})
	})
	//阅读记录
	$(document).on("click",".title",function(){
		var b_id=$(this).attr('b_id');
		$.ajax({
			type:'get',
			url:"{{url('homeindex/readLog')}}",
			data:{b_id:b_id},
			success:function(arr){
				$(".tt").empty();
				$(".tt").html(arr);
				// console.log(arr)
			}
		})
	})
	//买书
	$(document).on('click','.bb',function(){
		if(confirm("是否购买")){
			var obj = $(this);
			var num = obj.attr('num');
			var b_id = obj.attr('b_id');
			$.ajax({
		        type:'get',
		        data:{b_id:b_id,num:num},
		        url:"<?php echo url('homeindex/a_pay')?>",
		        success:function(msg){
		            if(msg==0){
		            	alert("该书已卖完");
		            }else if(msg==1){
		            	alert("购买成功");
		            }else if(msg==2){
		            	alert("购买失败");
		            }else if(msg==3){
		            	if(confirm("余额不足，请先充值")){
		            		$.ajax({
								type:"get",
								url:"{{url('homeindex/moneyAdd')}}",
								success:function(arr){
									console.log(arr)
									$(".tt").html(arr);
								}
							})
		            	}
		            }
		        }
		    })
		}
	})
})
</script>
<!--文章列表结束-->
							</div>
						</div>
					</div>

					<!--左侧开始-->
					<div class="col-lg-3 col-md-3 w_main_right">
<span class="bbtitle">
	
</span>
<div class="w_searchbox">
	<input type="text" placeholder="search" id="tt" style="width: 211px;height: 38px;margin-bottom: 10px;" />
	<button class="bttn">搜索</button>
</div>
						<div class="panel panel-default sitetip">
							<a href="javascript:void(0)">
								<strong>近期活动</strong>
								<h3 class="a_name"></h3>
								<h4 class="timespan"></h4>
								<p style="display:none;"><button class="active_t"></button></p>
							</a>
						</div>

						<div class="panel panel-default">
							<div class="panel-heading">
								<h3 class="panel-title">热门标签</h3>
							</div>
							<div class="panel-body">
								<div class="labelList">
									@foreach($arr as $key =>$val)
									<a cate_id="{{$val['cate_id']}}" href="javascript:void(0)" class="label label-default hot">
										{{$val['cate_name']}}
									</a>
									@endforeach									
									<!-- <a class="label label-default">java</a> -->
									<!-- <a class="label label-default">tomcat负载均衡</a>
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
									<a class="label label-default" href="/tag/SyntaxHighlighter">SyntaxHighlighter</a> -->
								</div>
							</div>
						</div>

						<div class="panel panel-default">
							<div class="panel-heading">
								<h3 class="panel-title">最新发布</h3>
							</div>
							<div class="panel-body">
								<ul class="list-unstyled sidebar">
									@foreach($book_data as $k => $val)
									<li>
										<a class="title" href="javascript:void(0)" b_id="{{$val['b_id']}}">{{$val['b_title']}}
											<span style="color:pink">&nbsp;&nbsp;&nbsp;&nbsp;{{$val['cate_name']}}</span>
										</a>
									</li>
									@endforeach
								</ul>
							</div>
						</div>

						<div class="panel panel-default">
							<div class="panel-heading">
								<h3 class="panel-title">关注微信小程序</h3>
							</div>
							<div class="panel-body">
								<img src="{{asset($n_data['net_er'])}}" style="height: 230.5px;width: 230.5px;" />
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
<!-- 活动开始 -->
<script type="text/javascript">
	$(function(){
		$.ajax({
            type:'get',
            url:"<?php echo url('homeindex/activeTime')?>",
            success:function(msg){
	            if(msg['success']==0){
	            	$('.timespan').html("暂无活动");
	            }else if(msg['success']==1){
	            	// 活动未开始
	            	$('.active_t').attr('id',msg['a_id']);
	            	$('.a_name').html(msg['name']);
	            	var starttime = msg['starttime']*1000;
	            	var endtime = msg['endtime']*1000;
	            	djs(starttime,endtime);
	            	
	            }else if(msg['success']==2){
	            	// 活动开始
	            	$('.active_t').attr('id',msg['a_id']);
	            	$('.a_name').html(msg['name']);
	            	var starttime = msg['starttime']*1000;
	            	var endtime = msg['endtime']*1000;
	            	djs(starttime,endtime);
	            }
            }
        })
        function djs(starttime,endtime){
        	setInterval(function () {
		    var nowtime = new Date();
		    var time = "";
		    var str = "";
		    if(starttime>nowtime){
		    	time = starttime - nowtime;
		    	str = "未开始";
		    }else if(starttime<nowtime<endtime){
		    	time = endtime - nowtime;
		    	str = "参加活动";
		    }
		    var day = parseInt(time / 1000 / 60 / 60 / 24);
		    var hour = parseInt(time / 1000 / 60 / 60 % 24);
		    var minute = parseInt(time / 1000 / 60 % 60);
		    var seconds = parseInt(time / 1000 % 60);
		    $('.active_t').parent().css('display','block')
		    if(time<0){
		    	$('.timespan').html("");
		    	$('.active_t').html("活动结束");
		    }else{
		    	$('.timespan').html(day + "天" + hour + "小时" + minute + "分钟" + seconds + "秒");
		    	$('.active_t').html(str);
		    }
		    
		  }, 1000);
        } 
        $(document).on("click",".active_t",function(){
        	var obj = $(this);
        	var id = obj.attr('id');
        	var price = obj.html();
        	if(price!="活动结束"){
        		$.ajax({
		            type:'get',
		            data:{id:id},
		            url:"<?php echo url('homeindex/b_active')?>",
		            success:function(msg){
			            $(".tt").html(msg);
		            }
		        })
        	}
        }) 
        $(document).on("click",".a_borrow",function(){
        	var price = $(".active_t").html();
        	var obj = $(this);
        	if(price=="未开始"){
        		alert("活动未开始");
        	}else if(price=="参加活动"){
        		var b_id = obj.attr('b_id');
        		$.ajax({
		            type:'get',
		            data:{b_id:b_id},
		            url:"<?php echo url('homeindex/a_borrow')?>",
		            success:function(msg){
			            if(msg==0){
			            	alert("超过借书最大限制");
			            }else if(msg==1){
			            	alert("成功");
			            }else if(msg==2){
			            	alert("成功");
			            	$(".active_t").html("已借过");
			            }else if(msg==4){
			            	alert("该书已借完")
			            }
		            }
		        })
        	}else if(price=="活动结束"){
        		alert("活动已结束");
        	}
        })   
        //分页
		function ajaxPage(p){
			var cate_id=$(".key").val();
			var book_title=$("#tt").val();
			$.ajax({
				type:'get',
				url:"{{url('homeindex/ajaxPage')}}",
				data:{page:p,cate_id:cate_id,b_title:book_title},
				success:function(arr){
					// console.log(arr);
					$(".tt").html(arr);
				}
			})
		}
	    //分类搜索
		$(document).on("click",".hot",function(){
			var cate_id=$(this).attr("cate_id");
			$(".key").val(cate_id);
			// alert(cate_id);
			ajaxPage(1);
		})
	})
</script>
<!-- 活动结束 -->
		<div class="w_foot">
			<div class="w_foot_copyright">
				<a target="_blank" href="{{$n_data['net_url']}}" rel="nofollow">{{$n_data['net_bei']}}</a>
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