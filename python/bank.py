#bankdomain list of list
filename = "bank.dat"
def create():
	list = []
	account_number = input("Enter Account number: ")
	list.append(account_number)
	customer_name = input("Enter Customer name: ")
	list.append(customer_name)
	balance = float(input("Enter balance: "))
	list.append(balance)
	records.append(list)
	print("Account created successfully.\n")
def read():
	#with open (filename) as record:
	for index in range(0, len(records)):
		print("Account number: %s"%records[index][0])
		print("Customer name: %s"%records[index][1])
		print("Balance: %f\n"%records[index][2])
def search():
	account_number = input("Enter Account number to search: ")
	for index in range(0, len(records)):
		if(account_number == records[index][0]):
			print("Account number: %s"%records[index][0])
			print("Customer name: %s"%records[index][1])
			print("Balance: %f"%records[index][2])
def update():
	account_number = input("Enter Account number to update: ")
	for index in range(0, len(records)):
		if(account_number == records[index][0]):
			balance = float(input("Enter new Balance: "))
			records[index][2] = balance
def delete():
	account_number = input("Enter Account number to delete: ")
	for index in range(0, len(records)):
		if(account_number == records[index][0]):
			del(records [index])
			
def exit_program():
	save(records)
	exit()
def save(records):
	with open(filename, "w") as record:
		record.write("%s"%records)

records = eval(open(filename, "r").read())
while True:
	print("1. Open an Account", "2. Show all Accounts", "3. Search an Account", "4. Update an Account", "5. Delete an Account", "6. Exit", sep = "\n")
	choice = int(input("Enter your choice: "))
	array_function = [create, read, search, update, delete, exit_program]
	array_function[choice - 1]()

