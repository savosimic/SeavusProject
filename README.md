# Test project - Seavus


## Getting Started

These instructions will get you a copy of the project up and running on your local machine for testing purposes.

### Prerequisites

Download and install [Docker](https://www.docker.com/get-started)

### Set up project

Create empty directory for project:

```sh
mkdir seavus
cd seavus
```


Clone Seavus Project:

```sh
git clone https://github.com/savovivant/SeavusProject.git
```

In your favorite IDE open project directory, and:

Now from SeavusProject directory you should be able to start and stop docker containers.

Build:

```sh
sudo docker-compose build
```

Start:

```sh
sudo docker-compose up -d
```

Stop:

```sh
sudo docker-compose down
```

You can access docker container with project files with:

```sh
docker exec -it workspace_name
```
### Configure MySql Workbench

Create new MySql connection with these information

```sh
Connection name: db_test
Hostname: 127.0.0.1
Username: root
Password: root
Port: 6033
```

### Run project

In your favorite browser navigate to: http://localhost:8888/login-page.php

Login with:

 - Username: administrator
 - Password: 11111111

### Developer:
-Savo Simic
