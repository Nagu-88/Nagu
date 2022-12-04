from tkinter import *
import socket

window = Tk()

window.title('Interface')
host = socket.gethostname()
port = 2504

client = socket.socket()
client.connect((host, port))

def recive():
   data = client.recv(1024).decode()
   message_label = Label(wraplength = 250, text = data, font = "lucida 10 bold", justify = "left", bg = "sky blue")
   message_label.pack()

def send():
   message = entry.get('1.0', 'end-1c')
   message = message.strip()
   if message.lower().strip() == 'bye':
      exit()
   entry.delete("1.0", "end-1c")
   client.send(message.encode())
   recive()

# message_label = Label(wraplength = 250, text = "Welcome", font = "lucida 10 bold", justify = "left", bg = "sky blue")
# message_label.pack()

entry = Text(font = "lucida 10 bold", width = 38, height = 2)
entry.place(x = 150, y = 250)

data = client.recv(1024).decode()   
if data != "NULL":
   message_label = Label(wraplength = 250, text = data, font = "lucida 10 bold", justify = "left", bg = "sky blue")
   message_label.pack()

send_button = Button(text = "Send", fg = "white", bg = "blue", padx = 10, command = send)
send_button.place(x = 250, y = 300)


window.geometry("600x400+10+20")
window.mainloop()






# button = Button(window, text = "Submit", fg = 'black')
# button.place(x = 300, y = 200)

# lable = Label(window, text = "User name", fg = 'black', font = ("Helvetica", 12))
# lable.place(x = 130, y = 150)
# text = Entry(window, text = "Type here", bd = 5)
# text.place(x = 250, y = 150)

# lable = Label(window, text = message, fg = 'black', font = ("Helvetica", 12))
# lable.place(x = 130, y = 150)