<?php

require_once 'lib/Model.php';

/**
 * Das UserModel ist zuständig für alle Zugriffe auf die Tabelle "kunden".
 *
 * Die Ausführliche Dokumentation zu Models findest du in der Model Klasse.
 */
class KundenModel extends Model
{
    /**
     * Diese Variable wird von der Klasse Model verwendet, um generische
     * Funktionen zur Verfügung zu stellen.
     */
    protected $tableName = 'kunden';

    /**
     * Erstellt einen neuen benutzer mit den gegebenen Werten.
     *
     * Das Passwort wird vor dem ausführen des Queries noch mit dem SHA1
     *  Algorythmus gehashed.
     *
     * @param $benutzername Wert für die Spalte benutzername
     * @param $passwort Wert für die Spalte passwort
     *
     * @throws Exception falls das Ausführen des Statements fehlschlägt
     */
    public function create($benutzername, $passwort)
    {
        $passwort = sha1($passwort);

        $query = "INSERT INTO $this->tableName (benutzername, passwort) VALUES (?, ?)";

        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param('ss', $firstName, $password);

        if (!$statement->execute()) {
            throw new Exception($statement->error);
        }
    }
}
