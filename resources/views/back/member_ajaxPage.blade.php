<tr>
    <td align="left" valign="top">
    
    <table width="100%" border="0" cellspacing="0" cellpadding="0" id="main-tab">
      <tr>
        <th align="center" valign="middle" class="borderright">编号</th>
        <th align="center" valign="middle" class="borderright">用户名</th>
        <th align="center" valign="middle" class="borderright">邮箱</th>
        <th align="center" valign="middle" class="borderright">积分</th>
        <th align="center" valign="middle" class="borderright">地址</th>
        <th align="center" valign="middle" class="borderright">状态</th>
        <th align="center" valign="middle" class="borderright">注册时间</th>
      </tr>
      @foreach($arr as $key =>$val)
      <tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
        <td align="center" valign="middle" class="borderright borderbottom">{{$val['m_id']}}</td>
        <td align="center" valign="middle" class="borderright borderbottom">{{$val['m_name']}}</td>
        <td align="center" valign="middle" class="borderright borderbottom">{{$val['m_email']}}</td>
        <td align="center" valign="middle" class="borderright borderbottom">{{$val['socre']}}</td>
        <td align="center" valign="middle" class="borderright borderbottom">{{$val['m_address']}}</td>
        <td align="center" valign="middle" class="borderright borderbottom" id="{{$val['m_id']}}">
        @if($val['status']==0)
      <font color="red" class="w">未审核</font>
    @else
      <font color="green" class="y">审核通过</font>
    @endif
      </td>
        <td align="center" valign="middle" class="borderright borderbottom">{{date("Y-m-d H:i:s",$val['addtime'])}}</td>
      </tr>
      @endforeach
    </table></td>
    </tr>
  <tr>
      <td align="left" valign="top" class="fenye">{{$count}}条数据 <input type="text" name="page" value="{{$page}}" disabled style="width: 19px">/<input type="text" name="totalpage" value="{{$totalpage}}" disabled style="width:19px;">页&nbsp;&nbsp;
      <span class="span">
          <a href="javascript:void(0)" target="mainFrame" onFocus="this.blur()" class="first">首页</a>&nbsp;&nbsp;
          <a href="javascript:void(0)" target="mainFrame" onFocus="this.blur()" class="prev">上一页</a>&nbsp;&nbsp;
          <a href="javascript:void(0)" target="mainFrame" onFocus="this.blur()" class="next">下一页</a>&nbsp;&nbsp;
          <a href="javascript:void(0)" target="mainFrame" onFocus="this.blur()" class="end">尾页</a>
      </span>
      </td>
    
  </tr>