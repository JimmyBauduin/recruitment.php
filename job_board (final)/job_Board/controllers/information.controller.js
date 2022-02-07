const Information = require("../models/information.model.js");

// Create and Save a new Information
exports.create = (req, res) => {
           // Validate request
        if (!req.body) {
          res.status(400).send({
            message: "le contenue ne peut être vide!"
          });
        }
        // Create a Information
        const information = new Information({
          advertisementId: req.body.advertisementId,
          messageUser: req.body.messageUser,
          nom: req.body.nom,
          mail: req.body.mail,
          tel: req.body.tel,
          
        });
      
        // Save Information in the database
        Information.create(information, (err, data) => {
          if (err)
            res.status(500).send({
              message:
                err.message || "Some error occurred while creating the Customer."
            });
          else res.send(data);
        }); 
};

// Retrieve all Customers from the database.
exports.findAll = (req, res) => {
    Information.getAll((err, data) => {
        if (err)
          res.status(500).send({
            message:
              err.message || "Some error occurred while retrieving customers."
          });
        else res.send(data);
      });
};

// Find a single Information with a customerId
exports.findOne = (req, res) => {
    Information.findById(req.params.informationId, (err, data) => {
        if (err) {
          if (err.kind === "not_found") {
            res.status(404).send({
              message: `Not found Information with id ${req.params.informationId}.`
            });
          } else {
            res.status(500).send({
              message: "Error retrieving Information with id " + req.params.informationId
            });
          }
        } else res.send(data);
      });
};

// Update a Information identified by the customerId in the request
exports.update = (req, res) => {
     // Validate Request
  if (!req.body) {
    res.status(400).send({
      message: "Content can not be empty!"
    });
  }
  Information.updateById(
    req.params.informationId,
    new Information(req.body),
    (err, data) => {
      if (err) {
        if (err.kind === "not_found") {
          res.status(404).send({
            message: `Not found information with id ${req.params.informationId}.`
          });
        } else {
          res.status(500).send({
            message: "Error updating information with id " + req.params.informationId
          });
        }
      } else res.send(data);
    }
  );  
};

// Delete a Information with the specified customerId in the request
exports.delete = (req, res) => {
    Information.remove(req.params.informationId, (err, data) => {
        if (err) {
          if (err.kind === "not_found") {
            res.status(404).send({
              message: `Not found Information with id ${req.params.informationId}.`
            });
          } else {
            res.status(500).send({
              message: "Could not delete Information with id " + req.params.informationId
            });
          }
        } else res.send({ message: `Information was deleted successfully!` });
      });
};

// Delete all Customers from the database.
exports.deleteAll = (req, res) => {
    Information.removeAll((err, data) => {
        if (err)
          res.status(500).send({
            message:
              err.message || "Some error occurred while removing all customers."
          });
        else res.send({ message: `All Customers were deleted successfully!` });
      });
};
exports.create = (req, res) => {
  // Validate request
  if (!req.body) {
    res.status(400).send({
      message: "Content can not be empty!"
    });
  }
};
