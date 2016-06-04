#!/usr/bin/env python
import boto.ec2, ConfigParser, os

config = ConfigParser.SafeConfigParser()
config.read(os.path.expanduser("~/.aws/credentials"))

conn = boto.ec2.connect_to_region(
    config.get("ukdata", "region"),
    aws_access_key_id=config.get("ukdata", "aws_access_key_id"),
    aws_secret_access_key=config.get("ukdata", "aws_secret_access_key")
)

sgs = conn.get_all_security_groups()
for sg in sgs:
    if not len(sg.instances()):
        print sg.name, sg.id, len(sg.instances())
        try:
            conn.delete_security_group(group_id=sg.id)
            print "--removed", sg.id
        except:
            print "--could not remove", sg.id
