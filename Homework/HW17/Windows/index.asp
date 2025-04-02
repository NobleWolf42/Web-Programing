<%@ Language="VBScript" %>
<% Option Explicit %>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Home Work 17 - Benjamin Carpenter</title>
	<link rel="shortcut icon" href="/faveicon.ico" mce_href="/faveicon.ico"/>
</head>
<body>
	<p><a href="/index.html">Home</a></p>
	<h1>Who Am I? (Basic ASP)</h1>
	<ol>
<%
	' Finding client ip
	Dim clientip
	clientip = Request.ServerVariables("REMOTE_ADDR")
	response.write("<li><p>Your Client IP Address is: " & clientip & "</p></li>")

	' Finding server ip
	Dim serverip
	serverip = Request.ServerVariables("LOCAL_ADDR")
	response.write("<li><p>Your Client IP Address is: " & serverip & "</p></li>")

	' Escaping a quote
	response.write("<li><p>We can print a "" by doubling the quotes.</p></li>")

	' Specifing a quote
	response.write("<li><p>We can print a " & Chr(34) & " by using the Chr(34) function.</p></li>")

	' # of days in 70 years
	Dim years, days
	years = 70
	days = years * 365.242
	response.write("<li><p>A lifetime of " & years & " years has " & days & " days.</p></li>")

	' # speed of light
	Dim mps, sec, traveled
	mps = 186000
	sec = 60
	traveled = sec * mps
	response.write("<li><p>A light beam travels " & traveled & " miles in " & sec & " seconds.</p></li>")

	' how far away is a star?
	Dim mpy, star
	mpy = mps * 60 * 60 * 24 * 365.242
	star = mpy * 4.2421
	response.write("<li><p>Alpha Proxima is " & star & " miles away.</p></li>")
  
    ' Bosinan days of the week
    	' Iterating an array
    Dim bosinan_days, thisbday
    bosinan_days   = Array(_
    	"Nedjelja", _
		"Ponedeljak", _
		"Utorak", _
		"Sijeda", _
		"Čxetvrtak", _
		"Petak", _
		"Subota"_
		)
 
		' UBound(arrayname[,dimension])
	Dim howmanyb
	howmanyb = UBound(bosinan_days)
	response.write("<li><p>The Bosnian days of the week are: ")
	For Each thisbday in bosinan_days
	   ' Note loose capitalization, not honored  in other languages
	   response.write(thisbday & " ")
	Next
	response.write("</p></li>")

	' Bosinan days of the week
    	' Iterating an array
    Dim spanish_days, thisday
    spanish_days   = Array(_
    	"Domingo", _
		"Lunes", _
		"Martes", _
		"Miércoles", _
		"Jueves", _
		"Viernes", _
		"Sábado"_
		)
 
		' UBound(arrayname[,dimension])
	Dim howmanys
	howmanys = UBound(spanish_days)
	response.write("<li><p>The Spanish days of the week are: ")
	For Each thisday in spanish_days
	   ' Note loose capitalization, not honored  in other languages
	   response.write(thisday & " ")
	Next
	response.write("</p></li>")
%>
	</ol>
	<p><a href="/index.html">Home</a></p>
</body></html>
</p>
</body>
</html>