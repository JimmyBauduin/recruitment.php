const sql = require("./db.js");

// constructor
const Companies = function(companies) {
  this.adresse = companies.adresse;
  this.description = companies.description;
  this.lieu = companies.lieu;
  this.nom = companies.nom;
  this.tel = companies.tel;
};

Companies.create = (newCompanies, result) => {
  sql.query("INSERT INTO companies SET ?", newCompanies, (err, res) => {
    if (err) {
      console.log("error: ", err);
      result(err, null);
      return;
    }

    console.log("created companies: ", { companiesId: res.insertId, ...newCompanies });
    result(null, { companiesId: res.insertId, ...newCompanies });
  });
};

Companies.findById = (companiesId, result) => {
  sql.query(`SELECT * FROM companies WHERE companiesId = ${companiesId}`, (err, res) => {
    if (err) {
      console.log("error: ", err);
      result(err, null);
      return;
    }

    if (res.length) {
      console.log("found companies: ", res[0]);
      result(null, res[0]);
      return;
    }

    // not found Companies with the companiesId
    result({ kind: "not_found" }, null);
  });
};

Companies.getAll = result => {
  sql.query("SELECT * FROM companies", (err, res) => {
    if (err) {
      console.log("error: ", err);
      result(null, err);
      return;
    }

    console.log("companies: ", res);
    result(null, res);
  });
};

Companies.updateById = (companiesId, companies, result) => {
  sql.query(
    "UPDATE companies SET adresse = ?, description = ?, lieu = ?,nom = ?, tel = ? WHERE companiesId = ?",
    [companies.adresse, companies.description, companies.lieu, companies.nom,companies.tel, companiesId],
    (err, res) => {
      if (err) {
        console.log("error: ", err);
        result(null, err);
        return;
      }

      if (res.affectedRows == 0) {
        // not found Companies with the companiesId
        result({ kind: "not_found" }, null);
        return;
      }

      console.log("updated companies: ", { companiesId: companiesId, ...companies });
      result(null, { companiesId: companiesId, ...companies });
    }
  );
};

Companies.remove = (companiesId, result) => {
  sql.query("DELETE FROM companies WHERE companiesId = ?", companiesId, (err, res) => {
    if (err) {
      console.log("error: ", err);
      result(null, err);
      return;
    }

    if (res.affectedRows == 0) {
      // not found Companies with the companiesId
      result({ kind: "not_found" }, null);
      return;
    }

    console.log("deleted companies with companiesId: ", companiesId);
    result(null, res);
  });
};

Companies.removeAll = result => {
  sql.query("DELETE FROM companies", (err, res) => {
    if (err) {
      console.log("error: ", err);
      result(null, err);
      return;
    }

    console.log(`deleted ${res.affectedRows} companies`);
    result(null, res);
  });
};

module.exports = Companies;