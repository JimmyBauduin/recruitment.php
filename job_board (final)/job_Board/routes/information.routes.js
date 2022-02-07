const connection = require("../models/db.js");
module.exports = app => {
    const information = require("../controllers/information.controller.js");
  
    // Create a new Customer
    //app.post("/information", information.create);
    app.post("/information",(req,res)=>{
      const params = req.body
      connection.query('INSERT INTO information SET ?' ,params,(err,rows) =>{
  
        if (!err) {
          res.send(`information with the name: ${params.name} has been added.`)
        } else{
          console.log(err);
        }
      })
      console.log(req.body);
    })
    // Retrieve all Customers
    app.get("/information", information.findAll);
  
    // Retrieve a single Customer with informationId
    app.get("/information/:informationId/", information.findOne);
    
  
    // Update a Customer with informationId/
    app.put("/information/:informationId/", information.update);
  
    // Delete a Customer with informationId/
    app.delete("/information/:informationId/", information.delete);
  
    // Create a new Customer
    app.delete("/information", information.deleteAll);
  };