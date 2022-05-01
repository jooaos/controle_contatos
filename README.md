# Site - Controle de Contatos
Olá, tudo bem? Bom, para rodar está aplicação em *localhost* você deverá seguir os passos abaixo.

### Dependências
Na sua máquina você terá que ter:
 - [PHP] (>= 7.4)
 - [MySQL] (>=5.7)
 - [Composer] (>=2.0.6)
 - [Node] (>=14.0)

### Instalando
```sh
git clone https://github.com/jooaos/controle_contatos.git
cd controle_contatos
composer install
cp env.example .env
php artisan key:generate
```

Crie em seu localhost um banco de dados MySql. Com o banco de dados criado, edite as linhas 12, 13 e 14 do arquivo .env com os dados do banco criado, e em seguida faça:

```sh
php artisan migrate:fresh --seed
php artisan serve 
```
Para logar na página, utilize as credenciais:
Login   | Senha
------- | ------
teste@teste.com | teste

[//]: #
   [PHP]: <https://www.php.net/>
   [MySQL]: <https://www.mysql.com/>
   [Composer]: <https://getcomposer.org/>
   [Node]: <https://nodejs.org/en/>
