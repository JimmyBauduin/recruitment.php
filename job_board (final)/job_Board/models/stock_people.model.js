const sql = require("./db.js");

// constructor
const Stock_people = function(stock_people) {
  this.nom = stock_people.nom;
  this.prenom = stock_people.prenom;
  this.tel = stock_people.tel;
  this.mail = stock_people.mail;
  this.mdp = stock_people.mdp;
  this.role = stock_people.role;
};

Stock_people.create = (newStock_people, result) => {
    // $stmt = $bdd->prepare('INSERT INTO stock_people (nom,prenom,tel,mail,mdp,role) VALUES (:nom, :prenom, :tel, :mail, :mdp, :role)');
    // $stmt->bindValue(':nom', $nom, PDO::PARAM_STR);
    // $stmt->bindValue(':prenom', $prenom, PDO::PARAM_STR);
    // $stmt->bindValue(':tel', $tel);
    // $stmt->bindValue(':mail', $mail, PDO::PARAM_STR);
    // $stmt->bindValue(':mdp', $password, PDO::PARAM_STR);
    // $stmt->bindValue(':role', $role, PDO::PARAM_STR);
    // $stmt->execute();
    // echo 'Vous êtes inscrit !<br>'.$nom.'<br>'.$prenom;
  
  sql.query(
    "INSERT INTO stock_people SET ?", newStock_people, (err, res) => {
    if (err) {
      console.log("error: ", err);
      result(err, null);
      return;
    }

    console.log("created stock_people: ", { stock_peopleId: res.insertId, ...newStock_people });
    result(null, { stock_peopleId: res.insertId, ...newStock_people });
  });
};

Stock_people.findById = (stock_peopleId, result) => {
  sql.query(`SELECT * FROM stock_people WHERE stock_peopleId = ${stock_peopleId}`, (err, res) => {
    if (err) {
      console.log("error: ", err);
      result(err, null);
      return;
    }
    if (res.length) {
      console.log("found stock_people: ", res[0]);
      result(null, res[0]);
      return;
    }

    // not found Stock_people with the stock_peopleId
    result({ kind: "not_found" }, null);
  });
};

Stock_people.findBymail = (mail, result) => {
  sql.query(`SELECT * FROM stock_people WHERE mail = ${mail}`, (err, res) => {
    if (err) {
      console.log("error: ", err);
      result(err, null);
      return;
    }
    if (res.length) {
      console.log("found stock_people: ", res[0]);
      result(null, res[0]);
      return;
    }

    // not found Stock_people with the stock_peopleId
    result({ kind: "not_found" }, null);
  });
};

Stock_people.findByMdp = (mdp, result) => {
  sql.query(`SELECT * FROM stock_people WHERE mdp = ${mdp}`, (err, res) => {
    if (err) {
      console.log("error: ", err);
      result(err, null);
      return;
    }
    if (res.length) {
      console.log("found stock_people: ", res[0]);
      result(null, res[0]);
      return;
    }

    // not found Stock_people with the stock_peopleId
    result({ kind: "not_found" }, null);
  });
};

Stock_people.findByTel = (tel, result) => {
  sql.query(`SELECT * FROM stock_people WHERE tel = ${tel}`, (err, res) => {
    if (err) {
      console.log("error: ", err);
      result(err, null);
      return;
    }
    if (res.length) {
      console.log("found stock_people: ", res[0]);
      result(null, res[0]);
      return;
    }

    // not found Stock_people with the stock_peopleId
    result({ kind: "not_found" }, null);
  });
};



Stock_people.getAll = result => {
  sql.query("SELECT * FROM stock_people", (err, res) => {
    if (err) {
      console.log("error: ", err);
      result(null, err);
      return;
    }

    console.log("stock_people: ", res);
    result(null, res);
  });
};
Stock_people.getAllMail = result => {
  sql.query("SELECT mail FROM stock_people", (err, res) => {
    if (err) {
      console.log("error: ", err);
      result(null, err);
      return;
    }

    console.log("stock_people: ", res);
    result(null, res);
  });
};

Stock_people.getAllMdp = result => {
  sql.query("SELECT mdp FROM stock_people", (err, res) => {
    if (err) {
      console.log("error: ", err);
      result(null, err);
      return;
    }

    console.log("stock_people: ", res);
    result(null, res);
  });
};
Stock_people.getAllTel = result => {
  sql.query("SELECT tel FROM stock_people", (err, res) => {
    if (err) {
      console.log("error: ", err);
      result(null, err);
      return;
    }

    console.log("stock_people: ", res);
    result(null, res);
  });
};


Stock_people.updateById = (stock_peopleId, stock_people, result) => {
  sql.query(
    "UPDATE stock_people SET nom = ?, prenom = ?, tel = ?,mail = ?,mdp = ?,role = ? WHERE stock_peopleId = ?",
    [stock_people.nom, stock_people.prenom, stock_people.tel, stock_people.mail,stock_people.mdp,stock_people.role, stock_peopleId],
    (err, res) => {
      if (err) {
        console.log("error: ", err);
        result(null, err);
        return;
      }

      if (res.affectedRows == 0) {
        // not found Stock_people with the stock_peopleId
        result({ kind: "not_found" }, null);
        return;
      }

      console.log("updated stock_people: ", { stock_peopleId: stock_peopleId, ...stock_people });
      result(null, { stock_peopleId: stock_peopleId, ...stock_people });
    }
  );
};

Stock_people.remove = (stock_peopleId, result) => {
  sql.query("DELETE FROM stock_people WHERE stock_peopleId = ?", stock_peopleId, (err, res) => {
    if (err) {
      console.log("error: ", err);
      result(null, err);
      return;
    }

    if (res.affectedRows == 0) {
      // not found Stock_people with the stock_peopleId
      result({ kind: "not_found" }, null);
      return;
    }

    console.log("deleted stock_people with stock_peopleId: ", stock_peopleId);
    result(null, res);
  });
};

Stock_people.removeAll = result => {
  sql.query("DELETE FROM stock_people", (err, res) => {
    if (err) {
      console.log("error: ", err);
      result(null, err);
      return;
    }

    console.log(`deleted ${res.affectedRows} stock_people`);
    result(null, res);
  });
};

module.exports = Stock_people;