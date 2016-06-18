from yelp.client import Client
from yelp.oauth1_authenticator import Oauth1Authenticator

auth = Oauth1Authenticator(
	consumer_key='nI2ym2HtMeUiqok8F5UfsA',
	consumer_secret='CDu7QRRU4oDquGoCaN4zh9agdfo',
	token='S0vofSv5-IGHfyJ0JkU93-YahQvSiNyM',
	token_secret='fbyTLjZF69W_FHz3NY5gcKyNOVo'
)

client = Client(auth)

# used to display default recommended restaurants in the city
def searchByLocation(city):
	params = {
		'term': 'food'
	}

	response = client.search(city, **params)
	bs = response.businesses
	for b in bs:
		print b.name

# used to display recommended restaurants based on the 
# customer's search
def searchByKeywords(city, keywords):

	params = {
		'term': keywords
	}

	response = client.search(city, **params)
	bs = response.businesses
	for b in bs:
		print b.name
		# print b.rating
		# print b.rating_img_url
		# print b.location
		# print b.phone

def searchByLocation(latitude, longitude):

	params = {
		'term': 'restaurants',
		'radius_filter': 2000
	}

	response = client.search_by_coordinates(latitude, longitude, **params)
	bs = response.businesses
	for b in bs:
		print b.name

def main():
	# searchByLocation('Seattle')
	# searchByKeywords('Seattle', 'japanese food')
	searchByLocation(47.6205,-122.3493)

if __name__ == "__main__":
	main()