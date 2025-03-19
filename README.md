<div align="center">
    <h1> Projeto OCR </h1>
</div>

<p align="center">
    <img src="https://img.shields.io/badge/php-%23777BB4.svg?style=flat-square&logo=php&logoColor=white"/>
    <img src="https://img.shields.io/badge/laravel-%23FF2D20.svg?style=flat-square&logo=laravel&logoColor=white"/>
    <img src="https://img.shields.io/badge/livewire-%234e56a6.svg?style=flat-square&logo=livewire&logoColor=white"/>
    <img src="https://img.shields.io/badge/mysql-4479A1.svg?style=flat-square&logo=mysql&logoColor=white"/>
    <img src="https://img.shields.io/badge/tailwindcss-%2338B2AC.svg?style=flat-square&logo=tailwind-css&logoColor=white"/>
</p>

## Descrição

<p align="justify">
A aplicação foi desenvolvida utilizando Laravel, Livewire e Tailwind CSS, permitindo o upload de imagens de documentos para extração de texto via OCR. Os usuários podem selecionar os idiomas de origem e destino para gerar uma cotação de tradução, com o preço estimado calculado com base no número de palavras extraídas. Todos os pedidos são registrados e armazenados no banco de dados, garantindo um gerenciamento eficiente e organizado de todo o processo.
</p>

## Funcionalidade

### Formulário

:heavy_check_mark: **Campos obrigatórios**

:heavy_check_mark: **Validações de campos**

:heavy_check_mark: **Seleção de idiomas**

:heavy_check_mark: **Upload de arquivos**

## Configuração do Ambiente

### Pré-requisitos

:warning: [PHP 8.4](https://www.php.net/downloads.php)

:warning: [Composer](https://getcomposer.org/download/)

:warning: [NPM](https://docs.npmjs.com/downloading-and-installing-node-js-and-npm)

:warning: [Laravel Herd](https://herd.laravel.com/)

### Instalação de dependências

```shell
composer install
npm install
```

### Configurar ambiente

```shell
cp .env.example .env
php artisan key:generate
```

### Execução de migrações

```shell
php artisan migrate
```

### Iniciar Tailwind

```shell
 npm run dev
```

## Tecnologias Utilizadas

### Linguagem

-   [PHP 8.4](https://www.php.net/docs.php)

### Framework

-   [Laravel 12](https://laravel.com/docs/11.x)
-   [Livewire 3](https://livewire.laravel.com/docs/quickstart)
-   [Tailwind](https://v3.tailwindcss.com/docs/installation)

### Biblioteca

-   [FluxUI](https://fluxui.dev/docs/installation)
-   [Google Cloud Vision](https://cloud.google.com/php/docs/reference/cloud-vision/latest)
-   [AWS](https://aws.amazon.com/pt/sdk-for-php/)

### Banco de dados

-   MySQL
