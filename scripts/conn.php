<?php
class Database
{
    protected $pdo;
    private $dsn = "mysql:dbname=Kaice;host=localhost";
    private $username = "root";
    private $password = "";

    /**
     * Database constructor.
     *
     * @param string $dsn The DSN string.
     * @param string $username The username to connect to the database.
     * @param string $password The password to connect to the database.
     * @param array $options An array of PDO options.
     */
    public function __construct(array $options = [PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC])
    {
        $dsn = $this->dsn;
        $username = $this->username;
        $password = $this->password;
        $this->pdo = new PDO($dsn, $username, $password, $options);
    }

    /**
     * Executes a SQL query and returns the result set as an array of objects.
     *
     * @param string $query The SQL query to execute.
     * @param array $params An array of parameters to bind to the query.
     * @return array An array of objects representing the rows returned by the query.
     */
    public function query(string $query, array $params = []): array
    {
        $stmt = $this->pdo->prepare($query);
        $stmt->execute($params);
        return $stmt->fetchAll();
    }




    /**
     * Executes a SQL query and returns the first row as an object.
     *
     * @param string $query The SQL query to execute.
     * @param array $params An array of parameters to bind to the query.
     * @return object|null The first row returned by the query, or null if no rows were returned.
     */
    public function queryOne(string $query, array $params = []): ?object
    {
        $stmt = $this->pdo->prepare($query);
        $stmt->execute($params);
        return $stmt->fetch() ?: null;
    }

    /**
     * Executes a SQL query and returns the value of the first column of the first row.
     *
     * @param string $query The SQL query to execute.
     * @param array $params An array of parameters to bind to the query.
     * @return mixed The value of the first column of the first row returned by the query.
     */
    public function queryScalar(string $query, array $params = [])
    {
        $stmt = $this->pdo->prepare($query);
        $stmt->execute($params);
        return $stmt->fetchColumn();
    }


    public function insert(string $query, array $params = [])
    {
        $stmt = $this->pdo->prepare($query);
        $stmt->execute($params);
    }

    /**
     * Executes a SQL query and returns the number of rows affected.
     *
     * @param string $query The SQL query to execute.
     * @param array $params An array of parameters to bind to the query.
     * @return int The number of rows affected by the query.
     */
    public function execute(string $query, array $params = []): int
    {
        $stmt = $this->pdo->prepare($query);
        $stmt->execute($params);
        return $stmt->rowCount();
    }

    /**
     * Begins a transaction.
     */
    public function beginTransaction()
    {
        $this->pdo->beginTransaction();
    }

    /**
     * Commits a transaction.
     */
    public function commit()
    {
        $this->pdo->commit();
    }

    /**
     * Rolls back a transaction.
     */
    public function rollBack()
    {
        $this->pdo->rollBack();
    }
}


