#! /bin/bash

# Deploy the website to a remote server. This script is automatically launched by travis CI.
# $FTP_USER : should be the user id (exemple : user123)
# $FTP_PASSWORD : should be the password to connect the user (exemple : 123456789)
# $FTP_WEBSITE : should be the remote website (exemple : test.com)
# With the exemple data, the github repository will be cloned to http://test.com/test/ folder

find * -type d -print0 -exec curl -u $FTP_USER:$FTP_PASSWORD ftp://$FTP_WEBSITE/'{}' --ftp-create-dirs \;
find * -type f -print0 -exec curl -T '{}' -u $FTP_USER:$FTP_PASSWORD ftp://$FTP_WEBSITE/'{}' --ftp-create-dirs \;
