<?php
use yii\helpers\Html;
?>
<div class="users-index">
<form action="?r=leave/enroll" method="post">
    <table class="table">
        <tr>
            <td>用户名</td>
            <td><input type="text" name="username" id=""></td>
        </tr>
        <tr>
            <td>密码</td>
            <td><input type="password" name="pwd" id=""></td>
        </tr>
        <tr>
            <td><input type="submit" value="添加"></td>
            <td></td>
        </tr>
    </table>
</form>
    </div>