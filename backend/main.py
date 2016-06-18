#!/usr/bin/python
import cgi, json 
 
print """Content-type: text/html; charset=utf-8\n\n
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>"""
 
form = cgi.FieldStorage()
print json.dumps({"key": form.getValue("test")})
print """</html>"""

