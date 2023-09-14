<?php
   include("db.php");
   
   
   ?>
<?php
   $sql = "SELECT id, name, matches, wins, draws, losses, goalsFor, goalsAgainst, goalDifference, points FROM Teams";
   $stmt = $conn->prepare($sql);
   $stmt->execute();
   $teams = $stmt->fetchAll(PDO::FETCH_ASSOC);
   
   ?>



<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>جدول الدوري</title>
      <style>
         body {
         font-family: Arial, sans-serif;
         background-color: #f0f0f0;
         margin: 0;
         padding: 0;
         }
         h1 {
         text-align: center;
         padding: 20px;
         background-color: #333;
         color: #fff;
         }
         .container {
         max-width: 800px;
         margin: 0 auto;
         padding: 20px;
         }
         label, input, select, button {
         display: block;
         margin-bottom: 10px;
         }
         label {
         font-weight: bold;
         }
         select, input[type="number"] {
         width: 100%;
         padding: 10px;
         }
         .button {
         background-color: #333;
         color: #fff;
         border: none;
         padding: 10px 20px;
         cursor: pointer;
         }
         table {
         width: 100%;
         border-collapse: collapse;
         background-color: #fff;
         }
         th, td {
         padding: 10px;
         text-align: center;
         border-bottom: 1px solid #ddd;
         }
         th {
         background-color: #333;
         color: #fff;
         }
         .div1{
         text-align: center;
         display: flex;
         position: relative;
         left: 240px;
         }
         p{
         font-weight: bold;
         font-size: 30px
         }
         .div11{
         padding-left: 250px
         }
         .div12{
         position: relative;
         left: 40px;
         }
         /* إضافة هذا الكود إلى الجزء السفلي من ملف الستايل styles.css */
         /* تلوين المراتب من 1 إلى 8 باللون الأخضر */
         tr:nth-child(-n+9) {
         background-color: greenyellow;
         }
         /* تلوين المراتب من 9 إلى 12 باللون البرتقالي */
         tr:nth-child(n+10):nth-child(-n+13) {
         background-color: orange;
         }
         /* تلوين المراتب من 13 إلى 16 باللون الأحمر */
         tr:nth-child(n+14):nth-child(-n+17) {
         background-color: red;
         }
      </style>
   </head>
   
   <body>
      <a href="http://localhost/efootball/listes_coupes.php" class="listes_coupes">
         <h1>Listes Coupes</h1>
      </a>
      <div class="container">
         <form method="post" action="submitMatch.php" onsubmit="return submitMatch();">
            <label for="team1" style="font-size: 20px;">اختر الفريق الأول :</label>
            <select name="team1" id="team1" style="margin-bottom: 20px;">
            <?php
               foreach($teams as $team) {
                   echo "<option value='" . $team['id'] . "'>" . $team['name'] . "</option>";
               }
               ?>
            </select>
            <br>
            <label for="team2" style="font-size: 20px;">اختر الفريق الثاني :</label>
            <select name="team2" id="team2" style="margin-bottom: 20px;">
            <?php
               foreach($teams as $team) {
                   echo "<option value='" . $team['id'] . "'>" . $team['name'] . "</option>";
               }
               ?>
            </select>
            <br>
            <label for="team1-goals" style="font-size: 20px;">أهداف الفريق الأول :</label>
            <input name="team1_goals" type="number" id="team1-goals" value="0" style="margin-bottom: 20px;" min="0">
            <br>
            <label for="team2-goals" style="font-size: 20px;">أهداف الفريق الثاني :</label>
            <input name="team2_goals" type="number" id="team2-goals" value="0" style="margin-bottom: 20px;" min="0">
            <input type="submit" class="button"  id="add-match" style="font-weight: bold;" value="إضافة نتيجة المباراة">
         </form>
      </div>
      <!-- الشيفرة السابقة كما هي -->
      <div class="div1">
         <a href="http://localhost/efootball/test/rankings1.php" class="div11">
            <p>Rankings DIV1</p>
         </a>
         <a href="http://localhost/efootball/test/rankings2.php">
            <p class="div12">Rankings DIV2</p>
         </a>
      </div>
      <div class="container">
         <table id="league-table" style="font-weight: bold;">
            <thead>
               <tr>
                  <th>الترتيب</th>
                  <th>الفريق</th>
                  <th>المباريات</th>
                  <th>الانتصارات</th>
                  <th>التعادلات</th>
                  <th>الهزائم</th>
                  <th>الأهداف المُسجلة</th>
                  <th>الأهداف المُستقبلة</th>
                  <th>فارق الأهداف</th>
                  <th>النقاط</th>
               </tr>
            </thead>
            <?php foreach ($teams as $team) { ?>
            <tr>
               <td><?= $team['id'] ?></td>
               <td><?= $team['name'] ?></td>
               <td><?= $team['matches'] ?></td>
               <td><?= $team['wins'] ?></td>
               <td><?= $team['draws'] ?></td>
               <td><?= $team['losses'] ?></td>
               <td><?= $team['goalsFor'] ?></td>
               <td><?= $team['goalsAgainst'] ?></td>
               <td><?= $team['goalDifference'] ?></td>
               <td><?= $team['points'] ?></td>
            </tr>
            <?php } ?>
         </table>
      </div>
      <div class="container">
         <table>
         <thead>
            <tr>
               <th>تعريفه</th>
               <th>الألوان</th>
            </tr>
         </thead>
         <tbody style="font-weight: bold;">
            <tr style="background-color: white;">
               <td>يشارك في كأس تونس</td>
               <td style="background-color: greenyellow;"></td>
            </tr>
            <tr style="background-color: white;">
               <td>يلعب على تفادي النزول</td>
               <td style="background-color: orange;"></td>
            </tr>
            <tr style="background-color: white;">
               <td>ينزل الى الدرجة الثانية</td>
               <td style="background-color: red;"></td>
            </tr>
      </div>
   </body>
   <script>
    function submitMatch() {
       const team1Select = document.querySelector("#team1");
        const team2Select = document.querySelector("#team2");
        const team1GoalsInput = document.querySelector("#team1-goals");
        const team2GoalsInput = document.querySelector("#team2-goals");

        const team1Index = parseInt(team1Select.value);
        const team2Index = parseInt(team2Select.value);
        const team1Goals = parseInt(team1GoalsInput.value);
        const team2Goals = parseInt(team2GoalsInput.value);

        if (isNaN(team1Index) || isNaN(team2Index) || isNaN(team1Goals) || isNaN(team2Goals)) {
            alert("يرجى ملء جميع الحقول بشكل صحيح.");
            return false;
        }

        // التحقق من أن الفريقين مختلفين
        if (team1Index === team2Index) {
            alert("لا يمكنك اختيار نفس الفريقين.");
            return false;
        }
    }
   </script>
</html>