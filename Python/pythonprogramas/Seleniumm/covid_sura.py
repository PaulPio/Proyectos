#Prgrama de practica de selenium para manipular paginas web
from selenium import webdriver
from selenium.webdriver.common.keys import Keys
import time, json
# Direccion del driver
driver = webdriver.Chrome(executable_path="C:\\Users\\Paul\\OneDrive\\Documents\\Paul\\Paul_Programacion\\Autodidacta\\Python\\pythonprogramas\\Seleniumm\\chromedriver.exe")
# Abrir archivo json
with open("C:\\Users\\Paul\\OneDrive\\Documents\\Paul\\Paul_Programacion\\Autodidacta\\Python\\pythonprogramas\\Seleniumm\\employees.json") as json_file:
    #Archivo json cargado
    data = json.load(json_file)
    #Bucle for en los datos del archivo json para leerlos de uno en uno los daos del array y colocar los datos en la pagina
    for p in data["employees"]:
        print(p["name"] + " is loading!")#Prueba
        #Usar el driver para llegar a la pagina web
        driver.get("https://www.segurossura.com.co/covid-19/encuestas/paginas/sintomas.aspx")
        #Para dejar tiempo que la pagina cargue
        time.sleep(3)
        #Identificadores de los diferentes elementos de la pagina ------------------------------------------------------------------
        #Primer boton
        nextPageBtn = driver.find_element_by_name("data[page3SiAutorizo]")
        nextPageBtn.click()
        #User Id
        userId= driver.find_element_by_name("data[identificacion_usuario]")
        userId.send_keys(p["id"])
        #Nombre
        name= driver.find_element_by_name("data[nombre_usuario]")
        name.send_keys(p["name"])
        #Segundoo boton
        nextPageBtn2 = driver.find_element_by_name("data[page1Siguiente]")
        nextPageBtn2.click()

driver.close()#cerrar navegador usando el driver