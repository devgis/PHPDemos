﻿<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html>
<head title="首页">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="renderer" content="webkit" />
    <meta http-equiv="X-UA-Compatible" content="IE=EmulateIE9" />
</head>
<body>
<h1>
<?
echo "厉害了我的标题";  
?>   
</h1>
<h3>
<?
echo "--------------------------------------------------------------------------------------------------------<br>";  
echo "1,厉害了我的数据库查询<br>";  
echo "********************************************************************************************************<br>";  
$conn=mysql_connect ("127.0.0.1", "root","11111111");  
mysql_select_db("x25gbk"); 
//$conn->query("SET NAMES GBK");
//mysql_query("SET NAMES GBK");
mysql_query("set names 'utf8' ");
mysql_query("set character_set_client=utf8");
mysql_query("set character_set_results=utf8");
$exec="select * from pre_common_usergroup";  
$result=mysql_query($exec);  
while($rs=mysql_fetch_object($result))  
{  
    echo "grouptitle:".$rs->grouptitle."<br>";  
} 
echo "--------------------------------------------------------------------------------------------------------<br>";  
echo "2,厉害了我的URL参数<br>";  
echo "********************************************************************************************************<br>";
//获取域名或主机地址 
echo $_SERVER['HTTP_HOST']."<br>"; #localhost
//获取网页地址 
echo $_SERVER['PHP_SELF']."<br>"; #/blog/testurl.php
//获取网址参数 
echo $_SERVER["QUERY_STRING"]."<br>"; #id=5
$id=$_REQUEST['id']; //取得url中参数id的值
echo "id的值为".$id."<br>";
//获取用户代理 
//echo $_SERVER['HTTP_REFERER']."<br>"; 
//获取完整的url
//echo 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
//echo 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'].'?'.$_SERVER['QUERY_STRING'];
#http://localhost/blog/testurl.php?id=5
//包含端口号的完整url
//echo 'http://'.$_SERVER['SERVER_NAME'].':'.$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"]; 
#http://localhost:80/blog/testurl.php?id=5

//只取路径
//$url='http://'.$_SERVER['SERVER_NAME'].$_SERVER["REQUEST_URI"]; 
//echo dirname($url);
//$_SERVER["SERVER_PORT"]  //获取端口  
//$_SERVER['HTTP_HOST']  //获取域名或主机地址 如test.cn 或http://www.test.cn 或2010.test.cn  
//$_SERVER['SERVER_NAME']  //获取域名或主机地址 注：只是主域名 如 test.cn  
//$_SERVER["REQUEST_URI"]  //获取域名后的详细地址 如：/index.php?id=123 ...  
//$_SERVER['PHP_SELF']  //获取PHP文件名  
//$_SERVER["QUERY_STRING"]  //获取PHP后的网址参数  
//$_SERVER['HTTP_REFERER']  //来源网页的详细地址 
#http://localhost/blog

$_SESSION['adminname']="admin";  //读取session
echo "session中adminname:".$_SESSION['adminname']."<br>";
echo "--------------------------------------------------------------------------------------------------------<br>";  
echo "3,厉害了我的字符串<br>";  
echo "********************************************************************************************************<br>";
$str = "Hello";    
$number = 123; 
$txt = sprintf("%s world. Day number %u",$str,$number);
echo $txt."<br>";

//定义函数
function testfunc($in_name) {
    return $in_name;
}

var_dump(testfunc($txt));
echo "<br>";
echo "--------------------------------------------------------------------------------------------------------<br>";  
echo "4,厉害了我的php类（序列化，反序列化）<br>";  
echo "********************************************************************************************************<br>";  
//声明一个类
class dog {

    var $name;
    var $age;
    var $owner;

    function dog($in_name="unnamed",$in_age="0",$in_owner="unknown") {
        $this->name = $in_name;
        $this->age = $in_age;
        $this->owner = $in_owner;
    }

    function getage() {
        return ($this->age * 365);
    }
    
    function getowner() {
        return ($this->owner);
    }
    
    function getname() {
        return ($this->name);
    }
}
//实例化这个类
$ourfirstdog = new dog("Rover",12,"Lisa and Graham");
//用serialize函数将这个实例转化为一个序列化的字符串
$dogdisc = serialize($ourfirstdog);
print $dogdisc; //$ourfirstdog 已经序列化为字符串 O:3:"dog":3:{s:4:"name";s:5:"Rover";s:3:"age";i:12;s:5:"owner";s:15:"Lisa and Graham";}
print '<BR>';
//我们在这里用 unserialize() 还原已经序列化的对象
$pet = unserialize($dogdisc); //此时的 $pet 已经是前面的 $ourfirstdog 对象了
//获得年龄和名字属性
$old = $pet->getage();
$name = $pet->getname();
//这个类此时无需实例化可以继续使用,而且属性和值都是保持在序列化之前的状态
print "Our first dog is called $name and is $old days old<br>";
print '<BR>';

echo "--------------------------------------------------------------------------------------------------------<br>";  
echo "5,厉害了我的php json<br>";  
echo "********************************************************************************************************<br>";  
#json_encode 和 json_decode 使用JSON格式序列化和反序列化
#var_export 和 eval var_export 函数把变量作为一个字符串输出；eval把字符串当成PHP代码来执行，反序列化得到最初变量的内容。
#wddx_serialize_value 和 wddx deserialize wddx_serialize_value函数可以序列化数组变量，并以XML字符串形式输出。
$jsonstr = json_encode($ourfirstdog);
$dogobj = json_decode($jsonstr);
var_dump($jsonstr);
echo "<br>";
var_dump($dogobj);
echo "<br>";
echo $jsonstr;
echo "<br>";
echo "--------------------------------------------------------------------------------------------------------<br>";   
echo "6,厉害了我的php数组<br>";  
echo "********************************************************************************************************<br>"; 
$phpjc = array( 
0=>'word', 
3=>'excel', 
'outlook', 
'access'); 
print_r($phpjc); 
echo "<br>";

$count = count($phpjc); 
echo "长度:".$count."<br>";

$phpjc = array(); 
$phpjc[] = "one"; 
$phpjc[] = "two"; 
echo $phpjc[0]."<br>"; 
echo $phpjc[1]; 
echo "<br>";

$count = count($phpjc); 
echo "长度:".$count."<br>";
echo "############################################################################################<br>";
echo "数组遍历方法<br>";
$arr= array();
for($i= 0; $i< 50000; $i++){
$arr[]= $i*rand(1000,9999);
}
function GetRunTime()
{
list($usec,$sec)=explode(" ",microtime());
return ((float)$usec+(float)$sec);
}
######################################
$time_start= GetRunTime();
for($i= 0; $i< count($arr); $i++){
$str= $arr[$i];
}
$time_end= GetRunTime();
$time_used= $time_end- $time_start;
echo 'Used time of for:'.round($time_used, 7).'(s)<br /><br />';
unset($str, $time_start, $time_end, $time_used);
######################################
$time_start= GetRunTime();
while(list($key, $val)= each($arr)){
$str= $val;
}
$time_end= GetRunTime();
$time_used= $time_end- $time_start;
echo 'Used time of while:'.round($time_used, 7).'(s)<br /><br />';
unset($str, $key, $val, $time_start, $time_end, $time_used);
######################################
$time_start= GetRunTime();
foreach($arr as$key=> $val){
$str= $val;
}
$time_end= GetRunTime();
$time_used= $time_end- $time_start;
echo 'Used time of foreach:'.round($time_used, 7).'(s)<br /><br />';

echo "<br>";
echo "############################################################################################<br>";
echo "数组遍历方法总结<br>";
echo "1. foreach()
foreach()是一个用来遍历数组中数据的最简单有效的方法。

#example1:

<?php
$colors= array('red','blue','green','yellow');
foreach ($colorsas$color){
echo \"Do you like $color? <br />\";
}
?>

显示结果：

Do you like red? 
Do you like blue? 
Do you like green? 
Do you like yellow?

2. while()
while() 通常和 list()，each()配合使用。

#example2:

<?php
$colors= array('red','blue','green','yellow');
while(list($key,$val)= each($colors)) {
echo \"Other list of $val.<br />\";
}
?>
显示结果：

Other list of red. 
Other list of blue. 
Other list of green. 
Other list of yellow.

3. for()
#example3:

<?php
$arr= array (\"0\"=> \"zero\",\"1\"=> \"one\",\"2\"=> \"two\");
for ($i= 0;$i< count($arr); $i++){
$str= $arr[$i];
echo \"the number is $str.<br />\";
}
?>
显示结果：

the number is zero. 
the number is one. 
the number is two.

========= 以下是函数介绍 ==========

key()
mixed key(array input_array)

key()函数返回input_array中位于当前指针位置的键元素。

#example4

<?php
$capitals= array(\"Ohio\"=> \"Columbus\",\"Towa\"=> \"Des Moines\",\"Arizona\"=> \"Phoenix\");
echo \"<p>Can you name the capitals of these states?</p>\";
while($key= key($capitals)) {
echo $key.\"<br />\";
next($capitals);
//每个key()调用不会推进指针。为此要使用next()函数
}
?>
显示结果：

Can you name the capitals of these states? 
Ohio 
Towa 
Arizona

reset()
mixed reset(array input_array)

reset()函数用来将input_array的指针设置回数组的开始位置。如果需要在一个脚本中多次查看或处理同一个数组，就经常使用这个函数，另外这个函数还常用于排序结束时。

#example5 － 在#example1上追加代码

<?php
$colors= array('red','blue','green','yellow');
foreach ($colorsas$color){
echo \"Do you like $color? <br />\";
}
reset($colors);
while(list($key,$val)= each($colors)) {
echo \"$key=> $val<br />\";
}
?>
显示结果：

Do you like red? 
Do you like blue? 
Do you like green? 
Do you like yellow? 
0 => red 
1 => blue 
2 => green 
3 => yellow

注意：将一个数组赋值给另一个数组时会重置原来的数组指针，因此在上例中如果我们在循环内部将 $colors 赋给了另一个变量的话将会导致无限循环。 
例如将 $s1 = $colors; 添加到while循环内，再次执行代码，浏览器就会无休止地显示结果。

each()
array each(array input_array)

each()函数返回输入数组当前键/值对，并将指针推进一个位置。返回的数组包含四个键，键0和key包含键名，而键1和value包含相应的数据。如果执行each()前指针位于数组末尾，则返回FALSE。

#example6

<?php
$capitals= array(\"Ohio\"=> \"Columbus\",\"Towa\"=> \"Des Moines\",\"Arizona\"=> \"Phoenix\");
$s1= each($capitals);
print_r($s1);
?>
显示结果：

Array ( [1] => Columbus [value] => Columbus [0] => Ohio [key] => Ohio )

current()，next()，prev()，end()
mixed current(array target_array)

current()函数返回位于target_array数组当前指针位置的数组值。与next()、prev()、和end()函数不同，current()不移动指针。 
next()函数返回紧接着放在当前数组指针的下一个位置的数组值。 
prev()函数返回位于当前指针的前一个位置的数组值，如果指针本来就位于数组的第一个位置，则返回FALSE。 
end()函数将指针移向target_array的最后一个位置，并返回最后一个元素。

#example7

<?php
$fruits= array(\"apple\",\"orange\",\"banana\");
$fruit= current($fruits); //return \"apple\"
echo $fruit.\"<br />\";
$fruit= next($fruits); //return \"orange\"
echo $fruit.\"<br />\";
$fruit= prev($fruits); //return \"apple\"
echo $fruit.\"<br />\";
$fruit= end($fruits); //return \"banana\"
echo $fruit.\"<br />\";
?>
显示结果：

apple 
orange 
apple 
banana<br>\";
echo \"############################################################################################<br>\";
echo \"数组其他操作大全<br>\";
echo \"一、数组操作的基本函数
数组的键名和值
array_values($arr);获得数组的值
array_keys($arr);获得数组的键名
array_flip($arr);数组中的值与键名互换（如果有重复前面的会被后面的覆盖）
in_array(\"apple\",$arr);在数组中检索apple
array_search(\"apple\",$arr);在数组中检索apple ，如果存在返回键名
array_key_exists(\"apple\",$arr);检索给定的键名是否存在数组中
isset($arr[apple]):检索给定的键名是否存在数组中

数组的内部指针
current($arr);返回数组中的当前单元
pos($arr);返回数组中的当前单元
key($arr);返回数组中当前单元的键名
prev($arr);将数组中的内部指针倒回一位
next($arr);将数组中的内部指针向前移动一位
end($arr);将数组中的内部指针指向最后一个单元
reset($arr;将数组中的内部指针指向第一个单元
each($arr);将返回数组当前元素的一个键名/值的构造数组，并使数组指针向前移动一位
list($key,$value)=each($arr);获得数组当前元素的键名和值

数组和变量之间的转换
extract($arr);用于把数组中的元素转换成变量导入到当前文件中，键名当作变量名，值作为变量值
注：（第二个参数很重要，可以看手册使用）使用方法  echo $a;
compact(var1,var2,var3);用给定的变量名创建一个数组

二、数组的分段和填充
数组的分段
array_slice($arr,0,3);可以将数组中的一段取出，此函数忽略键名
array_splice($arr,0,3，array(\"black\",\"maroon\"));可以将数组中的一段取出，与上个函数不同在于返回的序列从原数组中删除

分割多个数组
array_chunk($arr,3,TRUE);可以将一个数组分割成多个，TRUE为保留原数组的键名

数组的填充
array_pad($arr,5,'x');将一个数组填补到制定长度

三、数组与栈
array_push($arr,\"apple\",\"pear\");将一个或多个元素压入数组栈的末尾（入栈），返回入栈元素的个数
array_pop($arr);将数组栈的最后一个元素弹出（出栈）

四、数组与列队
array_shift($arr);数组中的第一个元素移出并作为结果返回（数组长度减1，其他元素向前移动一位，数字键名改为从零技术，文字键名不变）
array_unshift($arr,\"a\",array(1,2));在数组的开头插入一个或多个元素

五、回调函数
array_walk($arr,'function','words');使用用户函数对数组中的每个成员进行处理（第三个参数传递给回调函数function）
array_mpa(\"function\",$arr1,$arr2);可以处理多个数组（当使用两个或更多数组时，他们的长度应该相同）
array_filter($arr,\"function\");使用回调函数过滤数组中的每个元素，如果回调函数为TRUE，数组的当前元素会被包含在返回的结果数组中，数组的键名保留不变
array_reduce($arr,\"function\",\"*\");转化为单值函数（*为数组的第一个值）

六、数组的排序
通过元素值对数组排序
sort($arr);由小到大的顺序排序（第二个参数为按什么方式排序）忽略键名的数组排序
rsort($arr);由大到小的顺序排序（第二个参数为按什么方式排序）忽略键名的数组排序
usort($arr,\"function\");使用用户自定义的比较函数对数组中的值进行排序（function中有两个参数，0表示相等，正数表示第一个大于第二个，负数表示第一个小于第二个）忽略键名的数组排序
asort($arr);由小到大的顺序排序（第二个参数为按什么方式排序）保留键名的数组排序
arsort($arr);由大到小的顺序排序（第二个参数为按什么方式排序）保留键名的数组排序
uasort($arr,\"function\");使用用户自定义的比较函数对数组中的值进行排序（function中有两个参数，0表示相等，正数表示第一个大于第二个，负数表示第一个小于第二个）保留键名的数组排序

通过键名对数组排序
ksort($arr);按照键名正序排序
krsort($arr);按照键名逆序排序
uksort($arr,\"function\");使用用户自定义的比较函数对数组中的键名进行排序（function中有两个参数，0表示相等，正数表示第一个大于第二个，负数表示第一个小于第二个）

自然排序法排序
natsort($arr);自然排序（忽略键名）
natcasesort($arr);自然排序（忽略大小写，忽略键名）

七、数组的计算
数组元素的求和
array_sum($arr);对数组内部的所有元素做求和运算

数组的合并
array_merge($arr1,$arr2);合并两个或多个数组（相同的字符串键名，后面的覆盖前面的，相同的数字键名，后面的不会做覆盖操作，而是附加到后面）
“+”$arr1+$arr2;对于相同的键名只保留后一个
array_merge_recursive($arr1,$arr2); 递归合并操作，如果数组中有相同的字符串键名，这些值将被合并到一个数组中去。如果一个值本身是一个数组，将按照相应的键名把它合并为另一个数组。当数组 具有相同的数组键名时，后一个值将不会覆盖原来的值，而是附加到后面

数组的差集
array_diff($arr1,$arr2);返回差集结果数组
array_diff_assoc($arr1,$arr2,$arr3);返回差集结果数组，键名也做比较

数组的交集
array_intersect($arr1,$arr2);返回交集结果数组
array_intersect_assoc($arr1,$arr2);返回交集结果数组，键名也做比较

八、其他的数组函数
range(0,12);创建一个包含指定范围单元的数组
array_unique($arr);移除数组中重复的值，新的数组中会保留原始的键名
array_reverse($arr,TRUE);返回一个单元顺序与原数组相反的数组，如果第二个参数为TRUE保留原来的键名
//srand((float)microtime()*10000000); 随机种子触发器
array_rand($arr,2);从数组中随机取出一个或 多个元素
shuffle($arr);将数组的顺序打乱
本类函数允许用多种方法来操作数组和与之交互。数组的本质是储存，管理和操作一组变量。
PHP 支持一维和多维数组，可以是用户创建或由另一个函数创建。有一些特定的数据库处理函数可以从数据库查询中生成数组，还有一些函数返回数组。

array_change_key_case — 返回字符串键名全为小写或大写的数组
array_chunk — 将一个数组分割成多个
array_combine — 创建一个数组，用一个数组的值作为其键名，另一个数组的值作为其值
array_count_values — 统计数组中所有的值出现的次数
array_diff_assoc — 带索引检查计算数组的差集
array_diff_key — 使用键名比较计算数组的差集
array_diff_uassoc — 用用户提供的回调函数做索引检查来计算数组的差集
array_diff_ukey — 用回调函数对键名比较计算数组的差集
array_diff — 计算数组的差集
array_fill_keys — Fill an array with values, specifying keys
array_fill — 用给定的值填充数组
array_filter — 用回调函数过滤数组中的单元
array_flip — 交换数组中的键和值
array_intersect_assoc — 带索引检查计算数组的交集
array_intersect_key — 使用键名比较计算数组的交集
array_intersect_uassoc — 带索引检查计算数组的交集，用回调函数比较索引
array_intersect_ukey — 用回调函数比较键名来计算数组的交集
array_intersect — 计算数组的交集
array_key_exists — 检查给定的键名或索引是否存在于数组中
array_keys — 返回数组中所有的键名
array_map — 将回调函数作用到给定数组的单元上
array_merge_recursive — 递归地合并一个或多个数组
array_merge — 合并一个或多个数组
array_multisort — 对多个数组或多维数组进行排序
array_pad — 用值将数组填补到指定长度
array_pop — 将数组最后一个单元弹出（出栈）
array_product — 计算数组中所有值的乘积
array_push — 将一个或多个单元压入数组的末尾（入栈）
array_rand — 从数组中随机取出一个或多个单元
array_reduce — 用回调函数迭代地将数组简化为单一的值
array_reverse — 返回一个单元顺序相反的数组
array_search — 在数组中搜索给定的值，如果成功则返回相应的键名
array_shift — 将数组开头的单元移出数组
array_slice — 从数组中取出一段
array_splice — 把数组中的一部分去掉并用其它值取代
array_sum — 计算数组中所有值的和
array_udiff_assoc — 带索引检查计算数组的差集，用回调函数比较数据
array_udiff_uassoc — 带索引检查计算数组的差集，用回调函数比较数据和索引
array_udiff — 用回调函数比较数据来计算数组的差集
array_uintersect_assoc — 带索引检查计算数组的交集，用回调函数比较数据
array_uintersect_uassoc — 带索引检查计算数组的交集，用回调函数比较数据和索引
array_uintersect — 计算数组的交集，用回调函数比较数据
array_unique — 移除数组中重复的值
array_unshift — 在数组开头插入一个或多个单元
array_values — 返回数组中所有的值
array_walk_recursive — 对数组中的每个成员递归地应用用户函数
array_walk — 对数组中的每个成员应用用户函数
array — 新建一个数组
arsort — 对数组进行逆向排序并保持索引关系
asort — 对数组进行排序并保持索引关系
compact — 建立一个数组，包括变量名和它们的值
count — 计算数组中的单元数目或对象中的属性个数
current — 返回数组中的当前单元
each — 返回数组中当前的键／值对并将数组指针向前移动一步
end — 将数组的内部指针指向最后一个单元
extract — 从数组中将变量导入到当前的符号表
in_array — 检查数组中是否存在某个值
key — 从关联数组中取得键名
krsort — 对数组按照键名逆向排序
ksort — 对数组按照键名排序
list — 把数组中的值赋给一些变量
natcasesort — 用“自然排序”算法对数组进行不区分大小写字母的排序
natsort — 用“自然排序”算法对数组排序
next — 将数组中的内部指针向前移动一位
pos — current() 的别名
prev — 将数组的内部指针倒回一位
range — 建立一个包含指定范围单元的数组
reset — 将数组的内部指针指向第一个单元
rsort — 对数组逆向排序
shuffle — 将数组打乱
sizeof — count() 的别名
sort — 对数组排序
uasort — 使用用户自定义的比较函数对数组中的值进行排序并保持索引关联
uksort — 使用用户自定义的比较函数对数组中的键名进行排序
usort — 使用用户自定义的比较函数对数组中的值进行排序
使用数组
在前面的章节中，我们所介绍的变量都是标量变量，这些变量只能存储单个数据。数组是一个可以存储一组或一系列数值的变量。一个数组可以具有许多个元素。每个元素有一个值，例如文本、数字或另一个数组。一个包含其他数组的数组称为多维数组。

3.1 什么是数组
一个标量变量就是一个用来存储数值的命名区域。同样，一个数组就是一个用来存储一系列变量值的命名区域，因此，可以使用数组组织标量变量。
存储在数组中的值称为数组元素。每个数组元素有一个相关的索引（也称为关键字），它可以用来访问元素。在大多数编程语言中，数组都具有数字索引，而且这些索个通常是从0或1开始的。

3.2 数字索引数组
在PHP中，数字索引的默认值是从0开始的，当然也可以改变它。

3.2.1 数字索引数组的初始化
$porducts = array( 'Tires', 'Oil', 'Spark Plugs' );
就像echo语句一样，array()实际上是一个语言结构，而不是一个函数。
根据对数组内容的需求不同，可能不需要再像以上例子一样对它们进行手工的初始化操作。如果所需数据保存在另一个数组中，可以使用运算符“=”简单地将数组复制到另一个数组。
如果需要将按升序排列的数字保存在一个数组中，可以使用range()函数自动创建这个数组。如下这行代码将创建一个从1到10的数字数组：$numbers = range(1,10);
range()函数具有一个可选的第三个参数，这个参数允许设定值之间的步骤。例如，如需建立一个1到10之间的奇数数组，可以使用如下代码：$odds = range(1,10,2);
range()函数也可以对字符进行操作，如：$letters = range('a', 'z');

3.2.2 访问数组的内容
要访问一个变量的内容，可以直接使用其名称。如果该变量是一个数组，可以使用变量名称和关键字或索引的组合来访问其内容。关键字或索引将指定我们要访问的变量。索引在变量名称后面用方括号括起来。
在默认的情况下，0元素是数组的第一个元素。
请注意，虽然PHP的字符串解析功能非常强大和智能，但是可能会引起混淆。当你将数组或其他变量嵌入双引号中的字符串时，如果不能正确解释它们，可以将它们放置在双引号之外，或者查找第4章的“字符串操作与正则表达式”获得更复杂的语法。
就像PHP的其他变量一样，数组不需要预先初始化或创建。在第一次使用它们的时候，它们会自动创建。

3.2.3. 使用循环访问数组
由于数组使用有序的数字作为索引，所以使用一个for循环就可以很容易地显示数组的内容。
for ($i=0; $i<3; $i++)
echo \"$products[$i]\";
使用一个简单的循环就可以访问每个元素是数字索引数组的一个非常好的特性。也可以使用foreach循环，这个循环语句是专门为数组而设计的。如：
foreach ($products as $current)
echo $current. ' ';

3.3 使用不同索引的数组
PHP还支持相关数组。在相关数组中，可以将每个变量值与任何关键字或索引关联起来。

3.3.1 初始化相关数组
如下所示的代码可以创建一个以产品名称作为关键字、以价格作为值的相关数组：
$prices = array( 'Tires'=>100, 'Oil'=>10, 'Spark Plugs'=>4 );
关键字和值之间的符号只是一个大于号与等于符号。

3.3.2 访问数组元素
同样，可以使用变量名称和关键字来访问数组的内容。例如\$prices['Tires']。

3.3.3 使用循环语句
因为相关数组的索引不是数字，因此无法在for循环语句中使用一个简单的计数器对数组进行操作。但是可以使用foreach循环或list()和each()结构。
当使用foreach循环语句对相关数组进行操作时，foreach()循环具有不同的结构。可以按如下方式使用关键字：
foreach ($prices as $key => $value)
echo $key.'=>'.$value.'<br />';
如下所示的代码将使用each()结构打印$prices数组的内容：
while( $element = each($prices))
{
echo \$element['key'];
echo ' - ';
echo \$element['value'];
echo '<br />';
}
each()函数将返回数组的当前元素，并将下一个元素作为当前元素。因为在while循环中调用each()函数，它将按顺序返回数组中每个元素，并且当它到达数组末尾时，循环操作将终止。
在 这段代码中，变量\$element是一个数组。当调用each()时，它将返回一个带有4个数值和4个指向数组位置的索引的数组。位置key和0包含了当 前元素的关键字，而位置value和1包含了当前元素的值。虽然这与选哪一种方法没什么不同，但我们选择了使用命名位置，而不是数字索引位置。
此外，还有一种更为高级和常见的方式来完成相同的操作。函数list()可以用来将一个数组分解为一系列的值。可以按照如下方式将函数each()返回的两个值分开：list( $product, $price) = each( $price);
以上代码使用each()从\$prices数组中取出当前元素，并且将它作为数组返回，然后再指向下一个元素。它还使用list()将从each()返回的数组中所包含0、1两个元素变为两个名为$product和$price的新蛮量。
我们可以循环遍历整个\$prices数组，使用如下所示的简短脚本显示它的内容：
while(list(\$prodct, \$pirce) = each(\$prices))
echo \"\$product - $price<br />\";
这段代码的输出结果与前面脚本的输出结果相同，但它更容易阅读，因为list()允许为新变量命名。
需要注意的一点是，当使用each()函数时，数组将记录当前元素。如果希望在相同的脚本中两次使用该数组，就必须使用函数reset()将当前元素重新设置到数组开始处。要再次遍历prices数组，可以使用如下所示的代码：
reset(\$prices);
while(list(\$product, \$price) = each(\$prices))
echo \"\$product - \$price<br />\";

3.4 数组操作符
+联合，==等价，===恒等，!=不等价，<>不等价，!==不恒等。
联合操作符尝试将$b中的元素添加到$a的末尾。如果$b中的元素与$a中的一些元素具有相同的索引，它们将不会被添加。即$a中的元素将不会被覆盖。

3.5 多维数组
数组不一定就是一个关键字和值的简单列表——数组中的每个位置还可以保存另一个数组。使用这种方法，可以创建一个二维数组。可以把二维数组当成一个矩阵，或者是一个具有宽度和高度或者行和列的网络。

3.6 数组排序

3.6.1 使用sort()函数
sort()函数是区分字母大小写的。所有的大家字母都在小写字母的前面。所以‘A’小于‘Z’，而'Z'小于‘a’。
该 函数的第二个参数是可选的。这个可选参数可以传递SORT_REGULAR（默认值）、SORT_NUMERIC或SORT_STRING。指定排序类型 的功能是非常有用的，例如，当要比较可能包含有数字2和12的字符串时。从数学角度看，2要小于12，但是作为字符串，‘12’却要小于‘2’。

3.6.2 使用asort()函数和ksort()函数对相关数组排序
函数asort()根据数组的每个元素值进行排序。ksort()函数是按关键字排序而不是按值排序。

3.6.3 反向排序
函数rsort()将一个一维数字索引数组按降序排序。函数arsort()将一个一维相关数组按每个元素值的降序排序。函数krsort()针根据数组元素的关键字将一维数组按照降序排序。
为了访问一个一维数组中的数据，需要使用数组的名称和元素的索引，除了一个元素具有两个索引——行和列外，二维数组和一维数组是类似的。
可以使用双重for循环来实现同样的效果：
for ( $row=0; $row<3; $row++ )
{
for ( $column=0; $column<3; $column++ )
{
echo '|'.$products[$row][$column];
|
echo '|<br />';
}
如果对一个大数组使用这种代码，那么将简洁得多。
你可能更喜欢创建列名称来代替数字。可以使用如下代码：
$products = array ( array ( 'Code'=>'TIR', 'Descrīption'=>'Tires', 'Price'=>100 ), array ( 'Code'=>'OIL', 'Descrīption'=>'Oil', 'Price'=>10 ), array ( 'Code'=>'SPK', 'Descrīption'=>'Spark Plugs', 'Price'=>4 ) };
如果希望检索单个值，那么使用这个数组会容易得多。请记住，将所描述的内容保存到用它的名 称命名的列中，与将其保存到所谓的第一列中相比，前者更容易记忆。使用描述性索引，不需要记住某个元素是存放在[x][y]位置的。使用一对有意义的行和 列的名称作为索引可以使用你很容易找到所需的数据。
然后，我们却不能使用一个简单的for循环按顺序遍历每一列。可以使用for循环遍历外部的数 字索引数组$products。$products数组的每一行都是一个具有描述性索引的数组。在while循环中使用each()和list()函数， 可以遍历整个内部数组。因此，需要一个内嵌有while循环的for循环。
for ( $row = 0; $row < 3; $row++ }
{
while ( list ( $key, $value ) = each ( $products[$row] ) )
{
echo \"|$value\";
}
echo '|<br />';
}
三维数组具有高、宽、深的概念。如果能轻松地将一个二维数组想像成一个有行和列的表格，那么就可以将三维数组想像成一堆像这样的表格。每个元素可以通过层、行和列进行引用。
根据创建多维数组的方法，可以创建四维、五维或六维数组。在PHP中，并没有设置数组维数的限制，但人们很难设想一个多于三维的数组。大多数的实际问题在逻辑上只需要使用三维或者更少维的数组结构就可以了。

3.7 多维数组的排序
对 多于一维的数组进行排序，或者不按字母和数字的顺序进行排，要复杂得多。PHP知道如何比较两个数字或字符串，但在多维数组中，每个元素都是一个数组。 PHP不知道如何比较两个数组，所以需要建立一个比较它们的方法。在大多数情况下，单词和数字的顺序是显而易见的——但对于复杂的对象，问题就会多一些。

3.7.1 用户定义排序
usort()中的“u”代表“user”，因为这个函数要求传入用户定义的比较函数。asort和ksort对应的版本uasort()和uksort()也要求传入用户定义的比较函数。
类似于asort()，当对非数字索引数组的值进行排序时，uasort()才会被使用。如果值是简单的数字或文本则可以使用asort。如果要比较的值像数组一样复杂，可以定义一个比较函数，然后使用uasort()。
类似于ksort()，当对非数字索引数组的关键字进行排序时才使用uksort()。如果值是简单的数字或文本就使用ksort。如果要比较的对象像数组一样复杂，可以定义一个比较函数，然后使用uksort()。

3.7.2 反向用户排序
函数sort()、asort()和ksort()都分别对应一个带字母“r”的反向排序函数。用户定义的排序没有反向变体，但可以对一个多维数组进行反向排序。

3.8 对数组进行重新排序

3.8.1 使用shuffle()函数
在PHP的早期版本中，shuffle()要求调用srand()函数时首先提供一个随机数生成器。如今，这个步骤已经不再需要了。
如果这个函数对你非常重要，可以在程序中应用该函数之前在服务器上测试它。
由于并不需要真正重新排序整个数组，使用array_rand()函数可以实现相同的功能。

3.8.2 使用array_reverse()函数
array_reverse()函数使用一个数组作参数，返回一个内容与参数数组相同但顺序相反的数组。
因为单独使用range()函数将创建一个升序序列，所以必须使用sort()函数或array_reverse()函数将数组中的数字变为降序。或者，也可以使用for循环通过一次一个元素的方式创建这个数组。如：
$numbers = array();
for ($i=10; $i>0; $i--)
array_push( $numbers, $i );
一个for循环可以像这样按降序方式运行。可以将计数器
一个for循环可以像这样按降序方式运行。可以将计数器的初始值设为一个大数，在每次循环末尾使用运算符“--”将计数器减1。
在这里，我们创建了一个空数组，然后使用array_push()函数将每个新元素添加到数组的末尾。请注意，和array_push()相反的函数是array_pop()，这个函数用来删除并返回数组末尾的一个元素。
或者，也可以使用array_reverse()函数将由range()函数所创建的数组进行反向排序。
请注意，array_reverse()函数将返回一个原数组修改后的副本。如果不再需要原来的数组，比如在这个例子中，可以用新的副本覆盖原来的版本。
如果数据只是一系列的整数，可以通过将-1作为range()函数的第三个可选调参数，以相反的顺序创建该数组。

3.9 从文件载入数组
使用file()函数将整个文件载入一个数组中。文件中的每行则成为数组中的一个元素。使用了count()函数来统计数组中的元素个数。
explode(\"\t\", $orders[$i])
explode()函数可以将传入的字符串分割成一个个小块。每个制表符成为两个元素之间的断点。这个函数的可选参数limit可以用来限制被返回的最大块数。
可以使用许多方法从字符串中提取数字。在这里，我们使用了intval()函数。它可以将一个字符串转化成一个整数。这个转换是相当智能化的，它可以忽略某些部分，例如标签就不能转换成数字。

3.10 执行其他的数组操作

3.10.1 在数组中浏览：each()、current()、reset()、end()、next()、pos()和prev()
前面已经提到，每个数组都有一个内部指针指向数组中的当前元素。当使用函数each()时，就间接地使用了这个指针，但是也可以直接使用和操作这个指针。
如果创建一个新数组，那么当前指针就将被初始化，并指向数组的第一个元素。
调用next()或each()将使指针前移一个元素。调用each($array_name)会在指针前移一个位置之前返回当前元素。next()函数则有些不同——调用next($array_name)是将指针前移，然后再返回新的当前元素。
调用end($array_name)可以将指针移到数组末尾。
要反向遍历一个数组，可以使用end()和prev()函数。prev()函数和next()函数相反。它是将当前指针往回移一个位置然后再返回新的当前元素。

3.10.2 对数组的每一个元素应用任何函数：array_walk()
array_walk()函数需要三个参数。第一个是arr，也就是需要处理的数组。第二个是func，也就是用户自定义并将作用于数组中每个元素的函数。第三个参数userdata是可选的，如果使用它，它可以作为一个参数传递给我们自己的函数。
看一个销微复杂点的例子：
function my_multiply(&$value, $key, $factor)
{
$value *= $factor;
}
array_walk(&$array, 'my_multiply', 3);
在这里，我们定义了一个名为my_multiply()的函数，它可以用所提供的乘法因子去乘以数组中的每个元素。
此外，还有一个需要注意的问题是传递毵数$value的方式。在my_multiply()的函数定义中，变量前面的地址符（&）意味着$value是按引用方式传递的。按引用方式传递允许函数修改数组的内容。

3.10.3 统计数组元素个数：count()、sizeof()和array_count_values()
count()函数和sizeof()函数具有同样的用途，都可以返回数组元素的个数。可以得到一个常规标量变量中的元素个数，如果传递给这个函数的数组是一个空数组，或者是一个没有经过设定的变量，返回的数组个数就是0。
如 果调用array_count_values($array)，这个函数将会统计每个特定的值在数组$array中出现过的次数（这就是数组的基数集）。 这个函数将返回一个包含频率表的相关数组。这个数组包含数组$array中的所有值，并以这些值作为相关数组的关键字。每个关键字所对应的数值就是关键字 在数组$array中出现的次数。

3.10.4 将数组转换成标量变量：extract()
对于一个非数字索引数组，而该数组又有许多关键字-值对，可以使用函数extract()将它们转换成一系列的标量变量。
函数extract()的作用是通过一个数组创建一系列的标量变量，这些变量的名称必须是数组中关键字的名称，而变量值则是数组中的值。
extract()函数具有两个可选参数：extract_type和prefix。变量extract_type将告诉extract()函数如何处理冲突。有时可能已经存在一个和数组关键字同名的变量，该函数的默认操作是覆盖已有的变量。
两个最常用的选项是EXTR_OVERWRITE（默认值）和EXTR_PREFIX_ALL。当知道会发生特定的冲突并且希望跳过该关键字或要给它加上前缀时，可能会用到其他选项。
extract()可以提取出一个元素，该元素的关键字必须是一个有效的变量名称，这就意味着以数字开始或包含空格的关键字将被跳过。<br>";

echo "--------------------------------------------------------------------------------------------------------<br>";
echo "7,厉害了我的require include<br>";  
echo "********************************************************************************************************<br>"; 
$dir = dirname(__FILE__);
//require($dir . '../requirepage.php');
include "includepage.php";
include("includepage.php");
require 'requirepage.php';
require('requirepage.php');
echo "############################################################################################<br>";
echo "PHP的include()和require()是两种包含外部文件的方法，对于这两种方法有什么区别，很多初学者可能不是很明白。下面总结一下PHP include()和require()的区别：
1：加载失败的处理方式不同：
include()会产生一个警告，而require()则导致一个致命的错误（出现错误，脚本停止执行）
require() :如果文件不存在，会报出一个fatal error.脚本停止执行
include() : 如果文件不存在，会给出一个 warning，但脚本会继续执行
这里特别要注意的是：使用include()文件不存在时，脚本继续执行，这种情况只出现在PHP 4.3.5之前
推荐使用require_once()和include_once()，可以检测文件是否有重复包含。
2.php性能
对include()来说，在 include()执行时文件每次都要进行读取和评估；
而对于require()来说，文件只处理一次（实际上，文件内容替换了require()语句）。
这就意味着如果有包含这些指令之一的代码和可能执行多次的代码，则使用require()效率比较高。
另一方面，如果每次执行代码时相读取不同的文件，或者有通过一组文件叠代的循环，就使用include(),
因为可以给想要包括的文件名设置一个变量，当参数为include()时使用这个变量。
3.二种方式提供不同的使用弹性。
require 的使用方法如 require(“./inc.php”); 。通常放在 PHP 程式的最前面，PHP 程式在执行前，就会先读入 require 所指定引入的档案，使它变成 PHP 程式网页的一部份。
include 使用方法如 include(“./inc/.php”); 。一般是放在流程控制的处理区段中。PHP 程式网页在读到 include 的档案时，才将它读进来。这种方式，可以把程式执行时的流程简单化。
require即使在条件位FALSE的时候也会被包含，而include只会在执行到改位置时候才会去执行。
require_once() 语句在脚本执行期间包括并运行指定文件。此行为和 require() 语句类似，唯一区别是如果该文件中的代码已经被包括了，则不会再次包括。require_once()函数的作用和 require() 是几乎相同的
include_once() 语句在脚本执行期间包括并运行指定文件。此行为和 include() 语句类似，唯一区别是如果该文件中的代码已经被包括了，则不会再次包括。include_once()函数的作用和 include() 是几乎相同的
require_once的作用是会检查之前是否加载过该文件,如果没有加载则加载 如果加载过就不再次加载,比如某文件定义了一个类型 如果两次加载该文件会出现错误
以上就是PHP include()和require()方法的区别。<br>";
echo "--------------------------------------------------------------------------------------------------------<br>";
echo "8,厉害了我的......<br>";  
echo "********************************************************************************************************<br>"; 

echo "--------------------------------------------------------------------------------------------------------<br>";
echo "9,厉害了我的......<br>";  
echo "********************************************************************************************************<br>"; 

echo "--------------------------------------------------------------------------------------------------------<br>";
echo "10,厉害了我的......<br>";  
echo "********************************************************************************************************<br>"; 

echo "--------------------------------------------------------------------------------------------------------<br>";
echo "0,厉害了我的PHP函数大全<br>";  
echo "********************************************************************************************************<br>"; 
echo "usleep() 函数延迟代码执行若干微秒。
unpack() 函数从二进制字符串对数据进行解包。
uniqid() 函数基于以微秒计的当前时间，生成一个唯一的 ID。
time_sleep_until() 函数延迟代码执行直到指定的时间。
time_nanosleep() 函数延迟代码执行若干秒和纳秒。
sleep() 函数延迟代码执行若干秒。
show_source() 函数对文件进行语法高亮显示。
strip_whitespace() 函数返回已删除 PHP 注释以及空白字符的源代码文件。
pack() 函数把数据装入一个二进制字符串。
ignore_user_abort() 函数设置与客户机断开是否会终止脚本的执行。
highlight_string() 函数对字符串进行语法高亮显示。
highlight_file() 函数对文件进行语法高亮显示。
get_browser() 函数返回用户浏览器的性能。
exit() 函数输出一条消息，并退出当前脚本。
eval() 函数把字符串按照 PHP 代码来计算。
die() 函数输出一条消息，并退出当前脚本。
defined() 函数检查某常量是否存在。
define() 函数定义一个常量。
constant() 函数返回常量的值。
connection_status() 函数返回当前的连接状态。
connection_aborted() 函数检查是否断开客户机。
zip_read() 函数读取打开的 zip 档案中的下一个文件。
zip_open() 函数打开 ZIP 文件以供读取。
zip_entry_read() 函数从打开的 zip 档案项目中获取内容。
zip_entry_open() 函数打开一个 ZIP 档案项目以供读取。
zip_entry_name() 函数返回 zip 档案项目的名称。
zip_entry_filesize() 函数返回 zip 档案项目的原始大小（在压缩之前）。
zip_entry_compressionmethod() 函数返回 zip 档案项目的压缩方法。
zip_entry_compressedsize() 函数返回 zip 档案项目的压缩文件尺寸。
zip_entry_close() 函数关闭由 zip_entry_open() 函数打开的 zip 档案文件。
zip_close() 函数关闭由 zip_open() 函数打开的 zip 档案文件。
xml_set_unparsed_entity_decl_handler() 函数规定在遇到无法解析的实体名称（NDATA）声明时被调用的函数。
xml_set_processing_instruction_handler() 函数规定当解析器在 XML 文档中找到处理指令时所调用的函数。
xml_set_object() 函数允许在对象中使用 XML 解析器。
xml_set_notation_decl_handler() 函数规定当解析器在 XML 文档中找到符号声明时被调用的函数。
xml_set_external_entity_ref_handler() 函数规定当解析器在 XML 文档中找到外部实体时被调用的函数。
xml_set_element_handler() 函数建立起始和终止元素处理器。
xml_set_default_handler() 函数为 XML 解析器建立默认的数据处理器。
xml_set_character_data_handler() 函数建立字符数据处理器。
xml_parser_set_option() 函数为 XML 解析器进行选项设置。
xml_parser_get_option() 函数从 XML 解析器获取选项设置信息。
xml_parser_free() 函数释放 XML 解析器。
xml_parser_create() 函数创建 XML 解析器。
xml_parser_create_ns() 函数创建带有命名空间支持的 XML 解析器。
xml_parse_into_struct() 函数把 XML 数据解析到数组中。
xml_parse() 函数解析 XML 文档。
xml_get_error_code() 函数获取 XML 解析器错误代码。
xml_get_current_line_number() 函数获取 XML 解析器的当前行号。
xml_get_current_column_number() 函数获取 XML 解析器的当前列号。
xml_get_current_byte_index() 函数获取 XML 解析器的当前字节索引。
xml_error_string() 函数获取 XML 解析器的错误描述。
utf8_encode() 函数把 ISO-8859-1 字符串编码为 UTF-8。
utf8_decode() 函数把 UTF-8 字符串解码为 ISO-8859-1。
wordwrap() 函数按照指定长度对字符串进行折行处理。
vsprintf() 函数把格式化字符串写入变量中。
vprintf() 函数输出格式化的字符串。
vfprintf() 函数把格式化的字符串写到指定的输出流。
ucwords() 函数把字符串中每个单词的首字符转换为大写。
ucfirst() 函数把字符串中的首字符转换为大写。
trim() 函数从字符串的两端删除空白字符和其他预定义字符。
substr_replace() 函数把字符串的一部分替换为另一个字符串。
substr_count() 函数计算子串在字符串中出现的次数。
substr_compare() 函数从指定的开始长度比较两个字符串。
substr() 函数返回字符串的一部分。
strtr() 函数转换字符串中特定的字符。
strtoupper() 函数把字符串转换为大写。
strtolower() 函数把字符串转换为小写。
strtok() 函数把字符串分割为更小的字符串。
strstr() 函数搜索一个字符串在另一个字符串中的第一次出现。
strspn() 函数返回在字符串中包含的特定字符的数目。
strrpos() 函数查找字符串在另一个字符串中最后一次出现的位置。
strripos() 函数查找字符串在另一个字符串中最后一次出现的位置。
strrev() 函数反转字符串。
strrchr() 函数查找字符串在另一个字符串中最后一次出现的位置，并返回从该位置到字符串结尾的所有字符。
strpos() 函数返回字符串在另一个字符串中第一次出现的位置。
strpbrk() 函数在字符串中搜索指定字符中的任意一个。
strncmp() 函数比较两个字符串。
strncasecmp() 函数比较两个字符串。
strnatcmp() 函数使用一种“自然”算法来比较两个字符串。
strnatcasecmp() 函数使用一种“自然”算法来比较两个字符串。
strlen() 函数返回字符串的长度。
stristr() 函数查找字符串在另一个字符串中第一次出现的位置。
stripos() 函数返回字符串在另一个字符串中第一次出现的位置。
stripslashes() 函数删除由 addslashes() 函数添加的反斜杠。
stripcslashes() 函数删除由 addcslashes() 函数添加的反斜杠。
strip_tags() 函数剥去 HTML、XML 以及 PHP 的标签。
strcspn() 函数返回在找到任何指定的字符之前，在字符串查找的字符数。
strcoll() 函数比较两个字符串。
strcmp() 函数比较两个字符串。
strchr() 函数搜索一个字符串在另一个字符串中的第一次出现。
strcasecmp() 函数比较两个字符串。
str_word_count() 函数计算字符串中的单词数。
str_split() 函数把字符串分割到数组中。
str_shuffle() 函数随机地打乱字符串中的所有字符。
str_rot13() 函数对字符串执行 ROT13 编码。
str_replace() 函数使用一个字符串替换字符串中的另一些字符。
str_repeat() 函数把字符串重复指定的次数。
str_pad() 函数把字符串填充为指定的长度。
str_ireplace() 函数使用一个字符串替换字符串中的另一些字符。
sscanf() 函数根据指定的格式解析来自一个字符串的输入。
sprintf() 函数把格式化的字符串写写入一个变量中。
soundex() 函数计算字符串的 soundex 键。
similar_text() 函数计算两个字符串的匹配字符的数目。
sha1_file() 函数计算文件的 SHA-1 散列。
sha1() 函数计算字符串的 SHA-1 散列。
setlocale() 函数设置地区信息（地域信息）。
rtrim() P rtrim() 函数 
PHP String 函数
quotemeta() 函数在字符串中某些预定义的字符前添加反斜杠。
quoted_printable_decode() 函数对经过 quoted-printable 编码后的字符串进行解码，返回 8 位的字符串。
printf() 函数输出格式化的字符串。
print() 函数输出一个或多个字符串。
parse_str() 函数把查询字符串解析到变量中。
ord() 函数返回字符串第一个字符的 ASCII 值。
number_format() 函数通过千位分组来格式化数字。
nl2br() 函数在字符串中的每个新行 (\n) 之前插入 HTML 换行符 (<br />)。
nl_langinfo() 函数返回指定的本地信息。
money_format() 函数把字符串格式化为货币字符串。
metaphone() 函数计算字符串的 metaphone 键。
md5_file() 函数计算文件的 MD5 散列。
md5() 函数计算字符串的 MD5 散列。
ltrim() 函数从字符串左侧删除空格或其他预定义字符。
localeconv() 函数返回包含本地数字及货币信息格式的数组。
levenshtein() 函数返回两个字符串之间的 Levenshtein 距离。
join() 函数把数组元素组合为一个字符串。
implode() 函数把数组元素组合为一个字符串。
htmlspecialchars() 函数把一些预定义的字符转换为 HTML 实体。
html_entity_decode() chars_decode() 函数

PHP String 函数
htmlentities() 函数把字符转换为 HTML 实体。
html_entity_decode() 函数把 HTML 实体转换为字符。
hebrevc() 函数把希伯来文本从右至左的流转换为左至右的流。它也会把新行 (\n) 转换为 <br />。
hebrev() 函数把希伯来文本从右至左的流转换为左至右的流。
get_html_translation_table() 函数返回被 htmlentities() 和 htmlspecialchars() 函数使用的翻译表。
fprintf() 函数把格式化的字符串写到指定的输出流（例如：文件或数据库）。
explode() 函数把字符串分割为数组。
echo() 函数输出一个或多个字符串。
crypt() 函数返回使用 DES、Blowfish 或 MD5 加密的字符串。
crc32() 函数计算一个字符串的 crc32 多项式。
count_chars() 函数返回字符串所用字符的信息。
convert_uuencode() 函数使用 uuencode 算法对字符串进行编码。
convert_uudecode() 函数对 uuencode 编码的字符串进行解码。
convert_cyr_string() 函数把字符由一种 Cyrillic 字符转换成另一种。
chunk_split() 函数把字符串分割为一连串更小的部分。
chr() 函数从指定的 ASCII 值返回字符。
chop() 函数从字符串的末端开始删除空白字符或其他预定义字符。
bin2hex() 函数把 ASCII 字符的字符串转换为十六进制值。
addslashes() 函数在指定的预定义字符前添加反斜杠。
addcslashes() 函数在指定的字符前添加反斜杠。
xpath() 函数运行对 XML 文档的 XPath 查询。
simplexml_load_string() 函数把 XML 字符串载入对象中。
simplexml_load_file() 函数把 XML 文档载入对象中。
simplexml_import_dom() 函数把 DOM 节点转换为 SimpleXMLElement 对象。
registerXPathNamespace() 函数为下一次 XPath 查询创建命名空间语境。
getNamespace() 函数获取在 XML 文档中使用的命名空间。
getName() 函数从 SimpleXMLElement 对象获取 XML 元素的名称。
getDocNamespaces() 函数从 SimpleXMLElement 对象返回在 XML 文档中声明的命名空间。
children() 函数获取指定节点的子节点。
attributes() 函数获取 SimpleXML 元素的属性。
asXML() 函数以字符串的形式从 SimpleXMLElement 对象返回 XML 文档。
addChild() 函数向指定的 XML 节点添加一个子节点。
addAttribute() 函数给 SimpleXML 元素添加一个属性。
__construct() 函数创建一个新的 SimpleXMLElement 对象。
mysql_unbuffered_query() 函数向 MySQL 发送一条 SQL 查询（不获取 / 缓存结果）。
mysql_thread_id() 函数返回当前线程的 ID。
mysql_stat() 函数返回 MySQL 服务器的当前系统状态。
mysql_select_db() 函数设置活动的 MySQL 数据库。
mysql_result() 函数返回结果集中一个字段的值。
mysql_real_escape_string() 函数转义 SQL 语句中使用的字符串中的特殊字符。
mysql_query() 函数执行一条 MySQL 查询。
mysql_ping() 函数 Ping 一个服务器连接，如果没有连接则重新连接。
mysql_pconnect() 函数打开一个到 MySQL 服务器的持久连接。
mysql_num_rows() 函数返回结果集中行的数目。
mysql_num_fields() 函数返回结果集中字段的数。
mysql_list_processes() 函数列出 MySQL 进程。
mysql_list_dbs() 函数列出 MySQL 服务器中所有的数据库。
mysql_insert_id() 函数返回上一步 INSERT 操作产生的 ID。
mysql_info() 函数返回最近一条查询的信息。
mysql_get_server_info() 函数返回 MySQL 服务器的信息。
mysql_get_proto_info() 函数返回 MySQL 协议的信息。
mysql_get_host_info() 函数返回 MySQL 主机的信息。
mysql_get_client_info() 函数返回 MySQL 客户端信息。
mysql_free_result() 函数释放结果内存。
mysql_field_type() 函数返回结果集中指定字段的类型。
mysql_field_table() 函数返回指定字段所在的表名。
mysql_field_seek() 函数将结果集中的指针设定为指定的字段偏移量。
mysql_field_name() 函数取得结果中指定字段的字段名。
mysql_field_len() 函数返回指定字段的长度。
mysql_field_flags() 函数从结果中取得和指定字段关联的标志。
mysql_fetch_row() 函数从结果集中取得一行作为数字数组。
mysql_fetch_object() 函数从结果集（记录集）中取得一行作为对象。
mysql_fetch_lengths() 函数取得一行中每个字段的内容的长度。
mysql_fetch_field() 函数从结果集中取得列信息并作为对象返回。
mysql_fetch_assoc() 函数从结果集中取得一行作为关联数组。
mysql_fetch_array() 函数从结果集中取得一行作为关联数组，或数字数组，或二者兼有
mysql_error() 函数返回上一个 MySQL 操作产生的文本错误信息。
mysql_errno() 函数返回上一个 MySQL 操作中的错误信息的数字编码。
mysql_db_name() 函数取得 mysql_list_dbs() 调用所返回的数据库名。
mysql_data_seek() 函数移动内部结果的指针。
mysql_connect() 函数打开非持久的 MySQL 连接。
mysql_close() 函数关闭非持久的 MySQL 连接。
mysql_client_encoding() 函数返回当前连接的字符集的名称。
mysql_affected_rows() 函数返回前一次 MySQL 操作所影响的记录行数。
tanh() 函数返回双曲正切。
tan() 函数返回正切。
srand() 函数播下随机数发生器种子。
sqrt() 函数返回一个数的平方根。
sinh() 函数返回一个数的双曲正弦。
sin() 函数返回一个数的正弦。
round() 函数对浮点数进行四舍五入。
rand() 函数返回随机整数。
rad2deg() 函数把弧度数转换为角度数。
pow() 函数返回 x 的 y 次方。
pi() 函数返回圆周率的值。
octdec() 函数把八进制转换为十进制。
mt_srand() 播种 Mersenne Twister 随机数生成器。
mt_rand() 使用 Mersenne Twister 算法返回随机整数。
mt_getrandmax() 显示随机数的最大可能值。
min() 返回最小值。
max() 返回最大值。
log1p() 以返回 log(1 + x)，甚至当 x 的值接近零也能计算出准确结果。
log10() 以 10 为底的对数。
log() 返回自然对数。
lcg_value() 组合线性同余发生器。
is_nan() 判断是否为合法数值。
is_infinite() 判断是否为无限值。
is_finite() 函数判断是否为有限值。
hypot() 函数计算一直角三角形的斜边长度。
hexdec() 函数把十六进制转换为十进制。
fmod() 函数显示随机数最大的可能值。
fmod() 函数返回除法的浮点数余数。
floor() 函数向下舍入为最接近的整数。
expm1() 函数返回 exp(x) - 1，甚至当 number 的值接近零也能计算出准确结果。
exp() 函数计算 e 的指数。
deg2rad() 函数将角度转换为弧度。
decoct() 函数把十进制转换为八进制。
dechex() 函数把十进制转换为十六进制。
decbin() 函数把十进制转换为二进制。
cosh() 函数返回一个数的双曲余弦。
cos() 函数返回一个数的余弦。
ceil() 函数向上舍入为最接近的整数。
bindec() 函数把二进制转换为十进制。
base_convert() 函数在任意进制之间转换数字。
atanh() 函数返回一个角度的反双曲正切。
atan() 和 atan2() 和 atan2() 函数

PHP Math 函数
atan() 和 atan2() 和 atan2() 函数

PHP Math 函数
asinh() 函数返回一个数的反双曲正弦。
asin() 函数返回不同数值的反正弦，返回的结果是介于 -PI/2 与 PI/2 之间的弧度值。
acosh() 函数返回一个数的反双曲余弦。
acos() 函数返回一个数的反余弦。
abs() 函数返回一个数的绝对值。
mail() 函数允许您从脚本中直接发送电子邮件。
libxml_use_internal_errors() 函数禁用标准的 libxml 错误，并启用用户错误处理。
libxml_get_last_error() 函数从 libxml 错误缓冲中获取最后一个错误。
libxml_get_errors() 函数从 libxml 错误缓冲中获取错误。
libxml_clear_errors() 函数清空 libxml 错误缓冲。
setrawcookie() 函数不对 cookie 值进行 URL 编码，发送一个 HTTP cookie。
setcookie() 函数向客户端发送一个 HTTP cookie。
headers_sent() 函数检查 HTTP 报头是否发送/已发送到何处。
headers_list() 函数返回已发送的（或待发送的）响应头部的一个列表。
header() 函数向客户端发送原始的 HTTP 报头。
ftp_systype() 函数返回远程 FTP 服务器的系统类型标识符。
ftp_ssl_connect() 函数打开一个安全的 SSL-FTP 连接。
ftp_size() 函数返回指定文件的大小。
ftp_site() 函数向服务器发送 SITE 命令。
ftp_set_option() 函数设置各种 FTP 运行时选项。
ftp_rmdir() 函数删除一个目录。
ftp_rename() 函数更改 FTP 服务器上的文件或目录名。
ftp_rawlist() 函数返回指定目录中文件的详细列表。
ftp_raw() 函数向 FTP 服务器发送一个 raw 命令。
ftp_quit() 函数关闭 FTP 连接。
ftp_pwd() 函数返回当前目录名。
ftp_put() 函数把文件上传到服务器。
ftp_pasv() 函数把被动模式设置为打开或关闭。
ftp_nlist() 函数返回指定目录的文件列表。
ftp_nb_put() 函数把文件上传到服务器 (non-blocking)。
ftp_nb_get() 函数从 FTP 服务器上获取文件并写入本地文件 (non-blocking)。
ftp_nb_fput() 函数上传一个已打开的文件，并在 FTP 服务器上把它保存为文件 (non-blocking)。
ftp_nb_fget() 函数从 FTP 服务器上下载一个文件并保存到本地已经打开的一个文件中 (non-blocking)。
ftp_nb_continue() 函数连续获取 / 发送文件。
ftp_mkdir() 函数在 FTP 服务器上建立新目录。
ftp_mdtm() 函数返回指定文件的最后修改时间。
ftp_login() 函数登录 FTP 服务器。
ftp_get() 函数从 FTP 服务器上下载一个文件。
ftp_get_option() 函数返回当前 FTP 连接的各种不同的选项设置。
ftp_fput() 函数上传一个已经打开的文件到 FTP 服务器。
ftp_fget() 函数从 FTP 服务器上下载一个文件并保存到本地一个已经打开的文件中。
ftp_exec() 函数请求在 FTP 服务器上执行一个程序或命令。
ftp_delete() 函数删除 FTP 服务器上的一个文件。
ftp_connect() 函数建立一个新的 FTP 连接。
ftp_close() 函数关闭 FTP 连接。
ftp_chmod() 函数设置 FTP 服务器上指定文件的权限。
ftp_chdir() 函数改变 FTP 服务器上的当前目录。
ftp_cdup() 函数把当前目录改变为 FTP 服务器上的父目录。
ftp_alloc() 函数为要上传到 FTP 服务器的文件分配空间。
filter_var() 函数通过指定的过滤器过滤变量。
filter_var_array() 函数获取多项变量，并进行过滤。
filter_list() 函数返回包含所有得到支持的过滤器的一个数组。
filter_input_array() 函数从脚本外部获取多项输入，并进行过滤。
filter_input() 函数从脚本外部获取输入，并进行过滤。
filter_id() 函数返回指定过滤器的 ID 号。
filter_has_var() 函数检查是否存在指定输入类型的变量。
unlink() 函数删除文件。
umask() 函数改变当前的 umask。
touch() 函数设置指定文件的访问和修改时间。
tmpfile() 函数以读写（w+）模式建立一个具有唯一文件名的临时文件。
tempnam() 函数创建一个具有唯一文件名的临时文件。
symlink() 函数创建符号连接。
stat() 函数返回关于文件的信息。
set_file_buffer() 函数设置打开文件的缓冲大小。
rmdir() 函数删除空的目录。
rewind() 函数将文件指针的位置倒回文件的开头。
rename() 函数重命名文件或目录。
realpath() 函数返回绝对路径。
readlink() 函数返回符号连接指向的目标。
readfile() 函数输出一个文件。
popen() 函数打开进程文件指针。
pclose() 函数关闭由 popen() 打开的管道。
pathinfo() 函数以数组的形式返回文件路径的信息。
parse_ini_file() 函数解析一个配置文件，并以数组的形式返回其中的设置。
move_uploaded_file() 函数将上传的文件移动到新位置。
mkdir() 函数创建目录。
lstat() 函数返回关于文件或符号连接的信息。
linkinfo() 函数返回连接的信息。
link() 函数建立一个硬连接。
is_writeable() 函数判断指定的文件是否可写。
is_writable() 函数判断指定的文件是否可写。
is_uploaded_file() 函数判断指定的文件是否是通过 HTTP POST 上传的。
is_readable() 函数判断指定文件名是否可读。
is_link() 函数判断指定文件名是否为一个符号连接。
is_file() 函数检查指定的文件名是否是正常的文件。
is_executable() 函数检查指定的文件是否可执行。
is_dir() 函数检查指定的文件是否是目录。
glob() 函数返回匹配指定模式的文件名或目录。
fwrite() 函数写入文件（可安全用于二进制文件）。
ftruncate() 函数把文件截断到指定的长度。
ftell() 函数在打开文件中的当前位置。
fstat() 函数返回关于打开文件的信息。
fseek() 函数在打开的文件中定位。
fscanf() 函数根据指定的格式对来自打开的文件的输入进行解析。
fread() 函数读取文件（可安全用于二进制文件）。
fputs() 函数写入文件（可安全用于二进制文件）。
fputcsv() 函数将行格式化为 CSV 并写入一个打开的文件。
fpassthru() 函数输出文件指针处的所有剩余数据。
fopen() 函数打开文件或者 URL。
fnmatch() 函数根据指定的模式来匹配文件名或字符串。
flock() 函数锁定或释放文件。
filetype() 函数返回指定文件或目录的类型。
filesize() 函数返回指定文件的大小。
fileperms() 函数返回文件或目录的权限。
fileowner() 函数返回文件的所有者。
filemtime() 函数返回文件内容上次的修改时间。
fileinode() 函数返回文件的 inode 编号。
filegroup() 函数返回指定文件的组 ID。
filectime() 函数返回指定文件的上次 inode 修改时间。
fileatime() 函数返回指定文件的上次访问时间。
file_put_contents() 函数把一个字符串写入文件中。
file_get_contents() 函数把整个文件读入一个字符串中。
file_exists() 函数检查文件或目录是否存在。
file() 函数把整个文件读入一个数组中。
fgetss() 函数从打开的文件中读取一行并过滤掉 HTML 和 PHP 标记。
fgets() 函数从文件指针中读取一行。
fgetcsv() 函数从文件指针中读入一行并解析 CSV 字段。
fgetc() 函数从文件指针中读取一个字符。
fflush() 函数将缓冲内容输出到文件。
feof() 函数检测是否已到达文件末尾 (eof)。
fclose() 函数关闭一个打开文件。
diskfreespace() 函数返回目录中的可用空间。该函数是 disk_free_space() 函数的别名。
disk_total_space() 函数返回指定目录的磁盘总大小。
disk_free_space() 函数返回目录中的可用空间
dirname() 函数返回路径中的目录部分。
clearstatcache() 函数拷贝文件。
clearstatcache() 函数清除文件状态缓存。
chown() 函数改变指定文件的所有者。
chmod() 函数改变文件模式。
chgrp() 函数改变文件所属的组。
basename() 函数返回路径中的文件名部分。
set_exception_handler() handler() 函数

PHP Error 和 Logging 函数
set_exception_handler() 函数设置用户自定义的异常处理函数。
set_error_handler() 函数设置用户自定义的错误处理函数。
restore_exception_handler() 函数恢复之前的异常处理程序，该程序是由 set_exception_handler() 函数改变的。
restore_error_handler() 函数恢复之前的错误处理程序，该程序是由 set_error_handler() 函数改变的。
error_reporting() 设置 PHP 的报错级别并返回当前级别。
error_log() 函数向服务器错误记录、文件或远程目标发送一个错误。
error_get_last() 函数获取最后发生的错误。
debug_print_backtrace() 函数输出 backtrace。
debug_backtrace() cktrace() 函数

PHP Error 和 Logging 函数
scandir() 函数返回一个数组，其中包含指定路径中的文件和目录。
rewinddir() 函数重置由 opendir() 打开的目录句柄。
readdir() 函数返回由 opendir() 打开的目录句柄中的条目。
opendir() 函数打开一个目录句柄，可由 closedir()，readdir() 和 rewinddir() 使用。
getcwd() 函数返回当前目录。
closedir() 函数关闭由 opendir() 函数打开的目录句柄。
dir() 函数打开一个目录句柄，并返回一个对象。这个对象包含三个方法：read() , rewind() 以及 close()。
chroot() 函数把当前进程的根目录改变为指定的目录。
chdir() 函数把当前的目录改变为指定的目录。
time() 函数返回当前时间的 Unix 时间戳。
strtotime() 函数将任何英文文本的日期时间描述解析为 Unix 时间戳。
strptime() 函数解析由 strftime() 生成的日期／时间。
strftime() 函数根据区域设置格式化本地时间／日期。
mktime() 函数返回一个日期的 Unix 时间戳。
microtime() 函数返回当前 Unix 时间戳和微秒数。
localtime() 函数返回本地时间（一个数组）。
idate() 函数将本地时间/日期格式化为整数。
gmstrftime() 函数根据本地区域设置格式化 GMT/UTC 时间／日期。
gmmktime() 函数取得 GMT 日期的 UNIX 时间戳。
gmdate() 函数格式化 GMT/UTC 日期/时间。
gettimeofday() 函数返回一个包含当前时间信息的数组。
getdate() 函数取得日期／时间信息。
date() 函数格式化一个本地时间／日期。
date_sunset() 函数返回指定的日期与地点的日落时间。
date_sunrise() 函数返回指定的日期与地点的日出时间。
date_default_timezone_set() 函数设置用在脚本中所有日期/时间函数的默认时区。
date_default_timezone_get() 函数返回脚本中所有日期时间函数所使用的默认时区。
checkdate() 函数验证一个格里高里日期。
UnixToJD() 函数把 Unix 时间戳转换为儒略日计数。
JulianToJD() 函数把儒略历转换为儒略日计数。
JewishToJD() 函数把犹太历法转换为儒略日计数。
JDToUnix() 函数把儒略日计数转换为 Unix 时间戳。
JDToGregorian() lian() 函数

PHP Array 函数
JDToGregorian() wish() 函数

PHP Array 函数
JDToGregorian() 函数把儒略日计数转换为格利高里历法。
JDToFrench() 函数把儒略日计数转换为法国共和国历法。
JDMonthName() 函数返回指定历法的月份字符串。
JDDayOfWeek() 函数返回日期在周几。
GregorianToJD() 函数将格利高里历法转换成为儒略日计数。
FrenchToJD() 函数将法国共和历法转换成为儒略日计数。
easter_days() 函数返回指定年份的复活节与 3 月 21 日之间的天数。
easter_date() 函数返回指定年份的复活节午夜的 Unix 时间戳。
cal_to_jd() 函数把指定的日期转换为儒略日计数。
cal_info() 函数返回一个数组，其中包含了关于给定历法的信息。
cal_from_jd() 函数把儒略日计数转换为指定历法的日期。
cal_days_in_month() 函数针对指定的年份和日历，返回一个月中的天数。
usort() 函数使用用户自定义的函数对数组排序。
uksort() 函数使用用户自定义的比较函数按照键名对数组排序，并保持索引关系。
uasort() 函数使用用户自定义的比较函数对数组排序，并保持索引关联（不为元素分配新的键）。
sort() 函数按升序对给定数组的值排序。
sizeof() 函数计算数组中的单元数目或对象中的属性个数。
shuffle() 函数把数组中的元素按随机顺序重新排列。
rsort() 函数对数组的元素按照键值进行逆向排序。与 arsort() 的功能基本相同。
reset() 函数把数组的内部指针指向第一个元素，并返回这个元素的值。
range() 函数创建并返回一个包含指定范围的元素的数组。
prev() HP prev() 函数

PHP Array 函数
pos() 函数是 current() 函数 的别名。它可返回数组中当前元素的值。
next() 函数把指向当前元素的指针移动到下一个元素的位置，并返回当前元素的值。
natsort() 函数用自然顺序算法对给定数组中的元素排序。
natcasesort() 函数用不区分大小写的自然顺序算法对给定数组中的元素排序。
list() 函数用数组中的元素为一组变量赋值。
ksort() 函数按照键名对数组排序，为数组值保留原来的键。
krsort() 函数将数组按照键逆向排序，为数组值保留原来的键。
key() 函数返回数组内部指针当前指向元素的键名。
in_array() 函数在数组中搜索给定的值。
extract() extract() 函数

PHP Array 函数
end() 函数将数组内部指针指向最后一个元素，并返回该元素的值（如果成功）。
each() 函数生成一个由数组当前内部指针所指向的元素的键名和键值组成的数组，并把内部指针向前移动。
current() 函数返回数组中的当前元素（单元）。
count() 函数计算数组中的单元数目或对象中的属性个数。
compact() 函数创建一个由参数所带变量组成的数组。如果参数中存在数组，该数组中变量的值也会被获取。
asort() 函数对数组进行排序并保持索引关系。主要用于对那些单元顺序很重要的结合数组进行排序。
arsort() 函数对数组进行逆向排序并保持索引关系。主要用于对那些单元顺序很重要的结合数组进行排序。
array_walk_recursive() cursive() 函数

PHP Array 函数
array_walk() 函数对数组中的每个元素应用回调函数。如果成功则返回 TRUE，否则返回 FALSE。
array_values() 函数返回一个包含给定数组中所有键值的数组，但不保留键名。
array_unshift() 函数在数组开头插入一个或多个元素。
array_unique() 函数移除数组中的重复的值，并返回结果数组。
array_uintersect_assoc() 函数带索引检查计算数组的交集，用回调函数比较数据。
array_uintersect() 函数计算数组的交集，用回调函数比较数据。
array_udiff_uassoc() 函数返回 array1 数组中存在但其它数组中都不存在的部分。返回的数组中键名保持不变。
array_udiff_assoc() 函数返回 array1 中存在但其它数组中都不存在的部分。
array_udiff() 函数返回一个数组，该数组包括了所有在被比较数组中，但是不在任何其它参数数组中的值，键名保留不变。
array_sum() 函数返回数组中所有值的总和。
array_splice() 函数与 array_slice() 函数类似，选择数组中的一系列元素，但不返回，而是删除它们并用其它值代替。
array_slice() 函数在数组中根据条件取出一段值，并返回。
array_shift() 函数删除数组中的第一个元素，并返回被删除元素的值。
array_search() 函数与 in_array() 一样，在数组中查找一个键值。如果找到了该值，匹配元素的键名会被返回。如果没找到，则返回 false。
array_reverse() 函数将原数组中的元素顺序翻转，创建新的数组并返回。如果第二个参数指定为 true，则元素的键名保持不变，否则键名将丢失。
array_reduce() 函数用回调函数迭代地将数组简化为单一的值。如果指定第三个参数，则该参数将被当成是数组中的第一个值来处理，或者如果数组为空的话就作为最终返回值。
array_rand() 函数从数组中随机选出一个或多个元素，并返回。
array_push() 函数向第一个参数的数组尾部添加一个或多个元素（入栈），然后返回新数组的长度。
array_product() 函数计算并返回数组中所有值的乘积。
array_pop() 函数删除数组中的最后一个元素。
array_pad() 函数向一个数组插入带有指定值的指定数量的元素。
array_multisort() 函数对多个数组或多维数组进行排序。
array_merge_recursive() 函数与 array_merge() 函数 一样，将一个或多个数组的元素的合并起来，一个数组中的值附加在前一个数组的后面。并返回作为结果的数组。
array_merge() 函数把两个或多个数组合并为一个数组。
array_map() 函数返回用户自定义函数作用后的数组。回调函数接受的参数数目应该和传递给 array_map() 函数的数组数目一致。
array_keys() 函数返回包含数组中所有键名的一个新数组。
array_key_exists() 函数判断某个数组中是否存在指定的 key，如果该 key 存在，则返回 true，否则返回 false。
array_intersect_ukey() 函数用回调函数比较键名来计算数组的交集。
array_intersect_uassoc() 函数使用用户自定义的回调函数计算数组的交集，用回调函数比较索引。
array_intersect_key() 函数使用键名比较计算数组的交集。
array_intersect_assoc() 函数返回两个或多个数组的交集数组。
array_intersect() 函数返回两个或多个数组的交集数组。
array_flip() 函数返回一个反转后的数组，如果同一值出现了多次，则最后一个键名将作为它的值，所有其他的键名都将丢失。
array_filter() 函数用回调函数过滤数组中的元素，如果自定义过滤函数返回 true，则被操作的数组的当前值就会被包含在返回的结果数组中， 并将结果组成一个新的数组。如果原数组是一个关联数组，键名保持不变。
array_fill() 函数用给定的值填充数组，返回的数组有 number 个元素，值为 value。返回的数组使用数字索引，从 start 位置开始并递增。如果 number 为 0 或小于 0，就会出错。
array_diff_ukey() 返回一个数组，该数组包括了所有出现在 array1 中但是未出现在任何其它参数数组中的键名的值。注意关联关系保留不变。与 array_diff() 不同的是，比较是根据键名而不是值来进行的。
array_diff_uassoc() 函数使用用户自定义的回调函数 (callback) 做索引检查来计算两个或多个数组的差集。返回一个数组，该数组包括了在 array1 中但是不在任何其他参数数组中的值。
array_diff_key() 函数返回一个数组，该数组包括了所有在被比较的数组中，但是不在任何其他参数数组中的键。
array_diff_assoc() 函数返回两个数组的差集数组。该数组包括了所有在被比较的数组中，但是不在任何其他参数数组中的键和值。
array_diff() 函数返回两个数组的差集数组。该数组包括了所有在被比较的数组中，但是不在任何其他参数数组中的键值。
array_count_values() 函数用于统计数组中所有值出现的次数。
array_combine() 函数通过合并两个数组来创建一个新数组，其中的一个数组是键名，另一个数组的值为键值。
array_chunk() 函数把一个数组分割为新的数组块。
array_change_key_case() 函数将数组的所有的 KEY 都转换为大写或小写。
array() 创建数组，带有键和值。如果在规定数组时省略了键，则生成一个整数键，这个 key 从 0 开始，然后以 1 进行递增。";
echo "<br>";
echo "--------------------------------------------------------------------------------------------------------<br>"; 
?>   
</h3>
</body>
</html>