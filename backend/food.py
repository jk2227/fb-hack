from yelp.client import Client
from yelp.oauth1_authenticator import Oauth1Authenticator

auth = Oauth1Authenticator(
	consumer_key='nI2ym2HtMeUiqok8F5UfsA',
	consumer_secret='CDu7QRRU4oDquGoCaN4zh9agdfo',
	token='S0vofSv5-IGHfyJ0JkU93-YahQvSiNyM',
	token_secret='fbyTLjZF69W_FHz3NY5gcKyNOVo'
)

client = Client(auth)

def searchByLocation(city):
	params = {
		'term': 'food'
	}

	response = client.search(city, **params)
	bs = response.businesses
	for b in bs:
		print b.name


def main():
	searchByLocation('Seattle')

if __name__ == "__main__":
	main()