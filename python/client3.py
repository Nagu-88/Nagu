from tkinter import *
import socket
import threading as th

port = 4444

client = socket.socket()
client.connect(("165.22.14.77", port))

def recive():
   while True:
      message = client.recv(1024).decode()
      message_label = Label(wraplength = 250, text = message, font = "lucida 10 bold", justify = "left", bg = "sky blue")
      message_label.pack()

def send():
   # while True:
      message = entry.get('1.0', 'end-1c')
      message = message.strip()
      entry.delete("1.0", "end-1c")
      client.send(message.encode())
      message = "You: " + message
      message_label = Label(wraplength = 250, text = message, font = "lucida 10 bold", justify = "left", bg = "yellow")
      message_label.pack()

def user_name():
   name = input("Enter your name: ")
   client.send(name.encode()) 

user_name()

if _name_ == "_main_":
   client_2 = th.Thread(target = recive)

   client_2.start()

window = Tk()
window.title('Interface')

entry = Text(font = "lucida 10 bold", width = 38, height = 2)
entry.place(x = 150, y = 250)

send_button = Button(text = "Send", fg = "white", bg = "blue", padx = 10, command = send)
send_button.place(x = 250, y = 300)

window.geometry("500x400+10+20")
window.mainloop()