import socket
import threading
import time

sock = socket.socket(socket.AF_INET, socket.SOCK_DGRAM)
server_address = '0.0.0.0'
server_port = 9000

sock.bind((server_address, server_port))

print(f'Starting up on port {server_port}')

clients = {}
client_last_active = {}
TIMEOUT = 20

def check_inactive_clients():
    while True:
        current_time = time.time()
        inactive_clients = [addr for addr, last_active in client_last_active.items() if current_time - last_active > TIMEOUT]

        for client in inactive_clients:
            print(f"Removing inactive client: {clients[client]} at {client}")
            del clients[client]
            del client_last_active[client]

        time.sleep(10)  # 10秒ごとにチェック

# 別スレッドでクライアントのアクティブ状態を監視する
threading.Thread(target=check_inactive_clients, daemon=True).start()

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

        # クライアントの最終アクティブ時間を更新
        client_last_active[address] = time.time()

        response = f'{username}: {message}'

        if client_last_active[address]:
            for client_address in clients.keys():
                sock.sendto(response.encode('utf-8'), client_address)
