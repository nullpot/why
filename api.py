#!/usr/bin/env python2
# -*- coding: utf-8 -*-

import json
import os
import urllib2
from urllib import urlencode
from flask import Flask, request
from werkzeug.exceptions import BadRequest

yahoo_app_id = os.environ.get('YAHOO_APP_ID', 'dj0zaiZpPTJVUXFvODhwankydCZzPWNvbnN1bWVyc2VjcmV0Jng9ZWQ-')
url_extract = 'http://jlp.yahooapis.jp/KeyphraseService/V1/extract'
headers = {
    'Host': 'jlp.yahooapis.jp',
    'User-Agent': 'Yahoo AppID: %s' % (yahoo_app_id,),
    'Content-Type': 'application/x-www-form-urlencoded',
}
app = Flask(__name__)


def get_data(message):
    data = urlencode({'sentence': message.encode('utf-8'), 'output': 'json'})
    req = urllib2.Request(url_extract, data, headers=headers)
    res = urllib2.urlopen(req)
    try:
        res = urllib2.urlopen(req)
    except urllib2.URLError as e:
        # FIXME
        return (e.read(), 500, {'Content-Type': 'text/plain'})
    try:
        d = sorted(json.loads(res.read()).items(), key=lambda x: x[1])
        return (d.pop()[0], 200, {'Content-Type': 'text/plain'})
    except AttributeError as e:
        return ('Unknown Error has occurred: %s' % (e,), 500, {'Content-Type': 'text/plain'})
    except Exception as e:
        # FIXME
        return ('%s' % (e,), 500, {'Content-Type': 'text/plain'})


@app.route('/', methods=['POST'])
def api():
    try:
        message = request.get_json(force=True)['message']
    except BadRequest as e:
        return ('Invalid Request: Request content is not JSON type', 400)
    except KeyError:
        return ("Invalid Request: Key 'message' is not found", 400)
    return get_data(message)

if __name__ == '__main__':
    app.run(host='0.0.0.0', port=80)
