<?php
include("db.php");
$team_one = $_POST["team1"];
$team_two = $_POST["team2"];

$team_one_goals = $_POST["team1_goals"];
$team_two_goals = $_POST["team2_goals"];
$sql_team_one = "";
$sql_team_two = "";
if ((int)$team_one_goals > (int)$team_two_goals) {
    $sql_team_one = "UPDATE teams SET wins=wins + 1, matches=matches + 1, goalsFor = goalsFor +" . (int)$team_one_goals . ", goalsAgainst = goalsAgainst +" . (int)$team_two_goals . ", points = (wins * 3) + draws, goalDifference = goalsFor - goalsAgainst WHERE id = " . $team_one . ";";
    $sql_team_two = "UPDATE teams SET losses=losses + 1, matches=matches + 1, goalsFor = goalsFor +" . (int)$team_two_goals . ", goalsAgainst = goalsAgainst +" . (int)$team_one_goals . ", points = (wins * 3) + draws, goalDifference = goalsFor - goalsAgainst WHERE id = " . $team_two . ";";
}
else if ((int)$team_one_goals < (int)$team_two_goals) {
    $sql_team_one = "UPDATE teams SET losses=losses + 1, matches=matches + 1, goalsFor = goalsFor +" . (int)$team_one_goals . ", goalsAgainst = goalsAgainst +" . (int)$team_two_goals . ", points = (wins * 3) + draws, goalDifference = goalsFor - goalsAgainst WHERE id = " . $team_one . ";";
    $sql_team_two = "UPDATE teams SET wins=wins + 1, matches=matches + 1, goalsFor = goalsFor +" . (int)$team_two_goals . ", goalsAgainst = goalsAgainst +" . (int)$team_one_goals . ", points = (wins * 3) + draws, goalDifference = goalsFor - goalsAgainst WHERE id = " . $team_two . ";";
} else {
    $sql_team_one = "UPDATE teams SET draws=draws+1, matches=matches + 1, goalsFor = goalsFor +" . (int)$team_one_goals . ", goalsAgainst = goalsAgainst +" . (int)$team_two_goals . ", points = (wins * 3) + draws, goalDifference = goalsFor - goalsAgainst WHERE id = " . $team_one . ";";
    $sql_team_two = "UPDATE teams SET draws=draws+1, matches=matches + 1, goalsFor = goalsFor +" . (int)$team_two_goals . ", goalsAgainst = goalsAgainst +" . (int)$team_one_goals . ", points = (wins * 3) + draws, goalDifference = goalsFor - goalsAgainst WHERE id = " . $team_two . ";";
}

echo $sql_team_one;
echo "<br>";
echo $sql_team_two;

$stmt = $conn->prepare($sql_team_one);
$stmt2 = $conn->prepare($sql_team_two);
$stmt->execute();
$stmt2->execute();

header("Location: rankings1.php");

exit;

?>