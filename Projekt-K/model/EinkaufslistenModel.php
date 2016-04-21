



<?php

require_once 'lib/Model.php';

/**
 * Das UserModel ist zuständig für alle Zugriffe auf die Tabelle "user".
 *
 * Die Ausführliche Dokumentation zu Models findest du in der Model Klasse.
 */
class EinkaufslistenModel extends Model
{
    /**
     * Diese Variable wird von der Klasse Model verwendet, um generische
     * Funktionen zur Verfügung zu stellen.
     */
    protected $tableName = 'kunden_waren';

    /**
     * Erstellt eine neue Ware mit den gegebenen Werten.
     *
     *
     * @param $name Wert für die Spalte firstName
     * @param $preis Wert für die Spalte preis
     * @param $filialenid Wert für die Spalte filialenid
     * @param $menge Wert für die Spalte menge
     *
     * @throws Exception falls das Ausführen des Statements fehlschlägt
     */
    public function add($benutzerid, $warenid)
    {

        $query = "INSERT INTO $this->tableName (kundenid, warenid) VALUES (?, ?)";

        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param('ii', $benutzerid, $_GET['id']);

        if (!$statement->execute()) {
            throw new Exception($statement->error);
        }
    }
     public function show($id)
    {
        // Query erstellen
        $query = "SELECT * FROM $this->tableName WHERE kundenid = ? Order by datum desc";

        // Datenbankverbindung anfordern und, das Query "preparen" (vorbereiten)
        // und die Parameter "binden"
        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param('i', $id);

        // Das Statement absetzen
        $statement->execute();

      $result = $statement->get_result();
        if (!$result) {
            throw new Exception($statement->error);
        }

        // Datensätze aus dem Resultat holen und in das Array $rows speichern
        $rows = array();
        while ($row = $result->fetch_object()) {
            $rows[] = $row;
        }

        return $rows;
}
    public function remove($id, $datum)
    {
        $query = "DELETE FROM $this->tableName WHERE kundenid=? AND datum=?";

        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param('ii', $id, $datum);

        if (!$statement->execute()) {
            throw new Exception($statement->error);
        }
    }
}
