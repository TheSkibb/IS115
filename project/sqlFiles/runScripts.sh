if not [ -f "createTables.sql" ]; 
then
cp createTables ./createTables.sql

fi

echo 'creating tables..'
mysql -h 172.17.0.2 -u root -p < createTables.sql
echo 'tables created'

if [ -f "createTables.sql" ] && [ -f "createTables" ];
then
  rm createTables.sql
fi
