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