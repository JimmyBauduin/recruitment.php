const connection = require("../models/db.js");

module.exports = app => {
    const stock_people = require("../controllers/stock_people.controller.js");
    const sql = require("../config/db.config");

  
    // Create a new Customer
    // app.post("/stock_people/id", stock_people.create);
      app.post("/stock_people/id",(req,res)=>{
        const params = req.body
        connection.query('INSERT INTO stock_people SET ?' ,params,(err,rows) =>{

          if (!err) {
            res.send(`People with the name: ${params.name} has been added.`)
          } else{
            console.log(err);
          }
        })
        console.log(req.body);
      })
  
    // Retrieve all stock_people
    app.get("/stock_people/id", stock_people.findAll);
    app.get("/stock_people/mail", stock_people.findAllMail);
    app.get("/stock_people/mdp", stock_people.findAllMdp);
    app.get("/stock_people/tel", stock_people.findAllTel);
    
  
    // Retrieve a single Customer with peopleId
    app.get("/stock_people/id/:peopleId/", stock_people.findOne);
    app.get("/stock_people/mail/:mail/", stock_people.findOneMail);
    app.get("/stock_people/mdp/:mdp/", stock_people.findOneMdp);
    app.get("/stock_people/tel/:tel/", stock_people.findOneTel);
    
  
    // Update a Customer with peopleId/
    app.put("/stock_people/id/:peopleId/", stock_people.update);
  
    // Delete a Customer with peopleId/
    app.delete("/stock_people/id/:peopleId/", stock_people.delete);
  
    // Create a new Customer
    app.delete("/stock_people/id", stock_people.deleteAll);
  };