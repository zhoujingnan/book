<tr>
    <td align="left" valign="top">
    
    <table width="100%" border="0" cellspacing="0" cellpadding="0" id="main-tab">
      <tr>
        <th align="center" valign="middle" class="borderright">编号</th>
        <th align="center" valign="middle" class="borderright">图书名称</th>
        <th align="center" valign="middle" class="borderright">数量</th>
        <th align="center" valign="middle" class="borderright">分类</th>
        <th align="center" valign="middle" class="borderright">简介</th>
        <th align="center" valign="middle" class="borderright">售价</th>
        <th align="center" valign="middle" class="borderright">借价</th>
        <th align="center" valign="middle" class="borderright">添加时间</th>
        <th align="center" valign="middle" class="borderright">排序</th>
        <th align="center" valign="middle">操作</th>
      </tr>
      @foreach($arr as $key =>$val)
      <tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
        <td align="center" valign="middle" class="borderright borderbottom">{{$val['b_id']}}</td>
        <td align="center" valign="middle" class="borderright borderbottom">{{$val['b_title']}}</td>
        <td align="center" valign="middle" class="borderright borderbottom">{{$val['num']}}</td>
        <td align="center" valign="middle" class="borderright borderbottom">{{$val['cate_name']}}</td>
        <td align="center" valign="middle" class="borderright borderbottom">{{$val['desc']}}</td>
        <td align="center" valign="middle" class="borderright borderbottom">{{$val['s_price']}}</td>
        <td align="center" valign="middle" class="borderright borderbottom">{{$val['b_price']}}</td>
        <td align="center" valign="middle" class="borderright borderbottom">{{date("Y-m-d H:i:s",$val['addtime'])}}</td>
        <td align="center" valign="middle" class="borderright borderbottom">{{$val['order']}}</td>
        <td align="center" valign="middle" class="borderbottom"><a href="add.html" target="mainFrame" onFocus="this.blur()" class="add">编辑</a><span class="gray">&nbsp;|&nbsp;</span><a href="add.html" target="mainFrame" onFocus="this.blur()" class="add">删除</a></td>
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