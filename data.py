import json
import requests

def writeToJSONFile(path,filename,data): #funcion que define como convertir data a json
    filePathNameExt = './' + path + '/' + fileName + '.json'
    with open(filePathNameExt, 'w') as fp:
        json.dump(data,fp)

path = './' #primer parametro
fileName = 'registro_python' #segundo parametro

data = [] #tercer parametro

myjson_file = open('/Applications/MAMP/htdocs/PHP-Python/Test/08-11-2020.json','r')

json_data = myjson_file.read()

obj = json.loads(json_data)

for o in obj:
     mail = o['email'] 
     data.append(mail)
     writeToJSONFile(path,fileName,data) #Ejecutar función!!!


#Mas notas

#resp = requests.post('http://localhost/index.php', fileName)
#print(resp.txt)

#print(obj[0]['email']) #imprimir solo un valor de obj

#-------------------------------------------------------

 #   mail = []
 #   m = o['email']

 #   mail.append(m)

 #------------------------------------------------------

   # writeToJSONFile(path,fileName,mail)
    #if(len(o) < 4):
    #    writeToJSONFile(path,fileName,o['nombre'])
    #else:
    #   writeToJSONFile(path,fileName,o['email'])






