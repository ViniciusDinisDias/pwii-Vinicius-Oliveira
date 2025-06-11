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

Depois que o aplicativo for criado, você pode iniciar o servidor de desenvolvimento local do Laravel, o queue worker e o servidor de desenvolvimento Vite usando o `dev`script do Composer:

    cd example-app
    npm install && npm run build
    composer run dev
Após iniciar o servidor de desenvolvimento, sua aplicação estará acessível no seu navegador em [http://localhost:8000](http://localhost:8000/) . Agora, você está pronto para [dar os próximos passos no ecossistema Laravel](https://laravel.com/docs/12.x/installation#next-steps) . Claro, você também pode querer [configurar um banco de dados](https://laravel.com/docs/12.x/installation#databases-and-migrations) .