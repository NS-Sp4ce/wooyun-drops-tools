# Wooyun-Drops-Tools

乌云知识库整理工具

# 测试通过的服务器配置

 - Windows Server 2016 DC
 - Apache 2.4.25
 - PHP 5.6.30
 - MySQL 5.7.17-log

## 知识库

知识库均为静态内容

在wooyun数据库中新建drops表，SQL如下

```sql
CREATE TABLE `drops` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `link` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1270 DEFAULT CHARSET=utf8
```

# 预览效果

![屏幕截图](https://i.imgur.com/YLvOj5i.png)

# 部署教程

1. 下载解压`漏洞库`并设置好`conn.php`数据库连接文件，将漏洞库中的`mysql`文件移入`mysql`的`data`目录
2. 解压完毕后在漏洞库所属文件夹**根目录**创建**content**目录，并将知识库**除css目录、js目录、full目录**外所有文件移入
3. 在**漏洞库根目录**创建目录 **static\dropsjs\js\ ** 和 **static\drops\ ** ，将**知识库中的css目录和full移入\static\drops**，将知识库中的**js目录**移入**static\dropsjs\js\ **
4. 在`drops.py`中的`path = ""  # 乌云知识库文件夹目录`设置好知识库根目录，然后运行即可将文件路径入库
5. 下载`layui.zip`并解压到**漏洞库**根目录
6. 下载`drops.php`并移动到**漏洞库**根目录
7. 测试访问


# 所需文件下载地址

## 知识库：

链接：https://pan.baidu.com/s/1CZVZxdHzl7L8y3dGWN-aOQ 
提取码：uuuo

## 漏洞库

链接：https://pan.baidu.com/s/1LGSwDmVwtlffyM8I-1hQzw 
提取码：8duw

# 问题反馈
开issues或Email:Sp4ce.sec@gmail.com
