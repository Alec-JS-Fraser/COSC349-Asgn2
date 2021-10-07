import boto3

s3 = boto3.client('s3')
with open("Users.csv", "rb") as f:
    s3.upload_fileobj(f, "alec-asgn-bucket", "user_table")