# -*- coding: utf-8 -*-
"""
Created on Fri Mar 17 05:42:24 2023

@author: guilh
"""
import os
import json
import requests

"""
request = requests.get("http://localhost/MyAPI/api/Produtos/").text
request_formated = request[865:]
json_object = json.loads(request_formated)
dados = json_object['data']
#print(dados)

file = open("result.json", "a")
file.write(request_formated)
file.close()
"""

def convertjson():
    request = requests.get("http://localhost/MyAPI/api/Produtos/").text
    request_formated = request[865:]
    json_object = json.loads(request_formated)
    return request_formated

def filewrite():
    file = open("result.json", "a+")
    if(os.path.getsize('result.json') > 0):
        file.truncate(0)
        file.write(convertjson())
    else:
        file.write(convertjson())
    file.close()
    return "ok"

dados = convertjson()
result = filewrite()
