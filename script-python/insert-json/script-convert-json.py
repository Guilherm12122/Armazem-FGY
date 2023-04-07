# -*- coding: utf-8 -*-
"""
Created on Fri Mar 17 05:42:24 2023

@author: guilh
"""
#importando packages
import os
import json
import requests


#função para obtêr os dados da requisição da API php
def datajson():
    request = requests.get("http://localhost/MyAPI/api/Produtos/").text
    request_formated = request[865:]
    json_object = json.loads(request_formated)
    data_json = json.dumps(json_object['data'])
    return data_json

#função que escreve os dados em um arquivo local json
def filewrite():
    try:
      file = open("result.json", "a+")
    except OSError:
       return print("Não deu para abrir o arquivo")  
    if(os.path.getsize('result.json') > 0):
        file.truncate(0)
        file.write(datajson())
    else:
        file.write(datajson())
    file.close()
    return "ok"

result = filewrite()

