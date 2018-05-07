<tr>
    <td align="left" valign="top">
    
    <table width="100%" border="0" cellspacing="0" cellpadding="0" id="main-tab">
      <tr>
        <th align="center" valign="middle" class="borderright">会员名</th>
        <th align="center" valign="middle" class="borderright">图书名</th>
        <th align="center" valign="middle" class="borderright">类型</th>
        <th align="center" valign="middle" class="borderright">借阅/购买时间</th>
        <th align="center" valign="middle" class="borderright">借阅归还时间</th>
      </tr>
      @foreach($arr as $key =>$val)
      <tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
        <td align="center" valign="middle" class="borderright borderbottom">{{$val['m_name']}}</td>
        <td align="center" valign="middle" class="borderright borderbottom">{{$val['b_title']}}</td>
        <td align="center" valign="middle" class="borderright borderbottom">
        	@if($val['type']==1) 借书
			@else 买书
			@endif
        </td>
        <td align="center" valign="middle" class="borderright borderbottom">{{date("Y-m-d H:i:s",$val['addtime'])}}</td>
        <td align="center" valign="middle" class="borderright borderbottom">{{date("Y-m-d H:i:s",$val['endtime'])}}</td>
      </tr>
      @endforeach
    </table></td>
    </tr>
  <tr>
      <td align="left" valign="top" class="fenye">{{$count}}条数据 
      	<input type="text" name="page" value="{{$page}}" disabled style="width: 19px">/
      	<input type="text" name="totalpage" value="{{$totalpage}}" disabled style="width:19px;">页&nbsp;&nbsp;
      <span class="span">
          <a href="javascript:void(0)" target="mainFrame" onFocus="this.blur()" class="first">首页</a>&nbsp;&nbsp;
          <a href="javascript:void(0)" target="mainFrame" onFocus="this.blur()" class="prev">上一页</a>&nbsp;&nbsp;
          <a href="javascript:void(0)" target="mainFrame" onFocus="this.blur()" class="next">下一页</a>&nbsp;&nbsp;
          <!-- <a href="javascript:void(0)" target="mainFrame" onFocus="this.blur()" class="end">尾页</a> -->
      </span>
      </td>
    
  </tr>
