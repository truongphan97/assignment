<?php
class UserDB{
    public static function getUsers() {
        $db = Database::getDB();
        $query = 'SELECT * FROM users
                    ORDER BY Email';
        $statement = $db->prepare($query);
        $statement->execute();

        $users = array();
        foreach ($statement as $row) {
            $user = new User($row['Email'],
                $row['FirstName'],
                $row['LastName']
            );
            $users[] = $user;
        }
        return $users;
    }
    public static function deleteUser($user_email) {
        $db = Database::getDB();
        $query = 'DELETE FROM users
                      WHERE Email = :user_email';
        $statement = $db->prepare($query);
        $statement->bindValue(':user_email', $user_email);
        $statement->execute();
        $statement->closeCursor();
    }
    public static function editUser($email , $firstName , $lastName)
    {
        $db = Database::getDB();
        $query = 'UPDATE users SET 
                       Email = :email,
                       FirstName = :firstName,
                       LastName = :lastName
                       WHERE Email = :email';
        $statement = $db->prepare($query);
        $statement->bindparam(':email', $email);
        $statement->bindparam(':firstName', $firstName);
        $statement->bindparam(':lastName', $lastName);
        $statement->execute();
    }
    public static function addUser($email,$firstname,$lastname) {
        $db = Database::getDB();
        $query = 'INSERT INTO users
                         (Email, FirstName, LastName)
                      VALUES
                         (:email, :firstname, :lastname)';
        $statement = $db->prepare($query);
        $statement->bindValue(':email', $email);
        $statement->bindValue(':firstname', $firstname);
        $statement->bindValue(':lastname', $lastname);
        $statement->execute();
        $statement->closeCursor();
    }
    public static function searchUser($firstname) {
        $db = Database::getDB();
        $query = 'SELECT * FROM users WHERE FirstName LIKE :firstname OR Email LIKE :firstname OR LastName LIKE :firstname';
        $statement = $db->prepare($query);
        $statement->bindValue(':firstname', '%'.$firstname.'%');
        $statement->execute();
        $users = array();
        foreach ($statement as $row) {
            $user = new User($row['Email'],
                $row['FirstName'],
                $row['LastName']
            );
            $users[] = $user;
        }
        return $users;
    }
}
?>