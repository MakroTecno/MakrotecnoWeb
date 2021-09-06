<?php 
class Db extends mysqli
{
    private $DB_HOST = DB_HOST;
    private $DB_USER = DB_USER;
    private $DB_PASS = DB_PASS;
    private $DB_BD = DB_BD;
    public function __construct()
    {
        parent::__construct($this->DB_HOST, $this->DB_USER, $this->DB_PASS, $this->DB_BD);
        $this->set_charset('utf-8');
    }
}
?>