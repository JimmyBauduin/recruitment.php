const sql = require("./db.js");

// constructor
const Advertisement = function(advertisement) {
  this.contrat = advertisement.contrat;
  this.description = advertisement.description;
  this.nom = advertisement.nom;
  this.salaire = advertisement.salaire;
  this.tempsDeTravail = advertisement.tempsDeTravail;
  this.companiesId = advertisement.companiesId;
};

Advertisement.create = (newAdvertisement, result) => {
  sql.query("INSERT INTO advertisement SET ?", newAdvertisement, (err, res) => {
    if (err) {
      console.log("error: ", err);
      result(err, null);
      return;
    }

    console.log("created advertisement: ", { advertisementId: res.insertId, ...newAdvertisement });
    result(null, { advertisementId: res.insertId, ...newAdvertisement });
  });
};

Advertisement.findById = (advertisementId, result) => {
  sql.query(`SELECT * FROM advertisement WHERE advertisementId = ${advertisementId}`, (err, res) => {
    if (err) {
      console.log("error: ", err);
      result(err, null);
      return;
    }

    if (res.length) {
      console.log("found advertisement: ", res[0]);
      result(null, res[0]);
      return;
    }

    // not found advertisement with the advertisementId
    result({ kind: "not_found" }, null);
  });
};

Advertisement.findByIdComp = (companiesId, result) => {
  sql.query(`SELECT * FROM advertisement WHERE companiesId = ${companiesId}`, (err, res) => {
    if (err) {
      console.log("error: ", err);
      result(err, null);
      return;
    }

    if (res.length) {
      console.log("found advertisement: ", res[0]);
      result(null, res[0]);
      return;
    }

    // not found advertisement with the advertisementId
    result({ kind: "not_found" }, null);
  });
};

Advertisement.getAll = result => {
  sql.query("SELECT * FROM advertisement", (err, res) => {
    if (err) {
      console.log("error: ", err);
      result(null, err);
      return;
    }

    console.log("advertisement: ", res);
    result(null, res);
  });
};

Advertisement.updateById = (advertisementId, advertisement, result) => {
  sql.query(
    "UPDATE advertisement SET contrat = ?, description = ?,nom = ?,salaire = ?, tempsDeTravail = ? WHERE advertisementId = ?",
    [advertisement.contrat, advertisement.description, advertisement.nom,advertisement.salaire,advertisement.tempsDeTravail, advertisementId],
    (err, res) => {
      if (err) {
        console.log("error: ", err);
        result(null, err);
        return;
      }

      if (res.affectedRows == 0) {
        // not found Advertisement with the advertisementId
        result({ kind: "not_found" }, null);
        return;
      }

      console.log("updated advertisement: ", { advertisementId: advertisementId, ...advertisement });
      result(null, { advertisementId: advertisementId, ...advertisement });
    }
  );
};

Advertisement.remove = (advertisementId, result) => {
  sql.query("DELETE FROM advertisement WHERE advertisementId = ?", advertisementId, (err, res) => {
    if (err) {
      console.log("error: ", err);
      result(null, err);
      return;
    }

    if (res.affectedRows == 0) {
      // not found Advertisement with the advertisementId
      result({ kind: "not_found" }, null);
      return;
    }

    console.log("deleted advertisement with advertisementId: ", advertisementId);
    result(null, res);
  });
};

Advertisement.removeAll = result => {
  sql.query("DELETE FROM advertisement", (err, res) => {
    if (err) {
      console.log("error: ", err);
      result(null, err);
      return;
    }

    console.log(`deleted ${res.affectedRows} advertisement`);
    result(null, res);
  });
};

module.exports = Advertisement;