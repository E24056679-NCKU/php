#!/usr/bin/python3
import time
import sys

if str(sys.argv[1]) == "image" :
    print("image")
    print(sys.argv)
    f = open(sys.argv[2], 'r');
    if f :
        ff = open(sys.argv[2] + "_imgok", "w");
elif str(sys.argv[1]) == "text" :
    print("text")
    print(sys.argv)
    f = open(sys.argv[2] + "_txt", "w");
else :
    print("NA")
time.sleep(30)
