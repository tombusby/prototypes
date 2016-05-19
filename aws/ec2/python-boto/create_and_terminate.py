#!/usr/bin/env python
import ConfigParser, boto.ec2, time

class EC2Service:
    CREDENTIALS_FILE = "aws_credentials.ini"
    AMI = "ami-234ecc54"

    _conn = None
    _running_instances = []

    def _check_for_connection(self):
        if self._conn is None:
            self._conn = self._get_connection(self._get_aws_credentials())

    def _get_aws_credentials(self):
        config = ConfigParser.SafeConfigParser()
        config.read(self.CREDENTIALS_FILE)
        return {
            "aws_access_key": config.get("credentials", "aws_access_key_id"),
            "aws_secret_access_key": config.get("credentials", "aws_secret_access_key"),
            "region": config.get("credentials", "region"),
        }

    def _get_connection(self, credentials):
        return boto.ec2.connect_to_region(
            credentials["region"],
            aws_access_key_id=credentials["aws_access_key"],
            aws_secret_access_key=credentials["aws_secret_access_key"]
        )

    def launch_instance(self):
        self._check_for_connection()
        reservation = self._conn.run_instances(self.AMI, instance_type='t2.micro')
        self._running_instances.append(reservation)

    def stop_running_instances(self):
        for reservation in self._running_instances:
            for instance in reservation.instances:
                instance.terminate()
        self._running_instances = []

def main():
    ec2 = EC2Service()
    ec2.launch_instance()
    print "sleeping..."
    time.sleep(10)
    print "...awake"
    ec2.stop_running_instances()

if __name__ == "__main__":
    main()
