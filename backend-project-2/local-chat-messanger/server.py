import socket
from faker import Faker

sock = socket.socket(socket.AF_INET, socket.SOCK_DGRAM)
faker = Faker()

server_address = ('localhost', 10000)

print('starting up on {} port {}'.format(*server_address))

sock.bind(server_address)

while True:
  print('\nwaiting to receive message')

  data, address = sock.recvfrom(4096)
  data = data.decode('utf-8')

  if data == 'name':
      message = faker.name().encode('utf-8')
  elif data == 'address':
      message = faker.address().encode('utf-8')
  elif data == "email":
      message = faker.email().encode('utf-8')
  else:
      message = b'Received unknown message'
      
  sent = sock.sendto(message, address)