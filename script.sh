#!/bin/bash
URLApiData='http://puebadominio.royalwebhosting.net'
APIPage='api'
URLData=''
URLGet=''

#Nombre del usuario
UserSystem='Grios'
Data[0]='ServerUser='$UserSystem'&'

#Password 
UserPassword='GR123456.'
Data[1]='ServerPassword='$UserPassword'&'

#Token para validacion
UserToken='qwerty'
Data[2]='UserToken='$UserToken'&'

#Fecha del Servidor
ServerDate=`date "+%d-%m-%y_%H-%M-%S"`
Data[3]='ServerDate='$ServerDate'&'

#Nombre del Servidor
ServerName=$(hostname)
Data[4]='ServerName='$ServerName'&'


#URLQuery=$URLApiData'/'$APIPage'/?'${Data[0]}
URLBase=$URLApiData'/'$APIPage'/?'


arraylength=${#Data[@]}

for (( i=1; i<${arraylength}+1; i++ ));
do
  #echo $i " / " ${arraylength} " : " ${Data[$i-1]}
  #URLData=${Data[$i-1]}"&"
  URLData="${Data[$i-1]}${URLData}"
  echo $URLData
done

URLGet=$URLBase$URLData
echo $URLGet