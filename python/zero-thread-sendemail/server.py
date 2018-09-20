# !/usr/bin/python
# -*- coding: UTF-8 -*-
import zerorpc
import thread
import time
from sendemail import sendemail

class HelloRPC(object):
    # 为线程定义一个函数
    def hello(self, name):
        if name:
            try:
                thread.start_new_thread(sendemail())
                thread.start_new_thread(sendemail())
                print "ok"
            except:
                print "Error:unable to start thread"

s = zerorpc.Server(HelloRPC())
s.bind("tcp://127.0.0.1:4242")
s.run()