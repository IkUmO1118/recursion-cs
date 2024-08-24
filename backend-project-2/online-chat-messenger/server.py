# import socket

# sock = socket.socket(socket.AF_INET, socket.SOCK_DGRAM)
# server_address = '0.0.0.0'
# server_port = 9005

# sock.bind((server_address, server_port))

# print('starting up on port {}'.format(server_port))

# clients = {}

# while True:
#   data, address = sock.recvfrom(4096)
  
#   print("received {} bytes from {}".format(len(data), address))

#   if data:
#     decoded_data = data.decode("utf-8")

#     username_len, username, message = decoded_data.split(':', 2)
#     print(username)
#     print(message)

#     if address not in clients:
#       clients[address] = username

#     response = f'{username}: {message}'

#     for client_address in clients.keys():
#       sent = sock.sendto(response.encode('utf-8'), client_address)

import socket

sock = socket.socket(socket.AF_INET, socket.SOCK_DGRAM)
server_address = '0.0.0.0'
server_port = 9005

sock.bind((server_address, server_port))

print(f'Starting up on port {server_port}')

clients = {}

while True:
    data, address = sock.recvfrom(4096)
    
    print(f"Received {len(data)} bytes from {address}")

    if data:
        decoded_data = data.decode("utf-8")
        username_len, username, message = decoded_data.split(':', 2)
        print(f"Username: {username}")
        print(f"Message: {message}")

        if address not in clients:
            clients[address] = username

        response = f'{username}: {message}'

        for client_address in clients.keys():
            sock.sendto(response.encode('utf-8'), client_address)
