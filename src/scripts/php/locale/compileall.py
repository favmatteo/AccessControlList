import os 
import subprocess

for dir_name in os.listdir('.'):
    if os.path.isdir(dir_name):
        result = subprocess.run(['msgfmt', '-o', f'{dir_name}/LC_MESSAGES/messages.mo' ,f'{dir_name}/LC_MESSAGES/messages.po'], stdout=subprocess.PIPE)
        print(f"Compiled {dir_name}")