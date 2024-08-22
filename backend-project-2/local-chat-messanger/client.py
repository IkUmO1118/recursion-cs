import socket

sock = socket.socket(socket.AF_INET, socket.SOCK_DGRAM)

server_address = ('localhost', 10000)

message = input('Which information do you want - address, name or email address?\n').encode('utf-8')


try:
  print('sending {!r}'.format(message))
  sent = sock.sendto(message, server_address)

  print('Waiting to received')
  data, server = sock.recvfrom(4096)
  strData = data.decode('utf-8')

  print('received {!r}'.format(data))
finally:
  print('closing socket')
  sock.close()