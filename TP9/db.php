<!-- Isi departemen data sesuai yang diminta form terlebih dahulu sebelum mengisi employee data agar tidak terjadi error-->
<!-- Ketika departemen data telah diisi, maka id tersebut digunakan pada saat mengisi form employee -->

<?php
ini_set('display_errors', 1);

class Database
{
    private static $host = "localhost";
    private static $username = "root";
    private static $password = "";
    private static $database = "ester";
    public static $connection = "";


    function __construct()
    {
    }

    public static function connectDatabase()
    {
        $host = self::$host;
        $user = self::$username;
        $pwd = self::$password;
        $dbname = self::$database;

        self::$connection = new mysqli($host, $user, $pwd, $dbname) or die('Error connecting..');
        return self::$connection;
    }

    public static function closeDatabase()
    {
        mysqli_close(self::$connection);
    }
}

class company
{
    public $data;
    public $value;
    public $connObj;
    public $db;


    public function __construct()
    {
        $this->connObj = Database::connectDatabase();
    }

    public function __construct2()
    {
        $this->db = Database::closeDatabase();
    }



    function getCompanyData()
    {
        $this->connObj;

        $query = "SELECT * FROM company_information";

        $result = mysqli_query($this->connObj, $query);

        $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
        mysqli_free_result($result);

        $this->db;

        return $data;
    }

    function saveCompanyData(
        $data,
        $value
    ) {
        $this->connObj;
        $query = "INSERT INTO company_information(data,
        value) VALUES('$data', '$value')";
        $result = mysqli_query($this->connObj, $query);
        if (!$result) {
            die('Could not get data: ' . mysqli_error());
        }
        $this->db;
    }
}

class department
{
    public $department_id;
    public $department_name;
    public $department_address;
    public $connObj;
    public $db;


    public function __construct()
    {
        $this->connObj = Database::connectDatabase();
    }

    public function __construct2()
    {
        $this->db = Database::closeDatabase();
    }



    function getDepartmentData()
    {
        $this->connObj;

        $query = "SELECT * FROM department";

        $result = mysqli_query($this->connObj, $query);

        $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
        mysqli_free_result($result);

        $this->db;

        return $data;
    }

    function saveDepartmentData(
        $department_id,
        $department_name,
        $department_address
    ) {
        $this->connObj;
        $query = "INSERT INTO department(department_id,
        department_name, department_address) VALUES('$department_id', '$department_name', '$department_address')";
        $result = mysqli_query($this->connObj, $query);
        if (!$result) {
            die('Could not get data: ' . mysqli_error());
        }
        $this->db;
    }
}


class employee
{
    public $employee_id;
    public $employee_name;
    public $employee_department;
    public $employee_email;
    public $connObj;
    public $db;


    public function __construct()
    {
        $this->connObj = Database::connectDatabase();
    }

    public function __construct2()
    {
        $this->db = Database::closeDatabase();
    }



    function getEmployeeData()
    {
        $this->connObj;

        $query = "SELECT * FROM employee";

        $result = mysqli_query($this->connObj, $query);

        $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
        mysqli_free_result($result);

        $this->db;

        return $data;
    }

    function saveEmployeeData(
        $employee_id,
        $employee_name,
        $employee_department,
        $employee_email
    ) {
        $this->connObj;
        $query = "INSERT INTO employee(employee_id,
        employee_name, employee_department, employee_email) VALUES('$employee_id', '$employee_name', '$employee_department', '$employee_email')";
        $result = mysqli_query($this->connObj, $query);
        if (!$result) {
            die('Could not get data: ' . mysqli_error());
        }
        $this->db;
    }
}
