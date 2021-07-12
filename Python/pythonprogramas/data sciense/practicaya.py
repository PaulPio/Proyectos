# -*- coding: utf-8 -*-
"""
Created on Tue May 12 22:09:09 2020

@author: CesarAndres
"""

import yfinance as yf
import matplotlib.pyplot as plt

empresa = "MELI.BA"

data = yf.download(empresa, period="1y")
print("\n--Describe--\n", data.describe())

print("\n--Columns--\n", data.columns)


plt.style.use("dark_background")
plt.rcParams["figure.figsize"] = [12.0, 5]
plt.yscale("log")
data["Adj Close"].plot(kind="line", title="MELI en USD")

print (type(empresa))