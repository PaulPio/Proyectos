#program fot text sepeech
import pyttsx3

engine = pyttsx3.init()

#function
def speak(audio):
    """Function to speak wathever the user tell then """
    engine.setProperty('voice', 'HKEY_LOCAL_MACHINE\SOFTWARE\Microsoft\Speech\Voices\Tokens\TTS_MS_EN-GB_HAZEL_11.0')#To change voice, first argument is what we want to change, the orhter is the id
    engine.say(audio)
    engine.runAndWait()
