<?php
	class Mentor {

		private $con;
		private $id;

		public function __construct($con, $id) {
			$this->con = $con;
			$this->id = $id;
		}

		public function getName() {
			$mentorQuery = mysqli_query($this->con, "SELECT name FROM mentors WHERE id='$this->id'");
			$mentor = mysqli_fetch_array($mentorQuery);
			return $mentor['name'];
		}
	}
?>