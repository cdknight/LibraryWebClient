<?php
require("../../SQLUtils/GetConnection.php");

    class ItemOut {
        private $id;
        private $userid;
        private $bookid;
        private $date_out;
        private $date_due;
        private $renewals_remaining;
        private $previous_renewal;
        private $conn;
        public function __construct($id){
            $this->id = $id;
            $this->conn = getDefaultConnection();

            $this->readData();
        }
        public function getId(){
            return $this->id;
        }


        public function getUserid()
        {
            return $this->userid;
        }

        public function getBookid()
        {
            return $this->bookid;
        }

        public function getDateOut()
        {
            return $this->date_out;
        }

        public function getDateDue()
        {
            return $this->date_due;
        }

        public function getRenewalsRemaining()
        {
            return $this->renewals_remaining;
        }

        public function getPreviousRenewal()
        {
            return $this->previous_renewal;
        }


        public function setDateOut($date_out)
        {
            $this->date_out = $date_out;

            $update = "UPDATE ItemsOut SET date_out='$this->date_out' where id=$this->id";
            $this->execQuery($update);

        }

        public function setDateDue($date_due)
        {
            $this->date_due = $date_due;

            $update = "UPDATE ItemsOut SET date_due='$this->date_due' where id=$this->id";
            $this->execQuery($update);
        }

        public function renew()
        {
            $this->readData();
            if ($this->renewals_remaining == 0){
                return "limitreached";

            }

            $prev_renewals = $this->renewals_remaining;
            $this->renewals_remaining = $prev_renewals - 1;

            $update = "UPDATE ItemsOut SET renewals_remaining=$this->renewals_remaining where id=$this->id";
            $updatePrevRenewal = "UPDATE ItemsOut SET previous_renewal=$prev_renewals where id=$this->id";
            $updateDueDate = "UPDATE ItemsOut SET date_due=DATE_ADD(date_due, INTERVAL 7 DAY) where id=$this->id";

            $this->execQuery($update);
            $this->execQuery($updatePrevRenewal);
            $this->execQuery($updateDueDate);

            return true;
        }


        public function endRenewals(){
            $prev_renewals = $this->renewals_remaining;
            $this->renewals_remaining = 0;

            $update = "UPDATE ItemsOut SET renewals_remaining=$this->renewals_remaining where id=$this->id";
            $updatePrevRenewal = "UPDATE ItemsOut SET previous_renewal=$prev_renewals where id=$this->id";
            $this->execQuery($update);
            $this->execQuery($updatePrevRenewal);
        }


        private function readData(){
            $query = "SELECT * FROM ItemsOut where id=$this->id";
            $result = $this->execQuery($query);

            while ($row = $result->fetch_assoc()){
                $this->userid = $row['userid'];
                $this->bookid = $row['bookid'];
                $this->date_out = $row['date_out'];
                $this->date_due = $row['date_due'];
                $this->renewals_remaining= $row['renewals_remaining'];
                $this->previous_renewal= $row['previous_renewal'];
            }

        }

        private function execQuery($query){
            return $this->conn->query($query);
        }
    }