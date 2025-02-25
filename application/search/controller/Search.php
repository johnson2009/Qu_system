<?php
/**版权信息:
*开发者:小松子
*时间:2020.7.14
*个人博客:http://www.xskj.store(更多源码等着你)
*本人qq:1829134124
*官方qq交流群:
*程序名称:小松数据管理系统(获取程序请到我的博客下载)
**/
namespace app\search\controller;
use think\Controller;
use think\helper;
use think\Db;
header("content-type:text/html; charset=utf-8");//设置php编码
class Search extends Controller
{

public function searchIndex()
{

return $this->fetch('/searchIndex');

}

//xs_bank3表查询方法
public function search()
{

//获取请求数据
$question=input('get.question');
$keyword=input('get.keyword');
//数据库操作
$qdata=Db::name('bank3')->where('question','like','%'.$question.'%')->select();//题目查询
$kdata=Db::name('bank3')->where('question','like','%'.$keyword.'%')->select();//题目关键词查询

/*
*数据查询遍历输出:
*/
//题目遍历输出
echo "线路一(题目查询):<br>";

if(!empty($question)){     //判断$question是否为空(基于搜索页面search.html页面已经判断的前提下)

if(empty($qdata)){       //判断查询数据是否存在！
echo  "抱歉！没有该题目存在！<br>";
}
else{
for($count=0;$count<count($qdata);$count++)//遍历查询数据结果
{
//这里的"\"为转义字符

echo "<br><font size=\"3\" color=\"#00FF00\">题目序号:</font>".$qdata[$count]["ID"]."<br>";//题目ID
echo "<font size=\"3\" color=\"#00FF00\">题目:</font>".$qdata[$count]["question"]."<br>";//题目
echo "<font size=\"3\" color=\"#00FF00\">答案:</font>".$qdata[$count]["answer"]."<br>";//答案
echo "<font size=\"3\" color=\"#00FF00\">更新时间:</font>".$qdata[$count]["update_time"]."<br>";//题目更新时间
echo "<font size=\"3\" color=\"#00FF00\">题目分类:</font>".$qdata[$count]["type"]."<br>";//题目类别
}
}

}
else{
echo "您还没有输入题目！";
}




//关键词查询结果遍历输出
echo "<br>线路二(关键词查询):<br>";

//增加判断$keyword是否为空
if(empty($keyword)){
echo "<br>没有关键词输入！";
exit;//结束程序运行
}
if(!empty($kdata)){
for($count1=0;$count1<count($kdata);$count1++)
{
echo "<br><font size=\"3\" color=\"#00FF00\">题目序号:</font>".$kdata[$count1]["ID"]."<br>";//题目ID
echo "<font size=\"3\" color=\"#00FF00\">题目:</font>".$kdata[$count1]["question"]."<br>";//题目
echo "<font size=\"3\" color=\"#00FF00\">答案:</font>".$kdata[$count1]["answer"]."<br>";//答案
echo "<font size=\"3\" color=\"#00FF00\">更新时间:</font>".$kdata[$count1]["update_time"]."<br>";//题目更新时间
echo "<font size=\"3\" color=\"#00FF00\">题目分类:</font>".$kdata[$count1]["type"]."<br>";//题目类别
}
}
else{
echo "抱歉！该关键词不存在";
}
//调用公共函数commen.php中的record()方法记录访问者ip信息
record();
}










//xs_bank2表查询方法
public function search2()
{
//获取请求数据
$question=input('get.question');
$keyword=input('get.keyword');
//数据查询xs_bank2表操作
$qdata=Db::name('bank2')->where('topic','like','%'.$question.'%')->select();//题目查询
$kdata=Db::name('bank2')->where('topic','like','%'.$keyword.'%')->select();//题目关键词查询
//题目遍历输出
/*
*数据查询遍历输出:
*/
//题目遍历输出
echo "线路一(题目查询):<br>";

if(!empty($question)){     //判断$question是否为空(基于搜索页面search.html页面已经判断的前提下)

if(empty($qdata)){       //判断查询数据是否存在！
echo  "抱歉！没有该题目不存在！<br>";
}
else{

for($count=0;$count<count($qdata);$count++)//遍历查询数据结果
{
//这里的"\"为转义字符
echo "<br><font size=\"3\" color=\"#00FF00\">题目序号:</font>".$qdata[$count]["id"]."<br>";//题目序号
echo "<font size=\"3\" color=\"#00FF00\">题目:</font>".$qdata[$count]["topic"]."<br>";//题目
echo "<font size=\"3\" color=\"#00FF00\">选项:</font>".$qdata[$count]["answers"]."<br><br>";//题目选项
echo "<font size=\"3\" color=\"#00FF00\">答案:</font>".$qdata[$count]["correct"]."<br>";//题目答案 (数组形式内含json)
}
}

}
else{
echo "您还没有输入题目！";
}
}




//xs_bank1表查询方法
public function search1()
{

//获取请求数据
$question=input('get.question');
$keyword=input('get.keyword');
//数据库操作
$qdata=Db::name('bank1')->where('question','like','%'.$question.'%')->select();//题目查询
$kdata=Db::name('bank1')->where('question','like','%'.$keyword.'%')->select();//题目关键词查询

/*
*数据查询遍历输出:
*/
//题目遍历输出
echo "线路一(题目查询):<br>";

if(!empty($question)){     //判断$question是否为空(基于搜索页面search.html页面已经判断的前提下)

if(empty($qdata)){       //判断查询数据是否存在！
echo  "抱歉！没有该题目存在！<br>";
}
else{
for($count=0;$count<count($qdata);$count++)//遍历查询数据结果
{
//这里的"\"为转义字符

echo "<br><font size=\"3\" color=\"#00FF00\">题目序号:</font>".$qdata[$count]["ID"]."<br>";
echo "<font size=\"3\" color=\"#00FF00\">原题目:</font>".$qdata[$count]["yquestion"]."<br>";
echo "<font size=\"3\" color=\"#00FF00\">题目:</font>".$qdata[$count]["question"]."<br>";//提示
echo "<font size=\"3\" color=\"#00FF00\">答案1:</font>".$qdata[$count]["answer1"]."<br>";//提示
echo "<font size=\"3\" color=\"#00FF00\">答案2:</font>".$qdata[$count]["answer2"]."<br>";//提示
echo "<font size=\"3\" color=\"#00FF00\">题目解析:</font>".$qdata[$count]["jx"]."<br>";
echo "<font size=\"3\" color=\"#00FF00\">题目分类:</font>".$qdata[$count]["classify"]."<br>";//提示
}
}

}
else{
echo "您还没有输入题目！";
}




//关键词查询结果遍历输出
echo "<br>线路二(关键词查询):<br>";

//增加判断$keyword是否为空
if(empty($keyword)){
echo "<br>没有关键词输入！";
exit;//结束程序运行
}
if(!empty($kdata)){
for($count1=0;$count1<count($kdata);$count1++)
{
echo "<br><font size=\"3\" color=\"#00FF00\">题目序号:</font>".$kdata[$count1]["ID"]."<br>";
echo "<font size=\"3\" color=\"#00FF00\">原题目:</font>".$kdata[$count1]["yquestion"]."<br>";
echo "<font size=\"3\" color=\"#00FF00\">问题:</font>".$kdata[$count1]["question"]."<br>";//提示
echo "<font size=\"3\" color=\"#00FF00\">答案1:</font>".$kdata[$count1]["answer1"]."<br>";//提示
echo "<font size=\"3\" color=\"#00FF00\">答案2:</font>".$kdata[$count1]["answer2"]."<br>";//提示
echo "<font size=\"3\" color=\"#00FF00\">题目解析:</font>".$kdata[$count1]["jx"]."<br>";
echo "<font size=\"3\" color=\"#00FF00\">题目分类:</font>".$kdata[$count1]["classify"]."<br>";//提示
}
}
else{
echo "抱歉！该关键词不存在";
}
//调用公共函数commen.php中的record()方法记录访问者ip信息
record();
}
}