
var number1,number2;
function read()
{

	number1=parseInt(document.getElementById('number1').value);
	number2=parseInt(document.getElementById('number2').value);
}
function add()
{
	read();
	sum = number1 + number2;
	document.getElementById('result').value = sum;
}

function sub()
{
	read();
	sub = number1 - number2;
	document.getElementById('result').value = sub;

}

function mul()
{
	read();
	mul = number1 * number2;
	document.getElementById('result').value = mul;

}

function div()
{
	read();
	quotient = number1 / number2;
	document.getElementById('result').value = quotient;

}

