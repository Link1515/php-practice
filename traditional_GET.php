<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <form method="GET" action="GET_handle_page.php">
    <div>
      <label for="name">
        姓名: <input type="text" name="name" id="name">
      </label>
    </div>
    <div>
      性別: 
      <label for="gender_man">
        男<input type="radio" name="gender" id="gender_man" value="man">
      </label>
      <label for="gender_woman">
        女<input type="radio" name="gender" id="gender_woman" value="woman">
      </label>
    </div>
    <div>
      職業: 
      <select name="job">
        <option selected disabled>-- 請選擇 --</option>
        <option value="frontend">前端工程師</option>
        <option value="backend">後端工程師</option>
        <option value="full_stack">全端工程師</option>
      </select>
    </div>
    <div>
      技能:
      <label for="skill_html">
        <input type="checkbox" name="skill[]" value="html" id="skill_html"> HTML
      </label>
      <label for="skill_css">
        <input type="checkbox" name="skill[]" value="css" id="skill_css"> CSS
      </label>
      <label for="skill_javascript">
        <input type="checkbox" name="skill[]" value="javascript" id="skill_javascript"> JavaScript
      </label>
      <label for="skill_php">
        <input type="checkbox" name="skill[]" value="php" id="skill_php"> PHP
      </label>
    </div>
    <button type="submit">提交</button>
    <div>

    </div>
  </form>
</body>
</html>