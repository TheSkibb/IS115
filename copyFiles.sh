echo 'copying files..'

sudo cp -r ./project $PHP/
sudo chown daemon:daemon /opt/lampp/htdocs/project/htdocs/images
sudo chown daemon:daemon /opt/lampp/htdocs/project/htdocs/images/*

echo 'files copied'


