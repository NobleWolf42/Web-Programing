<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>ASP Demo</title>
	<link rel="shortcut icon" href="/faveicon.ico" mce_href="/faveicon.ico"/>
</head>
<body>
<h1>Where Am I?</h1>
<p><%@ Language="VBScript" %>
<% Option Explicit %>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Home Work 18 - Benjamin Carpenter</title>
	<link rel="shortcut icon" href="/faveicon.ico" mce_href="/faveicon.ico"/>
</head>
<body>
	<p><a href="/index.html">Home</a></p>
	<h1>Where Am I ?</h1>
	<!-- #include file ="dechours.inc" --> 
<%
	' Finding client ip
	response.write("<ol><h2><li>Wireless Check</li></h2>")
	Dim clientip
	clientip = Request.ServerVariables("REMOTE_ADDR")
	response.write("<p>Your client is " & clientip & "</p>")

	' Finding if they are on SAU's wireless network
	Dim saunetwork, firstfour
	firstfour = mid(clientip,1,4)
	If firstfour = "10.9" Then
		saunetwork = " "
	Else 
		saunetwork = " NOT "
	End If
	response.write("<p>Your client is" & saunetwork & "on the SAU wireless network.</p>")

	' Finding server ip
	Dim serverip
	serverip = Request.ServerVariables("LOCAL_ADDR")
	response.write("<p>The server is " & serverip & "</p>")

	' Factoring
	response.write("<h2><li>Factoring</li></h2>")
	Dim a, b, i
	For a = 3 To 99
		Dim bary
		bary = array()
		For b = a-1 To 2 Step -1
			If b < 10 Then
				If (a mod b) = 0 Then
					ReDim Preserve bary(UBound(bary) + 1)
					bary(UBound(bary)) = b
				End If
			End If
		Next
		
		If UBound(bary) = -1 Then
			response.write("<p>" & a & " is a prime number.</p>")
		ElseIf UBound(bary) = 0 Then
			response.write("<p>" & a & " has the following factor: " & bary(0) & "</p>")
		Else
			response.write("<p>" & a & " has the following factors: ")
			For i = 0 To UBound(bary)
				response.write(bary(i) & " ")
			Next
			response.write("</p>")
		End If
	Next

	' Listing the Server Array
	response.write("<h2><li>Server Array</li></h2>")
	Dim fieldName, fieldValue, Item
	response.write("<table border='1'><tr><th>Index</th><th>Value</th></tr>")
	For Each Item In Request.ServerVariables
		fieldName = Item
		fieldValue = Request.ServerVariables(Item)
		Response.write("<tr><th>" & fieldName & "</th><td>" & fieldValue & "</td></tr>")
	Next
	response.write("</table>")

	' Decimal Hours
	response.write("<h2><li>Decimal Hours</li></h2>")
	Dim mintohrs
	mintohrs = 150
	dechours (mintohrs)
	response.write("<p>" & mintohrs & " minutes is " & dechrs & " decimal hours.</p>")

	' Current Time
	response.write("<h2><li>Current Time</li></h2>")
	Dim cmin, mtime, rtime, dt, thetime, ampm, hrtomin, tmin, mmin
	mtime = FormatDateTime(now(),vbshorttime)
	mmin = Right(mtime, 2)
	hrtomin = Left(mtime, Len(mtime) - 3) * 60
	tmin = hrtomin + mmin
	dt = time()
	thetime = Left(dt, Len(dt) - 6)
	ampm = Right(dt, 2)
	rtime = thetime & " " & ampm
	dechours (tmin)
	response.write("<p>The current time, " & rtime & " translates to " & dechrs & " decimal hours.</p>")

	' Compass Heading
	response.write("<h2><li>Compass Heading</li></h2>")
	Dim chead, cheadtxt
    If mmin <= 5.625 and mmin > 1.875 Then
		chead = "NNE"
		cheadtxt = "North North East"
	ElseIf mmin <= 9.375 and mmin > 5.625 Then
		chead = "NE"
		cheadtxt = "North East"
	ElseIf mmin <= 13.125 and mmin > 9.375 Then
		chead = "ENE"
		cheadtxt = "East North East"
	ElseIf mmin <= 16.875 and mmin > 13.125 Then
		chead = "E"
		cheadtxt = "East"
	ElseIf mmin <= 20.625 and mmin > 16.875 Then
		chead = "ESE"
		cheadtxt = "East South East"
	ElseIf mmin <= 24.375 and mmin > 20.625 Then
		chead = "SE"
		cheadtxt = "South East"
	ElseIf mmin <= 28.125 and mmin > 24.375 Then
		chead = "SSE"
		cheadtxt = "South South East"
	ElseIf mmin <= 31.875 and mmin > 28.125 Then
		chead = "S"
		cheadtxt = "South"
	ElseIf mmin <= 35.625 and mmin > 31.875 Then
		chead = "SSW"
		cheadtxt = "South South West"
	ElseIf mmin <= 39.375 and mmin > 35.625 Then
		chead = "SW"
		cheadtxt = "South West"
	ElseIf mmin <= 43.125 and mmin > 39.375 Then
		chead = "WSW"
		cheadtxt = "West South West"
	ElseIf mmin <= 46.875 and mmin > 43.125 Then
		chead = "W"
		cheadtxt = "West"
	ElseIf mmin <= 50.625 and mmin > 46.875 Then
		chead = "WNW"
		cheadtxt = "West North West"
	ElseIf mmin <= 54.375 and mmin > 50.625 Then
		chead = "NW"
		cheadtxt = "North West"
	ElseIf mmin <= 58.125 and mmin > 54.375 Then
		chead = "NNW"
		cheadtxt = "North North West"
	Else
		chead = "N"
		cheadtxt = "North"
	End If
	dechours (tmin)
	response.write("<p>The Current Time Is: " & rtime & "</p>")
	response.write("<p>The Current Decimal Hours Is: " & dechrs & "</p>")
	response.write("<p>The Compass Heading Is: " & chead & " (" & cheadtxt & ").</p>")
%>
	</ol>
	<p><a href="/index.html">Home</a></p>
</body></html>
</p>
</body>
</html>