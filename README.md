# Biblioteca de Libros

**Integrantes, Grupo Nº 98:**
- GIL, MARIA AGUSTINA (43658954)
- LEGUIZA, FRANCO (44928045)

## Descripción

Este proyecto consiste en una base de datos para gestionar información sobre libros en una biblioteca. La base de datos, llamada "biblioteca", incluye dos tablas principales: **libro** y **genero**. Un género puede tener múltiples libros asociados (relación 1 a N).

## Objetivo

El propósito principal es crear una página web donde los usuarios puedan buscar y filtrar libros por género, similar al funcionamiento de una plataforma de streaming.

## Diagrama de la Base de Datos

![Diagrama ER](https://github.com/user-attachments/assets/29f24e98-591a-4014-b34c-d155008d3483)

## Despliegue del Sitio

### Requisitos
- **Apache**
- **MySQL**
- **Git**

### Instrucciones

1. **Clonar el Repositorio en `htdocs` con Git Bash:**
   ```bash
   git clone <URL_DEL_REPOSITORIO>
   ```

2. **Iniciar Apache y MySQL.**

3. **Exportar la Base de Datos:**
   - Asegúrate de crear y configurar la base de datos "biblioteca" en MySQL.

4. **Acceder al sitio en el navegador:**
   ```
   http://localhost/web2-trabajo-especial/
   ```

5. **Para pruebas de funcionalidades (Administrador):**
   - **Email:** `webadmin@unicen.tudai`
   - **Contraseña:** `admin`
