# job_board
Job_board is a site allowing people to register for a job offer.
It incorporates the principles of sites like Indeed (current school use)

## Installation

Use the package manager nodejs with Node Package Manager.
After clone or install this projects and launch in the folder associate :

```bash
npm install
```

```bash
npm start
```

/!\If you are using Windows, you can try with xampp app/!\

-Start apache and mysql with xampp
-meanwhile npm install on vs code
-and finally start with npm start

## Usage

```javascript
{
  "name": "job_board",
  "version": "1.0.0",
  "description": "",
  "main": "server.js",
  "scripts": {
    "start": "nodemon ./routes/server.js"
  },
  "keywords": [],
  "author": "",
  "license": "ISC",
  "dependencies": {
    "express": "^4.17.1",
    "mysql": "^2.18.1",
    "nodemon": "^2.0.13"
  }
}
```
