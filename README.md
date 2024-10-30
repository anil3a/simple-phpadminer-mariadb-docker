# MariaDB Docker Setup

This repository contains a Docker Compose file to set up a MariaDB container along with phpMyAdmin and Adminer to simplify database management. It uses a traefik setup so you may want to change it to your preferrence of setup or change to your preferrence of your domain name in your local/server, and also with network name called traefik.

## Features

- **MariaDB**: A popular open-source relational database.
- **phpMyAdmin**: A web interface for managing MariaDB databases.
- **Adminer**: A lightweight web-based database management tool.

- **Traefik**: Traefik reverse proxy

## Prerequisites

- Docker
- Docker Compose
- Traefik (optional)

## Getting Started

1. Clone the repository:
    ```sh
    git clone https://github.com/anil3a/simple-phpadminer-mariadb-docker.git
    cd simple-phpadminer-mariadb-docker
    cp docker-compose.SAMPLE.yml docker-compose.yml
    ```

2. Start the containers:
    ```sh
    docker-compose up -d
    ```

3. Access the services:
    - MariaDB: `localhost:3306`
    - phpMyAdmin: `http://localhost:8001`  (Currently my local Traefik domain: http://zlocalmariadb.com )
    - Adminer: `http://localhost:8002`  (Currently my local Traefik domain: http://zlocaldbmanager.com )

## Configuration

- **MariaDB**:
  - Default user: `mariadb`
  - Default password: `mariadb`
  - Database: `mariadb`

- **phpMyAdmin**:
  - Access via `http://localhost:8001`

- **Adminer**:
  - Access via `http://localhost:8002`

## Stopping the Containers

To stop and remove the containers, run:
```sh
docker-compose down
```

## License

This project is licensed under the MIT License.

## Contributing

Contributions are welcome! Please open an issue or submit a pull request.

## Contact

For any questions, you can contact me on ![X Logo](x-logo.png) [@anilprz](https://x.com/anilprz)
