#programa para ver el precio del dolar en bss ya sea el oficial o el paralelo

import bs4
import requests
import os

bcvpag = requests.get(r"http://www.bcv.org.ve/")
parpag = requests.get(r"https://monitordolarvenezuela.com/")

src = parpag.content

soup = bs4.BeautifulSoup(src,"lxml")
cosa = soup.find_all("p")
serv = cosa[2]
item = cosa[1].contents[-1].strip()#Dolar paralelo
euro = cosa[2].contents[-1].strip()#Euro
pag1 = bs4.BeautifulSoup(bcvpag.text, "html.parser")#Pagina del bcv
pag2 = bs4.BeautifulSoup(parpag.text, "html.parser")#Pagina de monitor dolar
petro = cosa[7].contents[-1].strip()#Se coloca el -1 para obtener el ultimo valor de la lista
usdbcv = pag1.select("#block-views-tasas-sistema-bancario-block > div > div.view-content > table > tbody > tr.odd.views-row-first > td.views-field.views-field-field-tasa-compra")
usdpar = pag2.select("div.box-calcmd:nth-child(1) > p:nth-child(2)")
x = usdpar[0].text.strip()#Una forma de obtener el precio del paralelo
y = usdbcv[0].text.strip()#Una forma de obtener el precio del dolar oficial
print(item, " es el precio del dolar paralelo de Monitor Dolar")
print(y, " es el precio del dolar oficial")
print(euro, " es el precio del euro")
print(petro, " es el precio del petro")

os.system("pause")

