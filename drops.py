#!/usr/bin/env python
# -*- coding: utf-8 -*-
# @Date    : 2018-10-15 14:21:13
# @Author  : Sp4ce
# @Github  : https://github.com/NS-Sp4ce

import os
import re
import time
import pymysql

path = ""  # 乌云知识库文件夹目录


def getFiles(path):
    dirs = os.listdir(path)  # 得到文件夹下的所有文件名称
    #print(dirs)
    file = []
    i = 0
    for dir in dirs:  # 遍历文件夹
        file.append(dir)
        i += 1
    # print(files)
    print('文件夹读取完毕，共有'+str(i)+'个文件')
    return file #返回file

def insertDB(string):
    url='/content/'+titles
    conn=pymysql.connect(host='localhost', port=3306, user='root', password="", db='wooyun', charset='utf8') #定义数据库链接
    cur = conn.cursor()
    insert_sql ="""INSERT INTO drops (title,link) VALUES ('%s','%s');"""
    cur.execute(insert_sql%(string,url))
    conn.commit()
    #time.sleep(0.5)

def getTitle(file):
    global titles
    for titles in file:
        #判断是否是文件夹，不是文件夹才打开
        if not os.path.isdir(path + '\\' + titles): 
            #打开文件
            with open(path + '\\' + titles, 'r',encoding='utf-8') as files:
                p1 = re.compile('<title>([\s\S]*)</title>') #将正则表达式编译成 p1 对象
                try:
                    for line in files:
                        match1 = p1.search(line)#匹配
                        #print(match1)
                        if match1:
                            string=match1.group(0)
                            string=string.replace('<title>','')
                            string=string.replace(' | WooYun知识库</title>','')#标题处理
                    try:
                        insertDB(string)
                        print('[+]' + string + '<->插入成功')
                    except:
                        print('[-]' + string + '<->插入失败')
                        fo = open('error.txt', "ab+") #失败记录
                        fo.write(('\r''[-]' + string + "--------插入失败" + '\r\n').encode('UTF-8'))
                        fo.close()
                      
                except:
                    fo = open('error.txt', "ab+")#失败记录
                    fo.write(('\r''[-]' + titles + "--------获取失败" + '\r\n').encode('UTF-8'))
                    fo.close()
    return titles


if __name__ == "__main__":
    getTitle(getFiles(path))
