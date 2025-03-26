<?php
$num = 153;
$total = 0;
$x = $num;

while($x != 0) {
    $rem = $x % 10;
    $total = $total + $rem * $rem * $rem;
    $x = $x / 10;
}
if($num == $total) {
    echo "Yes $num number is an Armstrong number.";
} else {
    echo "No $num is not an Armstrong number.";
}
?>
<br>
<?php
function factorial($n) {
    if($n <= 1) {
        return 1;
    } else {
        return $n * factorial($n - 1);
    }
}
echo "Factorial of 5 is " . factorial(5);
?>
<br>
<?php
function pattern($n) {
    for($i = 1; $i <= $n; $i++) {
        for($j = 1; $j <= $i; $j++) {
            echo "*";
        }
        echo "<br>";
    }
}
pattern(5);
?>
<br>
<?php
function fibonacci($n) {
    $a = 0;
    $b = 1;
    $c = 0;
    for($i = 0; $i < $n; $i++) {
        echo $a . " ";
        $c = $a + $b;
        $a = $b;
        $b = $c;
    }
}
fibonacci(10);
?>
<br>
<?php
function reverse($str) {
    $rev = "";
    $len = strlen($str);
    for($i = $len - 1; $i >= 0; $i--) {
        $rev = $rev . $str[$i];
    }
    return $rev;
}
echo "Reverse of 'Hello World!' is " . reverse("Hello World!");
?>
<br>
<?php
function palindrome($str) {
    $str = strtolower(preg_replace("/[^a-zA-Z0-9]/", "", $str));  
    $len = strlen($str);
    for ($i = 0; $i < $len / 2; $i++) {
        if ($str[$i] != $str[$len - $i - 1]) {
            return "No, $str is not a palindrome.";
        }
    }
    return "Yes, $str is a palindrome.";
}

echo palindrome("A man, a plan, a canal, Panama"); 
?>
<br>
<?php
function isPrime($n) {
    if($n <= 1) {
        return false;
    }
    for($i = 2; $i <= sqrt($n); $i++) {
        if($n % $i == 0) {
            return false;
        }
    }
    return true;
}
echo (isPrime(5));
?>
<br>
<?php
// Parent class definition      
class ParentClass { 
    // property declaration 
    public $name = "Parent"; 
    // method declaration 
    public function getName() { 
        return $this->name; 
    } 
}
// Child class definition           
class ChildClass extends ParentClass { 
    // property declaration 
    public $name = "Child"; 
    // method declaration 
    public function getName() { 
        return $this->name; 
    } 
}
// Create an object of the child class      

$object = new ChildClass();
echo $object->getName();
?>
<br>
<?php
// Encapsulation example
class Employee {
    private $name;
    private $salary;
    public function __construct($name, $salary) {
        $this->name = $name;
        $this->salary = $salary;
    }
    public function getName() {
        return $this->name;
    }
    public function getSalary() {
        return $this->salary;
    }
}
$emp = new Employee("John", 50000);
?>
<br>
<?php
// Inheritance example
class Person {
    public $name;
    public $age;
    public function __construct($name, $age) {
        $this->name = $name;
        $this->age = $age;
    }
    public function getDetails() {
        return "Name: $this->name, Age: $this->age";
    }
}
class Empower extends Person {
    public $salary;
    public function __construct($name, $age, $salary) {
        parent::__construct($name, $age);
        $this->salary = $salary;
    }
    public function getDetails() {
        return parent::getDetails() . ", Salary: $this->salary";
    }
}
?>
<br>
<?php
// Polymorphism example
class Animal {
    public function makeSound() {
        return "Some sound";
    }
}
class Dog extends Animal {
    public function makeSound() {
        return "Bark";
    }
}
// Create an object of the parent class 
$animal = new Animal();
// Create an object of the child class
$dog = new Dog();
echo $animal->makeSound();
echo $dog->makeSound();
?>
<br>
<?php
// Abstraction example
abstract class Shape {
    abstract public function getArea();
}
// Class definition
class Circle extends Shape {
    private $radius;
    public function __construct($radius) {
        $this->radius = $radius;
    }
    public function getArea() {
        return 3.14 * $this->radius * $this->radius;
    }
}
// Create an object of the child class
$circle = new Circle(3);
echo $circle->getArea();
?>
<br>
<?php
// Interface example
interface AnimalInterface {
    public function makeSound();
}
// Class definition
class Doh implements AnimalInterface {
    public function makeSound() {
        return "Bark";
    }
}
// Create an object of the class
$dog = new Dog();
echo $dog->makeSound();
?>
<br>
<?php
// Static method example
class Math {
    public static function add($a, $b) {
        return $a + $b;
    }
}
echo Math::add(5, 10);
?>
<br>
<?php
// Static property example
class Example {
    public static $name = "John";
    public static function getName() {
        return self::$name;
    }
}
echo Example::$name;
echo Example::getName();
?>
<br>
<?php
// Singleton example
class Singleton {
    private static $instance = null;
    private function __construct() {
    }
    public static function getInstance() {
        if (self::$instance == null) {
            self::$instance = new Singleton();
        }
        return self::$instance;
    }
}
$object = Singleton::getInstance();
?>
<br>
<?php
// Magic method example
class Magic {
    public function __construct() {
        echo "Object created";
    }
    public function __destruct() {
        echo "Object destroyed";
    }
}
$object = new Magic();
unset($object);
?>  
<br>
<?php
// Exception handling example
function divide($dividend, $divisor) {
    if ($divisor == 0) {
        throw new Exception("Division by zero");
    }
    return $dividend / $divisor;
}
try {
    echo divide(5, 0);
} catch (Exception $e) {
    echo "Caught exception: " . $e->getMessage();
}
?>
<br>
<?php
// File handling example
// Open a file for reading
$file = fopen("test.txt", "r");
// Read the file line by line
while (!feof($file)) {
    echo fgets($file) . "<br>";
}
// Close the file
fclose($file);
?>
<br>
<?php
// Cookies example
// Set a cookie
setcookie("name", "John", time() + 3600, "/");
// Retrieve cookie value
echo $_COOKIE["name"];
?>
<br>
<?php
// Session example
// Start the session
session_start();
// Set session variables
$_SESSION["name"] = "John";
// Retrieve session variables
echo $_SESSION["name"];
?>
<br>
<?php
// Database connection
$servername = "localhost";
$username =
"root";
$password = "root";
$dbname = "helpmedi_medico_newdb"; // Replace with your database name
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// Initialize cURL session
$ch = curl_init();
// Set the URL and method (GET)
curl_setopt($ch, CURLOPT_URL, "https://www.medicohelpline.com/app/mmedicoTariffDetails?token=38a28db
2b752a13a0341cc02c60a2299");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPGET, true); // Explicitly using GET method
// Execute the request
$response = curl_exec($ch);
// Check for cURL errors
if (curl_errno($ch)) {
    echo 'Error: ' . curl_error($ch);
    exit; // Stop execution if there's a cURL error
} else {
    // Decode the JSON response
    $decoded_response = json_decode($response, true);
    // Check if the response is valid JSON
    if ($decoded_response === null) {
        echo 'Failed to decode JSON response';
        exit; // Stop execution if JSON is invalid
    } else {
        // Process the decoded response
        echo "Decoded Response: <pre>" . print_r($decoded_response, true) . "</pre>";
        // Example assuming the decoded response contains an array of tariffs
        if (isset($decoded_response['tariffs']) && is_array($decoded_response['tariffs'])) {
            // Loop through the tariffs and insert each into the database
            foreach ($decoded_response['tariffs'] as $tariff) {
                // Ensure the necessary fields are set before inserting
                $tariff_ladgerid = isset($tariff['ladgerid']) ? $conn->real_escape_string($tariff['ladgerid']) : '';
                $tariff_status = isset($tariff['status']) ? $conn->real_escape_string($tariff['status']) : '';
                // Make sure both values are not empty
                if (!empty($tariff_ladgerid) && !empty($tariff_status)) {
                    // Prepare the INSERT query
                    $sql = "INSERT INTO medico_tariff_details (tariff_ladgerid, tariff_status) VALUES ('$tariff_ladgerid', '$tariff_status')";
                    if ($conn->query($sql) === TRUE) {
                        echo "New record created successfully for tariff: $tariff_ladgerid<br>";
                    } else {
                        echo "Error: " . $sql . "<br>" . $conn->error;
                    }
                }
            }
        }
    }
}
// Close the cURL session
curl_close($ch);
// Close the database connection
$conn->close();
?>