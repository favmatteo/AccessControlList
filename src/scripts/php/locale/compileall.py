import os 
import subprocess

valid = 0
total = 0
for dir_name in os.listdir('.'):
    if os.path.isdir(dir_name):
        total += 1
        result = subprocess.run(['msgfmt', '-o', f'{dir_name}/LC_MESSAGES/messages.mo' ,f'{dir_name}/LC_MESSAGES/messages.po'], stdout=subprocess.PIPE,  stderr=subprocess.PIPE)
        if(result.returncode != 0):
            print(f"\033[31mError {dir_name} ❌\033[0m")
            print(f"\033[93m{result.stderr.decode('utf-8')}\033[0m", end='')
        else:
            print(f"\033[92mCompiled {dir_name} ✅\033[0m")
            valid += 1

if(valid == total):
    print(f"\033[1;92mAll files have been compiled {valid}/{total}🎉\033[0m")
else:
    print(f"\033[1;31mError: Only {valid}/{total} file were compiled❗\033[0m")