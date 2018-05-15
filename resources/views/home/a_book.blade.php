@foreach($book_data as $key =>$val)
<div class="contentList">
	<div class="panel panel-default">
		<div class="panel-body">
{{$val['b_id']}}
			<h4><a class="title" href="javascript:void(0)" b_id="{{$val['b_id']}}">{{$val['b_title']}}
				<span style="color:pink">&nbsp;&nbsp;&nbsp;&nbsp;{{$val['cate_name']}}</span>
			</a></h4>
			<p>
				<a class="label label-default">借价：0元</a>
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
				<span class="count">
					@if($val['borrow']==0)
					<button class="a_borrow" num="{{$val['num']}}" b_id="{{$val['b_id']}}">借书</button>
					@else
					已借过
					@endif
				</span>
			</p>
		</div>
	</div>
</div>
@endforeach

	