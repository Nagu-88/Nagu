
<%@page import="java.sql.DriverManager"%>
<%@page import="java.sql.ResultSet"%>
<%@page import="java.sql.Statement"%>
<%@page import="java.sql.Connection"%>

<%
// Access-Control-Allow-Origin: 165.22.14.77:8080
String driverName = "com.mysql.jdbc.Driver";
String connectionUrl = "jdbc:mysql://165.22.14.77/";
String dbName = "dbNagu";
String userId = "Nagu";
String password = "passwordNagu";
String id = request.getParameter("Result");

try {
Class.forName(driverName);
} catch (ClassNotFoundException e) {
e.printStackTrace();
}

Connection connection = null;
Statement statement = null;
ResultSet resultSet = null;
%>
<!-- <table align="center" cellpadding="4" cellspacing="4"> -->
<tr>

</tr>
<tr >
<td><b>Item Id</b></td>
<td><b>Item Name</b></td>
<td><b>Unit Price </b></td>
<td><b>Stock Qty</b></td>
<td><b>Supplier Id</b></td>
</tr>
<%
try {
connection = DriverManager.getConnection(
connectionUrl + dbName, userId, password);
statement = connection.createStatement();
String sql = "SELECT * FROM Item";

resultSet = statement.executeQuery(sql);

	while(resultSet.next())
	{
%>
		<tr>
		<td><%=resultSet.getString("ItemId")%></td>
		<td><%=resultSet.getString("ItemName")%></td>
		<td><%=resultSet.getString("UnitPrice")%></td>
		<td><%=resultSet.getString("StockQty")%></td>
		<td><%=resultSet.getString("SupplierId")%></td>
		</tr>
<%
	}


} catch (Exception e) {
e.printStackTrace();
}
%>
<!-- </table> -->