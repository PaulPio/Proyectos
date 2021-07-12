#Programa para cambiar la temperatura de Celsius a Farenheit por la entrada del usuario
try:
    while True:
        try:
            Celsius = (input ("Introduce la Temperatura en Celsius: \n"))
            if Celsius == "fin":
                print ("Ha terminado")
                break
            if int (Celsius):
                Celsius = int (float (Celsius))
                Farenheit =  float (9.0/5.0 * Celsius + 32)
                print ("La temperatura en Farenheit es:",Farenheit)
                Kelvin = float (Celsius + 273)
                print ("La temperatura en Kelvin es:",Kelvin)
        except:
            print ("Try again")
except:
    print ("Por favor introduce un numero")
    
    