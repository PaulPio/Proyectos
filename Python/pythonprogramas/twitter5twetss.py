""" Este programa toma el nombre de un user en twitter, el cual es elegido
por el usuario """
import bs4
import requests

#Primero pedimos el url de twitter
twitter = r"https://twitter.com/"
pag1 = requests.get(r"https://twitter.com/")

#Luego pedimos el username
user = input("Escribe un nombre de usuario: \n")

#Ahora agregamos el username a la url de twitter
newTwitter = twitter + user
pag = requests.get(newTwitter)
pag2 = bs4.BeautifulSoup(pag.content, "html.parser")

#Tomamos los ultimos 5 twetts
primerT = pag2.select ("")
#x = primerT[0].strip
print(primerT)

#newTwitterpag = bs4.BeautifulSoup(pag.text, "html.parser")

#Por ultimo, mostramos los resultados

