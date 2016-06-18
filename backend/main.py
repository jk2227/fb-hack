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
from collections import deque
from maps import GoogleMapper
import copy
import operator
import food
from datetime import datetime

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

def getClosestPlace(currLoc, etcs, matrix):
	minimum_time = matrix[currLoc][etcs[0]]
	minimum_loc = etcs[0]
	for etc in etcs:
		if matrix[currLoc][etc] < minimum_time:
			minimum_time = matrix[currLoc][etc]
			minimum_loc = etc
	return minimum_loc

# [{
# 	date: '',
# 	fst_place: ''
# 	lunch: ''
# 	snd_place: ''
# 	dinner: ''
# },
# {
# 	date: '',
# 	fst_place: '',
# 	lunch: '',
# 	snd_place: '',
# 	dinner: ''
# }]

# start_loc = 'hyatt house'
# start_date = '01/01/2016'
# end_date = '03/01/2016'
# start_time = '12:00'
# end_time = '8:00'

def getDays(start_date, end_date):
	start_obj = datetime.strptime(start_date,'%m/%d/%Y')
	end_obj = datetime.strptime(end_date,'%m/%d/%Y')
	return (end_obj - start_obj).days + 1

def createItinerary(start_loc, start_date, end_date, start_time, end_time, pairs, matrix, etc):
	places = etc

	currLoc = start_loc
	sortedPlaces = deque()

	while len(places) > 0:
		closestNeighbor = getClosestPlace(currLoc, places, matrix)
		sortedPlaces.append(closestNeighbor)
		places.remove(closestNeighbor)

	numDays = getDays(start_date, end_date)
	days = []
	for x in range(numDays):
		days.append({})

	for day in days:
		if len(sortedPlaces) > 1:
			day['p1'] = sortedPlaces.popleft()
			day['lunch'] = pairs[day['p1']]
		else:
			day['p1'] = ''
			day['lunch'] = food.searchByLocation(start_loc)

		if len(sortedPlaces) > 1:
			day['p2'] = sortedPlaces.popleft()
			day['dinner'] = pairs[day['p2']]
		else:
			day['p2'] = ''
			day['dinner'] = ''

	return days

	# travel_times = matrix[start]
	# closest_neighbor = min(travel_times, key=travel_times.get)

	# schedule sight seeing route

# matches restaurant with places using G-S 
def matchRestaurantsWithPlaces(restaurants, etc, matrix):
	unmatchedRestaurants = copy.deepcopy(restaurants)
	unmatchedEtcs = copy.deepcopy(etc)
	pairs = {}
	
	while len(unmatchedRestaurants) > 0 and len(unmatchedEtcs) > 0:
		unmatchedRestaurant = unmatchedRestaurants[0]
		unmatchedRestaurants = unmatchedRestaurants[1:]
		preference = matrix[unmatchedRestaurant]
		preference = sorted(preference.items(), key=operator.itemgetter(1))
		while len(preference) > 0: 
			pref = preference[0]
			preference = preference[1:]
			if pref[0] in restaurants:
				continue 
			if pref[0] not in pairs:
				pairs[pref[0]] = unmatchedRestaurant
				unmatchedEtcs.remove(pref[0])
				break
			elif (pref[0] in pairs):
				if (matrix[pref[0]][pairs[pref[0]]] > matrix[pref[0]][unmatchedRestaurant]):
					unmatchedRestaurants.push(pairs[pref[0]])                
					pairs[pref[0]] = unmatchedRestaurant
					break
	if len(unmatchedEtcs) > 0: 
		for unmatchedEtc in unmatchedEtcs:
			# find closest restaurant and do pairs[restaurant] = unmatchedEtc 
			# if conflict then put closer one in pairs and put the other one in unmatched Etcs 
			nearRestaurant = food.searchNearbyRestaurants(unmatchedEtc)
			pairs[unmatchedEtc] = nearRestaurant
	
	return pairs
		

def main():
	g = GoogleMapper('../files/sample.json')
	# matrix = g.generateMatrix()
	matrix = {u'Japonessa': {u'Japonessa': 0, u'Space Needle': 1964, u'Tacos Chukis': 2360, u'Microsoft Office - Houston': 3636861, u'Hyatt House Seattle/Bellevue': 16020}, u'Space Needle': {u'Japonessa': 1929, u'Space Needle': 0, u'Tacos Chukis': 2375, u'Microsoft Office - Houston': 3638172, u'Hyatt House Seattle/Bellevue': 17331}, u'Tacos Chukis': {u'Japonessa': 2397, u'Space Needle': 2395, u'Tacos Chukis': 0, u'Microsoft Office - Houston': 3638153, u'Hyatt House Seattle/Bellevue': 17312}, u'Microsoft Office - Houston': {u'Japonessa': 3653624, u'Space Needle': 3655733, u'Tacos Chukis': 3653463, u'Microsoft Office - Houston': 0, u'Hyatt House Seattle/Bellevue': 3637122}, u'Hyatt House Seattle/Bellevue': {u'Japonessa': 16858, u'Space Needle': 18967, u'Tacos Chukis': 16697, u'Microsoft Office - Houston': 3621744, u'Hyatt House Seattle/Bellevue': 0}}
	print matrix

	locationNames = matrix[g.startLocation].keys()
	restaurants = g.restaurants
	etc = [item for item in locationNames if item not in restaurants]
	pairs = matchRestaurantsWithPlaces(restaurants, etc, matrix)
	print pairs
	itineraryJson = createItinerary(g.startLocation, g.start, g.end, None, None, pairs, matrix, etc)
	print itineraryJson
	# QUESTION FOR YITING: is g.startLocation the same as the google map one?

if __name__ == "__main__":
	main()