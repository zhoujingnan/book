<tr>
    <td align="left" valign="top">
    
    <table width="100%" border="0" cellspacing="0" cellpadding="0" id="main-tab">
      <tr>
        <th align="center" valign="middle" class="borderright"><span class="pidel">批删</span></th>
        <th align="center" valign="middle" class="borderright">编号</th>
        <th align="center" valign="middle" class="borderright">分类名称</th>
        <th align="center" valign="middle">操作</th>
      </tr>
      @foreach($arr as $key =>$val)
      <tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
        <td align="center" valign="middle" class="borderright borderbottom">
            <input type="checkbox" name="box" value="{{$val['cate_id']}}">
        </td>
        <td align="center" valign="middle" class="borderright borderbottom">{{$val['cate_id']}}</td>
        <td align="center" valign="middle" class="borderright borderbottom">{{$val['cate_name']}}</td>
        <td align="center" valign="middle" class="borderbottom">
          <a href="{{url('backcate/up',['cate_id'=>$val['cate_id']])}}" target="mainFrame" onFocus="this.blur()" class="add" title="up" cate_id={{$val['cate_id']}}>编辑</a>
          <span class="gray">&nbsp;|&nbsp;</span>
          <a href="javascript:void(0)" target="mainFrame" onFocus="this.blur()" class="add" title="del" cate_id="{{$val['cate_id']}}">删除</a></td>
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