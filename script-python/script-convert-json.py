# -*- coding: utf-8 -*-
"""
Created on Fri Mar 17 05:42:24 2023

@author: guilh
"""
#importando packages
import os
import json
import requests
import boto3

#parâmetros para acessar o bucket s3
s3 = boto3.resource(
    service_name='s3',
    region_name='sa-east-1',
    aws_access_key_id = '*********',
    aws_secret_access_key='********'
)

#função para obtêr os dados da requisição da API php
def datajson():
    request = requests.get("http://localhost/MyAPI/api/Produtos/").text
    request_formated = request[865:]
    json_object = json.loads(request_formated)
    data_json = json_object['data']
    return data_json

#função que converte o resultado da requisição da API em uma string texto
def convertjson():
    request = requests.get("http://localhost/MyAPI/api/Produtos/").text
    request_formated = request[865:]
    json_object = json.loads(request_formated)
    return request_formated

#função que escreve os dados em um arquivo local json
def filewrite():
    try:
      file = open("result.json", "a+")
    except OSError:
       return print("Não deu para abrir o arquivo")  
    if(os.path.getsize('result.json') > 0):
        file.truncate(0)
        file.write(convertjson())
    else:
        file.write(convertjson())
    file.close()
    return "ok"

#função envia objeto json para um bucket s3 na AWS
def sendtoaws():
    bucket = 'bucket-market-data'
    s3.Object(bucket, 'result.json').upload_file(Filename = 'result.json')

dados = convertjson()
result = filewrite()
awsenvy = sendtoaws()
