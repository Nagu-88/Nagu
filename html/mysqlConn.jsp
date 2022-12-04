<%@ page import="java.sql.*"%>
<%@ page import="java.io.*" %>
<html>
<head>
<title>Connection with mysql database</title>
</head>
<body>
<h1>Connection status</h1>
<%
try{
	String connectionURL = "jdbc:mysql://165.22.14.77/dbNagu";
	Connection connection = null;
	Class.forName("com.mysql.jdbc.Driver").newInstance();
	connection = DriverManager.getConnection(connectionURL, "Nagu", "passwordNagu");
	  String query = "SELECT * FROM Item";
        result = statement.executeQuery(query);
        while(result.next())
        {
                out.println(result.getString("ItemId"));
        }
	if(!connection.isClosed())
		out.println("Successfully connected to" + "MySQL server using TCP/IP....");
	connection.close();
}catch(Exception ex){
	out.println("Unable to connect to database.");
}
%>
</body>
</html>
