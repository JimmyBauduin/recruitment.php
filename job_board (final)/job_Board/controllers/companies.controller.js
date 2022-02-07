const Companies = require("../models/companies.model.js");

// Create and Save a new companies
exports.create = (req, res) => {
           // Validate request
        if (!req.body) {
          res.status(400).send({
            message: "le contenue ne peut être vide!"
          });
        }
        // Create a companies
        const companies = new Companies({
          full_description: req.body.full_description,
          wages: req.body.wages,
          place: req.body.place,
          working_time: req.body.working_time
        });
      
        // Save Companies in the database
        Companies.create(Companies, (err, data) => {
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
    Companies.getAll((err, data) => {
        if (err)
          res.status(500).send({
            message:
              err.message || "Some error occurred while retrieving companies."
          });
        else res.send(data);
      });
};

// Find a single Companies with a customerId
exports.findOne = (req, res) => {
    Companies.findById(req.params.companiesId, (err, data) => {
        if (err) {
          if (err.kind === "not_found") {
            res.status(404).send({
              message: `Not found Companies with id ${req.params.companiesId}.`
            });
          } else {
            res.status(500).send({
              message: "Error retrieving Companies with id " + req.params.companiesId
            });
          }
        } else res.send(data);
      });
};

// Update a Companies identified by the customerId in the request
exports.update = (req, res) => {
     // Validate Request
  if (!req.body) {
    res.status(400).send({
      message: "Content can not be empty!"
    });
  }
  Companies.updateById(
    req.params.companiesId,
    new Companies(req.body),
    (err, data) => {
      if (err) {
        if (err.kind === "not_found") {
          res.status(404).send({
            message: `Not found Companies with id ${req.params.companiesId}.`
          });
        } else {
          res.status(500).send({
            message: "Error updating Companies with id " + req.params.companiesId
          });
        }
      } else res.send(data);
    }
  );  
};

// Delete a Companies with the specified customerId in the request
exports.delete = (req, res) => {
  Companies.remove(req.params.companiesId, (err, data) => {
        if (err) {
          if (err.kind === "not_found") {
            res.status(404).send({
              message: `Not found Companies with id ${req.params.companiesId}.`
            });
          } else {
            res.status(500).send({
              message: "Could not delete Companies with id " + req.params.companiesId
            });
          }
        } else res.send({ message: `Companies was deleted successfully!` });
      });
};

// Delete all Companies from the database.
exports.deleteAll = (req, res) => {
  Companies.removeAll((err, data) => {
        if (err)
          res.status(500).send({
            message:
              err.message || "Some error occurred while removing all Companies."
          });
        else res.send({ message: `All Companies were deleted successfully!` });
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
