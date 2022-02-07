const Stock_people = require("../models/stock_people.model.js");

//Create and Save a new Stock_people
exports.create = (req, res) => {
           // Validate request
        if (!req.body) {
          res.status(400).send({
            message: "le contenue ne peut être vide!"
          });
        }
        // Create a Stock_people
        const stock_people = new Stock_people({
          nom: req.body.nom,
          prenom: req.body.prenom,
          tel: req.body.tel,
          mail: req.body.mail,
          mdp: req.body.mdp,
          role: req.body.role
        });
      
        // Save Stock_people in the database
        Stock_people.create(stock_people, (err, data) => {
          if (err)
            res.status(500).send({
              message:
                err.message || "Some error occurred while creating the Customer."
            });
          else res.send(data);
        }); 
};
// Retrieve all Stock_people from the database.
exports.findAll = (req, res) => {
    Stock_people.getAll((err, data) => {
        if (err)
          res.status(500).send({
            message:
              err.message || "Some error occurred while retrieving customers."
          });
        else res.send(data);
      });
};
exports.findAllMail = (req, res) => {
    Stock_people.getAllMail((err, data) => {
        if (err)
          res.status(500).send({
            message:
              err.message || "Some error occurred while retrieving customers."
          });
        else res.send(data);
      });
};
exports.findAllMdp = (req, res) => {
    Stock_people.getAllMdp((err, data) => {
        if (err)
          res.status(500).send({
            message:
              err.message || "Some error occurred while retrieving customers."
          });
        else res.send(data);
      });
};
exports.findAllTel = (req, res) => {
  Stock_people.getAllTel((err, data) => {
      if (err)
        res.status(500).send({
          message:
            err.message || "Some error occurred while retrieving tel."
        });
      else res.send(data);
    });
};
// Find a single Stock_people with a customerId
exports.findOne = (req, res) => {
    Stock_people.findById(req.params.peopleId, (err, data) => {
        if (err) {
          if (err.kind === "not_found") {
            res.status(404).send({
              message: `Not found stock_people with id ${req.params.peopleId}.`
            });
          } else {
            res.status(500).send({
              message: "Error retrieving Stock-people with id " + req.params.peopleId
            });
          }
        } else res.send(data);
      });
};

exports.findOneMail = (req, res) => {
  Stock_people.findBymail(req.params.mail, (err, data) => {
      if (err) {
        if (err.kind === "not_found") {
          res.status(404).send({
            message: `Not found stock_people with mail ${req.params.mail}.`
          });
        } else {
          res.status(500).send({
            message: "Error retrieving Stock-people with mail " + req.params.mail
          });
        }
      } else res.send(data);
    });
};

exports.findOneMdp = (req, res) => {
  Stock_people.findByMdp(req.params.mdp, (err, data) => {
      if (err) {
        if (err.kind === "not_found") {
          res.status(404).send({
            message: `Not found stock_people with mdp ${req.params.mdp}.`
          });
        } else {
          res.status(500).send({
            message: "Error retrieving Stock-people with mdp " + req.params.mdp
          });
        }
      } else res.send(data);
    });
};
exports.findOneTel = (req, res) => {
  Stock_people.findByTel(req.params.tel, (err, data) => {
      if (err) {
        if (err.kind === "not_found") {
          res.status(404).send({
            message: `Not found stock_people with tel ${req.params.tel}.`
          });
        } else {
          res.status(500).send({
            message: "Error retrieving Stock-people with tel " + req.params.tel
          });
        }
      } else res.send(data);
    });
};

// Update a stock_people identified by the customerId in the request
exports.update = (req, res) => {
     // Validate Request
  if (!req.body) {
    res.status(400).send({
      message: "Content can not be empty!"
    });
  }
  Stock_people.updateById(
    req.params.peopleId,
    new Stock_people(req.body),
    (err, data) => {
      if (err) {
        if (err.kind === "not_found") {
          res.status(404).send({
            message: `Not found stock_people with id ${req.params.peopleId}.`
          });
        } else {
          res.status(500).send({
            message: "Error updating stock_people with id " + req.params.peopleId
          });
        }
      } else res.send(data);
    }
  );  
};

// Delete a Information with the specified customerId in the request
exports.delete = (req, res) => {
    Stock_people.remove(req.params.peopleId, (err, data) => {
        if (err) {
          if (err.kind === "not_found") {
            res.status(404).send({
              message: `Not found stock_people with id ${req.params.peopleId}.`
            });
          } else {
            res.status(500).send({
              message: "Could not delete stock_people with id " + req.params.peopleId
            });
          }
        } else res.send({ message: `stock_people was deleted successfully!` });
      });
};

// Delete all Customers from the database.
exports.deleteAll = (req, res) => {
    Stock_people.removeAll((err, data) => {
        if (err)
          res.status(500).send({
            message:
              err.message || "Some error occurred while removing all stock_people."
          });
        else res.send({ message: `All stock_people were deleted successfully!` });
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
