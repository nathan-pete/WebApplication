from utils.video import VideoStream
from flask import Response
from flask import Flask
from flask import render_template
import threading
import argparse
import datetime
import imutils
import time
import cv2

outputFrame = None
lock = threading.Lock()

app = Flask(_name_)

vs = VideoStream(src=0.start()
                 time.sleep(2.0)

@app.route("/")
def index():
    return
render_template("index.html")

camera =  cv2.VideoCapture(0)
