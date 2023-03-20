import boto3
import numpy as np
import pandas as pd
import json
from io import StringIO

#parâmetros para acessar o bucket s3
s3 = boto3.resource(
    service_name='s3',
    region_name='sa-east-1',
    aws_access_key_id = '********',
    aws_secret_access_key='*********'
)

bucketname = 'bucket-market-data'

client = boto3.client('s3', aws_access_key_id='AKIAVH6CMGFCEERXKVGK',aws_secret_access_key='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', region_name='sa-east-1')
object_file = client.get_object(Bucket=bucketname, Key='result.json')
body = object_file['Body']
data = body.read()

s=str(data,'utf-8')
jsonobj = json.loads(s)
dataframe = pd.DataFrame.from_dict(jsonobj)
