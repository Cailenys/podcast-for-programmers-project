<?php
	class Mentor{

		private $con;
		private $id;

		public function __construct($con, $id) {
			$this->con = $con;
			$this->id = $id;
		}

		public function getId() {
			return $this->id;
		}

		public function getName() {
			$mentorQuery = mysqli_query($this->con, "SELECT name FROM mentors WHERE id='$this->id'");
			$mentor= mysqli_fetch_array($mentorQuery);
			//var_dump($mentor);
			return $mentor['name'];

		}
		
		public function getPodcastIds() {

			$query = mysqli_query($this->con, "SELECT id FROM podcasts WHERE mentor='$this->id' ORDER BY plays ASC");

			$array = array();

			while($row = mysqli_fetch_array($query)) {
				array_push($array, $row['id']);
			}

			return $array;

		}
	}
?>