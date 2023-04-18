<p  align="right">
<a  href="https://ayp-group.com/"  target="_blank"><img  src="https://media.licdn.com/dms/image/C560BAQG3LseHRrTLdQ/company-logo_200_200/0/1611567176258?e=2147483647&v=beta&t=pNnzj5v1870TJpsS0oWNo0PtKMbxqFmRmOGI14740pk"  width="140"></a></p>
<p  align="right"><a  href="https://laravel.com"  target="_blank"><img  src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg"  width="150"></a>
</p>

## **Assignment background**

By using Laravel version 10 is required to develop a simple claim submission module
WITHOUT user login module. The claim submission modules consist of two major sub-modules:

- Dashboard which displays all the claim(s) submitted and corresponding
status (approved, rejected, waiting for approval). By clicking on a claim we
expect to see the details
- Claim submission where user can submit their claims

Side note: This system is not expecting any approval level at this point, meaning can just update the status directly from database.

## **Technology stack used**

- [Laravel](https://laravel.com)
- [InertiaJS](https://inertiajs.com/)
- [Svelte](https://svelte.dev/)

## **Additional packages used**

### **Composer**

- [Laravel Octane](https://laravel.com/docs/10.x/octane)
- [Spatie Ray](https://spatie.be/docs/ray/v1/introduction)

### **NPM**

- [Chokidar](https://github.com/paulmillr/chokidar)
---
## **Getting Started**

### **Requirements**

The only requirement is install [Docker](https://docs.docker.com/)

### **Installation**

1. Clone this repo
    ```
    git clone https://github.com/naimsolong/ayp-assignment.git
    ```

2. Copy environment file
    ```
    cp .env.example .env
    ```

3. Build the docker image and run container
    ```
    docker compose up --build -d
    ```

4. After the container is running, then you can access this web app by ```localhost:8000```

### **Additional Note**

1. To run a command inside docker container
    ```
    docker exec -it ayp-app /bin/bash
    ```