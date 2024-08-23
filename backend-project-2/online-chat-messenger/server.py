import socket

sock = socket.socket(socket.AF_INET, socket.SOCK_DGRAM)
server_address = '0.0.0.0'
server_port = 9005

sock.bind((server_address, server_port))

print('starting up on port {}'.format(server_port))

while True:
  data, address = sock.recvfrom(4096)
  data = data.decode('utf-8')

  print(data)