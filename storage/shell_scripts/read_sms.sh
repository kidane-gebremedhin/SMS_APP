#!/bin/bash
#ls -l
#./session.sh
curl -b session.txt -c session.txt http://192.168.8.1/html/index.html > /dev/null 2>&1
#./token.sh
TOKEN=$(curl -s -b session.txt -c session.txt http://192.168.8.1/html/smsinbox.html)
TOKEN=$(echo $TOKEN | cut -d'"' -f 10)

echo $TOKEN > token.txt

TOKEN=$(<token.txt)

PAGENUMBER=$1
PAGINATIONSIZE=$2

DATA="<request><PageIndex>$PAGENUMBER</PageIndex><ReadCount>$PAGINATIONSIZE</ReadCount><BoxType>1</BoxType><SortType>0</SortType><Ascending>0</Ascending><UnreadPreferred>1</UnreadPreferred></request>"

curl -b session.txt -c session.txt -H "X-Requested-With: XMLHttpRequest" --data "$DATA" http://192.168.8.1/api/sms/sms-list --header "__RequestVerificationToken: $TOKEN" --header "Content-Type:text/xml"

