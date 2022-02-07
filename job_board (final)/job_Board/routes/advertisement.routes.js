const connection = require("../models/db.js");
module.exports = app => {
    const advertisement = require("../controllers/advertisement.controller.js");
  
    // Create a new Customer
   // app.post("/advertisement", advertisement.create);
   app.post("/advertisement",(req,res)=>{
    const params = req.body
    connection.query('INSERT INTO advertisement SET ?' ,params,(err,rows) =>{

      if (!err) {
        res.send(`Advertisement with the name: ${params.name} has been added.`)
      } else{
        console.log(err);
      }
    })
    console.log(req.body);
  })
    // Retrieve all advertisement
    app.get("/advertisement", advertisement.findAll);
  
    // Retrieve a single Customer with advertisementId
    app.get("/advertisement/:advertisementId/", advertisement.findOne);
    app.get("/comp/advertisement/:companiesId/", advertisement.findOneByComp);
  
    // Update a Customer with advertisementId/
    app.put("/advertisement/:advertisementId/", advertisement.update);
  
    // Delete a Customer with advertisementId/
    app.delete("/advertisement/:advertisementId/", advertisement.delete);
  
    // Create a new Customer
    app.delete("/advertisement", advertisement.deleteAll);
  };