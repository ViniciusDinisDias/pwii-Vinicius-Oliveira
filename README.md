# Instalação do Laravel

## [Conheça o Laravel](https://laravel.com/docs/12.x/installation#meet-laravel)

Laravel é um framework para aplicações web com sintaxe expressiva e elegante. Um framework web fornece uma estrutura e um ponto de partida para a criação da sua aplicação, permitindo que você se concentre em criar algo incrível enquanto nós cuidamos dos detalhes.

O Laravel se esforça para fornecer uma experiência incrível ao desenvolvedor, ao mesmo tempo em que fornece recursos poderosos, como injeção de dependência completa, uma camada de abstração de banco de dados expressiva, filas e trabalhos agendados, testes de unidade e integração e muito mais.

Seja você iniciante em frameworks web PHP ou tenha anos de experiência, o Laravel é um framework que pode crescer com você. Ajudaremos você a dar seus primeiros passos como desenvolvedor web ou daremos um impulso para que você aprimore sua expertise. Mal podemos esperar para ver o que você criará.

### [Por que Laravel?](https://laravel.com/docs/12.x/installation#why-laravel)

Há uma variedade de ferramentas e frameworks disponíveis para você criar uma aplicação web. No entanto, acreditamos que o Laravel é a melhor escolha para criar aplicações web modernas e full-stack.

### Uma Estrutura Progressiva

Gostamos de chamar o Laravel de um framework "progressivo". Com isso, queremos dizer que o Laravel cresce com você. Se você está apenas dando os primeiros passos no desenvolvimento web, a vasta biblioteca de documentação, guias e [tutoriais em vídeo](https://laracasts.com/) do Laravel ajudará você a aprender o básico sem se sentir sobrecarregado.

Se você é um desenvolvedor sênior, o Laravel oferece ferramentas robustas para [injeção de dependências](https://laravel.com/docs/12.x/container) , [testes unitários](https://laravel.com/docs/12.x/testing) , [filas](https://laravel.com/docs/12.x/queues) , [eventos em tempo real](https://laravel.com/docs/12.x/broadcasting) e muito mais. O Laravel é otimizado para a construção de aplicações web profissionais e está pronto para lidar com cargas de trabalho corporativas.

### Uma estrutura escalável

O Laravel é incrivelmente escalável. Graças à natureza amigável do PHP e ao suporte integrado do Laravel para sistemas de cache distribuídos e rápidos, como o Redis, o escalonamento horizontal com o Laravel é muito fácil. De fato, os aplicativos Laravel foram facilmente escaláveis ​​para lidar com centenas de milhões de solicitações por mês.

Precisa de escalabilidade extrema? Plataformas como [o Laravel Cloud](https://cloud.laravel.com/) permitem que você execute seu aplicativo Laravel em escala quase ilimitada.

### Uma Estrutura Comunitária

O Laravel combina os melhores pacotes do ecossistema PHP para oferecer o framework mais robusto e amigável ao desenvolvedor disponível. Além disso, milhares de desenvolvedores talentosos do mundo todo [contribuíram para o framework](https://github.com/laravel/framework) . Quem sabe você até se torna um colaborador do Laravel?

## [Criando uma aplicação Laravel](https://laravel.com/docs/12.x/installation#creating-a-laravel-project)

### [Instalando o PHP e o instalador do Laravel](https://laravel.com/docs/12.x/installation#installing-php)

Antes de criar seu primeiro aplicativo Laravel, certifique-se de que sua máquina local tenha [PHP](https://php.net/) , [Composer](https://getcomposer.org/) e [o instalador do Laravel](https://github.com/laravel/installer) instalados. Além disso, você deve instalar [o Node e o NPM](https://nodejs.org/) ou [o Bundle](https://bun.sh/) para poder compilar os recursos de front-end do seu aplicativo.

Se você não tiver o PHP e o Composer instalados em sua máquina local, os comandos a seguir instalarão o PHP, o Composer e o instalador do Laravel no macOS, Windows ou Linux:

**No macOS:**

    /bin/bash -c  "$(curl -fsSL  https://php.new/install/mac/8.4)"

**No WindowsPowerShell:**

    # Run as administrator...
    Set-ExecutionPolicy Bypass -Scope Process -Force; [System.Net.ServicePointManager]::SecurityProtocol = [System.Net.ServicePointManager]::SecurityProtocol -bor 3072; iex ((New-Object System.Net.WebClient).DownloadString('https://php.new/install/windows/8.4'))

**No Linux:**

    /bin/bash -c "$(curl -fsSL https://php.new/install/linux/8.4)"

Após executar um dos comandos acima, reinicie sua sessão de terminal. Para atualizar o PHP, o Composer e o instalador do Laravel após instalá-los via `php.new`, você pode executar o comando novamente no seu terminal.

Se você já tem o PHP e o Composer instalados, você pode instalar o instalador do Laravel via Composer:

    composer global require laravel/installer

#   

### [Criando um aplicativo](https://laravel.com/docs/12.x/installation#creating-an-application)

Após instalar o PHP, o Composer e o instalador do Laravel, você estará pronto para criar uma nova aplicação Laravel. O instalador do Laravel solicitará que você selecione seu framework de testes, banco de dados e kit inicial preferidos:

    laravel new example-app

## ⚙️ Parte 2: Configurando um Projeto Laravel

### 1. **Acesse a pasta do seu projeto Laravel no PowerShell**

Se você já tem o projeto Laravel baixado (por exemplo, via Git), entre na pasta com:

```bash
cd caminho\da\sua\pasta
```

Exemplo:

```bash
cd C:\Users\seuUsuario\Documents\projeto-laravel
```

### 2. **Instalar as dependências PHP com o Composer**

No terminal:

```bash
composer install
```

* Isso criará a pasta `vendor/` com todas as bibliotecas do Laravel.

### 3. **Instalar as dependências do front-end (JavaScript)**

No mesmo terminal:

```bash
npm install
```

* Este comando instalará as bibliotecas JavaScript que o Laravel utiliza (ex: Vite, Tailwind, etc).

### 4. **Compilar os arquivos JS/CSS**

Após o `npm install`, rode:

```bash
npm run build
```

* Esse comando vai gerar os arquivos compilados e prontos para uso no navegador.

---

### 5. **Configurar o arquivo `.env`**

1. **Abra o Visual Studio Code** (VS Code).

   ```bash
   code .
   ```

2. No VS Code, localize o arquivo `.env.example`.

3. Clique com o botão direito sobre ele e escolha **Copiar**. Em seguida, clique com o botão direito na pasta e escolha **Colar**.

4. Renomeie o novo arquivo de `env.example` para `.env` (inclua o ponto no início!).

5. Este arquivo `.env` é onde ficam as configurações da aplicação, como nome do app, conexão com banco de dados, porta etc.

---

### 6. **Gerar a chave única do Laravel**

No terminal PowerShell:

```bash
php artisan key:generate
```

* Este comando cria uma chave de segurança única para o projeto funcionar corretamente.

---

### 7. **Executar as migrações do banco de dados**

Ainda no terminal:

```bash
php artisan migrate
```

* Ele vai perguntar se você deseja continuar. Digite `yes` e pressione Enter.

* Esse comando cria as tabelas padrão do Laravel no banco de dados configurado no seu `.env`.

---

## ✅ Pronto!

Seu projeto Laravel agora está:

* Com as dependências instaladas
* Arquivos JS compilados
* Ambiente `.env` configurado
* Tabelas do banco criadas

Se quiser iniciar o servidor Laravel:

```bash
php artisan serve
```

Acesse no navegador: [http://127.0.0.1:8000](http://127.0.0.1:8000)

---
