#Prgrama de practica de selenium para inciar sesion en facebook
from selenium import webdriver
from selenium.webdriver.common.keys import Keys
import time, json

# Direccion del driver
driver = webdriver.Chrome(executable_path="C:\\Users\\Paul\\OneDrive\\Documents\\Paul\\Paul_Programacion\\Autodidacta\\Python\\pythonprogramas\\Seleniumm\\chromedriver.exe")
#Usar el driver para llegar a la pagina web
driver.get("https://www.facebook.com/")
time.sleep(5)
password = driver.find_element_by_name("pass")
password.send_keys("")
id = driver.find_element_by_name("email")
id.send_keys("")

boton = driver.find_element_by_name("login")
boton.click()

