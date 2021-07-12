# -*- coding: utf-8 -*-
import yfinance as yf
import matplotlib.pyplot as plt

ticker = "MELI.BA"
data = yf.download(ticker, period="20y")

"""
Para poder ver el grafico de montaña
print(data.head(4))

print("\n--Describe--\n", data.describe())

print("\n--Columns--\n", data.columns)

plt.style.use("dark_background")
plt.rcParams["figure.figsize"] = [12.0, 5]
plt.yscale("log")
data["Adj Close"].plot(kind="line", title="GOOG en USD")
"""

#para ver eñ grafico de barras de variacion porcentual 
variaciones = data["Adj Close"].pct_change()*100

agrupados = variaciones.groupby(data.index.year).sum()

agrupados.plot(kind="bar", title="MELI - Suma de rendimientos/año")

print (type(ticker))