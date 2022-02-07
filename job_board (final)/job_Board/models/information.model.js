const sql = require("./db.js");

// constructor
const Information = function(information) {
  this.advertisementId = information.advertisementId;
  this.messageUser = information.messageUser;
  this.nom = information.nom;
  this.mail = information.mail;
  this.tel = information.tel;
  
  
};

Information.create = (newInformation, result) => {
  sql.query("INSERT INTO information SET ?", newInformation, (err, res) => {
    if (err) {
      console.log("error: ", err);
      result(err, null);
      return;
    }

    console.log("created information: ", { informationId: res.insertId, ...newInformation });
    result(null, { informationId: res.insertId, ...newInformation });
  });
};

Information.findById = (informationId, result) => {
  sql.query(`SELECT * FROM information WHERE informationId = ${informationId}`, (err, res) => {
    if (err) {
      console.log("error: ", err);
      result(err, null);
      return;
    }

    if (res.length) {
      console.log("found information: ", res[0]);
      result(null, res[0]);
      return;
    }

    // not found Information with the informationId
    result({ kind: "not_found" }, null);
  });
};

Information.getAll = result => {
  sql.query("SELECT * FROM information", (err, res) => {
    if (err) {
      console.log("error: ", err);
      result(null, err);
      return;
    }

    console.log("information: ", res);
    result(null, res);
  });
};

Information.updateById = (informationId, information, result) => {
  sql.query(
    "UPDATE information SET advertisementId = ?, messageUser = ?, nom = ?, mail = ?, tel = ? WHERE informationId = ?",
    [information.advertisementId, information.messageUser,information.nom,information.mail,information.tel, informationId],
    (err, res) => {
      if (err) {
        console.log("error: ", err);
        result(null, err);
        return;
      }

      if (res.affectedRows == 0) {
        // not found Information with the informationId
        result({ kind: "not_found" }, null);
        return;
      }

      console.log("updated information: ", { informationId: informationId, ...information });
      result(null, { informationId: informationId, ...information });
    }
  );
};

Information.remove = (informationId, result) => {
  sql.query("DELETE FROM information WHERE informationId = ?", informationId, (err, res) => {
    if (err) {
      console.log("error: ", err);
      result(null, err);
      return;
    }

    if (res.affectedRows == 0) {
      // not found Information with the informationId
      result({ kind: "not_found" }, null);
      return;
    }

    console.log("deleted information with informationId: ", informationId);
    result(null, res);
  });
};

Information.removeAll = result => {
  sql.query("DELETE FROM information", (err, res) => {
    if (err) {
      console.log("error: ", err);
      result(null, err);
      return;
    }

    console.log(`deleted ${res.affectedRows} information`);
    result(null, res);
  });
};

module.exports = Information;