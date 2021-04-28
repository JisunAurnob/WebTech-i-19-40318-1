<?php
$mysqli = new mysqli("servername", "username", "password", "dbname");
if($mysqli->connect_error) {
  exit('Could not connect');
}

$sql = "SELECT JobTitle, cname, JobDetail, Salary, EmployeeRequirement, Vacancy, Location, Workplace, JobType, 
FROM jobs WHERE Job_id = ?";

$stmt = $mysqli->prepare($sql);
$stmt->bind_param("s", $_GET['q']);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($Jtitle, $cname, $jdetail, $sal, $ereq, $vac, $loc,$wp, $jt);
$stmt->fetch();
$stmt->close();

echo "<table>";
echo "<tr>";
echo "<th>Job Title</th>";
echo "<td>" . $Jtitle . "</td>";
echo "<th>Company Name</th>";
echo "<td>" . $cname . "</td>";
echo "<th>Job Detail</th>";
echo "<td>" . $jdetail . "</td>";
echo "<th>Salary </th>";
echo "<td>" . $sal . "</td>";
echo "<th>EmployeeRequirement</th>";
echo "<td>" . $ereq . "</td>";
echo "<th>Vacancy</th>";
echo "<td>" . $vac . "</td>";
echo "<th>Location</th>";
echo "<td>" . $loc . "</td>";
echo "<th>Workplace</th>";
echo "<td>" . $wp . "</td>";
echo "<th>JobType</th>";
echo "<td>" . $jt . "</td>";
echo "</tr>";
echo "</table>";
?>