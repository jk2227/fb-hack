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
from collections import deque

def getMonth(req,month): 
	req.write(calendar.month(2005, int(month),2,3))


# returns true if arg is during lunch or dinner time
def isMealTime(time):
	hr_and_min = time.split(':', 2)
	mins = int(hr_and_min[0])*60 + int(hr_and_min[1])
	print mins
	# lunch time if between 11:30 and 13:00
	if mins >= 690 and mins <= 780:
		return True
	# dinner time if between 18:00 and 19:30
	if mins >= 1080 and mins <= 1170:
		return True
	else:
		return False

def getTouristSites(matrix):
	print 'TODO'

def getClosestNeighbor(curr, sites, matrix):
	print 'TODO'

# [{
# 	date: '',
# 	fst_place: 10:00 - 11:30,
# 	lunch: 11:30 - 13:00,
# 	snd_place: 13:01 - 18:00,
# 	dinner: 18:00 - 19:30
# },
# {
# 	date: '',
# 	fst_place: '',
# 	lunch: '',
# 	snd_place: '',
# 	dinner: ''
# }]

start_loc = 'hyatt house'
start_date = '06/10/16'
end_date = '06/18/16'
start_time = '12:00'
end_time = '8:00'

def createItinerary(start_loc, start_date, end_date, start_time, end_time, matrix):
	places = matrix[start].keys()
	
	currLoc = start_loc
	sortedPlaces = deque()

	while len(places) > 0:
		closestNeighbor = getClosestNeighbor(currLoc, places, matrix)
		sortedPlaces.append(closestNeighbor)
		places.remove(closestNeighbor)

	for x in range(numdays):
		days.append({})

	for day in days:
		if currLoc == start_loc:
			# day['p1'] = 
			# day['lunch'] = 
			# day['p2'] = 
			# day['dinner'] = 
		else:
			day['p1'] = sortedPlaces.popleft()
			day['lunch'] = getMatchedRestaurant(day['p1'])
			day['p2'] = sortedPlaces.popleft()
			day['dinner'] = getMatchedRestaurant(day['p2'])


	# travel_times = matrix[start]
	# closest_neighbor = min(travel_times, key=travel_times.get)

	# schedule sight seeing route

def main():
	g = GoogleMapper('../files/sample.json')
	matrix = g.generateMatrix()
	createItinerary()

if __name__ == "__main__":
	main()