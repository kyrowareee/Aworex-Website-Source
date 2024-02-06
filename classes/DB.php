<?php

include($_SERVER['DOCUMENT_ROOT'] . '/classes/Notification.php');

class DB {

        private static function connect() {
                $pdo = new PDO('mysql:host=localhost;dbname=u2408665_tarkovelite;charset=utf8mb4', 'u2408665_mohooks', 'chikiMOHO7412');
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                return $pdo;
        }

        public static function query($query, $params = array()) {
                $statement = self::connect()->prepare($query);
                $statement->execute($params);

                if (explode(' ', $query)[0] == 'SELECT') {
                $data = $statement->fetchAll();
                return $data;
                }
        }

}

class DBA {

        private static function connect() {
                $pdo = new PDO('mysql:host=localhost;dbname=u2408665_tarkovelite_accounts;charset=utf8mb4', 'u2408665_mohooks', 'chikiMOHO7412');
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                return $pdo;
        }

        public static function query($query, $params = array()) {
                $statement = self::connect()->prepare($query);
                $statement->execute($params);

                if (explode(' ', $query)[0] == 'SELECT') {
                $data = $statement->fetchAll();
                return $data;
                }
        }
}