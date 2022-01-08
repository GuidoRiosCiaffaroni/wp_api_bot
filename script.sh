#!/bin/bash
URLApiData='http://puebadominio.royalwebhosting.net'
APIPage='api'
URLData=''

UserSystem='Grios'
Data[0]='ServerUser='$UserSystem

UserPassword='GR123456.'
Data[1]='ServerUser='$UserPassword

UserToken='qwerty'
Data[2]='UserToken='$UserUserToken

ServerDate=`date "+%d-%m-%y_%H-%M-%S"`
Data[3]='ServerDate='$ServerDate

ServerName=$(hostname)
Data[4]='ServerName='$ServerName


#URLQuery=$URLApiData'/'$APIPage'/?'${Data[0]}
URLBase=$URLApiData'/'$APIPage'/?'


arraylength=${#Data[@]}

for (( i=1; i<${arraylength}+1; i++ ));
do
  echo $i " / " ${arraylength} " : " ${Data[$i-1]}
  echo $URLData = ${Data[$i-1]}
done



#while read -r $Data; do
#    printf $Data+=( "$Data" )
#done






#for str in ${Data[@]}; do
#  printf $str
#  	$URLData = $str
#  	$URLData = "$URLData$str"   
#done


#for i in ${!Data[@]}; do
#  printf "element $i is ${Data[$i]}"
#done
























#echo $ServerDate
#echo $ServerName
#echo $URLApiData
#echo $URLQuery

#NAME[0]="Zara"
#NAME[1]="Qadir"
#NAME[2]="Mahnaz"
#NAME[3]="Ayan"
#NAME[4]="Daisy"
#echo "First Index: ${NAME[0]}"
#echo "Second Index: ${NAME[1]}"
#echo "First Method: ${NAME[*]}"
#echo "Second Method: ${NAME[@]}"

#for i in "${NAME[@]}"; do echo "$i"; done
#for i in "${NAME[*]}"; do echo "$i"; done
#echo ${NAME[0]}${NAME[1]}

