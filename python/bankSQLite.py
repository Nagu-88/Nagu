# SQLite in Python

import sqlite3

DATAFILE = "records.db"

connection = sqlite3.connect(DATAFILE)

fieldsList = ["AccountNumber", "CustomerName", "Balance"]

tableName = "Customer"

def Insert():
	fieldValues = []
	for fieldsIndex in range(0, len(fieldsList)):
		print("Enter", fieldsList[fieldsIndex], ": ", end ="")
		fieldValues.append(input())
	connection.execute(f"INSERT INTO {tableName} ({fieldsList[0]}, {fieldsList[1]}, {fieldsList[2]}) \
      VALUES ({fieldValues[0]}, {fieldValues[1]}, {fieldValues[2]})");
	connection.commit()

def Search():
	fieldValues = getInput()
	printColumnNames()
	records = connection.execute(f"SELECT * from {tableName} where {fieldsList[0]} = {fieldValues}")
	printRecord(records)

def Update():
	fieldValues = getInput()
	print(f"Enter {fieldsList[len(fieldsList)-1]}")
	fieldValuesUpdate = input()
	connection.execute(f"UPDATE {tableName} set {fieldsList[len(fieldsList) - 1]} = {fieldValuesUpdate} where {fieldsList[0]} = {fieldValues}")
	print("Updated Successfully\n")
	connection.commit()

def Delete():
	fieldValues = getInput()
	connection.execute(f"DELETE from {tableName} where {fieldsList[0]} = {fieldValues}")
	print("Deleted Successfully\n")
	connection.commit()

def ShowAllRecords():
	records = connection.execute(f"SELECT * from {tableName}")	
	printColumnNames()
	printRecord(records)

def Exit():
	connection.close()
	exit()

def printColumnNames():
	for fieldsIndex in range(len(fieldsList)):
		print("%20s"%fieldsList[fieldsIndex], end = "")
	print("\n")

def printRecord(records):
	for record in records:
		for fieldsIndex in range(0, len(fieldsList)):
			print("%20s"%record[fieldsIndex], end = "")
		print("\n")	

def getInput():
	print(f"Enter {fieldsList[0]}: ", end = "")
	fieldValues = input()
	return fieldValues

while True:
	print("1. Create an Account", "2. Show all Accounts", "3. Update Balance", "4. Close an Account", "5. Search an Account", "6. Exit", sep = "\n")
	ArrayOfFunction = [Insert, Search, Update, Delete, ShowAllRecords, Exit]
	try:
		choice = int(input("Enter your choice: "))
		ArrayOfFunction[choice - 1]()
	except (ValueError, IndexError):
		print("Enter valid choice!")
