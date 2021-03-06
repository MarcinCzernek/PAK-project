<?php
include_once 'data_base.php';

class Comment
{
    private $db;
    private $name;
    private $comment;
    private $table = "comments";

    public function __construct()
    {
        $this->db = new data_base();
    }

    public function setData($name, $comment)
    {
         $this->name = $name;
        $this->comment = $comment;

    }

    public function create()
    {

        $query = "INSERT INTO $this->table(name ,comment, comment_time) VALUES('$this->name','$this->comment', now())";
        $insert_comment = $this->db->insert($query);
        return $insert_comment;
    }

    public function index()
    {
        $query = "SELECT * FROM $this->table ORDER BY id DESC";
        $result = $this->db->select($query);
        return $result;
    }

    public function dateFormat($data)
    {
        date_default_timezone_set('Europe/Warsaw'); //Europe/Warsaw
        $date = date('M j, h:i:s a', time());
        return $date;
    }

    public function check($data){
     if (str_contains($data, '*')) {
      echo '<p style="color: red">Ostrzeżenie! Zakaz stosowania niewłaściwego słownictwa!</p>';
      }
    }
}
?>