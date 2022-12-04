# import socket

# port = 9998
# c = socket.socket(socket.AF_INET, socket.SOCK_STREAM)
# host = "165.22.14.77"
# c.connect((host, port))
# while True:
#     message = input("Enter message: ")
#     c.send(message.encode())
#     if message == "end":
#         break
#     reply = c.recv(1024)
#     print("Recieved: ", reply)
# s.close()


import socket
import threading as th

port = 9999

client = socket.socket()
client.connect(("165.22.14.77", port))

def recive():
   while True:
      message = client.recv(1024).decode()
      print("%s"%message)

def send():
   while True:
      message = input()
      if message.lower().strip() == "bye":
         exit()
      client.send(message.encode())

def user_name():
   name = input("Enter user name: ")
   client.send(name.encode()) 

user_name()
if __name__ == "__main__":
   client_1 = th.Thread(target = send)
   client_2 = th.Thread(target = recive)

   client_1.start()
   client_2.start()

while 1:
   pass

# from tkinter import *
# import socket
# import threading as th

# port = 5555

# client = socket.socket()
# client.connect(("165.22.14.77", port))

# def recive():
#    while True:
#       message = client.recv(1024).decode()
#       message_label = Label(wraplength = 250, text = message, font = "lucida 10 bold", justify = "left", bg = "sky blue")
#       message_label.pack()

# def send():
#    # while True:
#       message = entry.get('1.0', 'end-1c')
#       message = message.strip()
#       entry.delete("1.0", "end-1c")
#       client.send(message.encode())
#       message = "You: " + message
#       message_label = Label(wraplength = 250, text = message, font = "lucida 10 bold", justify = "left", bg = "yellow")
#       message_label.pack()

# def user_name():
#    name = input("Enter your name: ")
#    client.send(name.encode()) 

# user_name()

# if __name__ == "__main__":
#    # client_1 = th.Thread(target = send)
#    client_2 = th.Thread(target = recive)

#    # client_1.start()
#    client_2.start()

# window = Tk()
# window.title('Interface')

# entry = Text(font = "lucida 10 bold", width = 38, height = 2)
# entry.place(x = 150, y = 250)

# send_button = Button(text = "Send", fg = "white", bg = "blue", padx = 10, command = send)
# send_button.place(x = 250, y = 300)

# window.geometry("600x400+10+20")
# window.mainloop()