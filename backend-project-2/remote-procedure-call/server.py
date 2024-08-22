import socket
import json
import math

def floor(x):
    return math.floor(x)

def nroot(n, x):
    return math.floor(x ** (1 / n))

def reverse(s):
    return s[::-1]

def validAnagram(str1, str2):
    return sorted(str1) == sorted(str2)

def sort(strArr):
    return sorted(strArr)

hashmapFn = {
  "floor": floor,
  "nroot": nroot,
  "reverse": reverse,
  "validAnagram": validAnagram,
  "sort": sort,
}

def connection():
  sock = socket.socket(socket.AF_INET, socket.SOCK_STREAM)
  server_address = ('localhost', 11000)

  print('Starting up on {}'.format(server_address))

  sock.bind(server_address)

  sock.listen(1)

  while True:
    connection, client_address = sock.accept()
    print('connection from', client_address)

    try:
      while True:
        data = connection.recv(1024)
        if data:
          print('Received:', data.decode('utf-8'))

          # 受信したデータをJSONとしてパース
          request = json.loads(data.decode('utf-8'))

          method = request.get("method")
          params = request.get("params")
          param_types = request.get('param_types')

          # メソッドが存在する場合に関数を呼び出す
          if method in hashmapFn:
            output =  hashmapFn[method](params)

          response = {"id": request["id"], "result": output}
          connection.sendall(str(response).encode('utf-8'))

    finally:
      connection.close()


def main():
    connection()

if __name__ == '__main__':
    main()