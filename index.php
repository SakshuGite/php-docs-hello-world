# Set Variables
RESOURCE_GROUP="EduPlatformRG"
LOCATION="eastus"
PHP_APP_NAME="edu-php-portal"
MYSQL_SERVER_NAME="edu-mysql-server"
MYSQL_DB_NAME="student_portal"
ADMIN_USER="adminuser"
ADMIN_PASS="StrongPass@123"

# Create Resource Group
az group create --name $RESOURCE_GROUP --location $LOCATION

# Create MySQL Server & Database
az mysql server create --name $MYSQL_SERVER_NAME \
    --resource-group $RESOURCE_GROUP \
    --location $LOCATION \
    --admin-user $ADMIN_USER \
    --admin-password $ADMIN_PASS \
    --sku-name B_Gen5_2

az mysql db create --name $MYSQL_DB_NAME \
    --server-name $MYSQL_SERVER_NAME \
    --resource-group $RESOURCE_GROUP

# Deploy PHP Web Application
az webapp create --name $PHP_APP_NAME \
    --resource-group $RESOURCE_GROUP \
    --plan B1 \
    --runtime "PHP|8.0"

# Configure MySQL Connection
az webapp config appsettings set --name $PHP_APP_NAME \
    --resource-group $RESOURCE_GROUP \
    --settings DATABASE_URL="mysql://$ADMIN_USER:$ADMIN_PASS@$MYSQL_SERVER_NAME.mysql.database.azure.com/$MYSQL_DB_NAME"

# Deploy PHP Code from GitHub (if not cloned manually)
az webapp deployment source config --name $PHP_APP_NAME \
    --resource-group $RESOURCE_GROUP \
    --repo-url "https://github.com/your-repo/php-student-portal" \
    --branch main \
    --manual-integration
