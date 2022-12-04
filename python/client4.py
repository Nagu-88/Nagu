from socket import *
from threading import *
from tkinter import *

clientSocket = socket(AF_INET, SOCK_STREAM)
clientSocket.setsockopt(SOL_SOCKET, SO_REUSEADDR, 1)
host = "165.22.14.77"
port = 4444
clientSocket.connect((host, port))

window = Tk()
window.title("Chat Box")

displayBox = Text(window, width = 50)												# Display the data and running chat
displayBox.grid(row=0, column=0, padx=10, pady=10)

userEntry = 0
messageBox = Entry(window, width = 50)
messageBox.insert(0, "Enter your Username: ")										# Show this at the begining of the data											
messageBox.grid(row=1, column=0, padx=10, pady=10)

def sendMessage():
	global userEntry
	message = messageBox.get()														# Get the data typed in message box
	if userEntry == 0:
		username = message[21:]
		message = username + " joined"
		userEntry = 1
	clientSocket.send(message.encode("utf-8"))
	messageLength = len(message)
	messageBox.delete(0, messageLength)												# Clear messageBox in UI


def recieve():
	while True:
		serverMessage = clientSocket.recv(1024).decode("utf-8")
		displayBox.insert(END, "\n" + serverMessage)


sendButton = Button(window, text = "SEND", width = 30, command = sendMessage)
sendButton.grid(row=2, column=0, padx=10, pady=10)

recieveThread = Thread(target = recieve)
recieveThread.daemon = True															# Daemon is a background running thread for a process
recieveThread.start()

window.mainloop()