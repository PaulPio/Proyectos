import time
a, b, c = 1, 2, 3
a, b, c = c, a, b = b, a, c = c, b, a
print (a, b, c)
time.sleep(5)
