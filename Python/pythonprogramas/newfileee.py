import requests
from bs4 import BeautifulSoup


USER_AGENT = {'User-Agent':'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36'}

def obtener_resultados(termino_busqueda, numero_resultados, codigo_lenguaje):
    url_google = 'https://www.google.com/search?q={}&num={}&hl={}'.format(termino_busqueda, numero_resultados, codigo_lenguaje)
    respuesta = requests.get(url_google, headers=USER_AGENT)
    respuesta.raise_for_status()
    return termino_busqueda, respuesta.text

def procesar_resultados(html, palabra):
    soup = BeautifulSoup(html, 'html.parser')
    resultados_encontrados = []
    bloque = soup.find_all("div", class_="g")
    for resultado in bloque:
        titulo = resultado.find('h3').string
        resultados_encontrados.append(titulo)
    return resultados_encontrados

def scrap(termino_busqueda, numero_resultados, codigo_lenguaje):
    palabra, html = obtener_resultados(termino_busqueda, numero_resultados, codigo_lenguaje)
    resultados = procesar_resultados(html, palabra)
    return resultados

if __name__ == '__main__':
    palabra = 'Quantika14'
    h5 = (palabra, 1, "es")
h6 = (h5[0])

username=h6
url = 'https://www.twitter.com/'+username
r = requests.get(url)
soup = BeautifulSoup(r.content,'html.parser')



f = soup.find('li', class_="ProfileNav-item--followers")
title = f.find('a')['title']
print (title)

g=soup.find_all('title', limit=1)
h = soup.select('.bio',limit=1)



title2 =g
print (title2)
title3=h
print(title3)
