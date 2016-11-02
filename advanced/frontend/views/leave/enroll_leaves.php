<?php
use yii\helpers\Html;
?>
<h3>留言板</h3>

<table class="table">
    <td><input type="hidden" id="uid" value="<?=$uid?>"/></td>
    <textarea id="leaves"  cols="30" rows="10"></textarea>
    <button id="btn">保存</button>
</table>
<?php $js=<<<END

  $("#btn").click(function(){
        var leaves = $("#leaves").val();
        var uid=$('#uid').val();
        var url = "http://www.kaishao.com/yii/frontend/web/index.php?r=leave/leave-add";
        $.get(url,{"leaves":leaves,"uid":uid},function(msg){
            if(msg==1){
                alert("留言成功");
            }

        })
    })

END;
$this->registerJs($js);
?>
