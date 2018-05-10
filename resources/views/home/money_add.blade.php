<div class="panel-body">
	<form action="{{url('homemoney/add')}}" method="post">
		<input type="hidden" name="_token" value="{{csrf_token()}}">
		<input type="radio" name="type" value="1">支付宝
		<input type="radio" name="type" value="2">微信
		<input type="radio" name="type" value="3">银联
		<br>
		<?php foreach ($socre_data as $key => $val) {?>
			<input type="radio" name="money" value="{{$val['s_id']}}">{{$val['s_title']}}
		<?php } ?>
		<br>
		<input type="submit" value="充值">
	</form>
</div>