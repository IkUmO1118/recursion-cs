import socket

sock = socket.socket(socket.AF_INET, socket.SOCK_DGRAM)
server_address = '127.0.0.1'
server_port = 9005

address = '127.0.0.1'
port = 9002


# 接続前にクライアントにユーザー名を記入させる
username = input('--> Type in your name: ').strip()
username_bytes = username.encode('utf-8')
username_len = len(username_bytes).to_bytes(2, 'big')

# 接続後できたかどうかをチェック
try:
  sock.bind((address, port))
  print('Successful connection to server.')
except socket.error as err:
  print(err)
  socket.close()

try:
  while True:
      message = input('Type a message to send!: ').strip()
      message_bytes = message.encode('utf-8')
      message_len = len(message_bytes).to_bytes(2, 'big')

      if username:
        sent = sock.sendto(username_len, (server_address, server_port))
        sent = sock.sendto(username_bytes, (server_address, server_port))

      if message:
        sent = sock.sendto(message_len, (server_address, server_port))
        sent = sock.sendto(message_bytes, (server_address, server_port))

except KeyboardInterrupt:
  print("\nExiting...")
  sock.close()

finally:
  print('closing socket')
  sock.close()