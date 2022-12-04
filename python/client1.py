# Client program

import socket

port = 9999
c = socket.socket()
host = socket.gethostbyname(socket.gethostname())
c.connect((host, port))
while True:
    message = input("Enter message: ")
    c.send(message.encode())
    if message == 'end':
        break
    reply = c.recv(1024)
    print("Recieved", repr(reply))
s.close()


