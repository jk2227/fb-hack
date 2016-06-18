# #!/usr/bin/python
# import cgi, cgitb
# print "Content-type: text/plain"
# print
# cgitb.enable()

# import json
# form = cgi.FieldStorage()
# print json.dumps({"key": form.getValue("data")})
import calendar 
from mod_python import apache 
def getMonth(req,month): 
	req.write(calendar.month(2005, int(month),2,3))


