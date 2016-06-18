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
import maps
import copy

def getMonth(req,month): 
	req.write(calendar.month(2005, int(month),2,3))


def getHour(time):


def createItinerary(start, start_time, end_time, matrix):
	# if 12 < start_time < 1:
	# 	start at a restaurant
	# if 6 < start_time < 7:
	# 	start at a restaurant
	# else:
	# 	start at a sight-seeing place

      
      
	travel_times = matrix[start]
	closest_neighbor = min(travel_times, key=travel_times.get)


	# schedule sight seeing route

	# allocate restaurants to the nearest sight seeing places
	# and for the left over meals, find closest restaurants
	# to the leftover sight seeing places

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
            else if pref[0] in pairs and matrix[pref[0]][pair[pref[0]] > matrix[pref[0]][unmatchedRestaurant]:
                unmatchedRestaurants.push(pairs[pref[0]])                
                pairs[pref[0]] = unmatchedRestaurant
    
    if len(unmatchedEtcs) > 0: 
        for unmatchedEtc in unmatchedEtcs:
            # find closest restaurant and do pairs[restaurant] = unmatchedEtc 
            # if conflict then put closer one in pairs and put the other one in unmatched Etcs 
    
    return pairs
        
        
    
    

def main():
	g = GoogleMapper('../files/sample.json')
	matrix = g.generateMatrix()
 
      locationNames = matrix[start].keys()
      restaurants = g.restaurants
      etc = locationNames - restaurants 
      
      
	createItinerary()

if __name__ == "__main__":
	main()