# #!/usr/bin/python
# import cgi, cgitb
# print "Content-type: text/plain"
# print
# cgitb.enable()

# import json
# form = cgi.FieldStorage()
# print json.dumps({"key": form.getValue("data")})
import calendar 
import numpy as np
from mod_python import apache 

def getMonth(req,month): 
	req.write(calendar.month(2005, int(month),2,3))


def createItinerary(start, start_time, matrix):
	# if 12 < start_time < 1:
	# 	start at a restaurant
	# if 6 < start_time < 7:
	# 	start at a restaurant
	# else:
	# 	start at a sight-seeing place

	travel_times = matrix[start]
	closest_neighbor = min(travel_times, key=travel_times.get)

	


def main():
	

if __name__ == "__main__":
	main()