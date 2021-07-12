#program to calculate the cubic root of a number
try:
    while True:
        num = input("Enter number\n")
        if num=="fin":break
        num = float(num)
        x = float(num ** (1/3))
        print("The cubic root of %f is %f" % (num, x))
except:
    print ("fail to enter number")
