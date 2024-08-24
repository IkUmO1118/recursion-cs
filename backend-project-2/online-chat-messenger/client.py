# import socket

# def main():
#   sock = socket.socket(socket.AF_INET, socket.SOCK_DGRAM)
#   server_address = '127.0.0.1'
#   server_port = 9005

#   address = '127.0.0.1'
#   port = 9002


#   # 接続前にクライアントにユーザー名を記入させる
#   while True:
#     username = input('--> Type in your name: ').strip()
#     username_bytes = username.encode('utf-8')
#     username_len = len(username_bytes).to_bytes(1, 'big')

#     # print(len(username_bytes)) #15(バイト列の長さ、バイト長を表す)
#     # print(username_len.to_bytes(1, 'big')) #b'\x0f(バイト長を表す1バイトのバイト列)'

#   # ユーザー名が255バイト以下である事を保証する
#     if len(username_bytes) <= 255:
#       break
#     else:
#       print(username + " must be less than 255 bytes!")
#       continue

#   # 接続後できたかどうかをチェック
#   try:
#     sock.bind((address, port))
#     print('Successful connection to server.')
#   except socket.error as err:
#     print(err)
#     socket.close()

#   while True:
#     try:
#       message = input('Type a message to send!: ').strip()

#       full_message = f"{username_len}:{username}:{message}"
#       if len(full_message.encode('utf-8')) < 4096:
#         sent = sock.sendto(full_message.encode('utf-8'), (server_address,server_port))

#       data, _ = sock.recvfrom(4096)
#       print("Received:", data.decode("utf-8"))

#     except KeyboardInterrupt:
#       print("\nExiting...")
#       sock.close()

#     finally:
#       print("talk_in_room finally")
#       sock.close()

# if __name__ == "__main__":
#   main()

import socket
import threading

def send_message(sock, username, username_len, server_address, server_port, stop_event):
    while not stop_event.is_set():
        message = input('Type a message to send!: ').strip()
        full_message = f"{username_len.decode('utf-8')}:{username}:{message}"
        if len(full_message.encode('utf-8')) < 4096:
            sock.sendto(full_message.encode('utf-8'), (server_address, server_port))

def receive_message(sock, stop_event):
    while not stop_event.is_set():
        try:
            data, _ = sock.recvfrom(4096)
            if data:
                # Clear the current input line
                print("\r" + " " * 80 + "\r", end="")
                print("Received:", data.decode("utf-8"))
                # Prompt the user again
                print('Type a message to send!:', end='', flush=True)
        except socket.error:
            pass

def main():
    sock = socket.socket(socket.AF_INET, socket.SOCK_DGRAM)
    server_address = '127.0.0.1'
    server_port = 9005

    client_address = '127.0.0.1'
    client_port = 9002

    while True:
        username = input('--> Type in your name: ').strip()
        username_bytes = username.encode('utf-8')
        username_len = len(username_bytes).to_bytes(1, 'big')

        if len(username_bytes) <= 255:
            break
        else:
            print(username + " must be less than 255 bytes!")
            continue

    try:
        sock.bind((client_address, client_port))
        print('Successful connection to server.')
    except socket.error as err:
        print(err)
        sock.close()
        return

    stop_event = threading.Event()
    receiver_thread = threading.Thread(target=receive_message, args=(sock, stop_event))
    receiver_thread.daemon = True
    receiver_thread.start()

    try:
        send_message(sock, username, username_len, server_address, server_port, stop_event)
    except KeyboardInterrupt:
        print("\nExiting...")
    finally:
        stop_event.set()
        sock.close()

if __name__ == "__main__":
    main()
