@foreach($arr as $k => $v)
      <tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
        <td align="center" valign="middle" class="borderright borderbottom">
    		  {{$v['img_id']}}
    		</td>
        <td align="center" valign="middle" class="borderright borderbottom">
          <img src="{{asset($v['img'])}}" width="100">
        </td>
        <td align="center" valign="middle" class="borderright borderbottom">
          {{$v['city']}}
        </td>
        <td align="center" valign="middle" class="borderbottom">
          <a href="javascript:void(0)" onFocus="this.blur()" class="del" id="{{$v['img_id']}}">删除</a>
    		</td>
      </tr>
    @endforeach
    <tr>
    <input type="hidden" name="page" value="{{$page}}">
    <input type="hidden" name="totalpage" value="{{$totalpage}}">
    <td align="center" valign="top" colspan="10" class="fenye">共{{$count}}条数据&nbsp;&nbsp;当前第{{$page}}页
        <a href="javascript:void(0)" class="first">首页</a>&nbsp;&nbsp;
        <a href="javascript:void(0)" class="prev">上一页</a>&nbsp;&nbsp;
        <a href="javascript:void(0)" class="next">下一页</a>&nbsp;&nbsp;
        <a href="javascript:void(0)" class="end">尾页</a>
    </td>
  </tr>