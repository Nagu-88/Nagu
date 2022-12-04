#Bank domain using classes
framework_filename = "framework.dat"
menu_filename = "menu.cfg" 

try:
	records = eval(open(framework_filename, "r").read())
except FileNotFoundError:
	print("File does not exit.")


field_names = ("account_number", "customer_name", "balance")

domain_keyword = ("Account")

class Domain():
	
	def create(self):
		record = []
		for index in range(0, len(field_names)):
			print("Enter", field_names[index] + ": ", end = "")
			field_value = input()
			record.append(field_value)
		records.append(record)
		print(domain_keyword, "created successfully.")
		self.save(records)

	def read(self):
		for records_index in range(0, len(records)):
			for index in range(0, len(field_names)):
				print(field_names[index] + ": %s"%records[records_index][index])
	
	def search(self):
		print("Enter", field_names[0], "to search: ", end = "")
		field_value = input()
		for records_index in range(0, len(records)):
			if(field_value == records[records_index][0]):
				for index in range(0, len(field_names)):
					print(field_names[index], ": %s"%records[records_index][index])
			
	def update(self):
		print("Enter", field_names[0], "to update: ", end = "")
		field_value = input()
		for index in range(0, len(records)):
			if(field_value == records[index][0]):
				new_field_value = input("Enter new value: ")
				records[index][2] = new_field_value
				print(domain_keyword, "updated successfully.")
				break
		self.save(records)

	def delete(self):
		print("Enter", field_names[0], "to delete: ", end = "")
		field_value = input()
		for index in range(0, len(records)):
			if(field_value == records[index][0]):
				del(records[index])
				print(domain_keyword, "deleted successfully.")
				break
		self.save(records)


	def exit_program(self):
		exit()

	def save(self, records):
		with open(framework_filename, "w") as data_file:
			data_file.write("%s"%records)


	

with open(menu_filename) as menu_file:
	menu = menu_file.read()

while True:
	print(menu)
	my_domain = Domain()

	try:
		choice = int(input("Enter your choice: "))
		array_functions = [my_domain.create, my_domain.read, my_domain.search, my_domain.update, my_domain.delete, my_domain.exit_program]
		array_functions[choice - 1]()
	except IndexError:
		print("Enter valid choice!")
	except ValueError:
		print("Enter valid  choice!")


