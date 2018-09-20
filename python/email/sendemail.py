#!/usr/bin/python
# -*- coding: UTF-8 -*-

import smtplib
from email.mime.text import MIMEText
from email.header import Header

# 第三方 SMTP 服务
mail_host = "smtp.exmail.qq.com"  # 设置服务器
mail_user = "sales@qeebey.com"  # 用户名
mail_pass = "Grow@699757"  # 口令

sender = 'sales@qeebey.com'  # 发送者邮箱
receivers = ['tech@ipasspay.com']  # 接收邮件，可设置为你的QQ邮箱或者其他邮箱

message = MIMEText('这是内容，可以拓展的', 'plain', 'utf-8')
message['From'] = Header("这是header头From", 'utf-8')
message['To'] = Header("这是header头To", 'utf-8')

subject = '这是邮件的标题'
message['Subject'] = Header(subject, 'utf-8')

try:
    smtpObj = smtplib.SMTP()
    smtpObj.connect(mail_host, 25)  # 25 为 SMTP 端口号
    smtpObj.login(mail_user, mail_pass)
    smtpObj.sendmail(sender, receivers, message.as_string())
    print("邮件发送成功")
except smtplib.SMTPException:
    print("Error: 无法发送邮件")