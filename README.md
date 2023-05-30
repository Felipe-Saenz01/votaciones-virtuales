<h1 align="center" >Sistema Votaciones virtuales - Unitropico</h1></br>
<p align="center"><a href="https://unitropico.edu.co" target="_blank"><img src="https://i.postimg.cc/GtJMcSLD/LOGO-1024x601.png" width=50% alt="Unitropico Logo"></a><a href="https://laravel.com" target="_blank"><img width=50% src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg"  alt="Laravel Logo"></a></p></br>
<p>Este aplicativo está diseñado para realizar las actividades correspondientes a elecciones de  los diferentes cuerpos colegiados de la <strong>Universidad Internacional del Trópico Americano</strong> , incluyendo funcionalidades correspondientes al registro y generación de eventos de votación, registro de votos de sufragantes y generación de estadísticas e informes.</p>

## Requisitos

El aplicativo está desarrollado usando el framework de php Laravel en su versión 10, cuyos requisitos mínimos son:
- PHP >= 8.1
- Composer
- MySQL
- Node

## Instalación

1. Clonar repositorio:
```Git
git clone git@github.com:Felipe-Saenz01/votaciones-virtuales.git
cd votaciones-virtuales
```

2. Instalar dependencias de composer:
```
composer install
```

3. crear archivo .env y .env.example para la configuración del proyecto:
```
cp .env.example .env
```

4. Generar clave para la aplicacion:
```
php artisan key:generate
```

5. Migrar bases de datos. (es necesario incluir datos correspondientes de la base de datos en el archivo .env):
```
php artisan migrate
```

6. Inciar servidor local:
```
php artisan serve
```