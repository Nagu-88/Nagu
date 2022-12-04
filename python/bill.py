import pymysql.cursors

# Connect to the database
connection = pymysql.connect(host='165.22.14.77',
                             user='root',
                             password='pwdNagu',
                             database='dbNagu',
                             cursorclass=pymysql.cursors.DictCursor)
# with connection.cursor() as cursor:
	# print("Enter ItemId: ")
	# Item_id = input()
	# sql = ("select * from Item where ItemId = %s", Item_id)
connection.execute("select * from Item ")
result = connection.fetchone()
print(result)


















# import mysql.connector

# def connect():
# 	print("Connect to MySQL")
# 	conn = mysql.connector.connect(host = '165.22.14.77', database = 'dbNagu', user = 'root', password = 'passwordNagu')
# 	if conn.is_connected():
# 		print('Connected to MySQL')
# 		conn.close()
# if __name__ == __main__:
# 	connect()