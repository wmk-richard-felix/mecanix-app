# Script para subir o docker

## Pré requisitos

Para executar corretamente o aplicativo conteinerizado deve ter instalado:
1. **[Docker][docker-install]**
2. **[Docker Compose][docker-compose]**

## Executando o aplicativo com o Docker Compose
Compile a imagem do app com o seguinte comando:

```sh
docker-compose build app
```

Esse comando pode levar alguns minutos para completar. Você verá um resultado similar a este:

```sh
Output
Building app
Step 1/11 : FROM php:7.4-fpm
 ---> fa37bd6db22a
Step 2/11 : ARG user
 ---> Running in f71eb33b7459
Removing intermediate container f71eb33b7459
 ---> 533c30216f34
Step 3/11 : ARG uid
 ---> Running in 60d2d2a84cda
Removing intermediate container 60d2d2a84cda
 ---> 497fbf904605
Step 4/11 : RUN apt-get update && apt-get install -y     git     curl     libpng-dev
libonig-dev     ...
Step 7/11 : COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
 ---> e499f74896e3
Step 8/11 : RUN useradd -G www-data,root -u $uid -d /home/$user $user
 ---> Running in 232ef9c7dbd1
Removing intermediate container 232ef9c7dbd1
 ---> 870fa3220ffa
Step 9/11 : RUN mkdir -p /home/$user/.composer &&     chown -R $user:$user /home/$user
 ---> Running in 7ca8c0cb7f09
Removing intermediate container 7ca8c0cb7f09
 ---> 3d2ef9519a8e
Step 10/11 : WORKDIR /var/www
 ---> Running in 4a964f91edfa
Removing intermediate container 4a964f91edfa
 ---> 00ada639da21
Step 11/11 : USER $user
 ---> Running in 9f8e874fede9
Removing intermediate container 9f8e874fede9
 ---> fe176ff4702b

Successfully built fe176ff4702b
Successfully tagged mecanix:latest
```

Quando a compilação estiver concluída, você poderá executar o ambiente em segundo plano com:

```sh
docker-compose up -d
```

```sh
Output
Creating mecanix-db    ... done
Creating mecanix-app   ... done
Creating mecanix-nginx ... done
```

Isso executará seus contêineres em segundo plano. Para exibir informações sobre o estado de seus serviços ativos, execute:

```sh
docker-compose ps
```

Você verá um resultado como este:

```sh
Output
      Name                    Command              State          Ports        
-------------------------------------------------------------------------------
mecanix-app     docker-php-entrypoint php-fpm   Up      9000/tcp            
mecanix-db      docker-entrypoint.sh mysqld     Up      3306/tcp, 33060/tcp
mecanix-nginx   nginx -g daemon off;            Up      0.0.0.0:8000->80/tcp
```

Agora, seu ambiente está funcionando! Porém, ainda precisaremos executar alguns comandos para concluir a configuração do aplicativo. Você pode usar o comando docker-compose exec para executar comandos nos contêineres de serviço, como um ls -l para exibir informações detalhadas sobre os arquivos no diretório do aplicativo:

```sh
docker-compose exec app ls -l
```

```sh
Output
total 256
-rw-rw-r-- 1 sammy 1001    738 Jan 15 16:46 Dockerfile
-rw-rw-r-- 1 sammy 1001    101 Jan  7 08:05 README.md
drwxrwxr-x 6 sammy 1001   4096 Jan  7 08:05 app
-rwxr-xr-x 1 sammy 1001   1686 Jan  7 08:05 artisan
drwxrwxr-x 3 sammy 1001   4096 Jan  7 08:05 bootstrap
-rw-rw-r-- 1 sammy 1001   1501 Jan  7 08:05 composer.json
-rw-rw-r-- 1 sammy 1001 179071 Jan  7 08:05 composer.lock
drwxrwxr-x 2 sammy 1001   4096 Jan  7 08:05 config
drwxrwxr-x 5 sammy 1001   4096 Jan  7 08:05 database
drwxrwxr-x 4 sammy 1001   4096 Jan 15 16:46 docker-compose
-rw-rw-r-- 1 sammy 1001   1015 Jan 15 16:45 docker-compose.yml
-rw-rw-r-- 1 sammy 1001   1013 Jan  7 08:05 package.json
-rw-rw-r-- 1 sammy 1001   1405 Jan  7 08:05 phpunit.xml
drwxrwxr-x 2 sammy 1001   4096 Jan  7 08:05 public
drwxrwxr-x 6 sammy 1001   4096 Jan  7 08:05 resources
-rw-rw-r-- 1 sammy 1001    273 Jan  7 08:05 readme.md
drwxrwxr-x 2 sammy 1001   4096 Jan  7 08:05 routes
-rw-rw-r-- 1 sammy 1001    563 Jan  7 08:05 server.php
drwxrwxr-x 5 sammy 1001   4096 Jan  7 08:05 storage
drwxrwxr-x 4 sammy 1001   4096 Jan  7 08:05 tests
-rw-rw-r-- 1 sammy 1001    538 Jan  7 08:05 webpack.mix.js
```

Agora, vamos executar o composer install para instalar as dependências do aplicativo:

```sh
docker-compose exec app composer install
```

Você verá um resultado como este:

```sh
Output
Loading composer repositories with package information
Installing dependencies (including require-dev) from lock file
Package operations: 85 installs, 0 updates, 0 removals
  - Installing doctrine/inflector (1.3.1): Downloading (100%)         
  - Installing doctrine/lexer (1.2.0): Downloading (100%)         
  - Installing dragonmantank/cron-expression (v2.3.0): Downloading (100%)         
  - Installing erusev/parsedown (1.7.4): Downloading (100%)         
  - Installing symfony/polyfill-ctype (v1.13.1): Downloading (100%)         
  - Installing phpoption/phpoption (1.7.2): Downloading (100%)         
  - Installing vlucas/phpdotenv (v3.6.0): Downloading (100%)         
  - Installing symfony/css-selector (v5.0.2): Downloading (100%)        
…
Generating optimized autoload files
> Illuminate\Foundation\ComposerScripts::postAutoloadDump
> @php artisan package:discover --ansi
Discovered Package: facade/ignition
Discovered Package: fideloper/proxy
Discovered Package: laravel/tinker
Discovered Package: nesbot/carbon
Discovered Package: nunomaduro/collision
Package manifest generated successfully.
```

A última coisa que precisamos fazer - antes de testar o aplicativo - é gerar uma chave única para o aplicativo com a `artisan`, a ferramenta de linha de comando do Laravel. Esta chave é usada para criptografar sessões de usuário e outros dados confidenciais:

```sh
docker-compose exec app php artisan key:generate
```

```sh
Output
Application key set successfully.
```

Agora, vá até seu navegador e acesse o nome de domínio ou endereço IP do seu servidor na porta 8000:
>http://server_domain_or_IP:8000

Se quiser pausar seu ambiente do Docker Compose ao mesmo tempo que mantém o estado de todos seus serviços, execute:

```sh
docker-compose pause
```

```sh
Output
Pausing mecanix-db    ... done
Pausing mecanix-nginx ... done
Pausing mecanix-app   ... done
```

Em seguida, você poderá retomar os seus serviços com:

```sh
docker-compose unpause
```

```sh
Output
Unpausing mecanix-app   ... done
Unpausing mecanix-nginx ... done
Unpausing mecanix-db    ... done
```

Para fechar seu ambiente do Docker Compose e remover todos os seus contêineres, redes e volumes, execute:

```sh
docker-compose down
```

```sh
Output
Stopping mecanix-nginx ... done
Stopping mecanix-db    ... done
Stopping mecanix-app   ... done
Removing mecanix-nginx ... done
Removing mecanix-db    ... done
Removing mecanix-app   ... done
Removing network mecanix-laravel-demo_mecanix
```

Para obter um panorama de todos os comandos do Docker Compose, verifique a [Referência da linha de comando do Docker Compose][docker-compose].

[docker-install]: https://docs.docker.com/get-docker/
[docker-compose]: https://docs.docker.com/compose/install/
[docker-compose]: https://docs.docker.com/compose/reference/