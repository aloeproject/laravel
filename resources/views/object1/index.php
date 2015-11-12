<html>
<title></title>
<body>
您的姓名是:<?=$name?>
<hr>
<h2>更改姓名</h2>
<form action="/object1/update" method="post">
您的姓名为:<input name="name" value='' type="text"/>
<br>
<input name='submit' type="submit" value="提交"/>

<br/>
<a href="/object1/userlist"> 查看用户列表 </a>

</form>
</body>
</html>
