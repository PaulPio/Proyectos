#program to tell time and date using speech

import datetime
import speech
import speech_recognition as sr
import wikipedia
import smtplib
import webbrowser as wb
import os
import pyautogui
import psutil
import pyjokes
def time():
    """Function to tell time"""
    Time = datetime.datetime.now().strftime("%H:%M:%S")
    speech.speak("the current time is")
    speech.speak(Time)

def date():
    """Function to tell date  """
    year = int(datetime.datetime.now().year)#obtener año
    month = int(datetime.datetime.now().month)#obtener mes
    day = int(datetime.datetime.now().day)#obtener dia
    speech.speak("The current date is")
    speech.speak(day)#decir dia
    speech.speak(month)#decir mes
    speech.speak(year)#decir año

def wishme():
    """Greettin function"""
    speech.speak("Welcome back sir")
    time()
    date()
    hour = datetime.datetime.now().hour

    if hour >= 6 and hour < 12:
        speech.speak("Good morning sir.")
    elif hour >= 12 and hour < 18:
        speech.speak("Good afternoon sir.")
    elif hour >= 18 and hour <= 24:
        speech.speak("Good evening sir.")
    else:
        speech.speak("Good night sir")
    speech.speak("Jarvis at your service. Please tell me how can I help you?")


def takeCommand():
    """Function to take words from the user"""
    r = sr.Recognizer()#For start to recognize voice
    with sr.Microphone() as source:#To start the microphone
        print("Listening...")
        # r.pause_threshold = 1 doesn't work
        r.adjust_for_ambient_noise(source, duration=1)#1 second pause
        audio = r.listen(source)#listening
    try:
        print("Recognizing...")
        query = r.recognize_google(audio, language='en-US')
        print(query)
    except Exception as e:
        print(e)
        speech.speak("Say that again please...")
        return "None"
    return query

def sendEmail(to, content):
    """To send an email. In order to use this function you must allow acces to unsafe application on your google account"""
    server = smtplib.SMTP('smtp.gmail.com', 587)
    server.ehlo()
    server.starttls()
    server.login('paulrpiotrowski@gmail.com', 'Guarimba22.')
    server.sendmail('paulrpiotrowski@gmail.com', to, content)
    server.close()


def screenshot():
    """To do a screenshot of the screen"""
    img = pyautogui.screenshot()
    img.save("C:/Users/Paul/OneDrive/Documents/Paul/Paul_Programacion/Udemy/python AI jarvis/capture.png")

def cpu():
    """To tell data of the pc"""
    usage = str(psutil.cpu_percent())
    speech.speak("CPU is at " + usage)
    battery = psutil.sensors_battery()
    speech.speak("Battery is at ")
    speech.speak(battery.percent)

def jokes():
    speech.speak(pyjokes.get_joke())
# main function
if __name__ == "__main__":
    # wishme()
    while True:#Always running progrram
        query = takeCommand().lower()#For compare in the conditionals and run the functions
        if "time" in query:#tell time
            time()
        elif "date" in query:#tell date
            date()
        elif 'wikipedia' in query:#search on wikipedia, it searches what you the user says after wikipedia
            speech.speak("Searching")
            query = query.replace("wikipedia", "")
            result = wikipedia.summary(query, sentences=2)
            print(result)
            speech.speak(result)
        elif 'send email' in query:#To send an email
            try:
                speech.speak("What should I say?")#Asking wthat are you gonna send
                content = takeCommand()
                to = 'diego45652@gmail.com'
                sendEmail(to, content)
                speech.speak("Email has been send")
            except Exception as e:
                print(e)
                speech.speak("Unable to send the email")
        elif 'search in browser' in query:#To search something on the web
            speech.speak("What do you want to search")
            browser = takeCommand() + ".com"
            print("Searching", browser)
            wb.open(browser)
        elif 'logout' in query:#To logout
            os.system("shutdown -l")
        elif 'restart' in query:#To restart
            os.system("shutdown /s /t 1")
        elif 'shutdown' in query:#To shutdown
            os.system("shutdown /r /t 1")
        elif 'play songs' in query:#to play songs
            songs_dir = 'C:/Users/Paul/Music'
            songs = os.listdir(songs_dir)
            os.startfile(os.path.join(songs_dir, songs[1]))
        elif "remember that" in query:#To write somtehing in a txt file
            speech.speak("What should I remember")
            data = takeCommand()
            speech.speak("You said me to remember that" + data)
            remember = open('data.txt', 'w')
            remember.write(data)
            remember.close()
        elif "do you know anyting" in query:#To read data.txt
            remember = open("data.txt", "r")
            speech.speak("You said to remember that " + remember.read())
        elif "screenshot" in query:#To take a sreecshot 
            screenshot()
            speech.speak("Done") 
        elif "cpu data" in query:#to tell cpu data
            cpu()                
        elif "joke" in query:
            jokes()
        elif "finish"  in query:#leave program
            print("The program has finished..")
            quit()
