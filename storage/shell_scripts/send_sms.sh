#!/bin/bash

#Get session id
curl -b session.txt -c session.txt http://192.168.8.1/html/index.html > /dev/null 2>&1

#Get token
TOKEN=$(curl -s -b session.txt -c session.txt http://192.168.8.1/html/smsinbox.html)
TOKEN=$(echo $TOKEN | cut -d'"' -f 10)

echo $TOKEN > token.txt

#Send SMS
NUMBER=$1
MESSAGE=$2

LENGTH=${#MESSAGE}
TIME=$(date +"%Y-%m-%d %T")
TOKEN=$(<token.txt)

#SMS="<request><Index>-1</Index><Phones><Phone>$NUMBER</Phone></Phones><Sca/><Content>$MESSAGE</Content><Length>$LENGTH</Length><Reserved>1</Reserved><Date>$TIME</Date></request>"
SMS="<request><Index>-1</Index><Phones>$NUMBER</Phones><Sca/><Content>$MESSAGE</Content><Length>$LENGTH</Length><Reserved>1</Reserved><Date>$TIME</Date></request>"

echo $SMS

curl -v -b session.txt -c session.txt -H "X-Requested-With: XMLHttpRequest" --data "$SMS" http://192.168.8.1/api/sms/send-sms --header "__RequestVerificationToken: $TOKEN" --header "Content-Type:text/xml"



