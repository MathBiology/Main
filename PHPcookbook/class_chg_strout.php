// Example of using __toString to format the output of a print statement.
<?php
class Person {
    protected $name;
    protected $email;
    
    public function setName($name) {
        $this->name = $name;
    }
    
    public function setEmail($email) {
        $this->email = $email;
    }
    
    public function __toString() {
        return "$this->name <$this->email>";
    }
}

// Example
$rasmus = new Person;
$rasmus->setName('Rasmus Lerdorf');
$rasmus->setEmail('rasmus@php.net');
print $rasmus;
?>
