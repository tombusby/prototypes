import ConfigParser

config = ConfigParser.SafeConfigParser()
config.read('aws_credentials.ini')

AWS_ACCESS_KEY = config.get('credentials', 'aws_access_key_id')
AWS_SECRET_ACCESS_KEY = config.get('credentials', 'aws_access_key_id')
REGION = config.get('credentials', 'region')

print AWS_ACCESS_KEY, AWS_SECRET_ACCESS_KEY, REGION
