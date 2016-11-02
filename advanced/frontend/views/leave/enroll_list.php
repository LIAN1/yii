<?php
use yii\helpers\Html;
?>

    <table class="table">
        <tr>
            <td>用户名</td>
            <td>操作</td>
        </tr>
        <?php foreach($data as $v){ ?>
        <tr>
            <td><span id="tid"><?php echo $v['uid']?></span></td>
            <td class="usersname"><b><?php echo $v['username']?></b></td>
            <td><a href="?r=leave/enroll-del&uid=<?=$v['uid'];?>">删除</a></td>
            <td><a href="?r=leave/enroll-leave&uid=<?=$v['uid'];?>">留言</a></td>
        </tr>
        <?php } ?>

    </table>
<?php $js=<<<END
    //即点即改
    $(function() {
    //获取class为caname的元素
    $(".usersname").click(function() {
    var td = $(this);
    var txt = td.text();
    var input = $("<input type='text'value='" + txt + "'/>");
    td.html(input);
    input.click(function() { return false; });
    //获取焦点
    input.trigger("focus");
    //文本框失去焦点后提交内容，重新变为文本
    input.blur(function() {
    var newtxt = $(this).val();
    //判断文本有没有修改
    if (newtxt != txt) {
    td.html(newtxt);

    var caid =$.trim(td.prev().text());
    //ajax异步更改数据库,加参数date是解决缓存问题
    var url = "?r=leave/enroll-update";
    //使用get()方法打开一个一般处理程序，data接受返回的参数（在一般处理程序中返回参数的方法 context.Response.Write("要返回的参数");）
    //数据库的修改就在一般处理程序中完成
    $.get(url,{"username":newtxt,"uid":caid}, function(data) {
    if(data=="1")
    {
        alert("该类别已存在！");
        td.html(txt);
        return;
    }
        alert(data);
        td.html(newtxt);
        });
    }
    else
    {
    td.html(newtxt);
    }
    });
    });
    });

END;
$this->registerJs($js);
?>
