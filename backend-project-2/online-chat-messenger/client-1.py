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
                # メッセージを受信した場合、現在の入力行をクリアして表示
                print("\r" + " " * 80 + "\r", end="")
                print("Received:", data.decode("utf-8"))
                # Prompt the user again
                print('Type a message to send!:', end='', flush=True)
        except socket.error:
            pass

def main():
    sock = socket.socket(socket.AF_INET, socket.SOCK_DGRAM)
    server_address = '127.0.0.1'
    server_port = 9000

    client_address = '127.0.0.1'
    client_port = 9001

    while True:
        # クライアントにユーザー名を入力させる
        username = input('--> Type in your name: ').strip()
        username_bytes = username.encode('utf-8')
        username_len = len(username_bytes).to_bytes(1, 'big')

        # userのバイトサイズを保証する
        if len(username_bytes) <= 255:
            break
        else:
            print(username + " must be less than 255 bytes!")
            continue

    # サーバとの接続を保証する
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

# エントリーポイント
if __name__ == "__main__":
    main()
