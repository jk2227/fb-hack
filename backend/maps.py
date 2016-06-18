import googlemaps
import json 
import copy

class GoogleMapper: 
  def __init__(self, directory):
      json_data = open(directory).read()
      json_loads = json.loads(json_data)
      self.places = json_loads['places']
      self.startLocation = json_loads['startLocation']
      self.gmaps = googlemaps.Client(key='AIzaSyA59zGWOtyvYAUhwxmnjwF3GZQoxcvynF8')
      
  def getLocationNameAndLatLongList(self):
      locationNameList = [x['name'] for x in self.places]
      locationNameList.append(self.startLocation)
      locationNameAndLatLongList = [] 
      for locationName in locationNameList:
          locationNameAndLatLongList.append(self.getLocationNameAndLatLong(locationName))
      return locationNameAndLatLongList 
          
  def getLocationNameAndLatLong(self, place):
      result = self.gmaps.places(place)
      if result['results'] == None:
          return None
      else:
          latlong = result['results'][0]['geometry']['location']
          return (result['results'][0]['name'], (latlong['lat'], latlong['lng']))

  def generateMatrix(self):
      locationNameAndLatLongList = self.getLocationNameAndLatLongList()
      locationNameList = [x[0] for x in locationNameAndLatLongList]
      latLongList = [x[1] for x in locationNameAndLatLongList]
      dest = copy.deepcopy(latLongList)
      distanceMatrix = self.gmaps.distance_matrix(latLongList, dest)
      
      row = {}
      for locationName in locationNameList: 
          row[locationName] = {}
      
      for i in range(len(locationNameList)): 
          for j in range(len(locationNameList)): 
              row[locationNameList[i]][locationNameList[j]] = distanceMatrix['rows'][i]['elements'][j]['distance']['value']
      
      return row