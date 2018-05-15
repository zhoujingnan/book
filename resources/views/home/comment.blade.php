<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>{{$n_data['net_title']}}</title>
</head>

<link href="//cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="{{asset('css/common.css')}}"/>

<link href="logo.ico" rel="shortcut icon"/>
<script src="//cdn.bootcss.com/jquery/3.1.1/jquery.min.js"></script>
<script src="//cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript" src="{{asset('plugin/jquery.page.js')}}"></script>
<script src="{{asset('js/common.js')}}"></script>
<script src="{{asset('js/jquery-1.8.3.js')}}"></script>
<!--<script src="js/snowy.js"></script>-->



<body>
	<div class="w_header">
		<div class="container">
			
		</div>
	</div>
	<div class="w_container">
		<div class="container">
			<div class="row w_main_row">
				<ol class="breadcrumb w_breadcrumb">
				  <li><a href="javascript:void(0)" id="go">返回</a></li>
				  <li><a href="{{url('/')}}">首页</a></li>
				  <li class="active">评论</li>
				  <span class="w_navbar_tip">你，生命中最重要的过客，之所以是过客，因为你未曾为我停留。</span>
				</ol>
				
				<div class="col-lg-9 col-md-9 w_main_left">
					
					<div class="panel-body">
						<h4>
							<span style="font-weight: bold;">
								{{$b_data['b_title']}}
							</span>&nbsp;&nbsp;&nbsp;&nbsp;
							<span>{{$b_data['author']}}</span>
						</h4>
						<p>
						</p>
						<p class="overView">
							简介：{{$b_data['desc']}}
						</p>
					</div>
					<div>
						<div id="pl">
							<textarea title="{{$b_data['b_id']}}" id="p" cols="30" rows="2"></textarea>
							<button class="c_sub">提交</button>
						</div>
						<div>
							@foreach($c_data as $k => $v)
								<p>
									<p>
									{{$v['num']}}楼 {{$v['m_name']}} 评论：</p>
									<p style="width: 400px;text-indent: 8em">{{$v['content']}}
									<br>
									<p class="r_con" style="width: 400px;margin-left: 150px;"></p>
									<button id="{{$v['c_id']}}" class="reply">回复</button>	
									@if($v['user']==1)
									<button id="{{$v['c_id']}}" class="del">删除</button>								
									@endif									
									</p>
									
								</p>
							@endforeach
						</div>
					</div>
					
				</div>
				<div class="col-lg-3 col-md-3 w_main_right">
					<img src="{{asset('img/slider/aboutphoto.png')}}" />
				</div>			
			</div>
		</div>
	</div>
</body>
<script>
	$(function(){
		//返回
		$(document).on('click','#go',function(){
			history.go(-1);
		})
		//评论
		$(document).on('click','.c_sub',function(){
			var p = $("#p").val();
			var b_id = $('#p').attr('title');
			$.ajax({
	            type:'get',
	            data:{p:p,b_id:b_id},
	            url:"<?php echo url('homeindex/commentDo')?>",
	            success:function(msg){
		            if(msg==1){
		            	alert("评论成功");
		            	location.reload();
		            }
	            }
	        })
		})
		//回复
		$(document).on('click','.reply',function(){
			$('r_con').empty();
			var obj = $(this);
			var r_con = obj.prev();
			var c_id = obj.attr('id');
			r_con.html("<textarea title='"+c_id+"' id='r_p' cols='20' rows='2'></textarea><button class='r_sub'>提交</button><button class='gb'>关闭</button")
			$.ajax({
	            type:'get',
	            data:{c_id:c_id},
	            url:"<?php echo url('homeindex/reply')?>",
	            success:function(msg){
		            if(msg['success']==0){
		            	r_con.append("暂无回复")
		            }else{
		            	var str = "";
		            	$(msg['data']).each(function(i,k){
		            		str += "<p><p>"+k.m_name+" 回复：</p><p style='width: 400px;text-indent: 8em'>"+k.content;
		            		str += "</p></p>";		
		            	})
		            	r_con.append(str)
		            }
	            }
	        })
		})
		$(document).on('click','.r_sub',function(){
			var obj = $(this);
			var r_p = obj.prev().val();
			var c_id = obj.prev().attr('title');
			$.ajax({
	            type:'get',
	            data:{r_p:r_p,c_id:c_id},
	            url:"<?php echo url('homeindex/replyDo')?>",
	            success:function(msg){
		            if(msg==1){
		            	alert("回复成功");
		            	location.reload();
		            }
	            }
	        })
		})
		$(document).on('click','.gb',function(){
			$(this).parent().empty()
		})
		//删除
		$(document).on('click','.del',function(){
			var obj = $(this);
			var c_id = obj.attr('id');
			$.ajax({
	            type:'get',
	            data:{c_id:c_id},
	            url:"<?php echo url('homeindex/c_del')?>",
	            success:function(msg){
		            if(msg==1){
		            	location.reload();
		            }
	            }
	        })
		})
	})
</script>
</html>




