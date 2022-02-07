module.exports = app => {
    const companies = require("../controllers/companies.controller.js");
    const connection = require("../models/db.js");
  
    // Create a new Customer
    //app.post("/companies", companies.create);
    app.post("/companies",(req,res)=>{
    const params = req.body
    connection.query('INSERT INTO companies SET ?' ,params,(err,rows) =>{

      if (!err) {
        res.send(`Companies with the name: ${params.name} has been added.`)
      } else{
        console.log(err);
      }
    })
    console.log(req.body);
  })
    // Retrieve all Customers
    app.get("/companies", companies.findAll);
  
    // Retrieve a single Customer with companiesId
    app.get("/companies/:companiesId/", companies.findOne);
  
    // Update a Customer with companiesId/
    app.put("/companies/:companiesId/", companies.update);
  
    // Delete a Customer with companiesId/
    app.delete("/companies/:companiesId/", companies.delete);
  
    // Create a new Customer
    app.delete("/companies", companies.deleteAll);
  };